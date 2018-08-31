-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2018 at 05:00 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `fakultetet`
--

CREATE TABLE `fakultetet` (
  `ID` int(4) NOT NULL,
  `name` text NOT NULL,
  `universiteti_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultetet`
--

INSERT INTO `fakultetet` (`ID`, `name`, `universiteti_id`) VALUES
(1, 'Fakulteti i Shkencave te Natyres', 1),
(2, 'Fakulteti i Ekonomise', 1),
(3, 'Fakulteti i Informacionit dhe Teknologjise', 2),
(5, 'Fakulteti i Histori-Filologji', 1),
(6, 'Fakulteti i Shkencave Sociale', 1),
(7, 'Fakulteti i Gjuhëve të Huaja', 1),
(8, 'Fakulteti i Histori-Filologji', 1),
(9, 'Fakulteti i inxhinierisë elektrike', 2),
(10, 'Fakulteti i inxhinierisë së ndërtimit', 2),
(11, 'Fakulteti i inxhinierisë mekanike', 2),
(12, 'Fakulteti i gjeologjisë dhe minierave', 2),
(13, 'Fakulteti i Inxhinierisë Matematike dhe Inxhinierisë Fizike', 2),
(14, 'Fakulteti i Arkitektures dhe Urbanistikes', 2),
(15, 'Fakulteti i Muzikës', 3),
(16, 'Fakulteti i Artit Skenik', 3),
(17, 'Fakulteti i Arteve të Bukura', 3),
(18, 'Fakulteti i Mjekësisë', 4),
(19, 'Fakulteti i Mjekësisë Dentare', 4),
(20, 'Fakulteti i Shkencave Mjekesore Teknike', 4),
(21, 'Fakulteti i Ekonomisë dhe Agrobiznesit', 5),
(22, 'Fakulteti i Mjekësisë Veterinere', 5),
(23, 'Fakulteti i Bujqësisë dhe Mjedisit', 5),
(24, 'Fakulteti i Bioteknologjisë dhe Ushqimit', 5),
(25, 'Fakulteti i Shkencave Pyjore', 5),
(26, 'Fakulteti i Drejtesise', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fakultetet`
--
ALTER TABLE `fakultetet`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fakultetet`
--
ALTER TABLE `fakultetet`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
