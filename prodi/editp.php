<?php
require __DIR__ . '/../koneksi.php';
$id = mysqli_real_escape_string($koneksi, $_GET['id']);
$sql = $koneksi->query("SELECT * FROM prodi WHERE id = '$id'");
$data = $sql->fetch_assoc();
?>

<h2 class="mb-4">Edit Program Studi</h2>
<form method="POST" action="proses.php?aksi=updatep">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    <div class="mb-3">
        <label for="nama_prodi" class="form-label">Nama Program Studi</label>
        <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" value="<?= $data['nama_prodi'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="jenjang" class="form-label">Jenjang</label>
        <select class="form-control" name="jenjang" id="jenjang" required>
            <option value="">-- Pilih Jenjang --</option>
            <option value="D2" <?= $data['jenjang'] == 'D2' ? 'selected' : '' ?>>D2</option>
            <option value="D3" <?= $data['jenjang'] == 'D3' ? 'selected' : '' ?>>D3</option>
            <option value="D4" <?= $data['jenjang'] == 'D4' ? 'selected' : '' ?>>D4</option>
            <option value="S2" <?= $data['jenjang'] == 'S2' ? 'selected' : '' ?>>S2</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="keterangan" class="form-label">Keterangan</label>
        <textarea class="form-control" id="keterangan" name="keterangan" rows="3"><?= $data['keterangan'] ?></textarea>
    </div>
    <div class="d-flex gap-2">
        <button type="submit" name="submitp" class="btn btn-primary">Update</button>
        <a href="index.php?page=prodi" class="btn btn-secondary">Kembali</a>
    </div>
</form>