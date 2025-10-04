<?php
// Ambil objek URI untuk memeriksa URL
$uri = service('uri');
$firstSegment = $uri->getSegment(1);
$secondSegment = $uri->getSegment(2);
$isLoggedIn = session()->get('isLoggedIn');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi Penghitungan & Transparasi Gaji DPR</title>
    <link rel="stylesheet" href="/css/style.css"> 
    </head>
<body>
<div class="container">
    <div class="header">
        <h2>APLIKASI PENGHITUNGAN & TRANSPARANSI GAJI DPR</h2>
    </div>

    <div class="menu">
        <?php if ($isLoggedIn) : ?>
            <a href="/dashboard" class="<?= $firstSegment === 'dashboard' ? 'active' : '' ?>">Dashboard</a>

            <?php if (session()->get('role') === 'Admin') : ?>
                <a href="/admin/anggota" class="<?= $secondSegment === 'anggota' ? 'active' : '' ?>">Data Anggota</a>
                <a href="/admin/gaji" class="<?= $secondSegment === 'gaji' ? 'active' : '' ?>">Data Gaji</a>
            
            <?php elseif (session()->get('role') === 'Public') : ?>
                <a href="/client/anggota" class="<?= $secondSegment === 'anggota' ? 'active' : '' ?>">Data Anggota</a>
                <a href="/client/penggajian" class="<?= $secondSegment === 'penggajian' ? 'active' : '' ?>">Transparansi Gaji</a>
            <?php endif; ?>

            <a href="/logout">Logout</a>
        <?php else : ?>
            <a href="/login" class="<?= $firstSegment === 'login' || empty($firstSegment) ? 'active' : '' ?>">Halaman Login</a>
        <?php endif; ?>
    </div>

    <div class="content">
        <?= $this->renderSection('content') ?>
    </div>

    <div class="footer">
        <b>D3 - Teknik Informatika, Politeknik Negeri Bandung.</b>
    </div>
</div>

</body>
</html>