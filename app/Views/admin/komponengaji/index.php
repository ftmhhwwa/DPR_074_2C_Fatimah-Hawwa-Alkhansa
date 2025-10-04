<?= $this->extend('templates/template'); ?>

<?= $this->section('content') ?>

    <h3>Data Komponen Gaji DPR</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Komponen</th>
                <th>Nama Komponen</th>
                <th>Kategori</th>
                <th>Jabatan</th>
                <th>Nominal</th>
                <th>Satuan</th>
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