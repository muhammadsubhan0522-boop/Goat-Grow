<?php
$conn = mysqli_connect("localhost", "root", "", "db_goatgrow");
if (!$conn) die("Koneksi gagal: " . mysqli_connect_error());
$base_url = "http://localhost/goatgrow-iot/";

$cfg = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_pengaturan WHERE id=1")) ?: [
    "nama_peternakan" => "GoatGrow Smart Farm",
    "pemilik" => "Muhammad Subhan",
    "max_suhu" => 32.0,
    "min_suhu" => 22.0,
    "max_kelembapan" => 80.0,
    "max_amonia" => 25.0
];
$unread_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as j FROM tb_notifikasi WHERE status_baca='Belum'"))['j'] ?? 0;
?>