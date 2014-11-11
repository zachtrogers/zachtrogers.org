<?php

	$app->post("/blogNew", function () use ($app, $query) {
    $varPost = addslashes($app->request()->post('post'));
		$userNumber = $app->request()->post('userNumber');
		$blogTitle = addslashes($app->request()->post('blogTitle'));
		$blogUrl = $app->request()->post('blogUrl');
		$results = $query('INSERT INTO ztr_porfolio (title, post, submitter, url) VALUES ("' .$blogTitle . '","' .$varPost . '", "' .$userNumber . '", "' .$blogUrl . '")');
		if($results != "error"){
			$app->redirect('blogEdit/' . $blogUrl . '');
		}else{
			echo $results;
		}
  });

	$app->get("/blogNew", $authenticate($app), function () use ($app) {
	    $app->render('../templates/admin/blog/blogNew.php');
 	});
