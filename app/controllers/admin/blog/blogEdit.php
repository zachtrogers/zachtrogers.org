<?php

	$app->post("/blogEdit", function () use ($app, $query) {
    $post = $app->request()->post('post');
    $varPost = str_replace('"','\"',$post);
		$userName = $app->request()->post('userName');
		$results = $query('INSERT INTO blog_contents (post, submitter) VALUES ("' .$varPost . '", "' .$userName . '")');
		if($results != "error"){
			echo $results;
			//$app->redirect('/blogAdmin');
		}else{
			echo $results;
		}
  });

	$app->get("/blogEdit", $authenticate($app), function () use ($app, $query) {
		$results = $query('SELECT post, submitter FROM blog_contents WHERE id = 25');
		$post = "test";
	  $app->render('../templates/admin/blog/blogEdit.php', array('results' => $results));
 	});
