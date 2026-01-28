<?php
session_start();
require_once __DIR__ . '/fungsi.php';
?>

<!DOCTYPE html>
<html lang="en">

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
    <section id="home">
      <h2>Selamat Datang</h2>
      <?php
      echo "halo dunia!<br>";
      echo "nama saya hadi";
      ?>
      <p>Ini contoh paragraf HTML.</p>
    </section>

    <section id="biodata">
      <h2>Biodata Dosen</h2>
      <form action="biodosen_proses.php" method="POST">

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
      </form>
    </section>




    <section id="about">
      <h2>Tentang Saya</h2>
      <?php include 'biodosen_inc.php'; ?>
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