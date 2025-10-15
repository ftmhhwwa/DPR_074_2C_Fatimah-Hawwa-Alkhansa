<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

    <h3>Detail Data Penggajian</h3>
    
    <?php if (!empty($anggota)): ?>
        <h4>Informasi Anggota</h4>
        <table class="table table-bordered" style="max-width: 600px;">
            <tr>
                <th style="width: 30%;">ID Anggota</th>
                <td><?= esc($anggota['id_anggota']) ?></td>
            </tr>
            <tr>
                <th>Nama Lengkap</th>
                <td><?= esc($anggota['gelar_depan'] . ' ' . $anggota['nama_depan'] . ' ' . $anggota['nama_belakang'] . ' ' . $anggota['gelar_belakang']) ?></td>
            </tr>
            <tr>
                <th>Jabatan</th>
                <td><?= esc($anggota['jabatan']) ?></td>
            </tr>
        </table>
        
        <h4 class="mt-4">Rincian Komponen Gaji</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama Komponen</th>
                    <th>Kategori</th>
                    <th class="text-end">Nominal</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; ?>
                <?php if (!empty($detailGaji)): ?>
                    <?php foreach ($detailGaji as $komponen): $total += $komponen['nominal']; ?>
                    <tr>
                        <td><?= esc($komponen['nama_komponen']) ?></td>
                        <td><?= esc($komponen['kategori']) ?></td>
                        <td class="text-end">Rp <?= number_format($komponen['nominal'], 0, ',', '.') ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="text-center">Anggota ini belum memiliki komponen gaji.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2" class="text-end">Total Take Home Pay</th>
                    <th class="text-end">Rp <?= number_format($total, 0, ',', '.') ?></th>
                </tr>
            </tfoot>
        </table>
        
        <a href="/admin/penggajian" class="btn btn-secondary">Kembali</a>

    <?php else: ?>
        <p>Data penggajian tidak ditemukan.</p>
    <?php endif; ?>

<?= $this->endSection() ?>