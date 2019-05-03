-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2019 at 01:12 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yayasan_soposurung`
--

-- --------------------------------------------------------

--
-- Table structure for table `angkatan`
--

CREATE TABLE `angkatan` (
  `id` int(11) NOT NULL,
  `angkatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `angkatan`
--

INSERT INTO `angkatan` (`id`, `angkatan`) VALUES
(1, 'XVII'),
(2, 'XVIII');

-- --------------------------------------------------------

--
-- Table structure for table `assign_guru`
--

CREATE TABLE `assign_guru` (
  `id` int(11) NOT NULL,
  `kelas_mata_pelajaran_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_guru`
--

INSERT INTO `assign_guru` (`id`, `kelas_mata_pelajaran_id`, `guru_id`) VALUES
(1, 1, 4),
(2, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `aturan_asrama`
--

CREATE TABLE `aturan_asrama` (
  `id` int(11) NOT NULL,
  `jenis_pelanggaran` varchar(500) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aturan_asrama`
--

INSERT INTO `aturan_asrama` (`id`, `jenis_pelanggaran`, `point`) VALUES
(1, 'Merokok', 30),
(2, 'Mabuk', 20),
(3, 'Merusak vasilitas kelas', 50),
(4, 'Makan dalam ruangan', 30);

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', 21, NULL),
('dokter', 401, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'User sebagai admin', NULL, NULL, NULL, NULL),
('dokter', 1, 'UNtuk dokter', NULL, NULL, NULL, NULL),
('gardener', 1, 'Akun untuk pegawai yang mengurusi taman', NULL, NULL, NULL, NULL),
('guru', 1, 'User sebagai guru', NULL, NULL, NULL, NULL),
('pengawas', 1, 'Akun untuk pengawas', NULL, NULL, NULL, NULL),
('satpam', 1, 'Akun untuk security', NULL, NULL, NULL, NULL),
('siswa', 1, 'Jenis akun untuk siswa/i', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `no_induk_guru` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `no_induk_guru`, `username`, `nama`, `user_id`) VALUES
(1, '11S15062', 'adrian', 'Adrian Sirait', 395),
(2, '11S15001', 'santi', 'Santi Siagian', 396),
(3, '11S15032', 'sapto', 'Sapto Gokma', 397),
(4, '11S15009', 'devi', 'Devi Pakpahan', 398),
(5, '11S15048', 'hendro', 'Hendro Prabowo', 399),
(6, '11S15099', 'ruben', 'Ruben Ambarita', 400);

-- --------------------------------------------------------

--
-- Table structure for table `kedisiplinan`
--

CREATE TABLE `kedisiplinan` (
  `id` int(11) NOT NULL,
  `siswa_id` varchar(255) NOT NULL,
  `aturan_asrama_id` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `tambah_ke_point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kelas_mata_pelajaran`
--

CREATE TABLE `kelas_mata_pelajaran` (
  `id` int(11) NOT NULL,
  `tahun_ajaran_kelas_id` int(11) NOT NULL,
  `mata_pelajaran_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_mata_pelajaran`
--

INSERT INTO `kelas_mata_pelajaran` (`id`, `tahun_ajaran_kelas_id`, `mata_pelajaran_id`) VALUES
(1, 1, 3),
(2, 1, 4),
(3, 1, 5),
(4, 1, 6),
(5, 1, 7),
(6, 1, 8),
(7, 1, 9),
(8, 1, 10),
(9, 1, 11),
(10, 5, 3),
(11, 5, 4),
(12, 5, 5),
(13, 5, 6),
(14, 5, 7),
(15, 5, 8),
(16, 5, 9),
(17, 5, 10),
(18, 5, 11),
(19, 3, 3),
(20, 3, 7),
(21, 3, 8),
(22, 7, 3),
(23, 7, 7),
(24, 7, 8),
(25, 4, 9),
(26, 4, 10),
(27, 4, 11),
(28, 8, 9),
(29, 8, 10),
(30, 8, 11);

-- --------------------------------------------------------

--
-- Table structure for table `kelas_r`
--

CREATE TABLE `kelas_r` (
  `id` int(11) NOT NULL,
  `kelas` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_r`
--

INSERT INTO `kelas_r` (`id`, `kelas`) VALUES
(1, 'X(1)'),
(2, 'X(2)'),
(3, 'X(3)'),
(4, 'XI IPA 1'),
(5, 'XI IPA 2'),
(6, 'XI IPS'),
(7, 'XII PC');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `id` int(11) NOT NULL,
  `nisn` varchar(255) NOT NULL,
  `thn_ajaran_kelas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`id`, `nisn`, `thn_ajaran_kelas_id`) VALUES
(4, '12345678', 1),
(5, '87654321', 1),
(6, '12345678', 2),
(7, '87654321', 2),
(8, '12345678', 3),
(9, '87654321', 3),
(10, '12345678', 4),
(11, '87654321', 4);

-- --------------------------------------------------------

--
-- Table structure for table `keluar_masuk_barang`
--

CREATE TABLE `keluar_masuk_barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(500) NOT NULL,
  `tanggal` date NOT NULL,
  `vendor` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kesehatan`
--

CREATE TABLE `kesehatan` (
  `id` int(11) NOT NULL,
  `siswa_id` varchar(255) NOT NULL,
  `kesehatan` varchar(500) NOT NULL,
  `semester` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `created_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran_r`
--

CREATE TABLE `mata_pelajaran_r` (
  `id` int(11) NOT NULL,
  `pelajaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_pelajaran_r`
--

INSERT INTO `mata_pelajaran_r` (`id`, `pelajaran`) VALUES
(1, 'IPA'),
(2, 'IPS'),
(3, 'Biologi'),
(4, 'PPKN'),
(5, 'Komputer'),
(6, 'Sejarah'),
(7, 'Kimia'),
(8, 'Fisika'),
(9, 'Ekonomi'),
(10, 'Geografi'),
(11, 'Sosiologi');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1548606524),
('m130524_201442_init', 1548606527);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `kelas_mata_pelajaran_id` int(11) NOT NULL,
  `nisn` varchar(255) NOT NULL,
  `komponen_nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` varchar(255) NOT NULL,
  `nama` varchar(500) DEFAULT NULL,
  `kelahiran` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `status_dalam_keluarga` varchar(255) DEFAULT NULL,
  `anak_ke` int(11) DEFAULT NULL,
  `sekolah_asal` varchar(300) DEFAULT NULL,
  `nama_ayah` varchar(500) DEFAULT NULL,
  `nama_ibu` varchar(500) DEFAULT NULL,
  `alamat_orang_tua` text,
  `nomor_telepon_orang_tua` int(100) DEFAULT NULL,
  `pekerjaan_ayah` varchar(255) DEFAULT NULL,
  `pekerjaan_ibu` varchar(255) DEFAULT NULL,
  `angkatan_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `kredit_point` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nama`, `kelahiran`, `jenis_kelamin`, `agama`, `status_dalam_keluarga`, `anak_ke`, `sekolah_asal`, `nama_ayah`, `nama_ibu`, `alamat_orang_tua`, `nomor_telepon_orang_tua`, `pekerjaan_ayah`, `pekerjaan_ibu`, `angkatan_id`, `user_id`, `kelas_id`, `kredit_point`) VALUES
('12345678', 'Kristina Ruth Damayanti Tampubolon', '', '', '', '', NULL, '', '', '', '', NULL, '', '', 1, 402, NULL, 0),
('87654321', 'Naomi Sylvia Veronika Tampubolon', '', '', '', '', NULL, '', '', '', '', NULL, '', '', 1, 403, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran_kelas`
--

CREATE TABLE `tahun_ajaran_kelas` (
  `id` int(11) NOT NULL,
  `tahun_ajaran_semester_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_ajaran_kelas`
--

INSERT INTO `tahun_ajaran_kelas` (`id`, `tahun_ajaran_semester_id`, `kelas_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 4),
(4, 1, 6),
(5, 2, 1),
(6, 2, 2),
(7, 2, 4),
(8, 2, 6),
(9, 1, 3),
(10, 1, 5),
(11, 1, 7),
(12, 2, 3),
(13, 2, 5),
(14, 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran_semester`
--

CREATE TABLE `tahun_ajaran_semester` (
  `id` int(11) NOT NULL,
  `tahun_ajaran` varchar(255) NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_ajaran_semester`
--

INSERT INTO `tahun_ajaran_semester` (`id`, `tahun_ajaran`, `semester`, `is_active`) VALUES
(1, '2019/2020', 'Ganjil', 1),
(2, '2019/2020', 'Genap', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `is_active` int(11) NOT NULL DEFAULT '1',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `role`, `status`, `is_active`, `created_at`, `updated_at`) VALUES
(21, 'admin', '1WvATcvQctacoRtTI7PiC4Of_9X0oXk0', '$2y$13$1LMVZn/HwBbUlWBYfBygi.9lb0Rg0/gmEPe4RAjUv5YCBEwmniZLu', NULL, 'admin@gmail.com', 'admin', 10, 1, 1548747182, 1548747182),
(273, 'tohap', 'hLtkdDU-LDuCNV0Q0stHvwPQJtc9pALc', '$2y$13$nrvBfa1V/ZcK1LWG0gfjbOKmVZ98AeF6Go6BZzv/Q1yMYlDQdswaG', NULL, NULL, 'guru', 10, 0, 0, 0),
(393, 'devis', 'x_e3Bq1H9pD8FRaw6nOrVk29OocqSwry', '$2y$13$QcBSINNj6K2Q4JsXjyihVusS.oN3QSNCVkCk9FgcOg0qQ1JT0D8Ua', NULL, NULL, 'guru', 10, 0, 0, 0),
(395, 'adrian', 'VuU8gTyoB5chlbFLcSdAiENnuuqKMlie', '$2y$13$FN53nak504jZHDQqkjCiJO24TxkOtstwvraPx.xz.zjCELP4S12eO', NULL, NULL, 'guru', 10, 0, 0, 0),
(396, 'santi', 'cHWs1eCfvuUAWNWQRNHkn8VYQ8T3u7zC', '$2y$13$9U01OTQkb.zXzGLh4s8Uru9qrPFvi9bDLaH1b8GY8YY3fq5jhdzG.', NULL, NULL, 'guru', 10, 0, 0, 0),
(397, 'sapto', 'RKFr7k6_COF8jwWXjLlR8lsEDPG7sa-F', '$2y$13$nMsmRz.saw91vVMXzlpV0uU6Mp3ODB61Tlunrs9jXENUIQVFpP6Zu', NULL, NULL, 'guru', 10, 0, 0, 0),
(398, 'devi', 'TuoYsuGPNp6h3IxAwM-Px8jj-I-84o2w', '$2y$13$J8HuGRZq3fnBfGFL1.qAy.pobm1Zeb1l7OwE/arUry/epxTJhxIFe', NULL, NULL, 'guru', 10, 1, 0, 0),
(399, 'hendro', 'uk8jkbl7kcefEXUgJv3FVyvWFTyhNRft', '$2y$13$t5rDL.0PQ8YUtNVfbnUFROzwD/QOWHSDK7C6WFVfiAvxsOYCIfAgu', NULL, NULL, 'guru', 10, 1, 0, 0),
(400, 'ruben', 'tCZ5z62t-ThBUY0JRPi-1AzHazRw0zTD', '$2y$13$/S8rqYVx5vK5tlZ1llBc.uwnmrIF.Q5zdEtdmOqtPI10v8QPaA6ai', NULL, NULL, 'guru', 10, 1, 0, 0),
(401, 'dokter', 'oM34G4uDYNs_oQbcBdtQc8xNzSn1p_zL', '$2y$13$mCP2KuxOCKxyZ4l0tmndWOVdmcgXNtJ2i7XYj6eHdgQNYn0n1dAdm', NULL, NULL, 'dokter', 10, 1, 0, 0),
(402, '12345678', 'sUha3vy2Qs6xkJhgmcYp41BePbfl48l4', '$2y$13$tAOIru1X36a2fhn8VtkDk.i/CsuebQ8DV0EePnWL5hJ4qPRWJQC92', NULL, NULL, 'siswa', 10, 1, 0, 0),
(403, '87654321', 'VTXEGc6aXAUrIms5D8zpszlbcGkrg1jC', '$2y$13$WGHhFYeDWg39rjMMrbe4XuRK3/9KHA1N.xxPVf6U..KL4vltbVsNG', NULL, NULL, 'siswa', 10, 1, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angkatan`
--
ALTER TABLE `angkatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_guru`
--
ALTER TABLE `assign_guru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_mata_pelajaran_id` (`kelas_mata_pelajaran_id`),
  ADD KEY `guru_id` (`guru_id`);

--
-- Indexes for table `aturan_asrama`
--
ALTER TABLE `aturan_asrama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `auth_assignement` (`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_guru` (`user_id`);

--
-- Indexes for table `kedisiplinan`
--
ALTER TABLE `kedisiplinan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswa_id` (`siswa_id`),
  ADD KEY `aturan_asrama_id` (`aturan_asrama_id`);

--
-- Indexes for table `kelas_mata_pelajaran`
--
ALTER TABLE `kelas_mata_pelajaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tahun_ajaran_kelas` (`tahun_ajaran_kelas_id`),
  ADD KEY `mata_pelajaran_id` (`mata_pelajaran_id`);

--
-- Indexes for table `kelas_r`
--
ALTER TABLE `kelas_r`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `thn_ajaran_kelas_id` (`thn_ajaran_kelas_id`);

--
-- Indexes for table `keluar_masuk_barang`
--
ALTER TABLE `keluar_masuk_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `kesehatan`
--
ALTER TABLE `kesehatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswa_id` (`siswa_id`);

--
-- Indexes for table `mata_pelajaran_r`
--
ALTER TABLE `mata_pelajaran_r`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_mata_pelajaran` (`kelas_mata_pelajaran_id`),
  ADD KEY `nisn` (`nisn`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `user` (`user_id`),
  ADD KEY `kelas` (`kelas_id`);

--
-- Indexes for table `tahun_ajaran_kelas`
--
ALTER TABLE `tahun_ajaran_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tahun_ajaran_semester` (`tahun_ajaran_semester_id`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indexes for table `tahun_ajaran_semester`
--
ALTER TABLE `tahun_ajaran_semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `angkatan`
--
ALTER TABLE `angkatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `assign_guru`
--
ALTER TABLE `assign_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `aturan_asrama`
--
ALTER TABLE `aturan_asrama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kedisiplinan`
--
ALTER TABLE `kedisiplinan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas_mata_pelajaran`
--
ALTER TABLE `kelas_mata_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `kelas_r`
--
ALTER TABLE `kelas_r`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `keluar_masuk_barang`
--
ALTER TABLE `keluar_masuk_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kesehatan`
--
ALTER TABLE `kesehatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mata_pelajaran_r`
--
ALTER TABLE `mata_pelajaran_r`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tahun_ajaran_kelas`
--
ALTER TABLE `tahun_ajaran_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tahun_ajaran_semester`
--
ALTER TABLE `tahun_ajaran_semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=404;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign_guru`
--
ALTER TABLE `assign_guru`
  ADD CONSTRAINT `assign_guru_ibfk_1` FOREIGN KEY (`kelas_mata_pelajaran_id`) REFERENCES `kelas_mata_pelajaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assign_guru_ibfk_2` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignement` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `user_guru` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kedisiplinan`
--
ALTER TABLE `kedisiplinan`
  ADD CONSTRAINT `kedisiplinan_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kedisiplinan_ibfk_2` FOREIGN KEY (`aturan_asrama_id`) REFERENCES `aturan_asrama` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelas_mata_pelajaran`
--
ALTER TABLE `kelas_mata_pelajaran`
  ADD CONSTRAINT `mata_pelajaran_id` FOREIGN KEY (`mata_pelajaran_id`) REFERENCES `mata_pelajaran_r` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tahun_ajaran_kelas` FOREIGN KEY (`tahun_ajaran_kelas_id`) REFERENCES `tahun_ajaran_kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD CONSTRAINT `kelas_siswa_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_siswa_ibfk_2` FOREIGN KEY (`thn_ajaran_kelas_id`) REFERENCES `tahun_ajaran_kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keluar_masuk_barang`
--
ALTER TABLE `keluar_masuk_barang`
  ADD CONSTRAINT `keluar_masuk_barang_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kesehatan`
--
ALTER TABLE `kesehatan`
  ADD CONSTRAINT `kesehatan_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `kelas_mata_pelajaran` FOREIGN KEY (`kelas_mata_pelajaran_id`) REFERENCES `kelas_mata_pelajaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nisn` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `kelas` FOREIGN KEY (`kelas_id`) REFERENCES `kelas_r` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tahun_ajaran_kelas`
--
ALTER TABLE `tahun_ajaran_kelas`
  ADD CONSTRAINT `kelas_id` FOREIGN KEY (`kelas_id`) REFERENCES `kelas_r` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tahun_ajaran_semester` FOREIGN KEY (`tahun_ajaran_semester_id`) REFERENCES `tahun_ajaran_semester` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
