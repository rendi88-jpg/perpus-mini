<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// --- HAPUS BAGIAN INI (BARIS 9-13) ---
// $routes->get('/', 'Perpus::index');  <-- INI BIANG KEROKNYA
// $routes->get('/perpus', 'Perpus::index');
// ... dst

// --- PAKAI YANG INI SAJA (Mulai Baris 15 ke bawah) ---

// 1. Halaman awal wajib ke Login
// Halaman Utama (root) arahkan ke Login
$routes->get('/', 'Login::index'); 
$routes->get('/login', 'Login::index');
$routes->post('/login/auth', 'Login::auth');
$routes->get('/logout', 'Login::logout');

// Halaman Dashboard (Perpus) diproteksi satpam (AuthGuard)
$routes->group('perpus', ['filter' => 'authGuard'], function($routes) {
    $routes->get('/', 'Perpus::index');
    $routes->post('simpan', 'Perpus::simpan');
    $routes->get('kembali/(:num)', 'Perpus::kembali/$1');
    $routes->get('hapus/(:num)', 'Perpus::hapus/$1');
});