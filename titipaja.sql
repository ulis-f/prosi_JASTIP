-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2020 at 12:13 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(31, 'otto', 37);

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
(34, 'otto', 31);

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
(5, 'jakarta', 19),
(10, 'kot', 23),
(12, 'kottest', 24),
(15, 'a', 26),
(17, 'test', 27),
(23, 'Houston', 33),
(24, 'Dallas', 33),
(25, 'Los Angeles', 32),
(26, 'Sacramento', 32),
(30, 'qw', 37),
(37, 'otto', 45),
(38, 'kota', 23);

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
(3, 'Amerika');

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
(3, 7),
(14, 9),
(14, 10),
(3, 11),
(3, 20),
(26, 21),
(27, 22),
(27, 23);

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
(23, 'pro', 1),
(24, 'protest', 1),
(26, 'd', 1),
(27, 'test', 1),
(28, 'a', 1),
(29, 'z', 1),
(30, 'j', 1),
(31, 'k', 1),
(32, 'California', 3),
(33, 'Texas', 3),
(37, 'qw', 1),
(45, 'otto', 1);

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
  `idKategori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idUser1`, `IdTrip`, `idUser2`, `jumlahBarang`, `hargaBarang`, `hargaOngkir`, `hargaJasa`, `namaBarang`, `statusBarang`, `deskripsiBarang`, `gambarBarang`, `noresi`, `idKategori`) VALUES
(14, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1, NULL, NULL, 1, 250000, NULL, NULL, 'Sepatu Nike Air Force 1', 'onMarket', 'berwarna putih', 'air-force.jpg', NULL, 1);

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
(7, '2323-02-24 22:22:00', '2311-04-25 11:11:00', 'verified', 'tiket.jpg', 26, 23),
(8, '1990-12-29 23:01:00', '1991-01-01 15:08:00', 'pending', 'tiket.jpg', 23, 26),
(9, '2020-03-03 12:00:00', '2020-03-04 13:50:00', 'pending', 'tiket.jpg', 23, 26),
(10, '2020-05-04 09:19:00', '2020-05-05 10:00:00', 'verified', 'head.jpg', 24, 5),
(11, '2020-05-04 09:32:00', '2020-05-05 10:00:00', 'verified', 'head.jpg', 24, 5),
(20, '2020-05-11 20:20:00', '2020-05-12 21:21:00', 'verified', 'tiket.jpg', 23, 5),
(21, '2020-05-20 07:30:00', '2020-05-22 01:00:00', 'verified', 'tiket.jpg', 26, 5),
(22, '2020-05-17 16:30:00', '2020-05-18 03:00:00', 'verified', 'tiket.jpg', 23, 5),
(23, '2020-05-20 14:00:00', '2020-05-21 05:00:00', 'unverified', 'ide.jpg', 26, 23);

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
(27, 'yulius famas', 'yulius@gmail.com', 'yulius', 2147483647, 'jalan teratai no.1', NULL, 'verified', 'user.png', 'head.jpg', 'BNI', '72-7244-1821', '20007236619', 5, NULL);

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
  MODIFY `idKategori` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `idKecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `idKelurahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `idKota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `negara`
--
ALTER TABLE `negara`
  MODIFY `idNegara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `idProvinsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `trip`
--
ALTER TABLE `trip`
  MODIFY `idTrip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
