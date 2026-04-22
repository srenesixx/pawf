<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Calculator::index');
$routes->get('/home', 'Home::index');
$routes->get('/about', 'About::index');