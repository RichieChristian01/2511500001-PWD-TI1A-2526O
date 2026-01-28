

<?php
require 'koneksi.php';
require_once 'fungsi.php';

$fieldConfig = [
      "kdosen" => ["label" => "Kode Dosen:", "suffix" => ""],
      "Nmdosen" => ["label" => "Nama Dosen:", "suffix" => " &#128526;"],
      "Almt" => ["label" => "Alamat Rumah:", "suffix" => ""],
      "Tgl" => ["label" => "Tanggal Jadi Dosen:", "suffix" => ""],
      "JJA" => ["label" => "JJA Dosen:", "suffix" => " &#127926;"],
      "Prodi" => ["label" => "Homebase Prodi:", "suffix" => " &hearts;"],
      "NOHP" => ["label" => "Nomor HP:", "suffix" => " &copy; 2025"],
      "Pasangan" => ["label" => "Nama Pasangan:", "suffix" => ""],
      "Anak" => ["label" => "Nama Anak:", "suffix" => ""],
      "IlmuDosen" => ["label" => "Bidang Ilmu Dosen:", "suffix" => ""],
    ];

$sql = "SELECT * FROM tbl_biodosen ORDER BY bId DESC";
$q = mysqli_query($conn, $sql);

if (!$q) {
    echo "<p>Gagal membaca data dosen: " . htmlspecialchars(mysqli_error($conn)) . "</p>";
} elseif (mysqli_num_rows($q) === 0) {
    echo "<p>Belum ada data tamu yang tersimpan.</p>";
} else {
    while ($row = mysqli_fetch_assoc($q)) {
        $arrBiodata = [
            "kdosen" => $row['bkdosen'] ?? "",
            "Nmdosen" => $row["bNmdosen"] ?? "",
            "Almt" => $row["bAlmt"] ?? "",
            "Tgl" => $row["bTgl"] ?? "",
            "JJA" => $row["bJJA"] ?? "",
            "Prodi" => $row["bProdi"] ?? "",
            "NOHP" => $row["bNOHP"] ?? "",
            "Pasangan" => $row["bPasangan"] ?? "",
            "Anak" => $row["bAnak"] ?? "",
            "IlmuDosen" => $row["bIlmuDosen"] ?? "",
        ];
        echo tampilkanBiodata($fieldConfig, $arrBiodata);
    }
}
?>

