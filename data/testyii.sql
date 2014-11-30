-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 30, 2014 at 06:40 ප.ව.
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testyii`
--

-- --------------------------------------------------------

--
-- Table structure for table `continent`
--

CREATE TABLE IF NOT EXISTS `continent` (
`co_id` int(11) NOT NULL,
  `co_name` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `continent`
--

INSERT INTO `continent` (`co_id`, `co_name`) VALUES
(1, 'Asia'),
(2, 'Australia'),
(3, 'North America');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
`cn_id` int(11) NOT NULL,
  `cn_continent_id` int(11) NOT NULL,
  `cn_name` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`cn_id`, `cn_continent_id`, `cn_name`) VALUES
(1, 1, 'Sri Lanka'),
(2, 2, 'Australia'),
(3, 1, 'India');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `continent`
--
ALTER TABLE `continent`
 ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
 ADD PRIMARY KEY (`cn_id`), ADD KEY `cn_continent_id` (`cn_continent_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `continent`
--
ALTER TABLE `continent`
MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
MODIFY `cn_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `country`
--
ALTER TABLE `country`
ADD CONSTRAINT `country_ibfk_1` FOREIGN KEY (`cn_continent_id`) REFERENCES `continent` (`co_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
