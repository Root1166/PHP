-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 03, 2018 lúc 04:38 AM
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
-- Cơ sở dữ liệu: `pcc`
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
(16, 'Bui van Cong', 'NBVN', 'rainny1166@gmail.com', '01238754', 'fd663b8b08b461adb8d06525b395b2a0', 'IMG_20160729_171535.jpg', 2, 1, '2018-10-25 09:12:30', '2018-10-25 09:12:30'),
(17, 'Admin', 'ha noi', 'abc1234@gmail.com', '0923456187', 'fd663b8b08b461adb8d06525b395b2a0', '40568575_704566929879429_5675511183847718912_n.jpg', 2, 1, '2018-10-27 01:29:07', '2018-10-27 11:15:38'),
(18, 'Bui van cong', 'abcdef', '12365@gmail.com', '09999999999', '31528198109743225ff9d0cf04d1fdd1', 'ephoto360.com-5bc2ebc130e0f.jpg', 1, 1, '2018-10-27 11:04:49', '2018-10-27 11:14:30'),
(19, 'Mother', 'Ninh Bình', 'mother123@gmail.com', '09324234234', 'fd663b8b08b461adb8d06525b395b2a0', '815910.jpg', 1, 1, '2018-10-27 11:18:06', '2018-10-27 11:18:06');

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
(34, 'DELL', 'dell', NULL, NULL, 1, 1, '2018-10-25 09:27:19', '2018-10-25 09:29:59'),
(35, 'Asus', 'asus', NULL, NULL, 1, 1, '2018-10-25 09:28:02', '2018-10-25 09:30:01'),
(36, 'Thinkpad', 'thinkpad', NULL, NULL, 0, 1, '2018-10-25 09:28:14', '2018-10-25 09:28:14'),
(37, 'Acer', 'acer', NULL, NULL, 0, 1, '2018-10-25 09:28:33', '2018-10-25 09:28:33'),
(38, 'MacBook', 'macbook', NULL, NULL, 0, 1, '2018-10-25 09:28:45', '2018-10-25 09:28:45'),
(39, 'Lenovo', 'lenovo', NULL, NULL, 0, 1, '2018-10-25 09:29:50', '2018-10-25 09:29:50');

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
(29, 'Dell240', 'dell240', 10000000, 0, 'abcadmin.jpg', 34, ' Ram 4GB ,Ổ cứng 500 HDD', 2, 0, 0, 0, '2018-10-25 09:34:00', '2018-10-27 11:06:09'),
(30, 'DELL 3467', 'dell-3467', 15000000, 3000000, 'Laptop-Dell-Inspiron-3467-M20NR1-Black.jpg', 34, ' Ram 8g, Ổ cứng SSD 240GB', 10, 0, 0, 0, '2018-10-25 09:36:06', '2018-10-25 09:36:06'),
(32, '123123', '123123', 12313123, 123, 'ephoto360.com-5bc2ed5529514.jpg', 34, ' love', 1, 0, 0, 0, '2018-10-25 10:19:00', '2018-10-25 10:22:20'),
(33, 'Acer', 'acer', 9000000, 0, 'ephoto360.com-5bc2edc7491a4.gif', 37, ' love', 12, 0, 0, 0, '2018-10-25 10:27:52', '2018-10-25 10:27:52'),
(34, 'hahha', 'hahha', 0, 0, 'lenovo N400.jpg', 34, ' HDD', 1, 0, 0, 0, '2018-11-04 14:51:39', '2018-11-04 16:01:10'),
(35, 'Máy ảnh 4.0', 'may-anh-40', 15000000, 10000000, 'máy anh t.jpg', 35, ' máy ảnh hhhhhh', 2, 0, 0, 0, '2018-11-05 07:19:17', '2018-11-05 07:19:17'),
(36, 'ĐTIphone7', 'dtiphone7', 130000000, 30000000, 'điênthaoị.jpg', 34, ' iphone', 2, 0, 0, 0, '2018-11-05 07:49:38', '2018-11-05 07:49:38'),
(38, 'Bui van cong', 'bui-van-cong', 2147483647, 123123, 'banh kem sinh nhat.jpg', 38, ' 123123', 1231, 0, 0, 0, '2018-11-05 09:25:04', '2018-11-05 09:25:04'),
(39, 'shfdshqfas', 'shfdshqfas', 234234, 34241, 'banhkem.jpg', 35, ' ffadhkksjf', 123123, 0, 0, 0, '2018-11-05 10:05:07', '2018-11-05 10:05:07'),
(40, 'des', 'des', 10000000, 0, '14990904_196770124111013_5336305432816496043_o.jpg', 34, ' vv gv gvg vg vg ', 1, 0, 0, 0, '2018-12-03 02:53:56', '2018-12-03 02:53:56');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
