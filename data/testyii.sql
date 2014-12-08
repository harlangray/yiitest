-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 08, 2014 at 05:27 පෙ.ව.
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `testyii`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
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
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/continent/create', 2, NULL, NULL, NULL, 1417960805, 1417960805),
('/continent/delete', 2, NULL, NULL, NULL, 1417960805, 1417960805),
('/continent/update', 2, NULL, NULL, NULL, 1417960805, 1417960805),
('/country/create', 2, NULL, NULL, NULL, 1417960836, 1417960836),
('/country/delete', 2, NULL, NULL, NULL, 1417960837, 1417960837),
('/country/update', 2, NULL, NULL, NULL, 1417960836, 1417960836),
('/user/admin/block', 2, NULL, NULL, NULL, 1417964440, 1417964440),
('/user/admin/confirm', 2, NULL, NULL, NULL, 1417964434, 1417964434),
('/user/admin/create', 2, NULL, NULL, NULL, 1417964420, 1417964420),
('/user/admin/delete', 2, NULL, NULL, NULL, 1417964437, 1417964437),
('/user/admin/index', 2, NULL, NULL, NULL, 1417963893, 1417963893),
('/user/admin/update', 2, NULL, NULL, NULL, 1417964424, 1417964424),
('supper test', 1, NULL, NULL, NULL, 1417964307, 1417964363),
('test permission', 2, 'just a test', NULL, NULL, 1417961136, 1417961136),
('testing', 1, 'just a test', NULL, NULL, 1417960972, 1417964394);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
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
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `continent`
--

CREATE TABLE IF NOT EXISTS `continent` (
`co_id` int(11) NOT NULL,
  `co_name` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `continent`
--

INSERT INTO `continent` (`co_id`, `co_name`) VALUES
(1, 'Asia'),
(2, 'Australia'),
(3, 'North America');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
`cn_id` int(11) NOT NULL,
  `cn_continent_id` int(11) NOT NULL,
  `cn_name` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`cn_id`, `cn_continent_id`, `cn_name`) VALUES
(1, 1, 'Sri Lanka'),
(2, 2, 'Australia'),
(3, 1, 'India');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
`id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(256) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `parent`, `route`, `order`, `data`) VALUES
(1, 'test', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1417824041),
('m140209_132017_init', 1417824066),
('m140403_174025_create_account_table', 1417824069),
('m140504_113157_update_tables', 1417824076),
('m140504_130429_create_token_table', 1417824078),
('m140506_102106_rbac_init', 1417960154),
('m140602_111327_create_menu_table', 1417957722),
('m140830_171933_fix_ip_field', 1417824079),
('m140830_172703_change_account_table_name', 1417824080);

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
  `bio` text
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
-- Table structure for table `social_account`
--

CREATE TABLE IF NOT EXISTS `social_account` (
`id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE IF NOT EXISTS `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`user_id`, `code`, `created_at`, `type`) VALUES
(5, 'cjzOtmOO0-LbDG1e_qLgmKQw0IQO38Tq', 1417949874, 0),
(6, '55zAWT_9n0U6xWnuCIM09aw0j-42iHyC', 1417949937, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
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
  `flags` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

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
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
 ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
 ADD PRIMARY KEY (`name`), ADD KEY `rule_name` (`rule_name`), ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
 ADD PRIMARY KEY (`parent`,`child`), ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
 ADD PRIMARY KEY (`name`);

--
-- Indexes for table `continent`
--
ALTER TABLE `continent`
 ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
 ADD PRIMARY KEY (`cn_id`), ADD KEY `cn_continent_id` (`cn_continent_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id`), ADD KEY `parent` (`parent`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
 ADD PRIMARY KEY (`version`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `social_account`
--
ALTER TABLE `social_account`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `account_unique` (`provider`,`client_id`), ADD KEY `fk_user_account` (`user_id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
 ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user_unique_username` (`username`), ADD UNIQUE KEY `user_unique_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `continent`
--
ALTER TABLE `continent`
MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
MODIFY `cn_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `social_account`
--
ALTER TABLE `social_account`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
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
-- Constraints for table `country`
--
ALTER TABLE `country`
ADD CONSTRAINT `country_ibfk_1` FOREIGN KEY (`cn_continent_id`) REFERENCES `continent` (`co_id`);

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
-- Constraints for table `social_account`
--
ALTER TABLE `social_account`
ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `token`
--
ALTER TABLE `token`
ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
