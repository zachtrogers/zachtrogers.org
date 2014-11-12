<?php

	$app->post("/blogDelete", function () use ($app, $query) {
		$id = $app->request()->post('id');
		$results = $query('DELETE FROM ztr_blog WHERE id = \'' . $id . '\'');
		$app->flash('status', 'Blog Entry Deleted');
		$app->redirect('/blog');
  });

	$app->get("/blogDelete/:url", $authenticate($app), function ($url) use ($app, $query) {
		$results = $query('SELECT title, url, id FROM ztr_blog WHERE url =\'' . $url . '\'');
		$results = $results->fetch_assoc();
		$id = $results['id'];
		$url = $results['url'];
		$title = $results['title'];
		$flash = $app->view()->getData('flash');
		$status = '';
		if (isset($flash['status'])) {
        $status = $flash['status'];
     }
	  $app->render('../templates/admin/blog/blogDelete.php', array('results' => $results, 'status' => $status, 'title' => $title, 'url' => $url, 'id' => $id));
 	});