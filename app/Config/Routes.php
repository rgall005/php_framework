<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

$routes->get('users', 'UserController::index');
$routes->post('users/store', 'UserController::store');
$routes->put('users/update/(:num)', 'UserController::update/$1');
$routes->delete('users/delete/(:num)', 'UserController::delete/$1');
$routes->get('hello', function() {
    $name = $this->request->getGet('name') ?? 'World';
    return $this->response->setStatusCode(200)->setJSON(['message' => "Hello, $name!"]);
    });