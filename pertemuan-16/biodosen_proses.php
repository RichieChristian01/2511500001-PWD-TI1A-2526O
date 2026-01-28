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
$kdosen = bersih($_POST["txtkdosen"]) ?? "";
$Nmdosen = bersih($_POST["txtNmdosen"]) ?? "";
$Almt = bersih($_POST["txtAlmt"]) ?? "";
$Tgl = bersih($_POST["txtTgl"]) ?? "";
$JJA = bersih($_POST["txtJJA"]) ?? "";
$Prodi = bersih($_POST["txtProdi"]) ?? "";
$NOHP = bersih($_POST["txtNOHP"]) ?? "";
$Pasangan = bersih($_POST["txtPasangan"]) ?? "";
$Anak = bersih($_POST["txtAnak"]) ?? "";
$IlmuDosen = bersih($_POST["txtIlmuDosen"]) ?? "";



$error = [];

if ($kdosen === "") {
    $error[] = "Kdosen wajib diisi.";
} elseif (mb_strlen($kdosen) > 10) {
    $error[] = "Kdosen maksimal 10 karakter.";
}

if ($Nmdosen === "") {
    $error[] = "Nama wajib diisi.";
} elseif (mb_strlen($Nmdosen) < 2) {
    $error[] = "Nama minimal 2 karakter.";
}

if ($Almt === "") {
    $error[] = "Alamat tidak boleh kosong mohon diisi";
}

if ($Tgl === "") {
    $error[] = "Tanggal Jadi tidak boleh kosong mohon diisi";
}

if ($JJA === "") {
    $error[] = "JJA tidak boleh kosong mohon diisi";
}

if ($Prodi === "") {
    $error[] = "Prodi tidak boleh kosong mohon diisi";
}

if ($NOHP === "") {
    $error[] = "Tidak boleh kosong mohon diisi";
}

if ($Pasangan === "") {
    $error[] = "Pasangan tidak boleh kosong mohon diisi";
}

if ($Anak === "") {
    $error[] = "Nama Anak tidak boleh kosong mohon diisi";
}

if ($IlmuDosen === "") {
    $error[] = "Bidang Ilmu Dosen tidak boleh kosong mohon diisi";
}




require 'koneksi.php';
if (!empty($error)) {
    $_SESSION["outdated"] = [
        "Kdosen" => $kdosen,
        "Nmdosen" => $Nmdosen,
        "Almt" => $Almt,
        "Tgl" => $Tgl,
        "JJA" => $JJA,
        "Prodi" => $Prodi,
        "NOHP" => $NOHP,
        "Pasangan" => $Pasangan,
        "Anak" => $Anak,
        "IlmuDosen" => $IlmuDosen

    ];

    $_SESSION["flash_gagal"] = implode("<br>", $error);
    redirect_ke("index.php#biodata");
}

$sql = "INSERT INTO `tbl_biodosen` (bKdosen, bNmdosen, bAlmt, bTgl, bJJA, bProdi, bNOHP, bPasangan, bAnak, bIlmuDosen) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);


if (!$stmt) {
    $_SESSION["flash_gagal"] = "Terjadi kesalahan pada server (prepare gagal).";
    redirect_ke("index.php#biodata");
}

mysqli_stmt_bind_param($stmt, "ssssssssss", $kdosen, $Nmdosen, $Almt, $Tgl, $JJA, $Prodi, $NOHP, $Pasangan, $Anak, $IlmuDosen);

if (mysqli_stmt_execute($stmt)) {
    unset($_SESSION["outdated"]);
    $_SESSION["flash_berhasil"] = "Terima kasih, pesan Anda telah tersimpan.";
    redirect_ke("index.php#biodata");
} else {
    $_SESSION["outdated"] =
        [
        "Kdosen" => $kdosen,
        "Nmdosen" => $Nmdosen,
        "Almt" => $Almt,
        "Tgl" => $Tgl,
        "JJA" => $JJA,
        "Prodi" => $Prodi,
        "NOHP" => $NOHP,
        "Pasangan" => $Pasangan,
        "Anak" => $Anak,
        "IlmuDosen" => $IlmuDosen
        ];
    $_SESSION["flash_gagal"] = "Gagal menyimpan pesan silakan coba lagi.";
    redirect_ke("index.php#biodata");
}
mysqli_stmt_close($stmt);



?>