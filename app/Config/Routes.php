<?php

namespace Config;

use App\Controllers\Article;

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
// $routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/barcode', 'Barcode::index');
$routes->get('/enter', 'Barcode::enter', ['as' => 'barcode-enter']);
$routes->get('/article', 'Home::article', ['as' => 'home-article']);
$routes->get('/article/(:segment)', 'Home::detail/$1', ['as' => 'home-article-detail']);
$routes->get('/search/(:segment)', 'Home::search/$1', ['as' => 'home-article-search']);
$routes->post('/proses', 'Home::proses');

$routes->get('/gethosting', 'Home::hosting', ['as' => 'home-hosting']);
$routes->get('/calendar', 'Home::calendar', ['as' => 'home-calendar']);
$routes->get('/community', 'Home::community', ['as' => 'home-community']);

$routes->get('/admin', 'Admin::index', ['as' => 'home', 'filter' => 'auth']);
// nambah notif
$routes->get('/admin/notification-item', 'Admin::notifItem');
$routes->get('/admin/notification-count', 'Admin::notifCount', ['as' => 'notif-count', 'filter' => 'auth']);
$routes->post('/admin/notification-status-change', 'Admin::notifStatusChange', ['as' => 'notif-status-change', 'filter' => 'auth']);
$routes->get('/admin/statistic', 'Admin::statistic', ['as' => 'statistic-lab']);

// Setting Section
$routes->get('/admin/setting', 'Setting::index', ['as' => 'setting', 'filter' => 'auth']);
$routes->post('/admin/setting/update', 'Setting::update', ['as' => 'setting-update', 'filter' => 'auth']);

// Management Users Section
$routes->get('/admin/users', 'Users::index', ['as' => 'users', 'filter' => 'auth:admin']);
$routes->post('/admin/users/add', 'Users::add', ['as' => 'users-add', 'filter' => 'auth']);
$routes->post('/admin/users/delete', 'Users::delete', ['as' => 'users-delete', 'filter' => 'auth']);
$routes->post('/admin/users/update', 'Users::update', ['as' => 'users-update', 'filter' => 'auth']);

// Article Section
$routes->get('/admin/article', 'Article::index', ['as' => 'article', 'filter' => 'auth']);
$routes->get('/admin/article/add', 'Article::add', ['as' => 'article-add', 'filter' => 'auth']);
$routes->post('/admin/article/save', 'Article::save', ['as' => 'article-save', 'filter' => 'auth']);
$routes->post('/admin/article/delete', 'Article::delete', ['as' => 'article-delete', 'filter' => 'auth']);
$routes->get('/admin/article/edit/(:num)', 'Article::edit/$1', ['as' => 'article-edit', 'filter' => 'auth']);
$routes->post('/admin/article/update', 'Article::update', ['as' => 'article-update', 'filter' => 'auth']);

$routes->get('/admin/article/review/(:segment)', 'Article::review/$1', ['as' => 'article-review',  'filter' => 'auth:admin']);
$routes->get('/admin/article/filter/(:segment)', 'Article::filter/$1', ['as' => 'article-filter',  'filter' => 'auth:admin']);
$routes->get('/admin/article/verification', 'Article::verificationView', ['as' => 'article-verification-view', 'filter' => 'auth:admin']);
$routes->post('/admin/article/verification', 'Article::verification', ['as' => 'article-verification', 'filter' => 'auth:admin']);

// Article Section
$routes->get('/admin/community', 'Community::index', ['as' => 'community', 'filter' => 'auth']);
$routes->get('/admin/community/add', 'Community::add', ['as' => 'community-add', 'filter' => 'auth']);
$routes->post('/admin/community/save', 'Community::save', ['as' => 'community-save', 'filter' => 'auth']);
$routes->post('/admin/community/delete', 'Community::delete', ['as' => 'community-delete', 'filter' => 'auth']);
$routes->get('/admin/community/edit/(:num)', 'Community::edit/$1', ['as' => 'community-edit', 'filter' => 'auth']);
$routes->post('/admin/community/update', 'Community::update', ['as' => 'community-update', 'filter' => 'auth']);


// Category Section
$routes->get('/admin/category', 'Category::index', ['as' => 'category', 'filter' => 'auth']);
$routes->post('/admin/category/save', 'Category::save', ['as' => 'category-save', 'filter' => 'auth']);
$routes->post('/admin/category/delete', 'Category::delete', ['as' => 'category-delete', 'filter' => 'auth']);
$routes->post('/admin/category/update', 'Category::update', ['as' => 'category-update', 'filter' => 'auth']);

// Authentication Section
$routes->get('/login', 'Auth::index', ['as' => 'login']);
$routes->post('/login/auth', 'Auth::auth', ['as' => 'auth']);
$routes->get('/logout', 'Auth::logout', ['as' => 'logout']);

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
