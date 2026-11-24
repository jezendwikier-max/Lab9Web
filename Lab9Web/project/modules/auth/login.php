<?php
if (isLoggedIn()) {
    redirect('dashboard');
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim((string) ($_POST['username'] ?? ''));
    $password = (string) ($_POST['password'] ?? '');

    if (!csrfValid()) {
        $error = 'Token keamanan tidak valid. Muat ulang halaman.';
    } else {
        $stmt = $pdo->prepare('SELECT id, username, password_hash FROM admins WHERE username = :u');
        $stmt->execute([':u' => $username]);
        $admin = $stmt->fetch();

        if ($admin && password_verify($password, $admin['password_hash'])) {
            session_regenerate_id(true);
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_username'] = $admin['username'];
            setFlash('sukses', 'Login berhasil.');
            redirect('dashboard');
        }
        $error = 'Username atau password salah.';
    }
}
?>
<section>
    <h2>Login</h2>
    <?php if ($error): ?>
        <div class="alert alert-gagal"><?= e($error) ?></div>
    <?php endif; ?>
    <form method="post" action="<?= e(url('login')) ?>">
        <?= csrfField() ?>
        <label>Username</label>
        <input type="text" name="username" required>
        <label>Password</label>
        <input type="password" name="password" required>
        <button type="submit">Masuk</button>
    </form>
    <p class="hint">Akun contoh: admin / admin123</p>
</section>
