<?php
// index.php - titik masuk aplikasi sekaligus router.
ob_start();          // agar redirect() tetap bisa dipakai di dalam modul
session_start();

require_once __DIR__ . '/helpers/functions.php';
require_once __DIR__ . '/config/database.php';

// Whitelist rute: hanya halaman di daftar ini yang boleh dimuat.
$routes = [
    'dashboard'   => __DIR__ . '/views/dashboard.php',
    'user/list'   => __DIR__ . '/modules/user/list.php',
    'user/add'    => __DIR__ . '/modules/user/add.php',
    'user/edit'   => __DIR__ . '/modules/user/edit.php',
    'user/delete' => __DIR__ . '/modules/user/delete.php',
    'login'       => __DIR__ . '/modules/auth/login.php',
    'logout'      => __DIR__ . '/modules/auth/logout.php',
];

// Rute yang boleh dibuka tanpa login
$publicRoutes = ['login'];

$page = $_GET['page'] ?? 'dashboard';

if (!is_string($page) || !array_key_exists($page, $routes)) {
    http_response_code(404);
    $contentFile = __DIR__ . '/views/404.php';
} elseif (!isLoggedIn() && !in_array($page, $publicRoutes, true)) {
    redirect('login');
} else {
    $contentFile = $routes[$page];
}

require_once __DIR__ . '/views/header.php';
require $contentFile;
require_once __DIR__ . '/views/footer.php';
ob_end_flush();
