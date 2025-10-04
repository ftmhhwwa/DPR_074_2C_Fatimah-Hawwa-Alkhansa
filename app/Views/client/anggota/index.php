<?= $this->extend('templates/template') ?>

<?= $this->section('content') ?>

    <h3>Data Anggota DPR (Transparansi)</h3>
    <p>Informasi ini hanya bersifat baca (Read-only) untuk publik.</p>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Anggota</th>
                <th>Gelar Depan</th>
                <th>Nama Lengkap</th>
                <th>Gelar Belakang</th>
                <th>Jabatan</th>
                <th>Status Nikah</th>
                <th>Jumlah Anak</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if (isset($anggota) && is_array($anggota)): 
                foreach ($anggota as $row): ?>
            <tr>
                <td><?= $row['id_anggota'] ?></td>
                <td><?= $row['gelar_depan'] ?></td>
                <td><?= $row['nama_depan'] . ' ' . $row['nama_belakang'] ?></td>
                <td><?= $row['gelar_belakang'] ?></td>
                <td><?= $row['jabatan'] ?></td>
                <td><?= $row['status_pernikahan'] ?></td>
                <td><?= $row['jumlah_anak'] ?></td>
            </tr>
            <?php endforeach; 
            else: ?>
            <tr>
                <td colspan="7">Data anggota belum tersedia.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

<?= $this->endSection() ?>