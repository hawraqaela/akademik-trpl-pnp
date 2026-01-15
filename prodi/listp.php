<h1 class="mb-4">Daftar Program Studi</h1>

<a href="index.php?page=prodi-create" class="btn mb-3 text-white" style="background-color: #ff69b4; border-color: #ff69b4;">Tambah Program Studi</a>

<table class="table table-striped table-hover">
    <thead style="background-color: #ff69b4;">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama Program Studi</th>
            <th scope="col">Jenjang</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require __DIR__ . '/../koneksi.php';
        $sql = $koneksi->query('SELECT * FROM prodi');
        $i = 1;
        while ($data = $sql->fetch_assoc()) {
        ?>
            <tr>
                <th scope="row"><?= $data['id'] ?></th>
                <td><?= $data['nama_prodi'] ?></td>
                <td><?= $data['jenjang'] ?></td>
                <td><?= $data['keterangan'] ?></td>
                <td>
                    <a href="index.php?id=<?= $data['id'] ?>&page=prodi-edit" class="btn btn-warning btn-sm">Edit</a>
                    <a href="proses.php?id=<?= $data['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">
                        Hapus
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>