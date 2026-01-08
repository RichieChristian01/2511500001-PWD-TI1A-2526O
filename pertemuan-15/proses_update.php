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

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('read.php');
}

$cid = filter_input(INPUT_POST, 'cid', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
]);

if (!$cid) {
    $_SESSION['flash_error'] = 'CID Tidak Valid.';
    redirect_ke('edit.php?cid=' . (int)$cid);
}

$nama = bersih($_POST['txtNamaEd'] ?? '');
$email = bersih($_POST['txtEmailEd'] ?? '');
$pesan = bersih($_POST['txtPesanEd'] ?? '');
$txtverification = $_POST["txtverification"] ?? "";
$Answer = $_SESSION["Answer"] ?? null;


$errors = [];

if ($nama === "") {
    $errors[] = "Nama wajib diisi.";
} elseif (mb_strlen($nama) < 3) {
    $errors[] = "Nama minimal 3 karakter.";
}

if ($email === "") {
    $errors[] = "Email wajib diisi.";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Format email tidak valid.";
}

if ($pesan === "") {
    $errors[] = "Pesan wajib diisi.";
} elseif (mb_strlen($pesan) < 10) {
    $errors[] = "Mohon Tulis Pesan minimal 10 karakter.";
}

if ($txtverification === "") {
    $errors[] = "Verifikasi bot wajib diisi.";
} elseif (!is_numeric($txtverification) || (int)$txtverification !== (int)$Answer) {
    $errors[] = "Jawaban Verifikasi bot salah.";
}

if (!empty($errors)) {
    $_SESSION['old'] = [
        'nama' => $nama,
        'email' => $email,
        'pesan' => $pesan
    ];
    $_SESSION['flash_error'] = implode('<br>', $errors);
    redirect_ke('edit.php?cid=' . (int)$cid);
}

$stmt = mysqli_prepare($conn, "UPDATE tbl_tamu
SET cnama = ?, cemail = ?, cpesan = ?
WHERE cid = ?");
if (!$stmt) {
    $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('edit.php?cid=' . (int)$cid);
}
mysqli_stmt_bind_param($stmt, "sssi", $nama, $email, $pesan, $cid);
if (mysqli_stmt_execute($stmt)) {
    $_SESSION['flash_sukses'] = 'Terima kasih, data Anda sudah diperbaharui.';
    redirect_ke('read.php');
} else {
    $_SESSION['old'] = [
        'nama' => $nama,
        'email' => $email,
        'pesan' => $pesan,
    ];
    $_SESSION['flash_error'] = 'Data gagal diperbaharui. Silakan coba lagi.';
    redirect_ke('edit.php?cid=' . (int)$cid);
}
mysqli_stmt_close($stmt);
redirect_ke('edit.php?cid=' . (int)$cid);
