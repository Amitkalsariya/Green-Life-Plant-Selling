-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2025 at 01:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `glife`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'ami@gmail.com', '2113'),
(2, 'group13@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `c_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_price` bigint(20) NOT NULL,
  `u_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`c_id`, `p_id`, `p_price`, `u_id`, `qty`, `status`) VALUES
(46, 1, 200, 19, 1, 0),
(47, 3, 100, 19, 1, 0),
(48, 5, 1200, 19, 1, 0),
(49, 5, 1200, 21, 6, 1),
(50, 6, 400, 21, 3, 1),
(51, 9, 800, 21, 8, 1),
(52, 7, 500, 22, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(10) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `emailid` varchar(100) NOT NULL,
  `phonenumber` int(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` varchar(8) NOT NULL,
  `order_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `firstname`, `lastname`, `emailid`, `phonenumber`, `address`, `city`, `state`, `zip`, `order_id`) VALUES
(7, 'Nimit', 'K', 'nimit@gmail.com', 1234567890, 'testing', 'test', 'test', '12345678', 'kL7y4Jo7aj6wPxmS'),
(8, 'Amii', 'K', 'amii@gmail.com', 1234567890, 'testing', 'test', 'test', '12345678', 'jBWMVX6qBrZPFdqz'),
(11, 'Amit', 'Kalsariya', 'amit@gmail.com', 2147483647, 'Surat', 'Surat', 'Surat', '395004', 'XJU0VC4QwhgR1rBA'),
(12, 'Amit', 'ricky', 's@gmaqil.com', 54854858, 'ukgyvu', 'ugvuy', 'vg', 'uyvuybv', 'y8D3L4bKdqjXfXmP'),
(13, 'zcd', 'asdad', '', 0, '', '', '', '', 'SSAOUhqj0MZ5swc'),
(14, 'zcd', 'asdad', '', 0, '', '', '', '', 'w3hXBCEev5qAq0yQ'),
(15, '', '', '', 0, '', '', '', '', 'pay_QE9DJIxJdC7yGq'),
(16, 'gtdg', 'safc', '', 0, '', '', '', '', 'KhXWy2sMSlQauhd1'),
(17, 'Nemu', 'asdad', 's@gmaqil.com', 2147483647, 'Ambika', 'Surat', 'Gujarat', 'sdgsd', 'pay_QEATRQXgvVk9gL'),
(18, 'sada', 'dsfsfs', 's@gmaqil.com', 2147483647, 'Ambika', 'Surat', 'Gujarat', '395004', 'pay_QEAZXwlnTBfry9'),
(19, 'Jack', 'Reacher', 'reacher@gmail.com', 2147483647, 'Surat', 'Surat', 'Gujarat', '395006', 'pay_QEAsMgqzc7o8Hs'),
(20, '', '', '', 0, '', '', '', '', 'COD-1743666963'),
(21, 'etrf', 'tsrdg', 's@gmaqil.com', 2147483647, 'aSD', 'asd', 'adS', 'C', 'COD-1743667494'),
(22, '', '', '', 0, '', '', '', '', 'COD'),
(23, 'Nemu', 'asdad', 'morty@gmail.com', 2147483647, 'aSD', 'Surat', 'Gujarat', '395006', 'COD'),
(24, '', '', '', 0, '', '', '', '', 'COD'),
(25, '', '', '', 0, '', '', '', '', 'pay_QEWK1hkaQad4ic'),
(26, 'Muinna', 'MBBS', 'munna@gmail.com', 2147483647, 'Mumbai', 'Surat', 'Suraty', '85006', 'COD'),
(27, 'Muinna', 'MBBS', 'munna@gmail.com', 2147483647, 'Mumbai', 'Surat', 'Suraty', '85006', 'pay_QEWNKqFqJNGLK7'),
(28, 'BHurii', 'MBBS', 'munna@gmail.com', 2147483647, 'Mumbai', 'Surat', 'Suraty', '85006', 'pay_QEWStbxTwxTnxI'),
(29, 'Jwtho', 'Gada', 'jetha@gmail.com', 2147483647, 'Mumbai', 'Surat', 'Guj', '390055', 'COD'),
(30, 'Jwtho', 'Gada', 'jetha@gmail.com', 2147483647, 'Mumbai', 'Surat', 'Guj', '390055', 'pay_QEWX4DFmpTCVPO'),
(31, 'Jwtho', 'Gada', 'jetha@gmail.com', 2147483647, 'Mumbai', 'Surat', 'Guj', '390055', 'COD_766032'),
(32, '', '', '', 0, '', '', '', '', 'COD_67700'),
(33, 'Jack', 'Reacher', 'jack@gmail.com', 2147483647, 'London', 'L', 'L', '890065', 'COD_513880');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `C_id` int(11) NOT NULL,
  `Post_id` int(11) DEFAULT NULL,
  `R_id` int(11) DEFAULT NULL,
  `Text` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`C_id`, `Post_id`, `R_id`, `Text`, `Date`, `Time`) VALUES
(24, 30, 19, 'best colour', '2024-09-27', '09:50:48'),
(25, 29, 19, 'dgtrt ret rt', '2024-09-27', '09:52:41'),
(26, 29, 19, 'esffgg', '2024-09-27', '09:52:56'),
(29, 31, 20, 'Improve Reponse Time', '2025-03-03', '18:05:29'),
(30, 32, 34, 'Nurture nature, embrace green – a better life begi', '2025-04-03', '15:01:14');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `fq_id` int(11) NOT NULL,
  `fq_type` enum('order related','plant related') NOT NULL DEFAULT 'order related',
  `Question` varchar(80) NOT NULL,
  `Answer` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`fq_id`, `fq_type`, `Question`, `Answer`) VALUES
(38, 'order related', 'Which Payment Method Will be Work Smoothly ?', 'Razorpay Is The One of The Best Online P'),
(39, 'plant related', 'Which Plants are selling on our platform', 'Seeds, Magical Seeds , Plants and etc');

-- --------------------------------------------------------

--
-- Table structure for table `plant_details`
--

CREATE TABLE `plant_details` (
  `Plant_id` int(11) NOT NULL,
  `Plant_image` varchar(50) NOT NULL,
  `Type_name` varchar(40) NOT NULL,
  `Date` text NOT NULL,
  `Time` text NOT NULL,
  `Ptype_id` int(11) NOT NULL,
  `Plant_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plant_details`
--

INSERT INTO `plant_details` (`Plant_id`, `Plant_image`, `Type_name`, `Date`, `Time`, `Ptype_id`, `Plant_name`) VALUES
(7, '44781727434267o8.jpg', 'Office Design', '2024-09-27', '16:21:07', 0, 'snake plant'),
(8, '13891727434740h1.jpg', 'Home Design', '2024-09-27', '16:29:00', 0, 'best home decor'),
(9, '25651727434769h2.jfif', 'Home Design', '2024-09-27', '16:29:29', 0, 'balcony flower'),
(10, '87171727434796h3.jfif', 'Home Design', '2024-09-27', '16:29:56', 0, 'wall decor'),
(11, '22131727434825h4.jpg', 'Home Design', '2024-09-27', '16:30:25', 0, 'relling decor'),
(12, '51551727434924g4.jfif', 'Garden', '2024-09-27', '16:32:04', 0, 'red flower outdoor'),
(13, '51481727434949g2.jfif', 'Garden', '2024-09-27', '16:32:29', 0, 'green flower'),
(16, '3648174099055118971727357367f2.jfif', 'Garden', '2025-03-03', '13:59:11', 0, 'Delicious'),
(17, '62451743673951459617273576751.jfif', 'Office Design', '2025-04-03', '15:22:31', 0, 'Best Design Decoration');

-- --------------------------------------------------------

--
-- Table structure for table `plant_type`
--

CREATE TABLE `plant_type` (
  `Ptype_id` int(11) NOT NULL,
  `Type_name` char(20) NOT NULL,
  `Description` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plant_type`
--

INSERT INTO `plant_type` (`Ptype_id`, `Type_name`, `Description`) VALUES
(2, 'Garden', ''),
(3, 'Office Design', ''),
(4, 'Home Design', '');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `Post_id` int(11) NOT NULL,
  `R_id` int(11) DEFAULT NULL,
  `Post_image` char(50) NOT NULL,
  `Caption` char(50) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`Post_id`, `R_id`, `Post_image`, `Caption`, `Date`, `Time`) VALUES
(29, 19, '123.png', 'best plant', '2024-09-27', '09:30:33'),
(30, 19, '4.jfif', 'beautiful flower', '2024-09-27', '09:33:09'),
(32, 34, 'Group-no_13.jpeg', 'This project is Developed By Gruop NO 13', '2025-04-03', '14:59:53');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Prod_id` int(11) NOT NULL,
  `Prod_name` char(20) NOT NULL,
  `Prod_image` char(50) NOT NULL,
  `Prod_description` char(40) NOT NULL,
  `Prod_price` float NOT NULL,
  `prod_qt` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Pc_id` int(11) DEFAULT NULL,
  `S_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Prod_id`, `Prod_name`, `Prod_image`, `Prod_description`, `Prod_price`, `prod_qt`, `Date`, `Time`, `Pc_id`, `S_id`) VALUES
(1, 'Garden weeders', '29661727433231merigold2.jpg', 'This is a Garden weeder Use for Garden', 788, 9, '2024-09-24', '19:19:30', 1, NULL),
(5, 'Pot', '23121727432952por1.jpg', 'This pot is best for flower', 1200, 5, '2024-09-27', '15:59:12', 3, NULL),
(6, 'Tomato seeds', 'f3.jfif', 'This seeds are best for Tomatos', 500, 6, '2024-09-27', '16:00:14', 4, NULL),
(7, 'sunflower', '50661727433078sun2.jpg', 'sunflowers are useful plants with large', 500, 5, '2024-09-27', '16:01:18', 2, NULL),
(8, 'Hibiscus', '30111727433173hibiscus1.jpg', 'lowering your blood pressure,stabilizin', 200, 5, '2024-09-27', '16:02:53', 2, NULL),
(9, 'Merigolds', 'diy-organic-candle.jpg', 'The bloom itself symbolizes beautys', 900, 5, '2024-09-27', '16:03:51', 1, NULL),
(10, 'Lily', '12881727433313lily.jpg', 'The inhalation of fragrance from certain', 450, 8, '2024-09-27', '16:05:13', 2, NULL),
(11, 'designer port', '67601727433869pot.jpg', 'best design', 200, 2, '2024-09-27', '16:14:29', 3, NULL),
(15, 'Fsn', '36771743394506pexels-photo-3685647.jpeg', 'This is Realastic', 3000, 2, '2025-03-31', '09:45:06', 2, NULL),
(16, 'Magical Seeds', '72251743674103856217272696233.jfif', 'This is Magical Seeds', 500, 1, '2025-04-03', '15:25:03', 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `Pc_id` int(11) NOT NULL,
  `Pc_name` char(20) NOT NULL,
  `Pc_description` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`Pc_id`, `Pc_name`, `Pc_description`) VALUES
(1, 'Tool', 'This is a Tools Sections                '),
(2, 'Plant', 'This is a Plant Section.'),
(3, 'Pots', 'This is a Pots Section.'),
(4, 'Seeds', 'This is a Seeds Section.                '),
(5, 'Trees', 'This is a Trees Section                 '),
(10, 'Magical Beats', 'One of Our Special item ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `R_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` char(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` enum('Surat','Bardoli','Navsari','Vadodara','Ahemdabad') DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `password` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_data` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`R_id`, `name`, `email`, `contact`, `address`, `city`, `date`, `time`, `password`, `image_name`, `image_data`) VALUES
(20, 'Amit', 'amii@gmail.com', '8576425968', '12321ewe fgdfg', 'Surat', '0000-00-00', '00:00:00', '123', 'profile.png', ''),
(23, 'Rutvik', 'r@gmail.com', '8956239856', 'Amroli Surat', 'Surat', '0000-00-00', '00:00:00', '123456', '123456', ''),
(30, 'Jay', 'j@gmail.com', '8745219896', 'Surat', 'Surat', '0000-00-00', '00:00:00', '112233', 'fixer.png', ''),
(34, 'BCA SEM 6 PROJECT', 'group13@gmail.com', '9876543211', 'Amroli', 'Surat', '0000-00-00', '00:00:00', '123456', 'Group-no_13.jpeg', ''),
(35, 'Henil', 'h@gmail.com', '8745219896', 'Surat', 'Surat', '0000-00-00', '00:00:00', '112233', 'fixer.png', ''),
(36, 'Meet', 'm13@gmail.com', '9876543211', 'Amroli', 'Surat', '0000-00-00', '00:00:00', '123456', 'Group-no_13.jpeg', ''),
(37, 'Chirag', 'c@gmail.com', '9876543211', 'Amroli', 'Surat', '0000-00-00', '00:00:00', '123456', 'Group-no_13.jpeg', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`C_id`),
  ADD KEY `Post_id` (`Post_id`),
  ADD KEY `R_id` (`R_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`fq_id`);

--
-- Indexes for table `plant_details`
--
ALTER TABLE `plant_details`
  ADD PRIMARY KEY (`Plant_id`);

--
-- Indexes for table `plant_type`
--
ALTER TABLE `plant_type`
  ADD PRIMARY KEY (`Ptype_id`),
  ADD UNIQUE KEY `Type_name` (`Type_name`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`Post_id`),
  ADD KEY `R_id` (`R_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Prod_id`),
  ADD KEY `S_id` (`S_id`),
  ADD KEY `Pc_id` (`Pc_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`Pc_id`),
  ADD UNIQUE KEY `Pc_name` (`Pc_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`R_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `C_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `fq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `plant_details`
--
ALTER TABLE `plant_details`
  MODIFY `Plant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `plant_type`
--
ALTER TABLE `plant_type`
  MODIFY `Ptype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `Post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `Pc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `R_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
