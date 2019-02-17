-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 12, 2018 lúc 03:48 AM
-- Phiên bản máy phục vụ: 10.1.29-MariaDB
-- Phiên bản PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `website`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `avartar` varchar(100) DEFAULT NULL,
  `level` tinyint(4) DEFAULT '1',
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updates_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `address`, `email`, `phone`, `password`, `avartar`, `level`, `status`, `created_at`, `updates_at`) VALUES
(9, 'Bui van Cong', 'so 77 ngo 68 trieu khuc thanh xuan ha noi', 'abc@gmail.com', '0966012861', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 2, 1, '2018-10-08 07:55:40', '2018-10-08 09:15:48'),
(10, 'Nguyen phuc hieu', 'ha noi', 'hieuchimto@gmail.com', '0987654432', '31528198109743225ff9d0cf04d1fdd1', NULL, 1, 1, '2018-10-08 07:56:34', '2018-10-08 07:56:34'),
(11, 'Nguyễn văn cao', 'ninh bình', 'cao123@gmail.com', '0358356161', '31528198109743225ff9d0cf04d1fdd1', NULL, 2, 1, '2018-10-08 07:57:35', '2018-10-08 07:57:35'),
(12, 'Nguyen thi đào', 'băc giang 123', 'dao123@gmail.com', '0912345687', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 1, 1, '2018-10-08 08:08:18', '2018-10-08 08:26:57'),
(13, 'Root', 'ninh bình việt nam', 'cong123@gmail.com', '0966012861', 'fd663b8b08b461adb8d06525b395b2a0', NULL, 2, 1, '2018-10-11 14:46:37', '2018-10-11 14:46:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `images` varchar(100) DEFAULT NULL,
  `banner` varchar(100) DEFAULT NULL,
  `home` tinyint(4) DEFAULT '0',
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `images`, `banner`, `home`, `status`, `created_at`, `updated_at`) VALUES
(25, 'Asus', 'asus', NULL, NULL, 1, 1, '2018-10-06 10:57:55', '2018-10-09 01:04:37'),
(26, 'Dell', 'dell', NULL, NULL, 1, 1, '2018-10-06 10:58:03', '2018-10-09 10:18:17'),
(27, 'MacBook', 'macbook', NULL, NULL, 0, 1, '2018-10-06 10:58:13', '2018-10-11 13:40:40'),
(30, 'Acer', 'acer', NULL, NULL, 0, 1, '2018-10-08 01:53:46', '2018-10-11 13:40:38'),
(31, 'Lenovo', 'lenovo', NULL, NULL, 0, 1, '2018-10-08 01:54:18', '2018-10-09 01:51:00'),
(33, 'Thinkpad', 'thinkpad', NULL, NULL, 0, 1, '2018-10-08 15:01:20', '2018-10-09 01:04:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `sale` int(15) DEFAULT NULL,
  `thunbar` varchar(100) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `content` text,
  `number` int(11) NOT NULL DEFAULT '0',
  `head` int(11) DEFAULT '0',
  `view` int(11) DEFAULT '0',
  `hot` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `price`, `sale`, `thunbar`, `category_id`, `content`, `number`, `head`, `view`, `hot`, `created_at`, `updated_at`) VALUES
(8, 'ban phím', 'ban-phim', 3000000, 0, 'bonguon (22).jpg', 25, ' ok', 123, 0, 0, 0, '2018-10-07 10:36:18', '2018-10-11 16:51:41'),
(9, 'leno N121', 'leno-n121', 900000, 0, 'Laptop-Dell-Inspiron-3467-M20NR1-Black.jpg', 25, ' tuyệt vời', 0, 0, 0, 0, '2018-10-07 11:21:01', '2018-10-11 16:53:13'),
(10, 'Dell 22', 'dell-22', 9000000, 0, 'bonguon (2).jpg', 26, 'dell 4000', 0, 0, 0, 0, '2018-10-07 11:25:21', '2018-10-09 04:17:29'),
(12, 'Mac 5270', 'mac-5270', 28000000, 1000000, 'dellinspironn3467c4i51107black1-3680.jpg', 26, 'ok', 2, 0, 0, 0, '2018-10-07 13:04:24', '2018-10-09 04:07:08'),
(13, 'Màn 24', 'man-24', 200, 0, 'man-hinh-may-tinh-lg-24mp58vq-p.atv-24inch-1.jpg', 26, ' ok', 1, 0, 0, 0, '2018-10-07 15:58:45', '2018-10-09 04:17:23'),
(14, 'màn key 102', 'man-key-102', 7200, 1000000, '1.png', 26, 'oki', 2, 0, 0, 0, '2018-10-07 15:59:43', '2018-10-09 04:06:53'),
(15, 'nguồn', 'nguon', 150, 1000000, 'bonguon (1).jpg', 25, '   ', 12, 0, 0, 0, '2018-10-07 16:03:34', '2018-10-09 04:08:27'),
(16, 'Disk', 'disk', 1500, 2000000, '1.jpg', 26, ' ok', 2, 0, 0, 0, '2018-10-07 16:12:16', '2018-10-09 04:08:24'),
(17, 'Nguồn', 'nguon', 400, 5000000, 'bonguon (14).jpg', 26, ' oki', 5, 0, 0, 0, '2018-10-07 16:14:14', '2018-10-09 04:08:12'),
(18, 'bàn phím', 'ban-phim', 20000, 0, 'banphim (30).jpg', 25, ' ok', 5, 0, 0, 0, '2018-10-07 16:16:50', '2018-10-09 04:13:50'),
(20, 'màn lenovo N400', 'man-lenovo-n400', 3700000, 0, 'lenovo N400.jpg', 31, ' ', 2, 0, 0, 0, '2018-10-08 15:40:43', '2018-10-09 04:17:19'),
(21, 'chuột', 'chuot', 1500000, 0, 'chuot.jpg', 26, ' oki', 5, 0, 0, 0, '2018-10-09 04:16:58', '2018-10-09 04:16:58'),
(22, 'Ram DDR3', 'ram-ddr3', 500000, 0, 'ramDDR3.jpg', 25, ' ok', 5, 0, 0, 0, '2018-10-09 04:20:36', '2018-10-09 04:24:09'),
(23, 'Mac 5270', 'mac-5270', 9000000, 1000000, 'mac5270.jpg', 27, ' ok', 5, 0, 0, 0, '2018-10-09 09:46:20', '2018-10-09 09:46:20'),
(24, 'Itell Mac', 'itell-mac', 300, 0, 'images.jpg', 27, ' tuyệt vời', 2, 0, 0, 0, '2018-10-09 09:52:43', '2018-10-09 09:52:43'),
(25, 'Loa', 'loa', 300, 0, 'loaAcer.jpg', 30, ' oki', 1, 0, 0, 0, '2018-10-09 10:35:30', '2018-10-09 10:35:30'),
(26, 'CPU Core i7', 'cpu-core-i7', 10000000, 100000, 'core7Asus.jpg', 25, ' tuyêt vời', 2, 0, 0, 0, '2018-10-09 11:21:16', '2018-10-09 11:21:16'),
(27, 'CPU Core i7', 'cpu-core-i7', 2000000, 500000, 'corei7dell.jpg', 26, ' oki', 5, 0, 0, 0, '2018-10-09 11:23:23', '2018-10-09 11:23:23'),
(28, 'luan mac', 'luan-mac', 1000000, 100000, 'luan.jpg', 27, ' tuỷetrssfgsf', 2, 0, 0, 0, '2018-10-11 03:10:55', '2018-10-11 03:10:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `avartar` varchar(100) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `token` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `password`, `avartar`, `status`, `token`, `created_at`, `updated_at`) VALUES
(1, 'cong thành', 'vancong1166@gmail.com', '12345678', 'so 77 ngo 68 trieu khuc thanh xuan ha noi', '123456789', NULL, 1, NULL, '2018-10-11 09:21:53', '2018-10-11 09:22:52'),
(5, 'Root', 'abc@gmail.com', '0923456178', 'ha noi', 'abc@12345', NULL, 1, NULL, '2018-10-11 09:24:42', '2018-10-11 09:24:42'),
(6, 'bala', 'haha@gmail.com', '1234567899', 'nb', '1234567', NULL, 1, NULL, '2018-10-11 09:25:46', '2018-10-11 09:25:46'),
(8, 'Bui van Cong', 'bala@gmail.com', '09888882222', 'nb', '25f9e794323b453885f5181f1b624d0b', NULL, 1, NULL, '2018-10-11 09:43:36', '2018-10-11 09:43:36'),
(9, 'Nguyen phuc hieu', '1234@yahoo.com', '0981234567', 'nb', 'fd663b8b08b461adb8d06525b395b2a0', NULL, 1, NULL, '2018-10-11 09:44:16', '2018-10-11 09:44:16'),
(10, 'Admin', 'rainny1166@gmail.com', '098765442', 'hp', 'fd663b8b08b461adb8d06525b395b2a0', NULL, 1, NULL, '2018-10-11 09:46:53', '2018-10-11 09:46:53'),
(11, 'Nguyen phuc hieu', 'hieuchimto@gmail.com', '09876543', 'hn', 'e10adc3949ba59abbe56e057f20f883e', NULL, 1, NULL, '2018-10-11 09:51:10', '2018-10-11 09:51:10'),
(12, 'luan lee', 'luan123@gmail.com', '0912345678', 'nghe an', '123456789', NULL, 1, NULL, '2018-10-11 09:57:41', '2018-10-11 09:57:41'),
(13, 'Bui van Cong', 'v234@gmail.com', '098765543', 'nb', '123456789', NULL, 1, NULL, '2018-10-11 10:31:22', '2018-10-11 10:31:22'),
(14, 'rot', '12356@gmail.com', '0987654321', 'nbvn', '1234567890', NULL, 1, NULL, '2018-10-11 10:33:32', '2018-10-11 10:33:32'),
(15, 'rot', '12356@gmail.com', '0987654321', 'nbvn', '1234567890', NULL, 1, NULL, '2018-10-11 10:33:52', '2018-10-11 10:33:52'),
(16, 'Bui van cong', '123123@nhc0ng9768', '01645271166', 'so 777', '123456', NULL, 1, NULL, '2018-10-11 10:34:38', '2018-10-11 10:34:38'),
(17, 'Root', '12365@gmail.com', '123456789', 'nbvn', '123456789', NULL, 1, NULL, '2018-10-11 10:36:03', '2018-10-11 10:36:03'),
(18, 'đù', 'du123@gmail.com', '0987654', 'nbvn', '123456', NULL, 1, NULL, '2018-10-11 10:36:50', '2018-10-11 10:36:50'),
(19, 'đù', 'du123@gmail.com', '0987654', 'nbvn', '123456', NULL, 1, NULL, '2018-10-11 10:37:05', '2018-10-11 10:37:05'),
(20, 'dù', '1@gmail.com', '098888', 'nbvn', '1234567', NULL, 1, NULL, '2018-10-11 10:38:03', '2018-10-11 10:38:03'),
(21, 'Bui van cong', '123@nhc0ng9768', '1', 'so 777', '12345', NULL, 1, NULL, '2018-10-11 10:44:20', '2018-10-11 10:44:20'),
(22, 'eee', 'ee123@gmail.com', '1', '123', '1234', NULL, 1, NULL, '2018-10-11 10:45:09', '2018-10-11 10:45:09'),
(23, 'Bui van cong', '123@nhc0ng9768', '1', 'so 777', '12345', NULL, 1, NULL, '2018-10-11 13:39:06', '2018-10-11 13:39:06');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
