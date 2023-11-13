-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2023 at 05:48 PM
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
('sam1', 'Samuel', '123', 0),
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
(1, 'SUB', 'Surabaya', 1),
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
(119, 'SBY', 'MDN', 5);

-- --------------------------------------------------------

--
-- Table structure for table `deck`
--

CREATE TABLE `deck` (
  `id_deck` int(11) NOT NULL,
  `qty_bay` int(11) NOT NULL,
  `nama_deck` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(140, 'sam1', 1, '2023-11-07', 0, 0),
(141, 'sam1', 1, '2023-11-08', 0, 0),
(142, 'sam1', 1, '2023-11-09', 0, 0),
(150, 'sam1', 0, '2023-11-09', 0, 0),
(151, 'sam1', 0, '2023-11-09', 0, 0),
(152, 'sam1', 0, '2023-11-12', 0, 0),
(174, 'sam1', 1, '2023-10-30', 0, 0),
(182, 'sam1', 1, '2023-11-06', 0, 0),
(500, 'sam1', 1, '2023-11-12', 0, 0),
(502, 'sam1', 1, '2023-11-12', 0, 0);

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
(5, 'COMMIT', 'SBY', 'MDN', 10, 10000);

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
  `id_user` int(11) NOT NULL
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
  `revenue` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`team_name`, `password`, `ship`, `status`, `id_room`, `origin`, `revenue`) VALUES
('Vincentius', '123', '[[[\"113\",\"115\",\"100\"],[\"111\",101,\"114\"],[\"110\",105,\"103\"]],[[\"112\",0,0],[104,0,0],[106,0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 1, 502, 'SBY', 380000);

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
  MODIFY `id_container` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
