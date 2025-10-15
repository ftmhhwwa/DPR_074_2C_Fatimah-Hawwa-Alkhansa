<?= $this->extend('templates/template') ?>

<?= $this->section('content') ?>

    <h3>Data Penggajian</h3>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
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
            if (isset($penggajian) && !empty($penggajian)): 
                foreach ($penggajian as $row): ?>
            <tr>
                <td><?= $row['id_anggota'] ?></td>
                <td><?= esc($row['gelar_depan']) ?></td>
                <td><?= esc($row['nama_depan']) ?></td>
                <td><?= esc($row['nama_belakang']) ?></td>
                <td><?= esc($row['gelar_belakang']) ?></td>
                <td><?= esc($row['jabatan']) ?></td>
                <!-- Tambahkan '?? 0' untuk menangani anggota yang belum punya komponen gaji -->
                <td>Rp <?= number_format($row['take_home_pay'] ?? 0, 2, ',', '.') ?></td>
                <td>
                    <!-- Link disesuaikan dengan nama fungsi baru di Controller -->
                    <a href="/admin/penggajian/detail/<?= $row['id_anggota'] ?>" class="btn btn-sm btn-info">Detail</a>
                    <a href="/admin/penggajian/edit/<?= $row['id_anggota'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="/admin/penggajian/delete/<?= $row['id_anggota'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus semua data gaji anggota ini?')">Hapus</a>
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