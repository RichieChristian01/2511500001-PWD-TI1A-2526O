<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

$sql = "SELECT * FROM tbl_biodosen ORDER BY bId DESC";
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
        <th>Kode Dosen</th>
        <th>Nama Lengkap</th>
        <th>Alamat</th>
        <th>Tanggal Jadi</th>
        <th>JJA</th>
        <th>Prodi</th>
        <th>No HP</th>
        <th>Pasangan</th>
        <th>Nama Anak</th>
        <th>Ilmu Dosen</th>
        <th>Date</th>
    </tr>

    <?php
    $no = 1;
    while ($row = mysqli_fetch_assoc($q)): ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><a href="biodosen_edit.php?bId=<?= (int)$row['bId']; ?>">Edit</a>
                <a onclick="return confirm('Apakah Anda Benar Ingin Menghapus <?= htmlspecialchars($row['bNmdosen']); ?>?')" href="biodosen_proses_delete.php?bId=<?= (int)$row['bId']; ?>">Delete</a>
            </td>
            <td><?= $row['bId']; ?></td>
            <td><?= htmlspecialchars($row['bkdosen']); ?></td>
            <td><?= htmlspecialchars($row['bNmdosen']); ?></td>
            <td><?= htmlspecialchars($row['bAlmt']); ?></td>
            <td><?= htmlspecialchars($row['bTgl']); ?></td>
            <td><?= htmlspecialchars($row['bJJA']); ?></td>
            <td><?= htmlspecialchars($row['bProdi']); ?></td>
            <td><?= htmlspecialchars($row['bNOHP']); ?></td>
            <td><?= htmlspecialchars($row['bPasangan']); ?></td>
            <td><?= htmlspecialchars($row['bAnak']); ?></td>
            <td><?= htmlspecialchars($row['bIlmuDosen']); ?></td>
            <td><?= htmlspecialchars($row['bCreated_at']); ?></td>
        </tr>

    <?php endwhile; ?>
</table>

<?php
if (!$q) {
    die("Query error: " . mysqli_error($conn));
}
?>