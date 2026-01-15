<?php
require_once __DIR__ . '/koneksi.php';
if (!isset($_GET['nim'])) {
    header('Location: index.php?page=mahasiswa');
    exit;
}
$nim = mysqli_real_escape_string($koneksi, $_GET['nim']);
// perform delete
$del = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE nim = '$nim'");
header('Location: index.php?page=mahasiswa');
exit;
