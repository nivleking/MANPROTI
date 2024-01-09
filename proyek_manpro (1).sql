-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2024 at 03:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek_manpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(4) NOT NULL,
  `name_admin` text NOT NULL,
  `password` varchar(7) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `name_admin`, `password`, `status`) VALUES
('sam1', '123', '123', 0),
('sam2', '123', '123', 0),
('sam3', '123', '123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bay`
--

CREATE TABLE `bay` (
  `id_bay` int(11) NOT NULL,
  `nama_bay` text NOT NULL,
  `detail_bay` text NOT NULL,
  `id_deck` int(11) NOT NULL
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
  `id_container` int(10) NOT NULL,
  `asal_container` text NOT NULL,
  `tujuan_container` text NOT NULL,
  `id_sales` int(10) NOT NULL,
  `types` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `container`
--

INSERT INTO `container` (`id_container`, `asal_container`, `tujuan_container`, `id_sales`, `types`) VALUES
(392, 'SBY', 'MKS', 1, 'DRY'),
(393, 'SBY', 'MKS', 1, 'DRY'),
(394, 'SBY', 'MKS', 1, 'DRY'),
(395, 'SBY', 'MKS', 1, 'DRY'),
(396, 'SBY', 'MKS', 1, 'DRY'),
(397, 'SBY', 'MKS', 5, 'REFEER'),
(398, 'SBY', 'MKS', 5, 'REFEER'),
(399, 'SBY', 'MKS', 5, 'REFEER'),
(400, 'SBY', 'MKS', 5, 'REFEER'),
(401, 'SBY', 'MKS', 5, 'REFEER'),
(402, 'MDN', 'SBY', 11, 'DRY'),
(403, 'MDN', 'SBY', 11, 'DRY'),
(404, 'MDN', 'SBY', 11, 'DRY'),
(405, 'MDN', 'SBY', 11, 'DRY'),
(406, 'MDN', 'SBY', 11, 'DRY'),
(407, 'MDN', 'SBY', 15, 'REFEER'),
(408, 'MDN', 'SBY', 15, 'REFEER'),
(409, 'MDN', 'SBY', 15, 'REFEER'),
(410, 'MDN', 'SBY', 15, 'REFEER'),
(411, 'MDN', 'SBY', 15, 'REFEER'),
(412, 'JYP', 'MDN', 21, 'DRY'),
(413, 'JYP', 'MDN', 21, 'DRY'),
(414, 'JYP', 'MDN', 21, 'DRY'),
(415, 'JYP', 'MDN', 21, 'DRY'),
(416, 'JYP', 'MDN', 21, 'DRY'),
(417, 'JYP', 'MDN', 25, 'REFEER'),
(418, 'JYP', 'MDN', 25, 'REFEER'),
(419, 'JYP', 'MDN', 25, 'REFEER'),
(420, 'JYP', 'MDN', 25, 'REFEER'),
(421, 'JYP', 'MDN', 25, 'REFEER'),
(422, 'MKS', 'JYP', 31, 'DRY'),
(423, 'MKS', 'JYP', 31, 'DRY'),
(424, 'MKS', 'JYP', 31, 'DRY'),
(425, 'MKS', 'JYP', 31, 'DRY'),
(426, 'MKS', 'JYP', 31, 'DRY'),
(427, 'MKS', 'JYP', 35, 'REFEER'),
(428, 'MKS', 'JYP', 35, 'REFEER'),
(429, 'MKS', 'JYP', 35, 'REFEER'),
(430, 'MKS', 'JYP', 35, 'REFEER'),
(431, 'MKS', 'JYP', 35, 'REFEER');

-- --------------------------------------------------------

--
-- Table structure for table `deck`
--

CREATE TABLE `deck` (
  `id_deck` int(11) NOT NULL,
  `nama_deck` text NOT NULL,
  `list_card` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`list_card`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `round` int(11) NOT NULL,
  `team_name` text NOT NULL,
  `ship` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `origin` text NOT NULL,
  `revenue` int(11) NOT NULL,
  `id_room` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`date`, `round`, `team_name`, `ship`, `origin`, `revenue`, `id_room`) VALUES
('2024-01-09', 0, 'kelvin', '[[[0,0,0],[0,0,0],[\"392\",0,0]],[[0,0,0],[0,0,0],[\"393\",0,0]],[[0,0,0],[0,0,0],[\"394\",0,0]],[[0,0,0],[0,0,0],[\"395\",0,0]],[[0,0,0],[0,0,0],[\"396\",0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 'SBY', 5000, 1),
('2024-01-09', 0, 'nivlek', '[[[\"404\",0,0],[\"403\",\"406\",0],[\"402\",\"405\",0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 'MDN', -5000, 1),
('2024-01-09', 0, 'sam', '[[[0,0,0],[0,0,0],[\"416\",0,0]],[[0,0,0],[\"413\",0,0],[\"412\",\"414\",\"415\"]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 'JYP', 37500, 1),
('2024-01-09', 0, 'Vincentius', '[[[0,0,0],[0,0,0],[\"427\",\"428\",\"429\"]],[[0,0,0],[0,0,0],[\"430\",\"431\",0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 'MKS', 15000, 1),
('2024-01-09', 1, 'kelvin', '[[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 'SBY', 55000, 1),
('2024-01-09', 1, 'nivlek', '[[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 'MDN', 0, 1),
('2024-01-09', 1, 'sam', '[[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 'JYP', 50000, 1),
('2024-01-09', 1, 'Vincentius', '[[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 'MKS', 65000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `log_admin`
--

CREATE TABLE `log_admin` (
  `id` int(11) NOT NULL,
  `detail` text NOT NULL
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
(28, 'sam1 has added nivlek into database.');

-- --------------------------------------------------------

--
-- Table structure for table `log_users`
--

CREATE TABLE `log_users` (
  `id` int(11) NOT NULL,
  `id_room` int(11) NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_users`
--

INSERT INTO `log_users` (`id`, `id_room`, `detail`) VALUES
(260, 1, 'kelvin has loaded container 392 into 020.'),
(261, 1, 'kelvin has loaded container 393 into 120.'),
(262, 1, 'kelvin has loaded container 394 into 220.'),
(263, 1, 'kelvin has loaded container 395 into 320.'),
(264, 1, 'kelvin has unloaded container 395 from 320.'),
(265, 1, 'kelvin has loaded container 395 into 320.'),
(266, 1, 'kelvin has loaded container 396 into 420.'),
(267, 1, 'nivlek has loaded container 402 into 020.'),
(268, 1, 'nivlek has loaded container 403 into 010.'),
(269, 1, 'nivlek has loaded container 404 into 000.'),
(270, 1, 'nivlek has loaded container 405 into 021.'),
(271, 1, 'nivlek has loaded container 406 into 011.'),
(272, 1, 'Vincentius has loaded container 427 into 020.'),
(273, 1, 'Vincentius has loaded container 428 into 021.'),
(274, 1, 'Vincentius has loaded container 429 into 022.'),
(275, 1, 'Vincentius has loaded container 430 into 120.'),
(276, 1, 'Vincentius has loaded container 431 into 121.'),
(277, 1, 'sam has loaded container 412 into 120.'),
(278, 1, 'sam has loaded container 413 into 110.'),
(279, 1, 'sam has loaded container 414 into 121.'),
(280, 1, 'sam has loaded container 415 into 122.'),
(281, 1, 'sam has loaded container 416 into 020.'),
(282, 1, 'kelvin has unloaded container 404 from 000.'),
(283, 1, 'kelvin has unloaded container 403 from 010.'),
(284, 1, 'kelvin has unloaded container 402 from 020.'),
(285, 1, 'kelvin has unloaded container 406 from 011.'),
(286, 1, 'kelvin has unloaded container 405 from 021.'),
(287, 1, 'sam has unloaded container 427 from 020.'),
(288, 1, 'sam has unloaded container 428 from 021.'),
(289, 1, 'sam has unloaded container 429 from 022.'),
(290, 1, 'sam has unloaded container 430 from 120.'),
(291, 1, 'sam has unloaded container 431 from 121.'),
(292, 1, 'Vincentius has unloaded container 392 from 020.'),
(293, 1, 'Vincentius has unloaded container 393 from 120.'),
(294, 1, 'Vincentius has unloaded container 394 from 220.'),
(295, 1, 'Vincentius has unloaded container 395 from 320.'),
(296, 1, 'Vincentius has unloaded container 396 from 420.'),
(297, 1, 'nivlek has unloaded container 416 from 020.'),
(298, 1, 'nivlek has unloaded container 413 from 110.'),
(299, 1, 'nivlek has unloaded container 412 from 120.'),
(300, 1, 'nivlek has unloaded container 414 from 121.'),
(301, 1, 'nivlek has unloaded container 415 from 122.'),
(302, 1, 'kelvin has cleared Section 1.');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id_room` int(4) NOT NULL,
  `id_admin` varchar(4) NOT NULL,
  `status` int(1) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `id_deck` int(11) NOT NULL,
  `ronde` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id_room`, `id_admin`, `status`, `tanggal`, `id_deck`, `ronde`) VALUES
(1, 'sam1', 0, '2024-01-09', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id_sales` int(255) NOT NULL,
  `priority` text NOT NULL,
  `origin` text NOT NULL,
  `destination` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `revenue` int(11) NOT NULL,
  `types` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id_sales`, `priority`, `origin`, `destination`, `quantity`, `revenue`, `types`) VALUES
(1, 'COMMIT', 'SBY', 'MKS', 5, 15000, 'DRY'),
(5, 'COMMIT', 'SBY', 'MKS', 5, 20000, 'REFEER'),
(11, 'COMMIT', 'MDN', 'SBY', 5, 9000, 'DRY'),
(15, 'COMMIT', 'MDN', 'SBY', 5, 11000, 'REFEER'),
(21, 'COMMIT', 'JYP', 'MDN', 5, 17500, 'DRY'),
(25, 'COMMIT', 'JYP', 'MDN', 5, 12500, 'REFEER'),
(31, 'COMMIT', 'MKS', 'JYP', 5, 20000, 'DRY'),
(35, 'COMMIT', 'MKS', 'JYP', 5, 13000, 'REFEER');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `fine` int(11) NOT NULL,
  `pay` int(11) NOT NULL
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
  `id_container` int(11) NOT NULL,
  `id_user` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temp_container2`
--

CREATE TABLE `temp_container2` (
  `id_container` int(11) NOT NULL,
  `id_user` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temp_sales`
--

CREATE TABLE `temp_sales` (
  `id_sales` int(11) NOT NULL,
  `priority` text NOT NULL,
  `origin` text NOT NULL,
  `destination` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `revenue` int(11) NOT NULL,
  `id_user` text NOT NULL,
  `types` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temp_user`
--

CREATE TABLE `temp_user` (
  `team_name` varchar(10) NOT NULL,
  `id_room` int(11) NOT NULL,
  `revenue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temp_user`
--

INSERT INTO `temp_user` (`team_name`, `id_room`, `revenue`) VALUES
('kelvin', 1, 55000),
('nivlek', 1, 0),
('sam', 1, 50000),
('Vincentius', 1, 65000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `team_name` varchar(10) NOT NULL,
  `password` varchar(5) NOT NULL,
  `ship` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`ship`)),
  `status` int(1) DEFAULT NULL,
  `id_room` int(4) NOT NULL,
  `origin` text DEFAULT NULL,
  `revenue` int(255) NOT NULL,
  `round` int(11) NOT NULL,
  `pindah` text NOT NULL,
  `finish` int(11) NOT NULL,
  `chance` int(11) NOT NULL,
  `max_chances` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`team_name`, `password`, `ship`, `status`, `id_room`, `origin`, `revenue`, `round`, `pindah`, `finish`, `chance`, `max_chances`) VALUES
('kelvin', '123', '[[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 0, 0, NULL, 0, 0, 'NO', 0, 1, 0),
('nivlek', '123', '[[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 0, 0, NULL, 0, 0, 'NO', 0, 1, 0),
('sam', '123', '[[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 0, 0, NULL, 0, 0, 'NO', 0, 1, 0),
('Vincentius', '123', '[[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 0, 0, NULL, 0, 0, 'NO', 0, 1, 0);

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
  MODIFY `id_bay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `container`
--
ALTER TABLE `container`
  MODIFY `id_container` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=432;

--
-- AUTO_INCREMENT for table `log_admin`
--
ALTER TABLE `log_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `log_users`
--
ALTER TABLE `log_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
