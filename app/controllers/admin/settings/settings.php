<?php
	$app->post("/settings", function () use ($app, $query) {
    $userId = $app->request()->post('id');
		$username = $app->request()->post('username');
		$displayName = $app->request()->post('displayName');
    //$password = $app->request()->post('password');
    //$passwordConfirm = $app->request()->post('passwordConfirm');
		$options = [
		    'cost' => 9,
		    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
		];
		$password = password_hash($app->request()->post('password'), PASSWORD_BCRYPT, $options);
		$passwordConfirm = password_hash($app->request()->post('passwordConfirm'), PASSWORD_BCRYPT, $options);
    $statusPassword ='';
    $statusUsername ='';
    $statusDisplayname ='';
    $results = $query('SELECT username, displayName FROM ztr_user WHERE id =' . $userId . '');
		$results = $results->fetch_assoc();
		$passwordOrig = $app->request()->post('password');
		$passwordOrigConfirm = $app->request()->post('passwordConfirm');
		if($passwordOrig != NULL){
			if($passwordOrig != $passwordOrigConfirm){
				$statusPassword = 'Password Not Updated, does not match.<br/>';
			}
			if($passwordOrig == $passwordOrigConfirm){
	    	if (strlen($passwordOrig) >= 8 && preg_match('/[A-Z]/', $passwordOrig) > 0 && preg_match('/[a-z]/', $passwordOrig) > 0 ){
					$resultsPassword = $query('UPDATE ztr_user SET password=\'' .$password . '\' WHERE id = \'' . $userId. '\'');
					$statusPassword = 'Password Updated<br/>';
				}else{
	    		$statusPassword = 'Password Not Updated, must be at least 8 charactors and contain upper and lower case.<br/>';
				}
			}
		}if(($username != $results['username']) || ($username == NULL)){
			$resultsUsername = $query('UPDATE ztr_user SET username=\'' .$username . '\' WHERE id = \'' . $userId . '\'');
			$statusUsername = 'Username Updated<br/>';
		}if(($displayName != $results['displayName']) || ($displayName == NULL)){
			$resultsDisplayName = $query('UPDATE ztr_user SET displayName=\'' .$displayName . '\' WHERE id = \'' . $userId . '\'');
			$statusDisplayname = 'Display Name Updated<br/>';
		}
		$app->flash('status', '' . $statusPassword . $statusUsername . $statusDisplayname . '');
		$app->redirect('/settings');
	});

	$app->get("/settings", $authenticate($app), function () use ($app, $query) {
		$userId = $_SESSION['userId'];
	  $results = $query('SELECT username, displayName FROM ztr_user WHERE id =' . $userId . '');
		$results = $results->fetch_assoc();
		$username = $results['username'];
		$displayName = $results['displayName'];
		$flash = $app->view()->getData('flash');
		$status = '';
		if (isset($flash['status'])) {
        $status = $flash['status'];
     }
	  $app->render('../templates/admin/settings/settings.php', array('results' => $results, 'username' => $username, 'displayName' => $displayName, 'status' => $status));

	});