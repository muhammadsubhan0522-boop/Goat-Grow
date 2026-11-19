<?php
require_once "../config/koneksi.php";
if(isset($_POST['simpan'])){
    $tgl=$_POST['tgl']; $j=$_POST['jenis']; $jml=$_POST['jml']; $sisa=$_POST['sisa']; $biaya=$_POST['biaya'];
    mysqli_query($conn,"INSERT INTO tb_pakan (tanggal,jenis_pakan,jumlah_kg,sisa_kg,biaya,jadwal) VALUES ('$tgl','$j','$jml','$sisa','$biaya','Pagi & Sore')");
    mysqli_query($conn,"INSERT INTO tb_keuangan (tanggal,tipe,kategori,keterangan,nominal) VALUES ('$tgl','Pengeluaran','Pakan','Pakan: $j','$biaya')");
    header("Location: pakan.php"); exit;
}
include "../layout/header.php"; include "../layout/sidebar.php";
$pk=mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(jumlah_kg-sisa_kg) as k FROM tb_pakan"))['k']??0;
$gn=mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(bobot_terakhir-bobot_awal) as g FROM tb_ternak"))['g']??1;
?>
<div class="page-header"><div class="container-xl"><h2 class="page-title">Manajemen Pakan & FCR (Estimasi FCR: <?= number_format($gn>0?$pk/$gn:0,2) ?>)</h2></div></div>
<div class="page-body"><div class="container-xl"><div class="row row-cards">
<div class="col-md-4"><form method="POST" class="card"><div class="card-body">
<input type="date" name="tgl" class="form-control mb-2" value="<?= date('Y-m-d') ?>">
<input name="jenis" class="form-control mb-2" placeholder="Jenis Pakan" required>
<input type="number" step="0.1" name="jml" class="form-control mb-2" placeholder="Jumlah (kg)" required>
<input type="number" step="0.1" name="sisa" class="form-control mb-2" value="0" placeholder="Sisa (kg)">
<input type="number" name="biaya" class="form-control mb-3" placeholder="Biaya (Rp)" required>
<button name="simpan" class="btn btn-primary w-100">Simpan Pakan</button></div></form></div>
<div class="col-md-8"><div class="card"><table class="table card-table"><thead><tr><th>Tanggal</th><th>Jenis</th><th>Diberikan</th><th>Sisa</th><th>Biaya</th></tr></thead><tbody>
<?php $q=mysqli_query($conn,"SELECT * FROM tb_pakan ORDER BY id_pakan DESC"); while($r=mysqli_fetch_assoc($q)): ?>
<tr><td><?= $r['tanggal'] ?></td><td><?= $r['jenis_pakan'] ?></td><td><?= $r['jumlah_kg'] ?> kg</td><td><?= $r['sisa_kg'] ?> kg</td><td>Rp <?= number_format($r['biaya']) ?></td></tr>
<?php endwhile; ?></tbody></table></div></div>
</div></div></div><?php include "../layout/footer.php"; ?>