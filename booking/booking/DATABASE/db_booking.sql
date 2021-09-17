-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 01, 2017 at 06:11 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kamar`
--

CREATE TABLE `tb_kamar` (
  `id_kamar` char(6) NOT NULL,
  `kamar` varchar(100) NOT NULL,
  `id_tipe` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kamar`
--

INSERT INTO `tb_kamar` (`id_kamar`, `kamar`, `id_tipe`) VALUES
('K00001', 'Kamar 1', 'T1'),
('K00002', 'Kamar 2', 'T1'),
('K00003', 'Kamar 3', 'T2'),
('K00004', 'Kamar 4', 'T2'),
('K00005', 'Kamar 5', 'T2'),
('K00006', 'Kamar 6', 'T1'),
('K00007', 'Kamar 7', 'T2'),
('K00008', 'Kamar 8', 'T1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_reservasi`
--

CREATE TABLE `tb_reservasi` (
  `no_reservasi` bigint(20) NOT NULL,
  `tgl_in` date NOT NULL,
  `tgl_out` date NOT NULL,
  `id_kamar` char(6) NOT NULL,
  `harga` double NOT NULL,
  `nama_tamu` varchar(200) NOT NULL,
  `tgl_reservasi` datetime NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tipe`
--

CREATE TABLE `tb_tipe` (
  `id_tipe` char(2) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tipe`
--

INSERT INTO `tb_tipe` (`id_tipe`, `tipe`, `harga`) VALUES
('T1', 'Standar', 300000),
('T2', 'Deluxe', 500000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kamar`
--
ALTER TABLE `tb_kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `tb_reservasi`
--
ALTER TABLE `tb_reservasi`
  ADD PRIMARY KEY (`no_reservasi`);

--
-- Indexes for table `tb_tipe`
--
ALTER TABLE `tb_tipe`
  ADD PRIMARY KEY (`id_tipe`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_reservasi`
--
ALTER TABLE `tb_reservasi`
  MODIFY `no_reservasi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
