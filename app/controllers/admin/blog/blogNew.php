<?php

	$app->post("/blogNew", function () use ($app, $query) {
    $post = $app->request()->post('post');
    $varPost = str_replace('"','\"',$post);
		$userName = $app->request()->post('userName');
		$results = $query('INSERT INTO blog_contents (post, submitter) VALUES ("' .$varPost . '", "' .$userName . '")');
		if($results != "error"){
			$app->redirect('blogEdit/' . $results . '');
		}else{
			echo $results;
		}
  });

	$app->get("/blogNew", $authenticate($app), function () use ($app) {
	    $app->render('../templates/admin/blog/blogNew.php');
 	});
