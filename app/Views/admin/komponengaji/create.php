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
                <option value="tunjangan">Gaji Pokok</option>
                <option value="potongan">Tunjangan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan:</label>
            <select id="jabatan" name="jabatan" class="form-control" required>
                <option value="ketua">Ketua</option>
                <option value="wakil_ketua">Wakil Ketua</option>
                <option value="anggota">Anggota</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="nominal" class="form-label">Nominal:</label>
            <input type="number" id="nominal" name="nominal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="satuan" class="form-label">Satuan:</label>
            <input type="text" id="satuan" name="satuan" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/admin/gaji" class="btn btn-secondary">Batal</a>
    </form>

<?= $this->endSection() ?>
