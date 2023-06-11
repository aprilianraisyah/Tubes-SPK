-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 04:25 PM
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
-- Database: `cafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `cafe`
--

CREATE TABLE `cafe` (
  `id_cafe` int(11) NOT NULL,
  `nama_cafe` varchar(50) NOT NULL,
  `keramahan_dari_pelayan` varchar(50) NOT NULL,
  `kelengkapan_menu` varchar(50) NOT NULL,
  `tempat_parkir_kendaraan` varchar(50) NOT NULL,
  `ketersediaan_wifi` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `keramahan_angka` int(11) NOT NULL,
  `menu_angka` int(11) NOT NULL,
  `parkir_angka` int(11) NOT NULL,
  `wifi_angka` int(11) NOT NULL,
  `harga_angka` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cafe`
--

INSERT INTO `cafe` (`id_cafe`, `nama_cafe`, `keramahan_dari_pelayan`, `kelengkapan_menu`, `tempat_parkir_kendaraan`, `ketersediaan_wifi`, `harga`, `keramahan_angka`, `menu_angka`, `parkir_angka`, `wifi_angka`, `harga_angka`) VALUES
(1, 'Moci Cafe', 'Ramah', 'Kurang Lengkap', 'Luas', 'Tidak Tersedia', 'Mahal', 2, 1, 2, 1, 4),
(2, 'Key Cafe', 'Kurang Ramah', 'Kurang Lengkap', 'Sangat Luas', 'Tersedia', 'Cukup Mahal', 1, 1, 3, 2, 3),
(3, 'Loly Cafe', 'Sangat Ramah', 'Lengkap', 'Luas', 'Tidak Tersedia', 'Mahal', 3, 2, 2, 1, 4),
(4, 'Cleo Cafe', 'Ramah', 'Sangat Lengkap', 'Luas', 'Tersedia', 'Sangat Murah', 2, 3, 2, 2, 1),
(5, 'Aldi Cafe', 'Sangat Ramah', 'Lengkap', 'Kurang Luas', 'Tersedia', 'Murah', 3, 2, 1, 2, 2),
(6, 'Akul Cafe', 'Ramah', 'Sangat Lengkap', 'Luas', 'Tidak Tersedia', 'Mahal', 2, 3, 2, 1, 4),
(7, 'Luci Cafe', 'Ramah', 'Lengkap', 'Kurang Luas', 'Tersedia', 'Mahal', 2, 2, 1, 2, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cafe`
--
ALTER TABLE `cafe`
  ADD PRIMARY KEY (`id_cafe`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cafe`
--
ALTER TABLE `cafe`
  MODIFY `id_cafe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
