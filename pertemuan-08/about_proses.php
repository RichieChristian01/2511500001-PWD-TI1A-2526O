<?php
session_start();

$_SESSION["NIM"] = $_POST["txtNIM"];
$_SESSION["NamaLengkap"] = $_POST["txtNamaLengkap"];
$_SESSION["TempatLahir"] = $_POST["txtTempatLahir"];
$_SESSION["TanggalLahir"] = $_POST["txtTanggalLahir"];
$_SESSION["Hobi"] = $_POST["txtHobi"];
$_SESSION["Pasangan"] = $_POST["txtPasangan"];
$_SESSION["NamaOrangTua"] = $_POST["txtNamaOrangTua"];
$_SESSION["NamaKakak"] = $_POST["txtNamaKakak"];
$_SESSION["NamaAdik"] = $_POST["txtNamaAdik"];

header("Location: index.php");
exit;
?>
