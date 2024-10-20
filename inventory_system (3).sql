-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2024 at 07:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_items`
--

CREATE TABLE `add_items` (
  `serial_no` int(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `name_as_per_store` varchar(70) NOT NULL,
  `type` enum('IT','General') NOT NULL,
  `sub_type` enum('Software','Hardware') NOT NULL,
  `make` varchar(100) NOT NULL,
  `model_number` int(60) NOT NULL,
  `oem` int(60) NOT NULL,
  `internet_connectivity` enum('Yes','No') NOT NULL,
  `wifi` enum('Yes','No') NOT NULL,
  `bluetooth` enum('Yes','No') NOT NULL,
  `mac_address` varchar(200) NOT NULL,
  `network_port` enum('Yes','No') NOT NULL,
  `configuration` varchar(80) NOT NULL,
  `processor` varchar(80) NOT NULL,
  `ram_type` varchar(60) NOT NULL,
  `ram_size` varchar(50) NOT NULL,
  `ssd_size` varchar(50) NOT NULL,
  `hd_size` varchar(50) NOT NULL,
  `windows` varchar(50) NOT NULL,
  `oem_warranty` varchar(50) NOT NULL,
  `id` int(20) NOT NULL,
  `remarks` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_items`
--

INSERT INTO `add_items` (`serial_no`, `name`, `name_as_per_store`, `type`, `sub_type`, `make`, `model_number`, `oem`, `internet_connectivity`, `wifi`, `bluetooth`, `mac_address`, `network_port`, `configuration`, `processor`, `ram_type`, `ram_size`, `ssd_size`, `hd_size`, `windows`, `oem_warranty`, `id`, `remarks`) VALUES
(1, '2', '2', 'IT', 'Software', '2', 2, 2, 'No', 'Yes', 'No', '2', 'No', '2', '2', '2', '2', '2', '2', '2', '2', 2, '2'),
(2, 'hp laptop', 'DY-WXYZ HP 50006', 'General', 'Software', '1223', 2222, 2223, 'Yes', 'No', 'Yes', 'BC78:373H:9JH6', 'Yes', '2', '4', '8', 'xyzz', '4', '2', 'linux', '6', 42, 'hyy'),
(3, 'hp laptop', 'DY-WXYZ HP 50006', 'IT', 'Software', '1223', 2222, 2223, 'Yes', 'No', 'Yes', 'BC78:373H:9JH6', 'Yes', '2', '4', '8', 'xyzz', '4', '2', 'linux', '6', 4, 'noo'),
(4, 'hp laptop42', 'ee', 'IT', 'Hardware', '3', 3, 3, 'Yes', 'Yes', 'No', '4', 'No', '3', '3', '3', '3', '3', '3', '3', '3', 88, '3'),
(6, '2', '2', 'General', 'Software', '3', 3, 3, 'Yes', 'Yes', 'Yes', '4', 'Yes', '4', '4', '4', '4', '4', '4', '4', '455545', 344454, 'df');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Demo Category'),
(3, 'Finished Goods'),
(5, 'Machinery'),
(4, 'Packing Materials'),
(2, 'Raw Materials'),
(8, 'Stationery Items'),
(6, 'Work in Progress');

-- --------------------------------------------------------

--
-- Table structure for table `itemcategories`
--

CREATE TABLE `itemcategories` (
  `id` int(200) NOT NULL,
  `Item_name` varchar(50) NOT NULL,
  `Type` enum('IT','General') NOT NULL,
  `Sub_type` enum('Software','Hardware') NOT NULL,
  `Life` int(2) NOT NULL,
  `exp` enum('exp','non-exp') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `itemcategories`
--

INSERT INTO `itemcategories` (`id`, `Item_name`, `Type`, `Sub_type`, `Life`, `exp`) VALUES
(202134, 'Computers', 'IT', 'Hardware', 2, 'exp'),
(202236, 'UPS', 'IT', 'Hardware', 5, 'non-exp'),
(202247, 'Keyboard', 'IT', 'Software', 10, 'exp'),
(202486, 'Software', 'IT', 'Software', 3, 'exp'),
(1, 'Appliances', 'General', 'Hardware', 10, 'exp');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) UNSIGNED NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(50) DEFAULT NULL,
  `buy_price` decimal(25,2) DEFAULT NULL,
  `sale_price` decimal(25,2) NOT NULL,
  `categorie_id` int(11) UNSIGNED NOT NULL,
  `media_id` int(11) DEFAULT 0,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `quantity`, `buy_price`, `sale_price`, `categorie_id`, `media_id`, `date`) VALUES
(1, 'Demo Product', '48', 100.00, 500.00, 1, 0, '2021-04-04 16:45:51'),
(2, 'Box Varieties', '12000', 55.00, 130.00, 4, 0, '2021-04-04 18:44:52'),
(3, 'Wheat', '69', 2.00, 5.00, 2, 0, '2021-04-04 18:48:53'),
(4, 'Timber', '1200', 780.00, 1069.00, 2, 0, '2021-04-04 19:03:23'),
(5, 'W1848 Oscillating Floor Drill Press', '26', 299.00, 494.00, 5, 0, '2021-04-04 19:11:30'),
(6, 'Portable Band Saw XBP02Z', '42', 280.00, 415.00, 5, 0, '2021-04-04 19:13:35'),
(7, 'Life Breakfast Cereal-3 Pk', '107', 3.00, 7.00, 3, 0, '2021-04-04 19:15:38'),
(8, 'Chicken of the Sea Sardines W', '110', 13.00, 20.00, 3, 0, '2021-04-04 19:17:11'),
(9, 'Disney Woody - Action Figure', '67', 29.00, 55.00, 3, 0, '2021-04-04 19:19:20'),
(10, 'Hasbro Marvel Legends Series Toys', '106', 219.00, 322.00, 3, 0, '2021-04-04 19:20:28'),
(11, 'Packing Chips', '78', 21.00, 31.00, 4, 0, '2021-04-04 19:25:22'),
(12, 'Classic Desktop Tape Dispenser 38', '160', 5.00, 10.00, 8, 0, '2021-04-04 19:48:01'),
(13, 'Small Bubble Cushioning Wrap', '199', 8.00, 19.00, 4, 0, '2021-04-04 19:49:00');

-- --------------------------------------------------------

--
-- Table structure for table `rac_users`
--

CREATE TABLE `rac_users` (
  `Serial_no` int(5) NOT NULL,
  `id` int(25) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Designation` varchar(50) NOT NULL,
  `Mobile_no` int(10) NOT NULL,
  `Email_id` varchar(50) NOT NULL,
  `Dob` date NOT NULL,
  `PIS` int(10) NOT NULL,
  `Head` set('Yes','No') NOT NULL,
  `Emp_type` set('DRDO','AFHQ','Other') NOT NULL,
  `Status` set('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rac_users`
--

INSERT INTO `rac_users` (`Serial_no`, `id`, `Name`, `Designation`, `Mobile_no`, `Email_id`, `Dob`, `PIS`, `Head`, `Emp_type`, `Status`) VALUES
(1, 1, 'Anamta', 'Interns', 987777, 'ana@gmail.com', '2003-04-04', 169, 'Yes', 'DRDO', 'Inactive'),
(2, 12, 'Johnsonnn', 'Scientist', 9878889, 'john@gmail.com', '2000-02-02', 233, 'No', 'AFHQ', 'Inactive'),
(6, 56, 'Anuj Kumar', 'Employee', 9876771, 'anuj@gmail.com', '1995-01-02', 76, 'No', 'AFHQ', 'Active'),
(7, 98, 'muskan', 'Intern', 9877787, 'm@gmail.com', '2003-09-09', 86, 'No', 'DRDO', 'Active'),
(4, 345, 'Mr. Rishi', 'Employee', 987777, 'rishi@gmail.com', '1975-09-09', 796, 'Yes', 'DRDO', 'Active'),
(3, 432, 'Person', 'Intern', 9988773, 'person@gmail.com', '2003-03-03', 901, 'Yes', 'AFHQ', 'Inactive'),
(8, 550, 'testname', 'Intern', 9887778, 'test@gmail.com', '2002-03-23', 443, 'No', 'AFHQ', 'Active'),
(5, 876, 'Mrs. Sumedha', 'Intern', 5678890, 'sumedha@gmail.com', '2000-04-09', 76, 'Yes', 'DRDO', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(25,2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `product_id`, `qty`, `price`, `date`) VALUES
(1, 1, 2, 1000.00, '2021-04-04'),
(2, 3, 3, 15.00, '2021-04-04'),
(3, 10, 6, 1932.00, '2021-04-04'),
(4, 6, 2, 830.00, '2021-04-04'),
(5, 12, 5, 50.00, '2021-04-04'),
(6, 13, 21, 399.00, '2021-04-04'),
(7, 7, 5, 35.00, '2021-04-04'),
(8, 9, 2, 110.00, '2021-04-04');

-- --------------------------------------------------------

--
-- Table structure for table `usage_records`
--

CREATE TABLE `usage_records` (
  `oem_sr_no` int(50) NOT NULL,
  `id` int(50) NOT NULL,
  `name_as_per_store` varchar(150) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `user_name` varchar(70) NOT NULL,
  `user_email` varchar(70) NOT NULL,
  `room_no` varchar(50) NOT NULL,
  `div_head_name` varchar(60) NOT NULL,
  `inventory_holder_name` varchar(60) NOT NULL,
  `reason_for_item_transfer` varchar(200) NOT NULL,
  `upload_authority_letter` longblob NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `presently_using` set('Yes','No') NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usage_records`
--

INSERT INTO `usage_records` (`oem_sr_no`, `id`, `name_as_per_store`, `user_id`, `user_name`, `user_email`, `room_no`, `div_head_name`, `inventory_holder_name`, `reason_for_item_transfer`, `upload_authority_letter`, `from_date`, `to_date`, `presently_using`, `remarks`) VALUES
(3433, 7, 'go', '5', 'g', 'h@gmail.com', '6', 'h', 'g', 'ggg', 0x766f75636865722d7265636f7264732d75706c6f61642d766f75636865722d312e706e67, '2004-02-01', '2005-03-01', 'No', 'no remarks.'),
(456, 23, 'ghjk', '3443', 'rohit', 'rohit@gmail.com', '445', 'raj', 'akash', 'product no more required', 0x766f75636865722d7265636f7264732d75706c6f61642d766f75636865722d312e706e67, '2003-02-01', '2007-05-03', 'No', 'no.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `image` varchar(255) DEFAULT 'no_image.jpg',
  `status` int(1) NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `user_level`, `image`, `status`, `last_login`) VALUES
(1, 'Admin', 'Admin', '315f166c5aca63a157f7d41007675cb44a948b33', 1, 'vxj334r71.png', 1, '2024-10-08 09:59:14'),
(2, 'John Walker', 'special', 'ba36b97a41e7faf742ab09bf88405ac04f99599a', 2, 'no_image.png', 1, '2021-04-04 19:53:26'),
(3, 'Christopher', 'user', '12dea96fec20593566ab75692c9949596833adc9', 3, 'no_image.png', 1, '2021-04-04 19:54:46'),
(4, 'Natie Williams', 'natie', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 3, 'no_image.png', 1, NULL),
(5, 'Kevin', 'kevin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 3, 'no_image.png', 1, '2021-04-04 19:54:29');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(150) NOT NULL,
  `group_level` int(11) NOT NULL,
  `group_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `group_name`, `group_level`, `group_status`) VALUES
(1, 'Admin', 1, 1),
(2, 'special', 2, 1),
(3, 'User', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `voucher_records`
--

CREATE TABLE `voucher_records` (
  `serial_no` int(200) NOT NULL,
  `date` date NOT NULL,
  `id` int(200) NOT NULL,
  `mode` varchar(200) NOT NULL,
  `rac_in_date` date NOT NULL,
  `warranty_time_in_year` int(200) NOT NULL,
  `warranty_valid_upto_date` date NOT NULL,
  `sender_name` varchar(200) NOT NULL,
  `sender_address` varchar(200) NOT NULL,
  `gst_number` int(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `total_amount_before_tax` varchar(200) NOT NULL,
  `gst_amount` varchar(200) NOT NULL,
  `total` varchar(200) NOT NULL,
  `item_temp_loan` varchar(200) NOT NULL,
  `loan_upto_date` date NOT NULL,
  `item_description` varchar(200) NOT NULL,
  `upload_voucher` longblob NOT NULL,
  `remarks` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voucher_records`
--

INSERT INTO `voucher_records` (`serial_no`, `date`, `id`, `mode`, `rac_in_date`, `warranty_time_in_year`, `warranty_valid_upto_date`, `sender_name`, `sender_address`, `gst_number`, `state`, `total_amount_before_tax`, `gst_amount`, `total`, `item_temp_loan`, `loan_upto_date`, `item_description`, `upload_voucher`, `remarks`) VALUES
(0, '2000-01-01', 1, '2', '2000-01-01', 2, '3000-02-02', '2', '2', 2, '1', '12', '1', '1', '1', '2000-01-02', 's', 0x53637265656e73686f7420323032342d30392d3136203031333034302e706e67, 'sfffffffff'),
(0, '2024-10-23', 22, '22', '2000-02-22', 2, '0001-02-02', 'a', 'n', 22, 'y', '1', '2', '3', 'a', '2009-09-09', 'fhj', 0x436f75727365726120384357484c513554394a58565f706167652d303030312e6a7067, 'nope'),
(0, '2002-01-01', 99, '8', '2024-10-16', 7, '2003-09-09', 'a', 'a', 2, 'r', '3', '1', '3', '4', '2003-01-01', 'ffbtr', 0x4239303031323235202831292e6a7067, 'no remarks65');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_items`
--
ALTER TABLE `add_items`
  ADD PRIMARY KEY (`serial_no`),
  ADD UNIQUE KEY `unique_id` (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `categorie_id` (`categorie_id`),
  ADD KEY `media_id` (`media_id`);

--
-- Indexes for table `rac_users`
--
ALTER TABLE `rac_users`
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `Serial_no` (`Serial_no`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `usage_records`
--
ALTER TABLE `usage_records`
  ADD UNIQUE KEY `unique_id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_level` (`user_level`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_level` (`group_level`);

--
-- Indexes for table `voucher_records`
--
ALTER TABLE `voucher_records`
  ADD UNIQUE KEY `unique_id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_items`
--
ALTER TABLE `add_items`
  MODIFY `serial_no` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rac_users`
--
ALTER TABLE `rac_users`
  MODIFY `Serial_no` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_products` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `SK` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`user_level`) REFERENCES `user_groups` (`group_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
