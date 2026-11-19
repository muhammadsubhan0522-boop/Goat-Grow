<?php
require_once "../config/koneksi.php";
if(isset($_POST['simpan'])){
    $id=intval($_POST['id_ternak']); $tgl=$_POST['tgl']; $bw=floatval($_POST['bobot']);
    $prev=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM tb_bobot WHERE id_ternak=$id ORDER BY id_bobot DESC LIMIT 1"));
    $adg=$prev ? ($bw-$prev['bobot'])/max(1,(strtotime($tgl)-strtotime($prev['tanggal_timbang']))/86400) : 0;
    mysqli_query($conn,"INSERT INTO tb_bobot (id_ternak,tanggal_timbang,bobot,adg) VALUES ('$id','$tgl','$bw','$adg')");
    mysqli_query($conn,"UPDATE tb_ternak SET bobot_terakhir='$bw' WHERE id_ternak=$id");
    header("Location: bobot.php"); exit;
}
include "../layout/header.php"; include "../layout/sidebar.php"; ?>
<div class="page-header"><div class="container-xl"><h2 class="page-title">Monitoring Bobot & ADG</h2></div></div>
<div class="page-body"><div class="container-xl"><div class="row row-cards">
<div class="col-md-4"><form method="POST" class="card"><div class="card-header"><h3 class="card-title">Input Timbangan</h3></div><div class="card-body">
<select name="id_ternak" class="form-select mb-2"><?php $q=mysqli_query($conn,"SELECT * FROM tb_ternak"); while($t=mysqli_fetch_assoc($q)) echo "<option value='{$t['id_ternak']}'>{$t['kode_ternak']} ({$t['bobot_terakhir']} kg)</option>"; ?></select>
<input type="date" name="tgl" class="form-control mb-2" value="<?= date('Y-m-d') ?>" required>
<input type="number" step="0.01" name="bobot" class="form-control mb-3" placeholder="Bobot Baru (kg)" required>
<button name="simpan" class="btn btn-primary w-100">Simpan & Hitung ADG</button></div></form></div>
<div class="col-md-8"><div class="card"><div class="table-responsive"><table class="table card-table"><thead><tr><th>Tanggal</th><th>Kode</th><th>Bobot</th><th>ADG (kg/hari)</th></tr></thead><tbody>
<?php $q=mysqli_query($conn,"SELECT b.*,t.kode_ternak FROM tb_bobot b JOIN tb_ternak t ON b.id_ternak=t.id_ternak ORDER BY b.id_bobot DESC"); while($r=mysqli_fetch_assoc($q)): ?>
<tr><td><?= $r['tanggal_timbang'] ?></td><td><strong><?= $r['kode_ternak'] ?></strong></td><td><?= $r['bobot'] ?> kg</td><td class="text-success"><?= number_format($r['adg'],3) ?> kg/hari</td></tr>
<?php endwhile; ?></tbody></table></div></div></div>
</div></div></div><?php include "../layout/footer.php"; ?>