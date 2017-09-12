-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2017 at 11:08 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mysql`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(5) NOT NULL,
  `c_name` varchar(20) NOT NULL,
  `c_email` varchar(20) NOT NULL,
  `c_address` varchar(50) NOT NULL,
  `c_zip` int(6) NOT NULL,
  `c_telephone` bigint(10) NOT NULL,
  `c_dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_name`, `c_email`, `c_address`, `c_zip`, `c_telephone`, `c_dob`) VALUES
(1, 'james', 'james@gmail.com', '42 street DC', 413517, 225154, '1995-10-30'),
(2, 'bond', 'bond@spy.com', 'South Mumbai', 456852, 2214587, '1985-09-12'),
(3, 'Ram', 'ram@yaho.com', 'Shivajinagar, Pune', 411033, 221478, '1990-09-13'),
(4, 'Sita', 'sita@outlook.com', 'Nashik', 411018, 9860397459, '1960-01-05'),
(6, 'Jack', 'jack@gmail.com', '123 street A', 452117, 7845985874, '1985-08-15'),
(7, 'Amol', 'amol@skala.in', 'Pimple Saudagar, Pune', 411033, 7775070019, '1995-10-30'),
(8, 'Shubham', 'shub@yahoo.com', 'Street B, Mumbai', 214538, 888457845, '1975-10-04'),
(9, 'Bush', 'bush@skala.in', 'Pimple Saudagar, Pune', 411033, 7895468548, '2001-10-30'),
(10, 'Obama', 'obama@potus.com', 'Street B, DC', 854565, 4512354687, '1960-10-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
