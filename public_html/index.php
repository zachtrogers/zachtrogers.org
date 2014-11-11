<?php
require '../app/vendor/autoload.php';

$app = new \Slim\Slim(array(
    'mode' => 'developement'
));

//production mode
$app->configureMode('production', function () use ($app) {
    $app->config(array(
        'log.enable' => true,
        'debug' => false
    ));
});

//development mode
$app->configureMode('development', function () use ($app) {
    $app->config(array(
        'log.enable' => false,
        'debug' => true
    ));
});

require '../app/controllers/global.php';
require '../app/controllers/public/index.php';
require '../app/controllers/public/blog.php';
require '../app/controllers/public/blogSingle.php';
require '../app/controllers/admin/login/logout.php';
require '../app/controllers/admin/login/login.php';
require '../app/controllers/admin/blog/blogNew.php';
require '../app/controllers/admin/settings/settings.php';
require '../app/controllers/admin/blog/blogEdit.php';
require '../app/controllers/admin/blog/blogDelete.php';
require '../app/controllers/admin/portfolio/portfolioDelete.php';
require '../app/controllers/admin/portfolio/portfolioEdit.php';
require '../app/controllers/public/portfolio.php';
require '../app/controllers/admin/portfolio/portfolioNew.php';
require '../app/vendor/password.php';

$app->add(new \Slim\Middleware\SessionCookie(array('secret' => 'myappsecret')));
$app->run();



