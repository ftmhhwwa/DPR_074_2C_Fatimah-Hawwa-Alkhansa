<?= $this->extend('templates/template') ?>

<?= $this->section('content') ?>

    <h3><?= $title ?></h3>
    <p><a href="/admin/anggota/create" class="btn btn-success">Tambah Anggota Baru</a></p>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Anggota</th>
                <th>Gelar Depan</th>
                <th>Nama Depan</th>
                <th>Nama Belakang</th>
                <th>Gelar Belakang</th>
                <th>Jabatan</th>
                <th>Status Nikah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($anggota as $row): ?>
            <tr>
                <td><?= $row['id_anggota'] ?></td>
                <td><?= $row['gelar_depan'] ?></td>
                <td><?= $row['nama_depan'] ?></td>
                <td><?= $row['nama_belakang'] ?></td>
                <td><?= $row['gelar_belakang'] ?></td>
                <td><?= $row['jabatan'] ?></td>
                <td><?= $row['status_pernikahan'] ?></td>
                <td>
                    <a href="/admin/anggota/edit/<?= $row['id_anggota'] ?>" class="btn btn-sm btn-warning">Ubah</a>
                    <a href="/admin/anggota/delete/<?= $row['id_anggota'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?= $this->endSection() ?>