-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2020 at 10:26 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sislau_baru`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Id_Cus` int(11) NOT NULL,
  `No_KTP` varchar(30) NOT NULL,
  `Foto_KTP` text NOT NULL,
  `Nama_Cus` varchar(45) DEFAULT NULL,
  `Alamat` varchar(45) DEFAULT NULL,
  `No_Telp` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Id_Cus`, `No_KTP`, `Foto_KTP`, `Nama_Cus`, `Alamat`, `No_Telp`) VALUES
(4, '12121', '5fd0e8ba41d96_ADAE.png', 'ADAE', 'ADAE', 2131),
(5, 'ada', '5fd0ec107cbec_212.png', '212', 'ada', 121);

-- --------------------------------------------------------

--
-- Table structure for table `data_login`
--

CREATE TABLE `data_login` (
  `Id_Login` int(11) NOT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_login`
--

INSERT INTO `data_login` (`Id_Login`, `Email`, `Password`) VALUES
(1, 'pujigayatri73@gmail.com', '73123');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `foto_paket` text NOT NULL,
  `Jenis` varchar(45) DEFAULT NULL,
  `Harga` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `foto_paket`, `Jenis`, `Harga`) VALUES
(7, '5fd0e300095ed_One Day Service.png', 'One Day Service', '25000'),
(8, '5fd0ec19cde47_a1.png', 'a1', '121121');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `Id_Trans` int(11) NOT NULL,
  `Nama_Cus` varchar(250) NOT NULL,
  `Nama_Paket` varchar(250) NOT NULL,
  `Tgl_Trans` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`Id_Trans`, `Nama_Cus`, `Nama_Paket`, `Tgl_Trans`) VALUES
(3, 'ADAE', 'One Day Service', '2020-12-09 16:34:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Id_Cus`);

--
-- Indexes for table `data_login`
--
ALTER TABLE `data_login`
  ADD PRIMARY KEY (`Id_Login`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`Id_Trans`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Id_Cus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data_login`
--
ALTER TABLE `data_login`
  MODIFY `Id_Login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `Id_Trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
