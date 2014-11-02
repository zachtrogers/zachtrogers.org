<?php
require '../app/vendor/autoload.php';

$app = new \Slim\Slim();

$app->add(new \Slim\Middleware\SessionCookie(array('secret' => 'myappsecret')));

require '../app/controllers/global.php';
require '../app/controllers/public/index.php';
require '../app/controllers/public/blog.php';
require '../app/controllers/admin/login/logout.php';
require '../app/controllers/admin/login/login.php';
require '../app/controllers/admin/blog/blog.php';
require '../app/controllers/admin/settings/settings.php';

$app->run();