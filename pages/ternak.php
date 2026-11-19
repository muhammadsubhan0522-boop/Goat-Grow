<?php
require_once "../config/koneksi.php";
if(isset($_POST['add'])){
    $k=$_POST['kode']; $j=$_POST['jenis']; $u=$_POST['umur']; $jk=$_POST['jk']; $t=$_POST['tgl']; $bw=$_POST['bobot'];
    mysqli_query($conn,"INSERT INTO tb_ternak (kode_ternak,jenis,umur_bulan,jenis_kelamin,tanggal_masuk,bobot_awal,bobot_terakhir) VALUES ('$k','$j','$u','$jk','$t','$bw','$bw')");
    header("Location: ternak.php"); exit;
}
if(isset($_GET['del'])){ mysqli_query($conn,"DELETE FROM tb_ternak WHERE id_ternak=".intval($_GET['del'])); header("Location: ternak.php"); exit; }
include "../layout/header.php"; include "../layout/sidebar.php"; ?>
<div class="page-header"><div class="container-xl"><h2 class="page-title">Data Ternak</h2></div></div>
<div class="page-body"><div class="container-xl"><div class="row row-cards">
<div class="col-md-4"><form method="POST" class="card"><div class="card-header"><h3 class="card-title">Tambah Kambing</h3></div><div class="card-body">
<input name="kode" class="form-control mb-2" placeholder="Kode (GT-2026-05)" required>
<input name="jenis" class="form-control mb-2" placeholder="Jenis (Boer/Etawa)" required>
<input type="number" name="umur" class="form-control mb-2" placeholder="Umur (Bulan)" required>
<select name="jk" class="form-select mb-2"><option>Jantan</option><option>Betina</option></select>
<input type="date" name="tgl" class="form-control mb-2" value="<?= date('Y-m-d') ?>" required>
<input type="number" step="0.01" name="bobot" class="form-control mb-3" placeholder="Bobot Awal (kg)" required>
<button name="add" class="btn btn-primary w-100">Simpan</button></div></form></div>
<div class="col-md-8"><div class="card"><div class="table-responsive"><table class="table card-table"><thead><tr><th>Kode</th><th>Jenis</th><th>Umur</th><th>Kelamin</th><th>Bobot Awal</th><th>Bobot Akhir</th><th>Aksi</th></tr></thead><tbody>
<?php $q=mysqli_query($conn,"SELECT * FROM tb_ternak ORDER BY id_ternak DESC"); while($r=mysqli_fetch_assoc($q)): ?>
<tr><td><strong><?= $r['kode_ternak'] ?></strong></td><td><?= $r['jenis'] ?></td><td><?= $r['umur_bulan'] ?> bln</td><td><?= $r['jenis_kelamin'] ?></td><td><?= $r['bobot_awal'] ?> kg</td><td><?= $r['bobot_terakhir'] ?> kg</td><td><a href="?del=<?= $r['id_ternak'] ?>" class="btn btn-sm btn-danger">Hapus</a></td></tr>
<?php endwhile; ?></tbody></table></div></div></div>
</div></div></div><?php include "../layout/footer.php"; ?>