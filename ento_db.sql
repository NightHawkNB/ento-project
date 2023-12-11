-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 04:19 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

DROP DATABASE IF EXISTS ento_db;
CREATE DATABASE ento_db;
USE ento_db;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ento_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(32) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `nic_num` varchar(45) DEFAULT NULL,
  `address1` varchar(256) DEFAULT NULL,
  `address2` varchar(256) DEFAULT NULL,
  `province` varchar(256) NOT NULL,
  `district` varchar(256) NOT NULL,
  `password` varchar(256) DEFAULT NULL,
  `contact_num` varchar(45) NOT NULL,
  `user_type` varchar(45) NOT NULL DEFAULT 'client',
  `image` varchar(512) DEFAULT 'http://localhost/ento-project/public/assets/images/users/general.jpg',
  `verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `email`, `nic_num`, `address1`, `address2`, `province`, `district`, `password`, `contact_num`, `user_type`, `image`, `verified`) VALUES
('37', 'charllotte', 'brown', 'cha@ento.com', NULL, 'Colombo', '10', 'Galle', 'District', '$2y$10$3d5Ysv6/yADqn9uyj8Sb9.McnVEv1ils1XBoQT16ceTOWauzdRbdS', '0718456654', 'singer', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 0),
('38', 'Chamath', 'Kalhara', 'client@ento.com', NULL, 'Address01', 'Address02', 'City', 'District', '$2y$10$s.y0AIpXMs4NWxS8zc5o2.xGEGb.ApY/3Vop058YdIHxAdJ11wNlG', '0715556954', 'client', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 0),
('40', 'admin', '01', 'admin1@ento.com', NULL, 'AD1', 'AD2', 'CT', 'DT', '$2y$10$Yaq0hYCdITLX7CGUYrDiu.v2sO7aUf79mgZmLqJT7CY013YQkWnXS', '0744587584', 'admin', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 0),
('41', 'band', '01', 'band1@ento.com', NULL, '5', '6', '4', '5', '$2y$10$4SbR6UUaBibEYOLWTpfRXOeZF8Qy9azix2AYaK.5cLeJ5NY5TLojW', '4', 'band', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 0),
('42', 'band', '02', 'band2@ento.com', NULL, '6', '4', '5', '5', '$2y$10$YAhBfZBSV5s46CnpUgIA6uNz9nlvnAA8z3JQGNcHSZe2mFTgGk172', '2', 'band', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 0),
('44', 'Sadun', 'Prabrashawara', 'singer2@ento.com', NULL, '295/C', 'Pahala Yagoda', 'western', 'Gampaha', '$2y$10$VYwqELysomfvQ7KnpFdJjO213El1HOsJ7wx/3CgBFKCYDtGIe7irK', '0715888588', 'singer', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 0),
('45', 'singer', '03', 'singer3@ento.com', NULL, '1', '1', '1', '1', 'singer', '1', 'singer', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 0),
('48', 'cca', '01', 'cca1@ento.com', NULL, '1', '1', '1', '1', '$2y$10$TBnI1tA8WClwpesXdZp1u.iWJwwCjGkTyPmOQ53xY3LylCC9srbxi', '1', 'cca', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 0),
('58', 'Shaun', 'Morgan', 'venuem1@ento.com', NULL, 'Saman Mawatha', '365/D', 'western', 'Gampaha', '$2y$10$EBZqpefKzVObk8mtX2MwzuIjzhkQ2T0bPuk77FCNe8N9HztzQIUsu', '07188853315', 'venuem', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 0),
('63', 'a', 'b', 'A@ENTO.COM', NULL, '11', '1', '1', '1', '$2y$10$d8FjeU6ypsYdotlWIitkn.obad32KYHAOjZUjpB8jVSJE8TeSR/di', '1', 'client', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 0),
('64', 'alila', 'milinda', 'akila@ento.com', NULL, '345', 'mulleriyawa', 'colombo', 'western', '$2y$10$LvELfmOhnQNtyfbRbZb5b.QY8R5r0.rk4h66hPS3da/S3Vzn3YDy2', '0757825509', 'client', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 0),
('66', 'singer', '01', 'singer1@ento.com', NULL, '55', '55', '55', '55', '$2y$10$IMelU0XP8NSDHwsILo7.3elBsmZiFEwDy9UjfZR1T3vqGbDafLWGq', '077789899', 'singer', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 0),
('USER_3192_1702187236', 'New', 'user', 'newuser@ento.com', NULL, NULL, NULL, 'western', 'Kalutara', '$2y$10$n5R108H5dZVlBDIIUlTrpuS2CP/76LQiDoLmo7mRKL2009erNtPR6', '0712719315', 'venueo', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 0),
('USER_45764_1699532744', 'Nipun', 'Bathiya', 'nipun@gmail.com', NULL, 'Ihalagama', 'West', 'Gampaha', 'Gampaha', '$2y$10$SvDlQVD3O9N.i7GSglqKyu.8CDJdADvi49UODrY.1/iUxnm2eV.6G', '0712719315', 'client', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 0),
('USER_74840_1701271384', 'James', 'Brown', 'venueo@ento.com', NULL, '', '', 'Minuwangoda', 'Gampaha', '$2y$10$BL6vQk6VRbSwe1Pk4RiV9egaMB5qa/f9UpJgLFI84ejygh2d.kIWi', '0995556456', 'venueo', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 0),
('USER_99858_1702039969', 'New', 'User', 'venue@ento.com', NULL, NULL, NULL, 'southern', 'Matara', '$2y$10$K6l5T/DJtM56zhCaKm3F7en/LfLw8F8D4lmZ0LPBkFJctcnSlGm6.', '11213', 'venueo', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
