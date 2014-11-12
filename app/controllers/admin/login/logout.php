<?php

	$app->get("/logout", function () use ($app) {
	   unset($_SESSION['username']);
	   $app->view()->setData('username', null);
	   $app->render('../templates/admin/login/logout.php');
	});