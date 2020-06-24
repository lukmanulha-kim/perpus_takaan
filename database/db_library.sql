-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2020 at 04:24 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_library`
--
CREATE DATABASE IF NOT EXISTS `db_library` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_library`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE IF NOT EXISTS `tb_buku` (
  `id_buku` int(11) NOT NULL AUTO_INCREMENT,
  `no_referensi` int(11) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `volume_jilid` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `kondisi` enum('Baik','Rusak','Hilang') NOT NULL DEFAULT 'Baik',
  PRIMARY KEY (`id_buku`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `no_referensi`, `pengarang`, `judul_buku`, `volume_jilid`, `jumlah`, `harga`, `kondisi`) VALUES
(1, 1, 'A. Athaillah', 'Rashid Ridha, Konsep Teologi Rasional dalam Tafsir Al-Manar', 0, 1, 50000, 'Hilang'),
(2, 2, 'Emir', 'Juz ''Amma.Teks, Transliterasi & Terjemah', 0, 1, 50000, 'Hilang'),
(3, 3, 'Mulyadhi Kartanegara', 'Menyelami Lubuk Tasawuf', 0, 1, 50000, 'Rusak'),
(4, 4, 'Dr.N.Faqih Syarief, M.SI', 'Gizi Spritual. Sebuah Motivasi Islami untuk Generasi muslim', 0, 1, 50000, 'Hilang'),
(5, 5, 'Jamal Al-Banna', 'Manifesto Fiqih Baru Memahami Diskursus Al-qur''an', 1, 2, 50000, 'Baik'),
(6, 6, '-', 'Manifesto Fiqih Baru Redefinisi & Reposisi As-sunnah', 2, 1, 50000, 'Baik'),
(7, 7, 'KH.Muhammad Sholikhin', 'Tuntunan Sholat Rasulullah SAW.berdasarkan Hadis-hadis Sahih', 0, 2, 50000, 'Baik'),
(8, 8, 'M.Imdadun Rahmat', 'Arus Baru Islam Radikal', 0, 2, 50000, 'Baik'),
(9, 9, 'Dr.Tsuroya Kiswati', 'Al-Juwaini peletak Dasar Teologi Rasional dalam Islam', 0, 1, 50000, 'Baik'),
(10, 10, 'Jamal Al-Banna', 'Manifesto Fiqih Baru Memahami Paradigma Fiqih moderat', 3, 1, 50000, 'Baik'),
(11, 11, 'Farid Esack', 'On Being A Muslim menjadi Muslim di Dunia', 0, 1, 50000, 'Baik'),
(12, 12, 'Ust.Hadiyatullah, S.Pd.I', 'Juz ''amma untuk Anak', 0, 1, 50000, 'Baik'),
(13, 13, 'Ust. O.Surasman', 'Metode Al-Bayan Cara Cepat Belajar Membaca Al-qur''an', 2, 1, 50000, 'Baik'),
(14, 14, 'HA.Sholeh Dimyathi & Feisal Ghozali', 'PAI XII', 0, 117, 50000, 'Baik'),
(15, 15, 'HA.Sholeh Dimyathi & Feisal Ghozali', 'PAI XII ( Buku Guru 2018 )', 0, 2, 50000, 'Baik'),
(16, 16, 'Yanuardi Syukur', 'Islam is Life', 0, 2, 50000, 'Baik'),
(17, 17, 'M.Rizqi Ilmam Mubarok', 'La Takhaf ( Jangan takut semua akan baik-baik saja )', 0, 2, 50000, 'Baik'),
(18, 18, 'Masykur', 'Mutiara Iman Penggugah Jiwa', 0, 1, 50000, 'Baik'),
(19, 19, 'Muh.Ramli & Abdullah Sa''id', 'Ngeluh? ke Allah Aja !', 0, 2, 50000, 'Rusak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_denda`
--

CREATE TABLE IF NOT EXISTS `tb_denda` (
  `id_denda` int(11) NOT NULL AUTO_INCREMENT,
  `kd_peminjam` int(11) NOT NULL,
  `status_denda` enum('Lunas','Belum Bayar') NOT NULL,
  `kd_pustakawan` int(11) NOT NULL,
  PRIMARY KEY (`id_denda`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_denda`
--

INSERT INTO `tb_denda` (`id_denda`, `kd_peminjam`, `status_denda`, `kd_pustakawan`) VALUES
(1, 1, 'Lunas', 1),
(2, 2, 'Lunas', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE IF NOT EXISTS `tb_guru` (
  `id_guru` int(11) NOT NULL AUTO_INCREMENT,
  `nama_guru` varchar(80) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL DEFAULT 'Aktif',
  PRIMARY KEY (`id_guru`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `nama_guru`, `status`) VALUES
(1, 'FATHOROZI, S.Kom', 'Aktif'),
(2, 'QURRATUL AINIYAH, S.Pd.I', 'Aktif'),
(3, 'AGUS MILAS, S.Pd.I', 'Aktif'),
(4, 'MOCH. HANAFI', 'Aktif'),
(5, 'EKA WAHYUNI, S.Pd', 'Aktif'),
(6, 'NURUL HASANAH, S.Pd.I', 'Aktif'),
(7, 'SRI ASTUTIK RAHAYU, S.Pd.I', 'Aktif'),
(8, 'ACHMAD MUFID FIRDAUZ, S.Pd.I', 'Aktif'),
(9, 'KRISTIAN ADIWINATA, S.Pd', 'Aktif'),
(10, 'DWI MIRNAWATI, S.Pd', 'Aktif'),
(11, 'SITI FATIMAH, S.Pd', 'Aktif'),
(12, 'LUKMAN ARI SANDI, S.Pd', 'Aktif'),
(13, 'ZAINIYATUN, SH', 'Aktif'),
(14, 'KURDI, S.Pd.I', 'Aktif'),
(15, 'AHMAD TAUFIK, S.Pd.I', 'Aktif'),
(16, 'WILDA ALIFA, S.Pd', 'Aktif'),
(17, 'YULI JULLAILAH, S.Sej', 'Aktif'),
(18, 'EKO HERMANSYAH, S.Pd', 'Tidak Aktif'),
(19, 'KHOLIFATUL INAROH', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjam`
--

CREATE TABLE IF NOT EXISTS `tb_peminjam` (
  `id_peminjam` int(11) NOT NULL AUTO_INCREMENT,
  `kd_buku` int(11) NOT NULL,
  `kd_siswa` int(11) NOT NULL,
  `kd_guru` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status_peminjaman` enum('Masih Dipinjam','Dikembalikan','Hilang') NOT NULL DEFAULT 'Masih Dipinjam',
  `tgl_dikembalikan` date NOT NULL,
  `status_pengembalian` enum('Sesuai Tempo','Jatuh Tempo','-') NOT NULL DEFAULT '-',
  `denda` int(11) NOT NULL,
  `kd_pustakawan` int(11) NOT NULL,
  PRIMARY KEY (`id_peminjam`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_peminjam`
--

INSERT INTO `tb_peminjam` (`id_peminjam`, `kd_buku`, `kd_siswa`, `kd_guru`, `tgl_pinjam`, `tgl_kembali`, `status_peminjaman`, `tgl_dikembalikan`, `status_pengembalian`, `denda`, `kd_pustakawan`) VALUES
(1, 6, 0, 1, '2020-06-23', '2020-06-28', 'Hilang', '0000-00-00', '-', 50000, 1),
(2, 18, 4, 0, '2020-06-23', '2020-06-28', 'Hilang', '0000-00-00', '-', 50000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pustakawan`
--

CREATE TABLE IF NOT EXISTS `tb_pustakawan` (
  `id_pustakawan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pustakawan` varchar(85) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(85) NOT NULL,
  `level` enum('Admin','Pustakawan') NOT NULL DEFAULT 'Pustakawan',
  `status_pustakawan` enum('Aktif','Tidak Aktif') NOT NULL,
  PRIMARY KEY (`id_pustakawan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_pustakawan`
--

INSERT INTO `tb_pustakawan` (`id_pustakawan`, `nama_pustakawan`, `username`, `password`, `level`, `status_pustakawan`) VALUES
(1, 'Lukman', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'Aktif'),
(2, 'Fulan', 'fulan', '59ee8bd9e54c300ed35f1ead57cfdcf0', 'Pustakawan', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_settings`
--

CREATE TABLE IF NOT EXISTS `tb_settings` (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
  `nama_perpus` varchar(50) NOT NULL,
  `ketua_perpus` varchar(80) NOT NULL,
  `alamat_perpus` text NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `logo` varchar(25) NOT NULL,
  `durasi_pinjam` int(11) NOT NULL,
  `denda` int(11) NOT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_settings`
--

INSERT INTO `tb_settings` (`id_setting`, `nama_perpus`, `ketua_perpus`, `alamat_perpus`, `kabupaten`, `logo`, `durasi_pinjam`, `denda`) VALUES
(1, 'Bina Ilmu Sejahtera', 'Hakim, S. Pd. I', 'Jl. Desa Kerang, Kerang, Sukosari', 'Bondowoso', 'logo.png', 5, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE IF NOT EXISTS `tb_siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `nama_siswa` varchar(50) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL DEFAULT 'Aktif',
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nama_siswa`, `kelas`, `status`) VALUES
(1, 'Ahmad Baisori Mufid', 'X IPS 1', 'Aktif'),
(2, 'Ahmad Faruk Suhendrik', 'X IPS 1', 'Aktif'),
(3, 'Diyayama', 'X IPS 1', 'Aktif'),
(4, 'Hairullah', 'X IPS 1', 'Aktif'),
(5, 'Nur Fadila', 'X IPS 1', 'Aktif'),
(6, 'Sefira', 'X IPS 1', 'Aktif'),
(7, 'Shohiyatul Islamiyah', 'X IPS 1', 'Aktif'),
(8, 'Siti Aisyah', 'X IPS 1', 'Aktif'),
(9, 'Siti Umayyah Khorunniza', 'X IPS 1', 'Aktif'),
(10, 'Sri Mustifatul Jannah', 'X IPS 1', 'Aktif'),
(11, 'Tolariyanto', 'X IPS 1', 'Tidak Aktif'),
(12, 'Ulfiyatun Hasanah', 'X IPS 1', 'Aktif');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
