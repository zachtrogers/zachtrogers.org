<?php
	$app->get("/blog", function () use ($app) {
	    $app->query = "SELECT id, post, dateSubmitted, submitter FROM blog_contents ORDER BY id DESC";
	    $app->applyHook('databaseInit');
	    $results = $app->result; 
	    $app->render('../templates/public/blog.php', array('results' => $results));
	});