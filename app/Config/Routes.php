<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'index::index');
$routes->get('/login', 'Login::login');
$routes->get('/register', 'Register::register');
$routes->get('/review', 'index::review');
$routes->get('/user', 'User::user');
$routes->get('/logout', 'Login::logout');
$routes->get('/stadium', 'Stadium::stadium');
$routes->get('/profile', 'user::profile');
$routes->get('/editprofile/(:num)', 'user::edit/$1');
$routes->get('/user_review', 'User_review::user_review');
$routes->get('/index_admin', 'Index_admin::index_admin');
$routes->get('/bookingpage', 'Bookingpage::bookingpage');
$routes->get('/manageuser', 'Manageuser::manageuser');
$routes->get('/pay/(:num)', 'Pay::pay/$1');
$routes->get('/edit_admin/(:num)', 'Index_admin::edit_admin/$1');
$routes->get('/userhistory/(:num)', 'Userhistory::userhistory/$1');
$routes->get('/pay_admin', 'Pay_admin::pay_admin');
$routes->get('/update_pay/(:any)', 'Pay_admin::update_pay/$1');
$routes->get('/cancel_pay/(:any)', 'Pay_admin::cancel_pay/$1');
$routes->get('/report_admin', 'Report_admin::report_admin');
$routes->get('/promotion_admin', 'Index_admin::promotion_admin');




/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
