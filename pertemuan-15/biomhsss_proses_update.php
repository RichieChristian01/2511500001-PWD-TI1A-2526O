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
    $_SESSION['flash_gagal'] = 'Akses tidak valid.';
    redirect_ke('biomhsss_read.php');
}

$bId = filter_input(INPUT_POST, 'bId', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
]);

if (!$bId) {
    $_SESSION['flash_gagal'] = 'bId Tidak Valid.';
    redirect_ke('biomhsss_edit.php?bId=' . (int)$bId);
}

$NIM = bersih($_POST["txtNIM"]) ?? "";
$Nama_Lengkap = bersih($_POST["txtNama_Lengkap"]) ?? "";
$Tempat_Lahir = bersih($_POST["txtTempat_Lahir"]) ?? "";
$Tgl_Lahir = bersih($_POST["txtTgl_Lahir"]) ?? "";
$Hobi = bersih($_POST["txtHobi"]) ?? "";
$Pasangan = bersih($_POST["txtPasangan"]) ?? "";
$Pekerjaan = bersih($_POST["txtPekerjaan"]) ?? "";
$Nama_Ortu = bersih($_POST["txtNama_Ortu"]) ?? "";
$Nama_Kakak = bersih($_POST["txtNama_Kakak"]) ?? "";
$Nama_Adik = bersih($_POST["txtNama_Adik"]) ?? "";

$error = [];

if ($NIM === "") {
    $error[] = "NIM wajib diisi.";
} elseif (mb_strlen($NIM) > 10) {
    $error[] = "NIM maksimal diisi 10 karakter.";
}

if ($Nama_Lengkap === "") {
    $error[] = "Nama wajib diisi.";
} elseif (mb_strlen($Nama_Lengkap) < 2) {
    $error[] = "Nama minimal diisi 2 karakter.";
}

if ($Tempat_Lahir === "") {
    $error[] = "Tempat Lahir ini tidak boleh kosong, mohon diisi";
}

if ($Tgl_Lahir === "") {
    $error[] = "Tanggal Lahir ini tidak boleh kosong, mohon diisi";
}

if ($Hobi === "") {
    $error[] = "Hobi ini tidak boleh kosong, mohon diisi";
}

if ($Pasangan === "") {
    $error[] = "Pasangan ini tidak boleh kosong, mohon diisi";
}

if ($Pekerjaan === "") {
    $error[] = "Pekerjaan ini tidak boleh kosong, mohon diisi";
}

if ($Nama_Ortu === "") {
    $error[] = "Nama Orangtua ini tidak boleh kosong, mohon diisi";
}

if ($Nama_Kakak === "") {
    $error[] = "Nama Kakak ini tidak boleh kosong, mohon diisi";
}

if ($Nama_Adik === "") {
    $error[] = "Nama Adik ini tidak boleh kosong, mohon diisi";
}




if (!empty($error)) {
    $_SESSION['outdated'] = [
        "NIM" => $NIM,
        "Nama_Lengkap" => $Nama_Lengkap,
        "Tempat_Lahir" => $Tempat_Lahir,
        "Tgl_Lahir" => $Tgl_Lahir,
        "Hobi" => $Hobi,
        "Pasangan" => $Pasangan,
        "Pekerjaan" => $Pekerjaan,
        "Nama_Ortu" => $Nama_Ortu,
        "Nama_Kakak" => $Nama_Kakak,
        "Nama_Adik" => $Nama_Adik
    ];
    $_SESSION['flash_gagal'] = implode('<br>', $error);
    redirect_ke('biomhsss_edit.php?bId=' . (int)$bId);
}

$stmt = mysqli_prepare($conn, "UPDATE tbl_biomhsss
SET BNIM = ?, bNama_Lengkap = ?, bTempat_Lahir = ?, bTgl_Lahir = ?, bHobi = ?, bPasangan =?, bPekerjaan = ?, bNama_Ortu = ?, bNama_Kakak = ?, bNama_Adik = ?
WHERE bId = ?");
if (!$stmt) {
    $_SESSION['flash_gagal'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('biomhsss_edit.php?bId=' . (int)$bId);
}
mysqli_stmt_bind_param($stmt, "ssssssssssi", $NIM, $Nama_Lengkap, $Tempat_Lahir, $Tanggal_Lahir, $Hobi, $Pasangan, $Pekerjaan, $Nama_Ortu, $Nama_Kakak, $Nama_Adik, $bId);
if (mysqli_stmt_execute($stmt)) {
    $_SESSION['flash_berhasil'] = 'Terima kasih, data Anda sudah diperbaharui.';
    redirect_ke('biomhsss_read.php');
} else {
    $_SESSION['outdated'] = [
        "NIM" => $NIM,
        "Nama_Lengkap" => $Nama_Lengkap,
        "Tempat_Lahir" => $Tempat_Lahir,
        "Tgl_Lahir" => $Tanggal_Lahir,
        "Hobi" => $Hobi,
        "Pasangan" => $Pasangan,
        "Pekerjaan" => $Pekerjaan,
        "Nama_Ortu" => $Nama_Ortu,
        "Nama_Kakak" => $Nama_Kakak,
        "Nama_Adik" => $Nama_Adik
    ];
    $_SESSION['flash_gagal'] = 'Data gagal diperbaharui. Silakan coba lagi.';
    redirect_ke('biomhsss_edit.php?bId=' . (int)$bId);
}
mysqli_stmt_close($stmt);
redirect_ke('biomhsss_edit.php?bId=' . (int)$bId);
