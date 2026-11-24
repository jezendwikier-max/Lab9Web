<?php
require_once __DIR__ . '/helpers.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Latihan Function - Halaman 2</title>
</head>
<body>
    <h2>Latihan Function (Halaman 2)</h2>
    <p>36&deg;C = <?= konversiCelciusKeFahrenheit(36) ?>&deg;F</p>
    <p>Nilai 78 mendapat predikat: <?= tentukanStatusNilai(78) ?></p>
    <p>Total belanja 3 x Rp 25.000: <?= formatRupiah(hitungTotal(25000, 3)) ?></p>
    <p><a href="latihan-1.php">Ke halaman 1</a></p>
</body>
</html>
