<?= $this->extend('templates/template') ?>

<?= $this->section('content') ?>

    <h3>Tambah Anggota Baru</h3>

    <form action="/admin/anggota/store" method="post">
        <div class="form-group">
            <label for="gelar_depan">Gelar Depan:</label>
            <input type="text" id="gelar_depan" name="gelar_depan" class="form-control">
        </div>

        <div class="form-group">
            <label for="nama_depan">Nama Depan:</label>
            <input type="text" id="nama_depan" name="nama_depan" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="nama_belakang">Nama Belakang:</label>
            <input type="text" id="nama_belakang" name="nama_belakang" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="gelar_belakang">Gelar Belakang:</label>
            <input type="text" id="gelar_belakang" name="gelar_belakang" class="form-control">
        </div>

        <div class="form-group">
            <label for="jabatan">Jabatan:</label>
            <select id="jabatan" name="jabatan" class="form-control" required>
                <option value="ketua">Ketua</option>
                <option value="wakil_ketua">Wakil Ketua</option>
                <option value="anggota">Anggota</option>
            </select>
        </div>

        <div class="form-group">
            <label for="status_pernikahan">Status Pernikahan:</label>
            <select id="status_pernikahan" name="status_pernikahan" class="form-control" required>
                <option value="kawin">Kawin</option>
                <option value="belum_kawin">Belum Kawin</option>
                <option value="cerai_hidup">Cerai Hidup</option>
                <option value="cerai_mati">Cerai Mati</option>            
            </select>
        </div>

        <div class="form-group">
            <label for="jumlah_anak">Jumlah Anak:</label>
            <input type="number" id="jumlah_anak" name="jumlah_anak" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>   
        <a href="/admin/anggota" class="btn btn-secondary">Batal</a>
    </form>

<?= $this->endSection() ?>