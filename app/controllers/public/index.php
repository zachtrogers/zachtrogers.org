<?php
	$app->get("/", function () use ($app) {
	    $app->render('../templates/public/index.php');
	});