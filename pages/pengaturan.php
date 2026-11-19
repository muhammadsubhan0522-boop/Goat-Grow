<?php
require_once "../config/koneksi.php";
if(isset($_POST['save'])){
    mysqli_query($conn,"UPDATE tb_pengaturan SET nama_peternakan='{$_POST['nama']}', pemilik='{$_POST['pemilik']}', max_suhu='{$_POST['max_s']}', min_suhu='{$_POST['min_s']}', max_kelembapan='{$_POST['max_k']}', max_amonia='{$_POST['max_a']}' WHERE id=1");
    header("Location: pengaturan.php"); exit;
}
include "../layout/header.php"; include "../layout/sidebar.php"; ?>
<div class="page-header"><div class="container-xl"><h2 class="page-title">Pengaturan Batas Sensor IoT</h2></div></div>
<div class="page-body"><div class="container-xl"><form method="POST" class="card"><div class="card-body row g-3">
<div class="col-md-6"><label class="form-label">Nama Farm</label><input name="nama" class="form-control" value="<?= $cfg['nama_peternakan'] ?>"></div>
<div class="col-md-6"><label class="form-label">Pemilik</label><input name="pemilik" class="form-control" value="<?= $cfg['pemilik'] ?>"></div>
<div class="col-md-3"><label class="form-label">Min Suhu (°C)</label><input type="number" step="0.1" name="min_s" class="form-control" value="<?= $cfg['min_suhu'] ?>"></div>
<div class="col-md-3"><label class="form-label">Max Suhu (°C)</label><input type="number" step="0.1" name="max_s" class="form-control" value="<?= $cfg['max_suhu'] ?>"></div>
<div class="col-md-3"><label class="form-label">Max Kelembapan (%)</label><input type="number" step="0.1" name="max_k" class="form-control" value="<?= $cfg['max_kelembapan'] ?>"></div>
<div class="col-md-3"><label class="form-label">Max Amonia (ppm)</label><input type="number" step="0.1" name="max_a" class="form-control" value="<?= $cfg['max_amonia'] ?>"></div>
<div class="col-12"><button name="save" class="btn btn-primary">Simpan Pengaturan</button></div>
</div></form></div></div><?php include "../layout/footer.php"; ?>