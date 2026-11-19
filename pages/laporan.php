<?php require_once "../config/koneksi.php"; include "../layout/header.php"; include "../layout/sidebar.php"; ?>
<div class="page-header"><div class="container-xl"><div class="row"><div class="col"><h2 class="page-title">Laporan Operasional</h2></div><div class="col-auto"><button onclick="window.print()" class="btn btn-primary">Cetak Laporan</button></div></div></div></div>
<div class="page-body"><div class="container-xl"><div class="card"><div class="card-body">
<h3>Rekapitulasi Data Ternak</h3><table class="table table-bordered mb-4"><thead><tr><th>Kode</th><th>Jenis</th><th>Bobot Awal</th><th>Bobot Akhir</th></tr></thead><tbody>
<?php $q=mysqli_query($conn,"SELECT * FROM tb_ternak"); while($r=mysqli_fetch_assoc($q)) echo "<tr><td>{$r['kode_ternak']}</td><td>{$r['jenis']}</td><td>{$r['bobot_awal']} kg</td><td>{$r['bobot_terakhir']} kg</td></tr>"; ?>
</tbody></table>
<h3>Rekapitulasi Keuangan</h3><table class="table table-bordered"><thead><tr><th>Tanggal</th><th>Kategori</th><th>Keterangan</th><th>Tipe</th><th>Nominal</th></tr></thead><tbody>
<?php $q=mysqli_query($conn,"SELECT * FROM tb_keuangan"); while($r=mysqli_fetch_assoc($q)) echo "<tr><td>{$r['tanggal']}</td><td>{$r['kategori']}</td><td>{$r['keterangan']}</td><td>{$r['tipe']}</td><td>Rp ".number_format($r['nominal'])."</td></tr>"; ?>
</tbody></table></div></div></div></div><?php include "../layout/footer.php"; ?>