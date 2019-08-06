-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2019 at 04:58 PM
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
-- Table structure for table `apl_malam`
--

CREATE TABLE `apl_malam` (
  `id` int(11) NOT NULL,
  `tahun_ajaran_kelas_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hadir` int(11) NOT NULL,
  `tidak_hadir` int(11) NOT NULL,
  `keterangan_tidak_hadir` text,
  `jurnal_laporan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `apl_mkn_malam`
--

CREATE TABLE `apl_mkn_malam` (
  `id` int(11) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hadir` int(11) NOT NULL,
  `tidak_hadir` int(11) NOT NULL,
  `keterangan_tidak_hadir` text,
  `jurnal_laporan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `apl_mkn_siang`
--

CREATE TABLE `apl_mkn_siang` (
  `id` int(11) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hadir` int(11) NOT NULL,
  `tidak_hadir` int(11) NOT NULL,
  `keterangan_tidak_hadir` text,
  `jurnal_laporan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `apl_pgi_kelas`
--

CREATE TABLE `apl_pgi_kelas` (
  `id` int(11) NOT NULL,
  `tahun_ajaran_kelas_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hadir` int(11) NOT NULL,
  `tidak_hadir` int(11) NOT NULL,
  `keterangan_tidak_hadir` text,
  `jurnal_laporan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `apl_sore`
--

CREATE TABLE `apl_sore` (
  `id` int(11) NOT NULL,
  `tahun_ajaran_kelas_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hadir` int(11) NOT NULL,
  `tidak_hadir` int(11) NOT NULL,
  `keterangan_tidak_hadir` text,
  `jurnal_laporan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assign_guru`
--

CREATE TABLE `assign_guru` (
  `id` int(11) NOT NULL,
  `kelas_mata_pelajaran_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(8, 'Merokok', 30),
(9, 'Minum minuman keras', 20),
(10, 'Buang sampah sembarangan', 10);

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
('pengawas', 541, NULL),
('security', 540, NULL),
('siswa', 546, NULL),
('siswa', 547, NULL),
('siswa', 548, NULL),
('siswa', 549, NULL),
('siswa', 550, NULL),
('siswa', 551, NULL),
('wakepas kesiswaan', 542, NULL);

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
('bendahara', 1, '', NULL, NULL, NULL, NULL),
('guru', 1, 'User sebagai guru', NULL, NULL, NULL, NULL),
('kepala asrama', 1, 'Akun untuk kepala asrama', NULL, NULL, NULL, NULL),
('pengawas', 1, 'Akun untuk pengawas', NULL, NULL, NULL, NULL),
('perawat', 1, 'Untuk perawat', NULL, NULL, NULL, NULL),
('security', 1, 'Akun untuk security', NULL, NULL, NULL, NULL),
('siswa', 1, 'Jenis akun untuk siswa/i', NULL, NULL, NULL, NULL),
('supervisor', 1, 'Yang bisa melihat sistem infromasi', NULL, NULL, NULL, NULL),
('wakepas kesiswaan', 1, '', NULL, NULL, NULL, NULL),
('wali angkatan', 1, '', NULL, NULL, NULL, NULL);

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
-- Table structure for table `jurnal_laporan_piket`
--

CREATE TABLE `jurnal_laporan_piket` (
  `id` int(11) NOT NULL,
  `jam` time DEFAULT NULL,
  `tanggal` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `wakil_piket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurnal_laporan_piket`
--

INSERT INTO `jurnal_laporan_piket` (`id`, `jam`, `tanggal`, `user_id`, `wakil_piket`) VALUES
(8, NULL, '2019-08-06', 21, 'testing');

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
(9, 'BrotherHood'),
(10, 'ChildHood'),
(11, 'MediumHood');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `id` int(11) NOT NULL,
  `nisn` varchar(255) NOT NULL,
  `thn_ajaran_kelas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kesehatan`
--

CREATE TABLE `kesehatan` (
  `id` int(11) NOT NULL,
  `siswa_id` varchar(255) NOT NULL,
  `penyakit` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `semester` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `created_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `komponen_nilai`
--

CREATE TABLE `komponen_nilai` (
  `id` int(11) NOT NULL,
  `kelas_mata_pelajaran_id` int(11) NOT NULL,
  `komponen_nilai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log_keluar_barang`
--

CREATE TABLE `log_keluar_barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(500) NOT NULL,
  `tanggal` date NOT NULL,
  `vendor` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_keluar_barang`
--

INSERT INTO `log_keluar_barang` (`id`, `nama_barang`, `tanggal`, `vendor`, `jumlah`, `created_by`, `keterangan`) VALUES
(1, 'Wortel', '2019-05-04', 'Pajak horas', '11', 21, 'BEBAS'),
(2, 'Botol Minuman', '2019-05-04', 'Tupperware', '200 buah', 21, 'Bagus'),
(3, 'Makanan', '2019-05-04', 'Toba', '200 buah', 21, 'Bebas');

-- --------------------------------------------------------

--
-- Table structure for table `log_masuk_barang`
--

CREATE TABLE `log_masuk_barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(500) NOT NULL,
  `tanggal` date NOT NULL,
  `vendor` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_masuk_barang`
--

INSERT INTO `log_masuk_barang` (`id`, `nama_barang`, `tanggal`, `vendor`, `jumlah`, `created_by`, `keterangan`) VALUES
(3, 'Meja Kayu', '2019-06-26', 'Made in China', '90', 21, 'bebas'),
(4, 'Sayur', '2019-07-10', 'Parpajak', '10', 21, 'Bagus smua'),
(5, 'Laptop Lenobo', '2019-07-24', 'Lenobo', '30', 540, 'Bagus smua');

-- --------------------------------------------------------

--
-- Table structure for table `log_tamu`
--

CREATE TABLE `log_tamu` (
  `id` int(11) NOT NULL,
  `nama_tamu` varchar(500) NOT NULL,
  `tujuan_dan_keperluan` text NOT NULL,
  `waktu_masuk` datetime NOT NULL,
  `waktu_keluar` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_tamu`
--

INSERT INTO `log_tamu` (`id`, `nama_tamu`, `tujuan_dan_keperluan`, `waktu_masuk`, `waktu_keluar`, `user_id`) VALUES
(5, 'Hendro', 'masuk aja', '2019-06-17 09:09:50', '2019-07-10 09:30:35', 21),
(6, 'Prabowo', 'belajar', '2019-06-17 09:13:46', '2019-06-17 09:13:59', 21),
(7, 'Hendro', 'Proyek', '2019-07-10 08:59:40', '2019-07-10 08:59:54', 21);

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
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id` int(11) NOT NULL,
  `kelas_siswa_id` int(11) NOT NULL,
  `komponen_nilai_id` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
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
  `siswa_thn_kls` int(11) DEFAULT NULL,
  `kredit_point` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nama`, `kelahiran`, `jenis_kelamin`, `agama`, `status_dalam_keluarga`, `anak_ke`, `sekolah_asal`, `nama_ayah`, `nama_ibu`, `alamat_orang_tua`, `nomor_telepon_orang_tua`, `pekerjaan_ayah`, `pekerjaan_ibu`, `angkatan_id`, `user_id`, `siswa_thn_kls`, `kredit_point`) VALUES
('0030897853', 'AGREROGATES TAMBUNAN', 'Timika, 5 Oktober 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPK SHINING STARS', 'Doliamen Tambunan', 'Perpe Simanjuntak', 'Jl Budiutomo, gg Getsemani rt 17_x000D_\nSempan-Timika', 811493298, 'Pegawai Swasta', 'IRT', 2, 550, NULL, 0),
('0033895291', 'ABRAHAM SOPAR HAMONANGAN SITORUS', 'Medan, 1 Juni 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 4, 'SMPS ST THOMAS 1 MEDAN', 'Maston Sitorus', 'Desry Sianturi', 'Jln Bunga Mawar XV No 92', 2147483647, 'Pegawai Swasta', 'PNS', 1, 547, NULL, 0),
('0034212419', 'ABEDNEGO LUMBAN GAOL', 'Tanjung Beringin, 15 Mei 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 4, 'SMPS ST PAULUS SIDIKALANG', 'Mantok LumbanGaol', 'Nurmaida Pandiangan', 'Tanjung Beringin, Tiga Lingga, Dairi', 2147483647, 'Petani', 'Petani', 1, 546, NULL, 0),
('0040072254', 'AGNES YULIA ELISABETH PERDEDE', 'Medan, 6 September 2004', 'P', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPS ST. THOMAS 1 MEDAN', 'Hiro Pingkir Pardede', 'Merry Naibaho', 'Jalan Sejahtera Gang Bahagia NO. 17', 2147483647, 'Pegawai BUMN', 'IRT', 2, 549, NULL, 0),
('0048830270', 'AGATHA ROSAULINA SITANGGANG', 'Air Molek, 5 Oktober 2003', 'P', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPS BUDHI DHARMA BALIGE ', 'Lekson Sitanggang', 'Tiurma Sitohang', 'JL DI PANJAITAN RT 002/001 SEKAR MAWAR AIR MOLEK, INHU, RIAU', 2147483647, 'Berkebun', 'IRT', 2, 548, NULL, 0),
('11S15001', 'Poltak Sibaarni', 'Sipahutar/31 Desember 2000', 'L', 'Protestan', 'Anak Kanduang', 1, 'SMP Budi Mull', 'Ja', 'Ma', 'Ah', 1, 'Gatau', 'IRT', 1, 551, NULL, 0),
('11S15048', 'Hendro Prabowo', 'Medan', 'L', 'Protestan', 'Anak Kandung', 1, 'Santo Thomas 3 Medan', 'Sahlan Tampubolon', 'Martha Sihombing', 'Jl.Cempaka Gg.Baru No.7 Gaperta Ujung Medan', 2147483647, 'Dosen', 'Ibu Rumah Tangga', 2, 545, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `siswa_thn_kls`
--

CREATE TABLE `siswa_thn_kls` (
  `id` int(11) NOT NULL,
  `nisn` varchar(255) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `tahun_ajaran_kelas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sw_apl_mkn_pgi`
--

CREATE TABLE `sw_apl_mkn_pgi` (
  `id` int(11) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hadir` int(11) NOT NULL,
  `tidak_hadir` int(11) NOT NULL,
  `keterangan_tidak_hadir` text,
  `jurnal_laporan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sw_senam_apl_pgi`
--

CREATE TABLE `sw_senam_apl_pgi` (
  `id` int(11) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hadir` int(11) NOT NULL,
  `tidak_hadir` int(11) NOT NULL,
  `keterangan_tidak_hadir` text,
  `jurnal_laporan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(7, 1, 9),
(10, 2, 9),
(15, 1, 11),
(16, 2, 11),
(17, 1, 10),
(18, 2, 10);

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
(1, '2020/2021', 'Ganjil', 1),
(2, '2020/2021', 'Genap', 0);

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
(395, 'adrian', 'VuU8gTyoB5chlbFLcSdAiENnuuqKMlie', '$2y$13$FN53nak504jZHDQqkjCiJO24TxkOtstwvraPx.xz.zjCELP4S12eO', NULL, NULL, 'guru', 10, 1, 0, 0),
(396, 'santi', 'cHWs1eCfvuUAWNWQRNHkn8VYQ8T3u7zC', '$2y$13$9U01OTQkb.zXzGLh4s8Uru9qrPFvi9bDLaH1b8GY8YY3fq5jhdzG.', NULL, NULL, 'guru', 10, 0, 0, 0),
(397, 'sapto', 'RKFr7k6_COF8jwWXjLlR8lsEDPG7sa-F', '$2y$13$nMsmRz.saw91vVMXzlpV0uU6Mp3ODB61Tlunrs9jXENUIQVFpP6Zu', NULL, NULL, 'guru', 10, 0, 0, 0),
(398, 'devi', 'TuoYsuGPNp6h3IxAwM-Px8jj-I-84o2w', '$2y$13$J8HuGRZq3fnBfGFL1.qAy.pobm1Zeb1l7OwE/arUry/epxTJhxIFe', NULL, NULL, 'guru', 10, 1, 0, 0),
(399, 'hendro', 'uk8jkbl7kcefEXUgJv3FVyvWFTyhNRft', '$2y$13$t5rDL.0PQ8YUtNVfbnUFROzwD/QOWHSDK7C6WFVfiAvxsOYCIfAgu', NULL, NULL, 'guru', 10, 1, 0, 0),
(400, 'ruben', 'tCZ5z62t-ThBUY0JRPi-1AzHazRw0zTD', '$2y$13$/S8rqYVx5vK5tlZ1llBc.uwnmrIF.Q5zdEtdmOqtPI10v8QPaA6ai', NULL, NULL, 'guru', 10, 1, 0, 0),
(540, 'security1', 'iKgCM0QcU-FajgwnwOGPPkhn6m62Q5pE', '$2y$13$h8eDHY5jp1En52SsXqpseuwTnaG.ImRN1y3M2surXd8.cdWLiEXz6', NULL, NULL, 'security', 10, 1, 0, 0),
(541, 'pengawas1', 'eWh9FltfSgOoWtb9drC-AunQxKtcHDZi', '$2y$13$RaMXMPTbtJABBbH8d3i0Yu9fCpQ7kVkg8w0ojzn6FGRQDWw8Y3kRm', NULL, NULL, 'pengawas', 10, 1, 0, 0),
(542, 'wakepas1', 'fIpq63OMsT6vXw8I2L2GIGKuiaM6YvxM', '$2y$13$sTDRudFEo.2yTnPMxWLBhenyfz3hyobrxGqs9E9sKUB3HLPMR4DnC', NULL, NULL, 'wakepas kesiswaan', 10, 1, 0, 0),
(545, '11S15048', 'FdGeX_TA-1B_Oxr0jTTrxzQO3QaLieDt', '$2y$13$yIrlNJtdjSba8vFP6q.kWOnzKTtVPN4/Dwyzptny2SpOm30EqtJKW', NULL, NULL, 'siswa', 10, 1, 0, 0),
(546, '0034212419', '89TPxwrKLziGziUmM9t9qPYm8e6jvSyi', '$2y$13$Mz4a8BP.hw2fUiAVANLhsOqH2Lm.VrRiAkXipXra8HhkgVH0ik.Xm', NULL, NULL, 'siswa', 10, 1, 0, 0),
(547, '0033895291', '214K3UJkbvTm1gv5qK-RLBHopARD7FDw', '$2y$13$mCn2iNpVrF7m9qmqtPmcZOxWnhOas5x7nVHgvUh9Uw3v3Tw22Jlwm', NULL, NULL, 'siswa', 10, 1, 0, 0),
(548, '0048830270', 'Viz-L33xdv2NZvJvttzaHnNpVzQZMLvh', '$2y$13$IZsNWE7tct5KDDhU8tGua.8kuHVCt3..mvJKsOyrIUSHe9brhawXS', NULL, NULL, 'siswa', 10, 1, 0, 0),
(549, '0040072254', 'JwUN_fsGC15_SFR_IrRkjZJRxd8dc_N7', '$2y$13$LfyqJzkVGMBLQyy3erIBJuba6dFl5ZXpN.xqZJDD2n/2UEmRgcqJG', NULL, NULL, 'siswa', 10, 1, 0, 0),
(550, '0030897853', 'TPLGQYwfBCEKQFO-rQb5SDfeoYHWPQit', '$2y$13$E5CM8d2GdjocqpPLFkj0N.cTcDT8KwG/J3RMCDKbNaA/ia/13XExi', NULL, NULL, 'siswa', 10, 1, 0, 0),
(551, '11S15001', '4h_mWV1NsORDeCvk40vEpKiV1PDczC9R', '$2y$13$KFl35U/5wF.xbLt5439.eOU1kHJHIKwNJUbRDCcvMtJBd/aSIk6yu', NULL, NULL, 'siswa', 10, 1, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angkatan`
--
ALTER TABLE `angkatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apl_malam`
--
ALTER TABLE `apl_malam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jurnal_laporan_id` (`jurnal_laporan_id`),
  ADD KEY `tahun_ajaran_kelas_id` (`tahun_ajaran_kelas_id`);

--
-- Indexes for table `apl_mkn_malam`
--
ALTER TABLE `apl_mkn_malam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jurnal_laporan_id` (`jurnal_laporan_id`);

--
-- Indexes for table `apl_mkn_siang`
--
ALTER TABLE `apl_mkn_siang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jurnal_laporan_id` (`jurnal_laporan_id`);

--
-- Indexes for table `apl_pgi_kelas`
--
ALTER TABLE `apl_pgi_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_id` (`tahun_ajaran_kelas_id`),
  ADD KEY `jurnal_laporan_id` (`jurnal_laporan_id`);

--
-- Indexes for table `apl_sore`
--
ALTER TABLE `apl_sore`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jurnal_laporan_id` (`jurnal_laporan_id`),
  ADD KEY `tahun_ajaran_kelas_id` (`tahun_ajaran_kelas_id`);

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
-- Indexes for table `jurnal_laporan_piket`
--
ALTER TABLE `jurnal_laporan_piket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
-- Indexes for table `kesehatan`
--
ALTER TABLE `kesehatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswa_id` (`siswa_id`);

--
-- Indexes for table `komponen_nilai`
--
ALTER TABLE `komponen_nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_mata_pelajaran_id` (`kelas_mata_pelajaran_id`);

--
-- Indexes for table `log_keluar_barang`
--
ALTER TABLE `log_keluar_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `log_masuk_barang`
--
ALTER TABLE `log_masuk_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `log_tamu`
--
ALTER TABLE `log_tamu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_siswa_id` (`kelas_siswa_id`),
  ADD KEY `komponen_nilai_id` (`komponen_nilai_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `user` (`user_id`);

--
-- Indexes for table `siswa_thn_kls`
--
ALTER TABLE `siswa_thn_kls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `tahun_ajaran_kelas_id` (`tahun_ajaran_kelas_id`);

--
-- Indexes for table `sw_apl_mkn_pgi`
--
ALTER TABLE `sw_apl_mkn_pgi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jurnal_laporan_piket_id` (`jurnal_laporan_id`);

--
-- Indexes for table `sw_senam_apl_pgi`
--
ALTER TABLE `sw_senam_apl_pgi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jurnal_laporan_id` (`jurnal_laporan_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `apl_malam`
--
ALTER TABLE `apl_malam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `apl_mkn_malam`
--
ALTER TABLE `apl_mkn_malam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `apl_mkn_siang`
--
ALTER TABLE `apl_mkn_siang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `apl_pgi_kelas`
--
ALTER TABLE `apl_pgi_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `apl_sore`
--
ALTER TABLE `apl_sore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assign_guru`
--
ALTER TABLE `assign_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aturan_asrama`
--
ALTER TABLE `aturan_asrama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jurnal_laporan_piket`
--
ALTER TABLE `jurnal_laporan_piket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kedisiplinan`
--
ALTER TABLE `kedisiplinan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas_mata_pelajaran`
--
ALTER TABLE `kelas_mata_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas_r`
--
ALTER TABLE `kelas_r`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kesehatan`
--
ALTER TABLE `kesehatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komponen_nilai`
--
ALTER TABLE `komponen_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_keluar_barang`
--
ALTER TABLE `log_keluar_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `log_masuk_barang`
--
ALTER TABLE `log_masuk_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `log_tamu`
--
ALTER TABLE `log_tamu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mata_pelajaran_r`
--
ALTER TABLE `mata_pelajaran_r`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa_thn_kls`
--
ALTER TABLE `siswa_thn_kls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sw_apl_mkn_pgi`
--
ALTER TABLE `sw_apl_mkn_pgi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sw_senam_apl_pgi`
--
ALTER TABLE `sw_senam_apl_pgi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tahun_ajaran_kelas`
--
ALTER TABLE `tahun_ajaran_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tahun_ajaran_semester`
--
ALTER TABLE `tahun_ajaran_semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=552;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apl_malam`
--
ALTER TABLE `apl_malam`
  ADD CONSTRAINT `apl_malam_ibfk_1` FOREIGN KEY (`jurnal_laporan_id`) REFERENCES `jurnal_laporan_piket` (`id`),
  ADD CONSTRAINT `apl_malam_ibfk_2` FOREIGN KEY (`tahun_ajaran_kelas_id`) REFERENCES `tahun_ajaran_kelas` (`id`);

--
-- Constraints for table `apl_mkn_malam`
--
ALTER TABLE `apl_mkn_malam`
  ADD CONSTRAINT `apl_mkn_malam_ibfk_1` FOREIGN KEY (`jurnal_laporan_id`) REFERENCES `jurnal_laporan_piket` (`id`);

--
-- Constraints for table `apl_mkn_siang`
--
ALTER TABLE `apl_mkn_siang`
  ADD CONSTRAINT `apl_mkn_siang_ibfk_1` FOREIGN KEY (`jurnal_laporan_id`) REFERENCES `jurnal_laporan_piket` (`id`);

--
-- Constraints for table `apl_pgi_kelas`
--
ALTER TABLE `apl_pgi_kelas`
  ADD CONSTRAINT `apl_pgi_kelas_ibfk_1` FOREIGN KEY (`tahun_ajaran_kelas_id`) REFERENCES `tahun_ajaran_kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `apl_pgi_kelas_ibfk_2` FOREIGN KEY (`jurnal_laporan_id`) REFERENCES `jurnal_laporan_piket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `apl_sore`
--
ALTER TABLE `apl_sore`
  ADD CONSTRAINT `apl_sore_ibfk_1` FOREIGN KEY (`jurnal_laporan_id`) REFERENCES `jurnal_laporan_piket` (`id`),
  ADD CONSTRAINT `apl_sore_ibfk_2` FOREIGN KEY (`tahun_ajaran_kelas_id`) REFERENCES `tahun_ajaran_kelas` (`id`);

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
-- Constraints for table `jurnal_laporan_piket`
--
ALTER TABLE `jurnal_laporan_piket`
  ADD CONSTRAINT `jurnal_laporan_piket_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `kesehatan`
--
ALTER TABLE `kesehatan`
  ADD CONSTRAINT `kesehatan_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komponen_nilai`
--
ALTER TABLE `komponen_nilai`
  ADD CONSTRAINT `komponen_nilai_ibfk_1` FOREIGN KEY (`kelas_mata_pelajaran_id`) REFERENCES `kelas_mata_pelajaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `log_keluar_barang`
--
ALTER TABLE `log_keluar_barang`
  ADD CONSTRAINT `log_keluar_barang_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `log_masuk_barang`
--
ALTER TABLE `log_masuk_barang`
  ADD CONSTRAINT `log_masuk_barang_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `log_tamu`
--
ALTER TABLE `log_tamu`
  ADD CONSTRAINT `log_tamu_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`kelas_siswa_id`) REFERENCES `kelas_siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`komponen_nilai_id`) REFERENCES `komponen_nilai` (`id`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa_thn_kls`
--
ALTER TABLE `siswa_thn_kls`
  ADD CONSTRAINT `siswa_thn_kls_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_thn_kls_ibfk_2` FOREIGN KEY (`kelas_id`) REFERENCES `kelas_r` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_thn_kls_ibfk_3` FOREIGN KEY (`tahun_ajaran_kelas_id`) REFERENCES `tahun_ajaran_kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sw_apl_mkn_pgi`
--
ALTER TABLE `sw_apl_mkn_pgi`
  ADD CONSTRAINT `sw_apl_mkn_pgi_ibfk_1` FOREIGN KEY (`jurnal_laporan_id`) REFERENCES `jurnal_laporan_piket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sw_senam_apl_pgi`
--
ALTER TABLE `sw_senam_apl_pgi`
  ADD CONSTRAINT `sw_senam_apl_pgi_ibfk_1` FOREIGN KEY (`jurnal_laporan_id`) REFERENCES `jurnal_laporan_piket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
