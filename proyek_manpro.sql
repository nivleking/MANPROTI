-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2023 at 04:59 AM
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
('sam2', 'Samuel Ganteng', '123', 1);

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
(110, 'SUB', 'MDN', 5),
(111, 'SUB', 'MDN', 5),
(112, 'SUB', 'MDN', 5),
(113, 'SUB', 'MDN', 5),
(114, 'SUB', 'MDN', 5),
(115, 'SUB', 'MDN', 5),
(116, 'SUB', 'MDN', 5),
(117, 'SUB', 'MDN', 5),
(118, 'SUB', 'MDN', 5),
(119, 'SUB', 'MDN', 5);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id_room` int(4) NOT NULL,
  `id_admin` varchar(4) NOT NULL,
  `status` int(1) NOT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id_room`, `id_admin`, `status`, `tanggal`) VALUES
(0, 'sam1', 0, '2023-10-30'),
(13, 'sam1', 0, NULL),
(15, 'sam1', 0, NULL),
(115, 'sam1', 1, NULL),
(123, 'sam1', 0, NULL),
(124, 'sam1', 0, '2023-10-29'),
(125, 'sam1', 0, '2023-10-29'),
(126, 'sam1', 1, '2023-10-29'),
(127, 'sam1', 1, '2023-10-29'),
(128, 'sam1', 1, '2023-10-29'),
(129, 'sam1', 1, '2023-10-29'),
(130, 'sam1', 1, '2023-10-29'),
(131, 'sam1', 1, '2023-10-30'),
(132, 'sam1', 1, '2023-10-30'),
(133, 'sam1', 1, '2023-10-30'),
(134, 'sam1', 1, '2023-10-30'),
(136, 'sam1', 1, '2023-10-30'),
(157, 'sam1', 0, NULL),
(174, 'sam1', 1, '2023-10-30'),
(178, 'sam1', 0, NULL),
(179, 'sam1', 0, NULL),
(180, 'sam1', 0, '2023-10-29'),
(181, 'sam1', 1, '2023-10-29'),
(317, 'sam1', 1, NULL),
(431, 'sam1', 0, NULL),
(456, 'sam1', 1, NULL),
(500, 'sam1', 0, NULL),
(501, 'sam1', 0, NULL),
(600, 'sam1', 0, NULL),
(601, 'sam1', 1, NULL),
(602, 'sam1', 0, NULL),
(603, 'sam1', 1, NULL),
(765, 'Akto', 0, NULL),
(999, 'Akto', 0, NULL),
(1111, 'sam1', 0, NULL),
(11111, 'sam1', 1, NULL);

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
(5, 'COMMIT', 'SUB', 'MDN', 10, 10000);

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
(110, 'Vincentius'),
(111, 'Vincentius'),
(112, 'Vincen'),
(112, 'Vincentius'),
(113, 'Vincentius'),
(115, 'Vincentius'),
(103, 'Vincentius'),
(114, 'Vincentius'),
(100, 'Vincentius');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `team_name` varchar(10) NOT NULL,
  `password` varchar(5) NOT NULL,
  `ship` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`ship`)),
  `status` int(1) DEFAULT NULL,
  `id_room` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`team_name`, `password`, `ship`, `status`, `id_room`) VALUES
('Aktonoi', '12345', '[[[\"109\",0,0],[\"100\",\"101\",\"107\"],[\"102\",\"105\",\"103\"]],[[0,0,0],[\"104\",0,0],[\"106\",0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 1, 132),
('Vincentius', '12345', '[[[\"107\",0,0],[\"109\",\"101\",0],[\"102\",\"105\",0]],[[0,0,0],[\"104\",0,0],[\"106\",0,0]],[[0,0,0],[0,0,0],[0,0,0]]]', 1, 174);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `container`
--
ALTER TABLE `container`
  ADD PRIMARY KEY (`id_container`);

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
-- AUTO_INCREMENT for table `container`
--
ALTER TABLE `container`
  MODIFY `id_container` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
