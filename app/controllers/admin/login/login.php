<?php
  $app->post("/login", function () use ($app) {
      $email = $app->request()->post('email');
      $password = $app->request()->post('password');
      $app->query = "SELECT username, password FROM blog_user WHERE username = '$email' AND password = '$password'";
      $app->applyHook('databaseInit');
      $login = $app->result->fetch_assoc();
      var_dump($login);
      if($login != "error"){
        $serverUsername = $login['username'];
        $serverPassword = $login['password'];
        $_SESSION['user'] = $login['username'];
        if (isset($_SESSION['urlRedirect'])) {
            $tmp = $_SESSION['urlRedirect'];
            unset($_SESSION['urlRedirect']);
            $app->redirect($tmp);
        }
        $app->redirect('/'); 
      }else{
        $error = array();
        $error['error'] = 'Login Failed';
        $error['email'] = $email;
        $app->flash('error', $error);
        $app->redirect('/login');
      }
  });

  $app->get("/login", function () use ($app) {
     $flash = $app->view()->getData('flash');

     $error = '';
     if (isset($flash['error'])) {
        $error = $flash['error'];
     }

     $urlRedirect = '/';

     if ($app->request()->get('r') && $app->request()->get('r') != '/logout' && $app->request()->get('r') != '/login') {
        $_SESSION['urlRedirect'] = $app->request()->get('r');
     }

     if (isset($_SESSION['urlRedirect'])) {
        $urlRedirect = $_SESSION['urlRedirect'];
     }

     $email_value = $error = '';  

     if (isset($flash['error'])) {
        $error = $flash['error'];
        $email_value = $error['email'];
        $error = $error['error'];
     }

     $app->render('../templates/admin/login/login.php', array('error' => $error, 'email_value' => $email_value, 'urlRedirect' => $urlRedirect));
  });