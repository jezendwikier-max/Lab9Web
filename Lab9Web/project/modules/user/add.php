<?php
$errors = [];
$nama = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama  = trim((string) ($_POST['nama'] ?? ''));
    $email = trim((string) ($_POST['email'] ?? ''));

    if (!csrfValid()) {
        $errors[] = 'Token keamanan tidak valid. Muat ulang halaman.';
    }
    if ($nama === '') {
        $errors[] = 'Nama wajib diisi.';
    }
    if (!validasiEmail($email)) {
        $errors[] = 'Format email tidak valid.';
    }

    if (!$errors) {
        $stmt = $pdo->prepare('INSERT INTO users (nama, email) VALUES (:nama, :email)');
        $stmt->execute([':nama' => $nama, ':email' => $email]);
        setFlash('sukses', 'Pengguna berhasil ditambahkan.');
        redirect('user/list');
    }
}
?>
<section>
    <h2>Tambah Pengguna</h2>

    <?php foreach ($errors as $err): ?>
        <div class="alert alert-gagal"><?= e($err) ?></div>
    <?php endforeach; ?>

    <form method="post" action="<?= e(url('user/add')) ?>">
        <?= csrfField() ?>
        <label>Nama</label>
        <input type="text" name="nama" value="<?= e($nama) ?>" required>
        <label>Email</label>
        <input type="email" name="email" value="<?= e($email) ?>" required>
        <button type="submit">Simpan</button>
        <a href="<?= e(url('user/list')) ?>">Batal</a>
    </form>
</section>
