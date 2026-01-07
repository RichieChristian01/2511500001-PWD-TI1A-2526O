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

    $cid = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT, [
        'options' => ['min_range' => 1]
    ]);

    if (!$cid) {
        $_SESSION['flash_error'] = 'CID Tidak Valid.';
        redirect_ke('read.php?');
    }

$stmt = mysqli_prepare($conn, "DELETE FROM tbl_tamu
                                             WHERE cid = ?");
if (!$stmt) {
    $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('read.php?cid=' . (int)$cid);
}

mysqli_stmt_bind_param($stmt, "i", $cid);

if (mysqli_stmt_execute($stmt)) {
    $_SESSION['flash_sukses'] = 'Terima kasih, data Anda sudah dihapus.';
} else {
    
    $_SESSION['flash_error'] = 'Data gagal dihapus. Silakan coba lagi.';
}
mysqli_stmt_close($stmt);
redirect_ke('read.php');
