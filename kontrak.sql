-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 11, 2025 at 01:43 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kontrak`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_angsuran`
--

CREATE TABLE `jadwal_angsuran` (
  `JWDLANG_PK` int NOT NULL,
  `KONTRAK_NO` varchar(255) DEFAULT NULL,
  `ANGSURAN_KE` int DEFAULT NULL,
  `ANGSURAN_PER_BULAN` decimal(11,0) DEFAULT NULL,
  `TANGGAL_JATUH_TEMPO` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jadwal_angsuran`
--

INSERT INTO `jadwal_angsuran` (`JWDLANG_PK`, `KONTRAK_NO`, `ANGSURAN_KE`, `ANGSURAN_PER_BULAN`, `TANGGAL_JATUH_TEMPO`) VALUES
(1, 'AGR00001', 1, 12907000, '2024-01-25'),
(2, 'AGR00001', 2, 12907000, '2024-02-25'),
(3, 'AGR00001', 3, 12907000, '2024-03-25'),
(4, 'AGR00001', 4, 12907000, '2024-04-25'),
(5, 'AGR00001', 5, 12907000, '2024-05-25'),
(6, 'AGR00001', 6, 12907000, '2024-06-25'),
(7, 'AGR00001', 7, 12907000, '2024-07-25'),
(8, 'AGR00001', 8, 12907000, '2024-08-25'),
(9, 'AGR00001', 9, 12907000, '2024-09-25'),
(10, 'AGR00001', 10, 12907000, '2024-10-25'),
(11, 'AGR00001', 11, 12907000, '2024-11-25'),
(12, 'AGR00001', 12, 12907000, '2024-12-25');

-- --------------------------------------------------------

--
-- Table structure for table `kontrak`
--

CREATE TABLE `kontrak` (
  `PK` int NOT NULL,
  `KONTRAK_NO` varchar(225) DEFAULT NULL,
  `CLIENT NAME` varchar(225) DEFAULT NULL,
  `OTR` decimal(11,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kontrak`
--

INSERT INTO `kontrak` (`PK`, `KONTRAK_NO`, `CLIENT NAME`, `OTR`) VALUES
(1, 'agr00001', 'SUGUS', 240000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal_angsuran`
--
ALTER TABLE `jadwal_angsuran`
  ADD PRIMARY KEY (`JWDLANG_PK`);

--
-- Indexes for table `kontrak`
--
ALTER TABLE `kontrak`
  ADD PRIMARY KEY (`PK`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal_angsuran`
--
ALTER TABLE `jadwal_angsuran`
  MODIFY `JWDLANG_PK` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kontrak`
--
ALTER TABLE `kontrak`
  MODIFY `PK` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
