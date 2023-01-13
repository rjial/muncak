<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');


// Dashboard and Auth Rest API
$routes->get('/dashboard', 'DashboardController::index', ['as' => 'dashboard', 'filter' => 'auth']);
$routes->get('/signup', 'DashboardController::signup', ['as' => 'signup']);
$routes->get('/signin', 'DashboardController::signin', ['as' => 'signin']);
$routes->post('/api/signin/', 'LoginController::index', ['as' => 'signin_api']);
$routes->post('/api/signup/', 'RegisterController::index', ['as' => 'signup_api']);
$routes->get('/api/me/', 'MeController::index',  ['filter' => 'auth_api']);
$routes->get('/gunung/create', 'GunungController::create', ['as' => 'creategunung', 'filter' => 'auth']);
$routes->get('/dashboard/sop', 'DashboardController::sop', ['as' => 'sop']);
$routes->get('/dashboard/sop/(:num)', 'DashboardController::sop/$1', ['as' => 'sop_num']);
$routes->get('/dashboard/history', 'DashboardController::history', ['as' => 'history']);
$routes->get('/dashboard/history/(:num)', 'DashboardController::detail_history/$1', ['as' => 'detail_history']);
$routes->get('/logout', 'DashboardController::logout', ['as' => 'logout']);
//gunung create and read
$routes->get('/api/gunung/', 'GunungController::index');
$routes->post('/api/gunung/add', 'GunungController::add');
$routes->get('/api/jalur/', 'GunungController::jalurgunung');
// sementara untuk edit halaman detail
$routes->get('/dashboard/gunung/add', 'DashboardController::addgunung', ['as' => 'addgunung', 'filter' => 'auth']);
$routes->get('/dashboard/gunung/(:num)', 'DashboardController::detailgunung/$1', ['as' => 'gunung', 'filter' => 'auth']);
$routes->post('/dashboard/gunung/(:num)/book', 'DashboardController::booknow/$1', ['as' => 'booknow']);
$routes->get('/dashboard/gunung/(:num)/jalur', 'DashboardController::jalurgunung/$1', ['as' => 'jalurgunung']);
$routes->get('/dashboard/entry/(:num)', 'DashboardController::entry/$1', ['as' => 'entry', 'filter' => 'auth']);
$routes->get('/dashboard/pricing/(:num)', 'DashboardController::pricingplan/$1', ['as' => 'pricingplan', 'filter' => 'auth']);

//sementara buat entry data
$routes->post('/dashboard/entry/(:num)/schedule/', 'DashboardController::entry_schedule/$1', ['as' => 'entryschedule', 'filter' =>'auth']);
$routes->get('/dashboard/entry/(:num)/schedule/', 'DashboardController::entry_schedule_get/$1', ['as' => 'entryscheduleget', 'filter' =>'auth']);
$routes->post('/dashboard/entry/(:num)/leader/', 'DashboardController::entry_leader/$1', ['as' => 'entryleader', 'filter' =>'auth']);
$routes->get('/dashboard/entry/(:num)/leader/', 'DashboardController::entry_leader_get/$1', ['as' => 'entryleaderget', 'filter' =>'auth']);
$routes->post('/dashboard/entry/(:num)/member/', 'DashboardController::entry_member/$1', ['as' => 'entrymember', 'filter' =>'auth']);
$routes->get('/dashboard/entry/(:num)/member/', 'DashboardController::entry_member_get/$1', ['as' => 'entrymemberget', 'filter' =>'auth']);
$routes->get('/dashboard/entry/(:num)/proses/', 'DashboardController::entry_proses/$1', ['as' => 'entryproses', 'filter' =>'auth']);

$routes->get('/survey', 'SurveyController::index', ['as' => 'survey_index', 'filter' =>'auth']);
$routes->post('/survey', 'SurveyController::hasil', ['as' => 'survey_hasil', 'filter' =>'auth']);

$routes->get('/subscription', 'SubcriptionController::index', ['as' => 'subscription.index', 'filter' =>'auth']);
$routes->get('/subscription/(:num)', 'SubcriptionController::item/$1', ['as' => 'subscription.item', 'filter' =>'auth']);

$routes->get('/bootstrap', 'DebugController::bootstrap', ['as' => 'debug.bootstrap']);


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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
