<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');


$routes->get('/login', 'Login::index');
$routes->post('/login/auth', 'Login::auth');
$routes->get('/logout', 'Login::logout');

// --- ROUTE ADMIN (Hanya bisa diakses jika role = Admin) ---
$routes->group('admin', function ($routes) {
    // Dashboard Admin
    $routes->get('dashboard', 'Dashboard::index'); 
});

// --- ROUTE PUBLIC (Hanya bisa diakses jika role = Public) ---
$routes->group('public', function ($routes) {
    // Dashboard Public
    $routes->get('dashboard', 'Dashboard::index');
});