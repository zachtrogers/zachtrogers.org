<?php

	$app->post("/blogNew", function () use ($app, $query) {
    $title = addslashes($app->request()->post('title'));
    $post = addslashes($app->request()->post('post'));
		$userId = $app->request()->post('userId');
		$url = $app->request()->post('url');
		$results = $query('INSERT INTO ztr_blog (title, post, submitter, url) VALUES ("' . $title . '","' . $post . '", "' . $userId . '", "' . $url . '")');
		if($results != "error"){
			$app->redirect('blogEdit/' . $url . '');
		}else{
			echo $results;
		}
  });

	$app->get("/blogNew", $authenticate($app), function () use ($app) {
	    $app->render('../templates/admin/blog/blogNew.php');
 	});
