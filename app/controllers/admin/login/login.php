<?php
  $app->post("/login", function () use ($app, $query) {
      $email = $app->request()->post('email');
      $password = $app->request()->post('password');
      $results = $query('SELECT username, password, displayName, id FROM blog_user WHERE username = \'' . $email . '\' AND password = \'' . $password . '\'');
      if($results != "error"){
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
        // The login was not successful
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