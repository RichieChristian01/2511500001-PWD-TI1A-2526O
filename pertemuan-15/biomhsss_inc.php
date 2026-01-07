<?php
require 'koneksi.php';

$fieldConfig = [
      "nim" => ["label" => "NIM:", "suffix" => ""],
      "nama" => ["label" => "Nama Lengkap:", "suffix" => " &#128526;"],
      "tempat" => ["label" => "Tempat Lahir:", "suffix" => ""],
      "tanggal" => ["label" => "Tgl Lahir:", "suffix" => ""],
      "hobi" => ["label" => "Hobi:", "suffix" => " &#127926;"],
      "pasangan" => ["label" => "Pasangan:", "suffix" => " &hearts;"],
      "pekerjaan" => ["label" => "Pekerjaan:", "suffix" => " &copy; 2025"],
      "ortu" => ["label" => "Nama Ortu:", "suffix" => ""],
      "kakak" => ["label" => "Nama Kakak:", "suffix" => ""],
      "adik" => ["label" => "Nama Adik:", "suffix" => ""],
    ];
    

$sql = "SELECT * FROM tbl_tamu ORDER BY bId DESC";
$q = mysqli_query($conn, $sql);
if (!$q) {
  echo "<p>Gagal membaca data tamu: " . htmlspecialchars(mysqli_error($conn)) . "</p>";
} elseif (mysqli_num_rows($q) === 0) {
  echo "<p>Belum ada data tamu yang tersimpan.</p>";
} else {
  while ($row = mysqli_fetch_assoc($q)) {
    $arrContact = [
      "nim"  => $row["BNIM"]  ?? "",
      "nama" => $row["bNama_Lengkap"] ?? "",
      "tempat" => $row["bTempat_Lahir"] ?? "",
      "hobi" => $row["bTgl_Lahir"] ?? "",
      "pasangan" => $row["bPasangan"] ?? "",
      "pekerjaan" => $row["bPekerjaan"] ?? "",
      "ortu" => $row["bNama_Ortu"] ?? "",
      "kakak" => $row["bNama_Kakak"] ?? "",
      "adik" => $row["bNama_Adik"] ?? "",
    ];
    echo tampilkanBiodata($fieldContact, $arrContact);
  }
}
?>
