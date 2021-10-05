-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2021 at 04:01 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_eorest`
--

-- --------------------------------------------------------

--
-- Table structure for table `profil_usaha`
--

CREATE TABLE `profil_usaha` (
  `nama_usaha` varchar(250) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `nomor_telepon` varchar(17) NOT NULL,
  `email` varchar(100) NOT NULL,
  `instagram` varchar(50) NOT NULL,
  `facebook` varchar(250) NOT NULL,
  `maps_link` text NOT NULL,
  `foto_usaha_1` text NOT NULL,
  `foto_usaha_2` text NOT NULL,
  `foto_usaha_3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profil_usaha`
--

INSERT INTO `profil_usaha` (`nama_usaha`, `alamat`, `nomor_telepon`, `email`, `instagram`, `facebook`, `maps_link`, `foto_usaha_1`, `foto_usaha_2`, `foto_usaha_3`) VALUES
('Flamingo Cafe & Resto', 'Jl. Diponegoro No.15 Bojonegoro, Jawa Timur', '081252430912', 'flamingocafe@gmail.com', 'flamingocafepreston', 'Flamingo-café-restaurant-101136125017024', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.7349883071597!2d111.87995031459427!3d-7.156607694832594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e77818cc20c2111%3A0x9133efd296da42a6!2sJl.%20Diponegoro%2049-59%2C%20Sukorejo%20Lor%2C%20Sukorejo%2C%20Kec.%20Bojonegoro%2C%20Kabupaten%20Bojonegoro%2C%20Jawa%20Timur%2062115!5e0!3m2!1sid!2sid!4v1633341565083!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'michael-browning-MtqG1lWcUw0-unsplash.jpg', 'nick-karvounis-Ciqxn7FE4vE-unsplash.jpg', 'shawnanggg-nmpW_WwwVSc-unsplash.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profil_usaha`
--
ALTER TABLE `profil_usaha`
  ADD PRIMARY KEY (`nama_usaha`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
