<?php

	$app->post("/blogDelete:id", function ($id) use ($app, $query) {
		$results = $query('DELETE FROM blog_contents WHERE id = 40');
		$app->flash('status', 'Blog Entry Deleted');
		$app->redirect('/blogDelete');
  });

	$app->get("/blogDelete:id", $authenticate($app), function ($id) use ($app, $query) {
		$results = $query('SELECT post, title FROM blog_contents WHERE id =' . $id . '');
		$results = $results->fetch_assoc();
		$post = $results['post'];
		$blogTitle = $results['title'];
		$flash = $app->view()->getData('flash');
		$status = '';
		if (isset($flash['status'])) {
        $status = $flash['status'];
     }
	  $app->render('../templates/admin/blog/blogDelete.php', array('results' => $results, 'post' => $post, 'id' => $id, 'status' => $status, 'blogTitle' => $blogTitle));
 	});