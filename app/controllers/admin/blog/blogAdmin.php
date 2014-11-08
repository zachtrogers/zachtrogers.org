<?php
	$app->get("/blogAdmin", $authenticate($app), function () use ($app, $query) {
	    $results = $query('SELECT blog_contents.id, post, dateSubmitted, submitter, title, displayName, url FROM blog_contents, blog_user WHERE blog_contents.submitter=blog_user.id ORDER BY id DESC');
	    $app->render('../templates/admin/blog/blogAdmin.php', array('results' => $results));
	});