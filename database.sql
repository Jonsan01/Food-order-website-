-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 06, 2022 at 04:24 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: ``
--

-- --------------------------------------------------------

--
-- Table structure for table `address_details`
--

CREATE TABLE `address_details` (
  `email` varchar(30) NOT NULL,
  `fname` varchar(10) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `aline` varchar(100) NOT NULL,
  `pincode` int(6) NOT NULL,
  `number` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address_details`
--

INSERT INTO `address_details` (`email`, `fname`, `lname`, `aline`, `pincode`, `number`) VALUES
('devganiyajonsan1@gmail.com', 'Jonsan', 'Devganiya', 'hdbhbjn, gvfdhgs, gvdhgs', 395004, 63),
('devganiyajonsan3@gmail.com', 'Jonsan', 'Devganiya', 'shsbh hjbdsh hbshdb, Surat, GUJARAT', 399999, 6353626833),
('devganiyajonsan6@gmail.com', 'Jonsan', 'Devganiya', 'ghevcghv, yufvdsty, aygvdsyu', 555555, 6667676666),
('devganiyajonsan71@gmail.com', 'Jonsan', 'Devganiya', '37, XYZ Sco, Katargam, Surat, Gujrat', 395004, 643782347),
('devganiyajonsan7@gmail.com', 'dnbsj', 'hfbd', 'ryegdtys, rhvbehgsz, erhbdsgh', 323233, 6464566677),
('dsevganiyajonsan@gmail.com', 'jonsan', 'devagiya', 'hjvsgh, ghvvghsv, bhhbhbh', 567890, 4568908766),
('hiten@gmail.com', 'ffrr', 'r4fr4', ' bggt, frfvr, frgvt', 234567, 3456789054),
('jonsan.19beceg041@gmail.com', 'Jonsan', 'Devganiya', 'shsbh hjbdsh hbshdb, Surat, GUJARAT', 399999, 362478291283);

-- --------------------------------------------------------

--
-- Table structure for table `cart_products`
--

CREATE TABLE `cart_products` (
  `id` int(100) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `prize` float NOT NULL,
  `image` varchar(30) NOT NULL,
  `Discription` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_products`
--

INSERT INTO `cart_products` (`id`, `product_name`, `prize`, `image`, `Discription`) VALUES
(1, 'Pav Bhaji', 149, '1.jpg', 'A hearty, delightsome flavourful bhaji and 4 pcs of surti pav .'),
(2, 'Cheese Pav Bhaji', 199, '2.jpg', 'A hearty, delightsome flavourful cheese bhaji and 4 pcs of surti pav with papad and salad.'),
(3, 'Paneer Chilli', 249, '3.jpg', 'A spicy Indo Chinese starter made by tossing fried paneer in sweet sour and spicy chilli sauce.'),
(4, 'Veg Pulav', 189, '4.jpg', 'A popular mumbai street food of rice and vegetables sauteed together with pavbhaji masala and other '),
(5, 'Masala Dosa', 105, '6.jpg', 'A thin crispy dosa stuffed with aloo masala served with sambhar, red garlic chutney & white coconut '),
(6, 'Sada Dosa', 69, '5.jpg', 'A thin crispy plain dosa served with sambhar, red garlic chutney & white coconut chutney.'),
(7, 'Chinese Bhel', 179, '8.jpg', 'A sweet, tangy and spicy fusion dish of fried crispy noodles with stir fried veggies and Chinese sau'),
(8, 'Veg Manchurian Fried Rice', 119, '9.jpg', 'A bowl of traditional fried rice loaded with Manchurian balls and veggies.'),
(9, 'Veg Pizza [ 9 Inches]', 249, '10.jpg', 'Toping with Healthy Delicious Combination Of Premium Vegetables.'),
(10, 'Plain Khaman', 45, '11.jpg', 'Hear We Are Provide Best Quality Plain Khaman 250 Gm. '),
(11, 'Surti Vagharela Khaman', 60, '12.jpg', 'Surti Vagharela Khaman Is Spacial Item Of Surti People. 250 Gm.'),
(12, 'Butter Locho.', 99, '13.jpg', 'This Locho Item Is Healthy And This Is More Populer In Surat People. 250gm'),
(13, 'Chocolate Kit Kat Cake', 1499, '14.jpg', 'A chocolate layer cake recipe with dense, moist chocolate cake, silky chocolate truffle frosting and'),
(14, 'Strawberry Cake', 699, '15.jpg', 'Deliciously moist and flavorful, this strawberry pound cake is a one bowl treat that has a fruity an'),
(15, 'Chocolate Marble Cake', 219, '16.jpg', 'Freshly baked cake made with the goodness of chocolate marble and cream.'),
(16, 'McCafe Americano', 169, '17jpeg', 'Our Americano is bold and robust, made with our signature McCafe coffee combined with hot water. '),
(17, 'Chocolate Chips CaKe', 389, '18jpeg', 'A delicate chocolate cake studded with chocolate, covered in a creamy frosting and topped with choco'),
(18, 'White Forest Pastry Cake ', 369, '19jpeg', 'A delicious dessert of chocolate sponge layered with cream and cherries.'),
(19, 'Oreo Pastry Cake ', 389, '20jpeg', 'Oreo cake is the perfect combo of incredibly moist chocolate cake from scratch layered.'),
(20, 'Chocolate delight Cake', 379, '21jpeg', 'It consists of chocolate sponge and melted chocolate and chocolate cream inside and all the cake'),
(21, 'Crunchy Choco Chips', 195, '22jpeg', 'Crunch Til (150 gm) + Choco Chips Cookies (150 gm)'),
(22, 'Garden Delight Pizza', 165, '23jpeg', 'A Classic Veg Pizza That Combines The Zing And Freshness Of Onions, Tomatoes And Capsicum.'),
(23, 'Lovers Bite Pizza', 165, '24jpeg', 'A Wholesome Combination Of Tossed Mushrooms, Olives And Juicy Sweet Corn.'),
(24, 'Burn To Hell Pizza', 229, '25jpeg', 'A Fiery And Lethal Combination Of Hot & Garlic Dip, Jalapenos, Mushrooms, Olives And Capsicum'),
(25, 'Pesto & Basil Special Piz', 225, '26jpeg', 'Capsicum,Jalapenos,Paneer With Pesto & Basil Dip'),
(26, 'Burgers', 195, '27png', 'A crunchy Corn patty filled with Cheese, topped with Jalapeno, shredded Lettuce and more cheese');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `ind` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `message` varchar(100) NOT NULL,
  `solved_status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ind`, `name`, `email`, `subject`, `message`, `solved_status`) VALUES
(1, 'Jonsan Devganiya', 'jonsan.19beceg041@gmail.com', 'njn', 'hdhugwd\r\ndwjqdwl\r\nwdjbc', 1),
(2, 'Jonsan Devganiya', 'devganiyajonsan7@gmail.com', 'abc subject', 'xyz\r\nabc\r\ncde', 0),
(5, 'ghfsshdg', 'hjergrehj@ggfghfd.bjhgd', '4654bv', 'jhgegdhjdg\r\njvbjhercbde\r\njbhjeb', 0),
(6, 'Jonsan Devganiya', 'jonsan.19beceg041@gmail.com', 'Nothing', 'hbhb\r\nhdvsghvz', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_manager`
--

CREATE TABLE `order_manager` (
  `Order_id` int(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `f_name` varchar(30) NOT NULL,
  `l_name` text NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Picode` bigint(6) NOT NULL,
  `Phone Number` varchar(20) NOT NULL,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_manager`
--

INSERT INTO `order_manager` (`Order_id`, `email`, `f_name`, `l_name`, `Address`, `Picode`, `Phone Number`, `Status`) VALUES
(1, 'jonsan.19beceg041@gmail.com', 'Jonsan', 'Devganiya', 'shsbh hjbdsh hbshdb, Surat, GUJARAT', 399999, '6355559085', 1),
(2, 'devganiyajonsan7@gmail.com', 'Jonsan', 'Devganiya', '37, Gurukrupa Sco, Daboligam, Katargam, Surat, Gujrat', 395004, '6359193816', 1),
(3, 'devganiyajonsan71@gmail.com', 'Jonsan', 'Devganiya', '37, XYZ Sco, Katargam, Surat, Gujrat', 395004, '6359193816', 1),
(4, 'jonsan.19beceg041@gmail.com', 'Jonsan', 'Devganiya', 'shsbh hjbdsh hbshdb, Surat, GUJARAT', 399999, '6355559085', 1),
(5, 'devganiyajonsan6@gmail.com', 'Jonsan', 'Devganiya', 'ghevcghv, yufvdsty, aygvdsyu', 555555, '6667676666', 1),
(6, 'devganiyajonsan7@gmail.com', 'dnbsj', 'hfbd', 'ryegdtys, rhvbehgsz, erhbdsgh', 323233, '6464566677', 1),
(7, 'devganiyajonsan7@gmail.com', 'dnbsj', 'hfbd', 'ryegdtys, rhvbehgsz, erhbdsgh', 323233, '6464566677', 1),
(8, 'dsevganiyajonsan@gmail.com', 'jonsan', 'devagiya', 'hjvsgh, ghvvghsv, bhhbhbh', 567890, '4568908766', 1),
(9, 'hiten@gmail.com', 'ffrr', 'r4fr4', ' bggt, frfvr, frgvt', 234567, '3456789054', 1),
(10, 'devganiyajonsan7@gmail.com', 'dnbsj', 'hfbd', 'ryegdtys, rhvbehgsz, erhbdsgh', 323233, '6464566677', 1),
(11, 'devganiyajonsan1@gmail.com', 'Jonsan', 'Devganiya', 'hdbhbjn, gvfdhgs, gvdhgs', 395004, '6355559085', 1),
(12, 'devganiyajonsan3@gmail.com', 'Jonsan', 'Devganiya', 'shsbh hjbdsh hbshdb, Surat, GUJARAT', 399999, '6353626833', 1),
(17, 'devganiyajonsan7@gmail.com', 'dnbsj', 'hfbd', 'ryegdtys, rhvbehgsz, erhbdsgh', 323233, '6464566677', 1),
(18, 'devganiyajonsan7@gmail.com', 'dnbsj', 'hfbd', 'ryegdtys, rhvbehgsz, erhbdsgh', 323233, '6464566677', 1),
(19, 'devganiyajonsan7@gmail.com', 'dnbsj', 'hfbd', 'ryegdtys, rhvbehgsz, erhbdsgh', 323233, '6464566677', 1),
(20, 'devganiyajonsan7@gmail.com', 'dnbsj', 'hfbd', 'ryegdtys, rhvbehgsz, erhbdsgh', 323233, '6464566677', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`fname`, `lname`, `user_email`, `password`) VALUES
('jonsan10', 'Devganiya1', 'devganiyajonsan1@gmail.com', '11223310'),
('jonsan32', 'Devganiya32', 'devganiyajonsan3@gmail.com', 'abcXYZ22'),
('Jonsan6677777', 'Devganiya66', 'devganiyajonsan66@gmail.com', '6666667'),
('Jonsan', 'Devganiya', 'devganiyajonsan7@gmail.com', '12345'),
('jonsan', 'devganiya', 'dsevganiyajonsan@gmail.com', '1234'),
('jonsan1', 'devganiya1', 'hdsg@hd.com', 'yugeds'),
('Vraj', 'Patel', 'pvraj865@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `Order_id` int(100) NOT NULL,
  `Item id` int(100) NOT NULL,
  `Quntity` int(100) NOT NULL,
  `Date` varchar(20) NOT NULL,
  `Time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`Order_id`, `Item id`, `Quntity`, `Date`, `Time`) VALUES
(1, 3, 10, '20th February, 2022', '03:10:18 PM'),
(1, 7, 7, '20th February, 2022', '03:10:18 PM'),
(1, 11, 3, '20th February, 2022', '03:10:18 PM'),
(1, 15, 1, '20th February, 2022', '03:10:18 PM'),
(2, 3, 10, '20th February, 2022', '06:09:02 PM'),
(2, 11, 1, '20th February, 2022', '06:09:02 PM'),
(2, 5, 5, '20th February, 2022', '06:09:02 PM'),
(2, 6, 8, '20th February, 2022', '06:09:02 PM'),
(2, 1, 2, '20th February, 2022', '06:09:02 PM'),
(3, 3, 10, '22nd February, 2022', '08:26:46 AM'),
(3, 7, 7, '22nd February, 2022', '08:26:46 AM'),
(3, 6, 3, '22nd February, 2022', '08:26:46 AM'),
(4, 3, 6, '23rd February, 2022', '06:56:53 PM'),
(4, 6, 1, '23rd February, 2022', '06:56:53 PM'),
(5, 12, 10, '25th February, 2022', '08:27:44 AM'),
(5, 2, 7, '25th February, 2022', '08:27:44 AM'),
(6, 14, 10, '25th February, 2022', '01:43:19 PM'),
(6, 2, 7, '25th February, 2022', '01:43:19 PM'),
(6, 4, 1, '25th February, 2022', '01:43:19 PM'),
(7, 2, 10, '25th February, 2022', '01:48:41 PM'),
(7, 4, 1, '25th February, 2022', '01:48:41 PM'),
(8, 3, 7, '25th February, 2022', '04:56:34 PM'),
(8, 1, 8, '25th February, 2022', '04:56:34 PM'),
(8, 6, 4, '25th February, 2022', '04:56:34 PM'),
(9, 1, 10, '26th February, 2022', '12:35:54 PM'),
(9, 2, 2, '26th February, 2022', '12:35:54 PM'),
(9, 3, 7, '26th February, 2022', '12:35:54 PM'),
(10, 20, 10, '1st March, 2022', '07:34:58 PM'),
(11, 7, 10, '7th March, 2022', '04:55:14 PM'),
(11, 3, 7, '7th March, 2022', '04:55:14 PM'),
(11, 6, 2, '7th March, 2022', '04:55:14 PM'),
(12, 11, 10, '8th March, 2022', '04:05:42 PM'),
(12, 3, 7, '8th March, 2022', '04:05:42 PM'),
(12, 2, 4, '8th March, 2022', '04:05:42 PM'),
(13, 26, 7, '20th April, 2022', '05:22:57 PM'),
(13, 2, 3, '20th April, 2022', '05:22:57 PM'),
(17, 2, 1, '20th April, 2022', '05:25:06 PM'),
(17, 1, 1, '20th April, 2022', '05:25:06 PM'),
(17, 3, 1, '20th April, 2022', '05:25:06 PM'),
(18, 3, 10, '21st April, 2022', '11:19:41 PM'),
(18, 2, 6, '21st April, 2022', '11:19:41 PM'),
(18, 1, 2, '21st April, 2022', '11:19:41 PM'),
(19, 3, 1, '27th April, 2022', '10:18:13 AM'),
(19, 7, 1, '27th April, 2022', '10:18:13 AM'),
(20, 26, 10, '6th May, 2022', '03:42:16 PM'),
(20, 3, 7, '6th May, 2022', '03:42:16 PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_details`
--
ALTER TABLE `address_details`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `cart_products`
--
ALTER TABLE `cart_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ind`);

--
-- Indexes for table `order_manager`
--
ALTER TABLE `order_manager`
  ADD PRIMARY KEY (`Order_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_products`
--
ALTER TABLE `cart_products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `ind` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_manager`
--
ALTER TABLE `order_manager`
  MODIFY `Order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
