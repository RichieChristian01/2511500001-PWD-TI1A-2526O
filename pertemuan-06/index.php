<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
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
      echo "Halo! <br>" , "Nama saya Richie Christian";
      ?>
      <p>Ini contoh paragraf HTML.</p>
    </section>

    <section id="about">
        <?php
          $NIM = "2511500001";
          $Nama = "Richie Christian";
          $TempatLahir = "Pangkalpinang";
          $TanggalLahir = "28 September 2007";
          $Hobi = "Bulu Tangkis &#127992;, Gym &#128170;";
          $Pasangan = "Belum ada";
          $Pekerjaan = "Mahasiswa";
          $NamaOrangTua = "Bapak Yanto &amp; Ibu Aice";
          $NamaKakak = "-";
          $NamaAdik = "-";
        ?>

      <h2>Tentang Saya</h2>
      <p><strong>NIM:</strong> 
        <?php
            echo $NIM;
        ?>
      </p>
      <p><strong>Nama Lengkap:</strong> 
        <?php
            echo $Nama;
        ?>
      &#128526;</p>
      <p><strong>Tempat Lahir:</strong> 
        <?php
            echo $TempatLahir;
        ?>
      </p>
      <p><strong>Tanggal Lahir:</strong> 
        <?php
            echo $TanggalLahir;
        ?>
      </p>
      <p><strong>Hobi:</strong> 
        <?php
            echo $Hobi;
        ?>
      
      </p>
      <p><strong>Pasangan:</strong> 
        <?php
            echo $Pasangan;
        ?>
      &hearts;
      </p>
      <p><strong>Pekerjaan:</strong>
      <?php
          echo $Pekerjaan;
      ?> 
      </p>
      <p><strong>Nama Orang Tua:</strong> 
      <?php
          echo $NamaOrangTua;
      ?>
      </p>
      </p>
      <p><strong>Nama Kakak:</strong> 
      <?php
          echo $NamaKakak;
      ?>
      </p>
      </p>
      <p><strong>Nama Adik:</strong> 
      <?php
          echo $NamaAdik;
      ?>
    </p>
    </section>

    <section id="contact">
        <h2>Kontak kami</h2>
        <form action="" method="get">
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
    </section>
  </main>

  <footer>
    <p>&copy; 2025 Richie Christian [2511500001]</p>
  </footer>

  <script src="script.js"></script>
</body>
</html>


