<?php
	$app->get("/blog/:url", function ($url) use ($app, $query) {
		$results = $query('SELECT ztr_blog.id, post, dateSubmitted, submitter, url, title, displayName FROM ztr_blog, ztr_user WHERE ztr_blog.submitter=ztr_user.id AND url =\'' . $url . '\'');
	  $status = '';
	  if (isset($flash['status'])) {
      $status = $flash['status'];
    }
	  $app->render('../templates/public/blogSingle.php', array('results' => $results, 'status' => $status));
	});

