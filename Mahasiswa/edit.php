<?php
require(__DIR__ . '/../koneksi.php');
$nim = mysqli_real_escape_string($koneksi, $_GET['nim']);
$edit = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$nim'");
$data = mysqli_fetch_array($edit);
?>

<h2 class="mb-4">Edit Mahasiswa</h2>
<form action="" method="post">
    <div class="mb-3">
        <label for="nim" class="form-label">NIM:</label>
        <input type="text" class="form-control" id="nim" name="nim" value="<?= $data['nim'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="nama_mhs" class="form-label">Nama:</label>
        <input type="text" class="form-control" id="nama_mhs" name="nama_mhs" value="<?= $data['nama_mhs'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="tgl_lahir" class="form-label">Tanggal Lahir:</label>
        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $data['tgl_lahir'] ?>">
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat:</label>
        <textarea class="form-control" id="alamat" name="alamat" rows="4"><?= $data['alamat'] ?></textarea>
    </div>
    <div class="d-flex gap-2">
        <a href="index.php?page=mahasiswa" class="btn btn-secondary">Kembali</a>
        <button type="submit" name="submit" class="btn text-white" style="background-color: #ff69b4; border-color: #ff69b4;">Edit</button>
        <button type="reset" class="btn btn-warning">Reset</button>
    </div>
</form>

<?php
if (isset($_POST["submit"])) {
    $nim_new = mysqli_real_escape_string($koneksi, $_POST["nim"]);
    $nama = mysqli_real_escape_string($koneksi, $_POST["nama_mhs"]);
    $tgl = mysqli_real_escape_string($koneksi, $_POST["tgl_lahir"]);
    $alamat = mysqli_real_escape_string($koneksi, $_POST["alamat"]);
    $nim = mysqli_real_escape_string($koneksi, $_GET['nim']);
    $query = mysqli_query($koneksi, "UPDATE mahasiswa SET nim='$nim_new', nama_mhs='$nama', tgl_lahir='$tgl', alamat='$alamat' WHERE nim='$nim'");
    if ($query) {
        Header("Location: index.php?page=mahasiswa");
    } else {
        echo "data gagal diupdate";
    }
}
?>