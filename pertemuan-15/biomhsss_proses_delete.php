<?php function redirect_ke($url)
{
    header("Location: " . $url);
    exit();
}
?>

<?php
session_start();
require __DIR__ . './koneksi.php';
require_once __DIR__ . '/fungsi.php';

$bId = filter_input(INPUT_GET, 'bId', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
]);

if (!$bId) {
    $_SESSION['flash_gagal'] = 'bId Tidak Valid.';
    redirect_ke('biomhsss_read.php?');
}

$stmt = mysqli_prepare($conn, "DELETE FROM tbl_biomhsss
                                             WHERE bId = ?");
if (!$stmt) {
    $_SESSION['flash_gagal'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('biomhsss_read.php?bId=' . (int)$bId);
}

mysqli_stmt_bind_param($stmt, "i", $bId);

if (mysqli_stmt_execute($stmt)) {
    $_SESSION['flash_berhasil'] = 'Terima kasih, data Anda sudah dihapus.';
} else {

    $_SESSION['flash_gagal'] = 'Data gagal dihapus. Silakan coba lagi.';
}
mysqli_stmt_close($stmt);
redirect_ke('biomhsss_read.php');
