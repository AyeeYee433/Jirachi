<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Users::index');
$routes->get('/moodBoard', 'Users::moodBoard');
$routes->get('/signUp', 'Users::signUp');
$routes->get('/login', 'Users::login');



$routes->post('/login', 'Auth::login');
$routes->post('/signup', 'Auth::signup');
$routes->get('/logout', 'Auth::logout');