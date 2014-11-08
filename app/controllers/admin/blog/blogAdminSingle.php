<?php
	$app->get("/blogAdmin/:url", $authenticate($app), function ($url) use ($app, $query) {
		$results = $query('SELECT blog_contents.id, post, url, dateSubmitted, submitter, title, displayName FROM blog_contents, blog_user WHERE blog_contents.submitter=blog_user.id AND url =\'' . $url . '\'');
	  $app->render('../templates/admin/blog/blogAdminSingle.php', array('results' => $results));
	});