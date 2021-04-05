-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2021 at 07:16 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inventori`
--

CREATE TABLE `tbl_inventori` (
  `id_daftar` varchar(12) NOT NULL,
  `tanggal_tagihan` date NOT NULL,
  `jumlah` varchar(7) DEFAULT '0',
  `kondisi` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_inventori`
--

INSERT INTO `tbl_inventori` (`id_daftar`, `tanggal_tagihan`, `jumlah`, `kondisi`) VALUES
('1234567', '0000-00-00', '0', 0),
('171819', '2021-04-08', '100.000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `idx` int(11) NOT NULL,
  `id_daftar` varchar(12) NOT NULL,
  `daftar` date NOT NULL,
  `nis` varchar(12) DEFAULT '0',
  `nama` varchar(30) NOT NULL,
  `kelamin` varchar(255) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `wni` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `ayah` varchar(255) NOT NULL,
  `pa` varchar(255) NOT NULL,
  `ibu` varchar(255) NOT NULL,
  `pi` varchar(255) NOT NULL,
  `wali` varchar(255) NOT NULL,
  `pw` varchar(255) NOT NULL,
  `nohp` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `akte` varchar(255) NOT NULL,
  `kk` varchar(255) NOT NULL,
  `other` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`idx`, `id_daftar`, `daftar`, `nis`, `nama`, `kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `wni`, `alamat`, `ayah`, `pa`, `ibu`, `pi`, `wali`, `pw`, `nohp`, `foto`, `akte`, `kk`, `other`) VALUES
(1, '171819', '2021-03-29', '17181901', 'aku', 'p', 'cms', '2021-04-07', 'Kristen', 'qw', 'aada', '-', '-', '-', '-', '-', '-', '-', '171819_aku.jpg', '171819_aku.jpg', '171819_aku.jpg', '171819_aku.jpg'),
(2, '1234567', '2021-04-23', '0', 'salma', 'p', 'ciamis', '2021-04-15', 'Islam', 'wni', 'asew', 'ase', 'ase', 'ase', 'ase', 'ff', 'asew', '123456', '1234567_salma.jpg', '1234567_salma.jpg', '1234567_salma.jpg', '1234567_salma.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `nama`, `username`, `password`) VALUES
(19, 'alvi', 'alvi', '$2y$10$pR7UvC.6wF.3WiF1/VTkW.l/EJQ00SNGv/cqB4/QVetNxkuvXsh6C'),
(20, 'salma', 'salma', '$2y$10$UycCuMcHDwptE8HBhRJqLeZPsnqv.V9qT.kFBvXsMBDhBqMIiiTui');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_inventori`
--
ALTER TABLE `tbl_inventori`
  ADD PRIMARY KEY (`id_daftar`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
