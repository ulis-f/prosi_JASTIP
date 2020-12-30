-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2020 at 01:56 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `titipaja`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idKategori` int(11) NOT NULL,
  `namaKategori` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idKategori`, `namaKategori`) VALUES
(1, 'Fashion'),
(2, 'Toys, Hobby & DIY'),
(3, 'Electronics & media'),
(4, 'Food & Personal Care'),
(5, 'Furniture & Appliances');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `idKecamatan` int(11) NOT NULL,
  `namaKecamatan` varchar(75) NOT NULL,
  `idKota` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`idKecamatan`, `namaKecamatan`, `idKota`) VALUES
(5, 'jatinegara', 5),
(11, 'test', 5),
(12, 'kec', 10),
(31, 'otto', 37),
(32, 'Cidadap', 39),
(33, 'Cihampelas', 39),
(34, 'Wonocolo', 10);

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `idKelurahan` int(11) NOT NULL,
  `namaKelurahan` varchar(75) NOT NULL,
  `idKecamatan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`idKelurahan`, `namaKelurahan`, `idKecamatan`) VALUES
(5, 'bidara cina', 5),
(13, 'kel', 12),
(18, 'test', 11),
(34, 'otto', 31),
(35, 'Ciumbuleuit', 32),
(36, 'Cihampelas', 33),
(37, 'Margorejo', 34);

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `idKota` int(11) NOT NULL,
  `namaKota` varchar(75) NOT NULL,
  `idProvinsi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`idKota`, `namaKota`, `idProvinsi`) VALUES
(5, 'Jakarta', 19),
(10, 'Surabaya', 23),
(12, 'kottest', 24),
(23, 'Houston', 33),
(24, 'Dallas', 33),
(25, 'Los Angeles', 32),
(26, 'Sacramento', 32),
(37, 'otto', 45),
(39, 'Bandung', 46),
(40, 'Paris', 47),
(41, 'Beijing', 48),
(42, 'Shanghai', 49);

-- --------------------------------------------------------

--
-- Table structure for table `negara`
--

CREATE TABLE `negara` (
  `idNegara` int(11) NOT NULL,
  `namaNegara` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `negara`
--

INSERT INTO `negara` (`idNegara`, `namaNegara`) VALUES
(1, 'Indonesia'),
(3, 'United States of America'),
(4, 'France'),
(5, '\r\nNetherlands'),
(6, 'China');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `idUser` int(11) NOT NULL,
  `idNotifikasi` int(11) NOT NULL,
  `namaNotifikasi` varchar(250) NOT NULL,
  `deskripsi` varchar(1500) NOT NULL,
  `statusView` int(1) NOT NULL,
  `dateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`idUser`, `idNotifikasi`, `namaNotifikasi`, `deskripsi`, `statusView`, `dateTime`) VALUES
(29, 721, 'Verifikasi Penitipan Barang(Offer Item)', 'Ada customer yang memesan barang anda dengan nama Topi New York <form action=\"persetujuanTraveller\" method=\"GET\">\r\n					<button  id=\"persetujuanTraveller\" style=\"color:#f3310a;\" class=\"w3-bar-item w3-display-inline  w3-btn\" >Klik di Sini Untuk Persetujuan Penitipan</button>\r\n					<input type=\"hidden\" name=\"namaBarang\" value=\"Topi New York\">\r\n					<input type=\"hidden\" name=\"namaKategori\" value=\"Fashion\">\r\n					<input type=\"hidden\" name=\"hargaDiJual\" value=\"100000\">\r\n					<input type=\"hidden\" name=\"hargaOngkir\" value=\"10000\">\r\n					<input type=\"hidden\" name=\"totalHarga\" value=\"114000\">\r\n					<input type=\"hidden\" name=\"deskripsi\" value=\"Warna Hitam\">\r\n					<input type=\"hidden\" name=\"kotaAwal\" value=\"Bandung\">\r\n					<input type=\"hidden\" name=\"kotaTujuan\" value=\"Paris\">\r\n					<input type=\"hidden\" name=\"gambar\" value=\"topi.jpg\">\r\n					<input type=\"hidden\" name=\"idUser\" value=\"14\">\r\n					</form>', 1, '2020-12-06 10:05:05'),
(14, 722, 'Verifikasi Gagal', ' <form action=\"detailBarangOffer\" method=\"GET\">\r\n			<button  id=\"persetujuanTraveller\" style=\"color:#f3310a;\" class=\"w3-bar-item w3-display-inline  w3-btn\" >Klik di Sini Untuk Menuju Market</button>\r\n			<input type=\"hidden\" name=\"namaBarang\" value=\"Topi New York\">\r\n			<input type=\"hidden\" name=\"id\" value=\"29\">\r\n			</form>', 1, '2020-12-06 10:17:58'),
(14, 723, 'Verifikasi Gagal', ' <form action=\"detailBarangOffer\" method=\"GET\">\r\n			<button  id=\"persetujuanTraveller\" style=\"color:#f3310a;\" class=\"w3-bar-item w3-display-inline  w3-btn\" >Klik di Sini Untuk Menuju Market</button>\r\n			<input type=\"hidden\" name=\"namaBarang\" value=\"Topi New York\">\r\n			<input type=\"hidden\" name=\"id\" value=\"29\">\r\n			</form>', 1, '2020-12-06 10:17:58'),
(14, 724, 'Verifikasi Gagal', ' <form action=\"detailBarangOffer\" method=\"GET\">\r\n			<button  id=\"persetujuanTraveller\" style=\"color:#f3310a;\" class=\"w3-bar-item w3-display-inline  w3-btn\" >Klik di Sini Untuk Menuju Market</button>\r\n			<input type=\"hidden\" name=\"namaBarang\" value=\"Topi New York\">\r\n			<input type=\"hidden\" name=\"id\" value=\"29\">\r\n			</form>', 1, '2020-12-06 10:20:01'),
(14, 725, 'Verifikasi Gagal', ' <form action=\"detailBarangOffer\" method=\"GET\">\r\n			<button  id=\"persetujuanTraveller\" style=\"color:#f3310a;\" class=\"w3-bar-item w3-display-inline  w3-btn\" >Klik di Sini Untuk Menuju Market</button>\r\n			<input type=\"hidden\" name=\"namaBarang\" value=\"Topi New York\">\r\n			<input type=\"hidden\" name=\"id\" value=\"29\">\r\n			</form>', 1, '2020-12-06 10:20:05'),
(14, 726, 'Verifikasi Gagal', ' <form action=\"detailBarangOffer\" method=\"GET\">\r\n			<button  id=\"persetujuanTraveller\" style=\"color:#f3310a;\" class=\"w3-bar-item w3-display-inline  w3-btn\" >Klik di Sini Untuk Menuju Market</button>\r\n			<input type=\"hidden\" name=\"namaBarang\" value=\"Topi New York\">\r\n			<input type=\"hidden\" name=\"id\" value=\"29\">\r\n			</form>', 1, '2020-12-06 10:32:08'),
(14, 727, 'Verifikasi Gagal', ' <form action=\"detailBarangOffer\" method=\"GET\">\r\n			<button  id=\"persetujuanTraveller\" style=\"color:#f3310a;\" class=\"w3-bar-item w3-display-inline  w3-btn\" >Klik di Sini Untuk Menuju Market</button>\r\n			<input type=\"hidden\" name=\"namaBarang\" value=\"Topi New York\">\r\n			<input type=\"hidden\" name=\"id\" value=\"29\">\r\n			</form>', 1, '2020-12-06 10:32:11'),
(14, 728, 'Verifikasi Berhasil', 'Permintaan anda berhasil diterima', 1, '2020-12-06 10:32:21'),
(14, 729, 'Verifikasi Berhasil', 'Permintaan anda berhasil diterima', 1, '2020-12-06 10:32:21'),
(14, 730, 'Verifikasi Berhasil', 'Permintaan anda berhasil diterima', 1, '2020-12-06 10:34:44'),
(14, 731, 'Verifikasi Berhasil', 'Permintaan anda berhasil diterima', 1, '2020-12-06 10:34:44'),
(14, 732, 'Verifikasi Berhasil', 'Permintaan anda berhasil diterima', 1, '2020-12-06 10:37:23'),
(14, 733, 'Verifikasi Berhasil', 'Permintaan anda berhasil diterima', 1, '2020-12-06 10:37:25'),
(14, 734, 'Verifikasi Berhasil', 'Permintaan anda berhasil diterima', 1, '2020-12-06 10:37:28'),
(14, 735, 'Verifikasi Berhasil', 'Permintaan anda berhasil diterima', 1, '2020-12-06 10:37:28'),
(14, 736, 'Verifikasi Berhasil', 'Permintaan anda berhasil diterima', 1, '2020-12-06 10:37:34'),
(14, 737, 'Verifikasi Berhasil', 'Permintaan anda berhasil diterima', 1, '2020-12-06 10:37:34'),
(14, 738, 'Verifikasi Berhasil', 'Permintaan anda berhasil diterima 0\">\r\n					<input type=\"hidden\" name=\"kodeUnik\" value=\"659\">\r\n					</form>', 1, '2020-12-06 11:07:57'),
(14, 739, 'Verifikasi Berhasil', 'Permintaan anda berhasil diterima 0\">\r\n					<input type=\"hidden\" name=\"kodeUnik\" value=\"313\">\r\n					</form>', 1, '2020-12-06 11:07:59'),
(14, 740, 'Verifikasi Berhasil', 'Permintaan anda berhasil diterima 10000\">\r\n					<input type=\"hidden\" name=\"kodeUnik\" value=\"268\">\r\n					</form>', 1, '2020-12-06 11:17:19'),
(14, 741, 'Verifikasi Berhasil', 'Permintaan anda berhasil diterima Topi New York 10000\">\r\n					<input type=\"hidden\" name=\"kodeUnik\" value=\"323\">\r\n					</form>', 1, '2020-12-06 11:18:38'),
(14, 742, 'Verifikasi Berhasil', 'Permintaan anda berhasil diterima Topi New York <form action=\"pembayaranOffer\" method=\"GET\">\r\n					<button  id=\"pembayaranOffer\" style=\"color:#f3310a;\" class=\"w3-bar-item w3-display-inline  w3-btn\" >Klik di Sini Untuk Pembayaran</button>\r\n					<input type=\"hidden\" name=\"namaBarang\" value=\"Topi New York\">\r\n					<input type=\"hidden\" name=\"totalHarga\" value=\"\">\r\n					<input type=\"hidden\" name=\"kotaAwal\" value=\"\">\r\n					<input type=\"hidden\" name=\"kotaTujuan\" value=\"\">\r\n					<input type=\"hidden\" name=\"waktuAwal\" value=\"114000\">\r\n					<input type=\"hidden\" name=\"waktuAkhir\" value=\"Warna Hitam\">\r\n					<input type=\"hidden\" name=\"deskripsi\" value=\"Bandung\">\r\n					<input type=\"hidden\" name=\"tipTraveller\" value=\"Paris\">\r\n					<input type=\"hidden\" name=\"gambar\" value=\"topi.jpg\">\r\n					\r\n					<input type=\"hidden\" name=\"kodeUnik\" value=\"661\">\r\n					</form>', 1, '2020-12-06 11:21:14'),
(14, 743, 'Verifikasi Berhasil', 'Permintaan anda berhasil diterima Topi New York <form action=\"pembayaranOffer\" method=\"GET\">\r\n					<button  id=\"pembayaranOffer\" style=\"color:#f3310a;\" class=\"w3-bar-item w3-display-inline  w3-btn\" >Klik di Sini Untuk Pembayaran</button>\r\n					<input type=\"hidden\" name=\"namaBarang\" value=\"Topi New York\">\r\n					<input type=\"hidden\" name=\"totalHarga\" value=\"\">\r\n					<input type=\"hidden\" name=\"kotaAwal\" value=\"\">\r\n					<input type=\"hidden\" name=\"kotaTujuan\" value=\"\">\r\n					<input type=\"hidden\" name=\"waktuAwal\" value=\"114000\">\r\n					<input type=\"hidden\" name=\"waktuAkhir\" value=\"Warna Hitam\">\r\n					<input type=\"hidden\" name=\"deskripsi\" value=\"Bandung\">\r\n					<input type=\"hidden\" name=\"tipTraveller\" value=\"Paris\">\r\n					<input type=\"hidden\" name=\"gambar\" value=\"topi.jpg\">\r\n					<input type=\"hidden\" name=\"fee\" value=\"119440\">\r\n					<input type=\"hidden\" name=\"kodeUnik\" value=\"910\">\r\n					</form>', 1, '2020-12-06 11:21:58'),
(14, 744, 'Verifikasi Berhasil', 'Permintaan anda berhasil diterima Topi New York <form action=\"pembayaranOffer\" method=\"GET\">\r\n					<button  id=\"pembayaranOffer\" style=\"color:#f3310a;\" class=\"w3-bar-item w3-display-inline  w3-btn\" >Klik di Sini Untuk Pembayaran</button>\r\n					<input type=\"hidden\" name=\"namaBarang\" value=\"Topi New York\">\r\n					<input type=\"hidden\" name=\"totalHarga\" value=\"114000\">\r\n					<input type=\"hidden\" name=\"kotaAwal\" value=\"Bandung\">\r\n					<input type=\"hidden\" name=\"kotaTujuan\" value=\"Paris\">\r\n					<input type=\"hidden\" name=\"waktuAwal\" value=\"\">\r\n					<input type=\"hidden\" name=\"waktuAkhir\" value=\"\">\r\n					<input type=\"hidden\" name=\"deskripsi\" value=\"Warna Hitam\">\r\n					<input type=\"hidden\" name=\"tipTraveller\" value=\"10000\">\r\n					<input type=\"hidden\" name=\"gambar\" value=\"topi.jpg\">\r\n					<input type=\"hidden\" name=\"fee\" value=\"119440\">\r\n					<input type=\"hidden\" name=\"kodeUnik\" value=\"763\">\r\n					</form>', 1, '2020-12-06 11:34:09'),
(14, 745, 'Verifikasi Berhasil', 'Permintaan anda berhasil diterima Topi New York <form action=\"pembayaranOffer\" method=\"GET\">\r\n					<button  id=\"pembayaranOffer\" style=\"color:#f3310a;\" class=\"w3-bar-item w3-display-inline  w3-btn\" >Klik di Sini Untuk Pembayaran</button>\r\n					<input type=\"hidden\" name=\"namaBarang\" value=\"Topi New York\">\r\n					<input type=\"hidden\" name=\"totalHarga\" value=\"114000\">\r\n					<input type=\"hidden\" name=\"hargaBarang\" value=\"100000\">\r\n					<input type=\"hidden\" name=\"kotaAwal\" value=\"Bandung\">\r\n					<input type=\"hidden\" name=\"kotaTujuan\" value=\"Paris\">\r\n					<input type=\"hidden\" name=\"waktuAwal\" value=\"\">\r\n					<input type=\"hidden\" name=\"waktuAkhir\" value=\"\">\r\n					<input type=\"hidden\" name=\"deskripsi\" value=\"Warna Hitam\">\r\n					<input type=\"hidden\" name=\"tipTraveller\" value=\"10000\">\r\n					<input type=\"hidden\" name=\"gambar\" value=\"topi.jpg\">\r\n					<input type=\"hidden\" name=\"fee\" value=\"119440\">\r\n					<input type=\"hidden\" name=\"kodeUnik\" value=\"869\">\r\n					</form>', 1, '2020-12-06 11:37:20'),
(14, 746, 'Verifikasi Berhasil', 'Permintaan anda berhasil diterima Topi New York <form action=\"pembayaranOffer\" method=\"GET\">\r\n					<button  id=\"pembayaranOffer\" style=\"color:#f3310a;\" class=\"w3-bar-item w3-display-inline  w3-btn\" >Klik di Sini Untuk Pembayaran</button>\r\n					<input type=\"hidden\" name=\"namaBarang\" value=\"Topi New York\">\r\n					<input type=\"hidden\" name=\"totalHarga\" value=\"114000\">\r\n					<input type=\"hidden\" name=\"hargaBarang\" value=\"100000\">\r\n					<input type=\"hidden\" name=\"kotaAwal\" value=\"Bandung\">\r\n					<input type=\"hidden\" name=\"kotaTujuan\" value=\"Paris\">\r\n					<input type=\"hidden\" name=\"waktuAwal\" value=\"\">\r\n					<input type=\"hidden\" name=\"waktuAkhir\" value=\"\">\r\n					<input type=\"hidden\" name=\"deskripsi\" value=\"Warna Hitam\">\r\n					<input type=\"hidden\" name=\"tipTraveller\" value=\"10000\">\r\n					<input type=\"hidden\" name=\"gambar\" value=\"topi.jpg\">\r\n					<input type=\"hidden\" name=\"fee\" value=\"119440\">\r\n					<input type=\"hidden\" name=\"kodeUnik\" value=\"570\">\r\n					</form>', 1, '2020-12-06 11:40:43'),
(14, 747, 'Verifikasi Berhasil', 'Permintaan anda berhasil diterima Topi New York <form action=\"pembayaranOffer\" method=\"GET\">\r\n					<button  id=\"pembayaranOffer\" style=\"color:#f3310a;\" class=\"w3-bar-item w3-display-inline  w3-btn\" >Klik di Sini Untuk Pembayaran</button>\r\n					<input type=\"hidden\" name=\"namaBarang\" value=\"Topi New York\">\r\n					<input type=\"hidden\" name=\"totalHarga\" value=\"114000\">\r\n					<input type=\"hidden\" name=\"hargaBarang\" value=\"100000\">\r\n					<input type=\"hidden\" name=\"kotaAwal\" value=\"Bandung\">\r\n					<input type=\"hidden\" name=\"kotaTujuan\" value=\"Paris\">\r\n					<input type=\"hidden\" name=\"waktuAwal\" value=\"\">\r\n					<input type=\"hidden\" name=\"waktuAkhir\" value=\"\">\r\n					<input type=\"hidden\" name=\"deskripsi\" value=\"Warna Hitam\">\r\n					<input type=\"hidden\" name=\"tipTraveller\" value=\"10000\">\r\n					<input type=\"hidden\" name=\"gambar\" value=\"topi.jpg\">\r\n					<input type=\"hidden\" name=\"fee\" value=\"4560\">\r\n					<input type=\"hidden\" name=\"kodeUnik\" value=\"554\">\r\n					</form>', 1, '2020-12-06 11:47:21'),
(14, 748, 'Verifikasi Berhasil', 'Permintaan anda berhasil diterima Topi New York <form action=\"pembayaranOffer\" method=\"GET\">\r\n					<button  id=\"pembayaranOffer\" style=\"color:#f3310a;\" class=\"w3-bar-item w3-display-inline  w3-btn\" >Klik di Sini Untuk Pembayaran</button>\r\n					<input type=\"hidden\" name=\"namaBarang\" value=\"Topi New York\">\r\n					<input type=\"hidden\" name=\"totalHarga\" value=\"114000\">\r\n					<input type=\"hidden\" name=\"hargaBarang\" value=\"100000\">\r\n					<input type=\"hidden\" name=\"kotaAwal\" value=\"Bandung\">\r\n					<input type=\"hidden\" name=\"kotaTujuan\" value=\"Paris\">\r\n					<input type=\"hidden\" name=\"waktuAwal\" value=\"\">\r\n					<input type=\"hidden\" name=\"waktuAkhir\" value=\"\">\r\n					<input type=\"hidden\" name=\"deskripsi\" value=\"Warna Hitam\">\r\n					<input type=\"hidden\" name=\"tipTraveller\" value=\"10000\">\r\n					<input type=\"hidden\" name=\"gambar\" value=\"topi.jpg\">\r\n					<input type=\"hidden\" name=\"fee\" value=\"4000\">\r\n					<input type=\"hidden\" name=\"kodeUnik\" value=\"215\">\r\n					</form>', 1, '2020-12-06 11:48:34'),
(0, 749, 'Verifikasi Berhasil', 'Permintaan anda berhasil diterima Topi New York <form action=\"pembayaranOffer\" method=\"GET\">\r\n					<button  id=\"pembayaranOffer\" style=\"color:#f3310a;\" class=\"w3-bar-item w3-display-inline  w3-btn\" >Klik di Sini Untuk Pembayaran</button>\r\n					<input type=\"hidden\" name=\"namaBarang\" value=\"Topi New York\">\r\n					<input type=\"hidden\" name=\"totalHarga\" value=\"114000\">\r\n					<input type=\"hidden\" name=\"hargaBarang\" value=\"100000\">\r\n					<input type=\"hidden\" name=\"kotaAwal\" value=\"Bandung\">\r\n					<input type=\"hidden\" name=\"kotaTujuan\" value=\"\">\r\n					<input type=\"hidden\" name=\"waktuAwal\" value=\"\">\r\n					<input type=\"hidden\" name=\"waktuAkhir\" value=\"\">\r\n					<input type=\"hidden\" name=\"deskripsi\" value=\"Warna Hitam\">\r\n					<input type=\"hidden\" name=\"tipTraveller\" value=\"\">\r\n					<input type=\"hidden\" name=\"gambar\" value=\"\">\r\n					<input type=\"hidden\" name=\"fee\" value=\"4000\">\r\n					<input type=\"hidden\" name=\"kodeUnik\" value=\"942\">\r\n					</form>', 0, '2020-12-07 21:47:09'),
(0, 750, 'Verifikasi Berhasil', 'Permintaan anda berhasil diterima Topi New York <form action=\"pembayaranOffer\" method=\"GET\">\r\n					<button  id=\"pembayaranOffer\" style=\"color:#f3310a;\" class=\"w3-bar-item w3-display-inline  w3-btn\" >Klik di Sini Untuk Pembayaran</button>\r\n					<input type=\"hidden\" name=\"namaBarang\" value=\"Topi New York\">\r\n					<input type=\"hidden\" name=\"totalHarga\" value=\"114000\">\r\n					<input type=\"hidden\" name=\"hargaBarang\" value=\"100000\">\r\n					<input type=\"hidden\" name=\"kotaAwal\" value=\"Bandung\">\r\n					<input type=\"hidden\" name=\"kotaTujuan\" value=\"\">\r\n					<input type=\"hidden\" name=\"waktuAwal\" value=\"\">\r\n					<input type=\"hidden\" name=\"waktuAkhir\" value=\"\">\r\n					<input type=\"hidden\" name=\"deskripsi\" value=\"Warna Hitam\">\r\n					<input type=\"hidden\" name=\"tipTraveller\" value=\"\">\r\n					<input type=\"hidden\" name=\"gambar\" value=\"\">\r\n					<input type=\"hidden\" name=\"fee\" value=\"4000\">\r\n					<input type=\"hidden\" name=\"kodeUnik\" value=\"205\">\r\n					</form>', 0, '2020-12-07 21:48:33'),
(3, 751, 'Verifikasi Pending', 'Trip anda sedang diproses', 1, '2020-12-08 04:44:44'),
(3, 752, 'Verifikasi Pending', 'Trip anda sedang diproses', 1, '2020-12-08 04:46:20'),
(14, 753, 'Verifikasi Pending', 'Trip anda sedang diproses', 1, '2020-12-08 04:48:45'),
(14, 754, 'Verifikasi Berhasil', 'Trip anda sudah diverifikasi', 1, '2020-12-08 04:48:56'),
(14, 755, 'Verifikasi Pending', 'Offer an Item Anda dengan nama tas jalan sedang diproses', 1, '2020-12-08 04:49:53'),
(14, 756, 'Verifikasi Berhasil', 'Offer an Item Anda dengan nama tas jalan \r\n                telah berhasil disetujui. Sekarang barang anda sudah ada di fitur Market (Offer an Item).', 1, '2020-12-08 04:50:04'),
(14, 757, 'Verifikasi Penitipan Barang(Offer Item)', 'Ada customer yang memesan barang anda dengan nama tas jalan <form action=\"persetujuanTraveller\" method=\"GET\">\r\n					<button  id=\"persetujuanTraveller\" style=\"color:#f3310a;\" class=\"w3-bar-item w3-display-inline  w3-btn\" >Klik di Sini Untuk Persetujuan Penitipan</button>\r\n					<input type=\"hidden\" name=\"namaBarang\" value=\"tas jalan\">\r\n					<input type=\"hidden\" name=\"namaKategori\" value=\"Fashion\">\r\n					<input type=\"hidden\" name=\"hargaDiJual\" value=\"450000\">\r\n					<input type=\"hidden\" name=\"hargaOngkir\" value=\"25000\">\r\n					<input type=\"hidden\" name=\"totalHarga\" value=\"493000\">\r\n					<input type=\"hidden\" name=\"deskripsi\" value=\"tas berwarna hitam \">\r\n					<input type=\"hidden\" name=\"kotaAwal\" value=\"Surabaya\">\r\n					<input type=\"hidden\" name=\"kotaTujuan\" value=\"Paris\">\r\n					<input type=\"hidden\" name=\"gambar\" value=\"tas.jpg\">\r\n					<input type=\"hidden\" name=\"idUser\" value=\"14\">\r\n					</form>', 1, '2020-12-08 04:54:26'),
(14, 758, 'Verifikasi Penitipan Barang(Offer Item)', 'Ada customer yang memesan barang anda dengan nama tas jalan <form action=\"persetujuanTraveller\" method=\"GET\">\r\n					<button  id=\"persetujuanTraveller\" style=\"color:#f3310a;\" class=\"w3-bar-item w3-display-inline  w3-btn\" >Klik di Sini Untuk Persetujuan Penitipan</button>\r\n					<input type=\"hidden\" name=\"namaBarang\" value=\"tas jalan\">\r\n					<input type=\"hidden\" name=\"namaKategori\" value=\"Fashion\">\r\n					<input type=\"hidden\" name=\"hargaDiJual\" value=\"450000\">\r\n					<input type=\"hidden\" name=\"hargaOngkir\" value=\"25000\">\r\n					<input type=\"hidden\" name=\"totalHarga\" value=\"493000\">\r\n					<input type=\"hidden\" name=\"deskripsi\" value=\"tas berwarna hitam \">\r\n					<input type=\"hidden\" name=\"kotaAwal\" value=\"Surabaya\">\r\n					<input type=\"hidden\" name=\"kotaTujuan\" value=\"Paris\">\r\n					<input type=\"hidden\" name=\"gambar\" value=\"tas.jpg\">\r\n					<input type=\"hidden\" name=\"idUser\" value=\"27\">\r\n					</form>', 1, '2020-12-08 04:56:31'),
(27, 759, 'Verifikasi Berhasil', 'Permintaan anda berhasil diterima tas jalan <form action=\"pembayaranOffer\" method=\"GET\">\r\n					<button  id=\"pembayaranOffer\" style=\"color:#f3310a;\" class=\"w3-bar-item w3-display-inline  w3-btn\" >Klik di Sini Untuk Pembayaran</button>\r\n					<input type=\"hidden\" name=\"namaBarang\" value=\"tas jalan\">\r\n					<input type=\"hidden\" name=\"totalHarga\" value=\"493000\">\r\n					<input type=\"hidden\" name=\"hargaBarang\" value=\"450000\">\r\n					<input type=\"hidden\" name=\"kotaAwal\" value=\"Surabaya\">\r\n					<input type=\"hidden\" name=\"kotaTujuan\" value=\"Paris\">\r\n					<input type=\"hidden\" name=\"waktuAwal\" value=\"\">\r\n					<input type=\"hidden\" name=\"waktuAkhir\" value=\"\">\r\n					<input type=\"hidden\" name=\"deskripsi\" value=\"tas berwarna hitam \">\r\n					<input type=\"hidden\" name=\"tipTraveller\" value=\"25000\">\r\n					<input type=\"hidden\" name=\"gambar\" value=\"tas.jpg\">\r\n					<input type=\"hidden\" name=\"fee\" value=\"18000\">\r\n					<input type=\"hidden\" name=\"kodeUnik\" value=\"586\">\r\n					</form>', 1, '2020-12-08 05:00:15'),
(27, 760, 'Verifikasi Berhasil', 'Permintaan anda berhasil diterima tas jalan <form action=\"pembayaranOffer\" method=\"GET\">\r\n					<button  id=\"pembayaranOffer\" style=\"color:#f3310a;\" class=\"w3-bar-item w3-display-inline  w3-btn\" >Klik di Sini Untuk Pembayaran</button>\r\n					<input type=\"hidden\" name=\"namaBarang\" value=\"tas jalan\">\r\n					<input type=\"hidden\" name=\"totalHarga\" value=\"493000\">\r\n					<input type=\"hidden\" name=\"hargaBarang\" value=\"450000\">\r\n					<input type=\"hidden\" name=\"kotaAwal\" value=\"Surabaya\">\r\n					<input type=\"hidden\" name=\"kotaTujuan\" value=\"Paris\">\r\n					<input type=\"hidden\" name=\"waktuAwal\" value=\"\">\r\n					<input type=\"hidden\" name=\"waktuAkhir\" value=\"\">\r\n					<input type=\"hidden\" name=\"deskripsi\" value=\"tas berwarna hitam \">\r\n					<input type=\"hidden\" name=\"tipTraveller\" value=\"25000\">\r\n					<input type=\"hidden\" name=\"gambar\" value=\"tas.jpg\">\r\n					<input type=\"hidden\" name=\"fee\" value=\"18000\">\r\n					<input type=\"hidden\" name=\"kodeUnik\" value=\"401\">\r\n					</form>', 1, '2020-12-08 08:06:34'),
(27, 761, 'Pembayaran Berhasil', 'Cek barang anda di tracking kami', 1, '2020-12-21 12:48:28'),
(27, 762, 'Pembayaran Berhasil', 'Silahkan diproses barang yang akan dibeli', 1, '2020-12-21 12:48:28');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `idUser` int(11) NOT NULL,
  `idTrip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`idUser`, `idTrip`) VALUES
(14, 5),
(27, 7),
(14, 9),
(14, 10),
(3, 11),
(3, 20),
(26, 21),
(27, 22),
(27, 23),
(27, 27),
(27, 27),
(27, 29),
(27, 30),
(27, 31),
(28, 32),
(29, 33),
(27, 34),
(29, 35),
(29, 36),
(14, 39);

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `idProvinsi` int(11) NOT NULL,
  `namaProvinsi` varchar(75) NOT NULL,
  `idNegara` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`idProvinsi`, `namaProvinsi`, `idNegara`) VALUES
(19, 'DKI jakarta', 1),
(23, 'Jawa Tengah', 1),
(24, 'protest', 1),
(27, 'test', 1),
(32, 'California', 3),
(33, 'Texas', 3),
(45, 'otto', 1),
(46, 'Jawa Barat', 1),
(47, 'Prancis', 4),
(48, 'Beijing', 6),
(49, 'Shanghai', 6),
(50, 'Jawa Timur', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idUser1` int(11) NOT NULL,
  `IdTrip` int(11) DEFAULT NULL,
  `idUser2` int(11) DEFAULT NULL,
  `jumlahBarang` int(11) DEFAULT NULL,
  `hargaBarang` int(11) DEFAULT NULL,
  `hargaOngkir` int(11) DEFAULT NULL,
  `hargaJasa` int(11) DEFAULT NULL,
  `namaBarang` varchar(75) DEFAULT NULL,
  `statusBarang` varchar(75) DEFAULT NULL,
  `deskripsiBarang` varchar(225) DEFAULT NULL,
  `gambarBarang` varchar(75) DEFAULT NULL,
  `noresi` varchar(75) DEFAULT NULL,
  `idKategori` int(11) DEFAULT NULL,
  `buktiPembayaran` varchar(75) DEFAULT NULL,
  `kodeUnik` varchar(15) DEFAULT NULL,
  `statusPembayaran` varchar(15) DEFAULT NULL,
  `namaBankPembayaran` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idUser1`, `IdTrip`, `idUser2`, `jumlahBarang`, `hargaBarang`, `hargaOngkir`, `hargaJasa`, `namaBarang`, `statusBarang`, `deskripsiBarang`, `gambarBarang`, `noresi`, `idKategori`, `buktiPembayaran`, `kodeUnik`, `statusPembayaran`, `namaBankPembayaran`) VALUES
(3, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1, NULL, NULL, 1, 250000, NULL, NULL, 'Sepatu Nike Air Force 1', 'onMarket', 'berwarna putih', 'air-force.jpg', NULL, 1, NULL, NULL, NULL, NULL),
(14, NULL, NULL, 1, NULL, NULL, NULL, 'Sepatu c', 'onMarketWanted', 'Warna Putih ABu-abu', 'Sepatu Hitam.jpg', NULL, 1, NULL, NULL, NULL, NULL),
(14, 5, NULL, NULL, 250000, NULL, 10000, 'Sepatu Abu-abu', 'onMarketOffer', 'Warna Abu-abu', 'Sepatu Hitam.jpg', NULL, 1, NULL, NULL, NULL, NULL),
(27, 22, NULL, NULL, 250000, NULL, 10000, 'Sepatu Sneakers', 'onMarketOffer', 'Ukuran 42, warna Hitam', 'sepatu.jpg', NULL, 1, NULL, NULL, NULL, NULL),
(27, 36, 29, 1, NULL, NULL, NULL, 'Celana Jeans', 'onMarketWanted', 'Ukuran 30', 'celana jeans.jpg', NULL, 1, 'test', NULL, NULL, NULL),
(27, 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 29, NULL, NULL, 300000, NULL, 12000, 'Tas', 'onMarketOffer', 'Untuk Tas Sekolah', 'baju Olahraga.jpg', NULL, 1, NULL, NULL, NULL, NULL),
(28, 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 32, NULL, NULL, 250000, NULL, 10000, 'Celana Cowo', 'onMarketOffer', 'Berwana Biru dan berukuran 30.', 'celana jeans.jpg', NULL, 1, NULL, NULL, NULL, NULL),
(29, 33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 33, NULL, NULL, 250000, NULL, 10000, 'Jam tangan', 'onMarketOffer', 'Merk jam tangan : alba,\r\nUntuk Pria.', 'jamtangan.jpg', NULL, 1, NULL, NULL, NULL, NULL),
(27, 31, NULL, NULL, 3000, NULL, 120, 'Tas Sekolah', 'onMarketOffer', 'Tas sekolah untuk anak TK dan SD, berwarna hitam.', 'tasSekolahTK.jpg', NULL, 1, NULL, NULL, NULL, NULL),
(27, 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, NULL, NULL, 1, NULL, NULL, NULL, 'Topi', 'onMarketWanted', 'Topi berwarna Hitam. Lokasinya di China', 'topi.jpg', NULL, 1, NULL, NULL, NULL, NULL),
(27, 31, NULL, NULL, 30000, NULL, 1200, 'Uno', 'onMarketOffer', 'Permainan untuk anak', 'uno.jpg', NULL, 1, NULL, NULL, NULL, NULL),
(29, 36, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 36, 14, 1, 100000, 10000, 4000, 'Topi New York', 'onDelivery', 'Warna Hitam', 'topi.jpg', NULL, 1, 'yes sir.png', '215', NULL, NULL),
(14, 39, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 39, 27, 1, 450000, 25000, 18000, 'tas jalan', 'onDelivery', 'tas berwarna hitam ', 'tas.jpg', NULL, 1, 'bukti pembayaran.jpg', '401', 'verified', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trip`
--

CREATE TABLE `trip` (
  `idTrip` int(11) NOT NULL,
  `waktuAwal` datetime DEFAULT NULL,
  `waktuAkhir` datetime DEFAULT NULL,
  `statusTrip` varchar(75) DEFAULT NULL,
  `gambarTrip` varchar(75) DEFAULT NULL,
  `idKota1` int(11) DEFAULT NULL,
  `idKota2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trip`
--

INSERT INTO `trip` (`idTrip`, `waktuAwal`, `waktuAkhir`, `statusTrip`, `gambarTrip`, `idKota1`, `idKota2`) VALUES
(4, '2020-04-01 03:12:00', '2020-04-02 04:10:09', 'pending', 'tiket.jpg', 26, 5),
(5, '2020-01-23 22:20:00', '2020-01-24 21:21:00', 'pending', 'tiket.jpg', 23, 5),
(6, '2020-01-23 20:20:00', '2020-02-24 21:21:00', 'pending', 'tiket.jpg', 23, 26),
(7, '2020-08-04 00:00:00', '2020-08-04 00:00:00', 'verified', 'tiket.jpg', 26, 23),
(8, '1990-12-29 23:01:00', '1991-01-01 15:08:00', 'pending', 'tiket.jpg', 23, 26),
(9, '2020-03-03 12:00:00', '2020-03-04 13:50:00', 'pending', 'tiket.jpg', 23, 26),
(10, '2020-05-04 09:19:00', '2020-05-05 10:00:00', 'verified', 'head.jpg', 24, 5),
(11, '2020-05-04 09:32:00', '2020-05-05 10:00:00', 'verified', 'head.jpg', 24, 5),
(20, '2020-05-11 20:20:00', '2020-05-12 21:21:00', 'verified', 'tiket.jpg', 23, 5),
(21, '2020-05-20 07:30:00', '2020-05-22 01:00:00', 'verified', 'tiket.jpg', 26, 5),
(22, '2020-05-17 16:30:00', '2020-05-18 03:00:00', 'verified', 'tiket.jpg', 23, 5),
(23, '2020-05-20 14:00:00', '2020-05-21 05:00:00', 'unverified', 'ide.jpg', 26, 23),
(27, '2020-10-20 00:00:00', '2020-10-20 00:00:00', 'verified', 'tiketPesawat.jpg', 5, 24),
(28, '2020-10-20 00:00:00', '2020-10-20 00:00:00', 'pending', 'tiketPesawat.jpg', 5, 24),
(29, '2020-10-21 00:00:00', '2020-10-30 00:00:00', 'verified', 'tiketPesawat.jpg', 39, 40),
(30, '2020-10-26 00:00:00', '2020-10-29 00:00:00', 'unverified', 'tiketPesawat.jpg', 39, 40),
(31, '2020-11-07 00:00:00', '2020-11-14 00:00:00', 'verified', 'tiketPesawat.jpg', 39, 40),
(32, '2020-11-25 00:00:00', '2020-12-01 00:00:00', 'verified', 'tiketPesawat.jpg', 39, 40),
(33, '2020-11-17 00:00:00', '2020-11-26 00:00:00', 'verified', 'tiket.jpg', 5, 41),
(34, '2020-11-22 00:00:00', '2020-11-28 00:00:00', 'verified', 'tiket2.jpg', 39, 26),
(35, '2020-11-26 00:00:00', '2020-11-29 00:00:00', 'verified', 'tiket2.jpg', 5, 42),
(36, '2020-12-04 00:00:00', '2020-12-25 00:00:00', 'verified', 'tiketPesawat.jpg', 39, 40),
(39, '2020-12-10 00:00:00', '2020-12-16 07:00:00', 'verified', 'tiket2.jpg', 10, 40);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `namaUser` varchar(75) NOT NULL,
  `email` varchar(75) NOT NULL,
  `password` varchar(75) NOT NULL,
  `nohp` int(11) NOT NULL,
  `alamat` varchar(75) NOT NULL,
  `rating` varchar(75) DEFAULT NULL,
  `isTraveller` varchar(75) DEFAULT NULL,
  `gambarKTP` varchar(75) DEFAULT NULL,
  `swafoto` varchar(75) DEFAULT NULL,
  `namaBank` varchar(75) DEFAULT NULL,
  `norek` varchar(75) DEFAULT NULL,
  `noKTP` varchar(75) DEFAULT NULL,
  `idKelurahan` int(11) DEFAULT NULL,
  `gambarProfile` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `namaUser`, `email`, `password`, `nohp`, `alamat`, `rating`, `isTraveller`, `gambarKTP`, `swafoto`, `namaBank`, `norek`, `noKTP`, `idKelurahan`, `gambarProfile`) VALUES
(1, 'quadrat nadji', '2017730068@student.unpar.ac.id', 'quadratnp', 9090909, 'jl BJ aja', '', '', 'ide.jpg', 'Qu.jpg', 'BCA', '', '', 5, NULL),
(3, 'informatika', 'informatika@unpar.ac.id', 'informatika', 2147483647, 'ciumbuleauit', NULL, 'verified', 'shopping-bagsl.jpg', 'shopping-bagsl.jpg', 'OCBC', '902834162', '32467289', 13, ''),
(14, 'test', 'test@test.com', 'test', 12345, 'test', NULL, 'verified', 'ide.jpg', 'ide.jpg', 'BCA', '22122', '11113', 18, 'Qu.jpg'),
(24, 'otto', 'ottowalada@gmail.com', 'ottoarab', 7564756, 'otto', NULL, 'pending', 'head.jpg', 'user.png', 'MANDIRI', '902343743', '2000000238231', 34, NULL),
(25, 'cowo', 'cowo@gmail.com', 'cowo', 10052020, 'jl. BJ 12', NULL, 'verified', 'shopping-bagsl.jpg', 'shopping-bagsl.jpg', 'BRI', '1234-33323-121', '09876', 13, NULL),
(26, 'byon nugraha', 'byon@gmail.com', 'byon', 2147483647, 'jalan haji hasbi no.22', NULL, 'verified', 'user.png', 'head.jpg', 'BCA', '3847281', '2837428', 5, NULL),
(27, 'Quadrat', 'quadrat@gmail.com', 'quadratnp', 2147483647, 'Jl. Bukir Jarian', NULL, 'verified', 'user.png', 'head.jpg', 'BNI', '72-7244-1821', '20007236619', 5, ''),
(28, 'Ana Maria', 'maria@gmail.com', '12345678', 8132799, 'Jl. Bukit Hegar, Ciumbuleuit', NULL, 'verified', 'ktp.png', 'contoh.png', 'BCA', '123-456-7891', '12345678', 35, 'profile2.jpg'),
(29, 'Joseph', 'joseph@gmail.com', 'joseph', 81327888, 'Jl. Cihampelas No.12', NULL, 'verified', 'idcard.jpg', 'profile3.jpg', 'BCA', '123-456-7891', '12345678', 36, NULL),
(30, 'Naufal', 'naufal@gmail.com', 'naufal', 827088498, 'Jl. Ahmad Yani', NULL, 'verified', 'profile3.jpg', 'idcard.jpg', 'BNI', '123-456-7891', '12345678', 37, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idKategori`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`idKecamatan`),
  ADD KEY `FK_KOTA` (`idKota`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`idKelurahan`),
  ADD KEY `FK_KECAMATAN` (`idKecamatan`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`idKota`),
  ADD KEY `FK_PROVINSI` (`idProvinsi`);

--
-- Indexes for table `negara`
--
ALTER TABLE `negara`
  ADD PRIMARY KEY (`idNegara`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`idNotifikasi`),
  ADD KEY `FK_USER` (`idUser`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD KEY `FK_USER` (`idUser`),
  ADD KEY `FK_TRIP` (`idTrip`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`idProvinsi`),
  ADD KEY `FK_NEGARA` (`idNegara`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD KEY `FK_user1` (`idUser1`),
  ADD KEY `FK_trip1` (`IdTrip`);

--
-- Indexes for table `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`idTrip`),
  ADD KEY `FK_KOTA1` (`idKota1`),
  ADD KEY `FK_KOTA2` (`idKota2`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `FK_KELURAHAN` (`idKelurahan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idKategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `idKecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `idKelurahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `idKota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `negara`
--
ALTER TABLE `negara`
  MODIFY `idNegara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `idNotifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=763;

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `idProvinsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `trip`
--
ALTER TABLE `trip`
  MODIFY `idTrip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `FK_KOTA` FOREIGN KEY (`idKota`) REFERENCES `kota` (`idKota`);

--
-- Constraints for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD CONSTRAINT `FK_KECAMATAN` FOREIGN KEY (`idKecamatan`) REFERENCES `kecamatan` (`idKecamatan`);

--
-- Constraints for table `kota`
--
ALTER TABLE `kota`
  ADD CONSTRAINT `FK_PROVINSI` FOREIGN KEY (`idProvinsi`) REFERENCES `provinsi` (`idProvinsi`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_TRIP` FOREIGN KEY (`idTrip`) REFERENCES `trip` (`idTrip`),
  ADD CONSTRAINT `FK_USER` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

--
-- Constraints for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD CONSTRAINT `FK_NEGARA` FOREIGN KEY (`idNegara`) REFERENCES `negara` (`idNegara`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `FK_trip1` FOREIGN KEY (`IdTrip`) REFERENCES `trip` (`idTrip`),
  ADD CONSTRAINT `FK_user1` FOREIGN KEY (`idUser1`) REFERENCES `user` (`idUser`);

--
-- Constraints for table `trip`
--
ALTER TABLE `trip`
  ADD CONSTRAINT `FK_KOTA1` FOREIGN KEY (`idKota1`) REFERENCES `kota` (`idKota`),
  ADD CONSTRAINT `FK_KOTA2` FOREIGN KEY (`idKota2`) REFERENCES `kota` (`idKota`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_KELURAHAN` FOREIGN KEY (`idKelurahan`) REFERENCES `kelurahan` (`idKelurahan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
