-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2015 at 12:13 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_trail`
--

CREATE TABLE IF NOT EXISTS `audit_trail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `old_value` text,
  `new_value` text,
  `action` varchar(20) NOT NULL,
  `model` varchar(50) NOT NULL,
  `model_id` int(11) NOT NULL,
  `field` varchar(20) DEFAULT NULL,
  `stamp` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=122 ;

--
-- Dumping data for table `audit_trail`
--

INSERT INTO `audit_trail` (`id`, `old_value`, `new_value`, `action`, `model`, `model_id`, `field`, `stamp`, `user_id`) VALUES
(107, '', '', 'CREATE', 'app\\models\\SchoolCls', 2, NULL, '2015-01-30 11:46:55', 7),
(108, '', '2', 'SET', 'app\\models\\SchoolCls', 2, 'cl_id', '2015-01-30 11:46:55', 7),
(109, '', 'Year 8-A', 'SET', 'app\\models\\SchoolCls', 2, 'cl_name', '2015-01-30 11:46:55', 7),
(110, '', '7', 'SET', 'app\\models\\SchoolCls', 2, 'cl_grade', '2015-01-30 11:46:55', 7),
(111, '', '2015-01-29', 'SET', 'app\\models\\SchoolCls', 2, 'cl_start_date', '2015-01-30 11:46:55', 7),
(112, '', '', 'CREATE', 'app\\models\\Student', 1, NULL, '2015-01-30 11:46:55', 7),
(113, '', '1', 'SET', 'app\\models\\Student', 1, 'st_id', '2015-01-30 11:46:55', 7),
(114, '', '2', 'SET', 'app\\models\\Student', 1, 'st_class_id', '2015-01-30 11:46:55', 7),
(115, '', 'Hans', 'SET', 'app\\models\\Student', 1, 'st_name', '2015-01-30 11:46:55', 7),
(116, '', '2015-01-30', 'SET', 'app\\models\\Student', 1, 'st_date_of_birth', '2015-01-30 11:46:55', 7),
(117, '', '', 'CREATE', 'app\\models\\Student', 2, NULL, '2015-01-30 11:46:55', 7),
(118, '', '2', 'SET', 'app\\models\\Student', 2, 'st_id', '2015-01-30 11:46:55', 7),
(119, '', '2', 'SET', 'app\\models\\Student', 2, 'st_class_id', '2015-01-30 11:46:55', 7),
(120, '', 'Harlan', 'SET', 'app\\models\\Student', 2, 'st_name', '2015-01-30 11:46:55', 7),
(121, '', '2015-01-23', 'SET', 'app\\models\\Student', 2, 'st_date_of_birth', '2015-01-30 11:46:55', 7);

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '7', 1420389330),
('testing', '1', 1417961075);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/*', 2, NULL, NULL, NULL, 1420389051, 1420389051),
('/continent/create', 2, NULL, NULL, NULL, 1417960805, 1417960805),
('/continent/delete', 2, NULL, NULL, NULL, 1417960805, 1417960805),
('/continent/update', 2, NULL, NULL, NULL, 1417960805, 1417960805),
('/country/create', 2, NULL, NULL, NULL, 1417960836, 1417960836),
('/country/delete', 2, NULL, NULL, NULL, 1417960837, 1417960837),
('/country/update', 2, NULL, NULL, NULL, 1417960836, 1417960836),
('/person/create', 2, NULL, NULL, NULL, 1422073603, 1422073603),
('/user/admin/block', 2, NULL, NULL, NULL, 1417964440, 1417964440),
('/user/admin/confirm', 2, NULL, NULL, NULL, 1417964434, 1417964434),
('/user/admin/create', 2, NULL, NULL, NULL, 1417964420, 1417964420),
('/user/admin/delete', 2, NULL, NULL, NULL, 1417964437, 1417964437),
('/user/admin/index', 2, NULL, NULL, NULL, 1417963893, 1417963893),
('/user/admin/update', 2, NULL, NULL, NULL, 1417964424, 1417964424),
('admin', 1, NULL, NULL, NULL, 1420389301, 1420389301),
('supper test', 1, NULL, NULL, NULL, 1417964307, 1417964363),
('test permission', 2, 'just a test', NULL, NULL, 1417961136, 1417961136),
('testing', 1, 'just a test', NULL, NULL, 1417960972, 1417964394);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', '/*'),
('test permission', '/country/create'),
('testing', '/country/create'),
('test permission', '/country/delete'),
('testing', '/country/delete'),
('test permission', '/country/update'),
('testing', '/country/update'),
('testing', '/user/admin/block'),
('testing', '/user/admin/confirm'),
('testing', '/user/admin/create'),
('testing', '/user/admin/delete'),
('testing', '/user/admin/index'),
('testing', '/user/admin/update'),
('supper test', 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `local_message`
--

CREATE TABLE IF NOT EXISTS `local_message` (
  `id` int(11) NOT NULL DEFAULT '0',
  `language` varchar(16) NOT NULL DEFAULT '',
  `translation` text CHARACTER SET utf8 COLLATE utf8_bin,
  PRIMARY KEY (`id`,`language`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `local_message`
--

INSERT INTO `local_message` (`id`, `language`, `translation`) VALUES
(1, 'si', 'නිර්මාණය'),
(1, 'ta', 'உருவாக்க'),
(3, 'si', 'සම්පූර්ණ නම'),
(3, 'ta', 'முழு பெயர்'),
(4, 'si', '{attribute} හිස් විය නොහැක'),
(5, 'si', '{modelClass} හදන්න'),
(6, 'si', 'පුද්ගලයා');

-- --------------------------------------------------------

--
-- Table structure for table `local_source_message`
--

CREATE TABLE IF NOT EXISTS `local_source_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(32) DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `local_source_message`
--

INSERT INTO `local_source_message` (`id`, `category`, `message`) VALUES
(1, 'app', 'Create'),
(2, 'app', 'Update'),
(3, 'app', 'Full Name'),
(4, 'yii', '{attribute} cannot be blank.'),
(5, 'app', 'Create {modelClass}'),
(6, 'yii', 'Person');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(256) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` text,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `public_email` varchar(255) DEFAULT NULL,
  `gravatar_email` varchar(255) DEFAULT NULL,
  `gravatar_id` varchar(32) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `bio` text,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`) VALUES
(1, NULL, NULL, 'harlan.gray@gmail.com', '11631e01d7226a7a81c187cbf4012e85', NULL, NULL, NULL),
(2, NULL, NULL, 'harlan.gray+hans@gmail.com', '05e5265bdc5ad4896e990e744ddfd3bc', NULL, NULL, NULL),
(3, NULL, NULL, 'harlan.gray+mary@gmail.com', '0c12d0f314779c50e802182b4d5d935c', NULL, NULL, NULL),
(4, NULL, NULL, 'harlan.gray+paloma@gmail.com', 'f4d533002c7124e3f771a297f9e8db0e', NULL, NULL, NULL),
(5, NULL, NULL, 'harlan.gray+nilantha@gmail.com', 'dc9171162f8deac27cd88acc717fa59f', NULL, NULL, NULL),
(6, NULL, NULL, 'harlan.gray+thusitha@gmail.com', '2e299bf3dcdbd0ddc1ff59c8c96373b4', NULL, NULL, NULL),
(7, NULL, NULL, 'harlan.gray+admin@gmail.com', '12e74d2ed5fc2b11a758d0911cc75c9e', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `school_cls`
--

CREATE TABLE IF NOT EXISTS `school_cls` (
  `cl_id` int(11) NOT NULL AUTO_INCREMENT,
  `cl_name` varchar(20) NOT NULL,
  `cl_grade` int(11) NOT NULL,
  `cl_start_date` date NOT NULL,
  PRIMARY KEY (`cl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `school_cls`
--

INSERT INTO `school_cls` (`cl_id`, `cl_name`, `cl_grade`, `cl_start_date`) VALUES
(2, 'Year 8-A', 7, '2015-01-29');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `st_id` int(11) NOT NULL AUTO_INCREMENT,
  `st_class_id` int(11) NOT NULL COMMENT '<md>',
  `st_name` varchar(20) NOT NULL,
  `st_date_of_birth` date NOT NULL,
  PRIMARY KEY (`st_id`),
  KEY `st_class_id` (`st_class_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`st_id`, `st_class_id`, `st_name`, `st_date_of_birth`) VALUES
(1, 2, 'Hans', '2015-01-30'),
(2, 2, 'Harlan', '2015-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(60) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `registration_ip` bigint(20) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_unique_username` (`username`),
  UNIQUE KEY `user_unique_email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `role`, `registration_ip`, `created_at`, `updated_at`, `flags`) VALUES
(1, 'harlan', 'harlan.gray@gmail.com', '$2y$12$qkaU1/W61rCQQxOyg3stTeUdmPTyMyODOn9rQfCs4.SEbGd7BRhqy', 'GfvECiBHYGfJhTHo_9qbHSwfg4oWbKDw', 1417824126, NULL, NULL, NULL, 2130706433, 1417824127, 1417950213, 0),
(2, 'hans', 'harlan.gray+hans@gmail.com', '$2y$12$/ZfY1icDyYBxViCfIa3aMuw7I7m4pY19E1IIpbI8jctmlvrNybWRC', '2PKhVIz12mAxswFtuIZq0S80kDMP9S2z', 1417824714, NULL, NULL, NULL, 2130706433, 1417824715, 1417824715, 0),
(3, 'mary', 'harlan.gray+mary@gmail.com', '$2y$12$kXyIT7Sj605ydS4jgpR1ruP6KuwCuw5rluMddfkqe/oitKXz5PvWq', 'mdkLPi4QeMPVnj9wlxzD5bdtZDo2caLD', 1417825753, NULL, NULL, NULL, 2130706433, 1417825753, 1417825753, 0),
(4, 'paloma', 'harlan.gray+paloma@gmail.com', '$2y$12$rGWhFAPEB1AKcdXRjt5OoOIHlRlziowD8S80wLAEubmHF0HRP9dcK', 'oQVdc87-py40PzdnxBOJogtabaXd1MWV', 1417826227, NULL, NULL, NULL, 2130706433, 1417826228, 1417881901, 0),
(5, 'nilantha', 'harlan.gray+nilantha@gmail.com', '$2y$12$CVZ1jvEc0B3g4wneDQQ48O7Sip4ONXxKTqZwwC8ASAVUZNufJDyqG', 'YtjdIYpGnfFbEEfyWy6DD7WjVy4Jj5Ib', NULL, NULL, NULL, NULL, 2130706433, 1417949874, 1417949874, 0),
(6, 'thusitha', 'harlan.gray+thusitha@gmail.com', '$2y$12$QuAby/wie91BBOjeaeENsOmTEyXzsgc9CRWRLzmFN9E8cCMOWRF1K', 'QAme2InMwznnlDp9nUdjc2Ovv4WhHTSt', NULL, NULL, NULL, NULL, 2130706433, 1417949937, 1417949937, 0),
(7, 'admin', 'harlan.gray+admin@gmail.com', '$2y$12$rBoxVbSlW3kN62JDPCNzsOGXHkZFHce0UiLmtXHadkFetdWowX74u', 'TStzDWfceWllGcqSPhzvMb3snmXVkQDq', 1417964596, NULL, NULL, NULL, 2130706433, 1417964598, 1417964598, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `local_message`
--
ALTER TABLE `local_message`
  ADD CONSTRAINT `fk_message_source_message` FOREIGN KEY (`id`) REFERENCES `local_source_message` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`st_class_id`) REFERENCES `school_cls` (`cl_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
