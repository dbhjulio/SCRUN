<?php
use Cake\Routing\Router;

Router::plugin(
    'CrudMoura',
    ['path' => '/crud-moura'],
    function ($routes) {
        $routes->fallbacks('DashedRoute');
    }
);
