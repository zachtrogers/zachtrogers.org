<?php
	$app->get("/blog", function () use ($app, $query, $test) {
    $results = $query('SELECT ztr_blog.id, title, post, url, dateSubmitted, submitter, displayName FROM ztr_blog, ztr_user WHERE ztr_blog.submitter=ztr_user.id ORDER BY id DESC');
    $status = '';
    if (isset($flash['status'])) {
      $status = $flash['status'];
   	}
    $app->render('../templates/public/blog.php', array('results' => $results, 'status' => $status));
	});