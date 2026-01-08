<?php
function redirect_ke($url)
{
  header("Location: " . $url);
  exit();
}
?>

<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

$bId = filter_input(INPUT_GET, 'bId', FILTER_VALIDATE_INT, [
  'options' => ['min_range' => 1]
]);

if (!$bId) {
  $_SESSION['flash_gagal'] = 'Akses tidak valid.';
  redirect_ke('biomhsss_read.php');
}

$stmt = mysqli_prepare($conn, "SELECT bId, BNIM, bNama_Lengkap, bTempat_Lahir, bTgl_Lahir, bHobi, bPasangan, bPekerjaan, bNama_Ortu, bNama_Kakak, bNama_Adik 
FROM tbl_biomhsss WHERE bId = ? LIMIT 1");
if (!$stmt) {
  $_SESSION['flash_gagal'] = 'Query tidak benar.';
  redirect_ke('biomhsss_read.php');
}

mysqli_stmt_bind_param($stmt, "i", $bId);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($res);
mysqli_stmt_close($stmt);
if (!$row) {
  $_SESSION['flash_gagal'] = 'Record tidak ditemukan.';
  redirect_ke('biomhsss_read.php');
}

$NIM = $row['BNIM'] ?? "";
$Nama_Lengkap = $row["bNama_Lengkap"] ?? "";
$Tempat_Lahir = $row["bTempat_Lahir"] ?? "";
$Tgl_Lahir = $row["bTgl_Lahir"] ?? "";
$hobi = $row["bHobi"] ?? "";
$pasangan = $row["bPasangan"] ?? "";
$pekerjaan = $row["bPekerjaan"] ?? "";
$ortu = $row["bNama_Ortu"] ?? "";
$kakak = $row["bNama_Kakak"] ?? "";
$adik = $row["bNama_Adik"] ?? "";
$flash_gagal = $_SESSION['flash_gagal'] ?? '';
$outdated = $_SESSION['outdated'] ?? [];
unset($_SESSION['flash_gagal'], $_SESSION['outdated']);

if (!empty($outdated)) {
  $NIM = $outdated['nim'] ?? $NIM;
  $Nama_Lengkap = $outdated['Nama_Lengkap'] ?? $Nama_Lengkap;
  $Tempat_Lahir = $outdated['Tempat_Lahir'] ?? $Tempat_Lahir;
  $Tgl_Lahir = $outdated['Tgl_Lahir'] ?? $Tgl_Lahir;
  $Hobi = $outdated['Hobi'] ?? $Hobi;
  $Pasangan = $outdated['Pasangan'] ?? $Pasangan;
  $Pekerjaan = $outdated['Pekerjaan'] ?? $Pekerjaan;
  $Nama_Ortu = $outdated['Nama_Ortu'] ?? $Nama_Ortu;
  $Nama_Kakak = $outdated['Nama_Kakak'] ?? $Nama_Kakak;
  $Nama_Adik = $outdated['Nama_Adik'] ?? $Nama_Adik;
}
?>


<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Judul Halaman</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <h1>Ini Header</h1>
    <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation" &#9776;></button>
    <nav>
      <ul>
        <li><a href="#home">Beranda</a></li>
        <li><a href="#about">Tentang</a></li>
        <li><a href="#contact">Kontak</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <section id="biodata">
      <h2>Edit Biodata</h2>
      <?php if (!empty($flash_gagal)): ?>
        <div style="padding:10px; margin-bottom:10px; background:#f8d7da; color:#721c24; border-radius:6px;">
          <?= $flash_gagal; ?>
        </div>
      <?php endif; ?>
      <form action="biomhsss_proses_update.php" method="POST">
        <input type="text" name="bId" value="<?= (int)$bId ?>">

        <label for="txtNIM"><span>NIM:</span>
          <input type="text" id="txtNIM" name="txtNIM" placeholder="Masukkan NIM"
            value="<?= !empty($NIM) ? $NIM : '' ?>">
        </label>

        <label for="txtNama_Lengkap"><span>Nama Lengkap:</span>
          <input type="text" id="txtNama_Lengkap" name="txtNama_Lengkap" placeholder="Masukkan Nama Lengkap"
            value="<?= !empty($Nama_Lengkap) ? $Nama_Lengkap : '' ?>">
        </label>

        <label for="txtTempat_Lahir"><span>Tempat Lahir:</span>
          <input type="text" id="txtTempat_Lahir" name="txtTempat_Lahir" placeholder="Masukkan Tempat Lahir"
            value="<?= !empty($Tempat_Lahir) ? $Tempat_Lahir : '' ?>">
        </label>

        <label for="txtTgl_Lahir"><span>Tanggal Lahir:</span>
          <input type="text" id="txtTgl_Lahir" name="txtTgl_Lahir" placeholder="Masukkan Tanggal Lahir"
            value="<?= !empty($Tgl_Lahir) ? $Tgl_Lahir : '' ?>">
        </label>

        <label for="txtHobi"><span>Hobi:</span>
          <input type="text" id="txtHobi" name="txtHobi" placeholder="Masukkan Hobi"
            value="<?= !empty($Hobi) ? $Hobi : '' ?>">
        </label>

        <label for="txtPasangan"><span>Pasangan:</span>
          <input type="text" id="txtPasangan" name="txtPasangan" placeholder="Masukkan Pasangan"
            value="<?= !empty($Pasangan) ? $Pasangan : '' ?>">
        </label>

        <label for="txtPekerjaan"><span>Pekerjaan:</span>
          <input type="text" id="txtPekerjaan" name="txtPekerjaan" placeholder="Masukkan Pekerjaan"
            value="<?= !empty($Pekerjaan) ? $Pekerjaan : '' ?>">
        </label>

        <label for="txtNama_Ortu"><span>Nama Orang Tua:</span>
          <input type="text" id="txtNama_Ortu" name="txtNama_Ortu" placeholder="Masukkan Nama Orang Tua"
            value="<?= !empty($Nama_Ortu) ? $Nama_Ortu : '' ?>">
        </label>

        <label for="txtNama_Kakak"><span>Nama Kakak:</span>
          <input type="text" id="txtNama_Kakak" name="txtNama_Kakak" placeholder="Masukkan Nama Kakak"
            value="<?= !empty($Nama_Kakak) ? $Nama_Kakak : '' ?>">
        </label>

        <label for="txtNama_Adik"><span>Nama Adik:</span>
          <input type="text" id="txtNama_Adik" name="txtNama_Adik" placeholder="Masukkan Nama Adik"
            value="<?= !empty($Nama_Adik) ? $Nama_Adik : '' ?>">
        </label>
        

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
        <a href="biomhsss_read.php" class="reset">Kembali</a>
      </form>
    </section>
  </main>
  <script src="script.js"></script>
</body>

</html>