<?php
session_start();
require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

# Validasi bId dari GET
$bId = filter_input(INPUT_GET, 'bId', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
]);

if (!$bId) {
    $_SESSION['flash_error_mhs'] = 'ID Mahasiswa tidak valid.';
    redirect_ke('read_mahasiswa.php');
}

# Hapus data dari database menggunakan prepared statement
$stmt = mysqli_prepare($conn, "DELETE FROM tbl_mahasiswa WHERE bId = ?");

if (!$stmt) {
    $_SESSION['flash_error_mhs'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('read_mahasiswa.php');
}

mysqli_stmt_bind_param($stmt, "i", $bId);

if (mysqli_stmt_execute($stmt)) {
    $_SESSION['flash_sukses_mhs'] = 'Data mahasiswa berhasil dihapus!';
} else {
    $_SESSION['flash_error_mhs'] = 'Data gagal dihapus. Silakan coba lagi.';
}

mysqli_stmt_close($stmt);

# Konsep PRG: Redirect ke halaman data mahasiswa
redirect_ke('read_mahasiswa.php');
?>