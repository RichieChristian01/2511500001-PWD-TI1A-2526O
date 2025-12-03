<?php
require 'koneksi.php';

$contactConfig = [
  "nama" => ["label" => "Nama:", "suffix" => ""],
  "email" => ["label" => "Email:", "suffix" => ""],
  "pesan" => ["label" => "Pesan:", "suffix" => ""]
];

$sql = "SELECT * FROM tbl_tamu ORDER BY cid DESC";
$q = mysqli_query($conn, $sql);
if (!$q) {
    echo "<p>Gagal membaca data tamu: " . htmlspecialchars(mysqli_error($conn)) . "</p>";
} else if (mysqli_num_rows($q) === 0 ) {
    echo "<p>Belum ada tamu yang tersimpan.</p>";
} else {
    while ($row = mysqli_fetch_assoc($q)) {
        $arrContact = [
           "nama" => $row["cnama"] ?? "",
           "email" => $row["cmail"] ?? "",
           "pesan" => $row["cpesan"] ?? "",
        ];
        echo tampilkanBiodata($fieldContact, $arrContact);
    }
}
?>
<table border="1" cellpadding="8" cellspacing="0">
 <tr>
    <th>ID</th>
    <th>Nama></th>
    <th>Email</th>
    <th>Pesan</th>
 </tr>

 <?php while ($row = mysqli_fetch_assoc($q)): ?>
     <tr>
    <td><?= $row['cid'] ?></td>
    <td><?= htmlspecialchars($row['cnama']); ?></td>
    <td><?= htmlspecialchars($row['cmail']); ?></td>
    <td><?= htmlspecialchars($row['cpesan']); ?></td>
 </tr>  
 <?php endwhile; ?>
 </table>