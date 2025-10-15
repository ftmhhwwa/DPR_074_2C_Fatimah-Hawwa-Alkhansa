<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

    <h3><?= esc($title) ?></h3>
    <h4>Anggota: <?= esc($anggota['nama_depan'] . ' ' . $anggota['nama_belakang']) ?> (<?= esc($anggota['jabatan']) ?>)</h4>
    <p>Status: <?= esc($anggota['status_pernikahan']) ?>, Jumlah Anak: <?= esc($anggota['jumlah_anak']) ?></p>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <p>Sistem akan secara otomatis menghitung gaji berdasarkan data anggota di atas. Ini akan mencakup Gaji Pokok, Tunjangan Melekat, serta Tunjangan Keluarga (jika berlaku).</p>

    <?php if (!empty($detailGaji)): ?>
        <h5 class="mt-4">Rincian Gaji Saat Ini:</h5>
        <table class="table table-sm table-bordered" style="max-width: 600px;">
            <?php $total = 0; ?>
            <?php foreach($detailGaji as $item): $total += $item['nominal']; ?>
                <tr>
                    <td><?= esc($item['nama_komponen']) ?></td>
                    <td class="text-end">Rp <?= number_format($item['nominal'], 0, ',', '.') ?></td>
                </tr>
            <?php endforeach; ?>
            <tfoot>
                <tr>
                    <th class="text-end">Total</th>
                    <th class="text-end">Rp <?= number_format($total, 0, ',', '.') ?></th>
                </tr>
            </tfoot>
        </table>
    <?php endif; ?>


    <form action="<?= site_url('admin/penggajian/edit/' . $anggota['id_anggota']) ?>" method="post">
        <?= csrf_field() ?>
        
        <p class="mt-4">Klik tombol di bawah untuk memproses atau memperbarui perhitungan gaji anggota ini.</p>
        
        <button type="submit" class="btn btn-primary">Hitung dan Simpan Gaji</button>
        <a href="/admin/penggajian" class="btn btn-secondary">Batal</a>
    </form>

<?= $this->endSection() ?>