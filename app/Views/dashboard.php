<?= $this->extend('templates/template') ?>

<?= $this->section('content') ?>
    <h3>Selamat Datang di Dashboard!</h3>
    <p>Anda berhasil login sebagai <strong><?= session()->get('full_name'); ?></strong></p>
    <p>Ini adalah halaman utama sistem.</p>
<?= $this->endSection() ?>