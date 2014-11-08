<?php
	$app->get("/blog", function () use ($app, $query, $test) {
	    $results = $query('SELECT blog_contents.id, post, dateSubmitted, submitter, url, title, displayName FROM blog_contents, blog_user WHERE blog_contents.submitter=blog_user.id ORDER BY id DESC');
	    $app->render('../templates/public/blog.php', array('results' => $results));
	});