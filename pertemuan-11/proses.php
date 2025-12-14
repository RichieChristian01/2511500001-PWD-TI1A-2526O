<?php
function redirect_ke($url)
{
  header("Location: " . $url);
  exit();
}
?>

<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] !== 'POST') {
  $_SESSION["flash_error"] = 'Akses tidak valid.';
  redirect_ke("index.php#contact");
}

require_once 'fungsi.php';
$nama = bersihkan($_POST["txtNama"] ?? "");
$email = bersihkan($_POST["txtEmail"] ?? "");
$pesan = bersihkan($_POST["txtPesan"] ?? "");
$captcha = $_POST["txtCaptcha"] ?? "";
$jawaban = $_SESSION["jawaban"] ?? null;

$errors = []; 

if ($nama === "") {
  $errors[] = "Nama Wajib diisi.";
} elseif (mb_strlen($nama)<3) {
  $errors[] = "Nama minimal 3 karakter.";
}

if ($email === "") {
  $errors[] = "Email Wajib diisi.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errors[] = "Format Email tidak valid.";
}

if ($pesan === "") {
  $errors[] = "Pesan Wajib diisi.";
} elseif (mb_strlen($pesan)<10) {
  $errors[] = "Pesan minimal 10 karakter.";
} elseif (mb_strlen($pesan)>200) {
  $errors[] = "Pesan maksimal 200 karakter.";
}

if ($captcha === "") {
  $errors[] = "Captcha wajib diisi.";
} elseif (!is_numeric($captcha) || (int)$captcha !==(int)$jawaban) {
  $errors[] = "Captcha anda salah.";
}

require 'koneksi.php';
if (!empty($errors)) {
  $_SESSION['old'] = [
    "nama"  => $nama,
    "email" => $email,
    "pesan" => $pesan,
  ];

  $_SESSION["flash_error"] = implode("<br>", $errors);
  redirect_ke("index.php#contact");
}

$sql = "INSERT INTO tbl_tamu (cnama, cmail, cpesan) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

if(!$stmt) {
  $_SESSION["flash_error"] = 'Terjadi kesalahan sistem (prepare gagal).';
  redirect_ke("index.php#contact");
}

mysqli_stmt_bind_param($stmt, "sss", $nama, $email, $pesan);

if(mysqli_stmt_execute($stmt)) {
  unset($_SESSION["old"]);
  $_SESSION["flash_sukses"] = 'Terima kasih, data anda sudah tersimpan.';
  redirect_ke("index.php#contact");
} else {
  $_SESSION["old"] = [
    "nama"  => $nama,
    "email" => $email,
    "pesan" => $pesan,
  ];
  $_SESSION["flash_error"] = 'Data gagal disimpan, Silahkan coba lagi.';
  redirect_ke("index.php#contact");
}

mysqli_stmt_close($stmt);

$arrBiodata = [
  "nim" => $_POST["txtNim"] ?? "",
  "nama" => $_POST["txtNmLengkap"] ?? "",
  "tempat" => $_POST["txtT4Lhr"] ?? "",
  "tanggal" => $_POST["txtTglLhr"] ?? "",
  "hobi" => $_POST["txtHobi"] ?? "",
  "pasangan" => $_POST["txtPasangan"] ?? "",
  "pekerjaan" => $_POST["txtKerja"] ?? "",
  "ortu" => $_POST["txtNmOrtu"] ?? "",
  "kakak" => $_POST["txtNmKakak"] ?? "",
  "adik" => $_POST["txtNmAdik"] ?? ""
];
$_SESSION["biodata"] = $arrBiodata;
header("location: index.php#about");
exit();
?>