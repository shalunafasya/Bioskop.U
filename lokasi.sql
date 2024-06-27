-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2024 at 08:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bioskop`
--

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL,
  `lat_long` varchar(50) NOT NULL,
  `nama_tempat` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `lat_long`, `nama_tempat`, `kategori`, `keterangan`) VALUES
(2, '-7.783193492327706, 110.38687255256545', 'Empire XXI', 'XXI', 'Jl. Urip Sumoharjo No. 104, Klitren, Gondokusuman, Yogyakarta'),
(3, '-7.78207116173905, 110.40097363907248', 'XXI Plaza Ambarukmo', 'XXI', 'jl. Laksda Adisucipto No.80, Sleman, Yogyakarta'),
(4, '-7.72034358170462, 110.36288523907146', 'City Hall XXI Yogyakarta', 'XXI', 'Jl. Gito Gati, Denggung, Tridadi, Kec. Sleman, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55511'),
(5, '-7.7783065077198, 110.41924739263993', 'CGV Cinemas JWALK Mall', 'CGV', 'J-Walk Mall Jl. Babarsari No.2, Janti, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281'),
(6, '-7.781598617481914, 110.42019234544975', 'CGV Cinemas Transmart Maguwo', 'CGV', 'Jl. Raya Solo KM.8 No.234, Corongan, Maguwoharjo, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55282'),
(7, '-7.756394903191366, 110.4001130558264', 'CGV Pakuwon Mall Yogyakarta', 'CGV', 'Hartono Mall, Jl. Ring Road Utara, Kaliwaru, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281'),
(8, '-7.783968112612337, 110.39074773722257', 'Cinepolis Lippo Plaza Jogja', 'CINEPOLIS', 'Lippo Plaza Lt 1 dan 4, Jl. Laksda Adisucipto No.32-34, RT.13/RW.4, Demangan, Kec. Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55221'),
(9, '-7.752996177258881, 110.36053989304347', 'Jogja City XXI', 'XXI', 'Jogja City Mall, Jl. Magelang No.KM. 6 No. 18 Lantai 2, Kutu Patran, Sinduadi, Kec. Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55284');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
