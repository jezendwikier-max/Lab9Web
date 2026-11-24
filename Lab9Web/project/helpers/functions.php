<?php
/**
 * helpers/functions.php - function umum yang dipakai banyak modul.
 */

// ---------- Tampilan ----------

function e(?string $nilai): string
{
    return htmlspecialchars((string) $nilai, ENT_QUOTES, 'UTF-8');
}

function formatRupiah(float $angka): string
{
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

function hitungDiskon(float $harga, float $persen = 10): float
{
    return $harga * ($persen / 100);
}

function ringkasTeks(string $teks, int $panjang = 50): string
{
    if (mb_strlen($teks) <= $panjang) {
        return $teks;
    }
    return mb_substr($teks, 0, $panjang) . '...';
}

// ---------- Validasi ----------

function validasiEmail(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

// ---------- URL dan routing ----------

/** URL ke sebuah halaman router, contoh: url('user/list') */
function url(string $page = 'dashboard', array $params = []): string
{
    $query = ['page' => $page] + $params;
    return 'index.php?' . http_build_query($query);
}

/** URL aset statis relatif terhadap folder project (tetap benar walau URL di-rewrite) */
function asset(string $path): string
{
    $base = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/');
    return $base . '/assets/' . ltrim($path, '/');
}

function redirect(string $page, array $params = []): void
{
    header('Location: ' . url($page, $params));
    exit;
}

function isActive(string $prefix): string
{
    $page = $_GET['page'] ?? 'dashboard';
    return (is_string($page) && str_starts_with($page, $prefix)) ? 'active' : '';
}

// ---------- Pesan sukses / gagal (flash message) ----------

function setFlash(string $tipe, string $pesan): void
{
    $_SESSION['flash'] = ['tipe' => $tipe, 'pesan' => $pesan];
}

function tampilkanFlash(): void
{
    if (!empty($_SESSION['flash'])) {
        $f = $_SESSION['flash'];
        unset($_SESSION['flash']);
        $kelas = $f['tipe'] === 'sukses' ? 'alert-sukses' : 'alert-gagal';
        echo '<div class="alert ' . $kelas . '">' . e($f['pesan']) . '</div>';
    }
}

// ---------- CSRF ----------

function csrfToken(): string
{
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf'];
}

function csrfField(): string
{
    return '<input type="hidden" name="csrf" value="' . e(csrfToken()) . '">';
}

function csrfValid(): bool
{
    $kirim = $_POST['csrf'] ?? '';
    return is_string($kirim) && hash_equals($_SESSION['csrf'] ?? '', $kirim);
}

// ---------- Autentikasi ----------

function isLoggedIn(): bool
{
    return !empty($_SESSION['admin_id']);
}
