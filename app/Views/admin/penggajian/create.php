<?= $this->extend('templates/template'); ?>

<?= $this->section('content') ?>

<h3>Hitung Data Penggajian</h3>

<p>Pilih anggota yang akan ditambahkan ke dalam sistem penggajian.</p>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<!-- Form ini akan mengarah ke processCreatePenggajian -->
<form method="post" action="/admin/penggajian/process_create">
    <?= csrf_field() ?>

    <div class="mb-3">
        <label for="id_anggota" class="form-label">Anggota yang Tersedia</label>
        <select class="form-select" id="id_anggota" name="id_anggota" required>
            <option value="">-- Pilih Anggota --</option>
            
            <?php if (!empty($anggota)): ?>
                <?php foreach ($anggota as $a): ?>
                    <option value="<?= $a['id_anggota'] ?>">
                        <?= esc($a['nama_depan'] . ' ' . $a['nama_belakang'] . ' (' . $a['jabatan'] . ')') ?>
                    </option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
        
        <?php if (empty($anggota)): ?>
            <div class="form-text text-muted">
                Semua anggota sudah memiliki data penggajian.
            </div>
        <?php endif; ?>
    </div>

    <!-- Tombol submit hanya aktif jika ada anggota yang bisa dipilih -->
    <button type="submit" class="btn btn-primary" <?= empty($anggota) ? 'disabled' : '' ?>>Lanjutkan</button>
    <a href="/admin/penggajian" class="btn btn-secondary">Batal</a>
</form>

<?= $this->endSection() ?>
