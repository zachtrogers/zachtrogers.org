<?php
  $app->post("/login", function () use ($app, $query) {
    $email = $app->request()->post('email');
    $results = $query('SELECT username, displayName, id FROM ztr_user WHERE username = \'' . $email . '\'');
    if($results != "error"){
      $hashQuery = $query('SELECT password FROM ztr_user WHERE username = \'' . $email . '\'');
      $hash = $hashQuery->fetch_assoc()['password'];
      if(password_verify($app->request()->post('password'), $hash)){
        // The login was successful
        $login = $results->fetch_assoc();

        // Set the username for the session
        $_SESSION['user'] = $login['username'];
        $_SESSION['displayName'] = $login['displayName'];
        $_SESSION['userNumber'] = $login['id'];

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
        $error['email'] = $email;
        $app->flash('error', $error);
        $app->redirect('/login');
      }
    }else{
      // The login was not successful - username related
      $error = array();
      $error['error'] = 'Login Failed';
      $error['email'] = $email;
      $app->flash('error', $error);
      $app->redirect('/login');
    }
  });

  $app->get("/login", function () use ($app) {
     // Check for login error messages 
     $flash = $app->view()->getData('flash');
     $email_value = $error = '';  
     if (isset($flash['error'])) {
        $error = $flash['error'];
        $email_value = $error['email'];
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

     $app->render('../templates/admin/login/login.php', array('error' => $error, 'email_value' => $email_value, 'urlRedirect' => $urlRedirect));
  });