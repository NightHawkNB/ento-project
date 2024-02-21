-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2024 at 12:36 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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

DROP DATABASE ento_db;
CREATE DATABASE ento_db;
USE ento_db;

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `report_singer` (IN `user_id` INT)   BEGIN
    -- Declare variables to store counts
    DECLARE view_count INT;
    DECLARE request_count INT;
    DECLARE accepted_request_count INT;
    DECLARE pending_request_count INT;
    DECLARE active_ad_count INT;
    DECLARE pending_ad_count INT;
    DECLARE total_ad_count INT;

    -- Query for view count
    SELECT SUM(views) INTO view_count FROM ads WHERE user_id = user_id;

    -- Query for request count
    SELECT COUNT(*) INTO request_count
    FROM resrequest
             JOIN serviceprovider ON resrequest.sp_id = serviceprovider.sp_id
    WHERE serviceprovider.user_id = user_id AND deleted = 0;

    -- Query for accepted request count
    SELECT COUNT(*) INTO accepted_request_count
    FROM resrequest
             JOIN serviceprovider ON resrequest.sp_id = serviceprovider.sp_id
    WHERE serviceprovider.user_id = user_id AND resrequest.status = 'Accepted' AND deleted = 0;

    -- Query for pending request count
    SELECT COUNT(*) INTO pending_request_count
    FROM resrequest
             JOIN serviceprovider ON resrequest.sp_id = serviceprovider.sp_id
    WHERE serviceprovider.user_id = user_id AND resrequest.status = 'Pending' AND deleted = 0;

    -- Query for Active Ad Count --
    SELECT IFNULL(COUNT(*), 0) INTO active_ad_count
    FROM ads
    WHERE user_id = user_id AND pending = 0 AND deleted = 0;

    -- Query for Pending Ad Count --
    SELECT IFNULL(COUNT(*), 0) INTO pending_ad_count
    FROM ads
    WHERE user_id = user_id AND pending = 1 AND deleted = 0;

    -- Query for Total Ad Count --
    -- Excluding the deleted ads --
    SET total_ad_count = IFNULL(active_ad_count + pending_ad_count, 0);

    -- Display the counts
    SELECT view_count, request_count, accepted_request_count, pending_request_count,
           active_ad_count, pending_ad_count, total_ad_count;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
                         `admin_id` int(11) NOT NULL,
                         `user_id` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
                       `ad_id` varchar(32) NOT NULL,
                       `user_id` varchar(32) DEFAULT NULL,
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

--
-- Triggers `ads`
--
DELIMITER $$
CREATE TRIGGER `adVenue_adExistUpdate` AFTER UPDATE ON `ads` FOR EACH ROW BEGIN
    DECLARE venueID INT;

    IF OLD.category = 'venue' THEN
        SELECT venue_id INTO venueID FROM ad_venue WHERE ad_id = OLD.ad_id;
        UPDATE venue SET ad_exist = 0 WHERE venue_id = venueID;
    END IF;
END
$$
DELIMITER ;

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
    ('AD_77956_1706448644', '', '', NULL);

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
                                                      ('AD_38486_1706418311', NULL),
                                                      ('AD_48811_1706342678', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ad_venue`
--

CREATE TABLE `ad_venue` (
                            `ad_id` varchar(32) NOT NULL,
                            `seat_count` int(11) NOT NULL DEFAULT 0,
                            `venue_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ad_venue`
--

INSERT INTO `ad_venue` (`ad_id`, `seat_count`, `venue_id`) VALUES
                                                               ('AD_1126_1707897948', 2000, 1),
                                                               ('AD_14484_1707897955', 5000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ad_views`
--

CREATE TABLE `ad_views` (
                            `id` int(11) NOT NULL,
                            `user_id` varchar(32) NOT NULL,
                            `month` int(11) NOT NULL,
                            `year` int(11) NOT NULL,
                            `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ad_views`
--

INSERT INTO `ad_views` (`id`, `user_id`, `month`, `year`, `count`) VALUES
                                                                       (2, '58', 1, 2024, 8),
                                                                       (3, '41', 12, 2023, 9),
                                                                       (4, '44', 2, 2024, 38),
                                                                       (0, '41', 2, 2024, 10),
                                                                       (0, '58', 2, 2024, 1);

-- --------------------------------------------------------

--
-- Table structure for table `band`
--

CREATE TABLE `band` (
                        `band_id` int(11) NOT NULL,
                        `sp_id` int(11) NOT NULL,
                        `packages` varchar(45) DEFAULT NULL,
                        `location` varchar(45) NOT NULL,
                        `AvgResTime` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `band`
--

INSERT INTO `band` (`band_id`, `sp_id`, `packages`, `location`, `AvgResTime`) VALUES
    (1, 4, '85000', 'Colombo', '100');

-- --------------------------------------------------------

--
-- Table structure for table `calendar_schedule`
--

CREATE TABLE `calendar_schedule` (
                                     `period_id` int(11) NOT NULL,
                                     `user_id` varchar(32) NOT NULL,
                                     `name` varchar(32) DEFAULT 'Busy',
                                     `start_time` datetime DEFAULT NULL,
                                     `end_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `calendar_schedule`
--

INSERT INTO `calendar_schedule` (`period_id`, `user_id`, `name`, `start_time`, `end_time`) VALUES
                                                                                               (1, '44', 'Busy', '2023-11-27 19:00:00', '2023-11-26 20:00:00'),
                                                                                               (2, '44', 'Test1', '2023-11-28 10:00:00', '2023-11-28 22:00:00'),
                                                                                               (3, '44', 'Thanksgiving Party', '2023-11-26 07:00:00', '2023-11-26 23:00:00'),
                                                                                               (4, '44', 'Hellow World', '2023-11-26 00:00:00', '2023-11-26 12:15:00'),
                                                                                               (15, '44', 'Christmas Party', '2023-12-25 16:00:00', '2023-12-25 20:00:00'),
                                                                                               (16, '44', 'Christmas Carol', '2023-12-25 13:00:00', '2023-12-25 13:05:00'),
                                                                                               (17, '44', '1', '2023-12-25 10:00:00', '2023-12-25 10:01:00');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
                              `comp_id` int(11) NOT NULL,
                              `details` varchar(512) NOT NULL,
                              `files` varchar(256) DEFAULT NULL,
                              `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
                              `user_id` varchar(32) NOT NULL,
                              `cca_user_id` varchar(32) DEFAULT NULL,
                              `status` varchar(20) DEFAULT 'Idle',
                              `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`comp_id`, `details`, `files`, `date_time`, `user_id`, `cca_user_id`, `status`, `deleted`) VALUES
                                                                                                                         (8, 'Complaints', 'File - 01', '2023-10-30 08:42:07', '44', NULL, 'Handled', 0),
                                                                                                                         (10, 'Hellow World', 'File_02', '2023-10-31 08:09:18', '38', NULL, 'Assist', 0),
                                                                                                                         (21, 'Something Something\r\n', NULL, '2023-10-31 15:26:53', '48', NULL, 'Assist', 0),
                                                                                                                         (22, 'UI not working', NULL, '2023-11-01 03:59:40', '44', NULL, 'Assist', 0),
                                                                                                                         (24, 'Something went wrong :)\r\n', NULL, '2023-12-02 18:01:35', '58', NULL, 'Idle', 0);

-- --------------------------------------------------------

--
-- Table structure for table `complaint_assist`
--

CREATE TABLE `complaint_assist` (
                                    `comp_id` int(11) NOT NULL,
                                    `date_time` datetime NOT NULL DEFAULT current_timestamp(),
                                    `status` varchar(20) NOT NULL DEFAULT 'Idle',
                                    `comment` varchar(512) DEFAULT NULL,
                                    `admin_user_id` varchar(32) DEFAULT NULL,
                                    `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `complaint_assist`
--

INSERT INTO `complaint_assist` (`comp_id`, `date_time`, `status`, `comment`, `admin_user_id`, `deleted`) VALUES
                                                                                                             (10, '2023-12-01 19:35:55', 'handled', 'dsdasd', NULL, 0),
                                                                                                             (21, '2023-12-01 19:35:56', 'assist', NULL, NULL, 0),
                                                                                                             (22, '2023-12-01 20:17:04', 'Idle', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_care`
--

CREATE TABLE `customer_care` (
                                 `cust_id` int(11) NOT NULL,
                                 `user_id` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deleted_user`
--

CREATE TABLE `deleted_user` (
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
-- Dumping data for table `deleted_user`
--

INSERT INTO `deleted_user` (`user_id`, `fname`, `lname`, `email`, `nic_num`, `address1`, `address2`, `province`, `district`, `password`, `contact_num`, `user_type`, `image`, `verified`) VALUES
                                                                                                                                                                                              ('45', 'singer', '03', 'singer3@ento.com', NULL, '1', '1', '1', '1', 'singer', '1', 'singer', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 0),
                                                                                                                                                                                              ('USER_48295_1703852626', 'sithum', 'anjana', 'sithum1@gmail.com', NULL, 'Dhadagamuwa', 'Veyangoda', 'eastern', 'Batticaloa', '$2y$10$T0xswEMF4Q5NofjVuF4XruoMUoDSossvMTnOV/z8nLv4gjgwGosMq', '0778894456', 'singer', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 0),
                                                                                                                                                                                              ('USER_25717_1703852672', 'sithum', 'anjana', 'sithum2@gmail.com', NULL, 'Dhadagamuwa', 'Veyangoda', 'central', 'Kandy', '$2y$10$.nXb72/Z74o3wepdnMa/XOzR/LJ44x3MUqqOV3sfL3h5AAZIqY6.q', '0778894456', 'singer', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 0),
                                                                                                                                                                                              ('USER_79549_1703852723', 'sithum', 'anjana', 'sithum2@gmail.com', NULL, 'Dhadagamuwa', 'Veyangoda', 'central', 'Kandy', '$2y$10$RricQ9WMpx/WJMVza8Sy9uCSzz11dVPCPQ6.k.wZP.Pu.4EOLeQUC', '0778894456', 'singer', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 0),
                                                                                                                                                                                              ('USER_15750_1703852756', 'sithum', 'anjana', 'sithum2@gmail.com', NULL, 'Dhadagamuwa', 'Veyangoda', 'central', 'Kandy', '$2y$10$0szFyNOQTpDwlRtS1tHoTucLaoACplHIzkS4MRR2MEvt3njn8TfDi', '0778894456', 'singer', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 0),
                                                                                                                                                                                              ('USER_59208_1703852840', 'sithum', 'anjana', 'sithum2@gmail.com', NULL, 'Dhadagamuwa', 'Veyangoda', 'northCentral', 'Polonnaruwa', '$2y$10$Gxugx/0pXFE3x/2ZWiG/tewpBmJa2NPU4ygofSfiq5ukHSztvTuX2', '0778894456', 'singer', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 0),
                                                                                                                                                                                              ('USER_46665_1703749015', 'sithum', 'anjana', 'sithum@gmail.com', NULL, 'Dhadagamuwa', 'Veyangoda', 'western', 'Gampaha', '$2y$10$56RFVsjLLTjp3s.g8jdazuEXklxNCkHELEFqTA7c9I7HqS5w658GW', '0778894456', 'client', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 0),
                                                                                                                                                                                              ('USER_19300_1703852929', 'sithum', 'anjana', 'sithum2@gmail.com', NULL, 'Dhadagamuwa', 'Veyangoda', 'central', 'Kandy', '$2y$10$BlRI7jXIy6DGzaBvMhY0j.id3ImnQRrgKd6hKqF2GJ.IG.yNJ2N8W', '0778894456', 'band', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 0),
                                                                                                                                                                                              ('USER_53952_1703858136', 'Nipun', 'Bhathiya', 'nipunbathiya1256@gmail.com', NULL, NULL, NULL, 'western', 'Gampaha', '$2y$10$vXuvZ46bZbH0wi/ylvhE3eslkafjSb2xHFgq8A7/wUl3sVNA.rC7e', '0712719315', 'venueo', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 0),
                                                                                                                                                                                              ('42', 'band', '02', 'band2@ento.com', NULL, '6', '4', '5', '5', '$2y$10$YAhBfZBSV5s46CnpUgIA6uNz9nlvnAA8z3JQGNcHSZe2mFTgGk172', '2', 'band', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 0),
                                                                                                                                                                                              ('USER_2806_1704384599', '', '', '', NULL, NULL, NULL, '', '', '$2y$10$s4cfiehOKWRjjgcOmCxlt.ZHVA7.grUpHsJZPhxCkSH0Ruc.TWSR.', '', 'client', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 0),
                                                                                                                                                                                              ('USER_22472_1704384597', '', '', '', NULL, NULL, NULL, '', '', '$2y$10$/T.zB9/OQb5vQLKa1hvBKuW9ApoLSlLFvMNI0W2WqiqiMIftW97XW', '', 'client', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 0),
                                                                                                                                                                                              ('63', 'a', 'b', 'A@ENTO.COM', NULL, '11', '1', 'central', 'Kandy', '$2y$10$d8FjeU6ypsYdotlWIitkn.obad32KYHAOjZUjpB8jVSJE8TeSR/di', '2', 'client', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 0),
                                                                                                                                                                                              ('USER_46367_1704534063', 'Nipun', 'Bhathiya', 'nipunbathiya1256@gmail.com', NULL, 'ds', 'sd', 'central', 'Kandy', '$2y$10$LogKbWVPeZiP9tcCo.5cu.j.myaOKiHVU81uw64g9FmDllo9OmVai', '0712719315', 'client', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 0),
                                                                                                                                                                                              ('USER_98022_1704740469', 'Nipun', 'Bhathiya', 'nipunbathiya1256@outlook.com', NULL, 'ds', 'sd', 'central', 'Kandy', '$2y$10$Ojm1piekuAOqLTcCyU7HVujWbtF1D3sCGc5GGaerGxINI3dgBE82O', '0712719315', 'client', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 0),
                                                                                                                                                                                              ('USER_66856_1704740546', 'Nipun', 'Bhathiya', 'nipunbathiya1256@outlook.com', NULL, 'ds', 'sd', 'central', 'Kandy', '$2y$10$GwG0rNQbg48YTwRbg2u/puj.6U55.tipIimiVkiGg/Fkg8yPDoACe', '0712719315', 'client', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 0),
                                                                                                                                                                                              ('USER_7242_1704740622', 'Nipun', 'Bhathiya', 'nipunbathiya1256@outlook.com', NULL, 'ds', 'sd', 'central', 'Kandy', '$2y$10$JbguRREumkgWDvpXqyKxfu84XId6UpLWFrB9vBv1FzvLZLN/bsXKq', '0712719315', 'client', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 0),
                                                                                                                                                                                              ('USER_82028_1704740686', 'Nipun', 'Bhathiya', 'nipunbathiya1256@outlook.com', NULL, 'ds', 'sd', 'central', 'Kandy', '$2y$10$3IrlYX6NtL/a4lLAQzz0XOGnawEv6lxeBCoQt3Tp2s9sNQg0GCewq', '0712719315', 'client', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 1),
                                                                                                                                                                                              ('USER_80867_1704533054', 'Nipun', 'Bhathiya', 'client@ento.com', NULL, 'ds', 'sd', 'central', 'Kandy', '$2y$10$0Hx0VstsPz/3cWrT.Pie9uTXz7RYVRo1MB0XXdawD0mWIp05449BW', '0712719315', 'client', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 1),
                                                                                                                                                                                              ('USER_31922_1704776554', 'test', 'user1', 'nbgnipunbathiya@outlook.com', NULL, 'ds', 'sd', 'central', 'Kandy', '$2y$10$nhpzkLFvfm72BwZmkuTVmeDm3pF/HT.B67/feRJQpvs7YI/uQnUVO', '0712719315', 'venuem', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 1),
                                                                                                                                                                                              ('USER_26809_1704779184', 'test', 'user2', 'nbgnipunbathiya@outlook.com', NULL, 'ds', 'sd', 'central', 'Kandy', '$2y$10$UEMPK1SOovEHIBlrSwUHReKqatdK2ENAGVo1SYkSCkhSBHUMWlgFe', '0712719315', 'band', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 1),
                                                                                                                                                                                              ('USER_4931_1704781941', 'test', 'user2', 'nbgnipunbathiya@outlook.com', NULL, 'ds', 'sd', 'central', 'Kandy', '$2y$10$saJrSW/wGxbAI1uqGnBD1uyLnCakTMrs113SY.xsFXBlA51O0uvYK', '0712719315', 'band', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 1),
                                                                                                                                                                                              ('USER_52734_1704782096', 'test', 'user1', 'nbgnipunbathiya@outlook.com', NULL, 'ds', 'sd', 'central', 'Kandy', '$2y$10$VCj3uXuAGffIFGz6cszN8O7Ye6VmJtIohT2PWxQ6WndcZ1Mh/KeIG', '0712719315', 'singer', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 0),
                                                                                                                                                                                              ('USER_98919_1704782133', 'test', 'user1', 'nbgnipunbathiya@outlook.com', NULL, 'Dhadagamuwa', 'nbgnipunbathiya@outlook.com', 'central', 'Kandy', '$2y$10$L/lxKWfmV9bmDTwKzNQeGOLfFl/u2DnprvJFz/4dLsAEXQ5ffPnvq', '0778894456', 'singer', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 0),
                                                                                                                                                                                              ('USER_52423_1704782168', 'test', 'user1', 'nbgnipunbathiya@outlook.com', NULL, 'Dhadagamuwa', 'nbgnipunbathiya@outlook.com', 'central', 'Kandy', '$2y$10$lHaPjX45GIAA5cIGTVuHIOHDAirJKgouRxn21BU0hK2lflVwHgqDC', '0778894456', 'singer', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 1),
                                                                                                                                                                                              ('USER_60162_1704782450', 'test', 'user1', 'nbgnipunbathiya@outlook.com', NULL, 'Dhadagamuwa', 'nbgnipunbathiya@outlook.com', 'central', 'Kandy', '$2y$10$iuzxVSVCZzMsqu9Q58/xh.fihdPotlhMvRwHjYM0K0Mah/kpmQ/gG', '0778894456', 'singer', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 0),
                                                                                                                                                                                              ('USER_44167_1704782818', 'test', 'user1', 'nbgnipunbathiya@outlook.com', NULL, 'Dhadagamuwa', 'nbgnipunbathiya@outlook.com', 'central', 'Kandy', '$2y$10$3UtJm63tdHRVvioaj94pAu3r8RzZPQqg44po.wDaEHAfV/NelCg86', '0778894456', 'singer', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 1),
                                                                                                                                                                                              ('USER_70114_1704200212', 'Nipun', 'Bhathiya', 'nipunbathiya1256@gmail.com', NULL, 'ds', 'sd', 'uva', 'Badulla', '$2y$10$3dy6NzIFBFJ0wMarjH/3NOOUklmA7dU4ySb1aakS8bYnn8/SFH0Ie', '0712719315', 'singer', 'http://localhost/ento-project/public/assets/images/users/general.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `email_verification`
--

CREATE TABLE `email_verification` (
                                      `user_id` varchar(32) NOT NULL,
                                      `verification_code` varchar(8) DEFAULT NULL,
                                      `created_datetime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `email_verification`
--

INSERT INTO `email_verification` (`user_id`, `verification_code`, `created_datetime`) VALUES
                                                                                          ('38', '483507', '2024-01-13 18:19:05'),
                                                                                          ('USER_73260_1705506192', '422149', '2024-01-17 21:41:58');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
                         `event_id` varchar(32) NOT NULL,
                         `pending` int(11) NOT NULL DEFAULT 1,
                         `name` varchar(45) NOT NULL,
                         `details` varchar(1024) DEFAULT NULL,
                         `ticketing_plan` varchar(45) NOT NULL,
                         `venue_id` int(11) DEFAULT NULL,
                         `band_id` int(11) DEFAULT NULL,
                         `creator_id` varchar(32) NOT NULL,
                         `venueO_id` int(11) DEFAULT NULL,
                         `start_time` datetime DEFAULT NULL,
                         `end_time` datetime DEFAULT NULL,
                         `image` varchar(512) DEFAULT NULL,
                         `province` varchar(64) DEFAULT NULL,
                         `district` varchar(64) DEFAULT NULL,
                         `s_image` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `pending`, `name`, `details`, `ticketing_plan`, `venue_id`, `band_id`, `creator_id`, `venueO_id`, `start_time`, `end_time`, `image`, `province`, `district`, `s_image`) VALUES
    ('EVENT_dsadasd', 0, 'Yaathra', 'Musical Event', '5000*20/3000*30/2000*50', 1, 1, '37', NULL, '2023-09-30 12:00:00', '2023-11-30 16:00:00', 'event-01.jpeg', NULL, 'Gampaha', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_singer`
--

CREATE TABLE `event_singer` (
                                `event_id` varchar(32) NOT NULL,
                                `singer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
                                 `notification_id` int(11) NOT NULL,
                                 `user_id` varchar(32) NOT NULL,
                                 `status` varchar(16) NOT NULL,
                                 `message` varchar(512) DEFAULT NULL,
                                 `link` varchar(512) DEFAULT NULL,
                                 `deleted` tinyint(1) NOT NULL DEFAULT 0,
                                 `viewed` tinyint(1) NOT NULL DEFAULT 0,
                                 `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `user_id`, `status`, `message`, `link`, `deleted`, `viewed`, `createdAt`) VALUES

-- --------------------------------------------------------

--
-- Table structure for table `payment_log`
--

CREATE TABLE `payment_log` (
                               `order_id` int(11) NOT NULL,
                               `user_id` varchar(32) NOT NULL,
                               `amount` int(11) NOT NULL,
                               `event_id` varchar(32) DEFAULT NULL,
                               `ad_id` varchar(32) DEFAULT NULL,
                               `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `payment_log`
--

INSERT INTO `payment_log` (`order_id`, `user_id`, `amount`, `event_id`, `ad_id`, `datetime`) VALUES
                                                                                                 (2, '38', 10000, 'EVENT_dsadasd', NULL, '2024-02-02 17:38:17'),
                                                                                                 (3, '38', 6000, 'EVENT_dsadasd', NULL, '2024-02-02 17:51:32'),
                                                                                                 (4, '38', 21000, 'EVENT_dsadasd', NULL, '2024-02-02 17:52:54'),
                                                                                                 (5, '38', 9000, 'EVENT_dsadasd', NULL, '2024-02-02 17:53:57'),
                                                                                                 (6, '38', 20000, 'EVENT_dsadasd', NULL, '2024-02-02 17:57:51');

-- --------------------------------------------------------

--
-- Table structure for table `request_chat`
--

CREATE TABLE `request_chat` (
                                `chat_id` int(11) NOT NULL,
                                `sender_id` varchar(32) DEFAULT NULL,
                                `receiver_id` varchar(32) DEFAULT NULL,
                                `request_id` varchar(32) NOT NULL,
                                `source` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `request_chat`
--

INSERT INTO `request_chat` (`chat_id`, `sender_id`, `receiver_id`, `request_id`, `source`) VALUES
                                                                                               (1, '44', '38', '4', '../app/data/chats/requests/0.txt'),
                                                                                               (2, '44', '37', '', '../app/data/chats/requests/2.txt');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
                                `reservation_id` varchar(32) NOT NULL,
                                `sp_id` int(11) NOT NULL,
                                `user_id` varchar(32) NOT NULL,
                                `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `sp_id`, `user_id`, `deleted`) VALUES
    ('RES_30140_1707904209', 10, '38', 0);

-- --------------------------------------------------------

--
-- Table structure for table `resrequest`
--

CREATE TABLE `resrequest` (
                              `req_id` varchar(32) NOT NULL,
                              `user_id` varchar(32) NOT NULL,
                              `sp_id` int(11) NOT NULL,
                              `ad_id` varchar(32) NOT NULL,
                              `createdDate` datetime NOT NULL DEFAULT current_timestamp(),
                              `respondedDate` date DEFAULT NULL,
                              `details` varchar(45) DEFAULT NULL,
                              `location` varchar(64) NOT NULL DEFAULT 'City or Address',
                              `location_id` int(11) DEFAULT NULL,
                              `start_time` datetime DEFAULT NULL,
                              `end_time` datetime DEFAULT NULL,
                              `status` varchar(32) NOT NULL DEFAULT 'Pending',
                              `deleted` tinyint(1) NOT NULL DEFAULT 0,
                              `reservation_id` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `resrequest`
--

INSERT INTO `resrequest` (`req_id`, `user_id`, `sp_id`, `ad_id`, `createdDate`, `respondedDate`, `details`, `location`, `location_id`, `start_time`, `end_time`, `status`, `deleted`, `reservation_id`) VALUES
    ('RESREQ_43970_1707903432', '38', 10, 'AD_14484_1707897955', '2024-02-14 15:07:12', NULL, 'Anniversary Party', 'Migamuwa', 2, '2024-02-21 15:07:00', '2024-02-22 15:07:00', 'Accepted', 0, 'RES_30140_1707904209');

--
-- Triggers `resrequest`
--
DELIMITER $$
CREATE TRIGGER `resrequest_update_trigger` AFTER UPDATE ON `resrequest` FOR EACH ROW BEGIN
    IF NEW.status = 'Accepted' AND OLD.status != 'Accepted' THEN
        INSERT INTO notifications (user_id, status, message, link)
        VALUES (NEW.user_id, 'normal', 'Reservation Accepted', CONCAT('Reservation_id : ', NEW.reservation_id));
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `res_chat`
--

CREATE TABLE `res_chat` (
                            `chat_id` int(11) NOT NULL,
                            `sender_id` varchar(32) DEFAULT NULL,
                            `receiver_id` varchar(32) DEFAULT NULL,
                            `reservation_id` varchar(32) NOT NULL,
                            `source` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `res_chat`
--

INSERT INTO `res_chat` (`chat_id`, `sender_id`, `receiver_id`, `reservation_id`, `source`) VALUES
                                                                                               (1, '58', '37', 'RES_13475_1700919591', '../app/data/chats/reservations/1.txt'),
                                                                                               (6, '58', '38', 'RES_6519_1702206942', '../app/data/chats/reservations/6.txt'),
                                                                                               (9, '58', '38', 'RES_26646_1702631611', '../app/data/chats/reservations/9.txt'),
                                                                                               (13, '44', '38', 'RES_29653_1703654881', '../app/data/chats/reservations/13.txt'),
                                                                                               (14, '44', '41', 'RES_25664_1699881610', '../app/data/chats/reservations/14.txt'),
                                                                                               (17, '44', '38', '4', '../app/data/chats/reservations/17.txt'),
                                                                                               (18, '44', '37', '8', '../app/data/chats/reservations/18.txt'),
                                                                                               (19, '44', '38', 'RES_11700_1706420020', '../app/data/chats/reservations/19.txt');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
                          `review_id` int(11) NOT NULL,
                          `reservation_id` varchar(20) NOT NULL,
                          `creator_id` varchar(32) NOT NULL,
                          `target_id` varchar(32) NOT NULL,
                          `rating` int(11) NOT NULL,
                          `content` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `reservation_id`, `creator_id`, `target_id`, `rating`, `content`) VALUES
    (1, 'RES_11700_1706420020', '38', '44', 5, 'Hellow World');

-- --------------------------------------------------------

--
-- Table structure for table `serviceprovider`
--

CREATE TABLE `serviceprovider` (
                                   `sp_id` int(11) NOT NULL,
                                   `user_id` varchar(32) NOT NULL,
                                   `verified` tinyint(4) DEFAULT 0,
                                   `sp_type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `serviceprovider`
--

INSERT INTO `serviceprovider` (`sp_id`, `user_id`, `verified`, `sp_type`) VALUES
                                                                              (3, '37', 1, 'singer'),
                                                                              (4, '41', 1, 'band'),
                                                                              (7, '44', 1, 'singer'),
                                                                              (10, '58', 1, 'venuem'),
                                                                              (11, '66', 1, 'singer'),
                                                                              (25, 'USER_74840_1701271384', 0, 'venueo'),
                                                                              (33, 'USER_99858_1702039969', 0, 'venueo'),
                                                                              (34, 'USER_3192_1702187236', 0, 'venueo'),
                                                                              (49, 'USER_95908_1704741045', 0, 'singer'),
                                                                              (58, 'USER_73260_1705506192', 0, 'singer'),
                                                                              (59, 'USER_70325_1705656028', 0, 'singer'),
                                                                              (60, 'USER_15179_1706089562', 0, 'singer'),
                                                                              (61, 'USER_37338_1706417629', 0, 'singer');

-- --------------------------------------------------------

--
-- Table structure for table `singer`
--

CREATE TABLE `singer` (
                          `singer_id` int(11) NOT NULL,
                          `sp_id` int(11) NOT NULL,
                          `rate` int(11) NOT NULL,
                          `AvgResTime` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `singer`
--

INSERT INTO `singer` (`singer_id`, `sp_id`, `rate`, `AvgResTime`) VALUES
                                                                      (1, 3, 15000, '100'),
                                                                      (5, 7, 50000, '105'),
                                                                      (19, 49, 50000, NULL),
                                                                      (23, 58, 0, NULL),
                                                                      (24, 59, 50000, NULL),
                                                                      (25, 60, 0, NULL),
                                                                      (26, 61, 17000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spvreq`
--

CREATE TABLE `spvreq` (
                          `spv_req_id` int(11) NOT NULL,
                          `sp_id` int(11) NOT NULL,
                          `cca_user_id` varchar(32) DEFAULT NULL,
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
                           `event_id` varchar(32) NOT NULL,
                           `user_id` varchar(32) DEFAULT NULL,
                           `hash` varchar(256) NOT NULL,
                           `type` varchar(16) NOT NULL,
                           `price` int(11) NOT NULL,
                           `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `event_id`, `user_id`, `hash`, `type`, `price`, `deleted`) VALUES
                                                                                                   (3, 'EVENT_dsadasd', '38', '944F71AEE952800B8AEB72146873CD70', '4', 44, 0),
                                                                                                   (4, 'EVENT_dsadasd', '38', '43FB68E26720F2E0D05E299A9B16016F', '12', 12, 0),
                                                                                                   (5, 'EVENT_dsadasd', '38', 'EBA82ACADA8C6768ED20117E67F9EF89', '11', 11, 0),
                                                                                                   (6, 'EVENT_dsadasd', '38', 'hash', 'default', 3000, 0),
                                                                                                   (7, 'EVENT_dsadasd', '38', 'hash', 'default', 7000, 0),
                                                                                                   (8, 'EVENT_dsadasd', '38', 'hash', 'default', 3000, 0),
                                                                                                   (9, 'EVENT_dsadasd', '38', 'AF4825BA498510FFD8C9A7445FBCA37D', 'default', 5000, 0);

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
                                                                                                                                                                                      ('37', 'fname', 'lname', 'cha@ento.com', NULL, 'Colombo', '10', 'western', 'Gampaha', '$2y$10$3d5Ysv6/yADqn9uyj8Sb9.McnVEv1ils1XBoQT16ceTOWauzdRbdS', 'contact_num', 'eventm', '/assets/images/users/37.jpg', 1),
                                                                                                                                                                                      ('38', 'fname', 'lname', 'client@ento.com', NULL, 'Address01', 'Address02', 'central', 'Kandy', '$2y$10$jYgsDUVHIzIamk.pq/4igOcOdbUyWdiUTCYQ1P78BSD15OYvwVxna', 'contact_num', 'client', '/assets/images/users/38.jpg', 0),
                                                                                                                                                                                      ('40', 'admin', '01', 'admin1@ento.com', NULL, 'AD1', 'AD2', 'CT', 'DT', '$2y$10$Yaq0hYCdITLX7CGUYrDiu.v2sO7aUf79mgZmLqJT7CY013YQkWnXS', '0744587584', 'admin', '/assets/images/users/general.jpg', 1),
                                                                                                                                                                                      ('41', 'band', '01', 'band1@ento.com', NULL, '5', '6', '4', '5', '$2y$10$4SbR6UUaBibEYOLWTpfRXOeZF8Qy9azix2AYaK.5cLeJ5NY5TLojW', '4', 'band', '/assets/images/users/general.jpg', 1),
                                                                                                                                                                                      ('44', 'Sadun', 'Prabrashawara', 'singer2@ento.com', NULL, '295/C', 'Pahala Yagoda', 'western', 'Gampaha', '$2y$10$VYwqELysomfvQ7KnpFdJjO213El1HOsJ7wx/3CgBFKCYDtGIe7irK', '0715888588', 'singer', '/assets/images/users/general.jpg', 1),
                                                                                                                                                                                      ('48', 'fname', 'lname', 'cca1@ento.com', NULL, '1', '1', 'central', 'Kandy', '$2y$10$TBnI1tA8WClwpesXdZp1u.iWJwwCjGkTyPmOQ53xY3LylCC9srbxi', 'contact_num', 'cca', 'http://localhost/ento-project/public/assets/images/users/48.jpg', 1),
                                                                                                                                                                                      ('58', 'Shaun', 'Morgan', 'venuem1@ento.com', NULL, 'Saman Mawatha', '365/D', 'western', 'Gampaha', '$2y$10$EBZqpefKzVObk8mtX2MwzuIjzhkQ2T0bPuk77FCNe8N9HztzQIUsu', '07188853315', 'venuem', '/assets/images/users/58.jpg', 0),
                                                                                                                                                                                      ('64', 'alila', 'milinda', 'akila@ento.com', NULL, '345', 'mulleriyawa', 'colombo', 'western', '$2y$10$LvELfmOhnQNtyfbRbZb5b.QY8R5r0.rk4h66hPS3da/S3Vzn3YDy2', '0757825509', 'client', '/assets/images/users/general.jpg', 1),
                                                                                                                                                                                      ('66', 'singer', '01', 'singer1@ento.com', NULL, '55', '55', '55', '55', '$2y$10$IMelU0XP8NSDHwsILo7.3elBsmZiFEwDy9UjfZR1T3vqGbDafLWGq', '077789899', 'singer', '/assets/images/users/general.jpg', 1),
                                                                                                                                                                                      ('USER_15179_1706089562', 'Nipun', 'Bhathiya', 'nipunbathiya1256@gmail.com', NULL, 'ds', 'sd', 'central', 'Kandy', '$2y$10$cXz2n1PR8qXEC6Vv9PeC6.5px54cbegBiiNYoSs/xvVwDQASz7To.', '0712719315', 'singer', '/assets/images/users/general.jpg', 1),
                                                                                                                                                                                      ('USER_3192_1702187236', 'New', 'user', 'newuser@ento.com', NULL, NULL, NULL, 'uva', 'Monaragala', '$2y$10$n5R108H5dZVlBDIIUlTrpuS2CP/76LQiDoLmo7mRKL2009erNtPR6', '0712719315', 'venueo', '/assets/images/users/general.jpg', 1),
                                                                                                                                                                                      ('USER_37338_1706417629', 'Singer', '3', 'singer3@ento.com', NULL, 'Veyangoda', 'Mirissa', 'western', 'Kalutara', '$2y$10$RjMcc05wexizyCMBhEOf..HSWefojQmR.FLVKX9FvZj4Cmn.f2fN.', '0712719315', 'singer', '/assets/images/users/general.jpg', 0),
                                                                                                                                                                                      ('USER_45764_1699532744', 'Nipun', 'Bathiya', 'nipun@gmail.com', NULL, 'Ihalagama', 'West', 'Gampaha', 'Gampaha', '$2y$10$SvDlQVD3O9N.i7GSglqKyu.8CDJdADvi49UODrY.1/iUxnm2eV.6G', '0712719315', 'client', '/assets/images/users/general.jpg', 1),
                                                                                                                                                                                      ('USER_70325_1705656028', 'sdda', 'sad', 'nipun3@gmail.com', NULL, '161/K', 'Walawwaththa, Ihalagama', 'central', 'Kandy', '$2y$10$MA2smIphyXQRcwY.i0Z3..NmopRc3Pb7V/i1DdtGRwdBcGr.czWJq', '0712845565', 'singer', '/assets/images/users/general.jpg', 0),
                                                                                                                                                                                      ('USER_73260_1705506192', 'Nipun', 'Bhathiya', 'nipun12@gmail.com', NULL, 'Dhadagamuwa', 'Veyangoda', 'western', 'Gampaha', '$2y$10$7eAHWMXbmBEtl/qL97okf.BCA5YVrAZfZkdfP8mLoG.dxsZ26gCuC', '0712719315', 'singer', '/assets/images/users/general.jpg', 0),
                                                                                                                                                                                      ('USER_74840_1701271384', 'James', 'Brown', 'venueo@ento.com', NULL, '', '', 'western', 'Kalutara', '$2y$10$BL6vQk6VRbSwe1Pk4RiV9egaMB5qa/f9UpJgLFI84ejygh2d.kIWi', '0995556456', 'venueo', '/assets/images/users/general.jpg', 1),
                                                                                                                                                                                      ('USER_95908_1704741045', 'fname', 'lname', 'nipunbathiya1256@outlook.com', NULL, 'ds', 'sd', 'central', 'Kandy', '$2y$10$t.LfN1X8X0Bqsu7r2wJ17uEx18zbLwpEvW4HFwP/b2QdlT1MKnOfa', 'contact_num', 'singer', '/assets/images/users/USER_95908_1704741045.png', 1),
                                                                                                                                                                                      ('USER_99858_1702039969', 'New', 'User', 'venue@ento.com', NULL, NULL, NULL, 'western', 'Gampaha', '$2y$10$K6l5T/DJtM56zhCaKm3F7en/LfLw8F8D4lmZ0LPBkFJctcnSlGm6.', '11213', 'venueo', '/assets/images/users/general.jpg', 1);

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `t_user_delete` BEFORE DELETE ON `user` FOR EACH ROW insert into deleted_user(user_id, fname, lname, email, nic_num, address1, address2,
                                                                                             province, district, password, contact_num, user_type, image, verified)
                                                                    select user_id, fname, lname, email, nic_num, address1, address2, province, district,
                                                                           password, contact_num, user_type, image, verified
                                                                    from user where user_id = old.user_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `uservreq`
--

CREATE TABLE `uservreq` (
                            `userVreq_id` int(11) NOT NULL,
                            `user_id` varchar(32) NOT NULL,
                            `cust_id` int(11) DEFAULT NULL,
                            `timestamps` date DEFAULT NULL,
                            `resources` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `uservreq`
--

INSERT INTO `uservreq` (`userVreq_id`, `user_id`, `cust_id`, `timestamps`, `resources`) VALUES
                                                                                            (1, '37', NULL, '2023-12-02', 'Something'),
                                                                                            (2, '40', NULL, '2023-12-02', '5656'),
                                                                                            (3, '37', NULL, '2023-12-13', 'dsda');

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
                         `venueM_id` int(11) DEFAULT NULL,
                         `deleted` tinyint(1) DEFAULT 0,
                         `ad_exist` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`venue_id`, `name`, `location`, `image`, `seat_count`, `packages`, `other`, `venueM_id`, `deleted`, `ad_exist`) VALUES
                                                                                                                                         (1, 'Nelum Pokuna', 'Colombo', '/assets/images/venues/1.jpg', 2000, 'Some kind of description about the available ', 'Luxury', 3, 0, 0),
                                                                                                                                         (2, 'Beach Venue', 'Migamuwa', '/assets/images/venues/2.png', 5000, '27500', 'Open Area\r\nNo Seats', 3, 0, 0),
                                                                                                                                         (5, 'Underworld', 'Fantasy', '/assets/images/venues/5.png', 1000, 'sadasd', 'sadsad', 3, 0, 0),
                                                                                                                                         (13, 'Avalon', 'Albion', '/assets/images/venues/13.png', 0, 'Package details', 'Other Details', 3, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `venuemanager`
--

CREATE TABLE `venuemanager` (
                                `venueM_id` int(11) NOT NULL,
                                `sp_id` int(11) NOT NULL,
                                `AvgResTime` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `venuemanager`
--

INSERT INTO `venuemanager` (`venueM_id`, `sp_id`, `AvgResTime`) VALUES
    (3, 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `venueoperator`
--

CREATE TABLE `venueoperator` (
                                 `venueO_id` int(11) NOT NULL,
                                 `sp_id` int(11) NOT NULL,
                                 `venue_id` int(11) DEFAULT NULL,
                                 `venueM_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `venueoperator`
--

INSERT INTO `venueoperator` (`venueO_id`, `sp_id`, `venue_id`, `venueM_id`) VALUES
                                                                                (11, 25, NULL, 3),
                                                                                (19, 33, 1, 3),
                                                                                (20, 34, 5, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
    ADD PRIMARY KEY (`ad_id`),
    ADD KEY `fk_ads_serviceprovider` (`user_id`);

--
-- Indexes for table `ad_venue`
--
ALTER TABLE `ad_venue`
    ADD KEY `fk_adVenue_venue` (`venue_id`),
    ADD KEY `fk_adVenue_ad` (`ad_id`);

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
    ADD KEY `fk_ccaComplaints_user` (`cca_user_id`);

--
-- Indexes for table `customer_care`
--
ALTER TABLE `customer_care`
    ADD PRIMARY KEY (`cust_id`,`user_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
    ADD PRIMARY KEY (`event_id`),
    ADD KEY `fk_event_venue_idx` (`venue_id`),
    ADD KEY `fk_event_band_idx` (`band_id`),
    ADD KEY `fk_event_vuser_idx` (`creator_id`),
    ADD KEY `fk_event_venueO_idx` (`venueO_id`);

--
-- Indexes for table `event_singer`
--
ALTER TABLE `event_singer`
    ADD PRIMARY KEY (`event_id`,`singer_id`),
    ADD KEY `fk_event_es_idx` (`event_id`),
    ADD KEY `fk_singer_es_idx` (`singer_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
    ADD PRIMARY KEY (`notification_id`),
    ADD KEY `fk_notification_user` (`user_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
    ADD PRIMARY KEY (`notification_id`),
  ADD KEY `fk_notification_user` (`user_id`);

--
-- Indexes for table `payment_log`
--
ALTER TABLE `payment_log`
    ADD UNIQUE KEY `payment_log_pk` (`order_id`),
    ADD KEY `fk_payment_ads` (`ad_id`),
    ADD KEY `fk_user_paymentLog` (`user_id`),
    ADD KEY `payment_log_event_event_id_fk` (`event_id`);

--
-- Indexes for table `request_chat`
--
ALTER TABLE `request_chat`
    ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
    ADD PRIMARY KEY (`reservation_id`),
    ADD KEY `fk_res_sp_idx` (`sp_id`),
    ADD KEY `fk_res_vuser_idx` (`user_id`);

--
-- Indexes for table `resrequest`
--
ALTER TABLE `resrequest`
    ADD PRIMARY KEY (`req_id`),
    ADD KEY `fk_resReq_vuser_idx` (`user_id`),
    ADD KEY `fk_resReq_sp_idx` (`sp_id`),
    ADD KEY `resrequest_reservations_reservation_id_fk` (`reservation_id`);

--
-- Indexes for table `res_chat`
--
ALTER TABLE `res_chat`
    ADD PRIMARY KEY (`chat_id`),
    ADD KEY `res_chat_user_user_id_fk` (`sender_id`),
    ADD KEY `res_chat_user_user_id_fk2` (`receiver_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
    ADD PRIMARY KEY (`review_id`),
    ADD KEY `fk_reviewTarget_user` (`target_id`),
    ADD KEY `fk_reviewCreator_user` (`creator_id`),
    ADD KEY `reservation_id` (`reservation_id`,`target_id`);

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
    ADD KEY `fk_ccaSPVREQ_user` (`cca_user_id`);

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
    ADD KEY `fk_venueOperator_venue_idx` (`venue_id`),
    ADD KEY `venueoperator_venuemanager_venueM_id_fk` (`venueM_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--

-- AUTO_INCREMENT for table `band`
--
ALTER TABLE `band`
    MODIFY `band_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
    MODIFY `comp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `customer_care`
--
ALTER TABLE `customer_care`
    MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
    MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_log`
--
ALTER TABLE `payment_log`
    MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `request_chat`
--
ALTER TABLE `request_chat`
    MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `res_chat`
--
ALTER TABLE `res_chat`
    MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
    MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `serviceprovider`
--
ALTER TABLE `serviceprovider`
    MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `singer`
--
ALTER TABLE `singer`
    MODIFY `singer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `spvreq`
--
ALTER TABLE `spvreq`
    MODIFY `spv_req_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
    MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `uservreq`
--
ALTER TABLE `uservreq`
    MODIFY `userVreq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
    MODIFY `venue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `venuemanager`
--
ALTER TABLE `venuemanager`
    MODIFY `venueM_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `venueoperator`
--
ALTER TABLE `venueoperator`
    MODIFY `venueO_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ads`
--
ALTER TABLE `ads`
    ADD CONSTRAINT `fk_ads_serviceprovider` FOREIGN KEY (`user_id`) REFERENCES `serviceprovider` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `ad_venue`
--
ALTER TABLE `ad_venue`
    ADD CONSTRAINT `fk_adVenue_ad` FOREIGN KEY (`ad_id`) REFERENCES `ads` (`ad_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `fk_adVenue_venue` FOREIGN KEY (`venue_id`) REFERENCES `venue` (`venue_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `band`
--
ALTER TABLE `band`
    ADD CONSTRAINT `sk_sp_band` FOREIGN KEY (`sp_id`) REFERENCES `serviceprovider` (`sp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
    ADD CONSTRAINT `fk_ccaComplaints_user` FOREIGN KEY (`cca_user_id`) REFERENCES `user` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
    ADD CONSTRAINT `fk_user_complaints` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `event`
--
ALTER TABLE `event`
    ADD CONSTRAINT `event_user_user_id_fk` FOREIGN KEY (`creator_id`) REFERENCES `user` (`user_id`),
    ADD CONSTRAINT `fk_event_band` FOREIGN KEY (`band_id`) REFERENCES `band` (`band_id`) ON DELETE SET NULL ON UPDATE CASCADE,
    ADD CONSTRAINT `fk_event_venue` FOREIGN KEY (`venue_id`) REFERENCES `venue` (`venue_id`) ON DELETE SET NULL ON UPDATE CASCADE,
    ADD CONSTRAINT `fk_event_venueO` FOREIGN KEY (`venueO_id`) REFERENCES `venueoperator` (`venueO_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `event_singer`
--
ALTER TABLE `event_singer`
    ADD CONSTRAINT `event_singer_event_event_id_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`),
    ADD CONSTRAINT `fk_singer_es` FOREIGN KEY (`singer_id`) REFERENCES `singer` (`singer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
    ADD CONSTRAINT `fk_notification_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
    ADD CONSTRAINT `fk_notification_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment_log`
--
ALTER TABLE `payment_log`
    ADD CONSTRAINT `fk_payment_ads` FOREIGN KEY (`ad_id`) REFERENCES `ads` (`ad_id`),
    ADD CONSTRAINT `fk_user_paymentLog` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
    ADD CONSTRAINT `payment_log_event_event_id_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
    ADD CONSTRAINT `fk_serviceprovider_reservation` FOREIGN KEY (`sp_id`) REFERENCES `serviceprovider` (`sp_id`),
    ADD CONSTRAINT `reservations_resrequest_reservation_id_fk` FOREIGN KEY (`reservation_id`) REFERENCES `resrequest` (`reservation_id`),
    ADD CONSTRAINT `reservations_user_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `resrequest`
--
ALTER TABLE `resrequest`
    ADD CONSTRAINT `fk_resReq_sp` FOREIGN KEY (`sp_id`) REFERENCES `serviceprovider` (`sp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `resrequest_user_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `res_chat`
--
ALTER TABLE `res_chat`
    ADD CONSTRAINT `res_chat_user_user_id_fk` FOREIGN KEY (`sender_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE SET NULL,
    ADD CONSTRAINT `res_chat_user_user_id_fk2` FOREIGN KEY (`receiver_id`) REFERENCES `user` (`user_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
    ADD CONSTRAINT `fk_reviewCreator_user` FOREIGN KEY (`creator_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `fk_reviewRes_res` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`reservation_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `fk_reviewTarget_user` FOREIGN KEY (`target_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `serviceprovider`
--
ALTER TABLE `serviceprovider`
    ADD CONSTRAINT `fk_user_serviceprovider` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `singer`
--
ALTER TABLE `singer`
    ADD CONSTRAINT `fk_sp_singer` FOREIGN KEY (`sp_id`) REFERENCES `serviceprovider` (`sp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `spvreq`
--
ALTER TABLE `spvreq`
    ADD CONSTRAINT `fk_ccaSPVREQ_user` FOREIGN KEY (`cca_user_id`) REFERENCES `user` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
    ADD CONSTRAINT `fk_spVreq_sp` FOREIGN KEY (`sp_id`) REFERENCES `serviceprovider` (`sp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
    ADD CONSTRAINT `fk_user_tickets` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
    ADD CONSTRAINT `tickets_event_event_id_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`);

--
-- Constraints for table `uservreq`
--
ALTER TABLE `uservreq`
    ADD CONSTRAINT `fk_userVreq_cust` FOREIGN KEY (`cust_id`) REFERENCES `customer_care` (`cust_id`) ON DELETE SET NULL ON UPDATE CASCADE,
    ADD CONSTRAINT `fk_user_uservreq` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

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
    ADD CONSTRAINT `fk_venueOperator_venue` FOREIGN KEY (`venue_id`) REFERENCES `venue` (`venue_id`) ON DELETE SET NULL ON UPDATE CASCADE,
    ADD CONSTRAINT `venueoperator_venuemanager_venueM_id_fk` FOREIGN KEY (`venueM_id`) REFERENCES `venuemanager` (`venueM_id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
