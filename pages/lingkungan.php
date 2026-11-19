<?php require_once "../config/koneksi.php"; include "../layout/header.php"; include "../layout/sidebar.php"; ?>
<div class="page-header"><div class="container-xl"><h2 class="page-title">Monitoring Lingkungan Kandang</h2></div></div>
<div class="page-body"><div class="container-xl"><div class="card"><table class="table card-table"><thead><tr><th>Waktu</th><th>Suhu</th><th>Kelembapan</th><th>Amonia</th><th>Status</th></tr></thead><tbody>
<?php $q=mysqli_query($conn,"SELECT * FROM tb_sensor ORDER BY id_sensor DESC LIMIT 30"); while($r=mysqli_fetch_assoc($q)): ?>
<tr><td><?= $r['waktu_rekam'] ?></td><td><?= $r['suhu'] ?> °C</td><td><?= $r['kelembapan'] ?> %</td><td><?= $r['amonia'] ?> ppm</td><td><span class="badge bg-<?= $r['status_kandang']=='Bahaya'?'danger':'success' ?>"><?= $r['status_kandang'] ?></span></td></tr>
<?php endwhile; ?></tbody></table></div></div></div><?php include "../layout/footer.php"; ?>