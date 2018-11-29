-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29 Nov 2018 pada 04.04
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kita_server`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'bcc5a4a17e88b5a31d0450dd994cf677');

-- --------------------------------------------------------

--
-- Struktur dari tabel `att_log`
--

CREATE TABLE IF NOT EXISTS `att_log` (
  `sn` varchar(30) NOT NULL,
  `scan_date` datetime NOT NULL,
  `pin` varchar(32) NOT NULL,
  `verifymode` int(11) NOT NULL,
  `inoutmode` int(11) NOT NULL DEFAULT '0',
  `reserved` int(11) NOT NULL DEFAULT '0',
  `word_code` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `att_log`
--

INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES
('1', '2018-05-19 07:30:00', '1', 0, 0, 0, 0),
('2', '2018-05-19 07:30:00', '2', 0, 0, 0, 0),
('3', '2018-05-19 07:30:00', '3', 0, 0, 0, 0),
('4', '2018-05-19 07:30:00', '4', 0, 0, 0, 0),
('5', '2018-05-19 07:30:00', '5', 0, 0, 0, 0),
('1', '2018-05-19 07:30:00', '6', 0, 0, 0, 0),
('2', '2018-05-19 07:30:00', '7', 0, 0, 0, 0),
('3', '2018-05-19 07:30:00', '8', 0, 0, 0, 0),
('4', '2018-05-19 07:30:00', '9', 0, 0, 0, 0),
('5', '2018-05-19 07:30:00', '10', 0, 0, 0, 0),
('1', '2018-05-19 07:30:00', '11', 0, 0, 0, 0),
('2', '2018-05-19 16:30:00', '1', 1, 0, 0, 0),
('3', '2018-05-19 16:30:00', '2', 1, 0, 0, 0),
('4', '2018-05-19 16:30:00', '3', 1, 0, 0, 0),
('5', '2018-05-19 16:30:00', '4', 1, 0, 0, 0),
('1', '2018-05-19 16:30:00', '5', 1, 0, 0, 0),
('2', '2018-05-19 16:30:00', '6', 1, 0, 0, 0),
('3', '2018-05-19 16:30:00', '7', 1, 0, 0, 0),
('4', '2018-05-19 16:30:00', '8', 1, 0, 0, 0),
('5', '2018-05-19 16:30:00', '9', 1, 0, 0, 0),
('1', '2018-05-19 16:30:00', '10', 1, 0, 0, 0),
('2', '2018-05-19 16:30:00', '11', 1, 0, 0, 0),
('1', '2018-05-20 16:00:00', '1', 1, 0, 0, 0),
('2', '2018-05-20 16:00:00', '2', 1, 0, 0, 0),
('3', '2018-05-20 16:00:00', '3', 1, 0, 0, 0),
('4', '2018-05-20 16:00:00', '4', 1, 0, 0, 0),
('5', '2018-05-20 16:00:00', '5', 1, 0, 0, 0),
('1', '2018-05-20 16:00:00', '6', 1, 0, 0, 0),
('2', '2018-05-20 16:00:00', '7', 1, 0, 0, 0),
('3', '2018-05-20 16:00:00', '8', 1, 0, 0, 0),
('4', '2018-05-20 16:00:00', '9', 1, 0, 0, 0),
('5', '2018-05-20 16:00:00', '10', 1, 0, 0, 0),
('2', '2018-05-20 07:00:00', '11', 1, 0, 0, 0),
('1', '2018-05-20 07:00:00', '1', 0, 0, 0, 0),
('2', '2018-05-20 07:00:00', '2', 0, 0, 0, 0),
('3', '2018-05-20 07:00:00', '3', 0, 0, 0, 0),
('4', '2018-05-20 07:00:00', '4', 0, 0, 0, 0),
('5', '2018-05-20 07:00:00', '5', 0, 0, 0, 0),
('1', '2018-05-20 07:00:00', '6', 0, 0, 0, 0),
('2', '2018-05-20 07:00:00', '7', 0, 0, 0, 0),
('3', '2018-05-20 07:00:00', '8', 0, 0, 0, 0),
('4', '2018-05-20 07:00:00', '9', 0, 0, 0, 0),
('5', '2018-05-20 07:00:00', '10', 0, 0, 0, 0),
('2', '2018-05-20 07:00:00', '11', 0, 0, 0, 0),
('1', '2018-05-21 07:00:00', '1', 0, 0, 0, 0),
('2', '2018-05-21 07:00:00', '2', 0, 0, 0, 0),
('3', '2018-05-21 07:00:00', '3', 0, 0, 0, 0),
('4', '2018-05-21 07:00:00', '4', 0, 0, 0, 0),
('5', '2018-05-21 07:00:00', '5', 0, 0, 0, 0),
('1', '2018-05-21 07:00:00', '6', 0, 0, 0, 0),
('2', '2018-05-21 07:00:00', '7', 0, 0, 0, 0),
('3', '2018-05-21 07:00:00', '8', 0, 0, 0, 0),
('4', '2018-05-21 07:00:00', '9', 0, 0, 0, 0),
('5', '2018-05-21 07:00:00', '10', 0, 0, 0, 0),
('2', '2018-05-21 07:00:00', '11', 0, 0, 0, 0),
('1', '2018-05-21 15:00:00', '1', 1, 0, 0, 0),
('2', '2018-05-21 15:00:00', '2', 1, 0, 0, 0),
('3', '2018-05-21 15:00:00', '3', 1, 0, 0, 0),
('4', '2018-05-21 15:00:00', '4', 1, 0, 0, 0),
('5', '2018-05-21 15:00:00', '5', 1, 0, 0, 0),
('1', '2018-05-21 15:00:00', '6', 1, 0, 0, 0),
('2', '2018-05-21 15:00:00', '7', 1, 0, 0, 0),
('3', '2018-05-21 15:00:00', '8', 1, 0, 0, 0),
('4', '2018-05-21 15:00:00', '9', 1, 0, 0, 0),
('5', '2018-05-21 15:00:00', '10', 1, 0, 0, 0),
('2', '2018-05-21 15:00:00', '11', 1, 0, 0, 0),
('1', '2018-05-22 15:30:00', '1', 1, 0, 0, 0),
('2', '2018-05-22 15:30:00', '2', 1, 0, 0, 0),
('3', '2018-05-22 15:30:00', '3', 1, 0, 0, 0),
('4', '2018-05-22 15:30:00', '4', 1, 0, 0, 0),
('5', '2018-05-22 15:30:00', '5', 1, 0, 0, 0),
('1', '2018-05-22 15:30:00', '6', 1, 0, 0, 0),
('2', '2018-05-22 15:30:00', '7', 1, 0, 0, 0),
('3', '2018-05-22 15:30:00', '8', 1, 0, 0, 0),
('4', '2018-05-22 15:30:00', '9', 1, 0, 0, 0),
('5', '2018-05-22 15:30:00', '10', 1, 0, 0, 0),
('2', '2018-05-22 15:30:00', '11', 1, 0, 0, 0),
('1', '2018-05-22 07:30:00', '1', 0, 0, 0, 0),
('2', '2018-05-22 07:30:00', '2', 0, 0, 0, 0),
('3', '2018-05-22 07:30:00', '3', 0, 0, 0, 0),
('4', '2018-05-22 07:30:00', '4', 0, 0, 0, 0),
('5', '2018-05-22 07:30:00', '5', 0, 0, 0, 0),
('1', '2018-05-22 07:30:00', '6', 0, 0, 0, 0),
('2', '2018-05-22 07:30:00', '7', 0, 0, 0, 0),
('3', '2018-05-22 07:30:00', '8', 0, 0, 0, 0),
('4', '2018-05-22 07:30:00', '9', 0, 0, 0, 0),
('5', '2018-05-22 07:30:00', '10', 0, 0, 0, 0),
('2', '2018-05-22 07:30:00', '11', 0, 0, 0, 0),
('1', '2018-05-23 07:30:00', '1', 0, 0, 0, 0),
('2', '2018-05-23 07:30:00', '2', 0, 0, 0, 0),
('3', '2018-05-23 07:30:00', '3', 0, 0, 0, 0),
('4', '2018-05-23 07:30:00', '4', 0, 0, 0, 0),
('5', '2018-05-23 07:30:00', '5', 0, 0, 0, 0),
('1', '2018-05-23 07:30:00', '6', 0, 0, 0, 0),
('2', '2018-05-23 07:30:00', '7', 0, 0, 0, 0),
('3', '2018-05-23 07:30:00', '8', 0, 0, 0, 0),
('4', '2018-05-23 07:30:00', '9', 0, 0, 0, 0),
('5', '2018-05-23 07:30:00', '10', 0, 0, 0, 0),
('2', '2018-05-23 07:30:00', '11', 0, 0, 0, 0),
('1', '2018-05-23 16:30:00', '1', 1, 0, 0, 0),
('2', '2018-05-23 16:30:00', '2', 1, 0, 0, 0),
('3', '2018-05-23 16:30:00', '3', 1, 0, 0, 0),
('4', '2018-05-23 16:30:00', '4', 1, 0, 0, 0),
('5', '2018-05-23 16:30:00', '5', 1, 0, 0, 0),
('1', '2018-05-23 16:30:00', '6', 1, 0, 0, 0),
('2', '2018-05-23 16:30:00', '7', 1, 0, 0, 0),
('3', '2018-05-23 16:30:00', '8', 1, 0, 0, 0),
('4', '2018-05-23 16:30:00', '9', 1, 0, 0, 0),
('5', '2018-05-23 16:30:00', '10', 1, 0, 0, 0),
('2', '2018-05-23 16:30:00', '11', 1, 0, 0, 0),
('MS1', '2018-05-01 07:00:00', '1', 0, 0, 0, 0),
('MS1', '2018-05-01 16:00:00', '1', 1, 0, 0, 0),
('MS1', '2018-05-02 07:30:00', '1', 0, 0, 0, 0),
('MS1', '2018-05-03 16:00:00', '1', 1, 0, 0, 0),
('MS1', '2018-05-04 07:00:00', '1', 0, 0, 0, 0),
('MS1', '2018-05-07 08:03:00', '1', 0, 0, 0, 0),
('MS1', '2018-05-08 16:00:00', '1', 1, 0, 0, 0),
('MS1', '2018-05-09 15:00:00', '1', 1, 0, 0, 0),
('MS1', '2018-05-29 08:15:00', '1', 0, 0, 0, 0),
('MS1', '2018-05-29 15:00:00', '1', 1, 0, 0, 0),
('MS1', '2018-05-24 08:00:00', '5', 0, 0, 0, 0),
('MS1', '2018-05-31 08:00:00', '5', 0, 0, 0, 0),
('MS1', '2018-05-31 07:00:00', '6', 0, 0, 0, 0),
('MS1', '2018-05-31 16:59:00', '5', 1, 0, 0, 0),
('MS1', '2018-05-31 06:00:00', '1', 0, 0, 0, 0),
('MS1', '2018-05-31 08:00:00', '1', 0, 0, 0, 0),
('MS1', '2018-06-01 07:00:00', '1', 0, 0, 0, 0),
('MS1', '2018-06-01 16:40:00', '1', 1, 0, 0, 0),
('MS1', '2018-06-01 07:00:00', '2', 0, 0, 0, 0),
('MS1', '2018-06-01 16:35:00', '2', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `att_log2`
--

CREATE TABLE IF NOT EXISTS `att_log2` (
  `sn` varchar(30) NOT NULL,
  `scan_date` datetime NOT NULL,
  `pin` varchar(32) NOT NULL,
  `verifymode` int(11) NOT NULL,
  `inoutmode` int(11) NOT NULL DEFAULT '0',
  `reserved` int(11) NOT NULL DEFAULT '0',
  `word_code` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `att_log2`
--

INSERT INTO `att_log2` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `reserved`, `word_code`) VALUES
('MS1', '2018-04-24 06:45:00', '8', 0, 0, 0, 0),
('MS1', '2018-04-24 07:00:00', '4', 0, 0, 0, 0),
('MS1', '2018-04-24 07:00:00', '6', 0, 0, 0, 0),
('MS1', '2018-04-24 07:30:00', '10', 0, 0, 0, 0),
('MS1', '2018-04-24 07:32:00', '2', 0, 0, 0, 0),
('MS1', '2018-04-24 08:00:00', '1', 0, 0, 0, 0),
('MS1', '2018-04-24 08:00:00', '11', 0, 0, 0, 0),
('MS1', '2018-04-24 08:10:00', '3', 0, 0, 0, 0),
('MS1', '2018-04-24 09:00:00', '5', 0, 0, 0, 0),
('MS1', '2018-04-24 09:21:00', '9', 0, 0, 0, 0),
('MS1', '2018-04-24 15:00:00', '2', 1, 0, 0, 0),
('MS1', '2018-04-24 16:00:00', '10', 1, 0, 0, 0),
('MS1', '2018-04-24 16:00:00', '8', 1, 0, 0, 0),
('MS1', '2018-04-24 16:02:00', '1', 1, 0, 0, 0),
('MS1', '2018-04-24 16:05:00', '6', 1, 0, 0, 0),
('MS1', '2018-04-24 16:30:00', '3', 1, 0, 0, 0),
('MS1', '2018-04-24 17:00:00', '5', 1, 0, 0, 0),
('MS1', '2018-04-24 18:01:00', '9', 1, 0, 0, 0),
('MS1', '2018-04-25 07:48:00', '2', 0, 0, 0, 0),
('MS1', '2018-04-25 08:43:00', '5', 0, 0, 0, 0),
('MS1', '2018-04-25 16:00:00', '2', 1, 0, 0, 0),
('MS1', '2018-04-25 16:00:00', '5', 1, 0, 0, 0),
('MS1', '2018-04-26 07:30:00', '1', 0, 0, 0, 0),
('MS1', '2018-04-27 16:00:00', '2', 1, 0, 0, 0),
('MS1', '2018-04-28 08:10:00', '2', 0, 0, 0, 0),
('MS1', '2018-04-28 16:16:00', '2', 1, 0, 0, 0),
('MS1', '2018-05-08 07:00:00', '1', 0, 0, 0, 0),
('MS1', '2018-05-08 07:40:00', '5', 0, 0, 0, 0),
('MS1', '2018-05-08 16:00:00', '1', 1, 0, 0, 0),
('MS1', '2018-05-08 16:00:00', '5', 1, 0, 0, 0),
('MS1', '2018-05-09 08:00:00', '5', 0, 0, 0, 0),
('MS1', '2018-05-09 15:00:00', '5', 1, 0, 0, 0),
('MS1', '2018-05-09 16:00:00', '1', 1, 0, 0, 0),
('MS1', '2018-05-10 08:00:00', '5', 0, 0, 0, 0),
('MS1', '2018-05-10 15:30:00', '5', 1, 0, 0, 0),
('MS1', '2018-05-14 08:00:00', '5', 0, 0, 0, 0),
('MS1', '2018-05-18 07:00:00', '5', 0, 0, 0, 0),
('MS1', '2018-05-18 07:30:00', '11', 0, 0, 0, 0),
('MS1', '2018-05-18 08:00:00', '1', 0, 0, 0, 0),
('MS1', '2018-05-18 16:00:00', '1', 1, 0, 0, 0),
('MS1', '2018-05-18 16:30:00', '3', 1, 0, 0, 0),
('MS1', '2018-05-18 16:30:00', '5', 1, 0, 0, 0),
('MS2', '2018-05-18 07:50:00', '3', 0, 0, 0, 0),
('MS3', '2018-04-24 08:21:00', '7', 0, 0, 0, 0),
('MS3', '2018-04-24 15:00:00', '4', 1, 0, 0, 0),
('MS3', '2018-04-27 07:54:00', '2', 0, 0, 0, 0),
('MS4', '2018-04-24 16:34:00', '7', 1, 0, 0, 0),
('MS5', '0000-00-00 00:00:00', '9', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `aturan`
--

CREATE TABLE IF NOT EXISTS `aturan` (
  `jam_masuk` varchar(11) NOT NULL,
  `toleransi` varchar(11) NOT NULL,
  `jam_masuk_set` varchar(11) NOT NULL,
  `jam_pulang` varchar(11) NOT NULL,
  `jam_pulang_jum` varchar(11) NOT NULL,
  `lama_kerja` int(11) NOT NULL,
  `um_max_masuk` time NOT NULL,
  `um_min_pulang` time NOT NULL,
  `periode` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `aturan`
--

INSERT INTO `aturan` (`jam_masuk`, `toleransi`, `jam_masuk_set`, `jam_pulang`, `jam_pulang_jum`, `lama_kerja`, `um_max_masuk`, `um_min_pulang`, `periode`) VALUES
('07:30', '08:00', '07:30', '16:00', '16:30', 450, '00:00:00', '00:00:00', '06/01/2018 - 06/30/2018');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cuti`
--

CREATE TABLE IF NOT EXISTS `cuti` (
  `id_cuti` int(11) NOT NULL,
  `kode_cuti` varchar(11) NOT NULL,
  `pin` varchar(11) NOT NULL,
  `tgl_cuti` date NOT NULL,
  `kategori` varchar(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `cuti`
--

INSERT INTO `cuti` (`id_cuti`, `kode_cuti`, `pin`, `tgl_cuti`, `kategori`, `keterangan`) VALUES
(1, '051420182', '2', '2018-05-14', 'negara', '-\r\n'),
(2, '051420182', '2', '2018-05-15', 'negara', '-\r\n'),
(3, '051420182', '2', '2018-05-16', 'negara', '-\r\n'),
(4, '042320185', '5', '2018-04-23', 'negara', 'Cuti Umum'),
(5, '050120181', '1', '2018-05-01', 'negara', 'Izin Sakit'),
(6, '050120181', '1', '2018-05-02', 'negara', 'Izin Sakit'),
(7, '050120181', '1', '2018-05-03', 'negara', 'Izin Sakit'),
(8, '050420181', '1', '2018-05-04', 'pribadi', 'Liburan Keluarga'),
(9, '050420181', '1', '2018-05-05', 'pribadi', 'Liburan Keluarga'),
(10, '1527699821', '5', '2018-05-25', 'negara', 'Izin Sakit'),
(11, '1527699897', '5', '2018-05-26', 'pribadi', 'Izin Pribadi Keperluan Keluarga'),
(12, '1527699953', '5', '2018-05-28', 'pribadi', 'Izin Pribadi Kepentingan Keluarga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `libur`
--

CREATE TABLE IF NOT EXISTS `libur` (
  `id_libur` int(11) NOT NULL,
  `kode_libur` varchar(11) NOT NULL,
  `keterangan_libur` text NOT NULL,
  `tgl_libur` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `libur`
--

INSERT INTO `libur` (`id_libur`, `kode_libur`, `keterangan_libur`, `tgl_libur`) VALUES
(10, '1526058000', 'Libur Umum', '2018-05-12'),
(11, '1526058000', 'Libur Umum', '2018-05-13'),
(12, '1526662800', 'Libur Umum', '2018-05-19'),
(13, '1526662800', 'Libur Umum', '2018-05-20'),
(14, '1527267600', 'Libur Umum', '2018-05-26'),
(15, '1527267600', 'Libur Umum', '2018-05-27'),
(16, '1527144164', 'Cuti bersama', '2018-05-31'),
(18, '1527145472', 'Libur Hari Merdeka', '2018-06-11'),
(19, '1527145472', 'Libur Hari Merdeka', '2018-06-12'),
(20, '1527145472', 'Libur Hari Merdeka', '2018-06-13'),
(21, '1527145472', 'Libur Hari Merdeka', '2018-06-14'),
(23, '1527149011', 'Libur Umum', '2018-05-05'),
(24, '1527149011', 'Libur Umum', '2018-05-06'),
(25, '1527698646', 'Imlak', '2018-05-14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `pin` varchar(11) NOT NULL,
  `nik` varchar(32) NOT NULL,
  `id_status` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `pin`, `nik`, `id_status`, `nama`) VALUES
(1, '1', '1234578765434590', 2, 'Ahmad.S.E.M.Kom'),
(2, '2', '36456476476875687', 1, 'Fatimah.S.Pd'),
(3, '3', '765476587352745', 1, 'Zainal Arifin'),
(4, '4', '45745786989780', 3, 'Hasan Ali'),
(5, '5', '76543234567843543', 2, 'Jono Wahyono'),
(6, '6', '3456787654567876', 1, 'Irfan Hanafi'),
(7, '7', '876543456787654', 1, 'Wiwit Handayani'),
(8, '8', '34567876545678', 1, 'Fulan Hanafi'),
(9, '9', '234578987654567', 3, 'Sholeh Fuat'),
(10, '10', '897654678987879', 3, 'Heni Rahmawati'),
(11, '11', '4375375476587686', 1, 'Eko W');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id_status` int(11) NOT NULL,
  `kategori` varchar(11) NOT NULL,
  `status` varchar(32) NOT NULL,
  `no_urut` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `kategori`, `status`, `no_urut`) VALUES
(1, 'PNS', 'Dosen', 2),
(2, 'PNS', 'Pegawai', 1),
(3, 'non PNS', 'Pegawai', 3),
(4, 'non PNS', 'Dosen', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE IF NOT EXISTS `tugas` (
  `id_tugas` int(11) NOT NULL,
  `kode_tugas` varchar(11) NOT NULL,
  `pin` varchar(11) NOT NULL,
  `tgl_tugas` date NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `kategori` varchar(11) NOT NULL,
  `tempat` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `kode_tugas`, `pin`, `tgl_tugas`, `keterangan`, `kategori`, `tempat`) VALUES
(10, '051620186', '6', '2018-05-16', 'Kunjungan Pegawai', 'Dalam Kota', 'Kediri'),
(11, '051620186', '6', '2018-05-17', 'Kunjungan Pegawai', 'Dalam Kota', 'Kediri'),
(12, '051620186', '6', '2018-05-18', 'Kunjungan Pegawai', 'Dalam Kota', 'Kediri'),
(20, '051420185', '5', '2018-05-14', 'Pelatihan Pegawai', 'Luar Kota', 'Jakarta'),
(21, '051420185', '5', '2018-05-15', 'Pelatihan Pegawai', 'Luar Kota', 'Jakarta'),
(22, '051420185', '5', '2018-05-16', 'Pelatihan Pegawai', 'Luar Kota', 'Jakarta'),
(24, '042320185', '5', '2018-04-23', 'Pembinaan Pegawai', 'Luar Kota', 'Surabaya'),
(27, '053020181', '1', '2018-05-30', 'Kunjungan Pegawai ke-5', 'Luar Kota', 'Jakarta'),
(28, '053020181', '1', '2018-05-31', 'Kunjungan Pegawai ke-5', 'Luar Kota', 'Jakarta'),
(29, '1527211360', '1', '2018-05-23', 'Seminar', 'Dalam Kota', 'Kediri'),
(30, '1527648937', '1', '2018-05-10', 'Hubungan Kerja', 'Luar Kota', 'Jakarta'),
(31, '1527649031', '1', '2018-05-11', 'Pelatihan Pegawai', 'Dalam Kota', 'Kediri'),
(32, '1527699369', '5', '2018-05-24', 'Penelitian Kinerja', 'Dalam Kota', 'Kediri');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_cuti`
--
CREATE TABLE IF NOT EXISTS `view_cuti` (
`kode_cuti` varchar(11)
,`pin` varchar(11)
,`mulai` date
,`selesai` date
,`keterangan` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_libur`
--
CREATE TABLE IF NOT EXISTS `view_libur` (
`kode_libur` varchar(11)
,`mulai` date
,`selesai` date
,`keterangan_libur` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_tugas`
--
CREATE TABLE IF NOT EXISTS `view_tugas` (
`kode_tugas` varchar(11)
,`pin` varchar(11)
,`mulai` date
,`selesai` date
,`keterangan` varchar(100)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_cuti`
--
DROP TABLE IF EXISTS `view_cuti`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_cuti` AS select `cuti`.`kode_cuti` AS `kode_cuti`,`cuti`.`pin` AS `pin`,min(`cuti`.`tgl_cuti`) AS `mulai`,max(`cuti`.`tgl_cuti`) AS `selesai`,`cuti`.`keterangan` AS `keterangan` from `cuti` group by `cuti`.`kode_cuti`;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_libur`
--
DROP TABLE IF EXISTS `view_libur`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_libur` AS select `libur`.`kode_libur` AS `kode_libur`,min(`libur`.`tgl_libur`) AS `mulai`,max(`libur`.`tgl_libur`) AS `selesai`,`libur`.`keterangan_libur` AS `keterangan_libur` from `libur` group by `libur`.`kode_libur`;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_tugas`
--
DROP TABLE IF EXISTS `view_tugas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_tugas` AS select `tugas`.`kode_tugas` AS `kode_tugas`,`tugas`.`pin` AS `pin`,min(`tugas`.`tgl_tugas`) AS `mulai`,max(`tugas`.`tgl_tugas`) AS `selesai`,`tugas`.`keterangan` AS `keterangan` from `tugas` group by `tugas`.`kode_tugas`;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `att_log`
--
ALTER TABLE `att_log`
  ADD KEY `pin` (`pin`);

--
-- Indexes for table `att_log2`
--
ALTER TABLE `att_log2`
  ADD PRIMARY KEY (`sn`,`scan_date`,`pin`),
  ADD KEY `pin` (`pin`),
  ADD KEY `sn` (`sn`);

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id_cuti`);

--
-- Indexes for table `libur`
--
ALTER TABLE `libur`
  ADD PRIMARY KEY (`id_libur`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `pin` (`pin`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`),
  ADD KEY `id_lokasi` (`tempat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id_cuti` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `libur`
--
ALTER TABLE `libur`
  MODIFY `id_libur` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
