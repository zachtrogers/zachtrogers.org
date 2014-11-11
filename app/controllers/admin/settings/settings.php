<?php
	$app->post("/settings", function () use ($app, $query) {
    $userNumber = $app->request()->post('id');
		$email = $app->request()->post('email');
		$displayName = $app->request()->post('userName');
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
    $results = $query('SELECT username, displayName FROM ztr_user WHERE id =' . $userNumber . '');
		$results = $results->fetch_assoc();
		$passwordOrig = $app->request()->post('password');
		$passwordOrigConfirm = $app->request()->post('passwordConfirm');
		if($passwordOrig != NULL){
			if($passwordOrig != $passwordOrigConfirm){
				$statusPassword = 'Password Not Updated, does not match.<br/>';
			}
			if($passwordOrig == $passwordOrigConfirm){
	    	if (strlen($passwordOrig) >= 8 && preg_match('/[A-Z]/', $passwordOrig) > 0 && preg_match('/[a-z]/', $passwordOrig) > 0 ){
					$resultsPassword = $query('UPDATE ztr_user SET password=\'' .$password . '\' WHERE id = \'' . $userNumber . '\'');
					$statusPassword = 'Password Updated<br/>';
				}else{
	    		$statusPassword = 'Password Not Updated, must be at least 8 charactors and contain upper and lower case.<br/>';
				}
			}
		}if(($email != $results['username']) || ($email == NULL)){
			$resultsUsername = $query('UPDATE ztr_user SET username=\'' .$email . '\' WHERE id = \'' . $userNumber . '\'');
			$statusUsername = 'Username Updated<br/>';
		}if(($displayName != $results['displayName']) || ($displayName == NULL)){
			$resultsDisplayName = $query('UPDATE ztr_user SET displayName=\'' .$displayName . '\' WHERE id = \'' . $userNumber . '\'');
			$statusDisplayname = 'Display Name Updated<br/>';
		}
		$app->flash('status', '' . $statusPassword . $statusUsername . $statusDisplayname . '');
		$app->redirect('/settings');
	});

	$app->get("/settings", $authenticate($app), function () use ($app, $query) {
		$userNumber = $_SESSION['userNumber'];
	  $results = $query('SELECT username, displayName FROM ztr_user WHERE id =' . $userNumber . '');
		$results = $results->fetch_assoc();
		$email = $results['username'];
		$displayName = $results['displayName'];
		$flash = $app->view()->getData('flash');
		$status = '';
		if (isset($flash['status'])) {
        $status = $flash['status'];
     }
	  $app->render('../templates/admin/settings/settings.php', array('results' => $results, 'email' => $email, 'displayName' => $displayName, 'status' => $status));

	});