<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

    <h3>Ubah Data Komponen Gaji</h3>

    <form action="/admin/komponengaji/update/<?= $komponen['id_komponen_gaji'] ?>" method="post">
        <div class="mb-3">
            <label for="nama_komponen" class="form-label">Nama Komponen:</label>
            <input type="text" id="nama_komponen" name="nama_komponen" class="form-control" value="<?= $komponen['nama_komponen'] ?>" required>
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori:</label>
            <select id="kategori" name="kategori" class="form-control" required>
                <option value="Gaji Pokok" <?= $komponen['kategori'] === 'Gaji Pokok' ? 'selected' : '' ?>>Gaji Pokok</option>
                <option value="Tunjangan Melekat" <?= $komponen['kategori'] === 'Tunjangan Melekat' ? 'selected' : '' ?>>Tunjangan Melekat</option>
                <option value="Tunjangan Lain" <?= $komponen['kategori'] === 'Tunjangan Lain' ? 'selected' : '' ?>>Tunjangan Lain</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan:</label>
            <select id="jabatan" name="jabatan" class="form-control" required>
                <option value="ketua" <?= $komponen['jabatan'] === 'ketua' ? 'selected' : '' ?>>Ketua</option>
                <option value="wakil_ketua" <?= $komponen['jabatan'] === 'wakil_ketua' ? 'selected' : '' ?>>Wakil Ketua</option>
                <option value="anggota" <?= $komponen['jabatan'] === 'anggota' ? 'selected' : '' ?>>Anggota</option>
                <option value="semua" <?= $komponen['jabatan'] === 'semua' ? 'selected' : '' ?>>Semua</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="nominal" class="form-label">Nominal:</label>
            <input type="number" id="nominal" name="nominal" class="form-control" value="<?= $komponen['nominal'] ?>" required>
        </div>

        <div class="mb-3">
            <label for="satuan" class="form-label">Satuan:</label>
            <select name="satuan" id="satuan" class="form-control" required>
                <option value="bulan" <?= $komponen['satuan'] === 'bulan' ? 'selected' : '' ?>>Bulan</option>
                <option value="hari" <?= $komponen['satuan'] === 'hari' ? 'selected' : '' ?>>Hari</option>
                <option value="periode" <?= $komponen['satuan'] === 'periode' ? 'selected' : '' ?>>Periode</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/admin/gaji" class="btn btn-secondary">Batal</a>
    </form>

<?= $this->endSection() ?>
