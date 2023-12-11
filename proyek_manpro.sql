-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 10:57 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bay`
--

INSERT INTO `bay` (`id_bay`, `nama_bay`, `detail_bay`, `id_deck`) VALUES
(1, 'SBY', 'Surabaya', 1),
(2, 'MDN', 'Medan', 1),
(3, 'JYP', 'Jayapura', 0),
(4, 'MKS', 'Makassar', 0),
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
  `id_sales` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `container`
--

INSERT INTO `container` (`id_container`, `asal_container`, `tujuan_container`, `id_sales`) VALUES
(339, 'SBY', 'MDN', 10),
(340, 'SBY', 'MDN', 10),
(341, 'SBY', 'MDN', 10),
(342, 'SBY', 'MDN', 11),
(343, 'SBY', 'MDN', 11),
(344, 'MDN', 'SBY', 15),
(345, 'MDN', 'SBY', 15),
(346, 'MDN', 'SBY', 15),
(347, 'MDN', 'SBY', 16),
(348, 'MDN', 'SBY', 16);

-- --------------------------------------------------------

--
-- Table structure for table `deck`
--

CREATE TABLE `deck` (
  `id_deck` int(11) NOT NULL,
  `nama_deck` text NOT NULL,
  `list_card` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`list_card`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deck`
--

INSERT INTO `deck` (`id_deck`, `nama_deck`, `list_card`) VALUES
(1, 'Trial #1', '[\"10\",\"11\",\"15\",\"16\"]'),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`date`, `round`, `team_name`, `ship`, `origin`, `revenue`, `id_room`) VALUES
('2023-12-05', 0, 'kelvin', '[[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 'MDN', 392000, 1),
('2023-12-05', 0, 'Vincentius', '[[[0,0,0],[0,0,0],[\"301\",\"302\",0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 'SBY', 1583000, 1),
('2023-12-05', 0, 'kelvin', '[[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 'MDN', 1023000, 2),
('2023-12-05', 0, 'Vincentius', '[[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 'SBY', 1643000, 2),
('2023-12-05', 1, 'Vincentius', '[[[0,0,0],[0,0,0],[0,0,0]]]', 'SBY', 1631000, 4),
('2023-12-07', 1, 'kelvin', '[[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 'SBY', 0, 5),
('2023-12-07', 1, 'Vincentius', '[[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 'MDN', 0, 5),
('2023-12-07', 1, 'kelvin', '[[[\"333\",0,0],[\"332\",0,0],[\"331\",\"334\",0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 'SBY', 92000, 5),
('2023-12-07', 1, 'Vincentius', '[[[0,0,0],[\"336\",0,0],[\"335\",\"337\",\"338\"]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 'MDN', 92000, 5),
('2023-12-11', 1, 'kelvin', '[[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 'SBY', 84000, 7),
('2023-12-11', 1, 'Vincentius', '[[[\"346\",0,0],[\"345\",0,0],[\"344\",0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 'MDN', 228000, 7),
('2023-12-11', 0, 'kelvin', '[[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 'SBY', 268000, 8),
('2023-12-11', 0, 'Vincentius', '[[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 'MDN', 458000, 8),
('2023-12-11', 0, 'kelvin', '[[[0,0,0],[\"342\",\"343\",0],[\"339\",\"340\",\"341\"]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 'SBY', 250500, 8),
('2023-12-11', 0, 'Vincentius', '[[[\"345\",0,0],[\"348\",0,0],[\"344\",\"346\",0]],[[0,0,0],[0,0,0],[\"347\",0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 'MDN', 440500, 8);

-- --------------------------------------------------------

--
-- Table structure for table `log_admin`
--

CREATE TABLE `log_admin` (
  `id` int(11) NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_admin`
--

INSERT INTO `log_admin` (`id`, `detail`) VALUES
(18, 'sam1 has added sam3 into database.'),
(19, 'sam1 has added  into database.');

-- --------------------------------------------------------

--
-- Table structure for table `log_users`
--

CREATE TABLE `log_users` (
  `id` int(11) NOT NULL,
  `id_room` int(11) NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_users`
--

INSERT INTO `log_users` (`id`, `id_room`, `detail`) VALUES
(149, 4, 'Vincentius has cleared Section 1.'),
(150, 4, 'Vincentius has cleared Section 1.'),
(151, 5, 'kelvin has cleared Section 1.'),
(152, 5, 'Vincentius has cleared Section 1.'),
(153, 5, 'kelvin has cleared Section 1.'),
(154, 5, 'Vincentius has cleared Section 1.'),
(155, 5, 'kelvin has cleared Section 1.'),
(156, 5, 'Vincentius has cleared Section 1.'),
(157, 5, 'kelvin has cleared Section 1.'),
(158, 5, 'Vincentius has cleared Section 1.'),
(159, 5, 'kelvin has loaded container 331 into 020.'),
(160, 5, 'kelvin has loaded container 332 into 010.'),
(161, 5, 'kelvin has loaded container 333 into 000.'),
(162, 5, 'kelvin has loaded container 334 into 021.'),
(163, 5, 'Vincentius has loaded container 335 into 020.'),
(164, 5, 'Vincentius has loaded container 336 into 010.'),
(165, 5, 'Vincentius has loaded container 337 into 021.'),
(166, 5, 'Vincentius has loaded container 338 into 022.'),
(167, 5, 'kelvin has unloaded container 336 from 010.'),
(168, 5, 'kelvin has unloaded container 335 from 020.'),
(169, 5, 'kelvin has unloaded container 337 from 021.'),
(170, 5, 'kelvin has unloaded container 338 from 022.'),
(171, 5, 'Vincentius has unloaded container 333 from 000.'),
(172, 5, 'Vincentius has unloaded container 332 from 010.'),
(173, 5, 'Vincentius has unloaded container 331 from 020.'),
(174, 5, 'Vincentius has unloaded container 334 from 021.'),
(175, 5, 'kelvin has cleared Section 1.'),
(176, 7, 'Vincentius has loaded container 344 into 020.'),
(177, 7, 'Vincentius has loaded container 345 into 010.'),
(178, 7, 'Vincentius has loaded container 346 into 000.'),
(179, 7, 'kelvin has unloaded container 346 from 000.'),
(180, 7, 'kelvin has unloaded container 345 from 010.'),
(181, 7, 'kelvin has unloaded container 344 from 020.'),
(182, 7, 'kelvin has cleared Section 1.'),
(183, 7, 'Vincentius has cleared Section 1.'),
(184, 8, 'kelvin has loaded container 339 into 020.'),
(185, 8, 'kelvin has loaded container 340 into 021.'),
(186, 8, 'kelvin has loaded container 341 into 022.'),
(187, 8, 'kelvin has loaded container 342 into 010.'),
(188, 8, 'kelvin has loaded container 343 into 011.'),
(189, 8, 'Vincentius has loaded container 344 into 020.'),
(190, 8, 'Vincentius has loaded container 348 into 010.'),
(191, 8, 'Vincentius has loaded container 345 into 000.'),
(192, 8, 'Vincentius has loaded container 346 into 021.'),
(193, 8, 'Vincentius has loaded container 347 into 120.'),
(194, 8, 'Vincentius has unloaded container 342 from 010.'),
(195, 8, 'Vincentius has unloaded container 339 from 020.'),
(196, 8, 'Vincentius has unloaded container 343 from 011.'),
(197, 8, 'Vincentius has unloaded container 340 from 021.'),
(198, 8, 'Vincentius has unloaded container 341 from 022.'),
(199, 8, 'kelvin has unloaded container 345 from 000.'),
(200, 8, 'kelvin has unloaded container 348 from 010.'),
(201, 8, 'kelvin has unloaded container 344 from 020.'),
(202, 8, 'kelvin has unloaded container 346 from 021.'),
(203, 8, 'kelvin has unloaded container 347 from 120.'),
(204, 8, 'kelvin has cleared Section 1.'),
(205, 8, 'kelvin has cleared Section 1.');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id_room`, `id_admin`, `status`, `tanggal`, `id_deck`, `ronde`) VALUES
(1, 'sam1', 0, '2023-12-05', 4, 0),
(2, 'sam1', 0, '2023-12-05', 4, 0),
(3, 'sam1', 1, '2023-12-05', 4, 0),
(4, 'sam1', 0, '2023-12-05', 4, 0),
(5, 'sam1', 0, '2023-12-07', 5, 0),
(6, 'sam1', 0, '2023-12-11', 1, 0),
(7, 'sam1', 0, '2023-12-11', 1, 0),
(8, 'sam1', 0, '2023-12-11', 1, 0);

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
  `revenue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id_sales`, `priority`, `origin`, `destination`, `quantity`, `revenue`) VALUES
(10, 'COMMIT', 'SBY', 'MDN', 3, 30000),
(11, 'N-COMMIT', 'SBY', 'MDN', 2, 50000),
(15, 'COMMIT', 'MDN', 'SBY', 3, 50000),
(16, 'N-COMMIT', 'MDN', 'SBY', 2, 40000);

-- --------------------------------------------------------

--
-- Table structure for table `temp_container`
--

CREATE TABLE `temp_container` (
  `id_container` int(11) NOT NULL,
  `id_user` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `temp_container2`
--

CREATE TABLE `temp_container2` (
  `id_container` int(11) NOT NULL,
  `id_user` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `id_user` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `finish` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`team_name`, `password`, `ship`, `status`, `id_room`, `origin`, `revenue`, `round`, `pindah`, `finish`) VALUES
('kelvin', '123', '[[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 0, 0, NULL, 0, 0, 'NO', 0),
('sam', '12', '[[[0,0,0],[\"120\",101,0],[\"112\",105,0]],[[0,0,0],[104,0,0],[106,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 0, 140, NULL, 0, 0, 'NO', 0),
('Vincentius', '123', '[[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 0, 0, NULL, 0, 0, 'NO', 0);

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
  MODIFY `id_container` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=349;

--
-- AUTO_INCREMENT for table `log_admin`
--
ALTER TABLE `log_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `log_users`
--
ALTER TABLE `log_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
