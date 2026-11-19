<?php
header("Content-Type: application/json");
require_once "../config/koneksi.php";
$q = mysqli_query($conn, "SELECT * FROM tb_sensor ORDER BY id_sensor DESC LIMIT 15");
$r = [];
while ($x = mysqli_fetch_assoc($q)) {
    $x["jam"] = date("H:i:s", strtotime($x["waktu_rekam"]));
    $r[] = $x;
}
echo json_encode(array_reverse($r));
?>