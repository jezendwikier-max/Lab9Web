<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi PHP Modular</title>
    <link rel="stylesheet" href="<?= e(asset('css/style.css')) ?>">
</head>
<body>
<div class="container">
    <header>
        <h1>Aplikasi PHP Modular</h1>
        <p>CRUD pengguna dengan template, helper, dan router</p>
    </header>
    <nav>
        <?php if (isLoggedIn()): ?>
            <a class="<?= isActive('dashboard') ?>" href="<?= e(url('dashboard')) ?>">Dashboard</a>
            <a class="<?= isActive('user/') ?>" href="<?= e(url('user/list')) ?>">Data Pengguna</a>
            <a href="<?= e(url('logout')) ?>">Logout (<?= e($_SESSION['admin_username'] ?? '') ?>)</a>
        <?php else: ?>
            <a class="<?= isActive('login') ?>" href="<?= e(url('login')) ?>">Login</a>
        <?php endif; ?>
    </nav>
    <main>
        <?php tampilkanFlash(); ?>
