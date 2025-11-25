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

$routes->get('/dashboard', 'Admin::dashBoard');
$routes->get('/products', 'Admin::products');
$routes->get('/adprod', 'Admin::adprod');
$routes->get('/orders', 'Admin::orders');

$routes->post('/login', 'Auth::login');
$routes->post('/signup', 'Auth::signup');
$routes->post('/adProd', 'Auth::adProd');
$routes->get('/logout', 'Auth::logout');
