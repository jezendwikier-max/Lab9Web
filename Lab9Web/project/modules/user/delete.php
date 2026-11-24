<?php
// Hapus hanya lewat POST + token CSRF, bukan lewat URL GET.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    setFlash('gagal', 'Penghapusan harus melalui tombol Hapus.');
    redirect('user/list');
}

if (!csrfValid()) {
    setFlash('gagal', 'Token keamanan tidak valid.');
    redirect('user/list');
}

$id = filter_var($_POST['id'] ?? null, FILTER_VALIDATE_INT);
if ($id === false || $id === null) {
    setFlash('gagal', 'ID tidak valid.');
    redirect('user/list');
}

$stmt = $pdo->prepare('DELETE FROM users WHERE id = :id');
$stmt->execute([':id' => $id]);

setFlash($stmt->rowCount() ? 'sukses' : 'gagal',
         $stmt->rowCount() ? 'Pengguna berhasil dihapus.' : 'Data tidak ditemukan.');
redirect('user/list');
