-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2022 at 04:26 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kursevi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'mrdjarade', 'mrdjarade');

-- --------------------------------------------------------

--
-- Table structure for table `kurs`
--

CREATE TABLE `kurs` (
  `kursID` int(11) NOT NULL,
  `naziv` varchar(30) NOT NULL,
  `opis` text NOT NULL,
  `autor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kurs`
--

INSERT INTO `kurs` (`kursID`, `naziv`, `opis`, `autor`) VALUES
(1, 'Engleski jezik', 'Osnovni nivo, za početnike.', 1),
(2, 'Nemački jezik', 'Napredni nivo, potrebno predznanje', 1),
(3, 'Francuski jezik', 'Namenjen deci uzrasta do 10 godina.', 1),
(29, 'Španski jezik', 'Komunikacija na španskom jeziku, potrebno minimalno predznanje.', 2),
(34, 'Arapski jezik', 'Namenjen studentima.', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `kurs`
--
ALTER TABLE `kurs`
  ADD PRIMARY KEY (`kursID`),
  ADD KEY `autor` (`autor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kurs`
--
ALTER TABLE `kurs`
  MODIFY `kursID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kurs`
--
ALTER TABLE `kurs`
  ADD CONSTRAINT `kurs_ibfk_1` FOREIGN KEY (`autor`) REFERENCES `admin` (`adminID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
