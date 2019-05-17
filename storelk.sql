-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2019 at 06:32 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `storelk`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image_url` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `category_name`, `description`, `image_url`) VALUES
(1, 'Electronics', NULL, 'https://www.wow.lk/wowdocroot/content/1.3/images/2016/golive/wow-Store/images/cupid3/01-190x190.jpg'),
(2, 'Fashion', NULL, 'https://www.wow.lk/wowdocroot/content/1.3/images/2016/golive/Gflock-Reforest/images/gflockdr01/01-190x190.jpg'),
(3, 'Health and Beauty', NULL, 'https://www.wow.lk/wowdocroot/content/1.3/images/2016/golive/THE-PARFUMERIE-STORE/images/01dgkjh/01-190x190.jpg'),
(4, 'Sports and Fitness', NULL, 'https://www.wow.lk/wowdocroot//content/1.3/images/2016/golive/Quantum-Fitness/images/cvb08/01-190x190.jpg'),
(5, 'Home and Kitchen', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `configuration`
--

CREATE TABLE `configuration` (
  `id_configuration` int(11) NOT NULL,
  `config_key` varchar(255) DEFAULT NULL,
  `config_value` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `configuration`
--

INSERT INTO `configuration` (`id_configuration`, `config_key`, `config_value`) VALUES
(1, 'default_currency', '1');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id_currency` int(11) NOT NULL,
  `currency` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id_currency`, `currency`) VALUES
(1, 'LKR'),
(2, 'USD'),
(3, 'GBP'),
(4, 'INR'),
(5, 'SEK');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id_item` int(11) NOT NULL,
  `item_title` text,
  `item_description` varchar(255) DEFAULT NULL,
  `image_url` text,
  `rating` varchar(255) DEFAULT NULL,
  `ratings_out_of` varchar(255) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `id_sub_category` int(11) NOT NULL,
  `id_promotion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id_item`, `item_title`, `item_description`, `image_url`, `rating`, `ratings_out_of`, `price`, `id_sub_category`, `id_promotion`) VALUES
(1, 'Binoculor', 'Binoculor', 'https://www.wow.lk/wowdocroot//content/1.3/atg/2014/golive/KITE/images/kitee01/01-500x500.jpg', 'x', NULL, '68000.00', 4, 1),
(4, 'JBL', 'JBL', 'https://www.wow.lk/wowdocroot/content/1.3/images/2016/golive/John-Keells-Office-Automation-Pvt-Ltd/images/jblrov05/01-500x500.jpg', NULL, NULL, '6000.00', 6, 2),
(5, 'TV1', 'TV1', 'https://www.wow.lk/wowdocroot//content/1.3/images/2016/golive/wow-Store/images/ntv01-new01/01-500x500.jpg', NULL, NULL, '40000.00', 1, 4),
(6, 'TV2 title', 'This is a HDTV', 'https://www.wow.lk/wowdocroot/content/1.3/images/2016/golive/wow-Store/images/cupid10/01-500x500.jpg\r\n', '3.9', '900', '128000.00', 1, NULL),
(7, 'WachineMachine', 'WachineMachine', 'https://www.wow.lk/wowdocroot/content/1.3/images/2016/golive/AE/images/adilwashm06/01-500x500.jpg', NULL, NULL, '104000.00', 2, 3),
(8, 'WachineMachine2', 'WachineMachine2', 'https://www.wow.lk/wowdocroot/content/1.3/images/2016/golive/AE/images/02lgtoploadingwash/01-500x500.jpg\r\n', NULL, NULL, '100000.00', 2, NULL),
(9, 'Refrigarator1', 'Refrigarator1', 'https://www.wow.lk/wowdocroot/content/1.3/images/2016/golive/AE/images/lgb272lg01/01-500x500.jpg\r\n', NULL, NULL, '120000.00', 3, NULL),
(10, 'Refrigaretor2', 'Refrigaretor2', 'https://www.wow.lk/wowdocroot/content/1.3/images/2016/golive/Browns-Deals/images/03sharp2doorfridge/01-500x500.jpg\r\n', NULL, NULL, '135000.00', 3, 5),
(11, 'Camera2\r\n', 'Camera2\r\n', 'https://www.wow.lk/wowdocroot//content/1.3/images/2016/golive/Camera-Talk/images/cameranwravi01/01-190x190.jpg', NULL, NULL, '75000.00', 4, NULL),
(12, 'tab', 'tab', 'https://www.wow.lk/wowdocroot/content/1.3/images/2016/golive/images/sim2/dialogcarnival01-new/01-500x500.jpg', NULL, NULL, '50000.00', 6, NULL),
(13, 'Treadmill', 'Treadmill', 'https://www.wow.lk/wowdocroot//content/1.3/images/2016/golive/Easyhome/images/ngvb04/01-500x500.jpg', NULL, NULL, '140000.00', 7, NULL),
(14, 'DumbBells', 'DumbBells', 'https://www.wow.lk/wowdocroot/content/1.3/images/2016/golive/Quantum-Fitness/images/quantum4kg04/01-500x500.jpg', NULL, NULL, '3000.00', 7, NULL),
(15, 'Glove', 'Glove', 'https://www.wow.lk/wowdocroot/content/1.3/images/2016/golive/Quantum-Fitness/images/25proformelitetrainingglove/01-500x500.jpg', NULL, NULL, NULL, 8, NULL),
(16, 'Knee Guard\r\n', 'Knee Guard\r\n', 'https://www.wow.lk/wowdocroot//content/1.3/images/2016/golive/JOEREX/images/stors11/01-500x500.jpg\r\n', NULL, NULL, NULL, 8, NULL),
(17, 'Eye Massager', 'Eye Massager', 'http://www.wow.lk/wowdocroot/content/1.3/images/2017/dealtomall/doctor-air-electric-air/01-500x500.jpg', NULL, NULL, NULL, 9, NULL),
(18, 'Shaver\r\n', 'Shaver\r\n', 'https://www.wow.lk/wowdocroot/content/1.3/images/2016/golive/Browns-Deals/images/lovia20-new03/01-500x500.jpg', NULL, NULL, NULL, 9, NULL),
(19, 'Watch', 'Watch', 'https://www.wow.lk/wowdocroot/content/1.3/images/2017/homechanges/carousal/medium2.jpg', NULL, NULL, '12000.00', 6, 1),
(20, 'Google Home', 'Google Home', 'https://www.wow.lk/wowdocroot/content/1.3/images/2016/golive/Gadget-Shop/images/googlehome08/01-500x500.jpg', NULL, NULL, '9000.00', 6, NULL),
(21, 'Water Dispencer', 'Water Dispencer', 'https://www.wow.lk/wowdocroot/content/1.3/images/2016/golive/Wilson-Commodities/images/wil03/01-190x190.jpg', NULL, NULL, '7000.00', 9, NULL),
(22, 'Linen Kurtha', 'Linen Kurtha', 'https://www.wow.lk/wowdocroot/content/1.3/images/2016/golive/Gflock-Reforest/images/gflockdr01/01-190x190.jpg', NULL, NULL, '2252.00', 11, 3),
(23, 'Linen Sleeve Roll Up Top-RF 5906', 'Linen Sleeve Roll Up Top-RF 5906', 'https://www.wow.lk/wowdocroot/content/1.3/images/2016/golive/Gflock-Reforest/images/gflockdr07/01-190x190.jpg', NULL, NULL, '1785.00', 11, NULL),
(24, 'High Low Linen Dress With Rope Belt -R..', 'High Low Linen Dress With Rope Belt -R..', 'https://www.wow.lk/wowdocroot/content/1.3/images/2016/golive/Gflock-Reforest/images/gflockdr02/01-190x190.jpg', NULL, NULL, '2000.00', 11, NULL),
(25, 'dress 1', 'dress 1', 'https://www.wow.lk/wowdocroot/content/1.3/images/2016/golive/Gflock-Reforest/images/gflockdr09/01-190x190.jpg', NULL, NULL, '3000.00', 11, 1),
(26, 'dress 2', 'dress 2', 'https://www.wow.lk/wowdocroot/content/1.3/images/2016/golive/Gflock-Reforest/images/gflockdr03/01-190x190.jpg', NULL, NULL, '4000.00', 11, NULL),
(27, 'dress 3', 'dress 3', 'https://www.wow.lk/wowdocroot/content/1.3/images/2016/golive/Gflock-Reforest/images/gflockdr17/01-190x190.jpg', NULL, NULL, '2000.00', 11, NULL),
(28, 'T-shirt', 'T-shirt', 'https://www.wow.lk/wowdocroot/content/1.3/images/2016/golive/Embark/images/embarvo06/01-190x190.jpg', NULL, NULL, '1800.00', 11, 2),
(29, 'short', 'short', 'https://www.wow.lk/wowdocroot/content/1.3/images/2016/golive/Gflock-Reforest/images/gflockdr19/01-190x190.jpg', NULL, NULL, '1900.00', 11, NULL),
(30, 'Boat', 'Boat', 'https://www.wow.lk/wowdocroot/content/1.3/images/2016/golive/Gflock-Reforest/images/gflockdr04/01-190x190.jpg', NULL, NULL, '2200.00', 11, NULL),
(31, 'sleeve', 'sleeve', 'https://www.wow.lk/wowdocroot/content/1.3/images/2016/golive/Bear-Inc/images/bshirts03-new/01-190x190.jpg', NULL, NULL, '3000.00', 12, NULL),
(32, 't_shirt 1', 't_shirt 1', 'https://www.wow.lk/wowdocroot/content/1.3/images/2016/golive/Bear-Inc/images/tshirts06-new/01-190x190.jpg', NULL, NULL, '2000.00', 12, NULL),
(33, 't-shirt-em', 't-shirt-em', 'https://www.wow.lk/wowdocroot/content/1.3/images/2016/golive/Embark/images/embarov05/01-190x190.jpg', NULL, NULL, '2500.00', 12, 5),
(34, 't-shirt 2', 't-shirt 2', 'https://www.wow.lk/wowdocroot/content/1.3/images/2016/golive/Bear-Inc/images/bears06-new/01-190x190.jpg', NULL, NULL, '1200.00', 12, NULL),
(35, 'socks', 'socks', 'https://www.wow.lk/wowdocroot/content/1.3/images/2016/golive/Bear-Inc/images/bearproduct02-new/01-190x190.jpg', NULL, NULL, '800.00', 12, NULL),
(36, 'Hand_Bag', 'Hand_Bag', 'https://www.wow.lk/wowdocroot/content/1.3/images/2016/golive/Lakshine-Fashions/images/handlakshine02/01-190x190.jpg', NULL, NULL, '4000.00', 11, NULL),
(37, 'Slippers', 'Slippers', 'https://www.wow.lk/wowdocroot/content/1.3/images/2016/golive/Embark/images/embarvo15/01-190x190.jpg', NULL, NULL, '700.00', 12, NULL),
(38, 'polo', 'polo', 'https://www.wow.lk/wowdocroot/content/1.3/images/2016/golive/Bear-Inc/images/baproducts03-new/01-190x190.jpg', NULL, NULL, '4000.00', 12, 7),
(39, 'boxer', 'boxer', 'https://www.wow.lk/wowdocroot/content/1.3/images/2016/golive/Bear-Inc/images/bearproduct07-new/01-190x190.jpg', NULL, NULL, '600.00', 12, NULL),
(40, 't-shirt 3', 't-shirt 3', 'https://www.wow.lk/wowdocroot/content/1.3/images/2016/golive/Bear-Inc/images/bearts02-new/01-190x190.jpg', NULL, NULL, '900.00', 12, NULL),
(41, 't-Shirt-sriLankan', 't-Shirt-sriLankan', 'https://www.wow.lk/wowdocroot//content/1.3/images/2016/golive/Dialog/images/diorept01/01-190x190.jpg', NULL, NULL, '2000.00', 12, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item_photo`
--

CREATE TABLE `item_photo` (
  `id_item_photo` int(11) NOT NULL,
  `id_item` int(11) DEFAULT NULL,
  `photo_url` text,
  `is_shown` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `logged_in_timestamp` datetime DEFAULT NULL,
  `logged_out_timestamp` datetime DEFAULT NULL,
  `login_csrf` text,
  `login_token` text
) ENGINE=InnoDB AVG_ROW_LENGTH=5461 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `id_user`, `logged_in_timestamp`, `logged_out_timestamp`, `login_csrf`, `login_token`) VALUES
(1, 2, '2019-05-08 20:04:11', NULL, '36caa8f1747a5dcaeb9bb2f3fe11b49c5785dfcd', '1557326051_2');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `id_promotion` int(11) NOT NULL,
  `promo_text` varchar(255) DEFAULT NULL,
  `promo_color` varchar(255) DEFAULT NULL,
  `action` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`id_promotion`, `promo_text`, `promo_color`, `action`) VALUES
(1, '30% Off', '#6f92b2', '0.30'),
(2, 'New', '#99DDC8', NULL),
(3, 'Sale', '#ff9a00', NULL),
(4, '50% Off', '#6f92b2', '0.50'),
(5, 'Sold Out', '#f96363', NULL),
(6, '15% Off', '#f9ee44', '0.15'),
(7, 'Coming Soon', '#f9ee00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role_name`, `description`) VALUES
(1, 'Administrator', NULL),
(2, 'Manager', NULL),
(3, 'Staff', NULL),
(4, 'User', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id_sub_category` int(11) NOT NULL,
  `sub_category_name` varchar(255) DEFAULT NULL,
  `description` text,
  `id_category` int(11) NOT NULL,
  `image_url` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id_sub_category`, `sub_category_name`, `description`, `id_category`, `image_url`) VALUES
(1, 'Televisions', NULL, 1, NULL),
(2, 'Washing Machines', NULL, 1, NULL),
(3, 'Refrigerators', NULL, 1, NULL),
(4, 'Cameras', NULL, 1, NULL),
(5, 'Bedding and Bath', NULL, 5, NULL),
(6, 'Electricals', NULL, 5, NULL),
(7, 'Sports Clothing', NULL, 4, NULL),
(8, 'Fitness Equipment', NULL, 4, NULL),
(9, 'Personal Care', NULL, 3, NULL),
(10, 'Makeup', NULL, 3, NULL),
(11, 'Women\'s Accessories', NULL, 2, NULL),
(12, 'Men\'s Clothing', NULL, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id_user_details` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` text,
  `salt` text,
  `id_role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id_user_details`, `first_name`, `last_name`, `email`, `mobile`, `address`, `username`, `password`, `salt`, `id_role`) VALUES
(1, 'Test', 'Surname', 'testuser@gmail.com', '0714412155', 'Test Address', 'testuser1', 'd2e7b02b2649ad9e76800831e6122c7ca5d300e551602769ce3d0a36a2e29ca8', 'wLg3DTfZ34', 1),
(2, 'Nirash', 'Perera', 'nirashdperera@gmail.com', '112458563', NULL, 'nirash', 'cc691bf70edc5955d179bfff3221e52d138f488de7f7a957c1ad49079c78bb63', '9c05729d', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `configuration`
--
ALTER TABLE `configuration`
  ADD PRIMARY KEY (`id_configuration`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id_currency`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `FK_item_sub_category_id_sub_category` (`id_sub_category`);

--
-- Indexes for table `item_photo`
--
ALTER TABLE `item_photo`
  ADD PRIMARY KEY (`id_item_photo`),
  ADD KEY `FK_item_photo_item_id_item` (`id_item`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`),
  ADD KEY `FK_login_user_details_id_user_details` (`id_user`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id_promotion`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id_sub_category`),
  ADD KEY `FK_sub_category_category_id_category` (`id_category`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id_user_details`),
  ADD KEY `FK_user_details_role_id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `configuration`
--
ALTER TABLE `configuration`
  MODIFY `id_configuration` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id_currency` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `item_photo`
--
ALTER TABLE `item_photo`
  MODIFY `id_item_photo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id_promotion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id_sub_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id_user_details` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `FK_item_sub_category_id_sub_category` FOREIGN KEY (`id_sub_category`) REFERENCES `sub_category` (`id_sub_category`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `item_photo`
--
ALTER TABLE `item_photo`
  ADD CONSTRAINT `FK_item_photo_item_id_item` FOREIGN KEY (`id_item`) REFERENCES `item` (`id_item`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `FK_login_user_details_id_user_details` FOREIGN KEY (`id_user`) REFERENCES `user_details` (`id_user_details`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `FK_sub_category_category_id_category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `FK_user_details_role_id_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
