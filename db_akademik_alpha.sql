-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 13, 2023 at 08:45 AM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_akademik_alpha`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_absen`
--

DROP TABLE IF EXISTS `tb_absen`;
CREATE TABLE IF NOT EXISTS `tb_absen` (
  `id_absen` int NOT NULL AUTO_INCREMENT,
  `status_absen` int NOT NULL DEFAULT '0',
  `tanggal_absen` date NOT NULL,
  `waktu_absen` time NOT NULL,
  `id_siswa` int NOT NULL,
  `id_jadwal_mapel` int NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_absen`),
  KEY `id_siswa` (`id_siswa`),
  KEY `id_data_mapel_guru` (`id_jadwal_mapel`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_absen`
--

INSERT INTO `tb_absen` (`id_absen`, `status_absen`, `tanggal_absen`, `waktu_absen`, `id_siswa`, `id_jadwal_mapel`, `keterangan`) VALUES
(31, 1, '2023-01-15', '14:13:26', 1, 13, NULL),
(32, 1, '2023-01-15', '14:13:29', 1, 14, NULL),
(33, 1, '2023-01-15', '14:13:48', 2, 13, NULL),
(34, 1, '2023-01-15', '14:13:50', 2, 14, NULL),
(35, 1, '2023-01-15', '14:13:52', 2, 15, NULL),
(36, 1, '2023-01-15', '14:14:11', 3, 13, NULL),
(37, 1, '2023-01-15', '14:14:15', 3, 14, NULL),
(38, 1, '2023-01-15', '14:14:16', 3, 15, NULL),
(39, 1, '2023-01-15', '14:14:36', 5, 16, NULL),
(40, 1, '2023-01-15', '14:15:10', 6, 16, NULL),
(41, 1, '2023-01-15', '14:15:14', 6, 17, NULL),
(42, 1, '2023-01-15', '14:15:16', 6, 18, NULL),
(43, 1, '2023-01-22', '15:37:58', 1, 21, NULL),
(44, 0, '2023-01-15', '14:08:31', 1, 15, 'alpha'),
(48, 0, '2023-01-19', '14:53:16', 2, 19, 'sakit'),
(49, 0, '2023-01-22', '14:53:44', 2, 20, 'jaringan buruk'),
(50, 0, '2023-01-22', '14:53:55', 2, 21, 'lupa presensi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

DROP TABLE IF EXISTS `tb_guru`;
CREATE TABLE IF NOT EXISTS `tb_guru` (
  `id_guru` int NOT NULL AUTO_INCREMENT,
  `nip_guru` varchar(16) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `password_guru` varchar(256) NOT NULL,
  `email_guru` varchar(50) NOT NULL,
  `jenis_kelamin_guru` enum('LAKI-LAKI','PEREMPUAN') NOT NULL,
  `tempat_lahir_guru` varchar(20) NOT NULL,
  `tanggal_lahir_guru` date NOT NULL,
  `alamat_guru` varchar(100) NOT NULL,
  `id_hak_akses` int NOT NULL,
  PRIMARY KEY (`id_guru`),
  UNIQUE KEY `nip_guru` (`nip_guru`),
  KEY `id_hak_akses` (`id_hak_akses`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `nip_guru`, `nama_guru`, `password_guru`, `email_guru`, `jenis_kelamin_guru`, `tempat_lahir_guru`, `tanggal_lahir_guru`, `alamat_guru`, `id_hak_akses`) VALUES
(1, '0000000000000000', 'admin', '202cb962ac59075b964b07152d234b70', 'admin@gmail.com', 'LAKI-LAKI', 'jember', '2023-01-05', 'jember', 1),
(2, '1111111111111111', 'Guru1', '202cb962ac59075b964b07152d234b70', 'guru1@gmail.com', 'LAKI-LAKI', 'jember', '1998-05-19', 'jl mastrip timur', 2),
(3, '2222222222222222', 'Guru2', '202cb962ac59075b964b07152d234b70', 'guru2@gmail.com', 'LAKI-LAKI', 'jember2', '1997-01-05', 'jl mastrip barat', 2),
(6, '3333333333333333', 'Guru3', '202cb962ac59075b964b07152d234b70', 'guru3@gmail.com', 'LAKI-LAKI', 'jember', '1995-05-10', 'jember', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_hak_akses`
--

DROP TABLE IF EXISTS `tb_hak_akses`;
CREATE TABLE IF NOT EXISTS `tb_hak_akses` (
  `id_hak_akses` int NOT NULL AUTO_INCREMENT,
  `nama_hak_akses` varchar(10) NOT NULL,
  PRIMARY KEY (`id_hak_akses`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_hak_akses`
--

INSERT INTO `tb_hak_akses` (`id_hak_akses`, `nama_hak_akses`) VALUES
(1, 'admin'),
(2, 'guru'),
(3, 'siswa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal_mapel`
--

DROP TABLE IF EXISTS `tb_jadwal_mapel`;
CREATE TABLE IF NOT EXISTS `tb_jadwal_mapel` (
  `id_jadwal_mapel` int NOT NULL AUTO_INCREMENT,
  `id_guru` int NOT NULL,
  `id_kelas` int NOT NULL,
  `id_jurusan` int NOT NULL,
  `id_mapel` int NOT NULL,
  `id_kategori_nilai` int NOT NULL DEFAULT '1',
  `tanggal_jadwal` date NOT NULL,
  `jam_jadwal_mulai` time NOT NULL,
  `jam_jadwal_akhir` time NOT NULL,
  PRIMARY KEY (`id_jadwal_mapel`),
  KEY `id_guru` (`id_guru`),
  KEY `id_kelas` (`id_kelas`),
  KEY `id_mapel` (`id_mapel`),
  KEY `id_jurusan` (`id_jurusan`),
  KEY `id_kategori_nilai` (`id_kategori_nilai`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jadwal_mapel`
--

INSERT INTO `tb_jadwal_mapel` (`id_jadwal_mapel`, `id_guru`, `id_kelas`, `id_jurusan`, `id_mapel`, `id_kategori_nilai`, `tanggal_jadwal`, `jam_jadwal_mulai`, `jam_jadwal_akhir`) VALUES
(13, 2, 5, 2, 1, 1, '2023-01-15', '14:05:00', '14:25:00'),
(14, 3, 5, 2, 2, 1, '2023-01-15', '14:06:00', '14:25:00'),
(15, 6, 5, 2, 3, 1, '2023-01-15', '14:08:00', '14:25:00'),
(16, 2, 6, 1, 1, 1, '2023-01-15', '14:10:00', '14:25:00'),
(17, 3, 6, 1, 2, 1, '2023-01-15', '14:10:00', '14:25:00'),
(18, 6, 6, 1, 3, 1, '2023-01-15', '14:12:00', '14:25:00'),
(19, 2, 5, 2, 1, 1, '2023-01-19', '12:12:00', '13:13:00'),
(20, 2, 5, 2, 1, 1, '2023-01-22', '15:22:00', '15:28:00'),
(21, 2, 5, 2, 1, 1, '2023-01-22', '15:36:00', '15:40:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan`
--

DROP TABLE IF EXISTS `tb_jurusan`;
CREATE TABLE IF NOT EXISTS `tb_jurusan` (
  `id_jurusan` int NOT NULL AUTO_INCREMENT,
  `nama_jurusan` varchar(20) NOT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'IPA'),
(2, 'IPS');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori_nilai`
--

DROP TABLE IF EXISTS `tb_kategori_nilai`;
CREATE TABLE IF NOT EXISTS `tb_kategori_nilai` (
  `id_kategori_nilai` int NOT NULL AUTO_INCREMENT,
  `nama_kategori_nilai` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kategori_nilai`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori_nilai`
--

INSERT INTO `tb_kategori_nilai` (`id_kategori_nilai`, `nama_kategori_nilai`) VALUES
(1, 'Harian'),
(2, 'UTS'),
(3, 'UAS');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

DROP TABLE IF EXISTS `tb_kelas`;
CREATE TABLE IF NOT EXISTS `tb_kelas` (
  `id_kelas` int NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(10) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`) VALUES
(5, 'X PA'),
(6, 'X PI');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mapel`
--

DROP TABLE IF EXISTS `tb_mapel`;
CREATE TABLE IF NOT EXISTS `tb_mapel` (
  `id_mapel` int NOT NULL AUTO_INCREMENT,
  `nama_mapel` varchar(20) NOT NULL,
  PRIMARY KEY (`id_mapel`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mapel`
--

INSERT INTO `tb_mapel` (`id_mapel`, `nama_mapel`) VALUES
(1, 'Bahasa Indonesia'),
(2, 'Bahasa Inggris'),
(3, 'Bahasa Arab');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaian_siswa`
--

DROP TABLE IF EXISTS `tb_penilaian_siswa`;
CREATE TABLE IF NOT EXISTS `tb_penilaian_siswa` (
  `id_penilaian_siswa` int NOT NULL AUTO_INCREMENT,
  `id_siswa` int NOT NULL,
  `id_mapel` int NOT NULL,
  `nilai` int NOT NULL,
  `id_kategori_nilai` int NOT NULL DEFAULT '1',
  `tanggal_penilaian` date NOT NULL,
  PRIMARY KEY (`id_penilaian_siswa`),
  KEY `id_siswa` (`id_siswa`),
  KEY `id_mapel` (`id_mapel`),
  KEY `id_kategori_nilai` (`nilai`),
  KEY `id_kategori_nilai_2` (`id_kategori_nilai`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penilaian_siswa`
--

INSERT INTO `tb_penilaian_siswa` (`id_penilaian_siswa`, `id_siswa`, `id_mapel`, `nilai`, `id_kategori_nilai`, `tanggal_penilaian`) VALUES
(9, 1, 1, 100, 1, '2023-01-13'),
(10, 1, 2, 100, 1, '2023-01-13'),
(11, 1, 3, 100, 1, '2023-01-13'),
(12, 2, 1, 100, 1, '2023-01-13'),
(13, 2, 2, 80, 1, '2023-01-13'),
(22, 2, 3, 70, 1, '2023-01-19');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

DROP TABLE IF EXISTS `tb_siswa`;
CREATE TABLE IF NOT EXISTS `tb_siswa` (
  `id_siswa` int NOT NULL AUTO_INCREMENT,
  `nis_siswa` varchar(10) NOT NULL,
  `password_siswa` varchar(256) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `email_siswa` varchar(50) NOT NULL,
  `jenis_kelamin_siswa` enum('LAKI-LAKI','PEREMPUAN') NOT NULL,
  `tempat_lahir_siswa` varchar(20) NOT NULL,
  `tanggal_lahir_siswa` date NOT NULL,
  `alamat_siswa` varchar(100) NOT NULL,
  `id_kelas` int NOT NULL,
  `id_jurusan` int NOT NULL,
  `id_hak_akses` int NOT NULL,
  PRIMARY KEY (`id_siswa`),
  UNIQUE KEY `nis_siswa` (`nis_siswa`),
  KEY `id_kelas` (`id_kelas`),
  KEY `id_hak_akses` (`id_hak_akses`),
  KEY `id_jurusan` (`id_jurusan`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nis_siswa`, `password_siswa`, `nama_siswa`, `email_siswa`, `jenis_kelamin_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `alamat_siswa`, `id_kelas`, `id_jurusan`, `id_hak_akses`) VALUES
(1, '1111111111', '202cb962ac59075b964b07152d234b70', 'siswa1', 'siswa1@gmail.com', 'LAKI-LAKI', 'jember', '2022-07-12', 'jember timur', 5, 2, 3),
(2, '2222222222', '202cb962ac59075b964b07152d234b70', 'siswa2', 'siswa2@gmail.com', 'LAKI-LAKI', 'jember', '2023-01-09', 'jember', 5, 2, 3),
(3, '3333333333', '202cb962ac59075b964b07152d234b70', 'siswa3', 'siswa3@gmail.com', 'LAKI-LAKI', 'jember', '2022-10-04', 'jember timur', 5, 2, 3),
(5, '4444444444', '202cb962ac59075b964b07152d234b70', 'siswa4', 'siswa4@gmail.com', 'PEREMPUAN', 'jember', '2017-04-14', 'mumbulsari', 6, 1, 3),
(6, '5555555555', '202cb962ac59075b964b07152d234b70', 'siswa5', 'siswa5@gmail.com', 'PEREMPUAN', 'jember', '2010-05-12', 'patrang', 6, 1, 3),
(7, '6666666666', '202cb962ac59075b964b07152d234b70', 'siswa6', 'siswa6@gmail.com', 'PEREMPUAN', 'jember', '2008-05-14', 'jember timur', 6, 1, 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
