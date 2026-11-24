<?php
require_once __DIR__ . '/helpers.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Latihan Function - Halaman 1</title>
</head>
<body>
    <h2>Latihan Function (Halaman 1)</h2>
    <p><?php tampilkanSalam(); ?></p>
    <p><?php sapaPengguna('Rina'); ?></p>
    <p>Luas persegi panjang 8 x 5: <?= hitungLuasPersegiPanjang(8, 5) ?></p>
    <p>Diskon 10% dari Rp 200.000: <?= formatRupiah(hitungDiskon(200000)) ?></p>
    <p>Diskon 15% dari Rp 200.000: <?= formatRupiah(hitungDiskon(200000, 15)) ?></p>
    <p>Teks berbahaya setelah di-escape: <?= e('<script>alert("uji")</script>') ?></p>
    <p><a href="latihan-2.php">Ke halaman 2</a></p>
</body>
</html>
