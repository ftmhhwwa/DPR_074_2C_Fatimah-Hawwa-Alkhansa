<?= $this->extend('templates/template') ?>

<?= $this->section('content') ?>

    <h3>Data Penggajian</h3>

    <?php if (session()->getFlashdata('success')): ?>
        <div id="notification" class="notification-box success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <p><a href="/admin/penggajian/create" class="btn btn-success">Tambah Data Penggajian</a></p>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Anggota</th>
                <th>Gelar Depan</th>
                <th>Nama Depan</th>
                <th>Nama Belakang</th>
                <th>Gelar Belakang</th>
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
                <td><?= $row['gelar_depan'] ?? '' ?></td>
                <td><?= $row['nama_depan'] ?></td>
                <td><?= $row['nama_belakang'] ?></td>
                <td><?= $row['gelar_belakang'] ?? '' ?></td>
                <td><?= $row['jabatan'] ?></td>
                <td><?= number_format($row['take_home_pay'], 2, ',', '.') ?></td>
                <td>
                    <a href="/admin/penggajian/view/<?= $row['id_anggota'] ?>" class="btn btn-sm btn-info">View</a>
                    <a href="/admin/penggajian/edit/<?= $row['id_anggota'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="/admin/penggajian/delete/<?= $row['id_anggota'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; 
            else: ?>
            <tr>
                <td colspan="8">Data penggajian belum tersedia.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

<?= $this->endSection() ?>