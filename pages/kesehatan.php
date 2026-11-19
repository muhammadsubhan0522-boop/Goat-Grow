<?php
require_once "../config/koneksi.php";
if(isset($_POST['simpan'])){
    mysqli_query($conn,"INSERT INTO tb_kesehatan (id_ternak,tanggal,jenis_tindakan,gejala,obat_tindakan,status) VALUES ('{$_POST['id_ternak']}','{$_POST['tgl']}','{$_POST['jenis']}','{$_POST['gejala']}','{$_POST['obat']}','{$_POST['status']}')");
    header("Location: kesehatan.php"); exit;
}
include "../layout/header.php"; include "../layout/sidebar.php"; ?>
<div class="page-header"><div class="container-xl"><h2 class="page-title">Kesehatan Ternak</h2></div></div>
<div class="page-body"><div class="container-xl"><div class="row row-cards">
<div class="col-md-4"><form method="POST" class="card"><div class="card-body">
<select name="id_ternak" class="form-select mb-2"><?php $q=mysqli_query($conn,"SELECT * FROM tb_ternak"); while($t=mysqli_fetch_assoc($q)) echo "<option value='{$t['id_ternak']}'>{$t['kode_ternak']}</option>"; ?></select>
<input type="date" name="tgl" class="form-control mb-2" value="<?= date('Y-m-d') ?>">
<select name="jenis" class="form-select mb-2"><option>Pemeriksaan</option><option>Pengobatan</option><option>Vaksinasi</option></select>
<input name="gejala" class="form-control mb-2" placeholder="Gejala" required>
<input name="obat" class="form-control mb-2" placeholder="Obat / Vaksin" required>
<select name="status" class="form-select mb-3"><option>Dalam Perawatan</option><option>Selesai</option></select>
<button name="simpan" class="btn btn-primary w-100">Simpan</button></div></form></div>
<div class="col-md-8"><div class="card"><table class="table card-table"><thead><tr><th>Tanggal</th><th>Ternak</th><th>Tindakan</th><th>Gejala</th><th>Obat</th><th>Status</th></tr></thead><tbody>
<?php $q=mysqli_query($conn,"SELECT k.*,t.kode_ternak FROM tb_kesehatan k JOIN tb_ternak t ON k.id_ternak=t.id_ternak ORDER BY k.id_kesehatan DESC"); while($r=mysqli_fetch_assoc($q)): ?>
<tr><td><?= $r['tanggal'] ?></td><td><strong><?= $r['kode_ternak'] ?></strong></td><td><?= $r['jenis_tindakan'] ?></td><td><?= $r['gejala'] ?></td><td><?= $r['obat_tindakan'] ?></td><td><span class="badge bg-success-lt"><?= $r['status'] ?></span></td></tr>
<?php endwhile; ?></tbody></table></div></div>
</div></div></div><?php include "../layout/footer.php"; ?>