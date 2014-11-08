<?php
	$app->get("/blog/:url", function ($url) use ($app, $query) {
		$results = $query('SELECT blog_contents.id, post, dateSubmitted, submitter, url, title, displayName FROM blog_contents, blog_user WHERE blog_contents.submitter=blog_user.id AND url =\'' . $url . '\'');
	  $app->render('../templates/public/blogSingle.php', array('results' => $results));
	});

