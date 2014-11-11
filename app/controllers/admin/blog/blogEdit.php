<?php
	$app->post("/blogEdit/", function () use ($app, $query) {
    $post = addslashes($app->request()->post('post'));
		$id = $app->request()->post('id');
		$title = addslashes($app->request()->post('title'));
		$url = $app->request()->post('url');
		$results = $query('UPDATE ztr_blog SET post= \'' . $post . '\', title= \'' . $title . '\', url= \'' . $url . '\' WHERE id = \'' . $id . '\'');
		$app->flash('status', 'Blog Entry Updated');
		$app->redirect('/blogEdit/' . $url . '');
  });

	$app->get("/blogEdit/:url", $authenticate($app), function ($url) use ($app, $query) {
		$results = $query('SELECT title, post, url, id FROM ztr_blog WHERE url =\'' . $url . '\'');
		$results = $results->fetch_assoc();
		$post = $results['post'];
		$title = $results['title'];
		$id = $results['id'];
		$url = $results['url'];
		$flash = $app->view()->getData('flash');
		$status = '';
		if (isset($flash['status'])) {
        $status = $flash['status'];
     }
	  $app->render('../templates/admin/blog/blogEdit.php', array('results' => $results, 'post' => $post, 'id' => $id, 'status' => $status, 'title' => $title, 'url' => $url));
 	});