-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2023 at 01:54 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stokbarang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kd_spt` varchar(10) NOT NULL,
  `merk_spt` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_spt`, `merk_spt`) VALUES
('A-001', 'Nike'),
('A-002', 'Adidas'),
('A-003', 'Reebok'),
('A-004', 'Hoka');

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

CREATE TABLE `gudang` (
  `kd_produk` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_spt` varchar(30) NOT NULL,
  `ukur_spt` int(2) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `kd_spt` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gudang`
--

INSERT INTO `gudang` (`kd_produk`, `tanggal`, `jenis_spt`, `ukur_spt`, `jumlah`, `kd_spt`) VALUES
('AA-01', '2023-02-10', 'RUNFALCON 3', 43, 10, 'A-002'),
('AB-01', '2023-02-05', 'Air Jordan Retro 2', 42, 20, 'A-001');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `kd_produk` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_spt` varchar(30) NOT NULL,
  `ukur_spt` int(2) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `kd_spt` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`kd_produk`, `tanggal`, `jenis_spt`, `ukur_spt`, `jumlah`, `kd_spt`) VALUES
('AA-01', '2023-02-05', 'Rincon 2', 42, 20, 'A-004');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_spt`);

--
-- Indexes for table `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`kd_produk`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`kd_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
