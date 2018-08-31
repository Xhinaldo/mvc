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
-- Table structure for table `universitetet`
--

CREATE TABLE `universitetet` (
  `id` int(4) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `universitetet`
--

INSERT INTO `universitetet` (`id`, `name`) VALUES
(1, 'Universiteti i Tiranes'),
(2, 'Universiteti Politeknik i Tiranes'),
(3, 'Universiteti i Arteve'),
(4, 'Universiteti i Mjekësisë, Tiranë'),
(5, 'Universiteti Bujqësor i Tiranës'),
(6, 'Shkolla e Magjistraturës së Republikës së Shqipërisë'),
(7, 'Akademia Ushtarake \"Skënderbej\"'),
(8, 'Universiteti Luigj Gurakuqi'),
(9, 'Universiteti Eqrem Çabej'),
(10, 'Universiteti Aleksandër Moisiu'),
(11, 'Universiteti i Vlorës Ismail Qemali'),
(12, 'Universiteti Aleksandër Xhuvani'),
(13, 'Universiteti Fan Noli'),
(14, 'Universiteti Bujqësor i Lushnjes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `universitetet`
--
ALTER TABLE `universitetet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `universitetet`
--
ALTER TABLE `universitetet`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
