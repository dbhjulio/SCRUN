<?php
use Cake\Core\Plugin;
use Cake\Routing\Router;
Router::defaultRouteClass('DashedRoute');
Router::scope('/', function ($routes) {
    $routes->connect('/', ['controller' => 'Usuarios', 'action' => 'login']);
    $routes->fallbacks('DashedRoute');
});
Plugin::routes();
