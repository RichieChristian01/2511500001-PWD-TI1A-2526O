

<?php
require 'koneksi.php';
require_once 'fungsi.php';

$fieldConfig = [
    "nim" => ["label" => "NIM:", "suffix" => ""],
    "Nama_Lengkap" => ["label" => "Nama Lengkap:", "suffix" => " &#128526;"],
    "Tempat_Lahir" => ["label" => "Tempat Lahir:", "suffix" => ""],
    "Tgl_Lahir" => ["label" => "Tanggal Lahir:", "suffix" => ""],
    "Hobi" => ["label" => "Hobi:", "suffix" => ""],
    "Pasangan" => ["label" => "Pasangan:", "suffix" => " &hearts;"],
    "Pekerjaan" => ["label" => "Pekerjaan:", "suffix" => " &copy; 2025"],
    "Nama_Ortu" => ["label" => "Nama Orang Tua:", "suffix" => ""],
    "Nama_Kakak" => ["label" => "Nama Kakak:", "suffix" => ""],
    "Nama_Adik" => ["label" => "Nama Adik:", "suffix" => ""]
];

$sql = "SELECT * FROM tbl_biomhsss ORDER BY bId DESC";
$q = mysqli_query($conn, $sql);

if (!$q) {
    echo "<p>Gagal membaca data tamu: " . htmlspecialchars(mysqli_error($conn)) . "</p>";
} elseif (mysqli_num_rows($q) === 0) {
    echo "<p>Belum ada data tamu yang tersimpan.</p>";
} else {
    while ($row = mysqli_fetch_assoc($q)) {
        $arrBiodata = [
            "NIM" => $row['bNIM'] ?? "",
            "Nama_Lengkap" => $row["bNama_engkap"] ?? "",
            "Tempat_Lahir" => $row["bTempat_Lahir"] ?? "",
            "Tgl_Lahir" => $row["bTgl_Lahir"] ?? "",
            "Hobi" => $row["bHobi"] ?? "",
            "Pasangan" => $row["bPasangan"] ?? "",
            "Pekerjaan" => $row["bPekerjaan"] ?? "",
            "Nama_Ortu" => $row["bNama_Ortu"] ?? "",
            "Nama_Kakak" => $row["bNama_Kakak"] ?? "",
            "Nama_Adik" => $row["bNama_Adik"] ?? "",
        ];
        echo tampilkanBiodata($fieldConfig, $arrBiodata);
    }
}
?>

