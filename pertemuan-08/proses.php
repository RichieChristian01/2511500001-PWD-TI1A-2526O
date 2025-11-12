<?php
session_start();

$_SESSION["nama"] = $_POST["txtNama"];
$_SESSION["email"] = $_POST["txtEmail"];
$_SESSION["pesan"] = $_POST["txtPesan"];

header("Location: index.php");
exit;
?>
