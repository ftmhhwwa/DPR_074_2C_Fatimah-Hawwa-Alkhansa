<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

    <h3>Ubah Data Penggajian</h3>
    <form action="<?= site_url('admin/penggajian/update/' . $penggajian['id_anggota']) ?>" method="post">
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="id_anggota">ID Anggota</label>
            <input type="text" name="id_anggota" class="form-control" value="<?= $penggajian['id_anggota'] ?>" readonly>
            
        </div>
        <div class="form-group">
            <label for="id_komponen_gaji">ID Komponen Gaji</label>
            <input type="text" name="id_komponen_gaji" class="form-control" value="<?= $penggajian['id_komponen_gaji'] ?>" readonly>

        </div>
        <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <select id="jabatan" name="jabatan" class="form-control" required>
                <option value="ketua" <?= $penggajian['jabatan'] === 'ketua' ? 'selected' : '' ?>>Ketua</option>
                <option value="wakil_ketua" <?= $penggajian['jabatan'] === 'wakil_ketua' ? 'selected' : '' ?>>Wakil Ketua</option>
                <option value="anggota" <?= $penggajian['jabatan'] === 'anggota' ? 'selected' : '' ?>>Anggota</option>
            </select>

        </div>
        <div class="form-group">
            <label for="total_gaji">Total Gaji</label>
            <input type="text" name="total_gaji" class="form-control" value="<?= $penggajian['total_gaji'] ?>">

        </div>
        <div class="form-group">
            <label for="take_home_pay">Take Home Pay</label>
            <input type="text" name="take_home_pay" class="form-control" value="<?= $penggajian['take_home_pay'] ?>">

        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

<?= $this->endSection() ?>