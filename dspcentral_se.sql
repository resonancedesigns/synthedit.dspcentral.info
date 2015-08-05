-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2015 at 08:31 PM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dspcentral_se`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `u_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pvt` varchar(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `license` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=102 ;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `u_id`, `username`, `name`, `file`, `title`, `author`, `description`, `category`, `created_at`, `updated_at`, `pvt`, `license`) VALUES
(101, '27', 'dspCentral', 'dspCentral', 'humans.txt', 'Test', 'Test', 'Test', 'modules', '2015-08-05 00:43:32', NULL, 'no', 'modules');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `permissions` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`) VALUES
(1, 'Standard User', ''),
(2, 'Administrator', '{"admin": 1,\r\n"moderator": 1}');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8 NOT NULL,
  `password` varchar(64) CHARACTER SET utf8 NOT NULL,
  `email` varchar(128) CHARACTER SET utf8 NOT NULL,
  `active` tinyint(1) NOT NULL,
  `code` varchar(20) CHARACTER SET utf8 NOT NULL,
  `joined` datetime NOT NULL,
  `salt` varchar(32) CHARACTER SET utf8 NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `group` int(11) NOT NULL,
  `profile_pic` varchar(512) CHARACTER SET utf8 NOT NULL DEFAULT 'default.png',
  `banner_pic` varchar(512) CHARACTER SET utf8 NOT NULL,
  `bio` text CHARACTER SET utf8 NOT NULL,
  `country` varchar(256) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `active`, `code`, `joined`, `salt`, `name`, `group`, `profile_pic`, `banner_pic`, `bio`, `country`) VALUES
(9, 'Admin', '05ec87ddb1d5bcb13f3fe4b640fc17b5d951cff1f064f195d754e05b195f8ab4', 'resonancedesign.org@gmail.com', 0, '', '2014-08-29 17:26:13', 'hµ’4µÜ(HkGù‰ÈåÂv{þ×5¾q–9¼', 'Richard Bakos', 1, 'default.png', '', '', 'United States of America'),
(27, 'dspCentral', 'b56ee260ab468004f570dee11496bba72c5bb650f9074f2d1fcaa3629532e41d', 'dspcentral.info@gmail.com', 0, '', '2015-06-23 11:47:36', '<@Œ“RL\\µTÞ`Ì›4VX‰á4ó¦,œL', 'dspCentral', 1, '22-07-15-1437588439.jpg', '22-07-15-1437588470.jpg', 'dspCentral is all about audio', 'United States of America'),
(33, 'Rezinunts', 'a482abc8df1aa84d467afbe2e9d704719fcb344ba5b314c699d4a2e2b1126ad0', 'riki.rez@gmail.com', 0, '', '2015-08-02 20:14:24', 'JÜ¼l¢.''’âÀXán¦<ÙD_+#ëb•âL4', 'Riki Rezinunts', 1, 'default.png', '', '', 'United States of America');

-- --------------------------------------------------------

--
-- Table structure for table `users_session`
--

CREATE TABLE IF NOT EXISTS `users_session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `hash` varchar(64) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users_session`
--

INSERT INTO `users_session` (`id`, `user_id`, `hash`) VALUES
(2, 8, '28d24da7233e0f0da60300dcd24d78199d9703601c70743b4e13f68d045e4816');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
