-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2021 at 03:19 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penggajian`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `edit_payroll` (IN `idpayroll` INT(10), IN `editsalary` INT(16))  update payroll set salary = editsalary where id_payroll = idpayroll$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `edit_user` (IN `iduser` INT(10), IN `inputnama` VARCHAR(64), IN `inputjabatan` VARCHAR(64))  UPDATE USER SET nama_user = inputnama , jabatan = inputjabatan WHERE id_user = iduser$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah_user` (IN `namaUser` VARCHAR(64), IN `emailUser` VARCHAR(64), IN `passwordUser` VARCHAR(64))  insert into user values(NULL, namaUser, emailUser, passwordUser, 'karyawan', NULL, curdate())$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id_attendance` int(16) NOT NULL,
  `id_user` int(16) NOT NULL,
  `attendance_date` varchar(16) DEFAULT NULL,
  `attendance_status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id_attendance`, `id_user`, `attendance_date`, `attendance_status`) VALUES
(1, 1, '2021-05-24', 1),
(2, 2, '2021-05-24', 0),
(3, 1, '2021-05-23', 0),
(4, 1, '2021-05-21', 0),
(5, 2, '2021-05-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `id_payroll` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `year_filter` enum('2020','2021') NOT NULL,
  `month_filter` enum('January','February','March','April','May','June','July','August','September','October','November','December') NOT NULL,
  `salary` int(11) DEFAULT NULL,
  `payment_method` enum('Bank Transfer','OVO','DANA','Gopay') DEFAULT NULL,
  `status_paid` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`id_payroll`, `id_user`, `year_filter`, `month_filter`, `salary`, `payment_method`, `status_paid`) VALUES
(245, 1, '2021', 'May', NULL, NULL, 1),
(246, 2, '2021', 'May', NULL, NULL, 1),
(247, 3, '2021', 'May', 5000, NULL, 0),
(248, 4, '2021', 'May', 2000, NULL, 1),
(249, 5, '2021', 'May', 2000000, NULL, 1),
(250, 6, '2021', 'May', 1000000, NULL, 0),
(251, 7, '2021', 'May', NULL, NULL, 0),
(252, 8, '2021', 'May', NULL, NULL, 0),
(253, 1, '2021', 'February', NULL, NULL, 0),
(254, 2, '2021', 'February', NULL, NULL, 0),
(255, 3, '2021', 'February', NULL, NULL, 1),
(256, 4, '2021', 'February', NULL, NULL, 1),
(257, 5, '2021', 'February', NULL, NULL, 1),
(258, 6, '2021', 'February', NULL, NULL, 0),
(259, 7, '2021', 'February', NULL, NULL, 0),
(260, 8, '2021', 'February', NULL, NULL, 0),
(261, 1, '2021', 'April', NULL, NULL, 0),
(262, 2, '2021', 'April', NULL, NULL, 0),
(263, 3, '2021', 'April', NULL, NULL, 0),
(264, 4, '2021', 'April', NULL, NULL, 0),
(265, 5, '2021', 'April', NULL, NULL, 0),
(266, 6, '2021', 'April', NULL, NULL, 0),
(267, 7, '2021', 'April', NULL, NULL, 0),
(268, 8, '2021', 'April', NULL, NULL, 0),
(269, 1, '2021', 'June', NULL, NULL, 0),
(270, 2, '2021', 'June', NULL, NULL, 0),
(271, 3, '2021', 'June', NULL, NULL, 0),
(272, 4, '2021', 'June', NULL, NULL, 0),
(273, 6, '2021', 'June', NULL, NULL, 0),
(274, 7, '2021', 'June', NULL, NULL, 0),
(275, 8, '2021', 'June', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(16) NOT NULL,
  `nama_user` varchar(64) NOT NULL,
  `email_user` varchar(64) NOT NULL,
  `password_user` varchar(64) NOT NULL,
  `level_user` enum('karyawan','admin','super_admin') NOT NULL,
  `jabatan` varchar(32) DEFAULT NULL,
  `join_date` date NOT NULL,
  `alamat_user` varchar(64) DEFAULT NULL,
  `nohp` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email_user`, `password_user`, `level_user`, `jabatan`, `join_date`, `alamat_user`, `nohp`) VALUES
(1, 'Muhammad Admin Teladan', 'user1@gmail.com', 'user1', 'admin', 'Senior Mobile Developer', '2021-05-21', NULL, NULL),
(2, 'Muhammad Karyawan Teladan', 'user2@gmail.com', 'user2', 'karyawan', 'Junior Mobile Developer', '2021-05-21', NULL, NULL),
(3, 'Muhammad Admin Waluyo', 'superadmin@kelompok2.com', 'admin', 'super_admin', '', '2021-05-21', 'Jalan Surabaya no 16', '081111111111'),
(4, 'Muhammad Karyawan 66', 'user6@email.com', '1', 'karyawan', NULL, '2021-05-21', NULL, NULL),
(6, 'Ahmad Admin', 'user7@email.com', 'user7', 'karyawan', NULL, '2021-05-22', NULL, NULL),
(7, 'Ahmad Admin Mustofa', 'user8@email.com', 'user8', 'karyawan', NULL, '2021-05-22', NULL, NULL),
(8, 'Winarto', 'user9@email.com', 'user9', 'karyawan', NULL, '2021-05-22', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id_attendance`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`id_payroll`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id_attendance` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id_payroll` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
