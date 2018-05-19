-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2018 at 11:16 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_quickcount`
--

-- --------------------------------------------------------

--
-- Table structure for table `jumlah_suaras`
--

CREATE TABLE `jumlah_suaras` (
  `id` int(11) NOT NULL,
  `tps_id` int(11) NOT NULL,
  `paslon_id` int(11) NOT NULL,
  `jumlah_suara` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paslons`
--

CREATE TABLE `paslons` (
  `id` int(11) NOT NULL,
  `no_urut` varchar(5) NOT NULL,
  `nama_paslon` varchar(50) NOT NULL,
  `warna` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tps`
--

CREATE TABLE `tps` (
  `id` int(11) NOT NULL,
  `nama_tps` varchar(10) NOT NULL,
  `tempat_tps` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tps`
--

INSERT INTO `tps` (`id`, `nama_tps`, `tempat_tps`) VALUES
(1, 'TPS 01', 'Kel. Ragajaya'),
(2, 'TPS 02', 'Kel. Cipayung');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(33) NOT NULL,
  `role` varchar(10) NOT NULL,
  `tps_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`, `tps_id`) VALUES
(1, 'Admin Super', 'admin@quickcount.com', '21232f297a57a5a743894a0e4a801fc3', 'Relawan', 1),
(2, 'John Doe', 'john@email.com', 'c4ca4238a0b923820dcc509a6f75849b', 'Relawan', 1),
(3, 'khalid Yahya', 'khalid.yahya9@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'Relawan', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jumlah_suaras`
--
ALTER TABLE `jumlah_suaras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paslons`
--
ALTER TABLE `paslons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tps`
--
ALTER TABLE `tps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_tps` (`tps_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jumlah_suaras`
--
ALTER TABLE `jumlah_suaras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paslons`
--
ALTER TABLE `paslons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tps`
--
ALTER TABLE `tps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_tps` FOREIGN KEY (`tps_id`) REFERENCES `tps` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
