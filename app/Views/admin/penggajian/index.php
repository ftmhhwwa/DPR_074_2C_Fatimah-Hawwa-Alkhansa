<?= $this->extend('templates/template') ?>

<?= $this->section('content') ?>

    <h3>Data Penggajian</h3>

    <p><a href="/admin/penggajian/create" class="btn btn-success">Tambah Data Penggajian</a></p>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Penggajian</th>
                <th>Nama Anggota</th>
                <th>Jabatan</th>
                <th>Take Home Pay</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if (isset($penggajian) && is_array($penggajian)): 
                foreach ($penggajian as $row): ?>
            <tr>
                <td><?= $row['id_anggota'] ?></td>
                <td><?= $row['nama_depan'] . ' ' . $row['nama_belakang'] ?></td>
                <td><?= $row['jabatan'] ?></td>
                <td><?= number_format($row['take_home_pay'], 2, ',', '.') ?></td>
                <td>
                    <a href="/admin/penggajian/edit/<?= $row['id_anggota'] ?>" class="btn btn-sm btn-warning">Ubah</a>
                    <a href="/admin/penggajian/delete/<?= $row['id_anggota'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; 
            else: ?>
            <tr>
                <td colspan="5">Data penggajian belum tersedia.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

<?= $this->endSection() ?>