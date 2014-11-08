<?php

	$app->post("/blogEdit/", function () use ($app, $query) {
    $varPost = addslashes($app->request()->post('post'));
		$id = $app->request()->post('id');
		$blogTitle = addslashes($app->request()->post('blogTitle'));
		$blogUrl = $app->request()->post('blogUrl');
		$results = $query('UPDATE blog_contents SET post= \'' . $varPost . '\', title= \'' . $blogTitle . '\', url= \'' . $blogUrl . '\' WHERE id = \'' . $id . '\'');
		$app->flash('status', 'Blog Entry Updated');
		$app->redirect('/blogEdit/' . $blogUrl . '');
  });


	$app->get("/blogEdit/:url", $authenticate($app), function ($url) use ($app, $query) {
		$results = $query('SELECT post, title, url, id FROM blog_contents WHERE url =\'' . $url . '\'');
		$results = $results->fetch_assoc();
		$post = $results['post'];
		$blogTitle = $results['title'];
		$id = $results['id'];
		$blogUrl = $results['url'];
		$flash = $app->view()->getData('flash');
		$status = '';
		if (isset($flash['status'])) {
        $status = $flash['status'];
     }
	  $app->render('../templates/admin/blog/blogEdit.php', array('results' => $results, 'post' => $post, 'id' => $id, 'status' => $status, 'blogTitle' => $blogTitle, 'blogUrl' => $blogUrl));
 	});