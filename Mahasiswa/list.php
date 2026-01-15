<h1 class="mb-4">Daftar Mahasiswa</h1>

<a href="index.php?page=create" class="btn mb-3 text-white" style="background-color: #ff69b4; border-color: #ff69b4;">Tambah Mahasiswa</a>

<table class="table table-striped table-hover">
    <thead style="background-color: #ff69b4;">
        <tr>
            <th scope="col">No</th>
            <th scope="col">NIM</th>
            <th scope="col">Nama</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Alamat</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require(__DIR__ . '/../koneksi.php');
        $tampil = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
        $i = 1;
        while ($data = mysqli_fetch_assoc($tampil)) {
        ?>
            <tr>
                <th scope="row"><?= $i++ ?></th>
                <td><?= $data['nim'] ?></td>
                <td><?= $data['nama_mhs'] ?></td>
                <td><?= $data['tgl_lahir'] ?></td>
                <td><?= $data['alamat'] ?></td>
                <td>
                    <a href="index.php?nim=<?= $data["nim"] ?>&page=edit" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete.php?nim=<?= $data['nim'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>