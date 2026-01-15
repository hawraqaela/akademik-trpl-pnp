<?php
require_once(__DIR__ . '/../koneksi.php');
?>

<h2 class="mb-4">Tambah Mahasiswa</h2>
<form action="proses.php" method="post">
    <div class="mb-3">
        <label class="form-label">NIM</label>
        <input type="text" name="nim" class="form-control" required maxlength="20">
    </div>
    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama_mhs" class="form-control" required maxlength="100">
    </div>
    <div class="mb-3">
        <label class="form-label">Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Alamat</label>
        <textarea name="alamat" class="form-control" rows="3"></textarea>
    </div>
    <div class="d-flex gap-2">
        <a href="index.php?page=mahasiswa" class="btn btn-secondary">Kembali</a>
        <button type="submit" name="submit" class="btn text-white" style="background-color: #ff69b4; border-color: #ff69b4;">Simpan</button>
        <button type="reset" class="btn btn-warning">Reset</button>
    </div>
</form>