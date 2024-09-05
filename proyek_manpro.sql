-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 05, 2024 at 09:53 AM
-- Server version: 8.0.39-cll-lve
-- PHP Version: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slgpetra_manpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name_admin` text COLLATE utf8mb4_general_ci NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `name_admin`, `password`, `status`) VALUES
('admin1', '123', '$2y$10$1MBY0XpYQ.bS2qMAQ6pvbuJQQRZdrE5wo.HSCfuiQer6nfWJW73BC', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bay`
--

CREATE TABLE `bay` (
  `id_bay` int NOT NULL,
  `nama_bay` text COLLATE utf8mb4_general_ci NOT NULL,
  `detail_bay` text COLLATE utf8mb4_general_ci NOT NULL,
  `id_deck` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bay`
--

INSERT INTO `bay` (`id_bay`, `nama_bay`, `detail_bay`, `id_deck`) VALUES
(1, 'SBY', 'Surabaya', 1),
(2, 'MDN', 'Medan', 1),
(3, 'JYP', 'Jayapura', 1),
(4, 'MKS', 'Makassar', 1),
(5, 'BPP', 'Balikpapan', 0),
(6, 'JKT', 'Jakarta', 0);

-- --------------------------------------------------------

--
-- Table structure for table `container`
--

CREATE TABLE `container` (
  `id_container` int NOT NULL,
  `asal_container` text COLLATE utf8mb4_general_ci NOT NULL,
  `tujuan_container` text COLLATE utf8mb4_general_ci NOT NULL,
  `id_sales` int NOT NULL,
  `types` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `container`
--

INSERT INTO `container` (`id_container`, `asal_container`, `tujuan_container`, `id_sales`, `types`) VALUES
(374, 'SBY', 'MKS', 1, 'DRY'),
(375, 'SBY', 'MKS', 1, 'DRY'),
(376, 'SBY', 'MKS', 1, 'DRY'),
(377, 'SBY', 'MKS', 5, 'REFEER'),
(378, 'SBY', 'MKS', 5, 'REFEER'),
(379, 'MDN', 'SBY', 11, 'DRY'),
(380, 'MDN', 'SBY', 11, 'DRY'),
(381, 'MDN', 'SBY', 15, 'REFEER'),
(382, 'MDN', 'SBY', 15, 'REFEER'),
(383, 'MDN', 'SBY', 15, 'REFEER'),
(384, 'JYP', 'MDN', 21, 'DRY'),
(385, 'JYP', 'MDN', 21, 'DRY'),
(386, 'JYP', 'MDN', 25, 'REFEER'),
(387, 'JYP', 'MDN', 25, 'REFEER'),
(388, 'MKS', 'JYP', 31, 'DRY'),
(389, 'MKS', 'JYP', 31, 'DRY'),
(390, 'MKS', 'JYP', 31, 'DRY'),
(391, 'MKS', 'JYP', 35, 'REFEER');

-- --------------------------------------------------------

--
-- Table structure for table `deck`
--

CREATE TABLE `deck` (
  `id_deck` int NOT NULL,
  `nama_deck` text COLLATE utf8mb4_general_ci NOT NULL,
  `list_card` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ;

--
-- Dumping data for table `deck`
--

INSERT INTO `deck` (`id_deck`, `nama_deck`, `list_card`) VALUES
(1, 'Trial #1', '[\"1\",\"5\",\"11\",\"15\",\"21\",\"25\",\"31\",\"35\"]'),
(2, 'Trial #2', '[]');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `date` date NOT NULL,
  `round` int NOT NULL,
  `team_name` text COLLATE utf8mb4_general_ci NOT NULL,
  `ship` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `origin` text COLLATE utf8mb4_general_ci NOT NULL,
  `revenue` int NOT NULL,
  `id_room` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log_admin`
--

CREATE TABLE `log_admin` (
  `id` int NOT NULL,
  `detail` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_admin`
--

INSERT INTO `log_admin` (`id`, `detail`) VALUES
(20, 'sam1 has added nivlek into database.'),
(21, 'sam1 has added nivlek into database.'),
(22, 'sam1 has added nivlek into database.'),
(23, 'sam1 has added nivlek into database.'),
(24, 'sam1 has added nivlek into database.'),
(25, 'sam1 has added nivlek into database.'),
(26, 'sam1 has added nivlek into database.'),
(27, 'sam1 has added nivlek into database.'),
(28, 'sam1 has added nivlek into database.'),
(29, 'admin1 has added admin2 into database.'),
(30, 'admin1 has deleted admin2 from database.'),
(31, 'admin1 has added admin into database.'),
(32, 'admin1 has deleted admin from database.'),
(33, 'admin1 has added admin into database.'),
(34, 'admin1 has deleted admin from database.'),
(35, 'admin1 has added 1 into database.'),
(36, 'admin1 has deleted 1 from database.'),
(37, 'admin1 has added 1 into database.'),
(38, 'admin1 has deleted 1 from database.'),
(39, 'admin1 has added 1 into database.'),
(40, 'admin1 has deleted 1 from database.');

-- --------------------------------------------------------

--
-- Table structure for table `log_users`
--

CREATE TABLE `log_users` (
  `id` int NOT NULL,
  `id_room` int NOT NULL,
  `detail` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id_room` int NOT NULL,
  `id_admin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` int NOT NULL,
  `tanggal` date DEFAULT NULL,
  `id_deck` int NOT NULL,
  `ronde` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id_sales` int NOT NULL,
  `priority` text COLLATE utf8mb4_general_ci NOT NULL,
  `origin` text COLLATE utf8mb4_general_ci NOT NULL,
  `destination` text COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` int NOT NULL,
  `revenue` int NOT NULL,
  `types` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id_sales`, `priority`, `origin`, `destination`, `quantity`, `revenue`, `types`) VALUES
(1, 'COMMIT', 'SBY', 'MKS', 3, 30000, 'DRY'),
(5, 'COMMIT', 'SBY', 'MKS', 2, 25000, 'REFEER'),
(21, 'COMMIT', 'JYP', 'MDN', 2, 20000, 'DRY'),
(25, 'COMMIT', 'JYP', 'MDN', 2, 20000, 'REFEER'),
(31, 'COMMIT', 'MKS', 'JYP', 3, 25000, 'DRY'),
(35, 'COMMIT', 'MKS', 'JYP', 1, 15000, 'REFEER');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `fine` int NOT NULL,
  `pay` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`fine`, `pay`) VALUES
(10000, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `temp_container`
--

CREATE TABLE `temp_container` (
  `id_container` int NOT NULL,
  `id_user` varchar(11) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temp_container`
--

INSERT INTO `temp_container` (`id_container`, `id_user`) VALUES
(384, 'nivlek'),
(385, 'nivlek');

-- --------------------------------------------------------

--
-- Table structure for table `temp_container2`
--

CREATE TABLE `temp_container2` (
  `id_container` int NOT NULL,
  `id_user` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temp_container2`
--

INSERT INTO `temp_container2` (`id_container`, `id_user`) VALUES
(381, 'nivlek'),
(382, 'nivlek'),
(383, 'nivlek');

-- --------------------------------------------------------

--
-- Table structure for table `temp_sales`
--

CREATE TABLE `temp_sales` (
  `id_sales` int NOT NULL,
  `priority` text COLLATE utf8mb4_general_ci NOT NULL,
  `origin` text COLLATE utf8mb4_general_ci NOT NULL,
  `destination` text COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` int NOT NULL,
  `revenue` int NOT NULL,
  `id_user` text COLLATE utf8mb4_general_ci NOT NULL,
  `types` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temp_sales`
--

INSERT INTO `temp_sales` (`id_sales`, `priority`, `origin`, `destination`, `quantity`, `revenue`, `id_user`, `types`) VALUES
(11, 'COMMIT', 'MDN', 'SBY', 2, 10000, 'nivlek', 'DRY'),
(15, 'COMMIT', 'MDN', 'SBY', 3, 10000, 'nivlek', 'REFEER');

-- --------------------------------------------------------

--
-- Table structure for table `temp_user`
--

CREATE TABLE `temp_user` (
  `team_name` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `id_room` int NOT NULL,
  `revenue` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `team_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ship` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `status` int DEFAULT NULL,
  `id_room` int NOT NULL,
  `origin` text COLLATE utf8mb4_general_ci,
  `revenue` int NOT NULL,
  `round` int NOT NULL,
  `pindah` text COLLATE utf8mb4_general_ci NOT NULL,
  `finish` int NOT NULL,
  `chance` int NOT NULL,
  `max_chances` int NOT NULL
) ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`team_name`, `password`, `ship`, `status`, `id_room`, `origin`, `revenue`, `round`, `pindah`, `finish`, `chance`, `max_chances`) VALUES
('kelvin', '$2y$10$/1K9jemHvyYJ3GzvhXiml.NbTYZCK2DYFaURansb2AmnqegpSKMeK', '[[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 0, 0, NULL, 0, 0, 'NO', 0, 1, 0),
('nivlek', '$2y$10$/1K9jemHvyYJ3GzvhXiml.NbTYZCK2DYFaURansb2AmnqegpSKMeK', '[[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 1, 1, 'MDN', -10000, 1, 'NO', 1, 1, 0),
('sam', '$2y$10$/1K9jemHvyYJ3GzvhXiml.NbTYZCK2DYFaURansb2AmnqegpSKMeK', '[[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 0, 0, NULL, 0, 0, 'NO', 0, 1, 0),
('Vincentius', '$2y$10$/1K9jemHvyYJ3GzvhXiml.NbTYZCK2DYFaURansb2AmnqegpSKMeK', '[[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 0, 0, NULL, 0, 0, 'NO', 0, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `bay`
--
ALTER TABLE `bay`
  ADD PRIMARY KEY (`id_bay`);

--
-- Indexes for table `container`
--
ALTER TABLE `container`
  ADD PRIMARY KEY (`id_container`);

--
-- Indexes for table `deck`
--
ALTER TABLE `deck`
  ADD PRIMARY KEY (`id_deck`);

--
-- Indexes for table `log_admin`
--
ALTER TABLE `log_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_users`
--
ALTER TABLE `log_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id_room`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id_sales`);

--
-- Indexes for table `temp_container2`
--
ALTER TABLE `temp_container2`
  ADD PRIMARY KEY (`id_container`);

--
-- Indexes for table `temp_sales`
--
ALTER TABLE `temp_sales`
  ADD PRIMARY KEY (`id_sales`);

--
-- Indexes for table `temp_user`
--
ALTER TABLE `temp_user`
  ADD PRIMARY KEY (`team_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`team_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bay`
--
ALTER TABLE `bay`
  MODIFY `id_bay` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `container`
--
ALTER TABLE `container`
  MODIFY `id_container` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=392;

--
-- AUTO_INCREMENT for table `log_admin`
--
ALTER TABLE `log_admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `log_users`
--
ALTER TABLE `log_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=356;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
