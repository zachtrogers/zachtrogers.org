<?php

  $app->post("/login", function () use ($app, $query) {
    $username = $app->request()->post('username');
    $results = $query('SELECT id, username, displayName FROM ztr_user WHERE username = \'' . $username . '\'');
    if($results != "error"){
      $hashQuery = $query('SELECT password FROM ztr_user WHERE username = \'' . $username . '\'');
      $hash = $hashQuery->fetch_assoc()['password'];
      if(password_verify($app->request()->post('password'), $hash)){
        // The login was successful
        $login = $results->fetch_assoc();

        // Set the username for the session
        $_SESSION['username'] = $login['username'];
        $_SESSION['displayName'] = $login['displayName'];
        $_SESSION['userId'] = $login['id'];

        // If we are suposed to redirect some place then do it. 
        if (isset($_SESSION['urlRedirect'])) {
            $tmp = $_SESSION['urlRedirect'];
            unset($_SESSION['urlRedirect']);
            $app->redirect($tmp);
        }else{
          // Redirect to the home page
          $app->redirect('/'); 
        }
      }else{
        // The login was not successful - password related
        $error = array();
        $error['error'] = 'Login Failed';
        $error['username'] = $username;
        $app->flash('error', $error);
        $app->redirect('/login');
      }
    }else{
      // The login was not successful - username related
      $error = array();
      $error['error'] = 'Login Failed';
      $error['username'] = $username;
      $app->flash('error', $error);
      $app->redirect('/login');
    }
  });

  $app->get("/login", function () use ($app) {
     // Check for login error messages 
     $flash = $app->view()->getData('flash');
     $username_value = $error = '';  
     if (isset($flash['error'])) {
        $error = $flash['error'];
        $username_value = $error['username'];
        $error = $error['error'];
     }

     // Check and store redirect
     $urlRedirect = '/';
     if ($app->request()->get('r') && $app->request()->get('r') != '/logout' && $app->request()->get('r') != '/login') {
        $_SESSION['urlRedirect'] = $app->request()->get('r');
     }
     if (isset($_SESSION['urlRedirect'])) {
        $urlRedirect = $_SESSION['urlRedirect'];
     }

     $app->render('../templates/admin/login/login.php', array('error' => $error, 'username_value' => $username_value, 'urlRedirect' => $urlRedirect));
  });