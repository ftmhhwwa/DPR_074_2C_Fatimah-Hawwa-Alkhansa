<?= $this->extend('templates/template'); ?>

<?= $this->section('content') ?>

<h3>Hitung Data Penggajian</h3>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>

<?php endif; ?>
<form method="post" action="/admin/penggajian/store">
    <?= csrf_field() ?>

    <div class="mb-3">
        <label for="id_anggota" class="form-label">Pilih Anggota</label>
        <select class="form-select" id="id_anggota" name="id_anggota" required>
            <option value="">-- Pilih Anggota --</option>
            <?php foreach ($anggota as $a): ?>
                <option value="<?= $a['id_anggota'] ?>" <?= set_select('id_anggota', $a['id_anggota']) ?>>
                    <?= $a['nama_depan'] . ' ' . $a['nama_belakang'] . ' (' . $a['jabatan'] . ')' ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Hitung dan Simpan Gaji</button>
    <a href="/admin/penggajian" class="btn btn-secondary">Batal</a>
</form>

<?= $this->endSection() ?>