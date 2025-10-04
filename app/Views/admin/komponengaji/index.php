<?= $this->extend('templates/template'); ?>

<?= $this->section('content') ?>

    <h3><?= $title ?></h3>

    <?php if (session()->getFlashdata('success')): ?>
        <div id="notification" class="notification-box success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
    
    <p><a href="/admin/komponengaji/create" class="btn btn-success">Tambah Komponen Gaji Baru</a></p>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Komponen</th>
                <th>Nama Komponen</th>
                <th>Kategori</th>
                <th>Jabatan</th>
                <th>Nominal</th>
                <th>Satuan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if (isset($dataKomponenGaji) && is_array($dataKomponenGaji)): 
                foreach ($dataKomponenGaji as $row): ?>
            <tr>
                <td><?= $row['id_komponen_gaji'] ?></td>
                <td><?= $row['nama_komponen'] ?></td>
                <td><?= $row['kategori'] ?></td>
                <td><?= $row['jabatan'] ?></td>
                <td><?= number_format($row['nominal'], 0, ',', '.') ?></td>
                <td><?= $row['satuan'] ?></td>
                <td>
                    <a href="/admin/komponengaji/edit/<?= $row['id_komponen_gaji'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="/admin/komponengaji/delete/<?= $row['id_komponen_gaji'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; 
            else: ?>
            <tr>
                <td colspan="3">Data komponen gaji belum tersedia.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

<?= $this->endSection() ?>