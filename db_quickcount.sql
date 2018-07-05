-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2018 at 01:58 PM
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
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jumlah_suaras`
--

INSERT INTO `jumlah_suaras` (`id`, `tps_id`, `paslon_id`, `jumlah_suara`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 4, 5, 20, 5, '2018-05-24 12:26:18', NULL),
(2, 4, 6, 25, 5, '2018-05-24 12:26:18', NULL),
(3, 6, 5, 30, 7, '2018-05-24 12:26:18', NULL),
(4, 6, 6, 50, 7, '2018-05-24 12:26:18', NULL),
(5, 7, 5, 35, 5, '2018-05-27 15:15:52', NULL),
(6, 7, 6, 60, 5, '2018-05-27 15:16:22', NULL),
(19, 8, 5, 100, 5, '2018-07-05 11:47:24', NULL),
(20, 8, 6, 20, 5, '2018-07-05 11:47:24', NULL);

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

--
-- Dumping data for table `paslons`
--

INSERT INTO `paslons` (`id`, `no_urut`, `nama_paslon`, `warna`) VALUES
(5, '1', 'Abdul - yahya', '#fad51d'),
(6, '2', 'Obama - Trump', '#21a6e6');

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
(4, 'TPS 01', 'Kel. Cipayung'),
(6, 'TPS 02', 'Kel. Beji'),
(7, 'TPS 03', 'Kel. Panmas'),
(8, 'TPS 04', 'Kel. Sawangan'),
(9, 'TPS 05', 'Kel. Sawangan'),
(10, 'TPS 06', 'Kel. Cilodong');

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
  `status` int(11) NOT NULL,
  `tps_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`, `status`, `tps_id`) VALUES
(4, 'khalid Yahya', 'khalid.yahya9@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 0, 4),
(5, 'John Doe', 'john.doe@email.com', 'c4ca4238a0b923820dcc509a6f75849b', 'Relawan', 1, 8),
(7, 'Will Smith', 'will.smith@email.com', 'c4ca4238a0b923820dcc509a6f75849b', 'Relawan', 0, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jumlah_suaras`
--
ALTER TABLE `jumlah_suaras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_suara_tps` (`tps_id`),
  ADD KEY `FK_suara_paslon` (`paslon_id`),
  ADD KEY `FK_suara_user` (`user_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `paslons`
--
ALTER TABLE `paslons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tps`
--
ALTER TABLE `tps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jumlah_suaras`
--
ALTER TABLE `jumlah_suaras`
  ADD CONSTRAINT `FK_suara_paslon` FOREIGN KEY (`paslon_id`) REFERENCES `paslons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_suara_tps` FOREIGN KEY (`tps_id`) REFERENCES `tps` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_suara_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_tps` FOREIGN KEY (`tps_id`) REFERENCES `tps` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
