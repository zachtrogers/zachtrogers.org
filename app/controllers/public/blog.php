<?php
	$app->get("/blog", function () use ($app, $query) {
		$results = $app->query;
		$results = $query('SELECT id, post, dateSubmitted, submitter FROM blog_contents ORDER BY id DESC');
	    $app->render('../templates/public/blog.php', array('results' => $results));
	});