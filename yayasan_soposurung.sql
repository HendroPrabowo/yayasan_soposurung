-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2019 at 06:48 AM
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

--
-- Dumping data for table `apl_malam`
--

INSERT INTO `apl_malam` (`id`, `tahun_ajaran_kelas_id`, `jumlah`, `hadir`, `tidak_hadir`, `keterangan_tidak_hadir`, `jurnal_laporan_id`) VALUES
(1, 51, 1, 1, 1, '1', 6),
(2, 52, 1, 1, 1, '1', 6),
(3, 55, 1, 1, 1, '1', 6);

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

--
-- Dumping data for table `apl_mkn_malam`
--

INSERT INTO `apl_mkn_malam` (`id`, `kelas`, `jumlah`, `hadir`, `tidak_hadir`, `keterangan_tidak_hadir`, `jurnal_laporan_id`) VALUES
(1, 'Siswa Kelas X', 1, 1, 1, '1', 6),
(2, 'Siswa Kelas XI', 1, 1, 1, '1', 6),
(3, 'Siswa Kelas XII', 1, 1, 1, '1', 6),
(4, 'Siswi Kelas X', 1, 1, 1, '', 6),
(5, 'Siswi Kelas XI', 1, 1, 1, '', 6),
(6, 'Siswi Kelas XII', 30, 1, 1, '', 6);

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

--
-- Dumping data for table `apl_mkn_siang`
--

INSERT INTO `apl_mkn_siang` (`id`, `kelas`, `jumlah`, `hadir`, `tidak_hadir`, `keterangan_tidak_hadir`, `jurnal_laporan_id`) VALUES
(1, 'Siswa Kelas X', 1, 1, 1, '1', 6),
(2, 'Siswa Kelas XI', 1, 1, 1, '1', 6),
(3, 'Siswa Kelas XII', 1, 1, 1, '1', 6),
(4, 'Siswi Kelas X', 1, 1, 1, '1', 6),
(5, 'Siswi Kelas XI', 1, 1, 1, '1', 6),
(6, 'Siswi Kelas XII', 1, 1, 1, '1', 6),
(7, 'Siswa Kelas X', 30, 29, 1, 'Sakit', 5),
(8, 'Siswa Kelas XI', 30, 29, 1, '', 5),
(9, 'Siswa Kelas XII', 28, 28, 0, '', 5),
(10, 'Siswi Kelas X', 30, 30, 0, '', 5),
(11, 'Siswi Kelas XI', 31, 30, 1, 'Demam', 5),
(12, 'Siswi Kelas XII', 31, 31, 0, 'Nihil', 5);

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

--
-- Dumping data for table `apl_pgi_kelas`
--

INSERT INTO `apl_pgi_kelas` (`id`, `tahun_ajaran_kelas_id`, `jumlah`, `hadir`, `tidak_hadir`, `keterangan_tidak_hadir`, `jurnal_laporan_id`) VALUES
(1, 51, 29, 28, 1, '', 6),
(2, 52, 30, 30, 0, '', 6),
(3, 55, 29, 29, 0, '', 6);

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

--
-- Dumping data for table `apl_sore`
--

INSERT INTO `apl_sore` (`id`, `tahun_ajaran_kelas_id`, `jumlah`, `hadir`, `tidak_hadir`, `keterangan_tidak_hadir`, `jurnal_laporan_id`) VALUES
(1, 51, 1, 1, 1, '', 6),
(2, 52, 1, 1, 1, '', 6),
(3, 55, 1, 1, 1, '', 6);

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
('siswa', 532, NULL),
('siswa', 533, NULL),
('siswa', 534, NULL),
('siswa', 535, NULL),
('siswa', 536, NULL),
('siswa', 537, NULL),
('siswa', 538, NULL);

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
(5, NULL, '2019-07-02', 21, 'testing'),
(6, NULL, '2019-07-03', 21, 'testing');

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

--
-- Dumping data for table `kedisiplinan`
--

INSERT INTO `kedisiplinan` (`id`, `siswa_id`, `aturan_asrama_id`, `keterangan`, `tambah_ke_point`) VALUES
(6, '0024332002', 8, 'Bebas', 1),
(7, '0024332002', 9, 'bebas', 0);

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
(113, 51, 3),
(114, 51, 7),
(115, 51, 8),
(116, 53, 3),
(117, 53, 7),
(118, 53, 8);

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
(7, 'XII PC'),
(8, 'XIII');

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
(82, '0024332002', 51),
(83, '0032292136', 51),
(84, '0033895291', 51),
(85, '0034212419', 51);

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

--
-- Dumping data for table `kesehatan`
--

INSERT INTO `kesehatan` (`id`, `siswa_id`, `penyakit`, `keterangan`, `semester`, `tanggal`, `created_by`) VALUES
(3, '0024332002', 'Batuk', 'Bebas', 1, '2019-05-04', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `komponen_nilai`
--

CREATE TABLE `komponen_nilai` (
  `id` int(11) NOT NULL,
  `kelas_mata_pelajaran_id` int(11) NOT NULL,
  `komponen_nilai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komponen_nilai`
--

INSERT INTO `komponen_nilai` (`id`, `kelas_mata_pelajaran_id`, `komponen_nilai`) VALUES
(31, 113, 'Tugas 1'),
(32, 113, 'Tugas 2'),
(33, 113, 'Tugas 3'),
(34, 113, 'Kuis');

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
(3, 'Meja Kayu', '2019-06-26', 'Made in China', '90', 21, 'bebas');

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
(5, 'Hendro', 'masuk aja', '2019-06-17 09:09:50', '2019-06-17 09:13:36', 21),
(6, 'Prabowo', 'belajar', '2019-06-17 09:13:46', '2019-06-17 09:13:59', 21);

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

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id`, `kelas_siswa_id`, `komponen_nilai_id`, `nilai`) VALUES
(65, 82, 31, 0),
(66, 83, 31, 0),
(67, 84, 31, 0),
(68, 85, 31, 0),
(69, 82, 32, 0),
(70, 83, 32, 0),
(71, 84, 32, 0),
(72, 85, 32, 0),
(73, 82, 33, 0),
(74, 83, 33, 0),
(75, 84, 33, 0),
(76, 85, 33, 0),
(77, 82, 34, 90),
(78, 83, 34, 0),
(79, 84, 34, 0),
(80, 85, 34, 0);

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
('0024332002', 'SOPHIA PATRICIA MISCA', 'Bandung, 16 September 2002', 'P', 'Kristen Protestan', 'Anak Kandung', 1, 'SMPN 2 LUMBANJULU', 'Sihar Tambun', 'Sautma Sitohang', 'SOSOR SABA DESA SILOMBU KEC. BONATUA LUNASI KAB. TOBA SAMOSIR', 2147483647, 'Petani', 'IRT', 1, 537, NULL, 30),
('0030897853', 'AGREROGATES TAMBUNAN', 'Timika, 5 Oktober 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPK SHINING STARS', 'Doliamen Tambunan', 'Perpe Simanjuntak', 'Jl Budiutomo, gg Getsemani rt 17_x000D_\nSempan-Timika', 811493298, 'Pegawai Swasta', 'IRT', 2, 536, NULL, 50),
('0032292136', 'STEFAN ENRICO JOEL MANURUNG', 'Medan, 5 April 2004', 'L', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPS ST IGNASIUS MEDAN', 'Budiman Manurung', 'Ruston Simarmata', 'Jl. Pintu Air IV Gg. Kolam Jaka_x000D_\nKel. Kwala Bekala Kec. Medan Johor, Medan', 2147483647, 'PNS', 'PNS', 1, 538, NULL, 0),
('0033895291', 'ABRAHAM SOPAR HAMONANGAN SITORUS', 'Medan, 1 Juni 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 4, 'SMPS ST THOMAS 1 MEDAN', 'Maston Sitorus', 'Desry Sianturi', 'Jln Bunga Mawar XV No 92', 2147483647, 'Pegawai Swasta', 'PNS', 1, 533, NULL, 0),
('0034212419', 'ABEDNEGO LUMBAN GAOL', 'Tanjung Beringin, 15 Mei 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 4, 'SMPS ST PAULUS SIDIKALANG', 'Mantok LumbanGaol', 'Nurmaida Pandiangan', 'Tanjung Beringin, Tiga Lingga, Dairi', 2147483647, 'Petani', 'Petani', 1, 532, NULL, 0),
('0040072254', 'AGNES YULIA ELISABETH PERDEDE', 'Medan, 6 September 2004', 'P', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPS ST. THOMAS 1 MEDAN', 'Hiro Pingkir Pardede', 'Merry Naibaho', 'Jalan Sejahtera Gang Bahagia NO. 17', 2147483647, 'Pegawai BUMN', 'IRT', 2, 535, NULL, 0),
('0048830270', 'AGATHA ROSAULINA SITANGGANG', 'Air Molek, 5 Oktober 2003', 'P', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPS BUDHI DHARMA BALIGE ', 'Lekson Sitanggang', 'Tiurma Sitohang', 'JL DI PANJAITAN RT 002/001 SEKAR MAWAR AIR MOLEK, INHU, RIAU', 2147483647, 'Berkebun', 'IRT', 2, 534, NULL, 0);

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
(51, 15, 4),
(52, 15, 6),
(53, 16, 4),
(54, 16, 6),
(55, 15, 7),
(56, 16, 7);

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
(15, '2019/2020', 'Ganjil', 1),
(16, '2019/2020', 'Genap', 0),
(17, '2020/2021', 'Ganjil', 0),
(18, '2020/2021', 'Genap', 0);

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
(532, '0034212419', 'ejT6-_Q_tGO4ei89jZPsSHYibNe2g_zh', '$2y$13$.O68C0e.z53T2w7dQjerpeQ0deQBVWCyIU8LJbXTghbBOwMd46LDW', NULL, NULL, 'siswa', 10, 1, 0, 0),
(533, '0033895291', '4G0JzrmcM10DJaNpJn_HA7R8CeQC7I4D', '$2y$13$t20lPzMwIk4z.hj72PY4W.OVn6adQeRlZYL.6mrTpiDvPUZcwwMTS', NULL, NULL, 'siswa', 10, 1, 0, 0),
(534, '0048830270', 'Rxzlm4YVM20Zc4sHPz_8_vQq7WpjYWy7', '$2y$13$YaTE7I7KCmuVcQ9y9DlHL.XQaSPQ1IVBxGbcKPnUL.R.bbaf3vPGq', NULL, NULL, 'siswa', 10, 1, 0, 0),
(535, '0040072254', 'aNcSVF6gyCMDPQrsALtfUNDuNYJSu1st', '$2y$13$WErTrFS/Kg8MayEG6260x.5CXVcJfJMCZ6m7/zPIMu88gZDxJykma', NULL, NULL, 'siswa', 10, 1, 0, 0),
(536, '0030897853', 'o0qyXFu5xbyXeLJo744f3wKs_VuWlLoF', '$2y$13$/3mUiIVx2dZeJu7Hx7G6s.rbZNhS5Is1/K4KLdx7kDn0ZqIpYgrLi', NULL, NULL, 'siswa', 10, 1, 0, 0),
(537, '0024332002', 'ezu3ahbwK4ATb8wacqZt7MPiyzoEuBSL', '$2y$13$4udCQutpJmbgkAzOhjSaju2ejB01JIu9BQVbqn8hAcsfOWVl2A/0W', NULL, NULL, 'siswa', 10, 1, 0, 0),
(538, '0032292136', 'v9n01v0fQ56XieJJUrdASFPGfsSl8w3a', '$2y$13$xKcop7p0JLhQSKrhMJN6pOGmc9J//AWDW6PHw86k.rgy6J2T1L1u6', NULL, NULL, 'siswa', 10, 1, 0, 0);

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
  ADD KEY `user` (`user_id`),
  ADD KEY `kelas` (`kelas_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `apl_malam`
--
ALTER TABLE `apl_malam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `apl_mkn_malam`
--
ALTER TABLE `apl_mkn_malam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `apl_mkn_siang`
--
ALTER TABLE `apl_mkn_siang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `apl_pgi_kelas`
--
ALTER TABLE `apl_pgi_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `apl_sore`
--
ALTER TABLE `apl_sore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kedisiplinan`
--
ALTER TABLE `kedisiplinan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kelas_mata_pelajaran`
--
ALTER TABLE `kelas_mata_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `kelas_r`
--
ALTER TABLE `kelas_r`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `kesehatan`
--
ALTER TABLE `kesehatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `komponen_nilai`
--
ALTER TABLE `komponen_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `log_keluar_barang`
--
ALTER TABLE `log_keluar_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `log_masuk_barang`
--
ALTER TABLE `log_masuk_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `log_tamu`
--
ALTER TABLE `log_tamu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mata_pelajaran_r`
--
ALTER TABLE `mata_pelajaran_r`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tahun_ajaran_semester`
--
ALTER TABLE `tahun_ajaran_semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=539;

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
  ADD CONSTRAINT `kelas` FOREIGN KEY (`kelas_id`) REFERENCES `kelas_r` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
