<?php
require_once "../config/koneksi.php";
if(isset($_GET['read'])){ mysqli_query($conn,"UPDATE tb_notifikasi SET status_baca='Sudah'"); header("Location: notifikasi.php"); exit; }
include "../layout/header.php"; include "../layout/sidebar.php"; ?>
<div class="page-header"><div class="container-xl"><div class="row"><div class="col"><h2 class="page-title">Notifikasi & Alarm</h2></div><div class="col-auto"><a href="?read=1" class="btn btn-outline-primary">Tandai Semua Dibaca</a></div></div></div></div>
<div class="page-body"><div class="container-xl"><div class="card"><div class="list-group list-group-flush">
<?php $q=mysqli_query($conn,"SELECT * FROM tb_notifikasi ORDER BY id_notif DESC"); while($r=mysqli_fetch_assoc($q)): ?>
<div class="list-group-item"><strong>[<?= $r['kategori'] ?>] <?= $r['judul'] ?></strong><div class="text-muted"><?= $r['pesan'] ?> (<?= $r['waktu'] ?>)</div></div>
<?php endwhile; ?></div></div></div></div><?php include "../layout/footer.php"; ?>