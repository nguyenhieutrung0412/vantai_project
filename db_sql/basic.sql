-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 15, 2022 at 04:12 AM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `basic`
--

-- --------------------------------------------------------

--
-- Table structure for table `php_category`
--

CREATE TABLE `php_category` (
  `id` int(11) NOT NULL COMMENT 'system',
  `type` tinyint(3) DEFAULT '0' COMMENT 'system',
  `parentid` int(5) DEFAULT '0' COMMENT 'system',
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `active` tinyint(1) DEFAULT '1' COMMENT 'system',
  `order_id` int(5) DEFAULT '0' COMMENT 'system',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'system',
  `date` date DEFAULT NULL COMMENT 'system',
  `top` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Category for dynadmic content';

-- --------------------------------------------------------

--
-- Table structure for table `php_category_ln`
--

CREATE TABLE `php_category_ln` (
  `id` int(11) NOT NULL COMMENT 'system',
  `ln` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'system',
  `level_id` int(11) DEFAULT '0',
  `ln_icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `ln_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `sef_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `name_seo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `intro` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `mtitle` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `mkey` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `mdesc` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `h1_seo` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `view` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `vote_number` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `rating_value` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '5'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `php_comment`
--

CREATE TABLE `php_comment` (
  `id` int(5) NOT NULL,
  `module` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pageid` int(5) DEFAULT '0',
  `memid` int(5) DEFAULT '0',
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `reply_id` int(5) DEFAULT '0',
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `like` int(11) DEFAULT '0',
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) DEFAULT '1',
  `status` tinyint(1) DEFAULT '0',
  `ip` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0.0.0.0',
  `ip_like` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0.0.0.0',
  `link` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `device` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Front end comment';

-- --------------------------------------------------------

--
-- Table structure for table `php_configure`
--

CREATE TABLE `php_configure` (
  `code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `note` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `group_id` int(5) DEFAULT '1',
  `order_id` int(3) DEFAULT '0',
  `use_function` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `set_function` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_system` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `php_configure`
--

INSERT INTO `php_configure` (`code`, `name`, `value`, `note`, `group_id`, `order_id`, `use_function`, `set_function`, `is_system`) VALUES
('language_tab', 'Input languages', 'tab', NULL, 4, 0, NULL, 'radiobox(array(\'list\',\'tab\'),', 1),
('ga_email', 'GA Email', 'w2ajax@gmail.com', 'Email to login GA ', 3, 0, NULL, NULL, 1),
('ga_pasw', 'GA Password', '', 'GA password', 3, 0, NULL, NULL, 1),
('skin_login', 'Login skin', 'default', NULL, 4, 0, NULL, 'skin_login(', 1),
('smtp_server', 'SMTP Server', 'mail.phpbasic.com', NULL, 2, 0, NULL, NULL, 1),
('smtp_usr', 'SMTP User', 'smtp@phpbasic.com', NULL, 2, 0, NULL, NULL, 1),
('smtp_psw', 'SMTP Password', 'basic753159', NULL, 2, 0, NULL, NULL, 1),
('smtp_auth', 'SMTP Auth', 'yes', NULL, 2, 0, NULL, 'radiobox(array(\'yes\',\'no\'),', 0),
('smtp_from_email', 'SMTP From', 'no-reply@domain.com', NULL, 2, 0, NULL, NULL, 1),
('smtp_from_name', 'SMTP From Name', 'Webmaster', NULL, 2, 0, NULL, NULL, 1),
('smtp_port', 'SMTP Port', '25', NULL, 2, 0, NULL, NULL, 1),
('template', 'Templates', 'Default', NULL, 6, 0, NULL, 'templates(', 1),
('cookie_domain', 'Cookie Domain', 'localhost', NULL, 5, 0, NULL, NULL, 1),
('cookie_path', 'Cookie Path', '/', NULL, 5, 0, NULL, NULL, 1),
('save_log', 'User log', 'no', 'Save log user\'s actions', 4, 0, NULL, 'radiobox(array(\'yes\',\'no\'),', 1),
('cache_query', 'Cache Query', 'no', NULL, 4, 0, NULL, 'radiobox(array(\'no\',\'yes\'),', 0),
('smtp_enable', 'SMTP Enable', 'yes', NULL, 2, 0, NULL, 'radiobox(array(\'yes\',\'no\'),', 1),
('cache_tpl', 'Cache template', 'no', NULL, 4, 0, NULL, 'radiobox(array(\'no\',\'yes\'),', 0),
('hotline', 'Hotline', '0988167702', '', 1, 0, NULL, NULL, 0),
('tour_limit', 'Display items per page', '16', '', 1, 0, NULL, NULL, 0),
('online', 'Online', '0', '', 1, 0, NULL, NULL, 0),
('truycap', 'Truy', '19170', '', 1, 0, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `php_configure_group`
--

CREATE TABLE `php_configure_group` (
  `id` int(5) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `order_id` int(5) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `php_configure_group`
--

INSERT INTO `php_configure_group` (`id`, `name`, `active`, `order_id`) VALUES
(1, 'General', 1, 0),
(2, 'SMTP server', 1, 0),
(3, 'Google Analytics', 0, 0),
(4, 'CMS system', 1, 0),
(5, 'Cookies', 1, 0),
(6, 'Design', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `php_configure_mod`
--

CREATE TABLE `php_configure_mod` (
  `module` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'product,html,gallery',
  `typeid` int(3) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `data` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `php_content`
--

CREATE TABLE `php_content` (
  `id` int(5) NOT NULL COMMENT 'system',
  `type` int(3) DEFAULT '0' COMMENT 'system',
  `catid` int(5) DEFAULT '0' COMMENT 'system',
  `userid` int(5) DEFAULT '-1' COMMENT 'system',
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `file_extra` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'system',
  `fields_extra` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'system',
  `active` tinyint(1) DEFAULT '1' COMMENT 'system',
  `order_id` int(5) DEFAULT '0' COMMENT 'system',
  `web_keyword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `web_desc` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'system',
  `date` date DEFAULT NULL COMMENT 'system',
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'system',
  `visited` int(6) DEFAULT '0' COMMENT 'system',
  `featuredon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `home` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Dynamic content';

-- --------------------------------------------------------

--
-- Table structure for table `php_contentsub`
--

CREATE TABLE `php_contentsub` (
  `id` int(5) NOT NULL,
  `conntentid` int(5) DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `order_id` int(5) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `php_contentsub_ln`
--

CREATE TABLE `php_contentsub_ln` (
  `id` int(5) NOT NULL,
  `ln` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intro` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `content` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `php_content_ln`
--

CREATE TABLE `php_content_ln` (
  `id` int(5) NOT NULL COMMENT 'system',
  `ln` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'system',
  `level_id` int(11) DEFAULT '0',
  `ln_fields_extra` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'system',
  `ln_icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `ln_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `sef_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_seo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `intro` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `content` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `mtitle` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `mkey` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `mdesc` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `h1_seo` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `view` int(11) DEFAULT '0',
  `rating_value` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '5.0',
  `vote_number` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `php_content_options`
--

CREATE TABLE `php_content_options` (
  `content_id` int(5) NOT NULL,
  `options_type` int(3) NOT NULL DEFAULT '0',
  `options_id` int(5) NOT NULL,
  `extra` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `php_gallery`
--

CREATE TABLE `php_gallery` (
  `id` int(5) NOT NULL,
  `page` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pageid` int(5) DEFAULT '0',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_id` int(5) DEFAULT '0',
  `date` date DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `php_html`
--

CREATE TABLE `php_html` (
  `id` int(4) NOT NULL COMMENT 'system',
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `file_extra` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'system',
  `fields_extra` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'system',
  `web_keyword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `web_desc` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'system',
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'system',
  `date` date DEFAULT NULL COMMENT 'system',
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Static content';

-- --------------------------------------------------------

--
-- Table structure for table `php_html_ln`
--

CREATE TABLE `php_html_ln` (
  `id` int(4) NOT NULL COMMENT 'system',
  `ln` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'system',
  `ln_fields_extra` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'system',
  `ln_icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `ln_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `sef_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domain` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotline` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intro` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `title2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `title3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about3` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `title4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about4` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `title5` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about5` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `mtitle` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `mkey` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mdesc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `h1seo` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gsv` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `msv` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `alv` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `pinterest` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `analytics` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `view` int(11) DEFAULT '0',
  `vote_number` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `rating_value` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '5.0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `php_language`
--

CREATE TABLE `php_language` (
  `ln` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ln_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ln_alias` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT '0',
  `active` tinyint(1) DEFAULT '1',
  `order_id` int(3) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `php_language`
--

INSERT INTO `php_language` (`ln`, `ln_name`, `ln_alias`, `icon`, `is_default`, `active`, `order_id`) VALUES
('vn', 'Vietnamese', '', NULL, 1, 1, 0),
('en', 'English', NULL, NULL, 0, 1, 0),
('jp', 'Japanese', '', NULL, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `php_member`
--

CREATE TABLE `php_member` (
  `id` int(50) NOT NULL,
  `hoten` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `matkhau` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `matkhau2` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int(1) DEFAULT '0',
  `active_newpass` int(1) DEFAULT '1',
  `ip` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expired` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_active` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngaysinh` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gioitinh` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinhthanh` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cmnd` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gioithieu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `facebook` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `score` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `active_gift` int(1) DEFAULT '0',
  `active_quatang` int(1) DEFAULT '0',
  `id_album` int(15) DEFAULT '0',
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `php_module`
--

CREATE TABLE `php_module` (
  `id` tinyint(2) NOT NULL,
  `module` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `php_module_ln`
--

CREATE TABLE `php_module_ln` (
  `id` tinyint(2) NOT NULL,
  `ln` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `module_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_title` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `web_keyword` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `web_desc` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_extra` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `php_options`
--

CREATE TABLE `php_options` (
  `id` int(5) NOT NULL COMMENT 'system',
  `type` int(5) DEFAULT '0' COMMENT 'system',
  `active` tinyint(1) DEFAULT '1' COMMENT 'system',
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `order_id` int(5) DEFAULT '0' COMMENT 'system',
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'system',
  `date` date DEFAULT NULL COMMENT 'system'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `php_options_ln`
--

CREATE TABLE `php_options_ln` (
  `id` int(5) NOT NULL COMMENT 'system',
  `ln` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT 'system',
  `ln_icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `ln_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intro` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `content` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `php_session`
--

CREATE TABLE `php_session` (
  `session_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `php_user`
--

CREATE TABLE `php_user` (
  `id` int(5) NOT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `data` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `active` tinyint(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Back end user';

--
-- Dumping data for table `php_user`
--

INSERT INTO `php_user` (`id`, `is_admin`, `fullname`, `username`, `password`, `permission`, `data`, `active`) VALUES
(1, 1, 'Administrator', 'admin', '1bbd886460827015e5d605ed44252251', 'ALL', 'a:3:{s:4:\"skin\";s:7:\"default\";s:4:\"icon\";s:7:\"default\";s:4:\"menu\";a:7:{i:2;i:1;i:1;i:1;i:0;i:1;i:3;i:1;i:4;i:1;i:5;i:1;i:6;i:1;}}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `php_user_log`
--

CREATE TABLE `php_user_log` (
  `id` int(10) NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'cms',
  `userid` int(5) DEFAULT NULL,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `php_category`
--
ALTER TABLE `php_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `php_category_ln`
--
ALTER TABLE `php_category_ln`
  ADD PRIMARY KEY (`id`,`ln`);

--
-- Indexes for table `php_comment`
--
ALTER TABLE `php_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `php_configure`
--
ALTER TABLE `php_configure`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `php_configure_group`
--
ALTER TABLE `php_configure_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `php_configure_mod`
--
ALTER TABLE `php_configure_mod`
  ADD PRIMARY KEY (`module`,`typeid`);

--
-- Indexes for table `php_content`
--
ALTER TABLE `php_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `php_contentsub`
--
ALTER TABLE `php_contentsub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `php_contentsub_ln`
--
ALTER TABLE `php_contentsub_ln`
  ADD PRIMARY KEY (`id`,`ln`);

--
-- Indexes for table `php_content_ln`
--
ALTER TABLE `php_content_ln`
  ADD PRIMARY KEY (`id`,`ln`);

--
-- Indexes for table `php_content_options`
--
ALTER TABLE `php_content_options`
  ADD PRIMARY KEY (`content_id`,`options_type`,`options_id`);

--
-- Indexes for table `php_gallery`
--
ALTER TABLE `php_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `php_html`
--
ALTER TABLE `php_html`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `php_html_ln`
--
ALTER TABLE `php_html_ln`
  ADD PRIMARY KEY (`id`,`ln`);

--
-- Indexes for table `php_language`
--
ALTER TABLE `php_language`
  ADD PRIMARY KEY (`ln`);

--
-- Indexes for table `php_member`
--
ALTER TABLE `php_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `php_module`
--
ALTER TABLE `php_module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `php_module_ln`
--
ALTER TABLE `php_module_ln`
  ADD PRIMARY KEY (`id`,`ln`);

--
-- Indexes for table `php_options`
--
ALTER TABLE `php_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `php_options_ln`
--
ALTER TABLE `php_options_ln`
  ADD PRIMARY KEY (`id`,`ln`);

--
-- Indexes for table `php_session`
--
ALTER TABLE `php_session`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `php_user`
--
ALTER TABLE `php_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `php_user_log`
--
ALTER TABLE `php_user_log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `php_category`
--
ALTER TABLE `php_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'system';

--
-- AUTO_INCREMENT for table `php_comment`
--
ALTER TABLE `php_comment`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `php_configure_group`
--
ALTER TABLE `php_configure_group`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `php_content`
--
ALTER TABLE `php_content`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'system';

--
-- AUTO_INCREMENT for table `php_contentsub`
--
ALTER TABLE `php_contentsub`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `php_gallery`
--
ALTER TABLE `php_gallery`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `php_html`
--
ALTER TABLE `php_html`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'system';

--
-- AUTO_INCREMENT for table `php_member`
--
ALTER TABLE `php_member`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `php_module`
--
ALTER TABLE `php_module`
  MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `php_options`
--
ALTER TABLE `php_options`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'system';

--
-- AUTO_INCREMENT for table `php_user`
--
ALTER TABLE `php_user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `php_user_log`
--
ALTER TABLE `php_user_log`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
