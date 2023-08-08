-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2023 at 10:30 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `datakelas`
--

CREATE TABLE `datakelas` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `datakelas`
--

INSERT INTO `datakelas` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'XI RPL INDUSTRI', '2023-08-08 07:45:44', '2023-08-08 07:45:44'),
(2, 'XI RPL 1', '2023-08-08 07:45:44', '2023-08-08 07:45:44'),
(3, 'XI RPL 2', '2023-08-08 07:45:44', '2023-08-08 07:45:44'),
(4, 'XI RPL 3', '2023-08-08 07:45:44', '2023-08-08 07:45:44'),
(5, 'XI TBSM INDUSTRI', '2023-08-08 07:45:44', '2023-08-08 07:45:44'),
(6, 'XI TBSM 1', '2023-08-08 07:45:44', '2023-08-08 07:45:44'),
(7, 'XI TBSM 2', '2023-08-08 07:45:44', '2023-08-08 07:45:44'),
(8, 'XI TBSM 3', '2023-08-08 07:45:44', '2023-08-08 07:45:44'),
(9, 'XI AKUNTANSI 1', '2023-08-08 07:45:44', '2023-08-08 07:45:44'),
(10, 'XI AKUNTANSI 2', '2023-08-08 07:45:44', '2023-08-08 07:45:44'),
(11, 'XI AKUNTANSI 3', '2023-08-08 07:45:44', '2023-08-08 07:45:44'),
(12, 'XI TET 1', '2023-08-08 07:45:44', '2023-08-08 07:45:44'),
(13, 'XI TET 2', '2023-08-08 07:45:44', '2023-08-08 07:45:44'),
(14, 'XI TET 3', '2023-08-08 07:45:44', '2023-08-08 07:45:44'),
(15, 'XI TEI INDUSTRI', '2023-08-08 07:45:44', '2023-08-08 07:45:44'),
(16, 'XI TEI 1', '2023-08-08 07:45:44', '2023-08-08 07:45:44'),
(17, 'XI TEI 2', '2023-08-08 07:45:44', '2023-08-08 07:45:44'),
(18, 'XI TEI 3', '2023-08-08 07:45:44', '2023-08-08 07:46:07'),
(19, 'XI TKJ INDUSTRI', '2023-08-08 07:45:44', '2023-08-08 07:45:44'),
(20, 'XI TKJ 1', '2023-08-08 07:45:44', '2023-08-08 07:45:44'),
(21, 'XI TKJ 2', '2023-08-08 07:45:44', '2023-08-08 07:45:44'),
(22, 'XI TKJ 3', '2023-08-08 07:45:44', '2023-08-08 07:45:44');

-- --------------------------------------------------------

--
-- Table structure for table `datasiswas`
--

CREATE TABLE `datasiswas` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `class` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tanggal` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `datasiswas`
--

INSERT INTO `datasiswas` (`id`, `name`, `class`, `created_at`, `updated_at`, `tanggal`) VALUES
(66, 'Ridwan', '1', '2023-08-08 00:56:17', '2023-08-08 00:56:17', '2023-08-08'),
(67, 'Rifky', '1', '2023-08-08 00:56:17', '2023-08-08 00:56:17', '2023-08-08'),
(68, 'Andri', '1', '2023-08-08 00:56:17', '2023-08-08 00:56:17', '2023-08-08'),
(69, 'Dimas akbar', '1', '2023-08-08 00:56:17', '2023-08-08 00:56:17', '2023-08-08'),
(70, 'Raden', '1', '2023-08-08 00:56:17', '2023-08-08 00:56:17', '2023-08-08'),
(71, 'dappa', '6', '2023-08-08 00:56:17', '2023-08-08 00:56:17', '2023-08-08'),
(72, 'Victor', '5', '2023-08-08 00:56:17', '2023-08-08 00:56:17', '2023-08-08'),
(73, 'Djulian', '5', '2023-08-08 00:56:17', '2023-08-08 00:56:17', '2023-08-08'),
(74, 'Adrian', '15', '2023-08-08 00:56:17', '2023-08-08 00:56:17', '2023-08-08'),
(75, 'Farid', '15', '2023-08-08 00:56:17', '2023-08-08 00:56:17', '2023-08-08'),
(76, 'Boom', '6', '2023-08-08 00:56:17', '2023-08-08 00:56:17', '2023-08-08'),
(77, 'Fakhri', '5', '2023-08-08 00:56:17', '2023-08-08 00:56:17', '2023-08-08'),
(78, 'Jono', '7', '2023-08-08 00:56:17', '2023-08-08 00:56:17', '2023-08-08'),
(79, 'Supri', '7', '2023-08-08 00:56:17', '2023-08-08 00:56:17', '2023-08-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datakelas`
--
ALTER TABLE `datakelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datasiswas`
--
ALTER TABLE `datasiswas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datakelas`
--
ALTER TABLE `datakelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `datasiswas`
--
ALTER TABLE `datasiswas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
