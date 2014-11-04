<?php
	$app->get("/blogAdmin", $authenticate($app), function () use ($app, $query) {
	    $results = $query('SELECT id, post, dateSubmitted, submitter FROM blog_contents ORDER BY id DESC');
	    $app->render('../templates/admin/blog/blogAdmin.php', array('results' => $results));
	});