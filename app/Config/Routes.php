<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');


$routes->get('/login', 'Login::index');
$routes->post('/login/auth', 'Login::auth');

$routes->group('/', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', 'Dashboard::index');
    $routes->get('/logout', 'Login::logout');
});


// --- ROUTE ADMIN (Hanya bisa diakses jika role = Admin) ---
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('anggota', 'Admin::manageAnggota'); 
    $routes->get('anggota/create', 'Admin::createAnggota');
    $routes->post('anggota/store', 'Admin::storeAnggota');
    $routes->get('anggota/edit/(:num)', 'Admin::editAnggota/$1');
    $routes->post('anggota/update/(:num)', 'Admin::updateAnggota/$1');
    $routes->get('anggota/delete/(:num)', 'Admin::deleteAnggota/$1');

    $routes->get('gaji', 'Admin::manageKomponenGaji');
    $routes->get('komponengaji/create', 'Admin::createKomponenGaji');
    $routes->post('komponengaji/store', 'Admin::storeKomponenGaji');
    $routes->get('komponengaji/edit/(:num)', 'Admin::editKomponenGaji/$1');
    $routes->post('komponengaji/update/(:num)', 'Admin::updateKomponenGaji/$1');
    $routes->get('komponengaji/delete/(:num)', 'Admin::deleteKomponenGaji/$1');

    $routes->get('penggajian', 'Admin::managePenggajian');
    $routes->post('penggajian/hitung', 'Admin::hitungPenggajian');
    $routes->get('penggajian/view/(:num)', 'Admin::viewPenggajian/$1');
    $routes->get('penggajian/create', 'Admin::createPenggajian');
    $routes->post('penggajian/store', 'Admin::storePenggajian');
    $routes->get('penggajian/edit/(:num)', 'Admin::editPenggajian/$1');
    $routes->put('penggajian/update/(:num)', 'Admin::updatePenggajian/$1');
    $routes->get('penggajian/delete/(:num)', 'Admin::deletePenggajian/$1');
    });

// --- ROUTE PUBLIC (Hanya bisa diakses jika role = Public) ---
$routes->group('client', ['filter' => 'auth'], function ($routes) {
    $routes->get('anggota', 'Client::viewAnggota');
    $routes->get('gaji', 'Client::viewKomponenGaji');
    $routes->get('penggajian', 'Client::indexPenggajian');
    $routes->get('penggajian/view/(:num)', 'Client::viewPenggajian/$1');
});