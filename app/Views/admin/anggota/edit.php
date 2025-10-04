<?= $this->extend('templates/template') ?>

<?= $this->section('content') ?>
    <h3>Ubah Data Anggota</h3>
    <form action="/admin/anggota/update/<?= $anggota['id_anggota'] ?>" method="post">
        <div class="form-group">
            <label for="gelar_depan">Gelar Depan:</label>
            <input type="text" id="gelar_depan" name="gelar_depan" class="form-control" value="<?= $anggota['gelar_depan'] ?>" required>
        </div>
        <div class="form-group">
            <label for="nama_depan">Nama Depan:</label>
            <input type="text" id="nama_depan" name="nama_depan" class="form-control" value="<?= $anggota['nama_depan'] ?>" required>
        </div>
        <div class="form-group">
            <label for="nama_belakang">Nama Belakang:</label>
            <input type="text" id="nama_belakang" name="nama_belakang" class="form-control" value="<?= $anggota['nama_belakang'] ?>" required>
        </div>
        <div class="form-group">
            <label for="gelar_belakang">Gelar Belakang:</label>
            <input type="text" id="gelar_belakang" name="gelar_belakang" class="form-control" value="<?= $anggota['gelar_belakang'] ?>">
        </div>
        <div class="form-group">
            <label for="jabatan">Jabatan:</label>
            <select id="jabatan" name="jabatan" class="form-control" required>
                <option value="ketua" <?= $anggota['jabatan'] === 'ketua' ? 'selected' : '' ?>>Ketua</option>
                <option value="wakil_ketua" <?= $anggota['jabatan'] === 'wakil_ketua' ? 'selected' : '' ?>>Wakil Ketua</option>
                <option value="anggota" <?= $anggota['jabatan'] === 'anggota' ? 'selected' : '' ?>>Anggota</option>
            </select>
        </div>
        <div class="form-group">
            <label for="status_pernikahan">Status Pernikahan:</label>
            <select id="status_pernikahan" name="status_pernikahan" class="form-control" required>
                <option value="belum_kawin" <?= $anggota['status_pernikahan'] === 'belum_kawin' ? 'selected' : '' ?>>Belum Kawin</option>
                <option value="kawin" <?= $anggota['status_pernikahan'] === 'kawin' ? 'selected' : '' ?>>Kawin</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/admin/anggota" class="btn btn-secondary">Batal</a>
    </form>
<?= $this->endSection() ?>