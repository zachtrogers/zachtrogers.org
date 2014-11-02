<?php
	$app->get("/blogAdmin", $authenticate($app), function () use ($app) {
	    $app->query = "SELECT id, post, dateSubmitted, submitter FROM blog_contents ORDER BY id DESC";
	    $app->applyHook('databaseInit', function(){
        	$app->render('../templates/admin/blog/blogAdmin.php', array('results' => $app->result));
        });
	});