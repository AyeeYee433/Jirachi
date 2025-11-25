<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Users::index');
$routes->get('/moodBoard', 'Users::moodBoard');
$routes->get('/signUp', 'Users::signUp');
$routes->get('/login', 'Users::login');
$routes->get('/cart', 'Users::cart');
$routes->get('/checkout', 'Users::checkout');
