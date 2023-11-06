-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2023 at 10:08 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

DROP DATABASE ento_db;
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `ad_id` varchar(32) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `category` varchar(128) NOT NULL,
  `details` varchar(256) DEFAULT NULL,
  `image` varchar(256) DEFAULT NULL,
  `pending` tinyint(1) NOT NULL DEFAULT 1,
  `views` int(11) DEFAULT NULL,
  `rates` int(11) DEFAULT NULL,
  `datetime` timestamp NULL DEFAULT current_timestamp(),
  `deleted` tinyint(1) DEFAULT 0,
  `contact_num` varchar(12) DEFAULT NULL,
  `contact_email` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`ad_id`, `user_id`, `title`, `category`, `details`, `image`, `pending`, `views`, `rates`, `datetime`, `deleted`, `contact_num`, `contact_email`) VALUES
('AD_10301_1699247541', 66, 'Ancient Saga', 'band', 'Traditional Musical Band', 'http://localhost/ento-project/public/assets/images/ads/AD_10301_1699247541.png', 0, NULL, 50000, '2023-11-06 05:12:21', 0, '011-2532223', 'tradband@gmail.com'),
('AD_14940_1699126571', 44, 'Sunflower Band', 'band', 'Sunflower musical band', 'http://localhost/ento-project/public/assets/images/ads/AD_14940_1699126571.png', 0, NULL, 45000, '2023-11-04 19:36:11', 0, '071-8888888', 'sunflower@yahoo.com'),
('AD_16114_1699126637', 44, 'Nelum Pokuna', 'venue', 'Stadium ', 'http://localhost/ento-project/public/assets/images/ads/AD_16114_1699126637.jpg', 0, NULL, 100000, '2023-11-04 19:37:17', 0, '011-8963125', 'nelum@gmail.com'),
('AD_69573_1699245724', 44, 'Sampath', 'singer', 'Singer test 02', 'http://localhost/ento-project/public/assets/images/ads/AD_69573_1699245724.png', 1, NULL, 500000, '2023-11-06 04:42:04', 0, '071-8551121', 'singer@ento.com'),
('AD_75958_1699126761', 44, 'Kasun Perera', 'singer', '                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus beatae dicta dignissimos, doloremque eveniet, incidunt molestias nemo, odit quaerat quos repellendus similique veniam vitae. Adipisci incidunt nostrum reiciendis rem vel!', 'http://localhost/ento-project/public/assets/images/ads/AD_75958_1699126761.png', 0, NULL, 45000, '2023-11-04 19:39:21', 0, '071-5564541', 'kasun@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `ad_band`
--

CREATE TABLE `ad_band` (
  `ad_id` varchar(32) NOT NULL,
  `packages` varchar(32) DEFAULT NULL,
  `sample_video` varchar(512) DEFAULT NULL,
  `sample_audio` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ad_band`
--

INSERT INTO `ad_band` (`ad_id`, `packages`, `sample_video`, `sample_audio`) VALUES
('AD_10301_1699247541', 'Premium', '', NULL),
('AD_14940_1699126571', 'Premium and Family', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ad_singer`
--

CREATE TABLE `ad_singer` (
  `ad_id` varchar(32) NOT NULL,
  `sample_audio` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ad_singer`
--

INSERT INTO `ad_singer` (`ad_id`, `sample_audio`) VALUES
('AD_69573_1699245724', NULL),
('AD_75958_1699126761', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ad_venue`
--

CREATE TABLE `ad_venue` (
  `ad_id` varchar(32) NOT NULL,
  `seat_count` int(11) NOT NULL DEFAULT 0,
  `seat_image` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ad_venue`
--

INSERT INTO `ad_venue` (`ad_id`, `seat_count`, `seat_image`) VALUES
('AD_16114_1699126637', 500, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `band`
--

CREATE TABLE `band` (
  `band_id` int(11) NOT NULL,
  `sp_id` int(11) NOT NULL,
  `packages` varchar(45) NOT NULL,
  `location` varchar(45) NOT NULL,
  `AvgResTime` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `band`
--

INSERT INTO `band` (`band_id`, `sp_id`, `packages`, `location`, `AvgResTime`) VALUES
(1, 4, '85000', 'Colombo', '100'),
(2, 5, '100000', 'Minuwangoda', '50');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `comp_id` int(11) NOT NULL,
  `details` varchar(512) NOT NULL,
  `files` varchar(256) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `cust_id` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Idle',
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`comp_id`, `details`, `files`, `date_time`, `user_id`, `cust_id`, `status`, `deleted`) VALUES
(8, 'Complaints', 'File - 01', '2023-10-30 08:42:07', 44, NULL, 'Accepted', 0),
(10, 'Hellow World', 'File_02', '2023-10-31 08:09:18', 38, NULL, 'Accepted', 0),
(21, 'Something Something\r\n', NULL, '2023-10-31 15:26:53', 48, NULL, 'Idle', 0),
(22, 'UI not working', NULL, '2023-11-01 03:59:40', 44, NULL, 'Idle', 0);

-- --------------------------------------------------------

--
-- Table structure for table `complaint_assist`
--

CREATE TABLE `complaint_assist` (
  `comp_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'Idle',
  `comment` varchar(512) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_care`
--

CREATE TABLE `customer_care` (
  `cust_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `pending` int(11) NOT NULL DEFAULT 1,
  `name` varchar(45) NOT NULL,
  `details` varchar(45) DEFAULT NULL,
  `ticketing_plan` varchar(45) NOT NULL,
  `venue_id` int(11) DEFAULT NULL,
  `band_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `venueO_id` int(11) DEFAULT NULL,
  `DateTime` datetime DEFAULT NULL,
  `image` varchar(512) DEFAULT NULL,
  `district` varchar(64) DEFAULT NULL,
  `s_image` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `pending`, `name`, `details`, `ticketing_plan`, `venue_id`, `band_id`, `user_id`, `venueO_id`, `DateTime`, `image`, `district`, `s_image`) VALUES
(2, 0, 'Yaathra', 'Musical Event', '5000*20/3000*30/2000*50', 2, 1, 2, NULL, '2023-10-31 15:00:00', 'event-01.jpeg', 'Gampaha', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_singer`
--

CREATE TABLE `event_singer` (
  `event_id` int(11) NOT NULL,
  `singer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_log`
--

CREATE TABLE `payment_log` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `ad_id` varchar(32) DEFAULT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(11) NOT NULL,
  `sp_id` int(11) NOT NULL,
  `vuser_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `sp_id`, `vuser_id`) VALUES
(3, 3, 2),
(4, 5, 2),
(5, 3, 2),
(6, 7, 2),
(7, 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `resrequest`
--

CREATE TABLE `resrequest` (
  `req_id` int(11) NOT NULL,
  `vuser_id` int(11) NOT NULL,
  `sp_id` int(11) NOT NULL,
  `createdDate` date NOT NULL,
  `respondedDate` date DEFAULT NULL,
  `details` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `resrequest`
--

INSERT INTO `resrequest` (`req_id`, `vuser_id`, `sp_id`, `createdDate`, `respondedDate`, `details`) VALUES
(3, 2, 7, '2023-09-30', NULL, 'Something Something Else');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `content` varchar(45) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `vuser_id` int(11) NOT NULL,
  `sp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `serviceprovider`
--

CREATE TABLE `serviceprovider` (
  `sp_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `verified` tinyint(4) DEFAULT 0,
  `sp_type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `serviceprovider`
--

INSERT INTO `serviceprovider` (`sp_id`, `user_id`, `verified`, `sp_type`) VALUES
(3, 37, 1, 'singer'),
(4, 41, 1, 'band'),
(5, 42, 1, 'band'),
(7, 44, 1, 'singer'),
(8, 45, 1, 'singer'),
(9, 46, 1, 'venueoperator'),
(10, 58, 1, 'venuem'),
(11, 66, 1, 'singer');

-- --------------------------------------------------------

--
-- Table structure for table `singer`
--

CREATE TABLE `singer` (
  `singer_id` int(11) NOT NULL,
  `sp_id` int(11) NOT NULL,
  `rates` int(11) NOT NULL,
  `location` varchar(45) NOT NULL,
  `AvgResTime` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `singer`
--

INSERT INTO `singer` (`singer_id`, `sp_id`, `rates`, `location`, `AvgResTime`) VALUES
(1, 3, 50000, 'Colombo', '100'),
(5, 7, 75000, 'Ragama', '105'),
(6, 8, 55000, 'Mirigama', '59');

-- --------------------------------------------------------

--
-- Table structure for table `spvreq`
--

CREATE TABLE `spvreq` (
  `spv_req_id` int(11) NOT NULL,
  `sp_id` int(11) NOT NULL,
  `cust_id` int(11) DEFAULT NULL,
  `timestamps` date NOT NULL,
  `files` varchar(45) NOT NULL,
  `details` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticket_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `serial_num` varchar(64) NOT NULL,
  `qr_code` varchar(512) NOT NULL,
  `type` varchar(16) NOT NULL,
  `price` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `event_id`, `user_id`, `serial_num`, `qr_code`, `type`, `price`, `deleted`) VALUES
(1, 2, 38, '123456785', 'qr_code', 'Normal', 5000, 0),
(2, 2, 38, '123451234', 'qr_code', 'Platinum', 10000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `address1` varchar(256) NOT NULL,
  `address2` varchar(256) NOT NULL,
  `city` varchar(256) NOT NULL,
  `district` varchar(256) NOT NULL,
  `password` varchar(256) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `nic_num` varchar(45) DEFAULT NULL,
  `contact_num` varchar(45) NOT NULL,
  `user_type` varchar(45) NOT NULL DEFAULT 'client',
  `image` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `address1`, `address2`, `city`, `district`, `password`, `email`, `nic_num`, `contact_num`, `user_type`, `image`) VALUES
(37, 'charllotte', 'brown', 'Colombo', '10', 'Galle', 'District', '$2y$10$3d5Ysv6/yADqn9uyj8Sb9.McnVEv1ils1XBoQT16ceTOWauzdRbdS', 'cha@ento.com', NULL, '0718456654', 'singer', 'general.png'),
(38, 'Chamath', 'Kalhara', 'Address01', 'Address02', 'City', 'District', '$2y$10$s.y0AIpXMs4NWxS8zc5o2.xGEGb.ApY/3Vop058YdIHxAdJ11wNlG', 'client@ento.com', NULL, '11111111', 'client', 'general.png'),
(40, 'admin', '01', 'AD1', 'AD2', 'CT', 'DT', '$2y$10$Yaq0hYCdITLX7CGUYrDiu.v2sO7aUf79mgZmLqJT7CY013YQkWnXS', 'admin1@ento.com', NULL, '0744587584', 'admin', 'general.png'),
(41, 'band', '01', '5', '6', '4', '5', '$2y$10$4SbR6UUaBibEYOLWTpfRXOeZF8Qy9azix2AYaK.5cLeJ5NY5TLojW', 'band1@ento.com', NULL, '4', 'band', 'general.png'),
(42, 'band', '02', '6', '4', '5', '5', '$2y$10$YAhBfZBSV5s46CnpUgIA6uNz9nlvnAA8z3JQGNcHSZe2mFTgGk172', 'band2@ento.com', NULL, '2', 'band', 'general.png'),
(44, 'singer', '02', 'Corrupted Fort', 'Deadland', ' Minuwangoda', 'Gampaha', '$2y$10$VYwqELysomfvQ7KnpFdJjO213El1HOsJ7wx/3CgBFKCYDtGIe7irK', 'singer2@ento.com', NULL, '0715888588', 'singer', 'general.png'),
(45, 'singer', '03', '1', '1', '1', '1', 'singer', 'singer3@ento.com', NULL, '1', 'singer', 'general.png'),
(46, 'venueO', '01', '2', '2', '2', '2', '$2y$10$pN6TUr5kl/wfWffLRqMVGuPqkqorI0auGAbVot80SR6RCYvbkCvFi', 'venueO1@ento.com', NULL, '2', 'venueoperator', 'general.png'),
(48, 'cca', '01', '1', '1', '1', '1', '$2y$10$TBnI1tA8WClwpesXdZp1u.iWJwwCjGkTyPmOQ53xY3LylCC9srbxi', 'cca1@ento.com', NULL, '1', 'cca', 'general.png'),
(58, 'venue', 'm', 'j', 'j', 'j', 'j', '$2y$10$EBZqpefKzVObk8mtX2MwzuIjzhkQ2T0bPuk77FCNe8N9HztzQIUsu', 'venuem1@ento.com', NULL, 'j', 'venuem', 'general.png'),
(63, 'a', 'b', '11', '1', '1', '1', '$2y$10$d8FjeU6ypsYdotlWIitkn.obad32KYHAOjZUjpB8jVSJE8TeSR/di', 'A@ENTO.COM', NULL, '1', 'client', NULL),
(64, 'alila', 'milinda', '345', 'mulleriyawa', 'colombo', 'western', '$2y$10$LvELfmOhnQNtyfbRbZb5b.QY8R5r0.rk4h66hPS3da/S3Vzn3YDy2', 'akila@ento.com', NULL, '0757825509', 'client', NULL),
(66, 'singer', '01', '55', '55', '55', '55', '$2y$10$IMelU0XP8NSDHwsILo7.3elBsmZiFEwDy9UjfZR1T3vqGbDafLWGq', 'singer1@ento.com', NULL, '077789899', 'singer', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `uservreq`
--

CREATE TABLE `uservreq` (
  `userVreq_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cust_id` int(11) DEFAULT NULL,
  `timestamps` date DEFAULT NULL,
  `resources` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `venue_id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `image` varchar(512) DEFAULT NULL,
  `seat_count` int(11) DEFAULT NULL,
  `packages` varchar(45) DEFAULT NULL,
  `other` varchar(45) DEFAULT NULL,
  `venueM_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`venue_id`, `name`, `location`, `image`, `seat_count`, `packages`, `other`, `venueM_id`) VALUES
(1, 'Venue02', 'Colombo', NULL, 1000, '50000', 'nothing', NULL),
(2, 'Venue01', 'Colombo', NULL, 700, '250000', 'Surround Sound', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `venuemanager`
--

CREATE TABLE `venuemanager` (
  `venueM_id` int(11) NOT NULL,
  `sp_id` int(11) NOT NULL,
  `AvgResTime` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `venueoperator`
--

CREATE TABLE `venueoperator` (
  `venueO_id` int(11) NOT NULL,
  `sp_id` int(11) NOT NULL,
  `venue_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `venueoperator`
--

INSERT INTO `venueoperator` (`venueO_id`, `sp_id`, `venue_id`) VALUES
(1, 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `verifieduser`
--

CREATE TABLE `verifieduser` (
  `vuser_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `verifieduser`
--

INSERT INTO `verifieduser` (`vuser_id`, `user_id`) VALUES
(2, 38);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`,`user_id`),
  ADD KEY `fk_admin_user_idx` (`user_id`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`ad_id`),
  ADD KEY `fk_user_ad` (`user_id`);

--
-- Indexes for table `ad_band`
--
ALTER TABLE `ad_band`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `ad_singer`
--
ALTER TABLE `ad_singer`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `ad_venue`
--
ALTER TABLE `ad_venue`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `band`
--
ALTER TABLE `band`
  ADD PRIMARY KEY (`band_id`),
  ADD UNIQUE KEY `sp_id_UNIQUE` (`sp_id`),
  ADD KEY `sk_sp_band_idx` (`sp_id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`comp_id`),
  ADD KEY `fk_complaint_user_idx` (`user_id`),
  ADD KEY `fk_complaint_cust_idx` (`cust_id`);

--
-- Indexes for table `complaint_assist`
--
ALTER TABLE `complaint_assist`
  ADD PRIMARY KEY (`comp_id`);

--
-- Indexes for table `customer_care`
--
ALTER TABLE `customer_care`
  ADD PRIMARY KEY (`cust_id`,`user_id`),
  ADD KEY `fk_user_ccagent_idx` (`user_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `fk_event_venue_idx` (`venue_id`),
  ADD KEY `fk_event_band_idx` (`band_id`),
  ADD KEY `fk_event_vuser_idx` (`user_id`),
  ADD KEY `fk_event_venueO_idx` (`venueO_id`);

--
-- Indexes for table `event_singer`
--
ALTER TABLE `event_singer`
  ADD PRIMARY KEY (`event_id`,`singer_id`),
  ADD KEY `fk_event_es_idx` (`event_id`),
  ADD KEY `fk_singer_es_idx` (`singer_id`);

--
-- Indexes for table `payment_log`
--
ALTER TABLE `payment_log`
  ADD UNIQUE KEY `payment_log_pk` (`order_id`),
  ADD KEY `fk_payment_user` (`user_id`),
  ADD KEY `fk_payment_event` (`event_id`),
  ADD KEY `fk_payment_ads` (`ad_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `fk_res_sp_idx` (`sp_id`),
  ADD KEY `fk_res_vuser_idx` (`vuser_id`);

--
-- Indexes for table `resrequest`
--
ALTER TABLE `resrequest`
  ADD PRIMARY KEY (`req_id`),
  ADD KEY `fk_resReq_vuser_idx` (`vuser_id`),
  ADD KEY `fk_resReq_sp_idx` (`sp_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `fk_review_vuser_idx` (`vuser_id`),
  ADD KEY `fk_review_sp_idx` (`sp_id`);

--
-- Indexes for table `serviceprovider`
--
ALTER TABLE `serviceprovider`
  ADD PRIMARY KEY (`sp_id`,`user_id`),
  ADD UNIQUE KEY `user_id_UNIQUE` (`user_id`);

--
-- Indexes for table `singer`
--
ALTER TABLE `singer`
  ADD PRIMARY KEY (`singer_id`),
  ADD UNIQUE KEY `sp_id_UNIQUE` (`sp_id`),
  ADD KEY `fk_sp_singer_idx` (`sp_id`);

--
-- Indexes for table `spvreq`
--
ALTER TABLE `spvreq`
  ADD PRIMARY KEY (`spv_req_id`,`sp_id`),
  ADD KEY `fk_spVreq_sp_idx` (`sp_id`),
  ADD KEY `fk_spVreq_custCare_idx` (`cust_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `fk_ticket_user_idx` (`user_id`),
  ADD KEY `fk_ticket_event_idx` (`event_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `uservreq`
--
ALTER TABLE `uservreq`
  ADD PRIMARY KEY (`userVreq_id`),
  ADD KEY `fk_userVreq_user_idx` (`user_id`),
  ADD KEY `fk_userVreq_cust_idx` (`cust_id`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`venue_id`),
  ADD KEY `fk_venue_venueM_idx` (`venueM_id`);

--
-- Indexes for table `venuemanager`
--
ALTER TABLE `venuemanager`
  ADD PRIMARY KEY (`venueM_id`),
  ADD KEY `fk_venueManager_sp_idx` (`sp_id`);

--
-- Indexes for table `venueoperator`
--
ALTER TABLE `venueoperator`
  ADD PRIMARY KEY (`venueO_id`),
  ADD UNIQUE KEY `sp_id_UNIQUE` (`sp_id`),
  ADD KEY `fk_sp_venueOperator_idx` (`sp_id`),
  ADD KEY `fk_venueOperator_venue_idx` (`venue_id`);

--
-- Indexes for table `verifieduser`
--
ALTER TABLE `verifieduser`
  ADD PRIMARY KEY (`vuser_id`,`user_id`),
  ADD UNIQUE KEY `user_id_UNIQUE` (`user_id`),
  ADD KEY `fk_client_user_idx` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `band`
--
ALTER TABLE `band`
  MODIFY `band_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `comp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `customer_care`
--
ALTER TABLE `customer_care`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_log`
--
ALTER TABLE `payment_log`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `resrequest`
--
ALTER TABLE `resrequest`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `serviceprovider`
--
ALTER TABLE `serviceprovider`
  MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `singer`
--
ALTER TABLE `singer`
  MODIFY `singer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `spvreq`
--
ALTER TABLE `spvreq`
  MODIFY `spv_req_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `uservreq`
--
ALTER TABLE `uservreq`
  MODIFY `userVreq_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `venue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `venuemanager`
--
ALTER TABLE `venuemanager`
  MODIFY `venueM_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `venueoperator`
--
ALTER TABLE `venueoperator`
  MODIFY `venueO_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `verifieduser`
--
ALTER TABLE `verifieduser`
  MODIFY `vuser_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_admin_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ads`
--
ALTER TABLE `ads`
  ADD CONSTRAINT `fk_user_ad` FOREIGN KEY (`user_id`) REFERENCES `serviceprovider` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ad_band`
--
ALTER TABLE `ad_band`
  ADD CONSTRAINT `fk_ads_adBand` FOREIGN KEY (`ad_id`) REFERENCES `ads` (`ad_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ad_singer`
--
ALTER TABLE `ad_singer`
  ADD CONSTRAINT `fk_ads_adSinger` FOREIGN KEY (`ad_id`) REFERENCES `ads` (`ad_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ad_venue`
--
ALTER TABLE `ad_venue`
  ADD CONSTRAINT `fk_ads_adVenue` FOREIGN KEY (`ad_id`) REFERENCES `ads` (`ad_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `band`
--
ALTER TABLE `band`
  ADD CONSTRAINT `sk_sp_band` FOREIGN KEY (`sp_id`) REFERENCES `serviceprovider` (`sp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `fk_complaint_cust` FOREIGN KEY (`cust_id`) REFERENCES `customer_care` (`cust_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_complaint_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `complaint_assist`
--
ALTER TABLE `complaint_assist`
  ADD CONSTRAINT `complaint_assist_complaints_comp_id_fk` FOREIGN KEY (`comp_id`) REFERENCES `complaints` (`comp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_care`
--
ALTER TABLE `customer_care`
  ADD CONSTRAINT `fk_user_ccagent` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `fk_event_band` FOREIGN KEY (`band_id`) REFERENCES `band` (`band_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_event_venue` FOREIGN KEY (`venue_id`) REFERENCES `venue` (`venue_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_event_venueO` FOREIGN KEY (`venueO_id`) REFERENCES `venueoperator` (`venueO_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_event_vuser` FOREIGN KEY (`user_id`) REFERENCES `verifieduser` (`vuser_id`) ON UPDATE CASCADE;

--
-- Constraints for table `event_singer`
--
ALTER TABLE `event_singer`
  ADD CONSTRAINT `fk_event_es` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_singer_es` FOREIGN KEY (`singer_id`) REFERENCES `singer` (`singer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment_log`
--
ALTER TABLE `payment_log`
  ADD CONSTRAINT `fk_payment_ads` FOREIGN KEY (`ad_id`) REFERENCES `ads` (`ad_id`),
  ADD CONSTRAINT `fk_payment_event` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`),
  ADD CONSTRAINT `fk_payment_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `fk_res_sp` FOREIGN KEY (`sp_id`) REFERENCES `serviceprovider` (`sp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_res_vuser` FOREIGN KEY (`vuser_id`) REFERENCES `verifieduser` (`vuser_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resrequest`
--
ALTER TABLE `resrequest`
  ADD CONSTRAINT `fk_resReq_sp` FOREIGN KEY (`sp_id`) REFERENCES `serviceprovider` (`sp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_resReq_vuser` FOREIGN KEY (`vuser_id`) REFERENCES `verifieduser` (`vuser_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fk_review_sp` FOREIGN KEY (`sp_id`) REFERENCES `serviceprovider` (`sp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_review_vuser` FOREIGN KEY (`vuser_id`) REFERENCES `verifieduser` (`vuser_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `serviceprovider`
--
ALTER TABLE `serviceprovider`
  ADD CONSTRAINT `fk_sp_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `singer`
--
ALTER TABLE `singer`
  ADD CONSTRAINT `fk_sp_singer` FOREIGN KEY (`sp_id`) REFERENCES `serviceprovider` (`sp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `spvreq`
--
ALTER TABLE `spvreq`
  ADD CONSTRAINT `fk_spVreq_custCare` FOREIGN KEY (`cust_id`) REFERENCES `customer_care` (`cust_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_spVreq_sp` FOREIGN KEY (`sp_id`) REFERENCES `serviceprovider` (`sp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `fk_ticket_event` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ticket_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `uservreq`
--
ALTER TABLE `uservreq`
  ADD CONSTRAINT `fk_userVreq_cust` FOREIGN KEY (`cust_id`) REFERENCES `customer_care` (`cust_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_userVreq_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `venue`
--
ALTER TABLE `venue`
  ADD CONSTRAINT `fk_venue_venueM` FOREIGN KEY (`venueM_id`) REFERENCES `venuemanager` (`venueM_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `venuemanager`
--
ALTER TABLE `venuemanager`
  ADD CONSTRAINT `fk_venueManager_sp` FOREIGN KEY (`sp_id`) REFERENCES `serviceprovider` (`sp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `venueoperator`
--
ALTER TABLE `venueoperator`
  ADD CONSTRAINT `fk_sp_venueOperator` FOREIGN KEY (`sp_id`) REFERENCES `serviceprovider` (`sp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_venueOperator_venue` FOREIGN KEY (`venue_id`) REFERENCES `venue` (`venue_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `verifieduser`
--
ALTER TABLE `verifieduser`
  ADD CONSTRAINT `fk_client_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
