<?php
// Connection uses same variable name as buku tamu sample ($db)
$server = "localhost";
$user = "root";
$password = "";
$nama_database = "db_akademik";

$koneksi = new mysqli($server, $user, $password, $nama_database);

if (!$koneksi) {
    die("Gagal terhubung dengan database: " . $koneksi->error);
}
