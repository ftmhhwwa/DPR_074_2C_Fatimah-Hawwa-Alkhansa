<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

    <h3>Detail Data Penggajian</h3>
    
    <?php if (isset($penggajian) && is_array($penggajian) && count($penggajian) > 0): 
        $anggota = $penggajian[0]; // Ambil data anggota dari entri pertama
    ?>
        <h4>Informasi Anggota</h4>
        <table class="table table-bordered">
            <tr>
                <th>ID Anggota</th>
                <td><?= $anggota['id_anggota'] ?></td>
            </tr>
            <tr>
                <th>Nama Lengkap</th>
                <td><?= $anggota['gelar_depan'] . ' ' . $anggota['nama_depan'] . ' ' . $anggota['nama_belakang'] . ' ' . $anggota['gelar_belakang'] ?></td>
            </tr>
            <tr>
                <th>Jabatan</th>
                <td><?= $anggota['jabatan'] ?></td>
            </tr>
            <tr>
                <th>Status Pernikahan</th>
                <td><?= $anggota['status_pernikahan'] ?></td>
            </tr>
            <tr>
                <th>Jumlah Anak</th>
                <td><?= $anggota['jumlah_anak'] ?></td>
            </tr>
            <tr>
                <th>Take Home Pay</th>
                <td><?= number_format($anggota['take_home_pay'], 2, ',', '.') ?></td>
        </table>

    <?php else: ?>
        <p>Data penggajian tidak ditemukan.</p>
    <?php endif; ?>

<?= $this->endSection() ?>