-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2023 at 02:23 PM
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
('sam2', '123', '123', 0);

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
(1, 'SBY', 'Surabaya', 4),
(2, 'MDN', 'Medan', 4),
(3, 'JYP', 'Jayapura', 4),
(4, 'MKS', 'Makassar', 4),
(5, 'BPP', 'Balikpapan', 4),
(6, 'JKT', 'Jakarta', 4);

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

-- --------------------------------------------------------

--
-- Table structure for table `deck`
--

CREATE TABLE `deck` (
  `id_deck` int(11) NOT NULL,
  `qty_bay` int(11) NOT NULL,
  `nama_deck` text NOT NULL,
  `list_card` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`list_card`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deck`
--

INSERT INTO `deck` (`id_deck`, `qty_bay`, `nama_deck`, `list_card`) VALUES
(4, 2, 'Trial #1', '[\"1\",\"2\",\"3\",\"4\"]');

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
('2023-12-05', 1, 'Vincentius', '[[[0,0,0],[0,0,0],[0,0,0]]]', 'SBY', 1631000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `log_admin`
--

CREATE TABLE `log_admin` (
  `id` int(11) NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(150, 4, 'Vincentius has cleared Section 1.');

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
(4, 'sam1', 0, '2023-12-05', 4, 0);

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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `team_name` varchar(10) NOT NULL,
  `password` varchar(5) NOT NULL,
  `ship` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`ship`)),
  `status` int(1) DEFAULT NULL,
  `id_room` int(4) NOT NULL,
  `origin` text NOT NULL,
  `revenue` int(255) NOT NULL,
  `round` int(11) NOT NULL,
  `pindah` text NOT NULL,
  `finish` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`team_name`, `password`, `ship`, `status`, `id_room`, `origin`, `revenue`, `round`, `pindah`, `finish`) VALUES
('kelvin', '123', '[[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 1, 3, 'SBY', 1003500, 0, 'NO', 1),
('sam', '12', '[[[0,0,0],[\"120\",101,0],[\"112\",105,0]],[[0,0,0],[104,0,0],[106,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 0, 140, 'SBY', 0, 0, 'NO', 0),
('Vincentius', '123', '[[[0,0,0],[0,0,0],[0,0,0]]]', 0, 4, 'SBY', 1631000, 0, 'NO', 0);

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
  MODIFY `id_container` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=331;

--
-- AUTO_INCREMENT for table `log_admin`
--
ALTER TABLE `log_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `log_users`
--
ALTER TABLE `log_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
