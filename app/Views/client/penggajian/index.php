<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

    <h3>Data Penggajian Gaji DPR</h3>
    <p>Informasi ini hanya bersifat baca (Read-only) untuk publik.</p>
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
                <td><?= $row['id_penggajian'] ?></td>
                <td><?= $row['nama_depan'] . ' ' . $row['nama_belakang'] ?></td>
                <td><?= $row['jabatan'] ?></td>
                <td><?= number_format($row['take_home_pay'], 2, ',', '.') ?></td>
                <td>
                    <a href="/client/penggajian/view/<?= $row['id_penggajian'] ?>" class="btn btn-sm btn-info">Lihat Rincian</a>
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