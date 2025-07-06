-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2019 at 02:08 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ip23042019`
--

-- --------------------------------------------------------

--
-- Table structure for table `proizvodjaci`
--

CREATE TABLE `proizvodjaci` (
  `id` int(11) NOT NULL,
  `zemlja_porekla` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proizvodjaci`
--

INSERT INTO `proizvodjaci` (`id`, `zemlja_porekla`) VALUES
(1, 'Nemacka'),
(2, 'Italija'),
(3, 'SAD'),
(4, 'Francuska'),
(5, 'Rusija');

-- --------------------------------------------------------

--
-- Table structure for table `vozila`
--

CREATE TABLE `vozila` (
  `id` int(11) NOT NULL,
  `marka` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cena` float(8,2) NOT NULL,
  `godiste` int(4) NOT NULL,
  `id_proizvodjaca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vozila`
--

INSERT INTO `vozila` (`id`, `marka`, `cena`, `godiste`, `id_proizvodjaca`) VALUES
(1, 'BMW', 500000.00, 2018, 1),
(4, 'Opel', 25000.00, 2016, 1),
(5, 'Alfa Romeo', 300000.00, 2017, 2),
(6, 'Jeep', 400000.00, 2015, 3),
(7, 'Ferrari', 1000000.00, 2018, 2),
(8, 'Pezo', 200000.00, 2015, 4),
(9, 'Reno Clio', 250000.00, 2017, 4),
(10, 'Mercedez-Benz', 650000.00, 2015, 1),
(11, 'Lamborgini', 1000000.00, 2016, 2),
(12, 'Lada', 100000.00, 2016, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `proizvodjaci`
--
ALTER TABLE `proizvodjaci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vozila`
--
ALTER TABLE `vozila`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_proizvodjaca` (`id_proizvodjaca`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `proizvodjaci`
--
ALTER TABLE `proizvodjaci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vozila`
--
ALTER TABLE `vozila`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vozila`
--
ALTER TABLE `vozila`
  ADD CONSTRAINT `vozila_ibfk_1` FOREIGN KEY (`id_proizvodjaca`) REFERENCES `proizvodjaci` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
