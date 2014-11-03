<?php
	
	// Runs queries against the blog database
	$app->queryDb = function($query){
		$connection = mysqli_connect("localhost", "blog_admin", "A8U7hrvVJq9Pba9a", "blog");
		if (!$connection) {
		    die("Connection failed: " . mysqli_connect_error());
		}
		$result = mysqli_query($connection, $query);
	    if(mysqli_num_rows($result) > 0){
	      $result = $result;
	    }else{
	      $result = "error";
	    }
	    mysqli_close($connectData);
	    return $result;
	};

	$authenticate = function ($app) {
	    return function () use ($app) {
	        if (!isset($_SESSION['user'])) {
	            $_SESSION['urlRedirect'] = $app->request()->getPathInfo();
	            $app->flash('error', 'Login required');
	            $app->redirect('/login');
	        }
	    };
	};

	$app->hook('slim.before.dispatch', function() use ($app) { 
	   $user = null;
	   if (isset($_SESSION['user'])) {
	      $user = $_SESSION['user'];
	   }
	   $app->view()->setData('user', $user);
	});