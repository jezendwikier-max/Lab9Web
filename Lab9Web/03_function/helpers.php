<?php
/**
 * Kumpulan function latihan (Praktikum 9 bagian E).
 */

function tampilkanSalam(): void
{
    echo "Selamat belajar PHP modular!";
}

function sapaPengguna(string $nama): void
{
    echo "Halo, " . htmlspecialchars($nama, ENT_QUOTES, 'UTF-8');
}

function hitungLuasPersegiPanjang(float $panjang, float $lebar): float
{
    return $panjang * $lebar;
}

function hitungDiskon(float $harga, float $persen = 10): float
{
    return $harga * ($persen / 100);
}

function formatRupiah(float $angka): string
{
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

function e(string $nilai): string
{
    return htmlspecialchars($nilai, ENT_QUOTES, 'UTF-8');
}

// ---- Latihan function ----

function konversiCelciusKeFahrenheit(float $c): float
{
    return ($c * 9 / 5) + 32;
}

function tentukanStatusNilai(float $nilai): string
{
    if ($nilai >= 85) {
        return 'A';
    } elseif ($nilai >= 70) {
        return 'B';
    } elseif ($nilai >= 55) {
        return 'C';
    } elseif ($nilai >= 40) {
        return 'D';
    }
    return 'E';
}

function hitungTotal(float $harga, int $jumlah): float
{
    return $harga * $jumlah;
}
