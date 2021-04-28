<?php

require __DIR__ . '/../vendor/autoload.php';

//Loading the app settings into Slim
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable('.env');
$dotenv->load();

$config = require __DIR__ . '/../config/config.php';
$app = new \Slim\App($config);

$container = $app->getContainer();

$container['db'] = function ($container) {

    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($container['settings']['db']);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};

$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__ . '/../resources/views',['cache'=>false]);

    $view->addExtension(new \Slim\Views\TwigExtension(
        $container->router,
        $container->request->getUri()
    ));

    return $view;
};

$container['HomeController'] = function ($container) {
    return new \Microblog\Controllers\HomeController($container);
};

require __DIR__. '/../app/routes.php';
