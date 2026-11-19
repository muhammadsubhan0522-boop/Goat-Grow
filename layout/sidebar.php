<?php $c = basename($_SERVER['PHP_SELF']); ?>
<aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"><span class="navbar-toggler-icon"></span></button>
        <h1 class="navbar-brand py-3">
            <a href="<?= $base_url ?>index.php" class="text-white text-decoration-none d-flex align-items-center gap-2">
                <span class="bg-green text-white p-2 rounded-3"><i class="ti ti-antenna-bars-5"></i></span>
                <div><div class="fw-bold lh-1">GoatGrow <span class="text-green">IoT</span></div><small class="text-muted fs-6 fw-normal">Precision Livestock</small></div>
            </a>
        </h1>
        <div class="collapse navbar-collapse" id="sidebar-menu">
            <ul class="navbar-nav pt-lg-2">
                <li class="nav-item <?= $c=='index.php'?'active':'' ?>"><a class="nav-link" href="<?= $base_url ?>index.php"><i class="ti ti-layout-dashboard me-2"></i>1. Dashboard</a></li>
                <li class="nav-item <?= $c=='ternak.php'?'active':'' ?>"><a class="nav-link" href="<?= $base_url ?>pages/ternak.php"><i class="ti ti-paw me-2"></i>2. Data Ternak</a></li>
                <li class="nav-item <?= $c=='bobot.php'?'active':'' ?>"><a class="nav-link" href="<?= $base_url ?>pages/bobot.php"><i class="ti ti-scale me-2"></i>3. Monitoring Bobot & ADG</a></li>
                <li class="nav-item <?= $c=='pakan.php'?'active':'' ?>"><a class="nav-link" href="<?= $base_url ?>pages/pakan.php"><i class="ti ti-seeding me-2"></i>4. Manajemen Pakan & FCR</a></li>
                <li class="nav-item <?= $c=='kesehatan.php'?'active':'' ?>"><a class="nav-link" href="<?= $base_url ?>pages/kesehatan.php"><i class="ti ti-heartbeat me-2"></i>5. Kesehatan Ternak</a></li>
                <li class="nav-item <?= $c=='lingkungan.php'?'active':'' ?>"><a class="nav-link" href="<?= $base_url ?>pages/lingkungan.php"><i class="ti ti-temperature me-2"></i>6. Monitoring Lingkungan</a></li>
                <li class="nav-item <?= $c=='simulasi.php'?'active':'' ?>"><a class="nav-link text-green fw-bold" href="<?= $base_url ?>pages/simulasi.php"><i class="ti ti-cpu text-green me-2"></i>7. Simulasi IoT (ESP32)</a></li>
                <li class="nav-item <?= $c=='keuangan.php'?'active':'' ?>"><a class="nav-link" href="<?= $base_url ?>pages/keuangan.php"><i class="ti ti-coin me-2"></i>8. Keuangan & Profit</a></li>
                <li class="nav-item <?= $c=='laporan.php'?'active':'' ?>"><a class="nav-link" href="<?= $base_url ?>pages/laporan.php"><i class="ti ti-file-analytics me-2"></i>9. Laporan Periode</a></li>
                <li class="nav-item <?= $c=='notifikasi.php'?'active':'' ?>"><a class="nav-link" href="<?= $base_url ?>pages/notifikasi.php"><i class="ti ti-bell me-2"></i>10. Notifikasi <?php if($unread_count>0): ?><span class="badge bg-red ms-auto"><?= $unread_count ?></span><?php endif; ?></a></li>
                <li class="nav-item <?= $c=='pengaturan.php'?'active':'' ?>"><a class="nav-link" href="<?= $base_url ?>pages/pengaturan.php"><i class="ti ti-settings me-2"></i>11. Pengaturan</a></li>
            </ul>
        </div>
    </div>
</aside>
<div class="page-wrapper">
    <header class="navbar navbar-expand-md d-none d-lg-flex d-print-none bg-white border-bottom">
        <div class="container-xl">
            <div class="text-muted small"><i class="ti ti-building-farm me-2 text-primary"></i><strong><?= htmlspecialchars($cfg['nama_peternakan']) ?></strong> • Barn Cluster A (ESP32 Telemetry)</div>
            <div class="navbar-nav flex-row order-md-last align-items-center gap-2">
                <span class="avatar avatar-sm bg-primary-lt fw-bold">MS</span>
                <span class="small fw-semibold"><?= htmlspecialchars($cfg['pemilik']) ?></span>
            </div>
        </div>
    </header>