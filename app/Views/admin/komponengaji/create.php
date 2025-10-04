<?= $this->extend('templates/template'); ?>

<?= $this->section('content') ?>
    
<h3>Tambah Data Komponen Gaji</h3>

    <form action="/admin/komponengaji/store" method="post">
        <div class="mb-3">
            <label for="nama_komponen" class="form-label">Nama Komponen:</label>
            <input type="text" id="nama_komponen" name="nama_komponen" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori:</label>
            <select id="kategori" name="kategori" class="form-control" required>
                <option value="Gaji Pokok">Gaji Pokok</option>
                <option value="Tunjangan Melekat">Tunjangan Melekat</option>
                <option value="Tunjangan Lain">Tunjangan Lain</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan:</label>
            <select id="jabatan" name="jabatan" class="form-control" required>
                <option value="ketua">Ketua</option>
                <option value="wakil_ketua">Wakil Ketua</option>
                <option value="anggota">Anggota</option>
                <option value="semua">Semua</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="nominal" class="form-label">Nominal:</label>
            <input type="number" id="nominal" name="nominal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="satuan" class="form-label">Satuan:</label>
            <select name="satuan" id="satuan" class="form-control" required>
                <option value="bulan">Bulan</option>
                <option value="hari">Hari</option>
                <option value="periode">Periode</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/admin/gaji" class="btn btn-secondary">Batal</a>
    </form>

<?= $this->endSection() ?>
