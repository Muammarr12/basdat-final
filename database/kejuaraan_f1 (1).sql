-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 27, 2024 at 08:26 AM
-- Server version: 11.3.2-MariaDB
-- PHP Version: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kejuaraan_f1`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_sirkuit` int(11) DEFAULT NULL,
  `nama_sirkuit` varchar(50) DEFAULT NULL,
  `lokasi_sirkuit` varchar(50) DEFAULT NULL,
  `tanggal_balapan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembalap`
--

CREATE TABLE `pembalap` (
  `id_pembalap` int(11) NOT NULL,
  `nama_pembalap` varchar(50) DEFAULT NULL,
  `id_team` int(11) NOT NULL,
  `nama_team` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembalap`
--

INSERT INTO `pembalap` (`id_pembalap`, `nama_pembalap`, `id_team`, `nama_team`) VALUES
(1, 'Verstappen', 1, 'Oracle Red Bull Racing');

-- --------------------------------------------------------

--
-- Table structure for table `sirkuit`
--

CREATE TABLE `sirkuit` (
  `id_sirkuit` int(11) NOT NULL,
  `nama_sirkuit` varchar(50) DEFAULT NULL,
  `lokasi_sirkuit` varchar(50) DEFAULT NULL,
  `kapasitas` int(11) DEFAULT NULL,
  `jarak_sirkuit` float(4,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sirkuit`
--

INSERT INTO `sirkuit` (`id_sirkuit`, `nama_sirkuit`, `lokasi_sirkuit`, `kapasitas`, `jarak_sirkuit`) VALUES
(1, 'Jeddah Corniche Sirkuit', 'Jeddah, Arab', 30000, 6.155);

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

CREATE TABLE `sponsor` (
  `id_sponsor` int(11) NOT NULL,
  `nama_sponsor` varchar(50) DEFAULT NULL,
  `durasi_kontrak` int(2) DEFAULT NULL,
  `biaya_kontrak` int(11) DEFAULT NULL,
  `jumlah_kontrak` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sponsor`
--

INSERT INTO `sponsor` (`id_sponsor`, `nama_sponsor`, `durasi_kontrak`, `biaya_kontrak`, `jumlah_kontrak`) VALUES
(1, 'Samsang', 4, 300000, 1200000),
(4, 'Ambatron', 8, 850000, 6800000);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id_team` int(11) NOT NULL,
  `nama_team` varchar(50) DEFAULT NULL,
  `nama_manager` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id_team`, `nama_team`, `nama_manager`) VALUES
(1, 'Oracle Red Bull Racing', 'Frederic Vasseur'),
(44, 'Mercedes AMG Petronas', 'Toto Wolff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD UNIQUE KEY `id_sirkuit` (`id_sirkuit`);

--
-- Indexes for table `pembalap`
--
ALTER TABLE `pembalap`
  ADD PRIMARY KEY (`id_pembalap`),
  ADD UNIQUE KEY `id_team` (`id_team`) USING BTREE;

--
-- Indexes for table `sirkuit`
--
ALTER TABLE `sirkuit`
  ADD PRIMARY KEY (`id_sirkuit`);

--
-- Indexes for table `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`id_sponsor`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id_team`),
  ADD UNIQUE KEY `id_team` (`id_team`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembalap`
--
ALTER TABLE `pembalap`
  MODIFY `id_pembalap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `sirkuit`
--
ALTER TABLE `sirkuit`
  MODIFY `id_sirkuit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `id_sponsor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_sirkuit`) REFERENCES `sirkuit` (`id_sirkuit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembalap`
--
ALTER TABLE `pembalap`
  ADD CONSTRAINT `pembalap_ibfk_1` FOREIGN KEY (`id_team`) REFERENCES `team` (`id_team`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
