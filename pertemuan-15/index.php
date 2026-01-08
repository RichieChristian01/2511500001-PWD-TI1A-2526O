<?php
session_start();
require_once __DIR__ . "/fungsi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Judul Halaman</title>
  <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
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
    <section id="home">
      <h2>Selamat Datang</h2>
      <?php
      echo "halo dunia!<br>";
      echo "nama saya hadi";
      ?>
      <p>Ini contoh paragraf HTML.</p>
    </section>

    <?php
    $flash_berhasil = $_SESSION["flash_berhasil"] ?? "";
    $flash_gagal = $_SESSION["flash_gagal"] ?? "";
    $outdated = $_SESSION["outdated"] ?? [];

    unset($_SESSION["flash_berhasil"], $_SESSION["flash_gagal"], $_SESSION["outdated"]);
    ?>
    <section id="biodata">
      <h2>Biodata Sederhana Mahasiswa</h2>

       <?php if (!empty($flash_berhasil)): ?>
        <div style="padding:10px; margin-bottom: 10px; background-color: #d4edda; color: #155724; border-radius: 6px;">
          <?= $flash_berhasil; ?>
        <?php endif; ?>

        <?php if (!empty($flash_gagal)): ?>
          <div style="padding:10px; margin-bottom: 10px; background-color: #f8d7da; color: #721c24; border-radius: 6px;">
            <?= $flash_gagal; ?>
          <?php endif; ?>

      <form action="biomhsss_proses.php" method="POST">

        <label for="txtNIM"><span>NIM:</span>
          <input type="text" id="txtNIM" name="txtNIM" placeholder="Masukkan NIM" 
          value="<?= isset($outdated["NIM"]) ? htmlspecialchars($outdated["NIM"]) : '' ?>">
        </label>

        <label for="txtNama_Lengkap"><span>Nama Lengkap:</span>
          <input type="text" id="txtNama_Lengkap" name="txtNama_Lengkap" placeholder="Masukkan Nama Lengkap" 
          value="<?= isset($outdated["Nama_Lengkap"]) ? htmlspecialchars($outdated["Nama_Lengkap"]) : '' ?>">
        </label>

        <label for="txtTempat_Lahir"><span>Tempat Lahir:</span>
          <input type="text" id="txtTempat_Lahir" name="txtTempat_Lahir" placeholder="Masukkan Tempat Lahir" 
          value="<?= isset($outdated["Tempat_Lahir"]) ? htmlspecialchars($outdated["Tempat_Lahir"]) : '' ?>">
        </label>

        <label for="txtTgl_Lahir"><span>Tanggal Lahir:</span>
          <input type="text" id="txtTgl_Lahir" name="txtTgl_Lahir" placeholder="Masukkan Tanggal Lahir" 
          value="<?= isset($outdated["Tgl_Lahir"]) ? htmlspecialchars($outdated["Tgl_Lahir"]) : '' ?>">
        </label>

        <label for="txtHobi"><span>Hobi:</span>
          <input type="text" id="txtHobi" name="txtHobi" placeholder="Masukkan Hobi" 
          value="<?= isset($outdated["Hobi"]) ? htmlspecialchars($outdated["Hobi"]) : '' ?>">
        </label>

        <label for="txtPasangan"><span>Pasangan:</span>
          <input type="text" id="txtPasangan" name="txtPasangan" placeholder="Masukkan Pasangan" 
          value="<?= isset($outdated["Pasangan"]) ? htmlspecialchars($outdated["Pasangan"]) : '' ?>">
        </label>

        <label for="txtPekerjaan"><span>Pekerjaan:</span>
          <input type="text" id="txtPekerjaan" name="txtPekerjaan" placeholder="Masukkan Pekerjaan" 
          value="<?= isset($outdated["Pekerjaan"]) ? htmlspecialchars($outdated["Pekerjaan"]) : '' ?>">
        </label>

        <label for="txtNama_Ortu"><span>Nama Orang Tua:</span>
          <input type="text" id="txtNama_Ortu" name="txtNama_Ortu" placeholder="Masukkan Nama Orang Tua" 
          value="<?= isset($outdated["Nama_Ortu"]) ? htmlspecialchars($outdated["Nama_Ortu"]) : '' ?>">
        </label>

        <label for="txtNama_Kakak"><span>Nama Kakak:</span>
          <input type="text" id="txtNama_Kakak" name="txtNama_Kakak" placeholder="Masukkan Nama Kakak" 
          value="<?= isset($outdated["Nama_kakak"]) ? htmlspecialchars($outdated["Nama_Kakak"]) : '' ?>">
        </label>

        <label for="txtNama_Adik"><span>Nama Adik:</span>
          <input type="text" id="txtNama_Adik" name="txtNama_Adik" placeholder="Masukkan Nama Adik" 
          value="<?= isset($outdated["Nama_Adik"]) ? htmlspecialchars($outdated["Nama_Adik"]) : '' ?>">
        </label>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>

    </section>

    <section id="about">
      <h2>Tentang Saya</h2>
      <?php include 'biomhsss_inc.php'; ?>
    </section>

    <?php
    $flash_sukses = $_SESSION["flash_sukses"] ?? "";
    $flash_error = $_SESSION["flash_error"] ?? "";
    $old = $_SESSION["old"] ?? [];

    unset($_SESSION["flash_sukses"], $_SESSION["flash_error"], $_SESSION["old"]);
    ?>

    <?php
    $a = rand(1, 9);
    $b = rand(1, 9);
    $_SESSION["jawaban"] = $a + $b;
    ?>


    <section id="contact">
      <h2>Kontak Kami</h2>

      <?php if (!empty($flash_sukses)): ?>
        <div style="padding:10px; margin-bottom: 10px; background-color: #d4edda; color: #155724; border-radius: 6px;">
          <?= $flash_sukses; ?>
        <?php endif; ?>

        <?php if (!empty($flash_error)): ?>
          <div style="padding:10px; margin-bottom: 10px; background-color: #f8d7da; color: #721c24; border-radius: 6px;">
            <?= $flash_error; ?>
          <?php endif; ?>

          <form action="proses.php" method="POST">

            <label for="txtNama"><span>Nama:</span>
              <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan nama" autocomplete="name"
                value="<?= isset($old["nama"]) ? htmlspecialchars($old["nama"]) : '' ?>">
            </label>

            <label for="txtEmail"><span>Email:</span>
              <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan email" autocomplete="email"
                value="<?= isset($old["email"]) ? htmlspecialchars($old["email"]) : '' ?>">
            </label>

            <label for="txtPesan"><span>Pesan Anda:</span>
              <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..."
                value="<?= isset($old["pesan"]) ? htmlspecialchars($old["pesan"]) : '' ?>"></textarea>
              <small id="charCount">0/200 karakter</small>
            </label>
            <label for="txtbot_verification">
              <span>Berapa <?= $a ?> + <?= $b ?> ?</span>
              <input type="number" id="txtbot_verification" name="txtbot_verification" placeholder="Jawaban" >
            </label>

            <button type="submit">Kirim</button>
            <button type="reset">Batal</button>
          </form>

    </section>
    <section id="read">
      <h2>Yang Menghubungi Kami</h2>
      <?php include 'read_inc.php'; ?>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 Yohanes Setiawan Japriadi [0344300002]</p>
  </footer>

  <script src="script.js"></script>
</body>

</html>