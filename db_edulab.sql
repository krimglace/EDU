-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2022 at 12:51 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_edulab`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username_admin` varchar(50) NOT NULL,
  `password_admin` varchar(50) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username_admin`, `password_admin`, `nama_admin`, `level`) VALUES
(2, 'shiota03', 'e821a8bfc2c786f275e5d5ea94d519a7', 'Muhammad Rafli', 'administrator'),
(4, 'edulab', 'c1600a428c1274956c971084a37bef75', 'Edulab', 'administrator'),
(5, 'fatih123', 'e821a8bfc2c786f275e5d5ea94d519a7', 'Shiota Rafli', 'client');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cabang`
--

CREATE TABLE `tb_cabang` (
  `id_cabang` int(11) NOT NULL,
  `nama_cabang` varchar(50) NOT NULL,
  `lokasi_cabang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_cabang`
--

INSERT INTO `tb_cabang` (`id_cabang`, `nama_cabang`, `lokasi_cabang`) VALUES
(1, 'A', 'Purwakarta'),
(2, 'B', 'Bandung'),
(3, 'C', 'Jakarta'),
(4, 'D', 'Tangerang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tagihan`
--

CREATE TABLE `tb_tagihan` (
  `id_price` int(11) NOT NULL,
  `user_id` varchar(4) NOT NULL,
  `total_biaya` varchar(50) NOT NULL,
  `potongan` varchar(50) NOT NULL,
  `dp` varchar(50) NOT NULL,
  `angsuran_1` varchar(50) NOT NULL,
  `angsuran_2` varchar(50) NOT NULL,
  `angsuran_3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tagihan`
--

INSERT INTO `tb_tagihan` (`id_price`, `user_id`, `total_biaya`, `potongan`, `dp`, `angsuran_1`, `angsuran_2`, `angsuran_3`) VALUES
(1, 'A001', '9000000', '3000000', '1000000', '', '', ''),
(2, 'A002', '9000000', '2500000', '1000000', '', '', ''),
(3, 'A003', '9000000', '1500000', '1000000', '1000000', '', ''),
(4, 'A004', '9000000', '1500000', '7500000', '', '', ''),
(5, 'A005', '9000000', '2500000', '6500000', '', '', ''),
(6, 'A006', '9000000', '2500000', '2000000', '', '', ''),
(7, 'A007', '9000000', '2500000', '2000000', '', '', ''),
(8, 'A008', '9000000', '2500000', '2500000', '', '', ''),
(9, 'A009', '15000000', '6500000', '1500000', '1000000', '', ''),
(10, 'A010', '9000000', '2500000', '6500000', '', '', ''),
(11, 'A011', '15000000', '4000000', '2000000', '1000000', '', ''),
(12, 'A012', '9000000', '1500000', '2000000', '500000', '1500000', ''),
(13, 'A013', '9000000', '2500000', '1000000', '1000000', '1000000', ''),
(14, 'A014', '9000000', '2500000', '1500000', '1000000', '1000000', ''),
(15, 'A015', '15000000', '5000000', '10000000', '', '', ''),
(16, 'A016', '9000000', '2000000', '1000000', '1000000', '', ''),
(17, 'A017', '9000000', '2500000', '2000000', '1000000', '', ''),
(18, 'A018', '9000000', '2500000', '1000000', '1000000', '1000000', ''),
(19, 'A019', '9000000', '3000000', '1000000', '1000000', '', ''),
(20, 'A020', '9000000', '150000', '2000000', '1000000', '1000000', ''),
(21, 'A021', '9000000', '2500000', '1300000', '800000', '1000000', ''),
(22, 'A022', '9000000', '2500000', '1300000', '800000', '1000000', ''),
(23, 'A023', '9000000', '2500000', '1300000', '2000000', '800000', ''),
(24, 'A024', '9000000', '2500000', '3800000', '', '', ''),
(25, 'A025', '9000000', '2300000', '1000000', '1000000', '', ''),
(26, 'A026', '9000000', '3000000', '3000000', '1000000', '', ''),
(27, 'A027', '9000000', '3000000', '3000000', '', '', ''),
(28, 'A028', '9000000', '2500000', '2000000', '1500000', '', ''),
(29, 'A029', '4500000', '0', '4500000', '', '', ''),
(30, 'A030', '4800000', '0', '1000000', '', '', ''),
(31, 'A031', '4500000', '0', '4500000', '', '', ''),
(32, 'A032', '4500000', '0', '4500000', '', '', ''),
(33, 'A033', '4500000', '0', '2000000', '', '', ''),
(34, 'A034', '9000000', '3500000', '1500000', '', '', ''),
(35, 'A035', '4500000', '1500000', '1500000', '', '', ''),
(36, 'A036', '4500000', '0', '4500000', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` varchar(4) NOT NULL,
  `nama_user` varchar(10) NOT NULL,
  `nama_cabang` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `nama_user`, `nama_cabang`, `username`, `password`) VALUES
('A001', 'A', 'A', 'a', ''),
('A002', 'B', 'A', 'b', ''),
('A003', 'C', 'B', 'c', ''),
('A004', 'D', 'C', 'd', ''),
('A005', 'E', 'A', 'e', ''),
('A006', 'F', 'A', 'f', ''),
('A007', 'G', 'C', 'g', ''),
('A008', 'H', 'A', 'h', ''),
('A009', 'I', 'B', 'i', ''),
('A010', 'J', 'A', 'j', ''),
('A011', 'K', 'A', 'k', ''),
('A012', 'L', 'C', 'l', ''),
('A013', 'M', 'D', 'm', ''),
('A014', 'N', 'D', 'n', ''),
('A015', 'O', 'D', 'o', ''),
('A016', 'P', 'A', 'p', ''),
('A017', 'Q', 'D', 'q', ''),
('A018', 'R', 'D', 'r', ''),
('A019', 'S', 'A', 's', ''),
('A020', 'T', 'D', 't', ''),
('A021', 'U', 'A', 'u', ''),
('A022', 'V', 'A', 'v', ''),
('A023', 'W', 'D', 'w', ''),
('A024', 'X', 'D', 'x', ''),
('A025', 'Y', 'D', 'y', ''),
('A026', 'Z', 'A', '', ''),
('A027', 'AA', 'A', '', ''),
('A028', 'AB', 'A', '', ''),
('A029', 'AC', 'A', '', ''),
('A030', 'AD', 'A', '', ''),
('A031', 'AF', 'C', '', ''),
('A032', 'AG', 'C', '', ''),
('A033', 'AH', 'C', '', ''),
('A034', 'AI', 'B', '', ''),
('A035', 'AJ', 'B', '', ''),
('A036', 'AK', 'B', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_cabang`
--
ALTER TABLE `tb_cabang`
  ADD PRIMARY KEY (`id_cabang`);

--
-- Indexes for table `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  ADD PRIMARY KEY (`id_price`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_cabang`
--
ALTER TABLE `tb_cabang`
  MODIFY `id_cabang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  MODIFY `id_price` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  ADD CONSTRAINT `tb_tagihan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
