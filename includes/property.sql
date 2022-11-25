-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2021 at 06:30 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `property`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_contact_us`
--

CREATE TABLE `admin_contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `phone` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `subject` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `message` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `send_date` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(7, 'Lease'),
(8, 'Rent'),
(9, 'Sale');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `c_name` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `c_name`) VALUES
(2, 'Vehari'),
(3, 'Multan');

-- --------------------------------------------------------

--
-- Table structure for table `company_agency`
--

CREATE TABLE `company_agency` (
  `id` int(11) NOT NULL,
  `address` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `about` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `owner_name` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `verified_status` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `founded` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `company_name` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `email` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `mobile` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `imagepath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_agency`
--

INSERT INTO `company_agency` (`id`, `address`, `about`, `owner_name`, `verified_status`, `city_id`, `user_id`, `founded`, `company_name`, `email`, `mobile`, `created_at`, `imagepath`) VALUES
(4, 'Sharki Colony', 'Web Developer', 'Talha umar', '1', 2, 7, 'TUC', 'Teach4u', 'tuc4373@gmail.com', '03037495997', '09-05-2021 / 11:51:28 AM', '');

-- --------------------------------------------------------

--
-- Table structure for table `company_contact_us`
--

CREATE TABLE `company_contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `send_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_contact_us`
--

INSERT INTO `company_contact_us` (`id`, `name`, `email`, `phone`, `message`, `send_date`) VALUES
(1, 'Hassan Ramzan', 'Hassan5515@gmail.com', '03001234567', 'Aslam o alaikum, \r\nI want to buy Property. Suggest me best one.\r\nThanks ', '14-05-2021 / 14:40:57 PM');

-- --------------------------------------------------------

--
-- Table structure for table `lease`
--

CREATE TABLE `lease` (
  `id` int(11) NOT NULL,
  `p_id` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `lease_max_year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lease`
--

INSERT INTO `lease` (`id`, `p_id`, `price`, `lease_max_year`) VALUES
(1, 'PL1233786L', 1200000, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `p_name` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `description` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `address` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `p_id` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `post_type_id` int(11) DEFAULT NULL,
  `cover_image` varchar(255) NOT NULL,
  `imgpath` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `p_name`, `status`, `created_at`, `description`, `address`, `p_id`, `city_id`, `user_id`, `category_id`, `post_type_id`, `cover_image`, `imgpath`) VALUES
(6, 'House', 1, '13/05/2021  03:48:26 PM', 'Better Condition', 'Muslim Town Vehari', 'PL1231786L', 2, 7, 9, 1, '3.jpg', '../images/postthumb/3.jpg'),
(8, 'House on Rent', 1, '13/05/2021  05:10:42 PM', 'Good Condition', 'Sharki Colony Vehari', 'PL1232786L', 2, 7, 8, 1, '3.jpg', '../images/postthumb/3.jpg'),
(11, 'House on Lease', 1, '13/05/2021  05:20:28 PM', 'New House, Latest Design', 'Muslim Town Vehari', 'PL1233786L', 2, 7, 7, 1, 'lm_benice328f.jpg', '../images/postthumb/lm_benice328f.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `post_details`
--

CREATE TABLE `post_details` (
  `id` int(11) NOT NULL,
  `post_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `c_year` varchar(255) NOT NULL,
  `area` int(11) NOT NULL,
  `bed_rooms` int(11) NOT NULL,
  `bath_rooms` int(11) NOT NULL,
  `kitchen` int(11) NOT NULL,
  `store_rooms` int(11) NOT NULL,
  `car_parking` varchar(255) NOT NULL,
  `other_features` varchar(255) NOT NULL,
  `air_conditioner` varchar(255) NOT NULL,
  `window` varchar(255) NOT NULL,
  `heating` varchar(255) NOT NULL,
  `electricity_backup` varchar(255) NOT NULL,
  `flooring` varchar(255) NOT NULL,
  `no_floors` int(11) NOT NULL,
  `waste_deposal` varchar(255) NOT NULL,
  `dinning_rooms` int(11) NOT NULL,
  `gym_rooms` int(11) NOT NULL,
  `other_rooms` int(11) NOT NULL,
  `powder_rooms` int(11) NOT NULL,
  `sitting_rooms` int(11) NOT NULL,
  `study_rooms` int(11) NOT NULL,
  `steaming_rooms` int(11) NOT NULL,
  `servant_rooms` int(11) NOT NULL,
  `internet` varchar(255) NOT NULL,
  `cable` varchar(255) NOT NULL,
  `jacuzzi` varchar(255) NOT NULL,
  `lawn` varchar(255) NOT NULL,
  `sauna` varchar(255) NOT NULL,
  `airport_distance` int(11) NOT NULL,
  `restaurant` varchar(255) NOT NULL,
  `mosque` varchar(255) NOT NULL,
  `hospital` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `public_transport` varchar(255) NOT NULL,
  `shopping_mall` varchar(255) NOT NULL,
  `disable` varchar(255) NOT NULL,
  `maintenance_staff` varchar(255) NOT NULL,
  `security_staff` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `imagepath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_details`
--

INSERT INTO `post_details` (`id`, `post_id`, `user_id`, `status`, `c_year`, `area`, `bed_rooms`, `bath_rooms`, `kitchen`, `store_rooms`, `car_parking`, `other_features`, `air_conditioner`, `window`, `heating`, `electricity_backup`, `flooring`, `no_floors`, `waste_deposal`, `dinning_rooms`, `gym_rooms`, `other_rooms`, `powder_rooms`, `sitting_rooms`, `study_rooms`, `steaming_rooms`, `servant_rooms`, `internet`, `cable`, `jacuzzi`, `lawn`, `sauna`, `airport_distance`, `restaurant`, `mosque`, `hospital`, `school`, `public_transport`, `shopping_mall`, `disable`, `maintenance_staff`, `security_staff`, `image`, `imagepath`) VALUES
(5, 'PL1231786L', 7, 1, '2021-05-21', 89, 1, 1, 0, 0, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 0, 'Yes', 0, 0, 0, 0, 1, 0, 0, 0, 'Yes', 'No', 'No', 'No', 'No', 300, 'No', 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '9.jpg', '../images/postImages/9.jpg'),
(7, 'PL1232786L', 7, 1, '2021-05-19', 45, 3, 2, 1, 1, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 1, 'Yes', 1, 0, 0, 0, 1, 1, 0, 0, 'Yes', 'Yes', 'No', 'No', 'No', 100, 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'No', 'Yes', 'No', 'No', 'lm_benice328f.jpg', '../images/postImages/lm_benice328f.jpg'),
(8, 'PL1233786L', 7, 1, '2011-07-26', 123, 5, 2, 1, 1, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 1, 'Yes', 1, 1, 1, 1, 1, 1, 1, 1, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 20, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '9.jpg', '../images/postImages/9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `post_images`
--

CREATE TABLE `post_images` (
  `id` int(11) NOT NULL,
  `img_path` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `img_type` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `status` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `p_id` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post_type`
--

CREATE TABLE `post_type` (
  `id` int(11) NOT NULL,
  `name` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_type`
--

INSERT INTO `post_type` (`id`, `name`) VALUES
(1, 'Featured'),
(2, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `id` int(11) NOT NULL,
  `month_rent` int(11) NOT NULL,
  `p_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`id`, `month_rent`, `p_id`) VALUES
(1, 15000, 'PL1232786L');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `id` int(11) NOT NULL,
  `p_id` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id`, `p_id`, `price`) VALUES
(3, 'PL1231786L', 43738);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `email` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `address` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `status` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `mobile` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `created_at` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `user_type` int(1) DEFAULT NULL,
  `password` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `img` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `img_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `address`, `status`, `mobile`, `created_at`, `user_type`, `password`, `img`, `img_path`) VALUES
(1, 'admin', 'admin@gmail.com', 'Sharki', NULL, '03037495997', NULL, 1, 'admin', 't.jpg', '../images/admin/t.jpg'),
(7, 'Talha umar', 'tuc4373@gmail.com', 'Sharki Colony', NULL, '03037495997', '09-05-2021 / 11:51:28 AM', 0, 'talha456', 't.jpg', '../images/company/t.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_contact_us`
--
ALTER TABLE `admin_contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_agency`
--
ALTER TABLE `company_agency`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `company_contact_us`
--
ALTER TABLE `company_contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lease`
--
ALTER TABLE `lease`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_type_id` (`post_type_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `post_details`
--
ALTER TABLE `post_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `post_images`
--
ALTER TABLE `post_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_type`
--
ALTER TABLE `post_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_contact_us`
--
ALTER TABLE `admin_contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company_agency`
--
ALTER TABLE `company_agency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `company_contact_us`
--
ALTER TABLE `company_contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lease`
--
ALTER TABLE `lease`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `post_details`
--
ALTER TABLE `post_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `post_type`
--
ALTER TABLE `post_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company_agency`
--
ALTER TABLE `company_agency`
  ADD CONSTRAINT `company_agency_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `company_agency_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_ibfk_4` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_details`
--
ALTER TABLE `post_details`
  ADD CONSTRAINT `post_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
