<?php
require '../app/vendor/autoload.php';

$app = new \Slim\Slim();

require '../app/controllers/global.php';
require '../app/controllers/public/index.php';
require '../app/controllers/public/blog.php';
require '../app/controllers/admin/login/logout.php';
require '../app/controllers/admin/login/login.php';
require '../app/controllers/admin/blog/blog.php';
require '../app/controllers/admin/blog/blogNew.php';
require '../app/controllers/admin/settings/settings.php';
require '../app/controllers/admin/blog/blogEdit.php';

$app->add(new \Slim\Middleware\SessionCookie(array('secret' => 'myappsecret')));
$app->run();



