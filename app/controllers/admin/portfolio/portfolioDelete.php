<?php

	$app->post("/blogDelete", function () use ($app, $query) {
		$id = $app->request()->post('id');
		$results = $query('DELETE FROM ztr_porfolio WHERE id = \'' . $id . '\'');
		$app->flash('status', 'Blog Entry Deleted');
		$app->redirect('/blog');
  });

	$app->get("/blogDelete/:url", $authenticate($app), function ($url) use ($app, $query) {
		$results = $query('SELECT post, title, url, id FROM ztr_porfolio WHERE url =\'' . $url . '\'');
		$results = $results->fetch_assoc();
		$post = $results['post'];
		$id = $results['id'];
		$blogUrl = $results['url'];
		$blogTitle = $results['title'];
		$flash = $app->view()->getData('flash');
		$status = '';
		if (isset($flash['status'])) {
        $status = $flash['status'];
     }
	  $app->render('../templates/admin/blog/blogDelete.php', array('results' => $results, 'post' => $post, 'status' => $status, 'blogTitle' => $blogTitle, 'blogUrl' => $blogUrl, 'id' => $id));
 	});