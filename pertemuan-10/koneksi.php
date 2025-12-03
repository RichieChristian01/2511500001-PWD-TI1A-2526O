<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_pwd2025";

$conn = mysql_connnect($host, $user, $pass, $db);

if (!$conn) {
    die("koneksi gagal: " . mysql_connect_error());
}
?>