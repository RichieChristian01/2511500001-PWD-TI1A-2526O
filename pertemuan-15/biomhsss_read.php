<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

$sql = "SELECT * FROM tbl_biomhsss ORDER BY bId DESC";
$q = mysqli_query($conn, $sql);
?>

<?php
$flash_berhasil = $_SESSION['flash_berhasil'] ?? '';
$flash_gagal = $_SESSION['flash_gagal'] ?? '';

unset($_SESSION['flash_berhasil'], $_SESSION['flash_gagal']);
?>

<?php if (!empty($flash_berhasil)): ?>

    <div style="padding:10px; margin-bottom:10px; background:#d4edda; color:#155724; border-radius:6px;">
        <?= $flash_berhasil; ?>
    </div>
<?php endif; ?>
<?php if (!empty($flash_gagal)): ?>
    <div style="padding:10px; margin-bottom:10px; background:#f8d7da; color:#721c24; border-radius:6px;">
        <?= $flash_gagal; ?>
    </div>
<?php endif; ?>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>NO</th>
        <th>Aksi</th>
        <th>ID</th>
        <th>NIM</th>
        <th>Nama Lengkap</th>
        <th>Tanggal Lahir</th>
        <th>Tempat Lahir</th>
        <th>Hobi</th>
        <th>Pasangan</th>
        <th>Pekerjaan</th>
        <th>Nama Orang Tua</th>
        <th>Nama Kakak</th>
        <th>Nama Adik</th>
        <th>Date</th>
    </tr>

    <?php
    $no = 1;
    while ($row = mysqli_fetch_assoc($q)): ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><a href="biomhsss_edit.php?bId=<?= (int)$row['bId']; ?>">Edit</a>
                <a onclick="return confirm('Apakah Anda Benar Ingin Menghapus <?= htmlspecialchars($row['bNama_engkap']); ?>?')" href="biomhsss_proses_delete.php?bId=<?= (int)$row['bId']; ?>">Delete</a>
            </td>
            <td><?= $row['bId']; ?></td>
            <td><?= htmlspecialchars($row['BNIM']); ?></td>
            <td><?= htmlspecialchars($row['bNama_Lengkap']); ?></td>
            <td><?= htmlspecialchars($row['bTempat_Lahir']); ?></td>
            <td><?= htmlspecialchars($row['bTgl_Lahir']); ?></td>
            <td><?= htmlspecialchars($row['bHobi']); ?></td>
            <td><?= htmlspecialchars($row['bPasangan']); ?></td>
            <td><?= htmlspecialchars($row['bPekerjaan']); ?></td>
            <td><?= htmlspecialchars($row['bNama_Ortu']); ?></td>
            <td><?= htmlspecialchars($row['bNama_Kakak']); ?></td>
            <td><?= htmlspecialchars($row['bNama_Adik']); ?></td>
            <td><?= htmlspecialchars($row['bcreated_at']); ?></td>
        </tr>

    <?php endwhile; ?>
</table>

<?php
if (!$q) {
    die("Query error: " . mysqli_error($conn));
}
?>