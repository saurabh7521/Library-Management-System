-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2019 at 01:10 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `Reference_number` int(255) NOT NULL,
  `Author` varchar(255) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Shelf` int(255) NOT NULL,
  `Rack` int(255) NOT NULL,
  `Genre` varchar(255) NOT NULL,
  `Created_date` date NOT NULL,
  `Updated_date` date NOT NULL,
  `Created_by` varchar(255) NOT NULL,
  `Updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `Reference_number`, `Author`, `Title`, `Shelf`, `Rack`, `Genre`, `Created_date`, `Updated_date`, `Created_by`, `Updated_by`) VALUES
(1, 1, 'Roald Dahl', 'Matilda', 1, 1, 'Fiction', '2019-06-17', '2019-06-17', 'Saurabh', 'Saurabh'),
(2, 2, 'Daniel Defoe', 'Robinson Crusoe', 2, 2, 'Fiction', '2019-06-20', '2019-06-20', 'Saurabh', 'Saurabh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
