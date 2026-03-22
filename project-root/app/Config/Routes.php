$routes->get('users', 'UserController::index');
$routes->post('users/store', 'UserController::store');
$routes->post('users/update/(:num)', 'UserController::update/$1');
$routes->get('users/delete/(:num)', 'UserController::delete/$1');
