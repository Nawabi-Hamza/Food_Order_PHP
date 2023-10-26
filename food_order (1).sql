-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2023 at 07:42 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(1, 'Hamza Nawabi', 'hamzanawabi', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'Elyas Ahmadi', 'elyas23', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'Ayaz Nawabi', 'ayaz', '21232f297a57a5a743894a0e4a801fc3'),
(4, 'samim', 'samim', '21232f297a57a5a743894a0e4a801fc3'),
(24, 'Elyas', 'elyas_nawabi', '21232f297a57a5a743894a0e4a801fc3'),
(48, 'Aziz', 'aziz_noori', '21232f297a57a5a743894a0e4a801fc3'),
(52, 'Adminstrator', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(1, 'Kebabs', 'pexels-malidate-van-769289.jpg', 'Yes', 'Yes'),
(2, 'Fruit Salad', 'pexels-jane-doan-1092730.jpg', 'No', 'Yes'),
(3, 'Juice', 'pexels-milada-vigerova-5984486.jpg', 'No', 'Yes'),
(4, 'Pizza', 'menu-pizza.jpg', 'Yes', 'Yes'),
(5, 'Burger', 'wp4056193-burger-wallpapers.jpg', 'Yes', 'Yes'),
(22, 'Memo', 'momo.jpg', 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(26, 'Italian', 'the popular pizza ', 23.40, '2023 10 19_1697684964_609345.jpg', 4, 'Yes', 'Yes'),
(27, 'Beef', 'more lovable fast food', 6.23, '2023 10 19_1697685205_wp4056193-burger-wallpapers.jpg', 5, 'Yes', 'Yes'),
(28, 'XL pizza', 'delisouse', 1200.00, '2023 10 19_1697695585_pizza.jpg', 4, 'No', 'Yes'),
(29, 'Shami kabab', 'most beutiful', 23.20, '2023 10 19_1697728957_pexels-antony-trivet-12842158.jpg', 1, 'Yes', 'Yes'),
(30, 'Vegetable kabab', 'with nice vegitables', 12.30, '2023 10 19_1697729168_pexels-pixabay-53148.jpg', 1, 'Yes', 'Yes'),
(31, 'Teka kebab', 'the simple kabab ', 17.45, '2023 10 19_1697729203_pexels-valeria-boltneva-17138061.jpg', 1, 'No', 'Yes'),
(32, 'Afghan kebab', 'most popular afghan culture food', 15.20, '2023 10 19_1697729272_pexels-valeria-boltneva-17138064.jpg', 1, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'Shami kabab', 4.01, 3, 12.03, '2023-10-20 08:35:27', 'Delivered', 'Hamza Nawabi', '+93 766 420877', 'hamza.nawabi119@gmail.com', 'kabul , khair khana , golai khoja boghra'),
(2, 'Shami kabab', 23.40, 7, 163.80, '2023-10-20 08:36:55', 'On Delivery', 'Logan Pollard', '+1 (523) 291-1231', 'dibigum@mailinator.com', 'Adipisci cumque dolo'),
(3, 'Shami kabab', 23.20, 6, 139.20, '2023-10-20 08:41:22', 'On Delivery', 'Odette Woods', '+1 (257) 134-6649', 'cibuw@mailinator.com', 'Nihil commodi aliqui'),
(4, 'Beef', 6.23, 5, 31.15, '2023-10-20 08:50:37', 'Cancel', 'Kadeem Chen', '+1 (208) 313-5759', 'qytehovul@mailinator.com', 'Veniam qui deleniti'),
(5, 'Italian', 23.40, 5, 117.00, '2023-10-20 08:51:18', 'Cancel', 'Hedley Davenport', '+1 (817) 438-1678', 'tawynehiv@mailinator.com', 'Omnis omnis adipisic'),
(6, 'Beef', 6.23, 9, 56.07, '2023-10-20 08:56:57', 'On Delivery', 'Ora Compton', '+1 (951) 891-1935', 'hedysi@mailinator.com', 'Eius libero voluptat'),
(7, 'Beef', 6.23, 3, 18.69, '2023-10-22 04:05:26', 'Cancel', 'Hamza Nawabi', '+93766420877', 'hamza.nawabi119@gmail.com', '15th district , kabul , afghanistan'),
(8, 'afghan kabab', 15.20, 5, 76.00, '2023-10-22 05:25:02', 'On Delivery', 'Yuri Welch', '+1 (588) 437-2661', 'hehygi@mailinator.com', 'Minima vitae ipsa i'),
(9, 'XL pizza', 1200.00, 2, 2400.00, '2023-10-23 06:43:53', 'On Delivery', 'Vera Hurst', '+1 (478) 748-3415', 'xytyrusi@mailinator.com', 'Adipisci dignissimos'),
(13, 'Italian', 23.40, 3, 70.20, '2023-10-24 05:28:11', 'On Delivery', 'naweed', '1234567890', 'naweed@gmail.com', 'kabul taimani 3rd street'),
(14, 'Shami kabab', 23.20, 5, 116.00, '2023-10-24 05:45:46', 'Ordered', 'sameer', '0987654321', 'sameer@gmail.com', 'golai khoja boghra kabul ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
