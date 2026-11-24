<?php
$total = (int) $pdo->query('SELECT COUNT(*) FROM users')->fetchColumn();
?>
<section>
    <h2>Dashboard</h2>
    <p>Selamat datang, <strong><?= e($_SESSION['admin_username'] ?? '') ?></strong>.</p>
    <p>Total pengguna terdaftar: <strong><?= $total ?></strong></p>
    <a class="btn" href="<?= e(url('user/list')) ?>">Kelola Pengguna</a>
</section>
