<?php
require_once "config/koneksi.php";
include "layout/header.php";
include "layout/sidebar.php";

$t = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total, AVG(bobot_terakhir) as avg_b, AVG(bobot_terakhir-bobot_awal) as gain FROM tb_ternak WHERE status='Aktif'"));
$s = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_sensor ORDER BY id_sensor DESC LIMIT 1"));
$qc = mysqli_query($conn, "SELECT * FROM (SELECT * FROM tb_sensor ORDER BY id_sensor DESC LIMIT 10) sub ORDER BY id_sensor ASC");
$lbl=[]; $suhu=[]; $amo=[];
while($x=mysqli_fetch_assoc($qc)){ $lbl[]=date("H:i",strtotime($x['waktu_rekam'])); $suhu[]=$x['suhu']; $amo[]=$x['amonia']; }
?>
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col"><div class="page-pretitle">Executive Livestock Telemetry</div><h2 class="page-title">Smart Fattening Operations Dashboard</h2></div>
            <div class="col-auto"><a href="pages/simulasi.php" class="btn btn-success"><i class="ti ti-cpu me-1"></i> Live IoT Simulator</a></div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards mb-3">
            <div class="col-sm-6 col-lg-3"><div class="card"><div class="card-body d-flex align-items-center gap-3"><div class="kpi-icon bg-blue-lt text-blue"><i class="ti ti-paw"></i></div><div><div class="text-muted small">Populasi Aktif</div><div class="h2 mb-0"><?= $t['total']??0 ?> Ekor</div><div class="text-success small">Avg Gain: +<?= number_format($t['gain']??0,2) ?> kg</div></div></div></div></div>
            <div class="col-sm-6 col-lg-3"><div class="card"><div class="card-body d-flex align-items-center gap-3"><div class="kpi-icon bg-green-lt text-green"><i class="ti ti-scale"></i></div><div><div class="text-muted small">Rata-Rata Bobot</div><div class="h2 mb-0"><?= number_format($t['avg_b']??0,1) ?> kg</div><div class="text-primary small">Target Panen: 35 kg</div></div></div></div></div>
            <div class="col-sm-6 col-lg-3"><div class="card"><div class="card-body d-flex align-items-center gap-3"><div class="kpi-icon bg-orange-lt text-orange"><i class="ti ti-temperature"></i></div><div><div class="text-muted small">Mikroklimat Kandang</div><div class="h2 mb-0"><?= $s['suhu']??'--' ?>°C / <?= $s['kelembapan']??'--' ?>%</div><div class="small">Amonia: <strong><?= $s['amonia']??'--' ?> ppm</strong></div></div></div></div></div>
            <div class="col-sm-6 col-lg-3"><div class="card"><div class="card-body d-flex align-items-center gap-3"><div class="kpi-icon bg-purple-lt text-purple"><i class="ti ti-shield-check"></i></div><div><div class="text-muted small">Status Kandang</div><?php $st=$s['status_kandang']??'Normal'; $bg=$st=='Bahaya'?'danger':($st=='Waspada'?'warning':'success'); ?><div class="h2 mb-0"><span class="badge bg-<?= $bg ?>"><?= $st ?></span></div><div class="text-muted small">Node: ESP32-Kandang-A</div></div></div></div></div>
        </div>
        <div class="card mb-3"><div class="card-header"><h3 class="card-title">Grafik Telemetry Suhu & Amonia Kandang</h3></div><div class="card-body"><canvas id="cDash" height="85"></canvas></div></div>
        <div class="card">
            <div class="card-header"><h3 class="card-title">Daftar Ternak Penggemukan Aktif</h3></div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter">
                    <thead><tr><th>Kode</th><th>Ras / Jenis</th><th>Kelamin</th><th>Tgl Masuk</th><th>Bobot Awal</th><th>Bobot Akhir</th><th>Kenaikan</th></tr></thead>
                    <tbody>
                        <?php $q=mysqli_query($conn,"SELECT * FROM tb_ternak ORDER BY id_ternak DESC"); while($r=mysqli_fetch_assoc($q)): ?>
                        <tr>
                            <td><span class="badge bg-blue-lt fw-bold"><?= $r['kode_ternak'] ?></span></td>
                            <td><?= $r['jenis'] ?> (<?= $r['umur_bulan'] ?> bln)</td>
                            <td><?= $r['jenis_kelamin'] ?></td>
                            <td><?= $r['tanggal_masuk'] ?></td>
                            <td><?= $r['bobot_awal'] ?> kg</td>
                            <td class="fw-bold"><?= $r['bobot_terakhir'] ?> kg</td>
                            <td class="text-success fw-semibold">+<?= number_format($r['bobot_terakhir']-$r['bobot_awal'],2) ?> kg</td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
new Chart(document.getElementById("cDash"), {
    type: "line",
    data: {
        labels: <?= json_encode($lbl) ?>,
        datasets: [
            { label: "Suhu (°C)", data: <?= json_encode($suhu) ?>, borderColor: "#206bc4", tension: 0.3 },
            { label: "Amonia (ppm)", data: <?= json_encode($amo) ?>, borderColor: "#f59f00", tension: 0.3 }
        ]
    }
});
</script>
<?php include "layout/footer.php"; ?>