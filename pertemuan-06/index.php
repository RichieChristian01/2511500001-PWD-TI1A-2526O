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
        <li><a href="#ipk">Nilai Saya</a></li>
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

    <section id="ipk">
      <h2>Nilai Saya</h2>
      <?php
        $namaMatkul1 = "Kalkulus";
        $namaMatkul2 = "Logika Informatika";
        $namaMatkul3 = "Pengantar Teknik Informatika";
        $namaMatkul4 = "Aplikasi Perkantoran";
        $namaMatkul5 = "Pemrograman Web";

        $sksMatkul1 = "3";
        $sksMatkul2 = "3";
        $sksMatkul3 = "3";
        $sksMatkul4 = "3";
        $sksMatkul5 = "3";

        $nilaiHadir1 = "80";
        $nilaiHadir2 = "95";
        $nilaiHadir3 = "90";
        $nilaiHadir4 = "65";
        $nilaiHadir5 = "100";

        $nilaiTugas1 = "88";
        $nilaiTugas2 = "85";
        $nilaiTugas3 = "90";
        $nilaiTugas4 = "85";
        $nilaiTugas5 = "100";

        $nilaiUTS1 = "90";
        $nilaiUTS2 = "83";
        $nilaiUTS3 = "97";
        $nilaiUTS4 = "73";
        $nilaiUTS5 = "89";

        $nilaiUAS1 = "93";
        $nilaiUAS2 = "95";
        $nilaiUAS3 = "91";
        $nilaiUAS4 = "89";
        $nilaiUAS5 = "88";

        function hitungSemuaMatkul(array $nama, array $sks, array $hadir, array $tugas, array $uts, array $uas): void {
          $totalBobot = 0;
          $totalSKS = 0;

          for ($i = 0; $i < count($nama); $i++) {
            $nilaiAkhir = (0.1 * $hadir[$i]) + (0.2 * $tugas[$i]) + (0.3 * $uts[$i]) + (0.4 * $uas[$i]);
            $grade = "";
            $mutu = 0.00;

            if ($hadir[$i] < 70) {
                  $grade = "E";
              } elseif ($nilaiAkhir >= 91) {
                  $grade = "A";
              } elseif ($nilaiAkhir >= 81) {
                  $grade = "A-";
              } elseif ($nilaiAkhir >= 76) {
                  $grade = "B+";
              } elseif ($nilaiAkhir >= 71) {
                  $grade = "B";
              } elseif ($nilaiAkhir >= 66) {
                  $grade = "B-";
              } elseif ($nilaiAkhir >= 61) {
                  $grade = "C+";
              } elseif ($nilaiAkhir >= 56) {
                  $grade = "C";
              } elseif ($nilaiAkhir >= 51) {
                  $grade = "C-";
              } elseif ($nilaiAkhir >= 36) {
                  $grade = "D";
              } else {
                  $grade = "E";
              }

              switch ($grade) {
                  case "A": $mutu = 4.00; break;
                  case "A-": $mutu = 3.70; break;
                  case "B+": $mutu = 3.30; break;
                  case "B": $mutu = 3.00; break;
                  case "B-": $mutu = 2.70; break;
                  case "C+": $mutu = 2.30; break;
                  case "C": $mutu = 2.00; break;
                  case "C-": $mutu = 1.70; break;
                  case "D": $mutu = 1.00; break;
                  case "E": $mutu = 0.00; break;
              }

              $bobot = $mutu * $sks[$i];
              $status = in_array($grade, ["A", "A-", "B+", "B", "B-", "C+", "C", "C-"]) ? "<span class='status-lulus'>Lulus</span>" : "<span class='status-gagal'>Gagal</span>";

                echo "<div class='matkul'>";
                echo "<div class='matkul-title'>Mata Kuliah ke-" . ($i + 1) . ": {$nama[$i]}</div>";
                echo "<div class='row'><span>SKS:</span><span>{$sks[$i]}</span></div>";
                echo "<div class='row'><span>Kehadiran:</span><span>{$hadir[$i]}</span></div>";
                echo "<div class='row'><span>Tugas:</span><span>{$tugas[$i]}</span></div>";
                echo "<div class='row'><span>UTS:</span><span>{$uts[$i]}</span></div>";
                echo "<div class='row'><span>UAS:</span><span>{$uas[$i]}</span></div>";
                echo "<div class='row'><span>Nilai Akhir:</span><span>" . round($nilaiAkhir, 2) . "</span></div>";
                echo "<div class='row'><span>Grade:</span><span>{$grade}</span></div>";
                echo "<div class='row'><span>Angka Mutu:</span><span>" . number_format($mutu, 2) . "</span></div>";
                echo "<div class='row'><span>Bobot:</span><span>" . number_format($bobot, 2) . "</span></div>";
                echo "<div class='row'><span>Status:</span>{$status}</div>";
                echo "</div><hr>";

              $totalBobot += $bobot;
              $totalSKS += $sks[$i];
          }

              $IPK = $totalBobot / $totalSKS;
                echo "<div class='total'>Total Bobot = " . number_format($totalBobot, 2) . "<br>";
                echo "Total SKS = {$totalSKS}<br>";
                echo "IPK = " . number_format($IPK, 2) . "</div>";
          }

              $nama = [$namaMatkul1, $namaMatkul2, $namaMatkul3, $namaMatkul4, $namaMatkul5];
              $sks = [$sksMatkul1, $sksMatkul2, $sksMatkul3, $sksMatkul4, $sksMatkul5];
              $hadir = [$nilaiHadir1, $nilaiHadir2, $nilaiHadir3, $nilaiHadir4, $nilaiHadir5];
              $tugas = [$nilaiTugas1, $nilaiTugas2, $nilaiTugas3, $nilaiTugas4, $nilaiTugas5];
              $uts = [$nilaiUTS1, $nilaiUTS2, $nilaiUTS3, $nilaiUTS4, $nilaiUTS5];
              $uas = [$nilaiUAS1, $nilaiUAS2, $nilaiUAS3, $nilaiUAS4, $nilaiUAS5];
              hitungSemuaMatkul($nama, $sks, $hadir, $tugas, $uts, $uas);
      ?>
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


