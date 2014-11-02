<?php
	$app->hook('databaseInit', function() use ($app) {
	  $connectData = mysqli_connect("localhost", "blog_admin", "A8U7hrvVJq9Pba9a", "blog");
	  if (!$connectData) {
	      die("Connection failed: " . mysqli_connect_error());
	  }
	  $result = mysqli_query($connectData, $app->query);
    if(mysqli_num_rows($result) > 0){
      $app->result = $result;
    }else{
      $app->result = "error";
    }
    mysqli_close($connectData);
    return $app->result;
	});

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