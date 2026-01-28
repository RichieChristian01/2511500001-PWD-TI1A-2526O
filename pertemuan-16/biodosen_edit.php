<?php
  session_start();
  require 'koneksi.php';
  require 'fungsi.php';

  
  $bId = filter_input(INPUT_GET, 'bId', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
  ]);
  
  if (!$bId) {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('biodosen_read.php');
  }

 
  $stmt = mysqli_prepare($conn, "SELECT bId, bkdosen, bNmdosen, bAlmt, bTgl, bJJA, bProdi, bNOHP, bPasangan, bAnak, bIlmuDosen 
FROM tbl_biodosen WHERE bId = ? LIMIT 1");
if (!$stmt) {
  $_SESSION['flash_gagal'] = 'Query tidak benar.';
  redirect_ke('biodosen_read.php');
}

  mysqli_stmt_bind_param($stmt, "i", $bId);
  mysqli_stmt_execute($stmt);
  $res = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($res);
  mysqli_stmt_close($stmt);

  if (!$row) {
    $_SESSION['flash_error'] = 'Record tidak ditemukan.';
    redirect_ke('biodosen_read.php');
  }

    $kdosen = $row['bkdosen'] ?? "";
    $Nmdosen = $row["bNmdosen"] ?? "";
    $Almt = $row["bAlmyt"] ?? "";
    $Tgl = $row["bTgl"] ?? "";
    $JJA = $row["bJJA"] ?? "";
    $Prodi = $row["bProdi"] ?? "";
    $NOHP = $row["bNOHP"] ?? "";
    $Pasangan = $row["bPasangan"] ?? "";
    $Anak = $row["bAnak"] ?? "";
    $IlmuDosen = $row["bIlmuDosen"] ?? "";
    $flash_gagal = $_SESSION['flash_gagal'] ?? '';
    $outdated = $_SESSION['outdated'] ?? [];
    unset($_SESSION['flash_gagal'], $_SESSION['outdated']);

if (!empty($outdated)) {
  $kdosen = $outdated['kddosen'] ?? $kodsen;
  $Nmdosen = $outdated['Nmdosen'] ?? $Nmdosen;
  $Almt = $outdated['Almt'] ?? $Almt;
  $Tgl = $outdated['Tgl'] ?? $Tgl;
  $JJA = $outdated['JJA'] ?? $JJA;
  $Prodi = $outdated['Prodi'] ?? $Prodi;
  $NOHP = $outdated['NOHP'] ?? $NOHP;
  $Pasangan = $outdated['Pasangan'] ?? $Pasangan;
  $Anak = $outdated['Anak'] ?? $Anak;
  $IlmuDosen = $outdated['IlmuDosen'] ?? $IlmuDosen;
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
      <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">
        &#9776;
      </button>
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
      <form action="biodosen_proses_update.php" method="POST">
        <input type="text" name="bId" value="<?= (int)$bId ?>">

        <label for="txtkdosen"><span>Kode Dosen</span>
          <input type="text" id="txtkdosen" name="txtkdosen" placeholder="Masukkan Kode DOsen"
            value="<?= !empty($kdosen) ? $kdosen : '' ?>">
        </label>

        <label for="txtNmdosen"><span>Nama Dosen:</span>
          <input type="text" id="txtNmdosen" name="txtNmdosen" placeholder="Masukkan Nama Dosen"
            value="<?= !empty($Nmdosen) ? $Nmdosen : '' ?>">
        </label>

        <label for="txtAlmt"><span>Alamat:</span>
          <input type="text" id="txtAlmt" name="txtAlmt" placeholder="Masukkan Alamat"
            value="<?= !empty($Almt) ? $Almt : '' ?>">
        </label>

        <label for="txtTgl"><span>Tanggal Jadi Dosen:</span>
          <input type="text" id="txtTgl" name="txtTgl_Lahir" placeholder="Masukkan Jadi Dosen"
            value="<?= !empty($Tgl) ? $Tgl : '' ?>">
        </label>

        <label for="txtJJA"><span>JJA Dosen:</span>
          <input type="text" id="txtJJA" name="txtJJA" placeholder="Masukkan JJA Dosen"
            value="<?= !empty($JJA) ? $JJA : '' ?>">
        </label>

        <label for="txtProdi"><span>Homebase Prodi:</span>
          <input type="text" id="txtProdi" name="txtProdi" placeholder="Masukkan Homebase Prodi"
            value="<?= !empty($Prodi) ? $Prodi : '' ?>">
        </label>

        <label for="txtNOHP"><span>Nomor HP:</span>
          <input type="text" id="txtNOHP" name="txtNama_Ortu" placeholder="Masukkan Nomor HP"
            value="<?= !empty($NOHP) ? $NOHP : '' ?>">
        </label>

        <label for="txtPasangan"><span>Pasangan:</span>
          <input type="text" id="txtPasangan" name="txtPasangan" placeholder="Masukkan Nama Pasangan"
            value="<?= !empty($Pasangan) ? $Pasangan : '' ?>">
        </label>

        <label for="txtAnak"><span>Nama Anak:</span>
          <input type="text" id="txtAnak" name="txtAnak" placeholder="Masukkan Nama Anak"
            value="<?= !empty($Anak) ? $Anak : '' ?>">
        </label>

        <label for="txtIlmuDosen"><span>Nama Adik:</span>
          <input type="text" id="txtIlmuDosen" name="txtIlmuDosen" placeholder="Masukkan Bidang Ilmu Dosen"
            value="<?= !empty($IlmuDosen) ? $IlmuDosen : '' ?>">
        </label>
        
          <button type="submit">Kirim</button>
          <button type="reset">Batal</button>
          <a href="biodosen_read.php" class="reset">Kembali</a>
        </form>
      </section>
    </main>

    <script src="script.js"></script>
  </body>
</html>