<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Users::index');
$routes->get('/moodBoard', 'Users::moodBoard');
$routes->get('/signUp', 'Users::signUp');
$routes->get('/login', 'Users::login');

$routes->get('/dash', 'Admin::dashBoard');
$routes->get('/products', 'Admin::products');
