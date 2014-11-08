<?php

// Runs queries against the blog database
	$query = function($query){
		$connection = mysqli_connect("localhost", "blog_admin", "A8U7hrvVJq9Pba9a", "blog");
		if (!$connection) {
		    die("Connection failed: " . mysqli_connect_error());
		}
		$result = mysqli_query($connection, $query);
		if(gettype($result)=="boolean"){
			// Query is an insert statment
			if($result==true){
				$result = mysqli_insert_id($connection);
			}else{
				$result = "error";
			}
		}else{
			// Query is SELECT, SHOW, DESCRIBE, or EXPLAIN
			if(mysqli_num_rows($result) > 0){
		      $result = $result;
		    }else{
		      $result = "error";
		    }
		}
	    
	    mysqli_close($connection);
	    return $result;
	};


//test function for multiple variables
	$test = function(){
			$test = array();
			$test[0] = "test0";
			$test[1] = "test1";
	    return $test;
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
	  $displayName = null;
	  if (isset($_SESSION['displayName'])) {
	    $displayName = $_SESSION['displayName'];
	  }
	  $userNumber = null;
	  if (isset($_SESSION['userNumber'])) {
	    $userNumber = $_SESSION['userNumber'];
	  }
		$app->view()->setData(array(
	    'user' => $user,
	    'displayName' => $displayName,
	    'userNumber' => $userNumber
		));
	});