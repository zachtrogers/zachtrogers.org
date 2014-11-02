<?php
	$app->get("/private/about", $authenticate($app), function () use ($app) {
	   $app->render('../templates/admin/settings/privateAbout.php');
	});