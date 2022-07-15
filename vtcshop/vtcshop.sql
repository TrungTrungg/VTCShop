-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2022 at 05:46 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vtcshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `logintime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `fullname`, `logintime`) VALUES
(34, 'Ngô Xuân Trung', '2022-03-24 15:44:08'),
(35, 'Ngô Xuân Trung', '2022-03-24 15:44:08'),
(36, 'Ngô Xuân Trung', '2022-03-24 15:44:09'),
(37, 'Ngô Xuân Trung', '2022-03-24 15:44:09'),
(38, 'Ngô Xuân Trung', '2022-03-24 15:45:37'),
(39, 'Ngô Xuân Trung', '2022-03-24 15:45:37'),
(40, 'Ngô Xuân Trung', '2022-03-24 21:50:27'),
(41, 'Ngô Xuân Trung', '2022-03-24 21:50:27'),
(42, 'Ngô Xuân Trung', '2022-03-24 21:50:43'),
(43, 'Ngô Xuân Trung', '2022-03-24 21:50:44'),
(44, 'Ngô Xuân Trung', '2022-03-24 21:50:44'),
(45, 'Ngô Xuân Trung', '2022-03-24 21:50:44'),
(46, 'Ngô Xuân Trung', '2022-03-24 21:51:31'),
(47, 'Ngô Xuân Trung', '2022-03-24 21:51:31'),
(48, 'Ngô Xuân Trung', '2022-03-24 21:54:13'),
(49, 'Ngô Xuân Trung', '2022-03-24 21:54:13'),
(50, 'Ngô Xuân Trung', '2022-03-24 21:54:44'),
(51, 'Ngô Xuân Trung', '2022-03-24 21:54:44'),
(52, 'Ngô Xuân Trung', '2022-03-24 21:54:44'),
(53, 'Ngô Xuân Trung', '2022-03-24 21:54:45'),
(54, 'Ngô Xuân Trung', '2022-03-24 21:55:30'),
(55, 'Ngô Xuân Trung', '2022-03-24 21:55:35'),
(56, 'Ngô Xuân Trung', '2022-03-24 21:55:35'),
(57, 'Ngô Xuân Trung', '2022-03-24 21:56:34'),
(58, 'Ngô Xuân Trung', '2022-03-24 21:56:34'),
(59, 'Ngô Xuân Trung', '2022-03-24 21:57:10'),
(60, 'Ngô Xuân Trung', '2022-03-24 21:57:11'),
(61, 'Ngô Xuân Trung', '2022-03-24 21:58:25'),
(62, 'Ngô Xuân Trung', '2022-03-24 21:58:25'),
(63, 'Nguyễn Văn Việt', '2022-03-24 22:21:08'),
(64, 'Nguyễn Văn Việt', '2022-03-24 22:21:08'),
(65, 'Ngô Xuân Trung', '2022-03-24 22:21:54'),
(66, 'Ngô Xuân Trung', '2022-03-24 22:21:55'),
(67, 'Ngô Xuân Trung', '2022-06-03 12:44:22'),
(68, 'Ngô Xuân Trung', '2022-06-03 12:44:23'),
(69, 'Ngô Xuân Trung', '2022-06-21 18:46:14'),
(70, 'Ngô Xuân Trung', '2022-06-21 18:46:15'),
(71, 'Ngô Xuân Trung', '2022-06-21 18:51:33'),
(72, 'Ngô Xuân Trung', '2022-06-21 18:51:34'),
(73, 'Ngô Xuân Trung', '2022-06-21 18:52:20'),
(74, 'Ngô Xuân Trung', '2022-06-21 18:52:20'),
(75, 'Ngô Xuân Trung', '2022-06-21 19:01:17'),
(76, 'Ngô Xuân Trung', '2022-06-21 19:01:17'),
(77, 'Ngô Xuân Trung', '2022-06-24 17:52:06'),
(78, 'Ngô Xuân Trung', '2022-06-24 17:52:06'),
(79, 'Ngô Xuân Trung', '2022-06-24 20:11:26'),
(80, 'Ngô Xuân Trung', '2022-06-24 20:11:26'),
(81, 'Ngô Xuân Trung', '2022-06-26 15:14:33'),
(82, 'Ngô Xuân Trung', '2022-06-26 15:14:33'),
(83, 'Ngô Xuân Trung', '2022-07-06 16:46:38'),
(84, 'Ngô Xuân Trung', '2022-07-06 16:46:38'),
(85, 'Ngô Xuân Trung', '2022-07-07 20:17:54'),
(86, 'Ngô Xuân Trung', '2022-07-07 20:17:54'),
(87, 'Trung Ngô', '2022-07-07 20:19:02'),
(88, 'Trung Ngô', '2022-07-07 20:19:02'),
(89, 'Ngô Xuân Trung', '2022-07-11 00:28:16'),
(90, 'Ngô Xuân Trung', '2022-07-11 00:28:16'),
(91, 'Ngô Xuân Trung', '2022-07-11 23:25:32'),
(92, 'Ngô Xuân Trung', '2022-07-11 23:25:32');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `is_brand` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `is_brand`) VALUES
(1, 'Laptop', NULL),
(2, 'PC', NULL),
(3, 'Màn hình', NULL),
(4, 'Bàn phím ', NULL),
(5, 'Chuột', NULL),
(6, 'Acer', 1),
(7, 'Asus', 1),
(8, 'Hp', 1),
(9, 'Dell', 1),
(10, 'Logitech', 1),
(11, 'Corsair', 1),
(12, 'Razer', 1),
(13, 'MSI', 1),
(14, 'Bàn phím cơ', NULL),
(15, 'Bàn phím giả cơ', NULL),
(16, 'Huntsman Series', NULL),
(17, 'Cynosa Series', NULL),
(18, 'K63 Series', NULL),
(19, 'K100 Series', NULL),
(20, 'Lenovo', 2),
(21, 'GVN', 2),
(22, 'HyperX Kingston', 2),
(23, 'Akko', 2),
(24, 'ViewSonic', 2),
(25, 'AOC', 2),
(26, 'HKC', 2),
(27, 'AORUS', 2),
(28, 'Huawei', 2);

-- --------------------------------------------------------

--
-- Table structure for table `client_menu`
--

CREATE TABLE `client_menu` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `conditions` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_menu`
--

INSERT INTO `client_menu` (`id`, `parent_id`, `name`, `icon`, `conditions`) VALUES
(1, 0, 'Laptop', 'fas fa-laptop', ''),
(2, 0, 'PC', 'fas fa-desktop', ''),
(3, 0, 'Màn hình', 'fas fa-tv', ''),
(4, 0, 'Bàn phím', 'fas fa-keyboard', ''),
(5, 0, 'Chuột', 'fas fa-mouse', ''),
(6, 1, 'Laptop theo thương hiệu', '', ''),
(7, 1, 'Laptop theo giá', '', ''),
(8, 2, 'PC tầm trung', '', ''),
(9, 2, 'PC cao cấp', '', ''),
(10, 2, 'PC theo giá', '', ''),
(11, 3, 'Màn hình theo giá', '', ''),
(12, 3, 'Hãng sản xuất', '', ''),
(13, 4, 'Thương hiệu Logitech', '', ''),
(14, 4, 'Thương hiệu Razer', '', ''),
(15, 4, 'Thương hiệu Corsair', '', ''),
(16, 5, 'Chuột theo hãng', '', ''),
(17, 5, 'Chuột theo giá tiền', '', ''),
(18, 6, 'Asus', '', 'category=Laptop&category2=Asus'),
(19, 6, 'Acer', '', 'category=Laptop&category2=Acer'),
(20, 6, 'Lenovo', '', 'category=Laptop&category2=Lenovo'),
(21, 7, 'Dưới 20 triệu', '', 'category=Laptop&price1=20000000'),
(22, 7, 'Trên 20 triệu', '', 'category=Laptop&price2=20000000'),
(23, 8, 'Titan M - Pentium - 1030', '', 'category=PC&name=GVN Titan M'),
(24, 8, 'Ventus M - Intel i3 - GT 1030', '', 'category=PC&name=GVN Ventus M'),
(25, 8, 'Mystic M - Intel i3 - 1050Ti', '', 'category=PC&name=GVN Mystic M'),
(26, 8, 'Ivy M - Intel i3 - 1650', '', 'category=PC&name=GVN Ivy M'),
(27, 9, 'Hextech S - Intel i5 - 1660S', '', 'category=PC&name=GVN Hextech S'),
(28, 9, 'Phantom S - Intel i5 (12th) - 3060', '', 'category=PC&name=GVN Phantom S'),
(29, 10, 'Từ 8 đến 20 triệu', '', 'category=PC&price3=8000000&price4=20000000'),
(30, 10, 'Từ 20 đến 50 triệu', '', 'category=PC&price3=2000000&price4=50000000'),
(31, 11, 'Từ 5 đến 10 triệu', '', 'category=Màn hình&price3=5000000&price4=10000000'),
(32, 11, 'Từ 10 đến 20 triệu', '', 'category=Màn hình&price3=10000000&price4=20000000'),
(33, 12, 'Acer', '', 'category=Màn hình&category2=Acer'),
(34, 12, 'Asus', '', 'category=Màn hình&category2=Asus'),
(35, 12, 'Dell', '', 'category=Màn hình&category2=Dell'),
(36, 13, 'Bàn phím cơ', '', 'category=Bàn phím&category2=Bàn phím cơ'),
(37, 13, 'Bàn phím giả cơ', '', 'category=Bàn phím&category2=Bàn phím giả cơ'),
(38, 14, 'Huntsman Series', '', 'category=Bàn phím&category2=Huntsman Series'),
(39, 14, 'Cynosa Series', '', 'category=Bàn phím&category2=Cynosa Series'),
(40, 15, 'K63 Series', '', 'category=Bàn phím&category2=K63 Series'),
(41, 15, 'K100 Series', '', 'category=Bàn phím&category2=K100 Series'),
(42, 16, 'Logitech', '', 'category=Chuột&category2=Logitech'),
(43, 16, 'Corsair', '', 'category=Chuột&category2=Corsair'),
(44, 17, 'Từ 500 đến 1 triệu', '', 'category=Chuột&price3=500000&price4=1000000'),
(45, 17, 'Dưới 500', '', 'category=Chuột&price1=500000');

-- --------------------------------------------------------

--
-- Table structure for table `galery_products`
--

CREATE TABLE `galery_products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `thumbnail` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fullname`, `email`, `phone_number`, `address`, `order_date`, `status`) VALUES
(215, 1, 'Ngô Xuân Trung', 'xuantrung97tn@gmail.com', '0339747323', 'Thắng Nhất, Vũng Tàu', '2022-03-18 15:34:18', 0),
(220, 159, 'Nguyễn Anh Tài', 'taianh@gmail.com', '09181827', '44 Lê Lai', '2022-03-19 07:28:43', 0),
(225, 164, 'Trường Nguyễn ', 'truongnguyen@gmail.com', '098281728', '88 Nguyễn Thiện Thuật', '2022-03-19 14:00:42', 0),
(226, 165, 'Trọng Tín', 'trongtin@gmail.com', '0891827319', '76 Lê Công Định', '2022-03-19 14:03:11', 0),
(227, 1, 'Ngô Xuân Trung', 'xuantrung97tn@gmail.com', '0339747323', 'Thắng Nhất, Vũng Tàu', '2022-03-23 07:51:11', 0),
(228, 1, 'Ngô Xuân Trung', 'xuantrung97tn@gmail.com', '0339747323', 'Thắng Nhất, Vũng Tàu', '2022-03-23 07:51:43', 0),
(229, 1, 'Ngô Xuân Trung', 'xuantrung97tn@gmail.com', '0339747323', 'Thắng Nhất, Vũng Tàu', '2022-03-23 07:51:45', 0),
(230, 193, 'Nguyễn Văn Thanh', 'vanthanh@gmail.com', '098827182', '79 Lê Lợi', '2022-03-23 07:54:15', 0),
(231, 194, 'Nguyễn Văn Thanh', 'vanthanh@gmail.com', '098827182', '79 Lê Lợi', '2022-03-23 07:54:17', 0),
(232, 195, 'Nguyễn Văn Thanh', 'vanthanh@gmail.com', '098827182', '79 Lê Lợi', '2022-03-23 07:54:19', 0),
(233, 196, 'Nguyễn Văn Thanh', 'vanthanh@gmail.com', '098827182', '79 Lê Lợi', '2022-03-23 07:54:27', 0),
(234, 1, 'Ngô Xuân Trung', 'xuantrung97tn@gmail.com', '0339747323', 'Thắng Nhất, Vũng Tàu', '2022-03-23 08:00:34', 0),
(235, 197, 'Nguyễn Văn Trường', 'vantruong@gmail.com', '0988271272', '88 Lê Hồng Phong', '2022-03-23 08:03:14', 0),
(241, 203, 'Ngô Văn Võ', 'vanvo@gmail.com', '0928181728', '88 Võ Văn Tần', '2022-03-24 16:19:57', 0),
(242, 204, 'Nguyễn Văn Toàn', 'vantoan@gmail.com', '0981726128', '88 Nguyễn Trãi', '2022-03-24 18:31:44', 0),
(243, 2, 'Nguyễn Văn Việt', 'vanviet@gmail.com', '0339777333', 'Phước tỉnh', '2022-06-21 14:00:38', 0),
(244, 1, 'Ngô Xuân Trung', 'xuantrung97tn@gmail.com', '0339747323', 'Thắng Nhất, Vũng Tàu', '2022-06-24 14:06:09', 0),
(245, 1, 'Ngô Xuân Trung', 'xuantrung97tn@gmail.com', '0339747323', 'Thắng Nhất, Vũng Tàu', '2022-06-24 15:11:13', 0),
(246, 206, 'Trung Ngô', 'xuantrung@gmail.com', '0339727131', 'Vũng Tàu', '2022-06-26 10:14:11', 1),
(247, 1, 'Ngô Xuân Trung', 'xuantrung97tn@gmail.com', '0339747323', 'Thắng Nhất, Vũng Tàu', '2022-07-06 18:40:59', 1),
(248, 207, 'Ngô Gia Kiều', 'abcde@gmail.com', '098125151', '78 Lê Lợi', '2022-07-10 19:25:12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `price`, `quantity`) VALUES
(474, 215, 71, 790000, 1),
(475, 215, 3, 21990000, 1),
(476, 215, 16, 27990000, 1),
(487, 220, 5, 22190000, 1),
(493, 225, 71, 790000, 1),
(494, 226, 67, 3960000, 4),
(495, 226, 70, 2990000, 1),
(496, 226, 55, 16140000, 6),
(497, 234, 25, 24990000, 2),
(498, 234, 13, 99990000, 1),
(499, 234, 3, 21990000, 1),
(500, 234, 57, 2490000, 1),
(510, 242, 17, 36990000, 1),
(511, 242, 27, 18190000, 1),
(512, 243, 58, 2490000, 1100000),
(513, 244, 3, 21990000, 1),
(514, 245, 53, 27190000, 1),
(515, 246, 3, 21990000, 3),
(516, 247, 53, 27190000, 1),
(517, 248, 62, 1690000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `sold` int(11) DEFAULT NULL,
  `thumbnail` varchar(500) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `is_trend` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `quantity`, `sold`, `thumbnail`, `description`, `is_trend`) VALUES
(1, 'Laptop Gaming MSI Katana GF66 11UC 676VN', 23490000, 15, 2, NULL, NULL, 2),
(2, 'Laptop Gaming Acer Predator Helios 300 PH315 54 75YD', 39990000, 25, 5, NULL, NULL, 1),
(3, 'Laptop Gaming Acer Aspire 7 A715 42G R6ZR', 21990000, 19, 9, NULL, NULL, 1),
(4, 'Laptop Gaming Asus ROG Strix G15 G513IC HN002T', 25690000, 33, 2, NULL, NULL, 1),
(5, 'Laptop ASUS ZenBook UX325EA KG363T', 22190000, 12, 2, NULL, NULL, 2),
(6, 'Laptop MSI Modern 14 B11MOU 851VN', 13090000, 12, 5, NULL, NULL, 1),
(7, 'Laptop Lenovo IdeaPad 3 15ITL6 82H800M4VN', 12890000, 27, 5, NULL, NULL, 1),
(8, 'Laptop Acer Aspire 3 A315 56 502X', 12890000, 27, 5, NULL, NULL, 1),
(9, 'Laptop Asus TUF Gaming A15 FA506IHR HN019W', 19690000, 25, 3, NULL, NULL, 0),
(10, 'Laptop ASUS TUF Gaming F15 FX506LH HN002T', 19890000, 25, 3, NULL, NULL, 0),
(11, 'Laptop ASUS TUF Gaming F15 FX506LH HN188W', 19990000, 25, 3, NULL, NULL, 0),
(12, 'Laptop Gaming ASUS ROG Zephyrus G15 GA503QS HQ052T', 62990000, 25, 3, NULL, NULL, 0),
(13, 'Laptop Gaming ROG Zephyrus M16 GU603ZX K8025W', 99990000, 25, 3, NULL, NULL, 0),
(14, 'Laptop Gaming Acer Aspire 7 A715 42G R4XX', 17700000, 25, 3, NULL, NULL, 0),
(15, 'Laptop Gaming Acer Aspire 7 A715 42G R05G', 19590000, 25, 3, NULL, NULL, 0),
(16, 'Máy tính xách tay Acer Nitro 5 AN515 58 52SP', 27990000, 25, 3, NULL, NULL, 0),
(17, 'Laptop gaming Acer Nitro 5 AN515 45 R9SC', 36990000, 25, 3, NULL, NULL, 0),
(18, 'Laptop MSI Gaming GF63 10SC 804VN', 18490000, 25, 3, NULL, NULL, 0),
(19, 'Laptop Gaming MSI Katana GF66 11UC 641VN', 26990000, 25, 3, NULL, NULL, 0),
(20, 'Laptop MSI Delta 15 A5EFK 095VN', 45990000, 25, 3, NULL, NULL, 0),
(21, 'GVN Titan M', 8490000, 12, 7, NULL, NULL, 0),
(22, 'GVN Ventus M', 8790000, 12, 7, NULL, NULL, 0),
(23, 'GVN Mystic M', 12390000, 12, 7, NULL, NULL, 0),
(24, 'GVN Ivy M', 13690000, 12, 7, NULL, NULL, 0),
(25, 'GVN Hextech S', 24990000, 12, 7, NULL, NULL, 0),
(26, 'GVN Phantom S', 31290000, 12, 7, NULL, NULL, 0),
(27, 'GVN Ratchet M', 18190000, 12, 7, NULL, NULL, 0),
(28, 'GVN Volibear S', 36390000, 12, 7, NULL, NULL, 0),
(29, 'GVN Garen S', 49290000, 12, 7, NULL, NULL, 0),
(30, 'GVN Darius S', 23590000, 12, 7, NULL, NULL, 0),
(41, 'Màn hình AOC 27G2 27Inch IPS 144Hz Gsync compatible', 5590000, 21, 8, NULL, NULL, 0),
(42, 'Màn hình cong HKC M27G3F 27Inch VA 144Hz', 4700000, 25, 3, NULL, NULL, 0),
(43, 'Màn hình AORUS FI27Q-X Gaming 27Inch IPS 2K 240Hz HDR', 18590000, 25, 3, NULL, NULL, 0),
(44, 'Màn hình cong Huawei MateView GT 34Inch 2K 165Hz', 13990000, 25, 3, NULL, NULL, 0),
(45, 'Màn hình ViewSonic XG270QG 27Inch Nano IPS 2K 165Hz 1ms G-sync Module', 17990000, 25, 3, NULL, NULL, 0),
(46, 'Màn hình ACER VG240Y S 24Inch IPS 165Hz FreeSync', 5990000, 25, 3, NULL, NULL, 0),
(47, 'Màn hình Acer Predator XB273U GS 27Inch IPS 2K 165Hz 0.5ms Gsync', 13690000, 25, 3, NULL, NULL, 0),
(48, 'Màn hình cong Acer XZ272 S 27Inch VA 165Hz FreeSync', 7590000, 25, 3, NULL, NULL, 0),
(49, 'Màn hình cong Acer ED273 27Inch VA 75Hz FreeSync', 5290000, 25, 3, NULL, NULL, 0),
(50, 'Màn hình ASUS ProArt PA278QV 27Inch IPS 2K 75Hz', 9290000, 25, 3, NULL, NULL, 0),
(51, 'Màn hình Asus ROG Swift PG65UQ 65Inch VA 4K 144Hz G-Sync', 170000000, 25, 3, NULL, NULL, 0),
(52, 'Màn hình Dell UltraSharp U2720Q 27Inch IPS 4K', 14490000, 25, 3, NULL, NULL, 0),
(53, 'Màn hình Dell UltraSharp UP3216Q 32Inch IPS UltraHD 4K', 27190000, 23, 5, NULL, NULL, 0),
(54, 'Bàn phím Logitech G610 Orion', 1740000, 25, 3, NULL, NULL, 0),
(55, 'Bàn phím không dây Logitech MX Keys', 2690000, 25, 3, NULL, NULL, 0),
(56, 'Bàn phím không dây Logitech MX Keys Mini - Graphite', 2490000, 25, 3, NULL, NULL, 0),
(57, 'Bàn phím không dây Logitech MX Keys Mini for Mac - Pale Gray', 2490000, 25, 3, NULL, NULL, 0),
(58, 'Bàn phím không dây Logitech POP Keys Blast Yelow', 2490000, -1099975, 1100003, NULL, NULL, 0),
(59, 'Bàn phím Razer Huntsman V2 Analog', 7490000, 25, 3, NULL, NULL, 0),
(60, 'Bàn phím cơ Razer Huntsman Mini Mercury', 3090000, 25, 3, NULL, NULL, 0),
(61, 'Bàn phím Razer Cynosa V2 Chroma', 1590000, 25, 3, NULL, NULL, 0),
(62, 'Razer Level Up Bundle', 1690000, 22, 6, NULL, NULL, 0),
(63, 'Bàn phím Corsair K63 Wireless', 2590000, 25, 3, NULL, NULL, 0),
(64, 'Bàn phím Corsair K63', 1690000, 25, 3, NULL, NULL, 0),
(65, 'Bàn phím cơ Corsair K100 RGB Midnight Gold', 5890000, 25, 3, NULL, NULL, 0),
(66, 'Bàn phím cơ Corsair K100 RGB', 5290000, 25, 3, NULL, NULL, 0),
(67, 'Chuột HyperX Pulsefire Haste RGB', 990000, 56, 20, NULL, NULL, 0),
(68, 'Chuột AKKO AG325 Bilibili', 550000, 56, 5, NULL, NULL, 0),
(69, 'Chuột Logitech MX Master 3 Wireless', 2190000, 24, 5, NULL, NULL, 0),
(70, 'Chuột Logitech G903 Hero Lightspeed Wireless', 2990000, 24, 5, NULL, NULL, 0),
(71, 'Chuột Corsair M55 RGB Pro', 790000, 24, 5, NULL, NULL, 0),
(72, 'Chuột gaming Corsair Harpoon Pro RGB', 430000, 24, 5, NULL, NULL, 0),
(83, 'a', 123, 123, NULL, NULL, NULL, NULL),
(85, 'SANPHAMB', 1200000000, 88, NULL, NULL, NULL, NULL),
(87, 'Laptop Lenovo IdeaPad 3 15ITL05 81X800KRVN', 12000000, 2, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `product_id`, `category_id`) VALUES
(1, 1, 13),
(2, 1, 1),
(3, 2, 1),
(4, 2, 6),
(5, 3, 1),
(6, 3, 6),
(7, 4, 1),
(8, 4, 7),
(9, 5, 1),
(10, 5, 7),
(11, 6, 1),
(12, 6, 13),
(13, 7, 1),
(15, 8, 1),
(16, 8, 6),
(17, 9, 7),
(18, 9, 1),
(19, 10, 1),
(20, 10, 7),
(21, 11, 1),
(22, 11, 7),
(23, 12, 1),
(24, 12, 7),
(25, 13, 1),
(26, 13, 7),
(27, 14, 1),
(28, 14, 6),
(29, 15, 1),
(30, 15, 6),
(31, 16, 1),
(32, 16, 6),
(33, 17, 1),
(34, 17, 6),
(35, 18, 1),
(36, 18, 13),
(37, 19, 1),
(38, 19, 13),
(39, 20, 1),
(40, 20, 13),
(41, 21, 2),
(42, 21, 21),
(43, 22, 2),
(44, 22, 21),
(45, 23, 2),
(46, 23, 21),
(47, 24, 2),
(48, 24, 21),
(49, 25, 2),
(50, 25, 21),
(51, 26, 2),
(52, 26, 21),
(53, 27, 2),
(54, 27, 21),
(55, 28, 2),
(56, 28, 21),
(57, 29, 2),
(58, 29, 21),
(59, 30, 2),
(60, 30, 21),
(83, 41, 2),
(84, 41, 25),
(85, 42, 3),
(86, 42, 26),
(87, 43, 3),
(88, 43, 27),
(89, 44, 3),
(90, 44, 28),
(91, 45, 3),
(92, 45, 24),
(93, 46, 3),
(94, 46, 6),
(95, 47, 3),
(96, 47, 6),
(97, 48, 3),
(98, 48, 6),
(99, 49, 3),
(100, 49, 6),
(101, 50, 3),
(102, 50, 7),
(103, 51, 3),
(104, 51, 7),
(105, 52, 3),
(106, 52, 9),
(107, 53, 3),
(108, 53, 9),
(109, 54, 4),
(110, 54, 10),
(111, 54, 14),
(112, 55, 4),
(113, 55, 10),
(114, 55, 15),
(115, 56, 4),
(116, 56, 10),
(117, 56, 15),
(118, 57, 4),
(119, 57, 10),
(120, 57, 15),
(121, 58, 4),
(122, 58, 10),
(123, 58, 15),
(124, 59, 4),
(125, 59, 12),
(126, 59, 16),
(127, 60, 4),
(128, 60, 12),
(129, 60, 16),
(130, 61, 4),
(131, 61, 12),
(132, 61, 17),
(133, 62, 4),
(134, 62, 12),
(135, 62, 17),
(136, 63, 4),
(137, 63, 11),
(138, 63, 18),
(139, 64, 4),
(140, 64, 11),
(141, 64, 18),
(142, 65, 4),
(143, 65, 11),
(144, 65, 19),
(145, 66, 4),
(146, 66, 11),
(147, 66, 19),
(148, 67, 5),
(149, 68, 5),
(150, 69, 5),
(151, 69, 10),
(152, 70, 5),
(153, 70, 10),
(154, 71, 5),
(155, 71, 11),
(156, 72, 5),
(157, 72, 11),
(169, 7, 20),
(170, 67, 22),
(171, 68, 23),
(227, 87, 20),
(228, 87, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Admin'),
(3, 'Khách'),
(2, 'Người dùng');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `token` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `user_id`, `token`) VALUES
(26, 1, 'e15d6343ae59be7d9852b6caee59088d'),
(27, 1, 'b0674f12ab22afc18c74f25bfc495a61'),
(28, 1, '819ca5d530b38350e3e4212b879cfac7'),
(29, 1, 'fb34ea28a725a7d88cbbe34b816e9119'),
(30, 1, '53c2774f6d43c4359bc23e87b5b939e6'),
(31, 1, 'b535b0265ebd5bd152f3789cbf57ab2a'),
(32, 1, '009bb582bfc92b1502c2dd54294bd3ea'),
(33, 1, '1574680a9911177f6eacc9e6b847c795'),
(34, 1, 'ef74ec9e4ac4df1ae4425c90cf05796b'),
(35, 1, '4630425e17a9be094a81a21f1400d2da'),
(36, 1, 'a5312297fd9de536205a9af019135f05'),
(37, 1, 'e0bbe2f18525c5c1da4f1be526fbfb81'),
(38, 1, '456493773d817c757da1887aa74ff51e'),
(39, 1, 'db917c8b7b7fb473a69a969b15c98240'),
(40, 1, '76a680e157ef17b278f4637c3b8c3740'),
(41, 1, '769a6e717f72c98d1c5c580967146e94'),
(42, 1, '769a6e717f72c98d1c5c580967146e94'),
(43, 1, '5596b92d3b5070c961c2880c0d12ee52'),
(44, 1, '9bb3a7cbd60391c20d1d8300aa6c5ef1'),
(45, 2, '30138c97ab1f4e482c903e5af7ea35c3'),
(46, 1, '81dcadb1f64cfa5c4f70f2896a32c7cf'),
(47, 1, 'ce5f8ae0499acaece2295b944250f548'),
(48, 1, 'aa5ead76ebca35d0a1b9c5f25a508824'),
(49, 1, '202032380fac8055d712555facce90d2'),
(53, 2, 'd7c585c9057deb7c0ab065fcc195075e'),
(54, 1, '7fa5f688e0842226512d129dee163152'),
(55, 1, '7dc9645e851f26ac69f82047535903f1'),
(56, 1, 'b1b930be494f2383621d539bda909331'),
(57, 1, '0a8eb488348816c7b66096f6492b7a91'),
(58, 1, '1607ddbf8b934ec238dec983412a4de9'),
(59, 1, '80b7448b0d5bfe5344bb33553d6c48ca'),
(60, 1, '28713b72f62f22226803efdccc8eb561'),
(61, 1, 'a8ff9b539adb0e9a4ce1c3fcf367523d'),
(62, 1, '45af0d65f676262fb79c215bb6fc0115'),
(63, 1, '45af0d65f676262fb79c215bb6fc0115'),
(64, 1, 'cd0bea0e5f41e60f7424abd3072c5fd9'),
(65, 1, '9f7a4ca314ae82f3535013d09a7cb826'),
(66, 1, 'd6edf105af791286c6d5170e53c5a446'),
(67, 1, 'c60d03c2b5651eac5e6ac5dd7fb6fb95'),
(68, 1, 'c1a803c2fc0d61a57776f589c73efc9d'),
(69, 1, '2f2fc87faffedae12679da8b94c51b7f'),
(70, 1, '2f2fc87faffedae12679da8b94c51b7f'),
(71, 1, 'f29fc81446bfe492c65f8291d865ebad'),
(72, 1, 'd6109e4143e85c796f37fd16cd107ecc'),
(73, 1, 'c1229af2e314277869f224a3e9e102d0'),
(74, 1, '04f9e0f147c3c3ce132046db52d0b424'),
(75, 1, '04f9e0f147c3c3ce132046db52d0b424'),
(76, 1, '732a273a646e9910f27fc49eb414125a'),
(77, 1, '732a273a646e9910f27fc49eb414125a'),
(78, 1, '9fe1b9cb705b7988997030c7767fa52c'),
(79, 1, '9fe1b9cb705b7988997030c7767fa52c'),
(80, 1, '4bc6dc56b5d7ab6d654d8d9c8a0eed52'),
(81, 1, '4bc6dc56b5d7ab6d654d8d9c8a0eed52'),
(82, 1, 'badf0f17bf57c0ddb5bab38f68a06316'),
(83, 1, 'badf0f17bf57c0ddb5bab38f68a06316'),
(84, 1, 'eb09ef4998db71d1a40dc2977739959b'),
(85, 1, 'eb09ef4998db71d1a40dc2977739959b'),
(86, 1, 'a272f45c292bea32d0b51adc048531af'),
(87, 1, '29cb6a6db2057423e5ae4ac547c0c1d8'),
(88, 1, '4a1787baac5703ed22bb451f609ab4fb'),
(89, 1, '9621644328f2b030d5e6ef6acd1b03fb'),
(90, 1, '2a4088732be3c1eafbcec6ff555952d7'),
(91, 1, '2a4088732be3c1eafbcec6ff555952d7'),
(92, 1, '2a4088732be3c1eafbcec6ff555952d7'),
(93, 1, 'b1f2874a4c2d4708814851f030ffb228'),
(94, 1, 'e7b98abfea585677e80e2943545c5b35'),
(95, 1, 'e7b98abfea585677e80e2943545c5b35'),
(96, 1, '15f5d6e9af3a35d87ea5f5897de4e999'),
(97, 1, 'dbea0080d05b51db4119c3e27ff125b6'),
(98, 1, '6f8d641422c4c5651ee1a40751869fee'),
(99, 1, 'b89ec0c43b3ee42e7e62d3b5bd066179'),
(100, 1, '5b7d51c00a0b5230fdcc2a6c9af03a78'),
(101, 1, '5b7d51c00a0b5230fdcc2a6c9af03a78'),
(102, 1, '83d8ca188d97dd7468d8b9736104f5e7'),
(103, 1, '83d8ca188d97dd7468d8b9736104f5e7'),
(104, 1, 'a67e71d97e798ee2c3242053100b4aa1'),
(105, 1, 'a67e71d97e798ee2c3242053100b4aa1'),
(106, 1, 'cda9fb1d60e564790fef0a19bf00f436'),
(107, 1, 'cda9fb1d60e564790fef0a19bf00f436'),
(108, 1, '6b9f7924b366371d3aacff816f4afb7a'),
(109, 1, '6b9f7924b366371d3aacff816f4afb7a'),
(110, 1, '3b69a460fabf4b4815a7952418040fbe'),
(111, 1, 'cd518f749d5400d7237c15cc88da5ed6'),
(112, 1, 'cd518f749d5400d7237c15cc88da5ed6'),
(113, 1, 'cd518f749d5400d7237c15cc88da5ed6'),
(114, 1, '22331467b3927c7551b1f9a652e094a2'),
(115, 1, '22331467b3927c7551b1f9a652e094a2'),
(116, 1, 'e10e8106064409ed22669c626bcee0a6'),
(117, 1, 'e10e8106064409ed22669c626bcee0a6'),
(118, 1, 'b4aab2c4de75ecd0ffebf8ef2ea4a46c'),
(119, 1, 'b4aab2c4de75ecd0ffebf8ef2ea4a46c'),
(120, 1, 'b4aab2c4de75ecd0ffebf8ef2ea4a46c'),
(121, 1, '5aee9f4a5f0394178652916c36c24018'),
(122, 1, 'e50811fb20cecb032ed1c596183f1090'),
(123, 1, '49a90edde3d7a3dc4f54103d572ebc78'),
(124, 1, '49a90edde3d7a3dc4f54103d572ebc78'),
(125, 1, '1fe79c2743825c5edf3834c912b1e08e'),
(126, 1, '1fe79c2743825c5edf3834c912b1e08e'),
(127, 1, '26df3db0a1fa4d3ae9d9db4b971c081a'),
(128, 1, '027342239b758f5debfe0d710ac1faa7'),
(129, 1, 'adb6ec7d1076bba68b9857157a245ae8'),
(130, 1, 'adb6ec7d1076bba68b9857157a245ae8'),
(131, 2, '26d8c0c7f139e0d62b2663d9c879258a'),
(132, 2, '26d8c0c7f139e0d62b2663d9c879258a'),
(133, 1, '7d8b3632c7c731231c82bbddeeeb2df9'),
(134, 1, 'fbeadf837df8f6081a951aa7d77d5d4e'),
(135, 1, 'a1d8a9f96867770f9ca7d72afe697c15'),
(136, 1, 'd5d3059949df21b0df86c9817a7bbdbb'),
(137, 1, 'bfbe8c637378fdbe49c4f9a8147d946a'),
(138, 1, '9f2d34ac376a0aa757a371fd46352ca4'),
(139, 1, '5de17c4539fb321999dc4d2156dd5f71'),
(140, 1, '9ebb824af1694e5b49c63fa3810837cf'),
(141, 1, '26501c74e85fe01699acc190ee8938f9'),
(142, 1, '7390f930ee7ddc3bfe3400b9a568d793'),
(143, 1, '7390f930ee7ddc3bfe3400b9a568d793'),
(144, 205, '4f6daed79264ef19f63217cd45bcdec9'),
(145, 1, '03fb9587ba3b52aa0c580c98ce8606f2'),
(146, 2, 'e045466fb1c0706a8921d5f8588c7662'),
(147, 1, 'd7829a9bebb928e11a5487b41728671f'),
(148, 2, '735734c5837a5153713756b8869e2753'),
(149, 1, 'e8c37bd1aa3716b095f9ccab15a8281a'),
(150, 1, 'e8c37bd1aa3716b095f9ccab15a8281a'),
(151, 1, 'cf3611870100473a3ebf326d0b2155c8'),
(152, 1, 'cf3611870100473a3ebf326d0b2155c8'),
(153, 1, '331d65d7d0f57627ecea593e65372085'),
(154, 1, 'f37ec5229603c07780118d51dd1961b0'),
(155, 1, '101152d6541afd25bd32e9f510436483'),
(156, 1, '101152d6541afd25bd32e9f510436483'),
(157, 1, '7cdfdc71fc429289f8da6efd2fa14bc3'),
(158, 206, '57c268d25bb96b2ec26d874e5c288a66'),
(159, 1, '4ba4250133c1351c634e25e365b254af'),
(160, 1, '4ba4250133c1351c634e25e365b254af'),
(161, 1, 'aede85c2a9c116b70867d1e76a957b16'),
(162, 1, 'aede85c2a9c116b70867d1e76a957b16'),
(163, 1, 'a6d2c0a2af91e4a691c2d33d6a2550f8'),
(164, 1, '087a2f3d0b30e8b38492fa6e3cdc3b40'),
(165, 1, '087a2f3d0b30e8b38492fa6e3cdc3b40'),
(166, 206, 'aa67bd89e92bd79745af31e67a10c0a3'),
(167, 206, 'aa67bd89e92bd79745af31e67a10c0a3'),
(168, 1, 'a2b5fa3f2ba82ed3f4a300c5e84a0a68'),
(169, 1, 'a2b5fa3f2ba82ed3f4a300c5e84a0a68'),
(170, 1, 'e0bd7982b1d776638285bfd232e8d5b9'),
(171, 1, 'e0bd7982b1d776638285bfd232e8d5b9');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `email`, `phone_number`, `address`, `password`, `role_id`) VALUES
(1, 'trungtrung', 'Ngô Xuân Trung', 'xuantrung97tn@gmail.com', '0339747323', 'Thắng Nhất, Vũng Tàu', 'bb13248b221f380d33ecde7adcddb1fe', 1),
(2, 'vanviet', 'Nguyễn Văn Việt', 'vanviet@gmail.com', '0339777333', 'Phước tỉnh', 'e10adc3949ba59abbe56e057f20f883e', 1),
(159, '', 'Nguyễn Anh Tài', 'taianh@gmail.com', '09181827', '44 Lê Lai', 'e10adc3949ba59abbe56e057f20f883e', 3),
(164, '', 'Trường Nguyễn ', 'truongnguyen@gmail.com', '098281728', '88 Nguyễn Thiện Thuật', 'e10adc3949ba59abbe56e057f20f883e', 3),
(165, '', 'Trọng Tín', 'trongtin@gmail.com', '0891827319', '76 Lê Công Định', 'e10adc3949ba59abbe56e057f20f883e', 3),
(187, 'chanhchanh', 'Nguyễn Tài Chánh', 'taichanh@gmail.com', '09871716262', 'phường 12, Vũng Tàu', '8ee4227a53da98e9779f456338594115', 1),
(190, 'vantoan', 'Nguyễn Văn Toàn', 'vantoan@gmail.com', '0970139182', '99 Tiền Cảng', 'd41d8cd98f00b204e9800998ecf8427e', 1),
(193, '', 'Nguyễn Văn Thanh', 'vanthanh@gmail.com', '098827182', '79 Lê Lợi', 'e10adc3949ba59abbe56e057f20f883e', 3),
(194, '', 'Nguyễn Văn Thanh', 'vanthanh@gmail.com', '098827182', '79 Lê Lợi', 'e10adc3949ba59abbe56e057f20f883e', 3),
(195, '', 'Nguyễn Văn Thanh', 'vanthanh@gmail.com', '098827182', '79 Lê Lợi', 'e10adc3949ba59abbe56e057f20f883e', 3),
(196, '', 'Nguyễn Văn Thanh', 'vanthanh@gmail.com', '098827182', '79 Lê Lợi', 'e10adc3949ba59abbe56e057f20f883e', 3),
(197, '', 'Nguyễn Văn Trường', 'vantruong@gmail.com', '0988271272', '88 Lê Hồng Phong', 'e10adc3949ba59abbe56e057f20f883e', 3),
(203, '', 'Ngô Văn Võ', 'vanvo@gmail.com', '0928181728', '88 Võ Văn Tần', 'e10adc3949ba59abbe56e057f20f883e', 3),
(204, '', 'Nguyễn Văn Toàn', 'vantoan@gmail.com', '0981726128', '88 Nguyễn Trãi', 'e10adc3949ba59abbe56e057f20f883e', 3),
(205, 'trungtrung2', 'trung2', '2@gmail.com', '0939023812', 'aa', 'c4ca4238a0b923820dcc509a6f75849b', 2),
(206, 'xuantrung', 'Trung Ngô', 'xuantrung@gmail.com', '0339727131', 'Vũng Tàu', 'bb13248b221f380d33ecde7adcddb1fe', 1),
(207, '', 'Ngô Gia Kiều', 'abcde@gmail.com', '098125151', '78 Lê Lợi', 'e10adc3949ba59abbe56e057f20f883e', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cart_product` (`product_id`),
  ADD KEY `fk_cart_user` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uni_catename` (`name`);

--
-- Indexes for table `client_menu`
--
ALTER TABLE `client_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galery_products`
--
ALTER TABLE `galery_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_galery_product` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_user` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_product` (`product_id`),
  ADD KEY `fk_product_order` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uni_productname` (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cate_product` (`product_id`),
  ADD KEY `fk_product_cate` (`category_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uni_rolename` (`name`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_token_user` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_role` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `client_menu`
--
ALTER TABLE `client_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `galery_products`
--
ALTER TABLE `galery_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=518;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `fk_cart_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `galery_products`
--
ALTER TABLE `galery_products`
  ADD CONSTRAINT `fk_galery_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_order_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_order_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_product_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `fk_cate_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_product_cate` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `fk_token_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
