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
$routes->post('/addProduct', 'Auth::addProduct');
$routes->get('/logout', 'Auth::logout');

$routes->post('/productPage', 'Auth::productPage');
$routes->post('/addToCart', 'Auth::addToCart');
$routes->get('/productPage', 'Users::productPage');
$routes->post('/update_qty', 'Auth::updateQuantity');

$routes->get('/viewOrder/(:num)', 'Admin::viewOrder/$1');
$routes->post('/deleteOrder/(:num)', 'Auth::deleteOrder/$1');
$routes->post('/deleteUser/(:num)', 'Auth::delete/$1');

$routes->post('/place_order', 'Auth::placeOrder');
$routes->get('/productReceipt', 'Users::productReceipt');


