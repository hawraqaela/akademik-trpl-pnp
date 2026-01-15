<?php
session_start();
include(__DIR__ . '/koneksi.php');

if (isset($_POST['submit'])) {
    $nim = mysqli_real_escape_string($koneksi, $_POST['nim']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama_mhs']);
    $tgl = mysqli_real_escape_string($koneksi, $_POST['tgl_lahir']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);

    $sql = mysqli_query($koneksi, "INSERT INTO mahasiswa (nim, nama_mhs, tgl_lahir, alamat)
    VALUES ('$nim', '$nama', '$tgl', '$alamat')");

    if ($sql) {
        echo "Data berhasil disimpan<br>";
        echo "<a href='index.php?page=mahasiswa'>Tampilkan list mahasiswa</a>";
    } else {
        echo "Proses input mahasiswa gagal..";
    }
}

if (isset($_GET['aksi']) && $_GET['aksi'] == 'insertp') {
    $nama_prodi = mysqli_real_escape_string($koneksi, $_POST['nama_prodi']);
    $jenjang = mysqli_real_escape_string($koneksi, $_POST['jenjang']);
    $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);

    $sql = mysqli_query($koneksi, "INSERT INTO prodi (nama_prodi, jenjang, keterangan)
    VALUES ('$nama_prodi', '$jenjang', '$keterangan')");

    if ($sql) {
        header('location: index.php?page=prodi');
    } else {
        echo "Proses input prodi gagal..";
    }
}

if (isset($_POST['submitp'])) {
    $id = mysqli_real_escape_string($koneksi, $_POST['id']);
    $nama_prodi = mysqli_real_escape_string($koneksi, $_POST['nama_prodi']);
    $jenjang = mysqli_real_escape_string($koneksi, $_POST['jenjang']);
    $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);

    $sql = mysqli_query($koneksi, "UPDATE prodi SET nama_prodi='$nama_prodi', jenjang='$jenjang', keterangan='$keterangan' WHERE id='$id'");

    if ($sql) {
        header('location: index.php?page=prodi');
    } else {
        echo "Proses update prodi gagal..";
    }
}

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);
    $sql = mysqli_query($koneksi, "DELETE FROM prodi WHERE id='$id'");
    if ($sql) {
        header('location: index.php?page=prodi');
    } else {
        echo "Proses delete prodi gagal..";
    }
}
if (isset($_POST['update_profile'])) {
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';
    $email = $_SESSION['email'];

    // Check password
    if (!empty($password)) {
        if (strlen($password) < 6) {
            echo "Password minimal 6 karakter.";
            exit;
        }
        if ($password !== $confirm_password) {
            echo "Password konfirmasi tidak cocok.";
            exit;
        }
        $hashed_password = md5($password);
        $query = $koneksi->prepare("UPDATE pengguna SET password = ? WHERE email = ?");
        $query->bind_param("ss", $hashed_password, $email);

        if ($query->execute()) {
            session_destroy();
            header('location: login.php');
        } else {
            echo "Gagal update profil.";
        }
    } else {
        echo "Silakan masukkan password baru.";
    }
}
