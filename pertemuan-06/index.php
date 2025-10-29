<!DOCTYPE html>
<html>
<head>
<title>Belajar PHP Dasar</title>
</head>
<body>
<h1><?php echo "Halo, Dunia PHP!"; ?></h1>
<?php
$nama = "Richie Christian";
$umur = 18;
$tinggi = 1.65;
$aktif = true;
$hobi = ["Coding", "Memasak", "Musik"];
$mahasiswa = (object)[
"nim" => "2511500001",
"nama" => "Richie Christian",
"prodi" => "Teknik Informatika"
];
$nilai_akhir = NULL;
echo "<h2>Demo Tipe Data PHP</h2>";
echo "<pre>";
echo "String:\n";
var_dump($nama);
echo "\nInteger:\n";
var_dump($umur);
echo "\nFloat:\n";
var_dump($tinggi);
echo "\nBoolean:\n";
var_dump($aktif);
echo "\nArray:\n";
var_dump($hobi);
echo "\nObject:\n";
var_dump($mahasiswa);
echo "\nNULL:\n";
var_dump($nilai_akhir);
echo "</pre>";
define("KAMPUS", "ISB Atma Luhur");
const ANGKATAN = 2025;
echo "Kampus: " . KAMPUS . "<br>";
echo "Angkatan: " . ANGKATAN;

$a = 100;
$b = "100";
$c = 0;
$d = false;
echo "<h3>Perbandingan == dan ===</h3>";
echo "\$a == \$b : "; var_dump($a == $b);
echo "\$a === \$b : "; var_dump($a === $b);
echo "\$c == \$d : "; var_dump($c == $d);
echo "\$c === \$d : "; var_dump($c === $d);

$nilai = 80;
if ($nilai >= 90) {
echo "A";
} elseif ($nilai >= 80) 
echo "B";

 else {
echo "C";
}
?>
</body>
</html>
