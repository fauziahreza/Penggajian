-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2021 at 08:54 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(16) NOT NULL,
  `nama_user` varchar(64) NOT NULL,
  `email_user` varchar(64) NOT NULL,
  `password_user` varchar(64) NOT NULL,
  `level_user` enum('karyawan','admin_financial','admin_personalia','super_admin') NOT NULL,
  `jabatan` varchar(32) DEFAULT NULL,
  `join_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email_user`, `password_user`, `level_user`, `jabatan`, `join_date`) VALUES
(1, 'Muhammad Karyawan', 'user1@gmail.com', 'user1', 'karyawan', NULL, '2021-05-21'),
(2, 'user2', 'user2@gmail.com', 'user2', 'karyawan', NULL, '2021-05-21'),
(3, 'Muhammad Super Admin', 'superadmin@kelompok2.com', 'admin', 'super_admin', NULL, '2021-05-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE PROCEDURE tambah_user(IN namaUser VARCHAR(64), IN emailUser VARCHAR(64), IN passwordUser VARCHAR(64))
INSERT INTO USER VALUES(NULL, namaUser, emailUser, passwordUser, 'karyawan', NULL, CURDATE());