-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2019 at 11:25 AM
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
('siswa', 274, NULL),
('siswa', 275, NULL),
('siswa', 277, NULL),
('siswa', 278, NULL),
('siswa', 279, NULL),
('siswa', 280, NULL),
('siswa', 281, NULL),
('siswa', 282, NULL),
('siswa', 283, NULL),
('siswa', 284, NULL),
('siswa', 285, NULL),
('siswa', 286, NULL),
('siswa', 287, NULL),
('siswa', 288, NULL),
('siswa', 289, NULL),
('siswa', 290, NULL),
('siswa', 291, NULL),
('siswa', 292, NULL),
('siswa', 293, NULL),
('siswa', 294, NULL),
('siswa', 295, NULL),
('siswa', 296, NULL),
('siswa', 297, NULL),
('siswa', 298, NULL),
('siswa', 299, NULL),
('siswa', 300, NULL),
('siswa', 301, NULL),
('siswa', 302, NULL),
('siswa', 303, NULL),
('siswa', 304, NULL),
('siswa', 305, NULL),
('siswa', 306, NULL),
('siswa', 307, NULL),
('siswa', 308, NULL),
('siswa', 309, NULL),
('siswa', 310, NULL),
('siswa', 311, NULL),
('siswa', 312, NULL),
('siswa', 313, NULL),
('siswa', 314, NULL),
('siswa', 315, NULL),
('siswa', 316, NULL),
('siswa', 317, NULL),
('siswa', 318, NULL),
('siswa', 319, NULL),
('siswa', 320, NULL),
('siswa', 321, NULL),
('siswa', 322, NULL),
('siswa', 323, NULL),
('siswa', 324, NULL),
('siswa', 325, NULL),
('siswa', 326, NULL),
('siswa', 327, NULL),
('siswa', 328, NULL),
('siswa', 329, NULL),
('siswa', 330, NULL),
('siswa', 331, NULL),
('siswa', 332, NULL),
('siswa', 333, NULL),
('siswa', 334, NULL),
('siswa', 335, NULL),
('siswa', 336, NULL),
('siswa', 337, NULL),
('siswa', 338, NULL),
('siswa', 339, NULL),
('siswa', 340, NULL),
('siswa', 341, NULL),
('siswa', 342, NULL),
('siswa', 343, NULL),
('siswa', 344, NULL),
('siswa', 345, NULL),
('siswa', 346, NULL),
('siswa', 347, NULL),
('siswa', 348, NULL),
('siswa', 349, NULL),
('siswa', 350, NULL),
('siswa', 351, NULL),
('siswa', 352, NULL),
('siswa', 353, NULL),
('siswa', 354, NULL),
('siswa', 355, NULL),
('siswa', 356, NULL),
('siswa', 357, NULL),
('siswa', 358, NULL),
('siswa', 359, NULL),
('siswa', 360, NULL),
('siswa', 361, NULL),
('siswa', 362, NULL),
('siswa', 363, NULL),
('siswa', 364, NULL),
('siswa', 365, NULL),
('siswa', 366, NULL),
('siswa', 367, NULL),
('siswa', 368, NULL),
('siswa', 369, NULL),
('siswa', 370, NULL),
('siswa', 371, NULL),
('siswa', 372, NULL),
('siswa', 373, NULL),
('siswa', 374, NULL),
('siswa', 375, NULL),
('siswa', 376, NULL),
('siswa', 377, NULL),
('siswa', 378, NULL),
('siswa', 379, NULL),
('siswa', 380, NULL),
('siswa', 381, NULL),
('siswa', 382, NULL),
('siswa', 383, NULL),
('siswa', 384, NULL),
('siswa', 385, NULL),
('siswa', 386, NULL),
('siswa', 387, NULL),
('siswa', 388, NULL),
('siswa', 389, NULL),
('siswa', 390, NULL),
('siswa', 391, NULL),
('siswa', 392, NULL);

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
(1, '12341234', 'tohap', 'Tohap Rajagukguk', 273),
(2, '12341234', 'adrian', 'Adrian Sirait', 276);

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
(1, 'X(1)'),
(2, 'X(2)'),
(3, 'X(3)');

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
(4, 'PPKN');

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
  `user_id` int(11) NOT NULL,
  `kelas_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nama`, `kelahiran`, `jenis_kelamin`, `agama`, `status_dalam_keluarga`, `anak_ke`, `sekolah_asal`, `nama_ayah`, `nama_ibu`, `alamat_orang_tua`, `nomor_telepon_orang_tua`, `pekerjaan_ayah`, `pekerjaan_ibu`, `user_id`, `kelas_id`) VALUES
('0024332002', 'SOPHIA PATRICIA MISCA', 'Bandung, 16 September 2002', 'P', 'Kristen Protestan', 'Anak Kandung', 1, 'SMPN 2 LUMBANJULU', 'Sihar Tambun', 'Sautma Sitohang', 'SOSOR SABA DESA SILOMBU KEC. BONATUA LUNASI KAB. TOBA SAMOSIR', 2147483647, 'Petani', 'IRT', 377, NULL),
('0024612736', 'YOAS SAHAT MARULITUA HUTAPEA', 'Jakarta, 17 November 2002', 'L', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPN 1 LAGUBOTI', 'Kalvin Hutapea', 'Moraida Marbun', 'GOMPAR HUALA DESA OMPU RAJA HUTAPEA', 2147483647, 'Wiraswasta', 'Perawat', 389, NULL),
('0024658032', 'ERIN TASYA SINAGA ', 'Jambi, 19 September 2002', 'P', 'Kristen Protestan ', 'Anak Kandung', 4, 'SMPS BINTANG TIMUR PEMATANGSIANTAR ', 'Sabar Sinaga', 'Tuani Sidabutar', 'Jl. Farell Pasaribu Gg. Semangka No. 5A Pematangsiantar ', 2147483647, 'Petani', 'IRT', 310, NULL),
('0025211319', 'ALPHIN IMMANUEL BAROE MANALU', 'Jakarta, 29 Desember 2002', 'L', 'Kristen Katolik', 'Anak Kandung', 1, 'SMPS STRADA SANTA MARIA 1', 'Vincentius Manalu', 'Rini gultom', 'Jl. Tawes V No.1 RT 08/03, Pondok Permai, Kota Baru, Pasar Kemis, Tangerang, Banten', 2147483647, 'Pegawai Swasta', 'IRT', 283, NULL),
('0025318025', 'WIRYA DEWANTORO SIHOMBING', 'Sipoholon, 18 November 2002', 'L', 'Kristen Protestan', 'Anak Kandung', 5, 'SMPS ST MARIA TARUTUNG', 'Pardomuan Sihombing', 'Rostina Sinaga', 'JL ANGGUR NO 37 PERUMNAS PAGARBERINGIN DESA PAGARBATU KEC SIPOHOLON KAB TAPANULI UTARA', 2147483647, 'PNS', 'IRT', 386, NULL),
('0025431125', 'ANANDA NAIBAHO', 'Teluk Sasah, 2 Desember 2002', 'L', 'Kristen Protestan', 'Anak Kandung', 1, 'SMPN 12 BINTAN', 'Naek Naibaho', 'Lisbet Nainggolan', ' KABUPATEN BINTAN, kepulauan rian, lobam mas asri blok. A no. 4', 2147483647, 'Wiraswasta', 'IRT', 285, NULL),
('0026314091', 'DEARMEN CHANDRO RUMASINGAP ', 'Berau, 16 Agustus 2002', 'L', 'Kristen Protestan ', 'Anak Kandung', 3, 'SMPN 4 BALIGE', 'Hotdi Rumasingap', 'Asima Simaremare', 'Jl. Pagar Batu Soposurung Balige ', 2147483647, 'Petani', 'IRT', 305, NULL),
('0026368536', 'YUNI MAGDALENA', 'Medan, 15 Juni 2002', 'P', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPN 13 PEKANBARU', 'Yulianri', 'Nelly Simbolon', 'Asrama Manipol Jl.Sukoharjo No.2 Pekanbaru', 2147483647, 'TNI-AD', 'IRT', 392, NULL),
('0026658022', 'NOEL PANAHATAN SINAGA', 'Batam, 01 Desemeber 2002', 'L', 'Kristen Protestan', 'Anak Kandung', 2, 'SMP PUTRA BATAM', 'Hombar Sinaga ', 'Deliana Sianturi ', 'Perumahan Buana view asri_x000D_\nBlm. Palem no. 10 Batu aji, Batam.', 2147483647, 'Wiraswasta', 'Wiraswasta', 358, NULL),
('0026693963', 'FERNANDO SIMANJUNTAK ', 'Padang Mahondang, 29 September 2002', 'L', 'Kristen Protestan ', 'Anak Kandung', 2, 'SMPN 1 PANGARIBUAN', 'Tumpak Siamnjuntak', 'Hotty Sihotang', 'Desa Sigotom Kec. Pangaribuan ', 2147483647, 'Wiraswasta', 'Petani', 314, NULL),
('0028033979', 'SARIDA BERNADETHA MUNTHE', 'Dolosanggul, 22 November 2002', 'P', 'Kristen Katolik', 'Anak Kandung', 2, 'SMPS ST LUSIA DOLOKSANGGUL', 'Pasu Munthe', 'Legdi Sihotang', 'Jln Letkol G.A Manullang No 11 Doloksanggul', 2147483647, 'Pedagang', 'PNS', 374, NULL),
('0028430554', 'RETHA NOVIANTY SIPAYUNG', 'Tanjung Beringin, 22 November 2002', 'P', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPN 2 SUMBUL', 'Lasden Rohaman Sipayung ', 'Rosmelina Girsang ', 'Jl. Damai_x000D_\nTanjung Beringin_x000D_\nKecamatan Sumbul_x000D_\nKABUPATEN DAIRI', 2147483647, 'Petani', 'PNS', 366, NULL),
('0030332866', 'CELIA SIANIPAR', 'Tarutung, 18 Juni 2003', 'P', 'Kristen Protestan', 'Anak Kandung', 3, 'SMPS ST MARIA TARUTUNG', 'Manonggak Sianipar', 'Dewi Silalahi', 'KELURAHAN PARTALI TORUAN, TARUTUNG', 2147483647, 'PNS', 'PNS', 300, NULL),
('0030554799', 'RICARDO IVAN ROY', 'Bagan Batu, 27 Juli 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 1, 'SMPS YOSEF ARNOLDI', 'Lukman Sirait', 'Evaerlina Simanjuntak', 'Riau,Rokan hilir,Bagan Sinembah,Bagan Batu,Jln.simp.simaholder', 2147483647, 'Wiraswasta', 'Wiraswasta', 369, NULL),
('0030618605', 'YESIN ANTONY MORALES LUMBANRAJA', 'Manduamas, 17 Juli 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 3, 'SMPS BUDHI DHARMA BALIGE ', 'Pahalanius Lumbanraja', 'Nursota E Sihombing', 'JL SISINGAMANGARAJA PARANGINAN DESA MANDUAMAS LAMA TAPTENG', 2147483647, 'PNS', 'PNS', 387, NULL),
('0030675438', 'LARANSA SOLUNA GOGO SIMATUPANG', 'Hutapaung, 16 September 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 1, 'SMPS ST LUSIA DOLOKSANGGUL', 'Anderson Simatupang', 'Laris R Lumbangaol', 'Jl. Sisingamangaraja Hutapaung Humbahas', 2147483647, 'PNS', 'PNS', 339, NULL),
('0030675478', 'JESSICA HUTAGALUNG', 'Tarutung, 27 Desember 2003', 'P', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPS ST LUSIA DOLOKSANGGUL', 'Hotman Hutagalung', 'Tuti Simanungkalit', 'Partukkoan Aeklung', 2147483647, 'PNS', 'PNS', 332, NULL),
('0030678576', 'TAMA CELINE MARGARETHA BUTARBUTAR', 'Jakarta, 26 Juli 2003', 'P', 'Kristen Protestan', 'Anak Kandung', 1, 'SMPN 2 LUMBANJULU', 'Tumpak Butarbutar', 'Helen Siregar', 'JL. LUMBAN TALUN, DESA SIHIONG, KEC. BONATUA LUNASI, KAB.TOBA SAMSIR', 2147483647, 'PNS', 'IRT', 382, NULL),
('0030735934', 'STEVEN NICOLAUS HETSON L', 'Pekanbaru, 16 Maret 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPN 1 SIGUMPAR', 'Alm.Nelson Lumbanraja', 'Hetty Simanjuntak', 'DESA SIGUMPAR JULU', 2147483647, '-', 'Bidan PTT', 381, NULL),
('0030735968', 'BOY MIKHAEL ERTANTO SIRAIT', 'Siraitholbung, 7 Oktober 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPN 2 LUMBANJULU', 'Erward Pandapotan Sirait', 'Rotua Pardede', 'SIRAIT HOLBUNG, DESA HARUNGGUAN KEC. BONATUA LUNASI', 2147483647, 'Wiraswasta', 'Guru', 296, NULL),
('0030736194', 'RICO FRIJAYA S. PANE', 'Galung, 30 Agustus 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPN 1 HABINSARAN', 'Lindung Pane', 'Jelita Simangunsong', 'PARSOBURAN, KEC.HABINSARAN, KAB.TOBA SAMOSIR', 2147483647, 'PNS', 'PNS', 370, NULL),
('0030750744', 'MARCELLINO PARSAORAN SITORUS', 'Porsea, 30 Desember 2003', 'L', 'Aliran kepercayaan', 'Anak Kandung', 2, 'SMPS BUDHI DHARMA BALIGE ', 'Punguan Sitorus', 'Farida Butarbutar', 'JL. SISINGAMANGARAJA NO.30 PORSEA', 2147483647, 'Wiraswasta', 'Wiraswasta', 343, NULL),
('0030776079', 'ANGGI NASUTION', 'Sibolga, 25 April 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 4, 'SMPS FATIMAH 1 SIBOLGA', 'Jaharuddin Nasution', 'Odorita Sinaga', 'Jalan.zainul Arifin no.25 Aek tolang, Tapanuli tengah', 2147483647, 'Wiraswasta', 'PNS', 292, NULL),
('0030798345', 'SAHAT MIKHAEL SILALAHI', 'Pematang Siantar, 3 Mei 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 1, 'SMPS BINTANG TIMUR PEMATANGSIANTAR', 'Batal P Silalahi', 'Sumarni Saragih', 'Jalan. Mufakat kiri no. 7 pemtang siantar', 2147483647, 'Wiraswasta', 'PNS', 373, NULL),
('0030798381', 'JOEL TRIMEN DEARDO SILALAHI', 'Panei Tongah, 14 Juli 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 3, 'SMPS BINTANG TIMUR PEMATANGSIANTAR', 'Marolop Siallahi', 'Linnaria Saragih', 'JL. ASAHAN KM. VI SIMP. PERUMNAS BATU ANAM', 2147483647, 'PNS', 'PNS', 334, NULL),
('0030831850', 'NUGRAHAN HUTABARAT', 'Pasuruan, 21 Agustus 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 1, 'SMPS KRISTEN KALAM KUDUS MEDAN', 'Togap Hutabarat ', 'Alma Susanna Sirait ', 'Jl pembangunan asrama militer Yonzipur 1/DD', 2147483647, 'TNI ', 'IRT', 359, NULL),
('0030897853', 'AGREROGATES TAMBUNAN', 'Timika, 5 Oktober 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPK SHINING STARS', 'Doliamen Tambunan', 'Perpe Simanjuntak', 'Jl Budiutomo, gg Getsemani rt 17_x000D_\nSempan-Timika', 811493298, 'Pegawai Swasta', 'IRT', 279, NULL),
('0030912751', 'CALYSTA ZAFANY MANALU', 'Samarinda, 24 Oktober 2003', 'P', 'Kristen Protestan', 'Anak Kandung', 1, 'SMP NEGERI 1 SAMARINDA', 'Toman Manalu', 'Cisyulia Simanjuntak', 'JL.A.W.Syahrani_x000D_\nKomp.Perum.Villa Tamara Blok P No.1_x000D_\nSamarinda   75123', 2147483647, 'Pegawai Swasta', 'PNS', 299, NULL),
('0030953343', 'KEVIN EMRENA PERSADA SEMBIRING', 'Bandung, 25 Juni 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 1, 'SMPS ST MARIA KABANJAHE', 'Antara Sembiring', 'Rosliana Bangun', 'Kutabuluh Simpang Buahraya,Kab Karo,Sumatra utara', 2147483647, 'Wiraswasta', 'IRT', 336, NULL),
('0030954837', 'DANIEL NELSON PAKPAHAN ', 'Berastagi, 3 Mei 2003', 'L', 'Kristen Protestan ', 'Anak Kandung', 3, 'SMPS ST MARIA KABANJAHE ', 'Musa Pakpahan', 'mataria Manihuruk', 'Perum. korpri desa gurusinga nomor 302 kecamatan berastagi kabupaten karo', 2147483647, 'Pegawai Swasta', 'IRT', 304, NULL),
('0030954873', 'ANGEL DOMINICA BR TARIGAN', 'Kabanjahe, 8 Agustus 2003', 'P', 'Kristen Katolik', 'Anak Kandung', 1, 'SMPN 1 KABANJAHE', 'Jhonranes tarigan', 'Florentina sembiring', 'JL MASJID GG TAMBUN NO.10 KABANJAHE', 2147483647, 'Wiraswasta', 'Wiraswasta', 289, NULL),
('0031098225', 'LOISE EUNIKE SIMBOLON', 'Pangururan, 5 Desember 2003', 'P', 'Kristen Protestan', 'Anak Kandung', 3, 'SMPN 1 PANGURURAN', 'Vikbon Simbolon', 'Enny Naibaho', 'Kompleks SMA St. Mikhel Pangururan', 2147483647, 'PNS', 'PNS', 340, NULL),
('0031178939', 'ANDREAS DOMENICO SITUMORANG', 'Rantau Prapat, 13 April 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 1, 'SMPN 2 RANTAU UTARA', 'Freddy Situmorang', 'Sempa A Tarigan', 'Jl. Panti Asuhan Padang Matinggi', 2147483647, 'Guru', 'Guru', 286, NULL),
('0031272384', 'KRIS YULIARNI SIREGAR', 'Sidikalang, 19 Juli 2003', 'P', 'Kristen Protestan', 'Anak Kandung', 1, 'SMPS ST PAULUS SIDIKALANG', 'Binsar Siregar', 'Ida R Purba', 'Jalan Agave Sidikalang', 2147483647, 'PNS', 'Guru', 337, NULL),
('0031272396', 'SONY JEREMIA SIMAMORA', 'Sidikalang, 2 Februari 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPN 1 SIDIKALANG  ', 'Sahat Marulitua Simamora', 'Setia Manullang', 'JL.DAMAI II HUTA RAKYAT SIDIKALANG', 2147483647, 'PNS', 'Wiraswasta', 375, NULL),
('0031272472', 'PUTRA BUNGARAN ROYNALDO SILALAHI', 'Sidikalang, 11 Mei 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPN 1 SIDIKALANG', 'Hitler Silalahi', 'Nurhati Sinaga ', 'Jln. Persada no.87A', 2147483647, 'Karyawan Swasta', 'Karyawan Swasta', 363, NULL),
('0031272529', 'NATAULI AURESA PADANG', 'Sidikalang, 28 Juli 2003', 'P', 'Kristen Protestan', 'Anak Kandung', 1, 'SMPN 1 SIDIKALANG', 'Augusman Harapan Padang ', 'Nora Irawati Sihite ', 'JALAN FRAKSI NO 9 SIDIKALANG, KAB. DAIRI', 2147483647, 'PNS ', 'PNS', 356, NULL),
('0031289330', 'ALEXANDRY DEBORA CECILIA HUTAURUK', 'Sidikalang, 6 Maret 2003', 'P', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPS ST PAULUS SIDIKALANG', 'Alex Simon Hutauruk', 'Liskenida Tambunan', 'Jln Batu Kapur no. 38, Sidikalang, Kab. Dairi.', 2147483647, 'PNS', 'Wiraswasta', 282, NULL),
('0031332867', 'DELIMA ANGGARA LUMBANTOBING ', 'Medan, 26 Juni 2003', 'P', 'Kristen Protestan ', 'Anak Kandung', 1, 'SMPS ST MARIA TARUTUNG', 'Olsen Lumbantobing', 'Jesminawaty Lubis', 'Huta Sumur Komp. SMPN 3 Tarutung- Taput Kel, Huta Toruan VII', 2147483647, 'Wiraswasta', 'IRT', 306, NULL),
('0031332893', 'GILBERT BASTANTA SIRINGO', 'Tarutung, 9 Oktober 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPS ST MARIA TARUTUNG', 'Dosen Siringo', 'Hormida Sinurat', 'Kompleks Aek Ristop. Jl. DI. Panjaitan Tarutung', 2147483647, 'PNS', 'PNS', 320, NULL),
('0031335497', 'GILBERT MARTUA SIAHAAN', 'Tarutung, 14 Mei 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPS ST MARIA TARUTUNG', 'Hasudungan Siahaan', 'Purnama Lumbangaol', 'Jl. DR. TD. Pardede Gg Dame No. 462 Tarutung', 2147483647, 'PNS', 'Wiraswasta', 321, NULL),
('0031445165', 'MIRYAM ROTUA LOVITA SINAGA', 'Padangsidimpuan, 03 Juli 2003', 'P', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPS PERGURUAN SARIPUTRA', 'Sahattua Sinaga ', 'Rosinta Aritonang (alm)', 'JL. ST. MHD. ARIF NO. 182', 2147483647, 'Wiraswasta', 'Alm', 352, NULL),
('0031671290', 'ATUR MORDAHAI OCTOBRYANT', 'Sidikalang, 19 Oktober 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPN 1 SIDIKALANG', 'Ronggos Silaban', 'Tiarida Sihombing', 'JALAN AIR BERSIH NO. 42 SIDIKALANG', 2147483647, 'Wiraswasta', 'PNS', 293, NULL),
('0031712625', 'JEREMIA PANGGABEAN', 'Jakarta, 14 Maret 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 1, 'SMPN 2 TARUTUNG', 'Edonai Panggabean', 'Roslan Josepha Situmorang', 'Tapian Nauli, Sipoholon', 2147483647, 'Petani', 'Petani', 329, NULL),
('0032129405', 'HILLARY', 'Bandung, 18 November 2003', 'P', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPS BUDHI DHARMA BALIGE ', 'Freddy Sibarani', 'Rasmi Sinaga', 'JL RAYA BALIGE LAGUBOTI KM 3,5 TAMBUNAN BALIGE', 2147483647, 'Dosen', 'PNS', 324, NULL),
('0032252504', 'MARZUKY AGUS SYAHPUTERA MARPAUNG', 'Medan, 3 Agustus 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPS ST THOMAS 1 MEDAN', 'Makmur Marpaung', 'Mangerbang Sinambela', 'JL. PELAJAR TIMUR NO 156 A MEDAN KEL. BINJAI KEC. MEDAN DENAI', 2147483647, 'Wiraswasta', 'IRT', 347, NULL),
('0032292136', 'STEFAN ENRICO JOEL MANURUNG', 'Medan, 5 April 2004', 'L', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPS ST IGNASIUS MEDAN', 'Budiman Manurung', 'Ruston Simarmata', 'Jl. Pintu Air IV Gg. Kolam Jaka_x000D_\nKel. Kwala Bekala Kec. Medan Johor, Medan', 2147483647, 'PNS', 'PNS', 378, NULL),
('0032313143', 'JOHANES PARLINDUNGAN DAMANIK', 'Medan, 24 Desember 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 1, 'SMPS METHODIST 1 MEDAN', 'Dauli Damanik', 'Yasni Purba', 'JALAN KERUNTUNG GG LUHUR NO 2A MEDAN', 2147483647, 'Wiraswasta', 'Guru', 335, NULL),
('0032438743', 'JOE HANDRE NOVHEN MARPAUNG', 'Duri, 13 November 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 1, 'SMPS YOSEF ARNOLDI', 'Hans Marpaung', 'Marliana Simarmata', 'Jl. Lintas Duri-Dumai Km. 3.5 Duri', 2147483647, 'Pedagang', 'Pedagang', 333, NULL),
('0032455943', 'MAESTRO WIJAYA', 'Bagan Sinembah, 16 Mei 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPN 1 BAGAN SINEMBAH', 'James A Sinaga', 'Rosmariana', 'Jl.Cengkeh RT 003/ RW 002 Desa Bagan Batu Kec.Bagan Sinembah', 2147483647, 'Wiraswasta', 'PNS', 341, NULL),
('0032633143', 'YOHANES MANGARAHON TUA PANJAITAN', 'Pekanbaru, 15 Juni 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 1, 'SMPS ST MARIA PEKANBARU', 'Romulus Panjaitan', 'Agustina Gultom', 'Jl. KH Dahlan No.123 Pekanbaru Riau', 2147483647, 'Pegawai Swasta', 'IRT', 390, NULL),
('0032699447', 'CALVIN GITO YORDAN TINDAON', 'Pekanbaru, 10 April 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 2, 'SMP NEGERI 1 BANGKINANG', 'Budi Tindaon', 'Nurlela Lumbantoruan', 'Dusun terang bulan salo', 2147483647, 'Pegawai Swasta', 'IRT', 298, NULL),
('0032811614', 'GILBERT REPHAEL MANGATUR SAMOSIR', 'Jakarta, 4 September 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPS KRISTEN PENABUR KOTA JABABEKA', 'Jaminar Samosir', 'Lasta Rohana Sinaga', 'Jl. Menjangan 5 Blok P4 No 15_x000D_\nRT 06/09 , Desa Jayamukti , Cikarang Pusat , Jababeka', 2147483647, 'Pegawai Swasta', 'IRT', 322, NULL),
('0033055110', 'ALDI PARULIAN SITINJAK', 'Medan, 15 juli 2003', 'L', 'Kristen Katolik', 'Anak Kandung', 5, 'SMPS TRI SAKTI 1 MEDAN', 'Alber Sitinjak', 'Rosdiana Nurhandayani', 'JL HARAPAN PASTI GG STAR KARYA TUA NO 3', 2147483647, 'Guru', 'Guru', 281, NULL),
('0033248990', 'AUSTIN G. PARDOSI', 'Stabat, 26 Agustus 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 1, 'SMPS ST YOSEPH MEDAN', 'Alm. Ricky H Pardosi', 'Nova Wanty Togatorop', 'Jl. Setia No. 28 Medan', 2147483647, '-', 'IRT', 294, NULL),
('0033256789', 'PETER TOYENBEE RIMNITAHI SIMATUPANG', 'Medan, 24 Mei 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 4, 'SMPS BUDHI DHARMA BALIGE ', 'Sabam Simatupang ', 'Pita Omas Lumbangaol', 'PERUMAHAN KORPRI LORONG 6 LAGUBOTI TOBASA', 2147483647, 'PNS', 'PNS', 361, NULL),
('0033350259', 'PETER CORNELIUS PARASIAN MANURUNG', 'Pematangsiantar, 07 Juni 2003', 'L', 'Kristen Katolik', 'Anak Kandung', 3, 'SMPS ST. THOMAS 1 MEDAN', 'Hilarius Manurung ', 'Herlina ER Pasaribu', 'Jln. Menteng VII Gg. Kenanga No. 11B Medan', 2147483647, 'Pegawai BUMN', 'Pegawai BUMN', 360, NULL),
('0033451143', 'BRYAN JEREMY HARAITO RAJAGUKGUK', 'Medan, 12 Mei 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPS METHODIST 3', 'Antoni Rajagukguk', 'Fera D Sianturi', 'jl. Suluh Komp. Suluh Garden No. B8', 2147483647, 'Polisi', 'Dokter', 297, NULL),
('0033451523', 'EKA PARIMA SARAGIH ', 'Medan, 2 Juli 2003', 'P', 'Kristen Protestan ', 'Anak Kandung', 1, 'SMP CHANDRA KUSUMA', 'Parulian Tua Saragih', 'Durmas Simamora', 'Jl.Tuar Indah I No.174 Blok IX Griya Martubung,Kel.Besar,Kec.Medan Labuhan,Kota Medan', 2147483647, 'Pelaut', 'IRT', 308, NULL),
('0033510883', 'YOSEPHINE PAULINA SIANIPAR', 'Balige, 17 Juni 2003', 'P', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPN 4 BALIGE', 'Torkis Sianipar', 'Mindo Pardede', 'JL. BABALUBIS NO.8 SANGKAR NI HUTA, BALIGE', 2147483647, 'Pedagang', 'PNS', 391, NULL),
('0033533499', 'AVE GOMOS PARAPAT', 'Siphutar, 10 Desember 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 5, 'SMPN 1 SIPAHUTAR', 'Aber Uluan Parapat', 'Alm.Nurmala Silalahi', 'DUSUN I SIABALABAL DESA SIABALABAL II SIPAHUTAR', 2147483647, 'Guru', '-', 295, NULL),
('0033712391', 'FELIX ANDREW ', 'Batam, 14 September 2003', 'L', 'Kristen Protestan ', 'Anak Kandung', 3, 'SMPN 12 BATAM KOTA', 'Santona Gultom', 'Lasamauli Sormin', 'Bukit layang blok A No 26', 2147483647, 'Wiraswasta', 'IRT', 313, NULL),
('0033714094', 'WILLIAM YOAS SITUMORANG', 'Stabat, 5 Mei 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 1, 'SMPN 1 BABALAN PANGKALAN BERANDAN', 'Walmekin Situmorang', 'Nuraifa Junites Simangunsong ', 'Jl. Besitang Aspol No. 35, Kelurahan Brandan Barat, Kecamatan Babalan', 2147483647, 'Polri ', 'IRT', 385, NULL),
('0033807884', 'STEVEN GERALD PARSAORAN BERUTU', 'Medan, 31 Juli 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 1, 'SMPS BONAPASOGIT SEJAHTERA', 'Ojahan Berutu', 'Kestina Simangunsong', 'KOMPLEK PERUMAHAN TPL', 2147483647, 'Pegawai Swasta', 'PNS', 380, NULL),
('0033895299', 'ANDREW BOB BRIAN KARO-KARO', 'Medan, 10 April 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 3, 'SMPS ST THOMAS 1 MEDAN', 'Erwin Karo karo', 'Doharma Purba', 'Jl. Bunga Mawar xx No. 34 Pasar v Padang Bulan Medan ', 2147483647, 'Wiraswasta', 'Wiraswasta', 288, NULL),
('0033899020', 'JACOB HASIHOLAN SIMANJUNTAK', 'Pematang Siantar, 13 Maret 2004', 'L', 'Kristen Protestan', 'Anak Kandung', 3, 'SMPS BUDI MULIA PEMATANGSIANTAR', 'Santo Simanjuntak', 'Moon Rahmawati', 'Jalan Sawo 1 Nomor 19 Perumnas Batu Anam, Desa Sitalasari, Kecamatan, Siantar, KABUPATEN SIMALUNGUN', 2147483647, 'PNS', 'IRT', 327, NULL),
('0033899021', 'GEOVANI SIMANGUNSONG', 'Pematang Siantar, 17 Maret 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 4, 'SMPS BINTANG TIMUR PEMATANGSIANTAR', 'Robert Simangunsong', 'Taruli Siagian', 'Huta 3, Rambung Merah', 2147483647, 'TNI-AD', 'IRT', 318, NULL),
('0034197928', 'GERALD TEGUH MANDIRI BARUS', 'Medan, 10 Juni 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPS YPPI PERAWANG', 'Eddy Suranta Barus', 'Serta Ginting', 'BTN ALAM RAYA BLOK A NO.4 PERAWANG ', 2147483647, 'Pegawai Swasta', 'IRT', 319, NULL),
('0034212419', 'ABEDNEGO LUMBAN GAOL', 'Tanjung Beringin, 15 Mei 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 4, 'SMPS ST PAULUS SIDIKALANG', 'Mantok LumbanGaol', 'Nurmaida Pandiangan', 'Tanjung Beringin, Tiga Lingga, Dairi', 2147483647, 'Petani', 'Petani', 274, NULL),
('0034220032', 'EVAN FRIDESWIDE SITOMPUL ', 'Medan, 18 Maret 2003', 'L', 'Kristen Protestan ', 'Anak Kandung', 1, 'SMPS KATOLIK ST PAULUS KUALA KAPUAS ', 'Sahala Sitompul', 'Ratna Tambunan', 'Jalan Keruing Gg 1 no 30 Kel. Selat Tengah, Kec. Selat, Kab. Kapuas, Kalimantan Tengah 73514', 2147483647, 'Pegawai Swasta', 'IRT', 311, NULL),
('0034340874', 'GABRIOS BONA ULI  O', 'Dumai, 10 September 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPN 2 DUMAI', 'Ganda P Aritonang', 'Yurnalis Manurung', 'Jl. Nasional Nomor 102 - Riau', 2147483647, 'Wiraswasta', 'IRT', 316, NULL),
('0034413183', 'CRISTO PARLINDUNGAN TAMPUBOLON', 'Jambi, 15 Maret 2003', 'L', 'Kristen Protestan ', 'Anak Kandung', 1, 'SMPN 1 TUNGKAL ULU ', 'Hisar Berlin Tampubolon', 'Rita Silitonga', 'Jl. Lintas Timur, Desa Taman Raja, Kec. Tungkal Ulu, Kab. Tanjung Jabung Barat, Prov. Jambi', 2147483647, 'Wiraswasta', 'IRT', 303, NULL),
('0034428580', 'IVAN ZEFANYA BAKARA', 'Kota Bumi, 19 Oktober 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 3, 'SMPS ST THOMAS 1 MEDAN', 'Ronal Bakara', 'Meilinda Saragih', 'Jalan Bunga Ncole 14 nomor 124', 2147483647, 'PNS', 'PNS', 326, NULL),
('0034727907', 'THIODAS HENI PAKPAHAN', 'Pakpahan, 30 September 2003', 'P', 'Kristen Protestan', 'Anak Kandung', 1, 'SMPN 1 PANGARIBUAN', 'Marudt Pakpahan', 'Rina wati Hutapea', 'DESA PAKPAHAN, KEC. PANGARIBUAN', 2147483647, 'Wiraswasta', 'Petani', 383, NULL),
('0034870111', 'RIBKA ZONALIA SIMANJUNTAK', 'Medan,11 April 2003', 'P', 'Kristen Protestan', 'Anak Kandung', 1, 'SMPS ST. THOMAS 1 MEDAN', 'Edward Simanjuntak', 'Marta Silaban', 'JL.Bunga Ncole XIV B no 59', 2147483647, 'Pegawai Swasta', 'PNS', 368, NULL),
('0034972562', 'GRACE ROSALINE SIMANJUNTAK', 'Balata, 29 November 2003', 'P', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPS ST MARIA TARUTUNG', 'Dalan Simanjuntak', 'Junita Sijabat', 'Jl. Rangkea Sipagagan. Tarutung', 2147483647, 'PNS', 'IRT', 323, NULL),
('0035023142', 'AGUSTINO P DAMANIK', 'Medan, 17 Agustus 2003', 'L', 'Aliran kepercayaan', 'Anak Kandung', 2, 'SMPN 1 LUMBAN JULU', 'Jaya Damanik', 'Herta Simanjuntak', 'DESA PASAR LUMBANJULU', 2147483647, 'Guru', 'PNS', 280, NULL),
('0035220287', 'RUT YEMIMA SITORUS', 'Sibintatar, 7 Februari 2003', 'P', 'Kristen Protestan', 'Anak Kandung', 3, 'SMPN 2 LUMBANJULU', 'Alm.Julkifli Sitorus', 'Erlina Manik', 'KISARAN, KEC.AIRJOMAN, KAB. ASAHAN', 2147483647, '-', 'Petani', 371, NULL),
('0036137893', 'SONYA A PANJAITAN', 'Medan, 19 September 2003', 'P', 'Kristen Protestan', 'Anak Kandung', 1, 'SMPS ST THOMAS 4 MEDAN', 'Jon Rayafin Panjaitan', 'madelina Purba', 'Jl Stasiun Gg Nangka Marindal 1 Deli Serdang', 2147483647, 'Pegawai Swasta', 'Pegawai Swasta', 376, NULL),
('0036288123', 'MIKAEL KRISTIAN P', 'Medan, 05 September 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 3, 'SMPN 37 Medan', 'Porman Pasaribu', 'Risda Br. Pinem ', 'Jalan Pasar III no. 180, Medan Perjuangan', 2147483647, 'Wiraswasta', 'IRT', 351, NULL),
('0036711740', 'YOANA TABITHA PUTRI SITINJAK', 'Medan, 11 Oktober 2005', 'P', 'Kristen Protestan', 'Anak Kandung', 1, 'SMPS ST THOMAS 1 MEDAN', 'Henry Sitinjak', 'Elyna Simanjuntak', 'Jalan Air Bersih no 124 Medan', 2147483647, 'Pegawai Swasta', 'PNS', 388, NULL),
('0036734978', 'MARCO TOKYO NADEAK', 'Jakarta, 11 Mei 2003', 'L', 'Kristen Katolik', 'Anak Kandung', 1, 'SMPS KRISTEN PENABUR KOTA WISATA', 'Antonius Nadeak', 'Mestika Siringoringo', 'Cluster coatesville Sc7 no.23 Kota wisata, cibubur, Kec. Gunung Putri Kab. Bogor', 2147483647, 'Pelayaran', 'IRT', 344, NULL),
('0037140417', 'GADING MUDA IMMANUEL NABABAN', 'Medan, 25 Maret 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPS ST PAULUS SIDIKALANG', 'Sotarduga Nababan', 'Magdalena Situmeang', 'JL.MAKMUR NO 32 SIDIKALANG,_x000D_\n KAB DAIRI, SUMATERA UTARA', 2147483647, 'PNS', 'PNS', 317, NULL),
('0037829530', 'GABRIEL M C MARPAUNG', 'Simpang IV, 1 Februari 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 1, 'SMPS BONAPASOGIT SEJAHTERA', 'Pinondang Marpaung', 'Resly Siagian', 'Komplek TPL', 2147483647, 'Pegawai Swasta', 'PNS', 315, NULL),
('0037962665', 'RUTH JESSICA DEBORAH OCTAVIA SIMANJUNTAK', 'Batam, 29 Oktober 2003', 'P', 'Kristen Protestan', 'Anak Kandung', 1, 'SMPN 12 BATAM KOTA', 'Sihar Rishad Siamnjuntak', 'Medyana Sirait', 'Legenda Malaka Blk.F4 No.17', 2147483647, 'Pegawai Swasta', 'IRT', 372, NULL),
('0038431753', 'WILLIAM SIHOMBING', 'Tambunan, 4 Januari 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPS BUDHI DHARMA BALIGE ', 'Wolfram Sihombing', 'Lasrida Tambunan', 'Lumban Gaol Kec. Balige Toba Samosir', 2147483647, 'Wiraswasta', 'PNS', 384, NULL),
('0038431763', 'FEBRI Y SILALAHI', 'Lubuk Pakam, 2 Februari 2003', 'P', 'Kristen Protestan ', 'Anak Kandung', 3, 'SMPN 1 BALIGE', 'Pahala Silalahi', 'Anna Advent Sinaga', 'Desa Baruara', 2147483647, 'Pegawai Swasta', 'Guru', 312, NULL),
('0038431767', 'RAJA FRANCIUS PARSAONGAN PARDEDE', 'Balige, 23 Februari 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 1, 'SMPS BUDHI DHARMA BALIGE ', 'Eduard Pulungan Pardede (alm)', 'Rospita H Barimbing ', 'JL. PATUAN NAGARI NO.40, BALIGE', 2147483647, 'Alm', 'Wiraswasta', 365, NULL),
('0038431791', 'PUTRI NAFRANI LUMBANTOBING', 'Pangururan, 18 April 2003', 'P', 'Kristen Protestan', 'Anak Kandung', 3, 'SMPS BUDHI DHARMA BALIGE ', 'Marudut Lumbantobing ', 'Linda Simbolon', 'JL. PAGAR BATU, GG. NAPITUPULU NO.3,SOPOSURUNG, BALIGE', 2147483647, 'ASN ', 'PNS ', 364, NULL),
('0038431792', 'LAMPITA ULIBASA PANGARIBUAN', 'Balige, 1 Mei 2003', 'P', 'Kristen Protestan', 'Anak Kandung', 4, 'SMPS BUDHI DHARMA BALIGE ', 'Tua Pangaribuan', 'Parulian Simamora', 'Jl.Kartini No 5 Pamatang Raya', 2147483647, 'PNS', 'Wiraswasta', 338, NULL),
('0038431814', 'CHELSEA PANGARIBUAN', 'Laguboti, 18 Juni 2003', 'P', 'Kristen Protestan', 'Anak Kandung', 5, 'SMPS BUDHI DHARMA BALIGE ', 'Marojahan Pangaribuan', 'Martha Hutahaean', 'JL SM RAJA LAGUBOTI', 2147483647, 'Wiraswasta', 'Wiraswasta', 301, NULL),
('0038431869', 'CHRISTIAN YOEL SIAHAAN ', 'Medan, 13 Desember 2003', 'L', 'Kristen Protestan ', 'Anak Kandung', 2, 'SMPS BUDHI DHARMA BALIGE ', 'Martahan Siahaan', 'Eva Mauren', 'Jl. Lumban Ginabean No.13 Kel. Balige I, Balige ', 2147483647, 'PNS', 'PNS', 302, NULL),
('0038536477', 'ISMAIL JOY TIURMAN TAMPUBOLON', 'Bagan Batu, 28 Juni 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 1, 'SMPS YOSEF ARNOLDI', 'Roy Tampubolon', 'Lasmaria Ritonga', 'Komplek Permai No.30', 2147483647, 'Wiraswasta', 'Wiraswasta', 325, NULL),
('0038536492', 'ANGEL OKTAVIA ROMAITO', 'Taganbatu, 15 Oktober 2003', 'P', 'Kristen Protestan', 'Anak Kandung', 3, 'SMPS YOSEF ARNOLDI', 'Walbertus Hasibuan', 'Roselita Marbun', 'Jalan Jendral Sudirman km. 07 Simpang Pujud, Bagan batu, Riau', 2147483647, 'Wiraswasta', 'Wiraswasta', 290, NULL),
('0038653825', 'NAOMI GLORIA SIABARANI', 'Pematangsiantar, 26 April 2003', 'P', 'Kristen Protestan', 'Anak Kandung', 1, 'SMPS SULTAN HASANUDDIN AEK KANOPAN', 'R.T Sibarani', 'S. Pasaribu ', 'Dusun II Damuli Pekan', 2147483647, 'Wiraswasta', 'Dokter Umum', 354, NULL),
('0038815795', 'ANDREAS PURBA', 'Medan, 3 Mei 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPN 12 BATAM KOTA', 'Alexander Purba', 'Regina Bangun', 'Taman Dutamas Jalan Boulevard II No.15 _x000D_\nBatam', 2147483647, 'Wiraswasta', 'IRT', 287, NULL),
('0038816700', 'JAYA PARLUASAN SIMANGUNSONG', 'Sidikalang, 7 Maret 2003', 'L', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPN 1 SIDIKALANG', 'Gabelehon Simngunsong', 'Jonita Siburian', 'Jl. Trikora, Sidikalang', 2147483647, 'Wiraswasta', 'Wiraswasta', 328, NULL),
('0039180147', 'JESSICA ENAPRILIA SIHOTANG', 'Pakpaha, 6 April 2003', 'P', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPN 1 PANGARIBUAN', 'Jhon Marlon Sihotang', 'Hasrninauli Nainggolan', 'Desa Pakpahan, Kec. Pangaribuan', 2147483647, 'PNS', 'PNS', 331, NULL),
('0039594463', 'ANGELIKA SITUNGKIR', 'Tarutung, 5 Oktober 2003', 'P', 'Kristen Protestan', 'Anak Kandung', 1, 'SMPS BUDHI DHARMA BALIGE ', 'Elvin Situngkir', 'Taruli Sihombing', 'JL PIERE TANDEAN, BALIGE', 2147483647, 'PNS', 'PNS', 291, NULL),
('00400072251', 'STELLA JESSIKA SITANGGANG', 'Sidikalang, 9 Mei 2004', 'P', 'Kristen Protestan', 'Anak Kandung', 1, 'SMPN 1 PANGURURAN', 'Darwin Sitanggang', 'Liana Sagala', 'Jl. Simanindo KM 1', 2147483647, 'PNS', 'IRT', 379, NULL),
('0040038911', 'NATHYA GRACE MUNTHE', 'Tigabaru, 28 Februari 2004', 'P', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPS ST LUSIA DOLOKSANGGUL', 'Manat Munthe ', 'Udur Sianturi ', 'Simpang Pearaja Matiti', 2147483647, 'Polri ', 'PNS', 357, NULL),
('0040053097', 'NATANAEL PANJAITAN', 'Pematangsiantar, 27 Februari 2004', 'L', 'Kristen Protestan', 'Anak Kandung', 4, 'SMPS BINTANG TIMUR PEMATANGSIANTAR', 'Dortan Atur Panjaitan ', 'Tiraun Sitorus ', 'Jalan Laguboti no 123  belakang Pematangsiantar', 2147483647, 'Berjualan ', 'IRT', 355, NULL),
('0040072254', 'AGNES YULIA ELISABETH PERDEDE', 'Medan, 6 September 2004', 'P', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPS ST. THOMAS 1 MEDAN', 'Hiro Pingkir Pardede', 'Merry Naibaho', 'Jalan Sejahtera Gang Bahagia NO. 17', 2147483647, 'Pegawai BUMN', 'IRT', 278, NULL),
('0040074072', 'MICHAEL SIHOTANG', 'Medan, 10 Juli 2004', 'L', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPN 18 Medan', 'Risden Sihotang', 'Negrida Simbolon', 'Jl.Mawar IX LK XVII No.161 Helvetia Medan', 2147483647, 'Pegawai Swasta', 'IRT', 349, NULL),
('0040076853', 'MATHEW RALPH VICONANDA SIMANJUNTAK', 'Samarinda, 10 Februari 2004', 'L', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPS ST FRANSISKUS ASISI SAMARINDA', 'Herry J Siamnjuntak', 'Sri M Pardosi', 'Jln. Perjuangan 4 No. 60B_x000D_\nKelurahan Sempaja_x000D_\nSamarinda-75119 ', 2147483647, 'Pegawai Swasta', 'PNS', 348, NULL),
('0040079991', 'JEREMIA PASKAH PUTRA SINAGA', 'Tarutung, 12 April 2004', 'L', 'Kristen Protestan', 'Anak Kandung', 4, 'SMPN 2 TARUTUNG', 'Jusden Sinaga', 'Sri Rejeki Lubis', 'Jl. Bagodjita Parbubu, Tarutung', 2147483647, NULL, NULL, 330, NULL),
('0040079992', 'REYNAYA ANANDA VANIA SITOHANG', 'Tarutung, 15 April 2004', 'P', 'Kristen Protestan', 'Anak Kandung', 3, 'SMPS ST MARIA TARUTUNG', 'Johannes Sitohang', 'Elinda Nababan', 'JL. SISINGAMANGARAJA NO.114 TARUTUNG', 2147483647, 'Wiraswasta', 'Wiraswasta', 367, NULL),
('0040096167', 'ALRIO FRANSISCO HAMONANGAN HUTAPEA', 'Kisaran, 30 April 2004', 'L', 'Kristen Protestan', 'Anak Kandung', 1, 'SMPS METHODIST 2 KISARAN', 'Tumpal Hutapea', 'Eva Duamas Marbun', 'Jl. Sutami no.10_x000D_\nKisaran Barat, Kec.Kota Kisaran Barat, _x000D_\nKAB. ASAHAN_x000D_\nSumatera Utara', 2147483647, 'Pegawai BUMN', 'pns', 284, NULL),
('0040153009', 'MARIO DELON S.', 'Medan, 2 Januari 2004', 'L', 'Kristen Protestan', 'Anak Kandung', 3, 'SMPS ST MARIA MEDAN', 'Anggiat Simanjuntak', 'Herliani Paulina', 'Jalan Turi Ujung Perumahan Residence One Blok A No. 2, Medan', 2147483647, 'Wiraswasta', 'Pedagang', 345, NULL),
('0040171572', 'DENGGAN BASADEO MANALU ', 'Jakarta, 01 Januari 2004', 'L', 'Kristen Protestan ', 'Anak Kandung', 2, 'SMPN 22 KOTA TANGERANG ', 'Ojak Manalu', 'Rotua Sormin', 'Perumahan Taman Elang Blok E No.34 Kec.Periuk Kel.Periuk Kota Tangerang,Banten', 2147483647, 'Pegawai Swasta', 'Guru', 307, NULL),
('0040274802', 'MICHAEL SIMANJUNTAK', 'Pematang Siantar, 25 Januari 2004', 'L', 'Kristen Protestan', 'Anak Kandung', 3, 'SMPS ST THOMAS 1 MEDAN', 'Marolop Siamnjuntak', 'Udur Banjarnahor ', 'Jl. Sei Batugingging N0. 47, Kel. PB Selayang I, Kec. Medan Selayang, Medan', 2147483647, 'Pegawai BUMN ', 'IRT', 350, NULL),
('0040311330', 'EKALMA TOTO ALLOY SEMBIRING ', 'Pancur Batu, 10 Januari 2004', 'L', 'Kristen Protestan ', 'Anak Kandung', 4, 'SMPS ST. THOMAS 1 MEDAN', 'Toimbangen Sembiring', 'Pesta Uli Tarigan', 'Jl. Bakti No. 99 Desa Baru ', 2147483647, 'PNS', 'IRT', 309, NULL),
('0042885538', 'PUTRA AGUNG A.M. SITORUS', 'Medan, 03 Januari 2004', 'L', 'Kristen Katolik', 'Anak Kandung', 3, 'SMPS BUDHI DHARMA BALIGE ', 'Audi Murphy O Sitorus ', 'Riama Lumbantungkup', 'JL. TANDANG BUHIT GG. MELATI NO.3 BALIGE', 2147483647, 'PNS', 'PNS', 362, NULL),
('0045014217', 'MARCELINO SAMUEL SIMARMATA', 'Pematang Siantar, 11 Maret 2004', 'L', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPS YOSEF ARNOLDI', 'Henry Simarmata', 'Rotua Simatupang', 'Jalan Jendral Sudirman no. 149', 2147483647, 'Pedagang', 'Pedagang', 342, NULL),
('0048830270', 'AGATHA ROSAULINA SITANGGANG', 'Air Molek, 5 Oktober 2003', 'P', 'Kristen Protestan', 'Anak Kandung', 2, 'SMPS BUDHI DHARMA BALIGE ', 'Lekson Sitanggang', 'Tiurma Sitohang', 'JL DI PANJAITAN RT 002/001 SEKAR MAWAR AIR MOLEK, INHU, RIAU', 2147483647, 'Berkebun', 'IRT', 277, NULL),
('0049729209', 'NAFIRI CLAUDIA SIAHAAN', 'Sintang, 28 April 2004', 'P', 'Kristen Protestan', 'Anak Kandung', 1, 'SMPN 5 SUNGAI TEBELIAN', 'Arlison Siahaan ', 'Rohanawati Silalahi', 'JALAN SINTANG - NANGA PINOH KM 36 DESA NOBAL KEC.SUNGAI TEBELIAN KAB SINTANG PROVINSI KALIMANTANAN BARAT', 2147483647, 'Swasta', 'Guru ', 353, NULL),
('0058076186', 'MARTIN HALOMOAN TAMBA', 'Serang, Banten, 12 Februari 2005', 'L', 'Kristen Katolik', 'Anak Kandung', 1, 'SMPN 2 DUMAI', 'Maringan A Tamba', 'Paulina Merry', 'JL. SERUNI RATU V NO.3 BUKIT TIMAH KM.7 DUMAI - RIAU', 2147483647, 'TNI-AD', 'IRT', 346, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `siswa_mata_pelajaran`
--

CREATE TABLE `siswa_mata_pelajaran` (
  `id` int(11) NOT NULL,
  `siswa_tahun_ajaran_id` int(11) NOT NULL,
  `mata_pelajaran_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `siswa_tahun_ajaran`
--

CREATE TABLE `siswa_tahun_ajaran` (
  `id` int(11) NOT NULL,
  `nisn_siswa` varchar(255) NOT NULL,
  `tahun_ajaran_semester_id` int(11) NOT NULL
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
(24, 3, 3),
(25, 4, 3);

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
(3, '2019/2020', 'Ganjil', 1),
(4, '2019/2020', 'Genap', 0);

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
(273, 'tohap', 'hLtkdDU-LDuCNV0Q0stHvwPQJtc9pALc', '$2y$13$nrvBfa1V/ZcK1LWG0gfjbOKmVZ98AeF6Go6BZzv/Q1yMYlDQdswaG', NULL, NULL, 'guru', 10, 1, 0, 0),
(274, '0034212419', 'zNIBECJRHLnQruXrIIj9Eg0_nauA3r61', '$2y$13$Jw6D1GNTCf.4.bo7DoY7h.CDy9YN.VActaWCsIDGlyfghIfSWWgj6', NULL, NULL, 'siswa', 10, 1, 0, 0),
(275, '0033895291', 'Y4HXWlei_a7jCMRxSx_wZABWdLlPNTr6', '$2y$13$zNtIL6BgxcYLp5Rg9zEVeev31duCoV2NttmUZDmJzQQnWM43avFfC', NULL, NULL, 'siswa', 10, 1, 0, 0),
(276, 'adrian', '_kMXheuXrADJfz_IM1uXe70zhgruqj8y', '$2y$13$vLJG4LCmkK87w7npROfLnOfiN5VAtrSIIJGXXPjny9zttAhaKzCDK', NULL, NULL, 'guru', 10, 1, 0, 0),
(277, '0048830270', 'oNkzPMD30JYHWiiVFeAbEtVhT8jUWocM', '$2y$13$YeEu4gI6Cth4uuVCyR7KKuGEZialbfyIdIrMKzJxAaW2hZoPPHOmK', NULL, NULL, 'siswa', 10, 1, 0, 0),
(278, '0040072254', 'nq-CdVhLWKtgPbBRjG9M5LBj8pUEbGD0', '$2y$13$ybnQV6ogF4t8T8yWEeskAeMdSIYkPcOJEeZEZNWtNSWf9ATK5D16S', NULL, NULL, 'siswa', 10, 1, 0, 0),
(279, '0030897853', 'crwCUr3iYmNuVkbqSrXkD5Ya7AOi0-Oz', '$2y$13$NXbXbs0vrkS53iQB2GUmFO0EBBI19xQvNlymgI6XXLsfHhPnVuEkq', NULL, NULL, 'siswa', 10, 1, 0, 0),
(280, '0035023142', 'Nv_7lthCJb6vbW49g2tLYKaphHa8OsSg', '$2y$13$SjhENviDd9d6unoAHH0DDuzEbvGvgDJJ7/Nls.n8WxlUJKXVrB84i', NULL, NULL, 'siswa', 10, 1, 0, 0),
(281, '0033055110', 'RejYIeqnSaaFKtqS_cV1vy6sY6gzVrGc', '$2y$13$gEw2rAPdAXObNR4opoFpF.irYL2BwOgYiohEnSz0rlHNqOSBYIzI2', NULL, NULL, 'siswa', 10, 1, 0, 0),
(282, '0031289330', 'ZMH_nEY1G7U5qN2DwQ2HN28RHYu0lYN4', '$2y$13$Q.PW8iiHe5iHi8J7Mjs6t.33GUpGFtaIdPIt4cUCo/HZnywPUSw9i', NULL, NULL, 'siswa', 10, 1, 0, 0),
(283, '0025211319', 'cHNeospfe4CLsMPx8eZgSaG1SXuzFJPG', '$2y$13$W/ZtaQ4/t5oEGd2CVdRlS.486fzdSSsOj9x/Pby8qZQfFWX/ESk8C', NULL, NULL, 'siswa', 10, 1, 0, 0),
(284, '0040096167', 'oVuTmysp_6LMzsN78xnXX7un-qI6fXPu', '$2y$13$VV6w5EvTzB/qkm1SKjlA3unF450JOBoch39uOLbcw78RAf/CfEYs6', NULL, NULL, 'siswa', 10, 1, 0, 0),
(285, '0025431125', '1bY2wjzPhhzGlww5AXCwJEML7ChsYQDP', '$2y$13$LcDJ2na/ZhDkQm5ulpO21.pM3gv7lgEcgRV1VyqQatFrkwX1yNkPi', NULL, NULL, 'siswa', 10, 1, 0, 0),
(286, '0031178939', 'u-lpPLPtPJE_aMhUDOfUBzV9Fh8qDFy7', '$2y$13$8631gsZzMJQQ2kf4CceCguTKWU7gYLPBGJcoyWG5HQaq9eKZ5jX.e', NULL, NULL, 'siswa', 10, 1, 0, 0),
(287, '0038815795', 'cIpPCPEOan-ir1tx9OvSbpWCBMXuKw_1', '$2y$13$ZhXx7AXAWEq58ZQ2X6vKLuUhrfVLCEsOwDcNZbpKxkAkH1uFYUI3S', NULL, NULL, 'siswa', 10, 1, 0, 0),
(288, '0033895299', 'dAbJN4agvA5keIjYxFyDoqCg25ZiCG7e', '$2y$13$u60vQVnfi6iG.KIaaDSUdeqnvM1raEmRCy9EWTZoau9D0r2J7TfQa', NULL, NULL, 'siswa', 10, 1, 0, 0),
(289, '0030954873', 'k0P1A-WzSZqzzAYVpSkZUCgHevbkqCjE', '$2y$13$CiNHqOyO/lfh7bvWM8pTBuoDq19eT/viHNtmf.fUVdd5UsTkngrhu', NULL, NULL, 'siswa', 10, 1, 0, 0),
(290, '0038536492', 'u07-xjwSuAM-hYOsUgXz01gn9PUyI5gp', '$2y$13$.ng2Q6nT.y/naG/76rxBdev/cOfc66BMG0NgvNYvE..55vrPPwdpy', NULL, NULL, 'siswa', 10, 1, 0, 0),
(291, '0039594463', 'D0qeg-r1Fx2YbJ_3FZhfWBGa0MOgd3Fo', '$2y$13$G6QA7bTJvMlnceIEhvIoxOReDKOzbdkaLfaNn6JxMs1vvq8D96s/C', NULL, NULL, 'siswa', 10, 1, 0, 0),
(292, '0030776079', 'K8C_nujHAQ6KTM2fB2POOtc2QQwdzxTs', '$2y$13$Qa6p02trA5TFWNu6dQJJjOzNzD.ULicfKWX0ZBTLWktLCu0sxVzle', NULL, NULL, 'siswa', 10, 1, 0, 0),
(293, '0031671290', 'Ik6S9wgybb5WCEHNMagB5e3z6IdKOGPB', '$2y$13$rrT9Coeh3TTvlbO6.TA0B.kiG8kc0lC4nfz4uUP9wdUuj/Rrho/Ce', NULL, NULL, 'siswa', 10, 1, 0, 0),
(294, '0033248990', 'PxNmmIIvvWaGw0VBmRKkgtGNhKLQzXCA', '$2y$13$SVfrBFqFdt/Jc612rPncx.Yh5bcO//2dD7t0TYzjxgZcE8PtZ5idq', NULL, NULL, 'siswa', 10, 1, 0, 0),
(295, '0033533499', '1ABFRW3iKJ-M50XVtJw2fLrG_ShD1kbU', '$2y$13$lmXSEyDSVUufpJVXd4296udkWEl3Rx.BpZ1xOvd4Qsblmc2Xv23V2', NULL, NULL, 'siswa', 10, 1, 0, 0),
(296, '0030735968', 'LHsqLqoIyiqkTmgk9_Um_7KXzsSZTYvZ', '$2y$13$0wW6OHPoZdzWNyPmA65kYeTA501Qp1VAs33v4aPtUtI0zrsUtZFKm', NULL, NULL, 'siswa', 10, 1, 0, 0),
(297, '0033451143', 'iceCw8oOs0B9Q4AAkAzWl9-rZuHowEeS', '$2y$13$BS.p9IWSqWqNiuKZx8MTY.3V7aWqpUCjgfZSYgDLNkhwY561295D.', NULL, NULL, 'siswa', 10, 1, 0, 0),
(298, '0032699447', 'YxfzlFFKnd26tcvQf9YKkOSr9VtBwaM1', '$2y$13$fIfx0NSOCdkG1ygmDAiQD.exRu34j7iK3ufoY5ZH90sjWSKCoUr6u', NULL, NULL, 'siswa', 10, 1, 0, 0),
(299, '0030912751', 'uzt3MujFc8RLOiDLrkjQOTotDWTJjmm6', '$2y$13$cfVNuDLvv904eNLk.nBCceUP7sxNtbb0bzK/uI8aLrbRjdgT2CLSS', NULL, NULL, 'siswa', 10, 1, 0, 0),
(300, '0030332866', '-lAkRxkYfE163ynUZM3TP97mcKtIDKOa', '$2y$13$ajcEr2nQGpB2zTleUQI73OVv900U1.GRgbexlMJku1B9fwRleAziW', NULL, NULL, 'siswa', 10, 1, 0, 0),
(301, '0038431814', '6SDxBMcbH1XHPfdxoFPQpDI_ZBtGwOkG', '$2y$13$NE7quLTPcFn5Bbk.sJI5N.eZVcN9aKeNMu.1gg8ycvzSgBcI2QcaW', NULL, NULL, 'siswa', 10, 1, 0, 0),
(302, '0038431869', '-ELeQJQLRJ-oDmJiNE-GnMu1R4bLuCQY', '$2y$13$U89mm4YjtpHaANsELqAxaeZDVW4ns5d.ppKPQLxiRe0/v/zL9pm/S', NULL, NULL, 'siswa', 10, 1, 0, 0),
(303, '0034413183', 'mzjeNkgor1jjvu7tBEUbkPYj9a7pvaxe', '$2y$13$eUVMaeYaxEvo5lvwLQQffOe5Hz6hA5UY79waY.aP4XtYsrOsinN.i', NULL, NULL, 'siswa', 10, 1, 0, 0),
(304, '0030954837', 'BuWyu1DJC2u5djHTXveR7ajqEpVbVK2A', '$2y$13$VVKkbMYeLSmU.KdE7CHlpeIG66aDSiar5KmuMgkKWDeyI7AcqKCKa', NULL, NULL, 'siswa', 10, 1, 0, 0),
(305, '0026314091', 'l9F2SYN7UnjsF4TL_wfqGcuikS-glZXc', '$2y$13$3gogux7rdts60KOUIaHTrenF2ggWxdXYvpTaBNtui7kbQkzIPV7tG', NULL, NULL, 'siswa', 10, 1, 0, 0),
(306, '0031332867', 'y5d9rHmF_QDOIgwxEvpuHiyJ4K9me5bU', '$2y$13$XjYYxnCGzZTKeZEPEyugHOE2c7BoGZSZm8YbTkv9c5sA9GSmkKZb6', NULL, NULL, 'siswa', 10, 1, 0, 0),
(307, '0040171572', 'UVN0MOUoHJwWymL-jZNzoxBP0ihvD8XZ', '$2y$13$ar.h3.ZMCWeGkmRcQkoFV.Yb79x4v8wlVYpIHDFlv2Qfzmmq6lVhe', NULL, NULL, 'siswa', 10, 1, 0, 0),
(308, '0033451523', 'KBz7_Q2nU2CRVqk4oLD85EE7rM7n1Sx6', '$2y$13$8gY1wbJe9wF../Tvv1/J6.ZfY6le2C0IQCV8yoeElrA1FpTXMeFDK', NULL, NULL, 'siswa', 10, 1, 0, 0),
(309, '0040311330', 'wWM73VqDo0m1HG8N8I9Yu61yE1qXztBc', '$2y$13$K5DretOgkryNCTL00CB37uagWEA.2f1hT1r/HTwV1B3wGGOlViyvi', NULL, NULL, 'siswa', 10, 1, 0, 0),
(310, '0024658032', 'ZFpVwh8EPrm7gm1GwYP6TrQvsZjcYjFd', '$2y$13$14HaastK7FiZLlK/RY89eOkA9gDnzeptBA3ijdIKFvexEFlsrmDwe', NULL, NULL, 'siswa', 10, 1, 0, 0),
(311, '0034220032', '-lzKsCW_sfiYehDtDTjazgVqnQ7rkxid', '$2y$13$OALmOmejpxzBRmB7vMkdL.J8m1Us5Q4HX49tV1q77oU3V8xfBbNnC', NULL, NULL, 'siswa', 10, 1, 0, 0),
(312, '0038431763', 'IJBwMiNuOewRvQ0i0iaZJzH-tgveO3rD', '$2y$13$ss5TPC6n7kTAFIQoLAN.LeL11Egg0UBodyRtuqAii.fsyF2HUQzFq', NULL, NULL, 'siswa', 10, 1, 0, 0),
(313, '0033712391', '1lWqoOy1ocPFHGP9l6rDTTTXpvgSSXmq', '$2y$13$fApZgcEHiwCdooWB0dSjXeTGFqddUQUxKGiUHnJMEQPgRhjn6i8rS', NULL, NULL, 'siswa', 10, 1, 0, 0),
(314, '0026693963', 'MCWZzq8Xm_TORW-kQA5HhxFzug0ejltc', '$2y$13$NR9mbaiMIv7kKXrksEtrJ.n.1X56dZPv2/fbr14.ExTqZ1gk1g18y', NULL, NULL, 'siswa', 10, 1, 0, 0),
(315, '0037829530', '92dMURwuZcoFLeYilsurXfoo0l87rKVf', '$2y$13$uRjREcysiJ6INrjDPgMp.edr8tZ39g0d48NKgMahEpOxMMrr1tTfq', NULL, NULL, 'siswa', 10, 1, 0, 0),
(316, '0034340874', 'lAF_CbPHPtXBcJI9vV9AbyYq0Bh1Ll_n', '$2y$13$zBUHlTzN1wjuh34Y6U4gYOTRm5mRPdScF6.wKxrdu2GVx14n2nxvS', NULL, NULL, 'siswa', 10, 1, 0, 0),
(317, '0037140417', 'p8enp-7HLrUAvCG_UcnCiE92R6_CBykl', '$2y$13$bugQpt/Z6lZdQTRppif8nOZiazAw8dQO.d.jwCjc6EDnIac/7QNgy', NULL, NULL, 'siswa', 10, 1, 0, 0),
(318, '0033899021', '80GKhiCbWOWqvvh9OxXdgbIEsuOIV8ee', '$2y$13$pEbljl5nbqZUGyffGOzKXOhht8adDuHfCp/WATKqC26EBIxC5in0S', NULL, NULL, 'siswa', 10, 1, 0, 0),
(319, '0034197928', 'jDB1HA8erlgbYzwyshLGbbYSw_iHIlDG', '$2y$13$xN5OQ/U0vmQH6rg/nV9t4./F9pZV.fC9f9z204IkCfXbHKLZ4LHga', NULL, NULL, 'siswa', 10, 1, 0, 0),
(320, '0031332893', '-cCbicoMa4O8fzsbN3dU8i7e2OH139YB', '$2y$13$EtFeDXroa8CQuYntBQf2EeSr6mQRdyURG.I0dvn2KYWIRFJJ7955W', NULL, NULL, 'siswa', 10, 1, 0, 0),
(321, '0031335497', 'm3swwGnXNRg9QzWULQT0PD1DXQDSvAKl', '$2y$13$pvt0bpu1aYgmIKzFevxiH.d/JrB2GN2DVrnVnBGBOt6yH6NMCao8e', NULL, NULL, 'siswa', 10, 1, 0, 0),
(322, '0032811614', 'o-mLA-DZN2LXE2XUFJx4PvWcL5hcewRi', '$2y$13$04U49im7R/N8ObPQ0JqrP.TfqNmHzGWyfa6MRpy9JAfbgFVVFkjsi', NULL, NULL, 'siswa', 10, 1, 0, 0),
(323, '0034972562', 'VWKIX4N5zrSD_9dHYEi_zzTJwbTeopan', '$2y$13$6I6Ahcb581If3gzONAw1/uI5YJr4ICwWdLNz/Hx1OWoXHSIUlHlIm', NULL, NULL, 'siswa', 10, 1, 0, 0),
(324, '0032129405', 'YiH5XQcIaYf4ELp5Kgj6Tv8rsENOGJR2', '$2y$13$TSg09CL17LRdaScW31O4fu4w/7gPFSHIUMwVK.Uss/5ZB0jwpl78e', NULL, NULL, 'siswa', 10, 1, 0, 0),
(325, '0038536477', 'XsTKvbtMmWNpmNlITFIdG3sz2f2m_rPC', '$2y$13$kKpBFIBIinih.1uZ4Je1Eu.GOoIf7MTk9hizN/gSSGjrPsNgri./2', NULL, NULL, 'siswa', 10, 1, 0, 0),
(326, '0034428580', 'kW7IXokcpjj2cXT-pGDDYb8yGvno2jPs', '$2y$13$H9nlk6RIyVP.DvZTxeZ01OZSGUGlLhshS4HVdpTTn22gbZVd/EL.C', NULL, NULL, 'siswa', 10, 1, 0, 0),
(327, '0033899020', 'JfkDL20ln4wmGP4Ras0jik50MunR2NSi', '$2y$13$fAMrHZINHDMlHHRbHmApqeAtWo/5Z0LUjGMnon9U9/rsLbXy4cefO', NULL, NULL, 'siswa', 10, 1, 0, 0),
(328, '0038816700', 'hjwd3egKLIro7HTwwQHvrWClkVXHHWFE', '$2y$13$GM.zl3Xxt5nP16lmQ.LdfO1KJvroLoCcMHugt3kfzeCIPh2P8Mo/y', NULL, NULL, 'siswa', 10, 1, 0, 0),
(329, '0031712625', 'wjz4-D7iLolQzGerkGYCiZ2p0iAwjrmF', '$2y$13$oKpVaj3/S8afBKxKaJJo9uKX4IFUrjrywEl65t/XIgWO3u0INFKjy', NULL, NULL, 'siswa', 10, 1, 0, 0),
(330, '0040079991', 'jUl1q7NzqEXfWveH5k2NXvp1sLSm5qSQ', '$2y$13$sg2hwlbPCG2ghUajdypYguGFpOLNcvvzVl63hvkLSaQ2Lzli0FkoK', NULL, NULL, 'siswa', 10, 1, 0, 0),
(331, '0039180147', '-gu6aRr1gmp8tuPv33ljlGvATKZ2vqZT', '$2y$13$mGY311gUcsI28nudVyQfSuyYhq.TVJt4Wlq0d0xyQ4w7dpqyO.9Ei', NULL, NULL, 'siswa', 10, 1, 0, 0),
(332, '0030675478', 'DwuT09weVMYk8O2LcetKPE4QmU-YZU8_', '$2y$13$4qp2oGsuX6lPImEy07/q9ewYOmuM4oI.z/6IftA5wCS8XtJ9StWr.', NULL, NULL, 'siswa', 10, 1, 0, 0),
(333, '0032438743', 's0MGwcUBZk3TVtulJdbTJ2COv-GH-BfY', '$2y$13$aUhcXmYr3BBhxToNLy.GSOrMSburgOn8N1dBszlmy4xDQiggipOkq', NULL, NULL, 'siswa', 10, 1, 0, 0),
(334, '0030798381', 'vUXx-ln2BYezXiaIsfAUuXCjoI6yZNCu', '$2y$13$8j5K1oFqiPCPgUXBpvVfiej345ff8q2vMarptRhbENR9764F1M/8S', NULL, NULL, 'siswa', 10, 1, 0, 0),
(335, '0032313143', 'CogzetH1O2u38PSVnL9CxxZIkGsfOLr7', '$2y$13$aWv5MKVAU4xlKLWLfrlh8.iN2gN8hJ9TdSYGyDcQr2QoonBoepE6S', NULL, NULL, 'siswa', 10, 1, 0, 0),
(336, '0030953343', '7CSchWN2k84o4NcNVBN-zJYyO3Q-dv86', '$2y$13$s0KAq6rvPo.Zqy8tQCm.pu4X81Z1.pNEzIX1ORPn7jkQWrTpAe9Bm', NULL, NULL, 'siswa', 10, 1, 0, 0),
(337, '0031272384', 'X_TnJ2tnPoB89xWL1oiJg0xc_KHfrPl8', '$2y$13$FDsqTQcwXKPO.2ZPwlraR.KmdVzqs985bTf5Mvj9s33tRgAKZ1CLS', NULL, NULL, 'siswa', 10, 1, 0, 0),
(338, '0038431792', 'GM7kzSWagsur_2VbpO6Kx9yNhrF0pGOY', '$2y$13$u/T0fz9TQEotf2.bwvCsE.NPAmIdWEbDMo0RKigrbsnZHJKHfwmvm', NULL, NULL, 'siswa', 10, 1, 0, 0),
(339, '0030675438', 'wU9BPeCFKVkohO026wda4gS2v9jASMi-', '$2y$13$Bzkc.FbGb9hxpA8dDf9ZJOml44SNFvIuBaQXv79YdFlW7SDx1OLzq', NULL, NULL, 'siswa', 10, 1, 0, 0),
(340, '0031098225', 'ze6TOjuqLyg4LRDkShJajUyOy8QDK9_r', '$2y$13$4z4BX07df8F.CWmWZhW0SOrLwPSEcu7fghayajoLVcpwG50sbQY.u', NULL, NULL, 'siswa', 10, 1, 0, 0),
(341, '0032455943', 'lotMiOXl7yWpvvFEROlwgdNrmsOmNifT', '$2y$13$pbj6Uj3y78siIzw8N42xm.WB1YJnGKqHG1Ej3XmliVZBS64xwNT7W', NULL, NULL, 'siswa', 10, 1, 0, 0),
(342, '0045014217', 'AYylXNvQt1-hqJ6mAogkQqnAyJdPwrS6', '$2y$13$scth1R2VR6T9BvwHswDFJe0oN5q6yf.x9viRkhvkNItTT0k9xjlwK', NULL, NULL, 'siswa', 10, 1, 0, 0),
(343, '0030750744', 'xXtidc3znT6v3sHaOO7janAcVCdgFhXo', '$2y$13$wWgEsYxP6KZwQO6xpg7mWuQ.KmUoIOFeEECULiKTLBbHRZelRFwEK', NULL, NULL, 'siswa', 10, 1, 0, 0),
(344, '0036734978', 'MNhh2TeR4487AOhr7ONGLloHtFRFnqBV', '$2y$13$cEX3QIvMuKrWscVmv0N8e.oLwNNWUembEuHAxuefR/vdS5U7JlCkC', NULL, NULL, 'siswa', 10, 1, 0, 0),
(345, '0040153009', 'cM-DrsxWOhZ3LhuQpPeZtYZYDXyadcaF', '$2y$13$Pw4WCgXcciCnVz5Q7CRS..WI5rMaAEYPjib8g9sN.zMeo9jLdhdMW', NULL, NULL, 'siswa', 10, 1, 0, 0),
(346, '0058076186', 'FG4-1E9gdM7A62S-pBIie_XSqo4gPXYL', '$2y$13$IUWOsvsZWn1zlikuTJe4POIW0akodK4Z6ZW9B6qcXkaQCkReZMoMG', NULL, NULL, 'siswa', 10, 1, 0, 0),
(347, '0032252504', '3xuFMvNE4BqUiBD69YW8nDnZerCNWWxh', '$2y$13$U6konxD51L6pPX1B/GSOPuviHoRQUYQwlyNUcrarAvhH8jBsq8rvS', NULL, NULL, 'siswa', 10, 1, 0, 0),
(348, '0040076853', '3MnTkP4mdfYnRCTncq9AJ30iipha-tM1', '$2y$13$vQcAAgtW4sRXl4McsTuGCe83FX0WODDwKFdvX8Y07FOGfWhwSkP8C', NULL, NULL, 'siswa', 10, 1, 0, 0),
(349, '0040074072', 'VKEA0Rn-nn3F8FjO5m1Cyfky3NbSz5Bb', '$2y$13$GNkbfp1grmNW2Qv8tq7sIuX4K6hQ4bOdc8ZgOwZxpxxJgmVrB3fzK', NULL, NULL, 'siswa', 10, 1, 0, 0),
(350, '0040274802', '0pwyBCKYbMPU3HqTbcq7ZX0RLGGUA_Z9', '$2y$13$k8soaNweBwDsYMpeKSVU9OShKGjN007XvZh/EBA6iYN.b0zaZTS8C', NULL, NULL, 'siswa', 10, 1, 0, 0),
(351, '0036288123', '78o-A02MpanKxGEb0IxI3TSMxNd_7O6e', '$2y$13$2/Rm4wSnTXZB9J7ZkM5HyuAESom7QuMQqu1uGTgc0otGmafWFG5ZO', NULL, NULL, 'siswa', 10, 1, 0, 0),
(352, '0031445165', '8dQtorq7bJIZC-4_ckHisUlSPieeDxzL', '$2y$13$vmNsTK0Gh/633x12CutJhOsaSuPGA/bMVRfXqgIA4H7nQzTl.5HQy', NULL, NULL, 'siswa', 10, 1, 0, 0),
(353, '0049729209', 'vg8WZHTIZpnOxmhO8LM0ybkjsytA-wrT', '$2y$13$xehzz3mg28jDL5NPTbSlLOIMAArnIJcCUsUp5e5vyj78mFsUm52Ui', NULL, NULL, 'siswa', 10, 1, 0, 0),
(354, '0038653825', '6gzCxpP2wdEEooGkf-bxrsz11IbjRplj', '$2y$13$BOGkcYya3FTEkNC/e2iaFeGQVjniz.OCmn333ERv86RtB7SxmLlzi', NULL, NULL, 'siswa', 10, 1, 0, 0),
(355, '0040053097', 'GtiGZ8cI9WRCxxQ_4RUpm01p8kBN8ma7', '$2y$13$MkXzXfV0E4Wsi2ai5L.cmuP9BvyoQfU1G.udOesoKi9yxTV5a50za', NULL, NULL, 'siswa', 10, 1, 0, 0),
(356, '0031272529', 'gxhRiSDEECZa3klj6O1JrFLULCx5W533', '$2y$13$u2qFoRTDcdULT3eWrM4sn.lHqlSZUwVO1pDrp8ZianoEGESH/FkuW', NULL, NULL, 'siswa', 10, 1, 0, 0),
(357, '0040038911', 'ZjYZ_3fdHcowHxUfZ-6r4F-PphYWSImo', '$2y$13$yicCyC8YIlvM/zJ42kab1e71gSmXCqWma1wkRsP0VTPJkR6UiItLe', NULL, NULL, 'siswa', 10, 1, 0, 0),
(358, '0026658022', 'mKQmR3ciTuBsNjtT9OUure2k-htpnXJj', '$2y$13$lbUi05BYcOosskGaAEWyLOUKSG3f5uvRP.x6Yoz4ZxDCbf/63WNXe', NULL, NULL, 'siswa', 10, 1, 0, 0),
(359, '0030831850', 'u-WIJlXfhQPs5rTav0CEFUvncqCTh1o0', '$2y$13$iy5mGLZjlfR/NIzSz7Mvm.ZViRO4fFlEy7QVk/RlFtaA3295MtJDW', NULL, NULL, 'siswa', 10, 1, 0, 0),
(360, '0033350259', 'IedplaoIRuiANvpsGZAfWmf40TdR24jF', '$2y$13$Vg3EStRFyxfA7JElotwGlO.VC6R8kuhhnYGxqM5rcfcyzKe.MZT2u', NULL, NULL, 'siswa', 10, 1, 0, 0),
(361, '0033256789', 'qhW4xdIHEg2wR7Ln3O7ejqSm8rUfyYq-', '$2y$13$T8E9cj2mgX5fHliYpTnWyuAvWYTMIjUsjblSP/YPO3yILAvGHoi4K', NULL, NULL, 'siswa', 10, 1, 0, 0),
(362, '0042885538', 'fjG_g9SoroVzrxJHpKrIzpZljNwUmuu_', '$2y$13$vCnM34/NJx2uxHn30gorMeabYOmpyTzELLIkTZHIdiqJJxRma3UpW', NULL, NULL, 'siswa', 10, 1, 0, 0),
(363, '0031272472', 't_Yj5OLnRvWpzr9XgB5MAQuYxUlwAkge', '$2y$13$1EZ77N7r11Y/uhN9aQGPWe90VWr.FfZ8ygEiLtbEyi.nLR7n3TTLm', NULL, NULL, 'siswa', 10, 1, 0, 0),
(364, '0038431791', 'vIX-eVuMhu5R2Z7nQ3wN1aQfeGKIIM7q', '$2y$13$ge13Gdfk0KqO5mtBl7BrAuorbVfH19jp9So3lM55QJgIkuUBiwX7W', NULL, NULL, 'siswa', 10, 1, 0, 0),
(365, '0038431767', 'vYqxjUETUZyKuRjqbNs7nwIOeyapIe1_', '$2y$13$cHQGa15I/ljB3NIz/98EIeVV2jtR4eC49Xk9qZVpBEkTIjIgs.xP.', NULL, NULL, 'siswa', 10, 1, 0, 0),
(366, '0028430554', 'TBwQXrURiT5DXEpyoUsgkNRYdQ2WXaOm', '$2y$13$c7yKgdgxKJWnfTQaijsT4ukIy018/9k.Bvj2PYWvCIar2OR2zq3FW', NULL, NULL, 'siswa', 10, 1, 0, 0),
(367, '0040079992', 'DmBw8dYWV6pPBDDNY2xlnoAvgfacNqt7', '$2y$13$2b.DVHAM8LG.TFPsBI4i9eKxhYz69a5fx4vJtz6e7GY7oQsoyKkCy', NULL, NULL, 'siswa', 10, 1, 0, 0),
(368, '0034870111', 'e1DnXS70qO-mTwjD5pCyIAyn2SQrtpeB', '$2y$13$jhinqnXS2xxl5miCxBKyj.tCanqVdmF8T2Z5M6rL/3x/x2fNhz.im', NULL, NULL, 'siswa', 10, 1, 0, 0),
(369, '0030554799', 'T68zvDsSDJH23-CPjL7pWtBhcvQPy7HJ', '$2y$13$pZh.d.zXu7YUrYEJY6.88uA6bZjC4mNOwuQSwEb.QSZaitX27LRzC', NULL, NULL, 'siswa', 10, 1, 0, 0),
(370, '0030736194', 'oJiJQapTHP_OYoG3VoFBRk4lB7JQsdCc', '$2y$13$wpvryS/vP4zqD53BXqDIGOuCs5I0kfL50XV/o.0AGq1F/TOQ1wWI.', NULL, NULL, 'siswa', 10, 1, 0, 0),
(371, '0035220287', 'OkRsAhHCBN4aoDHOsEtW7CjvVdj_1yI7', '$2y$13$7nIGQITogIBfv4RcPf58HOLiTk5EhYDTCDe6suS/FgQO6RcAF4xq.', NULL, NULL, 'siswa', 10, 1, 0, 0),
(372, '0037962665', 'FxhYJRmz0rUFwmHWdI2KV_AfLE1_tNOw', '$2y$13$aoK6gNZNOWwYMIaLpsBj3e8K7gr/28mXwjHfbKNj6pRwipUwOBYmW', NULL, NULL, 'siswa', 10, 1, 0, 0),
(373, '0030798345', 'ceB5ZJuTHGNwbM7QhBt5VIqEjJB92ic1', '$2y$13$wjpdXBOc642G2tJmxN.jw.5FIg7eQezA6LA9FfnZcKNdZqK5JHZiu', NULL, NULL, 'siswa', 10, 1, 0, 0),
(374, '0028033979', 'bBrwvRlsoEvVuGxajX8C_bz02tne8D_h', '$2y$13$eqXLifD3udic7tsRg.hoIeBju9Nu96wF8uSolh4B97bG22NmvboGW', NULL, NULL, 'siswa', 10, 1, 0, 0),
(375, '0031272396', 'p9KSszdwifFMG9H2r2t7NkyUcXDzbAZC', '$2y$13$AVJ4LGuSiPZiDoy/OsAenefY9julaly1g1lHjcQJA5BEHioQOFd/2', NULL, NULL, 'siswa', 10, 1, 0, 0),
(376, '0036137893', 'm-uJu2hzOTO5j-LfOH_fHUsF2BJj9Q5r', '$2y$13$Qhlo2CwxJ6a.qm9qMxlwtuvXtfQX0GKbN1c5/emq1V2jltVlzKdbu', NULL, NULL, 'siswa', 10, 1, 0, 0),
(377, '0024332002', 'OyUZKZcE3aomXJyEz3SON56rgR4-3Yqk', '$2y$13$4umt8wGnvlVblOexNPLYHemBd.Y1oTnV0UtRkHAUQifxBgRnUeraW', NULL, NULL, 'siswa', 10, 1, 0, 0),
(378, '0032292136', 'texEyzQFxSOV_-LX6KHVLisrdE8bL41J', '$2y$13$q6ivZthusqVu6PsZy87YPu3sL9sJA9zBNfjYkE8Fym3VxhkwT.adC', NULL, NULL, 'siswa', 10, 1, 0, 0),
(379, '00400072251', 'wesvMk-_8Z51mNkd7XNd27iAwmsXGLUP', '$2y$13$M.FHJu0IBpSkGMmqSGdVCeImSxr0y.G7nqygCq5gK63TJ65y6f5zq', NULL, NULL, 'siswa', 10, 1, 0, 0),
(380, '0033807884', 'LcehFOIrkn43hvHvhc9L5zDPQTwuuRvN', '$2y$13$8TGCGGJ3IPjIxFok8SIS1e8JDtdsnevEKaNF2Q3bG564R2uQRQEoO', NULL, NULL, 'siswa', 10, 1, 0, 0),
(381, '0030735934', '9h2wAwggPnvJBoTPsaHfBzzuS8R4K9Rx', '$2y$13$Ydp8qoQXyz2tgvsmQl7.lOnKAMbShd3jcdOX4rzfVoAtcFjyksmLq', NULL, NULL, 'siswa', 10, 1, 0, 0),
(382, '0030678576', 'k04vM6iplYoV7xHgzqggKFW7TtUZZrlJ', '$2y$13$wcMBXBv3fW8sKGaoswrv2ua0mRKR5UqxwinoVucQiRVCNAyYJnZkO', NULL, NULL, 'siswa', 10, 1, 0, 0),
(383, '0034727907', 'HEZJ-eiPv4rL5yMXVrfqcQQUBNJz8trW', '$2y$13$6fKH9tY8clolh3oXCykR0eYJlGrE82N5oGBC1Z6xN.6LlmpOuGZ76', NULL, NULL, 'siswa', 10, 1, 0, 0),
(384, '0038431753', 'wkK5pI-AlKXhcdzs7Aqomq-b3wYBJBYa', '$2y$13$aYDOOKqKvWz9VY2IF.IWEuNdmE/j.7dFkNJCC6Htr0oivgBZWlMPu', NULL, NULL, 'siswa', 10, 1, 0, 0),
(385, '0033714094', 'wRwKuj7BhWvfPh4S8Xk58Zvr6rvLyA5_', '$2y$13$Qze3Q0pn40R3w/uun5aise3kdE9ulnpW7fyK/Lggl2z.I1DWaosmC', NULL, NULL, 'siswa', 10, 1, 0, 0),
(386, '0025318025', 'yT3Bpq0sJ2hCWZ_E2jZuGvCNEaWRVib3', '$2y$13$8fu97armBYWma7pMHrQ5EeENdbpnEO6e4D3VV238QsvamKb/Q1lYW', NULL, NULL, 'siswa', 10, 1, 0, 0),
(387, '0030618605', 'V_Qd-Q4kjiaFNpesQ51RnAUsphwZU22C', '$2y$13$46jqJ9vbtgmkRwlEYahnRuZVSg3I7W14MDZ5wMIDPgHqq7xigDqG2', NULL, NULL, 'siswa', 10, 1, 0, 0),
(388, '0036711740', 'GVfhrQkrSIlW8yyLn7jdXTjN2kxIbOF_', '$2y$13$WVtE9lpHYmiSft2URX5FzO6HzshlYp.WWuAC0vg33VwyXu7LdhfOy', NULL, NULL, 'siswa', 10, 1, 0, 0),
(389, '0024612736', '3AgeoOrFti3gnk8AgozdC59ScgeNCPfo', '$2y$13$5pPY7zH7tTSXzTKasN643.17fJVR7eL3e/eqyKlbbcCk1sT7zNVee', NULL, NULL, 'siswa', 10, 1, 0, 0),
(390, '0032633143', 'xV6Gy9VvLuoOmhvI97dyIQ_6FqCUvFjn', '$2y$13$6uFH6hWpK13upxjHqKGb2eu3b2PBQ1uz0ZyzyO/068d1ZLPgxOPeq', NULL, NULL, 'siswa', 10, 1, 0, 0),
(391, '0033510883', 'fhrmfU_Y-hqevsVjVlyV0UcUSmzeJkH_', '$2y$13$69sDCh6.Uskp03R6k2ROVec118CtxgL4GbKT5BovyIXIYVu9RXBjm', NULL, NULL, 'siswa', 10, 1, 0, 0),
(392, '0026368536', 'Ju9VBGDaPUSad9ikhFuIexFy1p4s81tH', '$2y$13$qFw9MFQEGei/pMBemNt7F.43Yg8r1ZYBvmYzztpwYKGg7L3kEbfDO', NULL, NULL, 'siswa', 10, 1, 0, 0);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `siswa_mata_pelajaran`
--
ALTER TABLE `siswa_mata_pelajaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswa_tahun_ajaran` (`siswa_tahun_ajaran_id`),
  ADD KEY `mata_pelajaran` (`mata_pelajaran_id`),
  ADD KEY `kelas_r` (`kelas_id`);

--
-- Indexes for table `siswa_tahun_ajaran`
--
ALTER TABLE `siswa_tahun_ajaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nisn_siswa` (`nisn_siswa`),
  ADD KEY `tahun_ajaran` (`tahun_ajaran_semester_id`);

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
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelas_mata_pelajaran`
--
ALTER TABLE `kelas_mata_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas_r`
--
ALTER TABLE `kelas_r`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mata_pelajaran_r`
--
ALTER TABLE `mata_pelajaran_r`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa_mata_pelajaran`
--
ALTER TABLE `siswa_mata_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa_tahun_ajaran`
--
ALTER TABLE `siswa_tahun_ajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tahun_ajaran_kelas`
--
ALTER TABLE `tahun_ajaran_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tahun_ajaran_semester`
--
ALTER TABLE `tahun_ajaran_semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=393;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `kelas_mata_pelajaran`
--
ALTER TABLE `kelas_mata_pelajaran`
  ADD CONSTRAINT `mata_pelajaran_id` FOREIGN KEY (`mata_pelajaran_id`) REFERENCES `mata_pelajaran_r` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tahun_ajaran_kelas` FOREIGN KEY (`tahun_ajaran_kelas_id`) REFERENCES `tahun_ajaran_kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `siswa_mata_pelajaran`
--
ALTER TABLE `siswa_mata_pelajaran`
  ADD CONSTRAINT `kelas_r` FOREIGN KEY (`kelas_id`) REFERENCES `kelas_r` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mata_pelajaran` FOREIGN KEY (`mata_pelajaran_id`) REFERENCES `mata_pelajaran_r` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_tahun_ajaran` FOREIGN KEY (`siswa_tahun_ajaran_id`) REFERENCES `siswa_tahun_ajaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa_tahun_ajaran`
--
ALTER TABLE `siswa_tahun_ajaran`
  ADD CONSTRAINT `nisn_siswa` FOREIGN KEY (`nisn_siswa`) REFERENCES `siswa` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tahun_ajaran` FOREIGN KEY (`tahun_ajaran_semester_id`) REFERENCES `tahun_ajaran_semester` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
