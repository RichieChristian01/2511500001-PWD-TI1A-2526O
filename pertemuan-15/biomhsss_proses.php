<?php function redirect_ke($url)
{
    header("Location: " . $url);
    exit();
}
?>

<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    $_SESSION["flash_gagal"] = "Akses tidak valid.";
    redirect_ke("index.php#biodata");
}
require_once 'fungsi.php';
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
    $error[] = "NIM maksimal 10 karakter.";
}

if ($Nama_Lengkap === "") {
    $error[] = "Nama wajib diisi.";
} elseif (mb_strlen($Nama_Lengkap) < 2) {
    $error[] = "Nama minimal 2 karakter.";
}

if ($Tempat_Lahir === "") {
    $error[] = "Tidak boleh kosong mohon diisi";
}

if ($Tgl_Lahir === "") {
    $error[] = "Tidak boleh kosong mohon diisi";
}

if ($Hobi === "") {
    $error[] = "Tidak boleh kosong mohon diisi";
}

if ($Pasangan === "") {
    $error[] = "Tidak boleh kosong mohon diisi";
}

if ($Pekerjaan === "") {
    $error[] = "Tidak boleh kosong mohon diisi";
}

if ($Nama_Ortu === "") {
    $error[] = "Tidak boleh kosong mohon diisi";
}

if ($Nama_Kakak === "") {
    $error[] = "Tidak boleh kosong mohon diisi";
}

if ($Nama_Adik === "") {
    $error[] = "Tidak boleh kosong mohon diisi";
}




require 'koneksi.php';
if (!empty($error)) {
    $_SESSION["outdated"] = [
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

    $_SESSION["flash_gagal"] = implode("<br>", $error);
    redirect_ke("index.php#biodata");
}

$sql = "INSERT INTO `tbl_biomhsss` (BNIM, bNama_Lengkap, bTempat_Lahir, bTgl_Lahir, bHobi, bPasangan, bPekerjaan, bNama_Ortu, bNama_Kakak, bNama_Adik) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);


if (!$stmt) {
    $_SESSION["flash_gagal"] = "Terjadi kesalahan pada server (prepare gagal).";
    redirect_ke("index.php#biodata");
}

mysqli_stmt_bind_param($stmt, "ssssssssss", $NIM, $Nama_Lengkap, $Tempat_Lahir, $Tgl_Lahir, $Hobi, $Pasangan, $Pekerjaan, $Nama_Ortu, $Nama_Kakak, $Nama_Adik);

if (mysqli_stmt_execute($stmt)) {
    unset($_SESSION["outdated"]);
    $_SESSION["flash_berhasil"] = "Terima kasih, pesan Anda telah tersimpan.";
    redirect_ke("index.php#biodata");
} else {
    $_SESSION["outdated"] =
        [
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
    $_SESSION["flash_gagal"] = "Gagal menyimpan pesan silakan coba lagi.";
    redirect_ke("index.php#biodata");
}
mysqli_stmt_close($stmt);



?>