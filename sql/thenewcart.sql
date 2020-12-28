-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2020 at 11:04 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thenewcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `cashout`
--

CREATE TABLE `cashout` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `pic` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cashout`
--

INSERT INTO `cashout` (`id`, `order_id`, `status_id`, `pic`, `date`) VALUES
(1, 1, 1, '16.jpg', '2020-11-21 04:44:37'),
(2, 2, 1, '3.jpg', '2020-11-21 04:44:40'),
(3, 3, 1, '5.jpg', '2020-11-21 07:07:50'),
(4, 4, 1, '17.jpg', '2020-11-21 07:08:03'),
(5, 12, 1, '22s333.jpg', '2020-11-26 02:56:36');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `catId` int(11) NOT NULL,
  `catName` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `catPic` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catId`, `catName`, `catPic`) VALUES
(1, 'Jamie', '123250664_1227204654339745_2599508899323861422_n.jpg'),
(2, 'HAWAII FIVE-O', '123538849_3923495890997042_3560254465883702779_n.jpg'),
(3, 'MIAMI VICE', 'MIAMI VICE2.jpg'),
(4, 'SERENA', 'SERENA2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `linetoken`
--

CREATE TABLE `linetoken` (
  `id` int(11) NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_token` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `linetoken`
--

INSERT INTO `linetoken` (`id`, `token`, `date_token`) VALUES
(1, 'pafntcF5D8ZSuPqGPwMwcd6UFJNJyLDNxgOBvcKr0CJ', '2020-11-26 02:53:08');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `cust_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status_id` int(2) NOT NULL,
  `report_id` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_date`, `cust_id`, `status_id`, `report_id`) VALUES
(12, '2020-11-26 09:55:13', '4', 1, '2011-26-0011'),
(11, '2020-11-24 21:38:15', '4', 0, '2011-24-0000');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_detail_quantity` tinyint(4) NOT NULL,
  `order_detail_price` decimal(10,2) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `status_process_id` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_detail_quantity`, `order_detail_price`, `product_id`, `order_id`, `status_process_id`) VALUES
(21, 3, '6900.00', 5, 12, 0),
(20, 1, '5000.00', 1, 12, 0),
(19, 2, '6900.00', 5, 11, 0),
(18, 1, '5000.00', 1, 11, 0);

-- --------------------------------------------------------

--
-- Table structure for table `productdata`
--

CREATE TABLE `productdata` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `pdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_code` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `product_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `product_desc` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `product_img_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `qty` int(255) NOT NULL,
  `catId` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `dateadd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_desc`, `product_img_name`, `product_price`, `qty`, `catId`, `dateadd`, `status_id`) VALUES
(1, 'P01', 'F41 HAWAII FIVE-O', 'ของมือ2 สภาพดี 93% มีTagครบ ไม่ปั้มR ทรงใหม่ ✅ ผ้าสีน้ำเงิน สกรีนขาว ไส้น้ำเงิน ผ้าหนา มันๆ', 'hawaii1.jpg', '5000.00', 49, '2', '2020-11-26 02:55:13', 0),
(2, 'P02', 'F41 HAWAII FIVE-O', 'ของมือ1 ใหม่100% Tagห้อย ไม่ปั้มR ทรงใหม่ ✅ ผ้าสีฟ้า สกรีนขาว ไส้ฟ้า ผ้าหนา ด้านๆ ขายราคา 7500 บาท ', 'hawaii2.jpg', '7500.00', -17, '2', '2020-11-23 09:02:32', 0),
(3, 'P03', 'F41 HAWAII FIVE-O', 'ของมือ1 ใหม่100% Tagห้อย ไม่ปั้มR ทรงใหม่ ✅ ผ้าสีฟ้า สกรีนขาว ไส้ฟ้า ผ้าหนา ด้านๆ ขายราคา 7500 บาท', 'hawaii5.jpg', '7500.00', -6, '2', '2020-11-23 09:02:32', 0),
(4, 'P04', 'F153 JAMIE', '✅ ของมือ1 ใหม่ 100% Tagห้อย ไม่ปั้มR ✅ ผ้าปริ้นส์สีดำเขียว ผ้าหนาๆ มันๆ ขาย ราคา 6400 บาท', 'JAMIE1.jpg', '6400.00', -8, '1', '2020-11-21 03:45:35', 0),
(5, 'P05', ' F153 JAMIE ', '✅ ของมือ1 ใหม่ 100% Tagห้อย ไม่ปั้มR ✅ ผ้าปริ้นส์สีฟ้าน้ำเงิน ผ้าหนาๆ มันๆ', 'JAMIE2.jpg', '6900.00', 92, '1', '2020-11-26 02:55:13', 0),
(6, 'P06', 'F153 JAMIE', '✅ ของมือ2 สภาพใหม่ 95% มี Tagครบ ไม่ปั้มR ✅ ผ้าสีบรอนซ์เทา สกรีนดำ ผ้าหนาๆ มันๆ มุมไม่มีถลอก ขอบยาง', 'JAMIE3.jpg', '4900.00', 0, '1', '2020-11-21 04:20:53', 0),
(7, 'P07', 'F52 MIAMI VICE', 'ผ้าสีน้ำเงิน สกรีนขาว ผ้าหนามาก มันๆ ✅ ของมือ1 ใหม่100% มีtagห้อย ✅ ตัวหนังสือมาเต็มๆ หายาก สะอาด', 'MIAMI VICE1.jpg', '5500.00', 0, '3', '2020-11-09 06:22:35', 0),
(8, 'P08', 'F52 MIAMI VICE', '✅ ผ้าสีเขียว สกรีนแดง เหลือง ผ้าหนา มันๆ ✅ ของมือ1 ใหม่100% มีtagห้อย ✅ สีRASTA หายากมากกกกกกก', 'MIAMI VICE2.jpg', '5400.00', 0, '3', '2020-11-09 06:23:33', 0),
(9, 'P09', 'F52 MIAMI VICE', '✅ ผ้าสีแดงล้วน ผ้าหนา มันๆ ✅ ของมือ1 ใหม่100% มีtagห้อย ✅ สีแดง แรงดี สดสด สะอาดๆ', 'MIAMI VICE3.jpg', '4300.00', 0, '3', '2020-11-09 06:24:23', 0),
(10, 'P10', 'F52 MIAMI VICE', '✅ ผ้าสีขาวล้วน ผ้าหนา ด้านๆ ✅ ของมือ1 ใหม่100% มีtagห้อย ✅ สีขาวล้วนหายาก ผ้าไม่สะอาดมาก', 'MIAMI VICE4.jpg', '5200.00', 0, '3', '2020-11-09 06:24:50', 0),
(11, 'P11', 'F06 SERENA', '✅ ผ้าสีส้มแดง สกรีนขาว ซิปขาว ผ้าหนา ด้านๆ ✅ ของมือ1 ใหม่100% ตัวหนังสือมาเต็ม ????????ขายราคา 2200 บาท', 'SERENA1.jpg', '2200.00', 0, '4', '2020-11-09 06:28:50', 0),
(13, 'P12', 'F06 SERENA', '✅ ผ้าสีน้ำเงิน สกรีนเหลือง ซิปน้ำเงิน ผ้าหนา มันๆ ✅ ของมือ1 ใหม่100% ตัวหนังสือมาเต็ม หายาก', 'SERENA2.jpg', '2300.00', 0, '4', '2020-11-09 06:31:17', 0),
(14, 'P13', 'F06 SERENA', '✅ ผ้าสีขาว สกรีนน้ำเงิน ซิปน้ำเงิน ผ้าหนา มันๆ ✅ ของมือ1 ใหม่100% ตัวหนังสือมาเต็ม มีจุดด้วย', 'SERENA3.jpg', '2300.00', 0, '4', '2020-11-09 06:32:17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `status_cash`
--

CREATE TABLE `status_cash` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status_cash`
--

INSERT INTO `status_cash` (`status_id`, `status_name`, `color`) VALUES
(0, 'ยังไม่ได้ชำระ', '#FF4242'),
(1, 'ชำระเงินแล้ว', '#6AFF42');

-- --------------------------------------------------------

--
-- Table structure for table `status_process`
--

CREATE TABLE `status_process` (
  `status_process_id` int(11) NOT NULL,
  `status_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(8) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status_process`
--

INSERT INTO `status_process` (`status_process_id`, `status_name`, `color`) VALUES
(1, 'กำลังดำเนินการ', '#FFCC66'),
(2, 'ดำเนินการเสร็จสิ้น', '#FF6666');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `useremail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `custaddr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `fullname`, `username`, `useremail`, `custaddr`, `password`, `regdate`, `role_id`) VALUES
(4, 'admin', 'admin', 'admin@akara.co.th', '17/3 ม.2 ต.สวนหย่อม อ.กระสัง จ.ศรีสระเกตุ', 'e10adc3949ba59abbe56e057f20f883e', '2020-11-09 08:25:12', 1),
(11, 'test', 'test', 'natee@gmail.com', '17/3 ม.2 ต.สวนหย่อม อ.กระสัง จ.ศรีสระเกตุ', 'e10adc3949ba59abbe56e057f20f883e', '2020-11-09 08:25:10', 0),
(19, 'testadd', 'testadd', 'testadd@gmail.com', '17/3 ม.2 ต.สวนหย่อม อ.กระสัง จ.ศรีสระเกตุ', 'e10adc3949ba59abbe56e057f20f883e', '2020-11-09 08:25:08', 0),
(22, 'asdfasdf', 'asdfasdf', 'asdfasdf@gmail.com', 'จ.สระแก้ว อ.เมือง ต.ชัยโย 14560 0975214513', 'e10adc3949ba59abbe56e057f20f883e', '2020-11-23 06:48:34', 0),
(23, 'noppakun pongthai', 'admin4', 'npolpoy2539@gmail.com', 'nkbkb', '25f9e794323b453885f5181f1b624d0b', '2020-11-24 12:15:07', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cashout`
--
ALTER TABLE `cashout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `linetoken`
--
ALTER TABLE `linetoken`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productdata`
--
ALTER TABLE `productdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_cash`
--
ALTER TABLE `status_cash`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `status_process`
--
ALTER TABLE `status_process`
  ADD PRIMARY KEY (`status_process_id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cashout`
--
ALTER TABLE `cashout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `linetoken`
--
ALTER TABLE `linetoken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `productdata`
--
ALTER TABLE `productdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `status_cash`
--
ALTER TABLE `status_cash`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status_process`
--
ALTER TABLE `status_process`
  MODIFY `status_process_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
