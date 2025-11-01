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
      <p>Ini contoh paragraf HTML.</p>
    </section>

    <section id="about">
      <?php
        $NIM = "2511500001";
        $NamaLengkap = "Richie Christian &#128526;";
        $TempatLahir = "Pangkalpinang";
        $TanggalLahir = "28 September 2007";
        $Hobi = "Bulu tangkis &#127992; &amp; Gym &#127947;";
        $Pasangan = "Belum ada &hearts;";
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
          echo $NamaLengkap;
        ?>    
    </p>
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
    <p><strong>Nama Kakak:</strong> 
      <?php
          echo $NamaKakak;
        ?> 
    </p>
    <p><strong>Nama Adik:</strong> 
      <?php
          echo $NamaAdik;
        ?> 
    </p>
    </section>

    <section id="IPK">
      <h2></h2>
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
              <div class="input-wrapper">
              <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..." required></textarea>
              <small id="charCount">0/200 karakter</small>
              </div>
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


