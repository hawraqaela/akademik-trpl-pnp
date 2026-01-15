<?php
require __DIR__ . '/../koneksi.php';
?>

<h2 class="mb-4">Tambah Program Studi</h2>
<form method="POST" action="proses.php?aksi=insertp">
  <div class="mb-3">
    <label for="nama_prodi" class="form-label">Nama Program Studi</label>
    <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" required>
  </div>
  <div class="mb-3">
    <label for="jenjang" class="form-label">Jenjang</label>
    <select class="form-control" name="jenjang" id="jenjang" required>
      <option value="">-- Pilih Jenjang --</option>
      <option value="D2">D2</option>
      <option value="D3">D3</option>
      <option value="D4">D4</option>
      <option value="S2">S2</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="keterangan" class="form-label">Keterangan</label>
    <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
  </div>
  <div class="d-flex gap-2">
    <button type="submit" name="submitp" class="btn btn-primary">Simpan</button>
    <a href="index.php?page=prodi" class="btn btn-secondary">Kembali</a>
  </div>
</form>