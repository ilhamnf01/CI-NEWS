<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Page::home');

$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');
$routes->get('/tos', 'Page::tos');
$routes->get('/news', 'News::index');
$routes->get('/news/(:any)', 'News::viewNews/$1');
$routes->group('admin', ['filter' => 'auth'], function($routes){
	    $routes->get('news', 'NewsAdmin::index');
	    $routes->get('news/(:segment)/preview', 'NewsAdmin::preview/$1');
    $routes->add('news/new', 'NewsAdmin::create');
        $routes->add('news/(:segment)/edit', 'NewsAdmin::edit/$1');
	    $routes->get('news/(:segment)/delete', 'NewsAdmin::delete/$1');
});

// Redirect root ke login
$routes->get('/', 'Auth::login');

// Route Auth (Akses Publik)
$routes->get('auth/login', 'Auth::login');
$routes->post('auth/loginProcess', 'Auth::loginProcess');
$routes->get('auth/logout', 'Auth::logout');

// Group Route yang Terproteksi Filter 'auth'
$routes->group('', ['filter' => 'auth'], static function ($routes) {
    $routes->get('dashboard', 'Dashboard::index');
    $routes->get('admin/dashboard', 'Dashboard::index');
    // Tambahkan route terproteksi lainnya di dalam group ini
});

