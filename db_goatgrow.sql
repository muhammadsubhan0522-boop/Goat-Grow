-- MySQL dump 10.13  Distrib 8.4.3, for Win64 (x86_64)
--
-- Host: localhost    Database: db_goatgrow
-- ------------------------------------------------------
-- Server version	8.4.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tb_bobot`
--

DROP TABLE IF EXISTS `tb_bobot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_bobot` (
  `id_bobot` int NOT NULL AUTO_INCREMENT,
  `id_ternak` int DEFAULT NULL,
  `tanggal_timbang` date DEFAULT NULL,
  `bobot` decimal(5,2) DEFAULT NULL,
  `adg` decimal(5,3) DEFAULT '0.000',
  PRIMARY KEY (`id_bobot`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_bobot`
--

LOCK TABLES `tb_bobot` WRITE;
/*!40000 ALTER TABLE `tb_bobot` DISABLE KEYS */;
INSERT INTO `tb_bobot` VALUES (1,1,'2026-11-19',32.00,0.000),(2,1,'2026-11-19',35.00,3.000);
/*!40000 ALTER TABLE `tb_bobot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_kesehatan`
--

DROP TABLE IF EXISTS `tb_kesehatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_kesehatan` (
  `id_kesehatan` int NOT NULL AUTO_INCREMENT,
  `id_ternak` int DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jenis_tindakan` varchar(50) DEFAULT NULL,
  `gejala` varchar(255) DEFAULT NULL,
  `obat_tindakan` varchar(255) DEFAULT NULL,
  `jadwal_berikutnya` date DEFAULT NULL,
  `status` varchar(30) DEFAULT 'Dalam Perawatan',
  PRIMARY KEY (`id_kesehatan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_kesehatan`
--

LOCK TABLES `tb_kesehatan` WRITE;
/*!40000 ALTER TABLE `tb_kesehatan` DISABLE KEYS */;
INSERT INTO `tb_kesehatan` VALUES (1,1,'2026-11-19','Pemeriksaan','demam','obat/vaksin',NULL,'Dalam Perawatan');
/*!40000 ALTER TABLE `tb_kesehatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_keuangan`
--

DROP TABLE IF EXISTS `tb_keuangan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_keuangan` (
  `id_keuangan` int NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `tipe` varchar(20) DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `nominal` bigint DEFAULT NULL,
  PRIMARY KEY (`id_keuangan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_keuangan`
--

LOCK TABLES `tb_keuangan` WRITE;
/*!40000 ALTER TABLE `tb_keuangan` DISABLE KEYS */;
INSERT INTO `tb_keuangan` VALUES (1,'2026-10-01','Pengeluaran','Pembelian Ternak','Pembelian 3 ekor bibit kambing',7500000),(2,'2026-11-15','Pemasukan','Penjualan Ternak','Penjualan batch sebelumnya',3850000),(3,'2026-11-19','Pemasukan','Penjualan Ternak','penjualan 2 ekor ternak',6),(4,'2026-11-19','Pengeluaran','Obat & Vaksin','pembelian obat & vaksin ternak',20000),(5,'2026-11-19','Pengeluaran','Pakan','Pakan: Saanen Cross',150000);
/*!40000 ALTER TABLE `tb_keuangan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_notifikasi`
--

DROP TABLE IF EXISTS `tb_notifikasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_notifikasi` (
  `id_notif` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) DEFAULT NULL,
  `pesan` text,
  `kategori` varchar(30) DEFAULT NULL,
  `status_baca` varchar(20) DEFAULT 'Belum',
  `waktu` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_notif`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_notifikasi`
--

LOCK TABLES `tb_notifikasi` WRITE;
/*!40000 ALTER TABLE `tb_notifikasi` DISABLE KEYS */;
INSERT INTO `tb_notifikasi` VALUES (1,'Sistem IoT Siap','NodeMCU ESP32 virtual terhubung.','Lingkungan','Sudah','2026-11-19 08:45:16'),(2,'Alarm Mikroklimat Kandang','Suhu: 36.5°C, Kelembapan: 86.9%, Amonia: 29.1 ppm melewati batas aman!','Lingkungan','Sudah','2026-11-19 09:28:43'),(3,'Alarm Mikroklimat Kandang','Suhu: 33.8°C, Kelembapan: 83.4%, Amonia: 30.1 ppm melewati batas aman!','Lingkungan','Sudah','2026-11-19 09:28:46'),(4,'Alarm Mikroklimat Kandang','Suhu: 34.4°C, Kelembapan: 85%, Amonia: 34.3 ppm melewati batas aman!','Lingkungan','Sudah','2026-11-19 09:28:49'),(5,'Alarm Mikroklimat Kandang','Suhu: 36.7°C, Kelembapan: 84%, Amonia: 34.4 ppm melewati batas aman!','Lingkungan','Sudah','2026-11-19 09:28:52'),(6,'Alarm Mikroklimat Kandang','Suhu: 34.5°C, Kelembapan: 87.9%, Amonia: 30.2 ppm melewati batas aman!','Lingkungan','Sudah','2026-11-19 09:28:55'),(7,'Alarm Mikroklimat Kandang','Suhu: 34.2°C, Kelembapan: 86%, Amonia: 29 ppm melewati batas aman!','Lingkungan','Sudah','2026-11-19 09:28:58'),(8,'Alarm Mikroklimat Kandang','Suhu: 34.6°C, Kelembapan: 86.1%, Amonia: 29.4 ppm melewati batas aman!','Lingkungan','Sudah','2026-11-19 09:29:01'),(9,'Alarm Mikroklimat Kandang','Suhu: 35°C, Kelembapan: 82.2%, Amonia: 28 ppm melewati batas aman!','Lingkungan','Sudah','2026-11-19 09:29:04'),(10,'Alarm Mikroklimat Kandang','Suhu: 36.5°C, Kelembapan: 87%, Amonia: 33.9 ppm melewati batas aman!','Lingkungan','Sudah','2026-11-19 09:29:07'),(11,'Alarm Mikroklimat Kandang','Suhu: 34.4°C, Kelembapan: 86.9%, Amonia: 27 ppm melewati batas aman!','Lingkungan','Sudah','2026-11-19 09:29:10'),(12,'Alarm Mikroklimat Kandang','Suhu: 36.9°C, Kelembapan: 84%, Amonia: 35.2 ppm melewati batas aman!','Lingkungan','Sudah','2026-11-19 09:29:13'),(13,'Alarm Mikroklimat Kandang','Suhu: 33.7°C, Kelembapan: 84.9%, Amonia: 35.1 ppm melewati batas aman!','Lingkungan','Sudah','2026-11-19 09:29:16'),(14,'Alarm Mikroklimat Kandang','Suhu: 33.8°C, Kelembapan: 81.2%, Amonia: 32.2 ppm melewati batas aman!','Lingkungan','Sudah','2026-11-19 09:29:19'),(15,'Alarm Mikroklimat Kandang','Suhu: 35.2°C, Kelembapan: 83.7%, Amonia: 27.4 ppm melewati batas aman!','Lingkungan','Sudah','2026-11-19 09:29:22');
/*!40000 ALTER TABLE `tb_notifikasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pakan`
--

DROP TABLE IF EXISTS `tb_pakan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_pakan` (
  `id_pakan` int NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `jenis_pakan` varchar(100) DEFAULT NULL,
  `jumlah_kg` decimal(6,2) DEFAULT NULL,
  `sisa_kg` decimal(6,2) DEFAULT '0.00',
  `biaya` int DEFAULT NULL,
  `jadwal` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_pakan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pakan`
--

LOCK TABLES `tb_pakan` WRITE;
/*!40000 ALTER TABLE `tb_pakan` DISABLE KEYS */;
INSERT INTO `tb_pakan` VALUES (1,'2026-11-19','Saanen Cross',15.00,4.50,150000,'Pagi & Sore');
/*!40000 ALTER TABLE `tb_pakan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pengaturan`
--

DROP TABLE IF EXISTS `tb_pengaturan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_pengaturan` (
  `id` int NOT NULL,
  `nama_peternakan` varchar(100) DEFAULT NULL,
  `pemilik` varchar(100) DEFAULT NULL,
  `max_suhu` decimal(4,1) DEFAULT NULL,
  `min_suhu` decimal(4,1) DEFAULT NULL,
  `max_kelembapan` decimal(4,1) DEFAULT NULL,
  `max_amonia` decimal(4,1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pengaturan`
--

LOCK TABLES `tb_pengaturan` WRITE;
/*!40000 ALTER TABLE `tb_pengaturan` DISABLE KEYS */;
INSERT INTO `tb_pengaturan` VALUES (1,'GoatGrow Smart Farm','Lead AgriTech Engineer',32.0,22.0,80.0,25.0);
/*!40000 ALTER TABLE `tb_pengaturan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_sensor`
--

DROP TABLE IF EXISTS `tb_sensor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_sensor` (
  `id_sensor` int NOT NULL AUTO_INCREMENT,
  `suhu` decimal(4,1) DEFAULT NULL,
  `kelembapan` decimal(4,1) DEFAULT NULL,
  `amonia` decimal(4,1) DEFAULT NULL,
  `status_kandang` varchar(20) DEFAULT 'Normal',
  `waktu_rekam` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_sensor`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_sensor`
--

LOCK TABLES `tb_sensor` WRITE;
/*!40000 ALTER TABLE `tb_sensor` DISABLE KEYS */;
INSERT INTO `tb_sensor` VALUES (1,28.4,66.5,11.2,'Normal','2026-11-19 08:45:16'),(2,29.1,68.0,12.8,'Normal','2026-11-19 08:45:16'),(3,26.7,69.8,8.6,'Normal','2026-11-19 09:22:47'),(4,27.3,68.2,11.1,'Normal','2026-11-19 09:22:50'),(5,28.9,61.8,13.6,'Normal','2026-11-19 09:22:53'),(6,29.6,66.6,13.7,'Normal','2026-11-19 09:22:56'),(7,28.1,68.8,12.4,'Normal','2026-11-19 09:22:59'),(8,29.4,65.3,9.4,'Normal','2026-11-19 09:23:02'),(9,26.2,63.1,16.1,'Normal','2026-11-19 09:23:05'),(10,27.0,68.8,11.9,'Normal','2026-11-19 09:23:08'),(11,28.7,66.1,10.8,'Normal','2026-11-19 09:23:11'),(12,27.0,66.3,11.4,'Normal','2026-11-19 09:23:14'),(13,27.6,72.8,10.2,'Normal','2026-11-19 09:23:17'),(14,28.3,63.8,14.4,'Normal','2026-11-19 09:23:20'),(15,29.9,67.8,10.9,'Normal','2026-11-19 09:23:23'),(16,27.2,73.4,16.2,'Normal','2026-11-19 09:23:26'),(17,36.5,86.9,29.1,'Bahaya','2026-11-19 09:28:43'),(18,33.8,83.4,30.1,'Bahaya','2026-11-19 09:28:46'),(19,34.4,85.0,34.3,'Bahaya','2026-11-19 09:28:49'),(20,36.7,84.0,34.4,'Bahaya','2026-11-19 09:28:52'),(21,34.5,87.9,30.2,'Bahaya','2026-11-19 09:28:55'),(22,34.2,86.0,29.0,'Bahaya','2026-11-19 09:28:58'),(23,34.6,86.1,29.4,'Bahaya','2026-11-19 09:29:01'),(24,35.0,82.2,28.0,'Bahaya','2026-11-19 09:29:04'),(25,36.5,87.0,33.9,'Bahaya','2026-11-19 09:29:07'),(26,34.4,86.9,27.0,'Bahaya','2026-11-19 09:29:10'),(27,36.9,84.0,35.2,'Bahaya','2026-11-19 09:29:13'),(28,33.7,84.9,35.1,'Bahaya','2026-11-19 09:29:16'),(29,33.8,81.2,32.2,'Bahaya','2026-11-19 09:29:19'),(30,35.2,83.7,27.4,'Bahaya','2026-11-19 09:29:22'),(31,27.2,73.4,9.1,'Normal','2026-11-19 09:29:25'),(32,28.5,71.8,11.7,'Normal','2026-11-19 09:29:28'),(33,26.0,65.6,12.7,'Normal','2026-11-19 09:29:31'),(34,27.6,65.7,11.8,'Normal','2026-11-19 09:29:34'),(35,26.6,61.8,12.6,'Normal','2026-11-19 09:29:37'),(36,28.1,60.9,14.7,'Normal','2026-11-19 09:29:40'),(37,28.0,70.3,12.8,'Normal','2026-11-19 09:29:43'),(38,29.7,63.7,10.7,'Normal','2026-11-19 09:29:46');
/*!40000 ALTER TABLE `tb_sensor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_ternak`
--

DROP TABLE IF EXISTS `tb_ternak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_ternak` (
  `id_ternak` int NOT NULL AUTO_INCREMENT,
  `kode_ternak` varchar(20) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `umur_bulan` int DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `bobot_awal` decimal(5,2) DEFAULT NULL,
  `bobot_terakhir` decimal(5,2) DEFAULT NULL,
  `foto` varchar(255) DEFAULT '',
  `status` varchar(20) DEFAULT 'Aktif',
  PRIMARY KEY (`id_ternak`),
  UNIQUE KEY `kode_ternak` (`kode_ternak`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_ternak`
--

LOCK TABLES `tb_ternak` WRITE;
/*!40000 ALTER TABLE `tb_ternak` DISABLE KEYS */;
INSERT INTO `tb_ternak` VALUES (1,'GT-2026-01','Boer Fullblood',8,'Jantan','2026-10-01',24.50,35.00,'','Aktif'),(2,'GT-2026-02','Etawa Senduro',10,'Jantan','2026-10-05',26.00,32.40,'','Aktif'),(3,'GT-2026-03','Saanen Cross',7,'Betina','2026-10-12',21.00,25.80,'','Aktif');
/*!40000 ALTER TABLE `tb_ternak` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-11-19 17:12:10
