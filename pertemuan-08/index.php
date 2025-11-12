<?php
session_start();

$sesNIM = "";
if (isset($_SESSION["NIM"])):
  $sesNIM = $_SESSION["NIM"];
endif;

$sesNamaLengkap = "";
if (isset($_SESSION["NamaLengkap"])):
  $sesNamaLengkap = $_SESSION["NamaLengkap"];
endif;

$sesTempatLahir = "";
if (isset($_SESSION["TempatLahir"])):
  $sesTempatLahir = $_SESSION["TempatLahir"];
endif;

$sesTanggalLahir = "";
if (isset($_SESSION["TanggalLahir"])):
  $sesTanggalLahir = $_SESSION["TanggalLahir"];
endif;

$sesHobi = "";
if (isset($_SESSION["Hobi"])):
  $sesHobi = $_SESSION["Hobi"];
endif;

$sesPasangan = "";
if (isset($_SESSION["Pasangan"])):
  $sesPasangan = $_SESSION["Pasangan"];
endif;

$sesNamaOrangTua = "";
if (isset($_SESSION["NamaOrangTua"])):
  $sesNamaOrangTua = $_SESSION["NamaOrangTua"];
endif;

$sesNamaKakak = "";
if (isset($_SESSION["NamaKakak"])):
  $sesNamaKakak = $_SESSION["NamaKakak"];
endif;

$sesNamaAdik = "";
if (isset($_SESSION["NamaAdik"])):
  $sesNamaAdik = $_SESSION["NamaAdik"];
endif;

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

    <section id="pendaftaran">
      <h2>Pendaftaran Profil Pengunjung</h2>
        <form action="about_proses.php" method="POST">

        <label for="txtNIM"><span>NIM:</span>
          <input type="text" id="txtNIM" name="txtNIM" placeholder="Masukkan NIM" required autocomplete="NIM">
        </label>

        <label for="txtNamaLengkap"><span>Nama Lengkap:</span>
          <input type="text" id="txtNamaLengkap" name="txtNamaLengkap" placeholder="Masukkan Nama Lengkap" required autocomplete="Nama_Lengkap">
        </label>

        <label for="txtTempatLahir"><span>Tempat Lahir:</span>
          <input type="text" id="txtTempatLahir" name="txtTempatLahir" placeholder="Masukkan Tempat Lahir" required autocomplete="Tempat_Lahir">
        </label>

        <label for="txtTanggalLahir"><span>Tanggal Lahir:</span>
          <input type="date" id="txtTanggalLahir" name="txtTanggalLahir" placeholder="Masukkan Tanggal Lahir" required autocomplete="Tanggal_Lahir">
        </label>

        <label for="txtHobi"><span>Hobi:</span>
          <input type="text" id="txtHobi" name="txtHobi" placeholder="Masukkan Hobi" required autocomplete="Hobi">
        </label>

        <label for="txtPasangan"><span>Pasangan:</span>
          <input type="text" id="txtPasangan" name="txtPasangan" placeholder="Masukkan Nama Pasangan" required autocomplete=" Pasangan">
        </label>

        <label for="txtNamaOrangTua"><span>Nama Orang Tua:</span>
          <input type="text" id="txtNamaOrangTua" name="txtNamaOrangTua" placeholder="Masukkan Nama Orang Tua" required autocomplete="Nama_Orang_Tua">
        </label>

        <label for="txtNamaKakak"><span>Nama Kakak:</span>
          <input type="text" id="txtNamaKakak" name="txtNamaKakak" placeholder="Masukkan Nama Kakak" required autocomplete="Nama_Kakak">
        </label>

        <label for="txtNamaAdik"><span>Nama Adik:</span>
          <input type="text" id="txtNamaAdik" name="txtNamaAdik" placeholder="Masukkan Nama Adik" required autocomplete="Nama_Adik">
        </label>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>
    </section>

    <section id="about">
      <h2>Tentang Saya</h2>
      <p><strong>NIM:</strong> <?php echo $sesNIM; ?>
      </p>
      <p><strong>Nama Lengkap:</strong> <?php echo $sesNamaLengkap;?> &#128526;
      </p>
      <p><strong>Tempat Lahir:</strong> <?php echo $sesTempatLahir; ?></p>
      <p><strong>Tanggal Lahir:</strong> <?php echo $sesTanggalLahir;?></p>
      <p><strong>Hobi:</strong> <?php echo $sesHobi; ?> </p>
      <p><strong>Pasangan:</strong> <?php echo $sesPasangan; ?> </p>
      <p><strong>Nama Orang Tua:</strong> <?php echo $sesNamaOrangTua;?> </p>
      <p><strong>Nama Kakak:</strong> <?php echo $sesNamaKakak; ?> </p>
      <p><strong>Nama Adik:</strong> <?php echo $sesNamaAdik; ?> </p>
      
    </section>

    <section id="contact">
      <h2>Kontak Kami</h2>
      <form action="proses.php" method="POST">

        <label for="txtNama"><span>Nama:</span>
          <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan nama" required autocomplete="name">
        </label>

        <label for="txtEmail"><span>Email:</span>
          <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan email" required autocomplete="email">
        </label>

        <label for="txtPesan"><span>Pesan Anda:</span>
          <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..." required></textarea>
          <small id="charCount">0/200 karakter</small>
        </label>


        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>

      <?php if (!empty($sesnama)): ?>
        <br><hr>
        <h2>Yang menghubungi kami</h2>
        <p><strong>Nama :</strong> <?php echo $sesnama ?></p>
        <p><strong>Email :</strong> <?php echo $sesemail ?></p>
        <p><strong>Pesan :</strong> <?php echo $sespesan ?></p>
      <?php endif; ?>



    </section>
  </main>

  <footer>
    <p>&copy; 2025 Yohanes Setiawan Japriadi [0344300002]</p>
  </footer>

  <script src="script.js"></script>
</body>

</html> 