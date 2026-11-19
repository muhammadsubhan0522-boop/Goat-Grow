<?php
require_once "../config/koneksi.php";
if(isset($_POST['simpan'])){
    mysqli_query($conn,"INSERT INTO tb_keuangan (tanggal,tipe,kategori,keterangan,nominal) VALUES ('{$_POST['tgl']}','{$_POST['tipe']}','{$_POST['kat']}','{$_POST['ket']}','{$_POST['nom']}')");
    header("Location: keuangan.php"); exit;
}
include "../layout/header.php"; include "../layout/sidebar.php"; ?>
<div class="page-header"><div class="container-xl"><h2 class="page-title">Keuangan & Profit</h2></div></div>
<div class="page-body"><div class="container-xl"><div class="row row-cards">
<div class="col-md-4"><form method="POST" class="card"><div class="card-body">
<input type="date" name="tgl" class="form-control mb-2" value="<?= date('Y-m-d') ?>">
<select name="tipe" class="form-select mb-2"><option>Pengeluaran</option><option>Pemasukan</option></select>
<select name="kat" class="form-select mb-2"><option>Pakan</option><option>Pembelian Ternak</option><option>Obat & Vaksin</option><option>Operasional</option><option>Penjualan Ternak</option></select>
<input name="ket" class="form-control mb-2" placeholder="Keterangan" required>
<input type="number" name="nom" class="form-control mb-3" placeholder="Nominal (Rp)" required>
<button name="simpan" class="btn btn-primary w-100">Simpan Transaksi</button></div></form></div>
<div class="col-md-8"><div class="card"><table class="table card-table"><thead><tr><th>Tanggal</th><th>Kategori</th><th>Keterangan</th><th>Tipe</th><th>Nominal</th></tr></thead><tbody>
<?php $q=mysqli_query($conn,"SELECT * FROM tb_keuangan ORDER BY id_keuangan DESC"); while($r=mysqli_fetch_assoc($q)): ?>
<tr><td><?= $r['tanggal'] ?></td><td><?= $r['kategori'] ?></td><td><?= $r['keterangan'] ?></td><td><?= $r['tipe'] ?></td><td>Rp <?= number_format($r['nominal']) ?></td></tr>
<?php endwhile; ?></tbody></table></div></div>
</div></div></div><?php include "../layout/footer.php"; ?>