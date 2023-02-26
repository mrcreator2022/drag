-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2023 at 08:34 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `draganddrop`
--

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` int(11) NOT NULL,
  `quote` varchar(255) DEFAULT NULL,
  `client` varchar(100) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `mgr_initial` varchar(100) DEFAULT NULL,
  `sent_date` date DEFAULT NULL,
  `date_required` date NOT NULL,
  `follow_up` date DEFAULT NULL,
  `stage` varchar(100) DEFAULT NULL,
  `enquiry_date` date DEFAULT NULL,
  `display_order` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `quote`, `client`, `company`, `mgr_initial`, `sent_date`, `date_required`, `follow_up`, `stage`, `enquiry_date`, `display_order`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Chirs Grace', 'xyz', 'CTC', '2023-02-22', '2023-02-23', '2023-02-23', 'Hot', '2023-02-23', 1, '2023-02-23 17:08:12', '2023-02-27 00:48:24'),
(2, NULL, 'Doug King', 'DBC', 'test', '2023-02-21', '2023-02-26', '2023-02-23', 'Hot', '2023-02-23', 2, '2023-02-23 17:08:12', '2023-02-27 00:55:04'),
(3, NULL, 'Chirs Whilsom', 'CTB', 'test', '2023-02-22', '2023-02-22', '2023-02-23', 'Potential', '2023-02-23', 3, '2023-02-23 17:08:12', '2023-02-27 00:47:29'),
(4, NULL, 'John', 'SCC', 'test', '2023-02-23', '2023-02-24', '2023-02-23', 'Hot', '2023-02-23', 6, '2023-02-23 17:08:12', '2023-02-27 00:34:23'),
(5, NULL, 'Grace', 'TCA', 'testing', '2023-02-22', '2023-02-22', '2023-02-23', 'Hot', '2023-02-23', 4, '2023-02-23 17:08:12', '2023-02-27 00:56:48'),
(6, NULL, 'Grace 1', 'TCA', 'testing', '2023-02-22', '2023-02-25', '2023-02-23', 'Hot', '2023-02-23', 5, '2023-02-23 17:08:12', '2023-02-27 00:51:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
