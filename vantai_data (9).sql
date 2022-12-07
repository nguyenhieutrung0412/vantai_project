-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 16, 2022 lúc 03:58 AM
-- Phiên bản máy phục vụ: 5.7.36
-- Phiên bản PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `vantai_data`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_banggiacuoc_tuyen`
--

DROP TABLE IF EXISTS `php_banggiacuoc_tuyen`;
CREATE TABLE IF NOT EXISTS `php_banggiacuoc_tuyen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ma_tuyen` text COLLATE utf8mb4_unicode_ci,
  `ten_tuyen` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `km` text COLLATE utf8mb4_unicode_ci,
  `so_tien` float DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `php_banggiacuoc_tuyen`
--

INSERT INTO `php_banggiacuoc_tuyen` (`id`, `ma_tuyen`, `ten_tuyen`, `km`, `so_tien`, `active`) VALUES
(1, 'SG-HN', 'Sài gòn - Hà Nội', '1205', 5000000, 1),
(2, 'SG-DN', 'Sài gòn - Đà Nẵng', '805', 35000000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_category`
--

DROP TABLE IF EXISTS `php_category`;
CREATE TABLE IF NOT EXISTS `php_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'system',
  `type` tinyint(3) DEFAULT '0' COMMENT 'system',
  `parentid` int(5) DEFAULT '0' COMMENT 'system',
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `active` tinyint(1) DEFAULT '1' COMMENT 'system',
  `order_id` int(5) DEFAULT '0' COMMENT 'system',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'system',
  `date` date DEFAULT NULL COMMENT 'system',
  `top` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Category for dynadmic content';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_category_ln`
--

DROP TABLE IF EXISTS `php_category_ln`;
CREATE TABLE IF NOT EXISTS `php_category_ln` (
  `id` int(11) NOT NULL COMMENT 'system',
  `ln` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'system',
  `level_id` int(11) DEFAULT '0',
  `ln_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `ln_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `sef_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `name` text COLLATE utf8mb4_unicode_ci,
  `name_seo` text COLLATE utf8mb4_unicode_ci,
  `intro` text COLLATE utf8mb4_unicode_ci,
  `mtitle` mediumtext COLLATE utf8mb4_unicode_ci,
  `mkey` mediumtext COLLATE utf8mb4_unicode_ci,
  `mdesc` mediumtext COLLATE utf8mb4_unicode_ci,
  `h1_seo` mediumtext COLLATE utf8mb4_unicode_ci,
  `view` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `vote_number` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `rating_value` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT '5',
  PRIMARY KEY (`id`,`ln`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_cauhinh`
--

DROP TABLE IF EXISTS `php_cauhinh`;
CREATE TABLE IF NOT EXISTS `php_cauhinh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domain` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MaSothue` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chatluong_hinhupload` int(11) DEFAULT NULL,
  `nam_hoatdong` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `php_cauhinh`
--

INSERT INTO `php_cauhinh` (`id`, `domain`, `phone`, `company`, `MaSothue`, `email`, `address`, `chatluong_hinhupload`, `nam_hoatdong`) VALUES
(1, 'http://vantai.local/', '032323232', 'Công ty giải pháp số LogisViet', '656565', 'logisviet@gmail.com', '81/23 Hoàng Hoa Thám', 80, '2021');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_comment`
--

DROP TABLE IF EXISTS `php_comment`;
CREATE TABLE IF NOT EXISTS `php_comment` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `module` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pageid` int(5) DEFAULT '0',
  `memid` int(5) DEFAULT '0',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `reply_id` int(5) DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci,
  `like` int(11) DEFAULT '0',
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) DEFAULT '1',
  `status` tinyint(1) DEFAULT '0',
  `ip` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT '0.0.0.0',
  `ip_like` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT '0.0.0.0',
  `link` mediumtext COLLATE utf8mb4_unicode_ci,
  `device` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Front end comment';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_configure`
--

DROP TABLE IF EXISTS `php_configure`;
CREATE TABLE IF NOT EXISTS `php_configure` (
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci,
  `note` mediumtext COLLATE utf8mb4_unicode_ci,
  `group_id` int(5) DEFAULT '1',
  `order_id` int(3) DEFAULT '0',
  `use_function` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `set_function` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_system` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `php_configure`
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
-- Cấu trúc bảng cho bảng `php_configure_group`
--

DROP TABLE IF EXISTS `php_configure_group`;
CREATE TABLE IF NOT EXISTS `php_configure_group` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `order_id` int(5) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `php_configure_group`
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
-- Cấu trúc bảng cho bảng `php_configure_mod`
--

DROP TABLE IF EXISTS `php_configure_mod`;
CREATE TABLE IF NOT EXISTS `php_configure_mod` (
  `module` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'product,html,gallery',
  `typeid` int(3) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci,
  `data` mediumtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`module`,`typeid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_content`
--

DROP TABLE IF EXISTS `php_content`;
CREATE TABLE IF NOT EXISTS `php_content` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'system',
  `type` int(3) DEFAULT '0' COMMENT 'system',
  `catid` int(5) DEFAULT '0' COMMENT 'system',
  `userid` int(5) DEFAULT '-1' COMMENT 'system',
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `file_extra` mediumtext COLLATE utf8mb4_unicode_ci COMMENT 'system',
  `fields_extra` mediumtext COLLATE utf8mb4_unicode_ci COMMENT 'system',
  `active` tinyint(1) DEFAULT '1' COMMENT 'system',
  `order_id` int(5) DEFAULT '0' COMMENT 'system',
  `web_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `web_desc` mediumtext COLLATE utf8mb4_unicode_ci COMMENT 'system',
  `date` date DEFAULT NULL COMMENT 'system',
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'system',
  `visited` int(6) DEFAULT '0' COMMENT 'system',
  `featuredon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `home` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Dynamic content';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_contentsub`
--

DROP TABLE IF EXISTS `php_contentsub`;
CREATE TABLE IF NOT EXISTS `php_contentsub` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `conntentid` int(5) DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `order_id` int(5) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_contentsub_ln`
--

DROP TABLE IF EXISTS `php_contentsub_ln`;
CREATE TABLE IF NOT EXISTS `php_contentsub_ln` (
  `id` int(5) NOT NULL,
  `ln` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intro` mediumtext COLLATE utf8mb4_unicode_ci,
  `content` mediumtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`,`ln`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_content_ln`
--

DROP TABLE IF EXISTS `php_content_ln`;
CREATE TABLE IF NOT EXISTS `php_content_ln` (
  `id` int(5) NOT NULL COMMENT 'system',
  `ln` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'system',
  `level_id` int(11) DEFAULT '0',
  `ln_fields_extra` mediumtext COLLATE utf8mb4_unicode_ci COMMENT 'system',
  `ln_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `ln_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `sef_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_seo` text COLLATE utf8mb4_unicode_ci,
  `intro` mediumtext COLLATE utf8mb4_unicode_ci,
  `content` mediumtext COLLATE utf8mb4_unicode_ci,
  `mtitle` mediumtext COLLATE utf8mb4_unicode_ci,
  `mkey` mediumtext COLLATE utf8mb4_unicode_ci,
  `mdesc` mediumtext COLLATE utf8mb4_unicode_ci,
  `h1_seo` mediumtext COLLATE utf8mb4_unicode_ci,
  `view` int(11) DEFAULT '0',
  `rating_value` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT '5.0',
  `vote_number` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  PRIMARY KEY (`id`,`ln`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_content_options`
--

DROP TABLE IF EXISTS `php_content_options`;
CREATE TABLE IF NOT EXISTS `php_content_options` (
  `content_id` int(5) NOT NULL,
  `options_type` int(3) NOT NULL DEFAULT '0',
  `options_id` int(5) NOT NULL,
  `extra` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`content_id`,`options_type`,`options_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_doixe`
--

DROP TABLE IF EXISTS `php_doixe`;
CREATE TABLE IF NOT EXISTS `php_doixe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loaixe` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biensoxe` text COLLATE utf8mb4_unicode_ci,
  `taixe` text COLLATE utf8mb4_unicode_ci,
  `id_taixe` int(11) DEFAULT NULL,
  `tinhtrangxe` int(11) DEFAULT '0',
  `active` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `php_doixe`
--

INSERT INTO `php_doixe` (`id`, `loaixe`, `biensoxe`, `taixe`, `id_taixe`, `tinhtrangxe`, `active`) VALUES
(11, 'Tải 300 tấn', '59-f1đ', '2323232', 6, 1, 1),
(12, 'Tải 300 tấn', '55-f2sd', '', 0, 1, 1),
(18, 'Tải 5001 tấn', '77g1', '0327949585', 5, 1, 1),
(19, 'test', '11dd', '', 0, 0, 1),
(20, 'scsads', 'dsa121', '', 0, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_donhang`
--

DROP TABLE IF EXISTS `php_donhang`;
CREATE TABLE IF NOT EXISTS `php_donhang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_donhang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_kh` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_nhanhang` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_nhanhang` datetime DEFAULT NULL,
  `address_giaohang` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_giaohang` datetime DEFAULT NULL,
  `phivanchuyen` float DEFAULT NULL,
  `active` int(11) DEFAULT '0',
  `taixe` text COLLATE utf8mb4_unicode_ci,
  `taixe_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `php_donhang`
--

INSERT INTO `php_donhang` (`id`, `id_donhang`, `name_kh`, `address_nhanhang`, `time_nhanhang`, `address_giaohang`, `time_giaohang`, `phivanchuyen`, `active`, `taixe`, `taixe_id`) VALUES
(3, 'KH-100', 'admin KH-103', 'bình thạnh', '2022-09-08 07:12:00', 'hà nội', '2022-09-02 14:14:00', 24000, 1, '2323232', 6),
(4, 'KH-101', 'admin 105', 'bình thạnh', '2022-09-09 10:02:00', 'hà nội', '2022-09-03 10:02:00', 50000, 1, '327949585', 5),
(6, 'KH-102', 'admin 105', 'bình thạnh', '2022-09-09 10:02:00', 'hà nội', '2022-09-03 10:02:00', 9000000000, 1, '2323232', 6),
(7, 'KH-105', 'admin KH-105', 'bình thạnh', '2022-09-09 10:02:00', 'hà nội', '2022-09-03 10:02:00', 24000, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_donhangtrongoi`
--

DROP TABLE IF EXISTS `php_donhangtrongoi`;
CREATE TABLE IF NOT EXISTS `php_donhangtrongoi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_khachhang` int(11) DEFAULT NULL,
  `loaihang` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diachi_nhanhang` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thoigian_nhanhang` text COLLATE utf8mb4_unicode_ci,
  `phivanchuyen` float DEFAULT NULL,
  `ten_nguoinhan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cmnd_nguoinhan` text COLLATE utf8mb4_unicode_ci,
  `diachi_giaohang` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_nguoinhan` text COLLATE utf8mb4_unicode_ci,
  `ngay_hoanthanh` text COLLATE utf8mb4_unicode_ci,
  `thang_hoanthanh` text COLLATE utf8mb4_unicode_ci,
  `nam_hoanthanh` text COLLATE utf8mb4_unicode_ci,
  `id_taixe` int(11) DEFAULT '0',
  `id_doixe` int(11) DEFAULT '0',
  `id_nhansu` int(11) DEFAULT '0',
  `tinhtrangdon` int(11) DEFAULT '0',
  `hinhthucthanhtoan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `php_donhangtrongoi`
--

INSERT INTO `php_donhangtrongoi` (`id`, `id_khachhang`, `loaihang`, `diachi_nhanhang`, `thoigian_nhanhang`, `phivanchuyen`, `ten_nguoinhan`, `cmnd_nguoinhan`, `diachi_giaohang`, `phone_nguoinhan`, `ngay_hoanthanh`, `thang_hoanthanh`, `nam_hoanthanh`, `id_taixe`, `id_doixe`, `id_nhansu`, `tinhtrangdon`, `hinhthucthanhtoan`, `active`) VALUES
(1, 6, '1', 'SG', '08/11/2022', 2343430000, NULL, NULL, 'BĐ', '2344343434', '09', '11', '2022', 5, 12, 21, 4, NULL, 1),
(6, 8, 'nước ngọt', 'BĐ', '15/11/2022', 100000, 'Văn A', '6656565', 'SG', '1666565', NULL, NULL, NULL, 0, 0, 0, 0, 'thanhtoancongno', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_file`
--

DROP TABLE IF EXISTS `php_file`;
CREATE TABLE IF NOT EXISTS `php_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` text COLLATE utf8mb4_unicode_ci,
  `type_id` int(11) DEFAULT NULL,
  `file_name` text COLLATE utf8mb4_unicode_ci,
  `file_type` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `php_file`
--

INSERT INTO `php_file` (`id`, `type`, `type_id`, `file_name`, `file_type`) VALUES
(40, 'php_phieuchi', 22, '1664182533-22-07-nguyenhieutrung-tuan7.doc', 'doc'),
(42, 'php_phieuthu', 6, '1664272552-6-nguyen-hieu-trung-topcv.vn-180622.155959.pdf', 'pdf'),
(48, 'php_notification', 26, '1664782145-26-164197.gd-2021-052.pdf', 'pdf');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_gallery`
--

DROP TABLE IF EXISTS `php_gallery`;
CREATE TABLE IF NOT EXISTS `php_gallery` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `page` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pageid` int(5) DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_id` int(5) DEFAULT '0',
  `date` date DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_html`
--

DROP TABLE IF EXISTS `php_html`;
CREATE TABLE IF NOT EXISTS `php_html` (
  `id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'system',
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `file_extra` mediumtext COLLATE utf8mb4_unicode_ci COMMENT 'system',
  `fields_extra` mediumtext COLLATE utf8mb4_unicode_ci COMMENT 'system',
  `web_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `web_desc` mediumtext COLLATE utf8mb4_unicode_ci COMMENT 'system',
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'system',
  `date` date DEFAULT NULL COMMENT 'system',
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Static content';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_html_ln`
--

DROP TABLE IF EXISTS `php_html_ln`;
CREATE TABLE IF NOT EXISTS `php_html_ln` (
  `id` int(4) NOT NULL COMMENT 'system',
  `ln` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'system',
  `ln_fields_extra` mediumtext COLLATE utf8mb4_unicode_ci COMMENT 'system',
  `ln_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `ln_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `sef_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domain` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotline` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci,
  `content` text COLLATE utf8mb4_unicode_ci,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `title2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about2` text COLLATE utf8mb4_unicode_ci,
  `title3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about3` text COLLATE utf8mb4_unicode_ci,
  `title4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about4` text COLLATE utf8mb4_unicode_ci,
  `title5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about5` text COLLATE utf8mb4_unicode_ci,
  `mtitle` text COLLATE utf8mb4_unicode_ci,
  `mkey` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mdesc` text COLLATE utf8mb4_unicode_ci,
  `h1seo` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gsv` text COLLATE utf8mb4_unicode_ci,
  `msv` text COLLATE utf8mb4_unicode_ci,
  `alv` text COLLATE utf8mb4_unicode_ci,
  `pinterest` text COLLATE utf8mb4_unicode_ci,
  `analytics` text COLLATE utf8mb4_unicode_ci,
  `view` int(11) DEFAULT '0',
  `vote_number` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `rating_value` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '5.0',
  PRIMARY KEY (`id`,`ln`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_images`
--

DROP TABLE IF EXISTS `php_images`;
CREATE TABLE IF NOT EXISTS `php_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` text COLLATE utf8mb4_unicode_ci,
  `type_id` int(11) DEFAULT NULL,
  `file_name` text COLLATE utf8mb4_unicode_ci,
  `file_type` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `php_images`
--

INSERT INTO `php_images` (`id`, `type`, `type_id`, `file_name`, `file_type`, `upload_on`) VALUES
(71, 'php_phieuthu', 1, '1664167361_1_pexels-ekrulila-3837464-2-.jpg', 'jpg', '2022-09-26 04:42:41'),
(72, 'php_phieuthu', 1, '1664167361_1_pexels-ekrulila-3837464-1-.jpg', 'jpg', '2022-09-26 04:42:42'),
(84, 'php_phieuchi', 22, '1664184193_22_8b775c7d21a3e1fdb8b2.jpg', 'jpg', '2022-09-26 09:23:13'),
(85, 'php_phieuchi', 23, '1664271553_23_ec5555137735b96be024-1-.jpg', 'jpg', '2022-09-27 09:39:13'),
(86, 'php_phieuthu', 2, '1664271607_2_0439b899a0cd63933adc.jpg', 'jpg', '2022-09-27 09:40:07'),
(91, 'php_phieuchi', 23, '1664335360_23_ec5555137735b96be024-1-copy.jpg', 'jpg', '2022-09-28 03:22:41'),
(92, 'php_phieuchi', 23, '1664335361_23_ec5555137735b96be024-1-.jpg', 'jpg', '2022-09-28 03:22:41'),
(93, 'php_phieuchi', 23, '1664335361_23_0439b899a0cd63933adc.jpg', 'jpg', '2022-09-28 03:22:41'),
(94, 'php_phieuchi', 23, '1664335361_23_8b775c7d21a3e1fdb8b2-1-.jpg', 'jpg', '2022-09-28 03:22:41'),
(95, 'php_phieuchi', 23, '1664335361_23_8b775c7d21a3e1fdb8b2.jpg', 'jpg', '2022-09-28 03:22:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_khachhang`
--

DROP TABLE IF EXISTS `php_khachhang`;
CREATE TABLE IF NOT EXISTS `php_khachhang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_kh` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_kh` text COLLATE utf8mb4_unicode_ci,
  `address_kh` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_kh` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ten_congty` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `masothue` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cmnd` text COLLATE utf8mb4_unicode_ci,
  `pwd` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pwd2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `php_khachhang`
--

INSERT INTO `php_khachhang` (`id`, `name_kh`, `phone_kh`, `address_kh`, `email_kh`, `ten_congty`, `masothue`, `cmnd`, `pwd`, `pwd2`, `active`) VALUES
(6, 'admin', '1111111112', 'm2021080303062068@workingtall.com', 'ng@gmail.com', NULL, NULL, NULL, 'b59c67bf196a4758191e42f76670ceba', '1111', 1),
(7, 'admin', '0327949582', 'm2021080303062068@workingtall.com', 'admin@gmail.com', 'LogisViet', '16526231sdbfha', '165356656565', 'c5fe25896e49ddfe996db7508cf00534', '55555', 1),
(8, 'Nguyễn Hiếu Trung', '3333333333', 'BĐ', 'nguyenhiutrung@gmail.com', 'LogisViet', '16526231sdbfha', '165356656565', 'b0baee9d279d34fa1dfd71aadb908c3f', '11111', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_language`
--

DROP TABLE IF EXISTS `php_language`;
CREATE TABLE IF NOT EXISTS `php_language` (
  `ln` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ln_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ln_alias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT '0',
  `active` tinyint(1) DEFAULT '1',
  `order_id` int(3) DEFAULT '0',
  PRIMARY KEY (`ln`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `php_language`
--

INSERT INTO `php_language` (`ln`, `ln_name`, `ln_alias`, `icon`, `is_default`, `active`, `order_id`) VALUES
('vn', 'Vietnamese', '', NULL, 1, 1, 0),
('en', 'English', NULL, NULL, 0, 1, 0),
('jp', 'Japanese', '', NULL, 0, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_loaichi`
--

DROP TABLE IF EXISTS `php_loaichi`;
CREATE TABLE IF NOT EXISTS `php_loaichi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loai_chi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hanmucchi` int(11) DEFAULT NULL,
  `baocao` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `php_loaichi`
--

INSERT INTO `php_loaichi` (`id`, `loai_chi`, `hanmucchi`, `baocao`, `active`) VALUES
(1, 'Ứng lương cho nhân viên', 20000000, 1, 1),
(2, 'Chi công nợ', 0, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_loaihang`
--

DROP TABLE IF EXISTS `php_loaihang`;
CREATE TABLE IF NOT EXISTS `php_loaihang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loai_hang` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `php_loaihang`
--

INSERT INTO `php_loaihang` (`id`, `loai_hang`) VALUES
(1, 'Nước'),
(2, 'Vận liệu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_loaithu`
--

DROP TABLE IF EXISTS `php_loaithu`;
CREATE TABLE IF NOT EXISTS `php_loaithu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loaithu` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hanmucthu` int(11) DEFAULT NULL,
  `baocao` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `php_loaithu`
--

INSERT INTO `php_loaithu` (`id`, `loaithu`, `hanmucthu`, `baocao`, `active`) VALUES
(1, 'Thu công nợ', 5000000, 1, 1),
(3, 'Phí vận chuyển', 0, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_luongnhansu`
--

DROP TABLE IF EXISTS `php_luongnhansu`;
CREATE TABLE IF NOT EXISTS `php_luongnhansu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `ngay_cong` int(11) DEFAULT NULL,
  `tong_luong` float DEFAULT NULL,
  `luong_thoa_thuan` float DEFAULT NULL,
  `tien_bao_hiem` float DEFAULT NULL,
  `phu_cap` float DEFAULT NULL,
  `thuong_nong` float DEFAULT NULL,
  `lydo_thuongnong` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tang_ca` float DEFAULT NULL,
  `tong_so_ngay_nghi_khong_phep` float DEFAULT NULL,
  `tong_ungluong` float DEFAULT NULL,
  `thang` text COLLATE utf8mb4_unicode_ci,
  `nam` text COLLATE utf8mb4_unicode_ci,
  `nguoi_tao` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=363867 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `php_luongnhansu`
--

INSERT INTO `php_luongnhansu` (`id`, `user_id`, `ngay_cong`, `tong_luong`, `luong_thoa_thuan`, `tien_bao_hiem`, `phu_cap`, `thuong_nong`, `lydo_thuongnong`, `tang_ca`, `tong_so_ngay_nghi_khong_phep`, `tong_ungluong`, `thang`, `nam`, `nguoi_tao`, `active`) VALUES
(363858, 1, 26, 2794660, 10000000, 151500, 100000, NULL, NULL, NULL, 1153850, 6000000, '10', '2022', 'Nguyễn Hiếu Trung', 1),
(363859, 16, 26, 113735000, 123213000, 0, 0, NULL, NULL, NULL, 9477920, 0, '10', '2022', 'Nguyễn Hiếu Trung', 1),
(363860, 19, 26, 5333540, 5000000, 78000, 200000, 500000, 'sadsadsadsa', 500000, 288462, 500000, '10', '2022', 'Nguyễn Hiếu Trung', 1),
(363861, 1, 26, 9948500, 10000000, 151500, 100000, NULL, NULL, NULL, NULL, 0, '11', '2022', 'Nguyễn Hiếu Trung', 1),
(363862, 16, 26, 123213000, 123213000, 0, 0, NULL, NULL, NULL, NULL, 0, '11', '2022', 'Nguyễn Hiếu Trung', 1),
(363863, 19, 26, 5122000, 5000000, 78000, 200000, NULL, NULL, NULL, NULL, 0, '11', '2022', 'Nguyễn Hiếu Trung', 1),
(363864, 1, 27, 9948500, 10000000, 151500, 100000, NULL, NULL, NULL, NULL, 0, '12', '2022', 'Nguyễn Hiếu Trung', 1),
(363865, 16, 27, 123213000, 123213000, 0, 0, NULL, NULL, NULL, NULL, 0, '12', '2022', 'Nguyễn Hiếu Trung', 1),
(363866, 19, 27, 5122000, 5000000, 78000, 200000, NULL, NULL, NULL, NULL, 0, '12', '2022', 'Nguyễn Hiếu Trung', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_luongtaixe`
--

DROP TABLE IF EXISTS `php_luongtaixe`;
CREATE TABLE IF NOT EXISTS `php_luongtaixe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `ngay_cong` int(11) DEFAULT NULL,
  `tong_luong` float DEFAULT NULL,
  `luong_thoa_thuan` float DEFAULT NULL,
  `tien_hoahong` float DEFAULT NULL,
  `tien_bao_hiem` float DEFAULT NULL,
  `phu_cap` float DEFAULT NULL,
  `thuong_nong` float DEFAULT NULL,
  `lydo_thuongnong` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tong_so_ngay_nghi_khong_phep` float DEFAULT NULL,
  `tong_ungluong` float DEFAULT NULL,
  `sanluong_hoanthanh` float DEFAULT '0',
  `thang` text COLLATE utf8mb4_unicode_ci,
  `nam` text COLLATE utf8mb4_unicode_ci,
  `nguoi_tao` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `php_luongtaixe`
--

INSERT INTO `php_luongtaixe` (`id`, `user_id`, `ngay_cong`, `tong_luong`, `luong_thoa_thuan`, `tien_hoahong`, `tien_bao_hiem`, `phu_cap`, `thuong_nong`, `lydo_thuongnong`, `tong_so_ngay_nghi_khong_phep`, `tong_ungluong`, `sanluong_hoanthanh`, `thang`, `nam`, `nguoi_tao`, `active`) VALUES
(1, 3, 24, 0, 0, NULL, 0, 0, NULL, NULL, NULL, 0, 0, '2', '2022', 'Nguyễn Hiếu Trung', 1),
(2, 4, 24, 0, 0, NULL, 0, 0, NULL, NULL, NULL, 0, 0, '2', '2022', 'Nguyễn Hiếu Trung', 1),
(3, 5, 24, 0, 0, NULL, 0, 0, NULL, NULL, NULL, 0, 0, '2', '2022', 'Nguyễn Hiếu Trung', 1),
(4, 6, 24, 2147480000, 2147480000, NULL, 0, 0, NULL, NULL, NULL, 0, 0, '2', '2022', 'Nguyễn Hiếu Trung', 1),
(5, 8, 24, 10000000, 10000000, NULL, 500000, 500000, NULL, NULL, NULL, 0, 0, '2', '2022', 'Nguyễn Hiếu Trung', 1),
(11, 3, 27, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 0, '3', '2022', 'Nguyễn Hiếu Trung', 1),
(12, 4, 27, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 0, '3', '2022', 'Nguyễn Hiếu Trung', 1),
(13, 5, 27, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 0, '3', '2022', 'Nguyễn Hiếu Trung', 1),
(14, 6, 27, 2147480000, 2147480000, 0, 0, 0, NULL, NULL, NULL, 0, 0, '3', '2022', 'Nguyễn Hiếu Trung', 1),
(15, 8, 27, 10000000, 10000000, 0, 500000, 500000, NULL, NULL, NULL, 0, 0, '3', '2022', 'Nguyễn Hiếu Trung', 1),
(16, 3, 26, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 0, '4', '2022', 'Nguyễn Hiếu Trung', 1),
(17, 4, 26, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 0, '4', '2022', 'Nguyễn Hiếu Trung', 1),
(18, 5, 26, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 0, '4', '2022', 'Nguyễn Hiếu Trung', 1),
(19, 6, 26, 2147480000, 2147480000, 0, 0, 0, NULL, NULL, NULL, 0, 0, '4', '2022', 'Nguyễn Hiếu Trung', 1),
(20, 8, 26, 10000000, 10000000, 0, 500000, 500000, NULL, NULL, NULL, 0, 0, '4', '2022', 'Nguyễn Hiếu Trung', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_mathang_donhang`
--

DROP TABLE IF EXISTS `php_mathang_donhang`;
CREATE TABLE IF NOT EXISTS `php_mathang_donhang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_donhang` int(11) DEFAULT NULL,
  `ten` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dvt` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `ghichu` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `php_mathang_donhang`
--

INSERT INTO `php_mathang_donhang` (`id`, `id_donhang`, `ten`, `dvt`, `soluong`, `ghichu`) VALUES
(1, 6, 'pesi', 'thùng', 2, 'Kiểm tra số lượng khi giao'),
(3, 6, 'sdsd', 'sdsd', 2, 'sdsdsdsd'),
(4, 6, 'Nước', 'ghghgh', 3, 'trtrt4');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_member`
--

DROP TABLE IF EXISTS `php_member`;
CREATE TABLE IF NOT EXISTS `php_member` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `hoten` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `matkhau` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `matkhau2` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int(1) DEFAULT '0',
  `active_newpass` int(1) DEFAULT '1',
  `ip` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expired` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_active` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngaysinh` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gioitinh` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinhthanh` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cmnd` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gioithieu` text COLLATE utf8mb4_unicode_ci,
  `facebook` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `score` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `active_gift` int(1) DEFAULT '0',
  `active_quatang` int(1) DEFAULT '0',
  `id_album` int(15) DEFAULT '0',
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_menu`
--

DROP TABLE IF EXISTS `php_menu`;
CREATE TABLE IF NOT EXISTS `php_menu` (
  `id` int(11) NOT NULL,
  `name_menu` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `php_menu`
--

INSERT INTO `php_menu` (`id`, `name_menu`, `active`) VALUES
(1, 'Quản lí', 1),
(2, 'Chức năng', 1),
(3, 'Quản lí loại phí', 1),
(4, 'Kế toán', 1),
(5, 'Báo cáo', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_menu_phanquyen`
--

DROP TABLE IF EXISTS `php_menu_phanquyen`;
CREATE TABLE IF NOT EXISTS `php_menu_phanquyen` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_menu_cha` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `php_menu_phanquyen`
--

INSERT INTO `php_menu_phanquyen` (`id`, `name`, `id_menu_cha`) VALUES
(1, 'Nhân sự', 1),
(2, 'Khách hàng', 1),
(3, 'Tài xế', 1),
(4, 'Đội xe', 1),
(5, 'Phòng ban', 1),
(6, 'Đơn hàng', 2),
(7, 'Loại chi', 3),
(8, 'Loại thu', 3),
(9, 'Phiếu chi', 4),
(10, 'Phiếu thu', 4),
(11, 'Lương nhân sự', 4),
(12, 'Báo cáo doanh thu của năm', 5),
(13, 'Bảng giá cước tuyến', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_module`
--

DROP TABLE IF EXISTS `php_module`;
CREATE TABLE IF NOT EXISTS `php_module` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `module` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_module_ln`
--

DROP TABLE IF EXISTS `php_module_ln`;
CREATE TABLE IF NOT EXISTS `php_module_ln` (
  `id` tinyint(2) NOT NULL,
  `ln` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `module_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_title` mediumtext COLLATE utf8mb4_unicode_ci,
  `web_keyword` mediumtext COLLATE utf8mb4_unicode_ci,
  `web_desc` mediumtext COLLATE utf8mb4_unicode_ci,
  `meta_extra` mediumtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`,`ln`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_ngaynghi`
--

DROP TABLE IF EXISTS `php_ngaynghi`;
CREATE TABLE IF NOT EXISTS `php_ngaynghi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `ngay` text COLLATE utf8mb4_unicode_ci,
  `thang` text COLLATE utf8mb4_unicode_ci,
  `nam` text COLLATE utf8mb4_unicode_ci,
  `tinhtrang` int(11) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `php_ngaynghi`
--

INSERT INTO `php_ngaynghi` (`id`, `user_id`, `ngay`, `thang`, `nam`, `tinhtrang`, `timestamp`) VALUES
(38, 19, '15', '10', '2022', 4, '2022-10-19 06:33:26'),
(37, 19, '11', '10', '2022', 4, '2022-10-19 06:33:26'),
(36, 19, '04', '10', '2022', 4, '2022-10-19 06:33:26'),
(35, 1, '04', '10', '2022', 1, '2022-10-18 09:51:48'),
(34, 1, '22', '10', '2022', 4, '2022-10-18 09:51:36'),
(33, 16, '14', '10', '2022', 2, '2022-10-18 09:51:04'),
(32, 16, '05', '10', '2022', 2, '2022-10-18 09:51:04'),
(31, 1, '07', '10', '2022', 2, '2022-10-18 09:50:45'),
(39, 1, '24', '10', '2022', 3, '2022-10-18 09:51:36'),
(29, 16, '14', '4', '2022', 2, '2022-10-18 09:42:43'),
(28, 16, '06', '4', '2022', 2, '2022-10-18 09:42:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_nhansu`
--

DROP TABLE IF EXISTS `php_nhansu`;
CREATE TABLE IF NOT EXISTS `php_nhansu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci,
  `position` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_id` int(5) DEFAULT '0',
  `dateofcompany` date DEFAULT NULL,
  `luong_nhansu` text COLLATE utf8mb4_unicode_ci,
  `phu_cap` float DEFAULT '0',
  `tien_baohiem` float DEFAULT NULL,
  `stk` text COLLATE utf8mb4_unicode_ci,
  `ngan_hang` text COLLATE utf8mb4_unicode_ci,
  `pwd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pwd2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinhtrangdon` int(11) DEFAULT '0',
  `active` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `php_nhansu`
--

INSERT INTO `php_nhansu` (`id`, `name`, `dateofbirth`, `phone`, `position`, `position_id`, `dateofcompany`, `luong_nhansu`, `phu_cap`, `tien_baohiem`, `stk`, `ngan_hang`, `pwd`, `pwd2`, `tinhtrangdon`, `active`) VALUES
(1, 'Nguyễn Hiếu Trung', '2001-12-04', '0327949585', 'admin', 0, '2022-09-09', '10000000', 100000, 151500, '154665565', 'VCB', '1bbd886460827015e5d605ed44252251', '11111111', 0, 1),
(16, 'Hiếu Trung', '2001-12-04', '88888888', 'Giám đốc 2', 1, '2022-09-01', '123213123', 0, 0, NULL, NULL, 'e11170b8cbd2d74102651cb967fa28e5', '1111111111', 0, 1),
(19, 'NV', '0013-12-12', '2222222222', 'Nhân viên điều phối', 3, '0013-03-12', '5000000', 200000, 78000, 'dsadsad', 'ádasdasdsa', '1bbd886460827015e5d605ed44252251', '11111111', 0, 1),
(20, 'Phụ xe', '2022-11-09', '3243243243', 'Phụ xe', 5, '2022-11-09', '3244444444', 3243240, 48715300, '324424234243', 'vcb', 'bbb8aae57c104cda40c93843ad5e6db8', '111111111', 0, 1),
(21, 'Phụ xe 2', '2001-03-13', '5454545454', 'Phụ xe', 5, '2022-11-03', '3433243243', 324324, 51503500, '323442', 'vcb', '1bbd886460827015e5d605ed44252251', '11111111', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_notification`
--

DROP TABLE IF EXISTS `php_notification`;
CREATE TABLE IF NOT EXISTS `php_notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `php_notification`
--

INSERT INTO `php_notification` (`id`, `title`, `content`, `user_id`, `active`) VALUES
(26, 'Thông báo', 'dfaaaaaaaaaaaaaaaaaaaaaaasssssssssssssssssssssssdfaaaaaaaaaaaaaaaaaaaaaaasssssssssssssssssssssssdfaaaaaaaaaaaaaaaaaaaaaaasssssssssssssssssssssssdfaaaaaaaaaaaaaaaaaaaaaaasssssssssssssssssssssssdfaaaaaaaaaaaaaaaaaaaaaaasssssssssssssssssssssssdfaaaaaaaaaaaaaaaaaaaaaaasssssssssssssssssssssssdfaaaaaaaaaaaaaaaaaaaaaaasssssssssssssssssssssssdfaaaaaaaaaaaaaaaaaaaaaaasssssssssssssssssssssssdfaaaaaaaaaaaaaaaaaaaaaaasssssssssssssssssssssssdfaaaaaaaaaaaaaaaaaaaaaaasssssssssssssssssssssssdfaaaaaaaaaaaaaaaaaaaaaaasssssssssssssssssssssssdfaaaaaaaaaaaaaaaaaaaaaaasssssssssssssssssssssssdfaaaaaaaaaaaaaaaaaaaaaaasssssssssssssssssssssssdfaaaaaaaaaaaaaaaaaaaaaaasssssssssssssssssssssssdfaaaaaaaaaaaaaaaaaaaaaaasssssssssssssssssssssssdfaaaaaaaaaaaaaaaaaaaaaaasssssssssssssssssssssssdfaaaaaaaaaaaaaaaaaaaaaaasssssssssssssssssssssss', '16', 1),
(22, 'Thông báo nghỉ lễ tết', 'Thông báo cho tất cả thành viên nghỉ làm\r\nhjdfhkafjkdas\r\nfdsafsafsa\r\nfdasfadfasf', '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_options`
--

DROP TABLE IF EXISTS `php_options`;
CREATE TABLE IF NOT EXISTS `php_options` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'system',
  `type` int(5) DEFAULT '0' COMMENT 'system',
  `active` tinyint(1) DEFAULT '1' COMMENT 'system',
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `order_id` int(5) DEFAULT '0' COMMENT 'system',
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'system',
  `date` date DEFAULT NULL COMMENT 'system',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_options_ln`
--

DROP TABLE IF EXISTS `php_options_ln`;
CREATE TABLE IF NOT EXISTS `php_options_ln` (
  `id` int(5) NOT NULL COMMENT 'system',
  `ln` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT 'system',
  `ln_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `ln_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'system',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intro` mediumtext COLLATE utf8mb4_unicode_ci,
  `content` mediumtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`,`ln`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_phieuchi`
--

DROP TABLE IF EXISTS `php_phieuchi`;
CREATE TABLE IF NOT EXISTS `php_phieuchi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loai_chi` int(11) DEFAULT NULL,
  `name_nguoinhan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diachi_nguoinhan` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_nguoinhan` text COLLATE utf8mb4_unicode_ci,
  `ngaytao_phieuchi` date DEFAULT NULL,
  `thang` text COLLATE utf8mb4_unicode_ci,
  `nam` text COLLATE utf8mb4_unicode_ci,
  `sotien_chi` int(11) DEFAULT NULL,
  `sotien_bangchu` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noidung_chi` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kemtheo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tennguoitao_chi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngaygio_xetduyet` datetime DEFAULT NULL,
  `active` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `php_phieuchi`
--

INSERT INTO `php_phieuchi` (`id`, `loai_chi`, `name_nguoinhan`, `diachi_nguoinhan`, `phone_nguoinhan`, `ngaytao_phieuchi`, `thang`, `nam`, `sotien_chi`, `sotien_bangchu`, `noidung_chi`, `kemtheo`, `tennguoitao_chi`, `ngaygio_xetduyet`, `active`) VALUES
(22, 1, 'ádsasd', 'ádsdsad', '32443', '2022-09-26', '9', '2022', 3423444, 'fsdsfdfdfds', 'fsdsfdsfd', 'sfdsfdfd', 'Trung', '2022-10-04 11:42:54', 1),
(23, 1, 'dsf', 'sdfs', '24343', '2022-09-27', '9', '2022', 2432432, '4324324', '324324', '32432423', 'Nguyễn Hiếu Trung', '2022-10-31 02:42:34', 1),
(24, 2, 'dfasfs', 'fdsfasd', '32432432', '2022-10-25', '10', '2022', 32442432, 'ấdfas', 'fdasf', '2', 'Nguyễn Hiếu Trung', '2022-10-25 03:34:18', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_phieuthu`
--

DROP TABLE IF EXISTS `php_phieuthu`;
CREATE TABLE IF NOT EXISTS `php_phieuthu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loai_thu` int(11) DEFAULT NULL,
  `name_nguoithu` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diachi_nguoithu` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_nguoithu` text COLLATE utf8mb4_unicode_ci,
  `ngaytao_phieuthu` date DEFAULT NULL,
  `thang` text COLLATE utf8mb4_unicode_ci,
  `nam` text COLLATE utf8mb4_unicode_ci,
  `sotien_thu` int(11) DEFAULT NULL,
  `sotien_bangchu` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noidung_thu` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tennguoitao_thu` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngaygio_xetduyet` datetime DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `php_phieuthu`
--

INSERT INTO `php_phieuthu` (`id`, `loai_thu`, `name_nguoithu`, `diachi_nguoithu`, `phone_nguoithu`, `ngaytao_phieuthu`, `thang`, `nam`, `sotien_thu`, `sotien_bangchu`, `noidung_thu`, `tennguoitao_thu`, `ngaygio_xetduyet`, `active`) VALUES
(1, 1, 'Trung', 'sdsdsad', '22443', '2022-09-19', '9', '2022', 22, 'ssđsdá', 'd', 'Trung', '2022-09-26 10:05:14', 1),
(2, 1, 'sdad', 'đasa', '3232', '2022-09-27', '9', '2022', 3243243, '2432432', '43242', 'Nguyễn Hiếu Trung', '2022-10-25 11:03:46', 1),
(3, 1, 'dss', 'ádsda', '2432', '2022-09-27', '9', '2022', 3432, 'fgfđ', 'dsđf', 'Nguyễn Hiếu Trung', '2022-10-25 11:03:53', 1),
(4, 1, 'sasas', 'adsad', '232432', '2022-09-27', '9', '2022', 324324, '324', 'sdfsf', 'Nguyễn Hiếu Trung', '2022-10-25 11:03:58', 1),
(5, 1, 'sd', '432432', '3243', '2022-09-27', '9', '2022', 3424, '32432', '32432', 'Nguyễn Hiếu Trung', '2022-10-25 11:04:05', 1),
(6, 1, 'sđsadsa', 'sadsa', '32132', '2022-09-27', '9', '2022', 2321, '321321', '323213', 'Nguyễn Hiếu Trung', '2022-10-25 11:04:12', 1),
(7, 2, 'fdfsdfds', 'dsfdsfds', '3242432', '2022-10-25', '10', '2022', 43244324, 'sdfdsfsdf', '2', 'Nguyễn Hiếu Trung', '2022-10-25 04:05:46', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_phongban`
--

DROP TABLE IF EXISTS `php_phongban`;
CREATE TABLE IF NOT EXISTS `php_phongban` (
  `id` int(11) NOT NULL,
  `chuc_vu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phan_quyen` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `php_phongban`
--

INSERT INTO `php_phongban` (`id`, `chuc_vu`, `phan_quyen`) VALUES
(0, 'admin', NULL),
(1, 'Giám đốc', '{\"menu-cha\":{\"1\":{\"active\":\"on\",\"name\":\"Qu\\u1ea3n l\\u00ed\"},\"2\":{\"active\":\"on\",\"name\":\"Ch\\u1ee9c n\\u0103ng\"},\"3\":{\"active\":\"on\",\"name\":\"Qu\\u1ea3n l\\u00ed lo\\u1ea1i ph\\u00ed\"},\"4\":{\"active\":\"on\",\"name\":\"K\\u1ebf to\\u00e1n\"},\"5\":{\"active\":\"on\",\"name\":\"B\\u00e1o c\\u00e1o\"}},\"array\":{\"1\":{\"xem\":\"on\",\"them\":\"on\",\"xoa\":\"on\",\"sua\":\"on\",\"fixbug\":\"\"},\"2\":{\"xem\":\"on\",\"them\":\"on\",\"xoa\":\"on\",\"sua\":\"on\",\"fixbug\":\"\"},\"3\":{\"xem\":\"on\",\"them\":\"on\",\"xoa\":\"on\",\"sua\":\"on\",\"fixbug\":\"\"},\"4\":{\"xem\":\"on\",\"them\":\"on\",\"xoa\":\"on\",\"sua\":\"on\",\"fixbug\":\"\"},\"5\":{\"xem\":\"on\",\"them\":\"on\",\"xoa\":\"on\",\"sua\":\"on\",\"fixbug\":\"\"},\"6\":{\"xem\":\"on\",\"them\":\"on\",\"xoa\":\"on\",\"sua\":\"on\",\"fixbug\":\"\"},\"7\":{\"xem\":\"on\",\"them\":\"on\",\"xoa\":\"on\",\"sua\":\"on\",\"fixbug\":\"\"},\"8\":{\"xem\":\"on\",\"them\":\"on\",\"xoa\":\"on\",\"sua\":\"on\",\"fixbug\":\"\"},\"9\":{\"xem\":\"on\",\"them\":\"on\",\"xoa\":\"on\",\"sua\":\"on\",\"fixbug\":\"\"},\"10\":{\"xem\":\"on\",\"them\":\"on\",\"xoa\":\"on\",\"sua\":\"on\",\"fixbug\":\"\"},\"11\":{\"xem\":\"on\",\"them\":\"on\",\"xoa\":\"on\",\"sua\":\"on\",\"fixbug\":\"\"},\"12\":{\"xem\":\"on\",\"fixbug\":\"\"}},\"id_phongban\":\"700202816620731\"}'),
(2, 'Kế toán trưởng', '{\"menu-cha\":{\"1\":{\"active\":\"on\",\"name\":\"Qu\\u1ea3n l\\u00ed\"},\"2\":{\"active\":\"on\",\"name\":\"Ch\\u1ee9c n\\u0103ng\"},\"3\":{\"active\":\"on\",\"name\":\"Qu\\u1ea3n l\\u00ed lo\\u1ea1i ph\\u00ed\"},\"4\":{\"active\":\"on\",\"name\":\"K\\u1ebf to\\u00e1n\"},\"5\":{\"active\":\"on\",\"name\":\"B\\u00e1o c\\u00e1o\"}},\"array\":{\"1\":{\"xem\":\"on\",\"xoa\":\"on\",\"sua\":\"on\",\"fixbug\":\"\"},\"2\":{\"xem\":\"on\",\"them\":\"on\",\"xoa\":\"on\",\"fixbug\":\"\"},\"3\":{\"xem\":\"on\",\"them\":\"on\",\"xoa\":\"on\",\"sua\":\"on\",\"fixbug\":\"\"},\"4\":{\"xem\":\"on\",\"them\":\"on\",\"xoa\":\"on\",\"sua\":\"on\",\"fixbug\":\"\"},\"5\":{\"fixbug\":\"\"},\"6\":{\"xem\":\"on\",\"them\":\"on\",\"xoa\":\"on\",\"sua\":\"on\",\"fixbug\":\"\"},\"7\":{\"xem\":\"on\",\"them\":\"on\",\"xoa\":\"on\",\"sua\":\"on\",\"fixbug\":\"\"},\"8\":{\"xem\":\"on\",\"them\":\"on\",\"xoa\":\"on\",\"sua\":\"on\",\"fixbug\":\"\"},\"9\":{\"xem\":\"on\",\"them\":\"on\",\"xoa\":\"on\",\"sua\":\"on\",\"fixbug\":\"\"},\"10\":{\"xem\":\"on\",\"them\":\"on\",\"xoa\":\"on\",\"sua\":\"on\",\"fixbug\":\"\"},\"11\":{\"xem\":\"on\",\"them\":\"on\",\"xoa\":\"on\",\"sua\":\"on\",\"fixbug\":\"\"},\"12\":{\"fixbug\":\"\"}},\"id_phongban\":\"387890526038503\"}'),
(3, 'Kế toán', NULL),
(4, 'Điều phối viên', NULL),
(5, 'Phụ xe', NULL),
(6, 'Kho vận', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_quyen`
--

DROP TABLE IF EXISTS `php_quyen`;
CREATE TABLE IF NOT EXISTS `php_quyen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu_quyen` int(11) DEFAULT NULL,
  `ten_quyen` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_phongban` int(11) DEFAULT NULL,
  `them` int(11) DEFAULT NULL,
  `xoa` int(11) DEFAULT NULL,
  `sua` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `php_quyen`
--

INSERT INTO `php_quyen` (`id`, `id_menu_quyen`, `ten_quyen`, `id_phongban`, `them`, `xoa`, `sua`, `active`) VALUES
(1, 1, 'Nhân sự', 1, 1, 1, 1, 1),
(2, 2, 'Khách hàng', 1, 1, 1, 1, 1),
(3, 1, 'Nhân sự', 2, 0, 1, 1, 1),
(4, 2, 'Khách hàng', 2, 1, 1, 0, 1),
(5, 1, 'Nhân sự', 3, 0, 1, 1, 0),
(6, 2, 'Khách hàng', 3, 0, 1, 0, 1),
(7, 3, 'Tài xế', 1, 1, 1, 1, 1),
(8, 6, 'Đơn hàng', 3, 1, 1, 0, 1),
(9, 4, 'Đội xe', 3, 1, 0, 1, 1),
(10, 3, 'Tài xế', 3, 1, 1, 1, 1),
(11, 5, 'Phòng ban', 3, 0, 0, 0, 0),
(12, 3, 'Tài xế', 2, 1, 1, 1, 1),
(13, 4, 'Đội xe', 2, 1, 1, 1, 1),
(14, 5, 'Phòng ban', 2, 0, 0, 0, 0),
(15, 6, 'Đơn hàng', 2, 1, 1, 1, 1),
(16, 4, 'Đội xe', 1, 1, 1, 1, 1),
(17, 5, 'Phòng ban', 1, 1, 1, 1, 1),
(18, 6, 'Đơn hàng', 1, 1, 1, 1, 1),
(21, 1, 'Nhân sự', 4, 0, 0, 0, 1),
(22, 2, 'Khách hàng', 4, 0, 0, 0, 1),
(23, 3, 'Tài xế', 4, 0, 0, 0, 1),
(24, 4, 'Đội xe', 4, 0, 0, 0, 1),
(25, 5, 'Phòng ban', 4, 0, 0, 0, 1),
(26, 6, 'Đơn hàng', 4, 1, 1, 0, 1),
(27, 7, 'Loại chi', 3, 1, 1, 1, 1),
(28, 7, 'Loại chi', 2, 1, 1, 1, 1),
(29, 0, '', 3, 0, 0, 0, 0),
(30, 8, 'Loại thu', 3, 0, 0, 0, 1),
(31, 9, 'Phiếu chi', 3, 1, 0, 0, 1),
(32, 10, 'Phiếu thu', 3, 1, 0, 0, 0),
(33, 11, 'Lương nhân sự', 3, 1, 1, 1, 1),
(34, 7, 'Loại chi', 1, 1, 1, 1, 1),
(35, 8, 'Loại thu', 1, 1, 1, 1, 1),
(36, 9, 'Phiếu chi', 1, 1, 1, 1, 1),
(37, 10, 'Phiếu thu', 1, 1, 1, 1, 1),
(38, 11, 'Lương nhân sự', 1, 1, 1, 1, 1),
(39, 8, 'Loại thu', 2, 1, 1, 1, 1),
(40, 9, 'Phiếu chi', 2, 1, 1, 1, 1),
(41, 10, 'Phiếu thu', 2, 1, 1, 1, 1),
(42, 11, 'Lương nhân sự', 2, 1, 1, 1, 1),
(43, 12, 'Báo cáo doanh thu của năm', 1, 0, 0, 0, 1),
(44, 12, 'Báo cáo doanh thu của năm', 2, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_session`
--

DROP TABLE IF EXISTS `php_session`;
CREATE TABLE IF NOT EXISTS `php_session` (
  `session_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_taixe`
--

DROP TABLE IF EXISTS `php_taixe`;
CREATE TABLE IF NOT EXISTS `php_taixe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_taixe` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_taixe` text COLLATE utf8mb4_unicode_ci,
  `chuc_vu` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_taixe` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hangbanglai` text COLLATE utf8mb4_unicode_ci,
  `name_page` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `luong_taixe` float DEFAULT NULL,
  `phu_cap` float DEFAULT '0',
  `tien_baohiem` float DEFAULT '0',
  `tile_hoahong` float DEFAULT '0',
  `stk` text COLLATE utf8mb4_unicode_ci,
  `ngan_hang` text COLLATE utf8mb4_unicode_ci,
  `pwd` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pwd2` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinhtrangdon` int(11) DEFAULT '0',
  `active` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `php_taixe`
--

INSERT INTO `php_taixe` (`id`, `name_taixe`, `phone_taixe`, `chuc_vu`, `address_taixe`, `hangbanglai`, `name_page`, `luong_taixe`, `phu_cap`, `tien_baohiem`, `tile_hoahong`, `stk`, `ngan_hang`, `pwd`, `pwd2`, `tinhtrangdon`, `active`) VALUES
(3, 'Tài xế A', '02313', NULL, 'n2021080303044462@workingtall.com', 'root', 'taixe', 0, 0, 0, 0, NULL, NULL, '1bbd886460827015e5d605ed44252251', '11111111', 0, 1),
(4, 'Tài xế B', '032794', NULL, 'n2021080303044462@workingtall.com', 'root', 'taixe', 0, 0, 0, 0, NULL, NULL, '1bbd886460827015e5d605ed44252251', '', 0, 1),
(5, 'admin', '0327949585', NULL, 'a2021080303040707@workingtall.com', 'b3', 'taixe', 0, 0, 0, 0, NULL, NULL, '1bbd886460827015e5d605ed44252251', '', 1, 1),
(6, 'Tài xế ABC', '2323232', NULL, 'm2021080303062068@workingtall.com', 'b3', 'taixe', 2147480000, 0, 0, 0, NULL, NULL, 'bae5e3208a3c700e3db642b6631e95b9', '', 1, 1),
(8, 'Nguyễn Hiếu Trung', '0366991758', 'Tài xế', 'Bình Định', 'c1', 'taixe', 10000000, 500000, 500000, 0, '5466656556565', 'VCB', '1bbd886460827015e5d605ed44252251', '11111111', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_tangca`
--

DROP TABLE IF EXISTS `php_tangca`;
CREATE TABLE IF NOT EXISTS `php_tangca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `ngay` text COLLATE utf8mb4_unicode_ci,
  `thang` text COLLATE utf8mb4_unicode_ci,
  `nam` text COLLATE utf8mb4_unicode_ci,
  `sotien` float DEFAULT NULL,
  `noidung_tangca` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `php_tangca`
--

INSERT INTO `php_tangca` (`id`, `user_id`, `ngay`, `thang`, `nam`, `sotien`, `noidung_tangca`, `timestamp`) VALUES
(1, 1, '03', '03', '03', 2222220, 'dsdadasdasd', '2022-10-18 08:38:36'),
(2, 1, ' 07', ' 07', ' 07', 2222220, 'dsdadasdasd', '2022-10-18 08:38:36'),
(3, 19, '11', '10', '2022', 500000, 'dsdsadsadas', '2022-10-19 06:33:03'),
(4, 19, ' 21', '10', '2022', 500000, 'dsdsadsadas', '2022-10-19 06:33:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_ungluong`
--

DROP TABLE IF EXISTS `php_ungluong`;
CREATE TABLE IF NOT EXISTS `php_ungluong` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `so_tien_ung` float DEFAULT NULL,
  `noidung_ung` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thoi_gian_ung` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ngay` text COLLATE utf8mb4_unicode_ci,
  `thang` text COLLATE utf8mb4_unicode_ci,
  `nam` text COLLATE utf8mb4_unicode_ci,
  `nguoi_tao_don` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `php_ungluong`
--

INSERT INTO `php_ungluong` (`id`, `user_id`, `so_tien_ung`, `noidung_ung`, `thoi_gian_ung`, `ngay`, `thang`, `nam`, `nguoi_tao_don`, `active`) VALUES
(7, 16, 500000, NULL, '2022-10-12 04:22:02', '12', '3', '2022', 'Nguyễn Hiếu Trung', 1),
(9, 1, 5000000, 'dsfasfsadfsda', '2022-10-18 10:18:03', '13', '10', '2022', 'Nguyễn Hiếu Trung', 1),
(10, 1, 500000, 'sđsadá', '2022-10-18 10:22:19', '22', '10', '2022', 'Nguyễn Hiếu Trung', 1),
(11, 1, 500000, 'sadsadsa', '2022-10-18 10:23:48', '29', '10', '2022', 'Nguyễn Hiếu Trung', 1),
(12, 19, 500000, 'dsdadas', '2022-10-19 06:33:51', '14', '10', '2022', 'Nguyễn Hiếu Trung', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_user`
--

DROP TABLE IF EXISTS `php_user`;
CREATE TABLE IF NOT EXISTS `php_user` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `is_admin` tinyint(1) DEFAULT '0',
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` mediumtext COLLATE utf8mb4_unicode_ci,
  `data` mediumtext COLLATE utf8mb4_unicode_ci,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Back end user';

--
-- Đang đổ dữ liệu cho bảng `php_user`
--

INSERT INTO `php_user` (`id`, `is_admin`, `fullname`, `username`, `password`, `permission`, `data`, `active`) VALUES
(1, 1, 'Administrator', 'admin', '8ddcff3a80f4189ca1c9d4d902c3c909', 'ALL', 'a:3:{s:4:\"skin\";s:7:\"default\";s:4:\"icon\";s:7:\"default\";s:4:\"menu\";a:7:{i:2;i:1;i:1;i:1;i:0;i:1;i:3;i:1;i:4;i:1;i:5;i:1;i:6;i:1;}}', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `php_user_log`
--

DROP TABLE IF EXISTS `php_user_log`;
CREATE TABLE IF NOT EXISTS `php_user_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'cms',
  `userid` int(5) DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` mediumtext COLLATE utf8mb4_unicode_ci,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
