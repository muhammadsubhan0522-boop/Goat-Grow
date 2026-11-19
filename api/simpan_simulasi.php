<?php
header("Content-Type: application/json");
require_once "../config/koneksi.php";

$d = json_decode(file_get_contents("php://input"), true);
if (isset($d["suhu"], $d["kelembapan"], $d["amonia"])) {
    $s = floatval($d["suhu"]);
    $k = floatval($d["kelembapan"]);
    $a = floatval($d["amonia"]);
    $st = "Normal";

    if ($s > $cfg["max_suhu"] || $s < $cfg["min_suhu"] || $a > $cfg["max_amonia"]) {
        $st = "Bahaya";
        mysqli_query($conn, "INSERT INTO tb_notifikasi (judul, pesan, kategori) VALUES ('Alarm Mikroklimat Kandang', 'Suhu: {$s}°C, Kelembapan: {$k}%, Amonia: {$a} ppm melewati batas aman!', 'Lingkungan')");
    } elseif ($k > $cfg["max_kelembapan"]) {
        $st = "Waspada";
    }

    mysqli_query($conn, "INSERT INTO tb_sensor (suhu, kelembapan, amonia, status_kandang) VALUES ('$s', '$k', '$a', '$st')");
    echo json_encode(["success" => true, "status_kandang" => $st, "waktu" => date("H:i:s")]);
}
?>