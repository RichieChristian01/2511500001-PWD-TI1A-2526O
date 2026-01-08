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

        <label for="txtNim"><span>NIM:</span>
          <input type="text" id="txtNim" name="txtNim" placeholder="Masukkan NIM" 
          value="<?= isset($outdated["nim"]) ? htmlspecialchars($outdated["nim"]) : '' ?>">
        </label>

        <label for="txtNmLengkap"><span>Nama Lengkap:</span>
          <input type="text" id="txtNmLengkap" name="txtNmLengkap" placeholder="Masukkan Nama Lengkap" 
          value="<?= isset($outdated["NmLengkap"]) ? htmlspecialchars($outdated["NmLengkap"]) : '' ?>">
        </label>

        <label for="txtTempatLhr"><span>Tempat Lahir:</span>
          <input type="text" id="txtTempatLhr" name="txtTempatLhr" placeholder="Masukkan Tempat Lahir" 
          value="<?= isset($outdated["tempatlhr"]) ? htmlspecialchars($outdated["tempatlhr"]) : '' ?>">
        </label>

        <label for="txtTglLhr"><span>Tanggal Lahir:</span>
          <input type="text" id="txtTglLhr" name="txtTglLhr" placeholder="Masukkan Tanggal Lahir" 
          value="<?= isset($outdated["tanggallhr"]) ? htmlspecialchars($outdated["tanggallhr"]) : '' ?>">
        </label>

        <label for="txtHobi"><span>Hobi:</span>
          <input type="text" id="txtHobi" name="txtHobi" placeholder="Masukkan Hobi" 
          value="<?= isset($outdated["hobi"]) ? htmlspecialchars($outdated["hobi"]) : '' ?>">
        </label>

        <label for="txtPasangan"><span>Pasangan:</span>
          <input type="text" id="txtPasangan" name="txtPasangan" placeholder="Masukkan Pasangan" 
          value="<?= isset($outdated["pasangan"]) ? htmlspecialchars($outdated["pasangan"]) : '' ?>">
        </label>

        <label for="txtKerja"><span>Pekerjaan:</span>
          <input type="text" id="txtKerja" name="txtKerja" placeholder="Masukkan Pekerjaan" 
          value="<?= isset($outdated["pekerjaan"]) ? htmlspecialchars($outdated["pekerjaan"]) : '' ?>">
        </label>

        <label for="txtNmOrtu"><span>Nama Orang Tua:</span>
          <input type="text" id="txtNmOrtu" name="txtNmOrtu" placeholder="Masukkan Nama Orang Tua" 
          value="<?= isset($outdated["ortu"]) ? htmlspecialchars($outdated["ortu"]) : '' ?>">
        </label>

        <label for="txtNmKakak"><span>Nama Kakak:</span>
          <input type="text" id="txtNmKakak" name="txtNmKakak" placeholder="Masukkan Nama Kakak" 
          value="<?= isset($outdated["kakak"]) ? htmlspecialchars($outdated["kakak"]) : '' ?>">
        </label>

        <label for="txtNmAdik"><span>Nama Adik:</span>
          <input type="text" id="txtNmAdik" name="txtNmAdik" placeholder="Masukkan Nama Adik" 
          value="<?= isset($outdated["adik"]) ? htmlspecialchars($outdated["adik"]) : '' ?>">
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