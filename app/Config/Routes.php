<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Dashboard');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * ------------------------------------------
 * --------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->add('/', 'dashboard::index', ['filter' => 'auth']);
$routes->add('dashboard', 'Dashboard::index', ['filter' => 'auth']);
$routes->add('company', 'Company::index', ['filter' => 'auth']);
$routes->add('users', 'users::index', ['filter' => 'auth']);
$routes->add('user-form', 'UserCrud::create', ['filter' => 'auth']);
$routes->add('submit-form', 'Users::store', ['filter' => 'auth']);
$routes->add('delete/(:num)', 'Users::delete/$1', ['filter' => 'auth']);
$routes->add('edit-view/(:num)', 'Users::show/$1', ['filter' => 'auth']);
$routes->add('update', 'Users::update', ['filter' => 'auth']);
$routes->add('unites', 'UnitesClass::index', ['filter' => 'auth']); 
$routes->add('unites/delete/(:num)', 'UnitesClass::delete/$1', ['filter' => 'auth']);
$routes->add('unites/addUnite', 'UnitesClass::addUnite', ['filter' => 'auth']);
$routes->add('unites/editUnite/(:num)', 'UnitesClass::editeUnite/$1', ['filter' => 'auth']); 
$routes->add('updateunite', 'UnitesClass::update', ['filter' => 'auth']);
$routes->add('catagory', 'Catagory::index', ['filter' => 'auth']);
$routes->add('medicine', 'MedClass::index', ['filter' => 'auth']);
$routes->add('clients', 'Clients::index', ['filter' => 'auth']);
//$routes->add('auth', 'Auth::index'); 

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
