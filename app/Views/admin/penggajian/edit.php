<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

    <h3>Ubah Data Penggajian</h3>
    <form action="<?= site_url('admin/penggajian/update/' . $penggajian['id_anggota']) ?>" method="post">
        <?= csrf_field() ?>
        <input type="hidden" name="_method" value="PUT">
        
        <div class="form-group mb-3">
            <label for="id_anggota">ID Anggota</label>
            <input type="text" name="id_anggota" class="form-control" value="<?= $penggajian['id_anggota'] ?>" readonly>
        </div>
        
        <div class="form-group mb-3">
            <label for="id_komponen_gaji">ID Komponen Gaji Pokok Awal</label>
            <input type="text" name="id_komponen_gaji" class="form-control" value="<?= $penggajian['id_komponen_gaji'] ?>" readonly>
        </div>

        <div class="form-group mb-3">
            <label for="jabatan">Jabatan</label>
            <input type="text" class="form-control" value="<?= $penggajian['jabatan'] ?>" readonly>
        </div>
        
        <div class="form-group mb-3">
            <label for="total_gaji">Total Gaji (Bruto)</label>
            <input type="number" step="0.01" name="total_gaji" class="form-control" value="<?= $penggajian['total_gaji'] ?>">
        </div>
        
        <div class="form-group mb-3">
            <label for="take_home_pay">Take Home Pay</label>
            <input type="number" step="0.01" name="take_home_pay" class="form-control" value="<?= $penggajian['take_home_pay'] ?>">
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="/admin/penggajian" class="btn btn-secondary">Batal</a>
    </form>

<?= $this->endSection() ?>