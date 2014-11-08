<?php
	$app->post("/settings", function () use ($app, $query) {
    $userNumber = $app->request()->post('id');
		$email = $app->request()->post('email');
		$displayName = $app->request()->post('userName');
    $password = $app->request()->post('password');
    $passwordConfirm = $app->request()->post('passwordConfirm');
    $statusPassword ='';
    $statusUsername ='';
    $statusDisplayname ='';
    $results = $query('SELECT username, displayName FROM blog_user WHERE id =' . $userNumber . '');
		$results = $results->fetch_assoc();

    if($password != NULL && ($password == $passwordConfirm)){
    	$results = $query('UPDATE blog_user SET password=\'' .$password . '\' WHERE id = \'' . $userNumber . '\'');
			$statusPassword = 'Password Updated<br/>';
    }
    if($email != $results['username']){
			$results = $query('UPDATE blog_user SET username=\'' .$email . '\' WHERE id = \'' . $userNumber . '\'');
			$statusUsername = 'Username Updated<br/>';
		}
    if($displayName != $results['displayName']){
			$results = $query('UPDATE blog_user SET displayName=\'' .$displayName . '\' WHERE id = \'' . $userNumber . '\'');
			$statusDisplayname = 'Display Name Updated<br/>';
		}
		$app->flash('status', '' . $statusPassword . $statusUsername . $statusDisplayname . '');
		$app->redirect('/settings');
	});

	$app->get("/settings", $authenticate($app), function () use ($app, $query) {
		$userNumber = $_SESSION['userNumber'];
	  $results = $query('SELECT username, displayName FROM blog_user WHERE id =' . $userNumber . '');
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