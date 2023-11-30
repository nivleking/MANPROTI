-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2023 at 08:10 AM
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
('kel1', '123', '1', 0),
('kel2', '123', '1', 0),
('kel3', '12', '12', 0),
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
(1, 'SBY', 'Surabaya', 1),
(2, 'MDN', 'Medan', 1),
(3, 'JYP', 'Jayapura', 1),
(4, 'MKS', 'Makassar', 1);

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
(100, 'SBY', 'MKS', 1),
(101, 'SBY', 'JKT', 1),
(102, 'MDR', 'SBY', 2),
(103, 'SBY', 'MKS', 3),
(104, 'JKT', 'BPP', 3),
(105, 'SBY', 'JKT', 3),
(106, 'SBY', 'BPP', 3),
(107, 'BPP', 'SBY', 3),
(108, 'BPP', 'JKT', 5),
(109, 'JKT', 'SBY', 4),
(110, 'SBY', 'MDN', 5),
(111, 'SBY', 'MDN', 5),
(112, 'SBY', 'MDN', 5),
(113, 'SBY', 'MDN', 5),
(114, 'SBY', 'MDN', 5),
(115, 'SBY', 'MDN', 5),
(116, 'SBY', 'MDN', 5),
(117, 'SBY', 'MDN', 5),
(118, 'SBY', 'MDN', 5),
(119, 'SBY', 'MDN', 5),
(120, 'SBY', 'MDN', 10),
(121, 'SBY', 'MDN', 10),
(122, 'SBY', 'MDN', 10),
(123, 'SBY', 'MDN', 10),
(124, 'SBY', 'MDN', 10),
(125, 'SBY', 'MDN', 10),
(126, 'SBY', 'MDN', 10),
(127, 'SBY', 'MDN', 10),
(128, 'SBY', 'MDN', 10),
(129, 'SBY', 'JYP', 6),
(130, 'SBY', 'JYP', 6),
(131, 'SBY', 'JYP', 6),
(132, 'SBY', 'JYP', 6),
(133, 'SBY', 'JYP', 6),
(134, 'SBY', 'JYP', 6),
(135, 'SBY', 'JYP', 6),
(136, 'SBY', 'JYP', 6),
(137, 'SBY', 'MKS', 7),
(138, 'SBY', 'MKS', 7),
(139, 'SBY', 'MKS', 7),
(140, 'SBY', 'MKS', 7),
(141, 'SBY', 'MKS', 7),
(142, 'SBY', 'MKS', 7),
(143, 'SBY', 'MKS', 7),
(144, 'SBY', 'MKS', 7),
(145, 'SBY', 'MKS', 7),
(146, 'SBY', 'MKS', 7),
(147, 'SBY', 'MKS', 7),
(148, 'SBY', 'MKS', 7),
(149, 'SBY', 'MKS', 7),
(150, 'SBY', 'MKS', 7);

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
(1, 5, 'A', '[\"5\"]'),
(2, 3, 'B', '[\"6\",\"7\"]'),
(3, 3, 'C', '[]');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `date` date NOT NULL,
  `round` int(11) NOT NULL,
  `team_name` text NOT NULL,
  `ship` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`ship`)),
  `origin` text NOT NULL,
  `revenue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`date`, `round`, `team_name`, `ship`, `origin`, `revenue`) VALUES
('2023-11-26', 0, 'kelvin', '[[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 'JYP', -2000),
('2023-11-26', 0, 'Vincentius', '[[[\"112\",0,0],[\"108\",0,0],[\"104\",\"105\",0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 'SBY', -59000),
('2023-11-27', 0, 'kelvin', '[[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 'SBY', -2000),
('2023-11-27', 0, 'Vincentius', '[[[\"112\",0,0],[\"108\",0,0],[\"104\",\"105\",0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 'SBY', -59000);

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
(1, 'Kelvin'),
(2, 'Kelvin'),
(3, 'Kelvin'),
(4, 'sam1 has deleted sam6 from database.'),
(5, 'sam1 has deleted sam5 from database.'),
(6, 'sam1 has deleted sam4 from database.'),
(7, 'sam1 has deleted sam3 from database.'),
(8, 'sam1 has added  into database.'),
(9, 'sam1 has added kel2 into database.'),
(10, 'sam1 has added kel3 into database.'),
(11, 'sam1 has added Aktonoi into database.'),
(12, 'sam1 has deleted Aktonoi from database.');

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
(0, 'sam1', 0, '2023-11-12', 0, 0),
(1, 'sam1', 1, '2023-11-18', 0, 0),
(2, 'sam1', 1, '2023-11-19', 1, 0),
(3, 'sam1', 0, '2023-11-19', 0, 0),
(4, 'sam1', 0, '2023-11-19', 0, 0),
(5, 'sam1', 0, '2023-11-19', 1, 0),
(6, 'sam1', 0, '2023-11-20', 1, 0),
(7, 'sam1', 1, '2023-11-20', 1, 0),
(8, 'sam1', 1, '2023-11-20', 1, 0),
(9, 'sam1', 1, '2023-11-26', 1, 0),
(11, 'sam1', 0, '2023-11-26', 1, 0),
(12, 'sam1', 1, '2023-11-26', 1, 0),
(13, 'sam1', 1, '2023-11-27', 1, 0),
(14, 'sam1', 0, '2023-11-28', 1, 0),
(15, 'sam1', 1, '2023-11-30', 1, 0),
(16, 'sam1', 0, '2023-11-30', 1, 0),
(17, 'sam1', 0, '2023-11-30', 1, 0),
(18, 'sam1', 1, '2023-11-30', 1, 0),
(19, 'sam1', 1, '2023-11-30', 1, 0),
(123, 'sam1', 1, '2023-11-15', 0, 0),
(124, 'sam1', 0, '2023-10-29', 0, 0),
(125, 'sam1', 0, '2023-10-29', 0, 0),
(126, 'sam1', 1, '2023-10-29', 0, 0),
(127, 'sam1', 1, '2023-10-29', 0, 0),
(128, 'sam1', 1, '2023-10-29', 0, 0),
(129, 'sam1', 1, '2023-10-29', 0, 0),
(130, 'sam1', 1, '2023-10-29', 0, 0),
(131, 'sam1', 1, '2023-10-30', 0, 0),
(132, 'sam1', 1, '2023-10-30', 0, 0),
(133, 'sam1', 1, '2023-10-30', 0, 0),
(134, 'sam1', 1, '2023-10-30', 0, 0),
(135, 'sam1', 0, '2023-11-03', 0, 0),
(136, 'sam1', 1, '2023-10-30', 0, 0),
(137, 'sam1', 0, '2023-11-03', 0, 0),
(138, 'sam1', 0, '2023-11-05', 0, 0),
(139, 'sam1', 1, '2023-11-05', 0, 0),
(140, 'sam1', 0, '2023-11-21', 1, 0),
(141, 'sam1', 1, '2023-11-08', 0, 0),
(142, 'sam1', 1, '2023-11-09', 0, 0),
(150, 'sam1', 0, '2023-11-09', 0, 0),
(151, 'sam1', 0, '2023-11-09', 0, 0),
(152, 'sam1', 0, '2023-11-12', 0, 0),
(174, 'sam1', 1, '2023-10-30', 0, 0),
(182, 'sam1', 1, '2023-11-06', 0, 0),
(500, 'sam1', 1, '2023-11-12', 0, 0),
(502, 'sam1', 1, '2023-11-12', 0, 0),
(603, 'sam1', 1, '2023-11-13', 0, 0),
(765, 'sam1', 1, '2023-11-13', 0, 0),
(767, 'sam1', 1, '2023-11-13', 0, 0),
(768, 'sam1', 0, '2023-11-13', 0, 0),
(769, 'sam1', 1, '2023-11-13', 0, 0),
(770, 'sam2', 1, '2023-11-16', 0, 0);

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
(5, 'COMMIT', 'SBY', 'MKS', 10, 5000),
(6, 'N-COMMIT', 'MDN', 'JYP', 8, 10000),
(7, 'COMMIT', 'SBY', 'MKS', 14, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `temp_container`
--

CREATE TABLE `temp_container` (
  `id_container` int(11) NOT NULL,
  `id_user` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temp_container`
--

INSERT INTO `temp_container` (`id_container`, `id_user`) VALUES
(107, 'Vincentius'),
(103, 'Vincentius'),
(106, 'Vincentius'),
(101, 'Vincentius'),
(110, 'Vincentius'),
(102, 'Vincentius'),
(120, 'Vincentius');

-- --------------------------------------------------------

--
-- Table structure for table `temp_container2`
--

CREATE TABLE `temp_container2` (
  `id_container` int(11) NOT NULL,
  `id_user` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temp_container2`
--

INSERT INTO `temp_container2` (`id_container`, `id_user`) VALUES
(100, 'Vincentius'),
(101, 'Vincentius'),
(108, 'Vincentius'),
(110, 'Vincentius'),
(111, 'Vincentius'),
(112, 'Vincentius'),
(113, 'Vincentius'),
(114, 'Vincentius'),
(115, 'Vincentius'),
(116, 'Vincentius'),
(117, 'Vincentius'),
(118, 'Vincentius'),
(119, 'Vincentius'),
(121, 'Vincentius'),
(122, 'Vincentius'),
(123, 'Vincentius');

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
  `finish` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`team_name`, `password`, `ship`, `status`, `id_room`, `origin`, `revenue`, `round`, `pindah`, `finish`) VALUES
('kelvin', '123', '[[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 1, 19, 'SBY', -2000, 0, 'NO', 'NOT DONE'),
('sam', '12', '[[[0,0,0],[\"120\",101,0],[\"112\",105,0]],[[0,0,0],[104,0,0],[106,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 0, 140, 'SBY', 0, 0, 'NO', 'NOT DONE'),
('Vincentius', '123', '[[[\"112\",0,0],[\"108\",0,0],[\"104\",\"105\",0]],[[0,0,0],[0,0,0],[0,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 1, 19, 'SBY', -59000, 0, 'NO', 'NOT DONE');

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
  MODIFY `id_bay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `container`
--
ALTER TABLE `container`
  MODIFY `id_container` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `log_admin`
--
ALTER TABLE `log_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
