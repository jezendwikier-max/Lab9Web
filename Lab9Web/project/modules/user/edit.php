<?php
$id = filter_var($_GET['id'] ?? $_POST['id'] ?? null, FILTER_VALIDATE_INT);

$stmt = $pdo->prepare('SELECT id, nama, email FROM users WHERE id = :id');
$stmt->execute([':id' => $id ?: 0]);
$user = $stmt->fetch();

if (!$user) {
    setFlash('gagal', 'Data pengguna tidak ditemukan.');
    redirect('user/list');
}

$errors = [];
$nama  = $user['nama'];
$email = $user['email'];

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
        $upd = $pdo->prepare('UPDATE users SET nama = :nama, email = :email WHERE id = :id');
        $upd->execute([':nama' => $nama, ':email' => $email, ':id' => $user['id']]);
        setFlash('sukses', 'Pengguna berhasil diperbarui.');
        redirect('user/list');
    }
}
?>
<section>
    <h2>Ubah Pengguna</h2>

    <?php foreach ($errors as $err): ?>
        <div class="alert alert-gagal"><?= e($err) ?></div>
    <?php endforeach; ?>

    <form method="post" action="<?= e(url('user/edit', ['id' => $user['id']])) ?>">
        <?= csrfField() ?>
        <input type="hidden" name="id" value="<?= (int) $user['id'] ?>">
        <label>Nama</label>
        <input type="text" name="nama" value="<?= e($nama) ?>" required>
        <label>Email</label>
        <input type="email" name="email" value="<?= e($email) ?>" required>
        <button type="submit">Perbarui</button>
        <a href="<?= e(url('user/list')) ?>">Batal</a>
    </form>
</section>
