<?php
// Runs queries against the blog database
	$query = function($query){
		//mamp test server
		//$connection = mysqli_connect("localhost", "blog_admin", "A8U7hrvVJq9Pba9a", "blog");
		//zachtrogers.org server
		$connection = mysqli_connect("zachtrogers.org", "ztr_admin", "dEb_6j99", "ztr");
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
	        if (!isset($_SESSION['username'])) {
	            $_SESSION['urlRedirect'] = $app->request()->getPathInfo();
	            $errors = Array();
	            $errors['error'] = 'Login required';
	            $errors['username'] = '';
	            $app->flash('error', $errors);
	            $app->redirect('/login');
	        }
	    };
	};

	$app->hook('slim.before.dispatch', function() use ($app) { 
	  $username = null;
	  if (isset($_SESSION['username'])) {
     $username = $_SESSION['username'];
	  }
	  $displayName = null;
	  if (isset($_SESSION['displayName'])) {
	    $displayName = $_SESSION['displayName'];
	  }
	  $userId = null;
	  if (isset($_SESSION['userId'])) {
	    $userId = $_SESSION['userId'];
	  }
		$app->view()->setData(array(
	    'username' => $username,
	    'displayName' => $displayName,
	    'userId' => $userId
		));
	});