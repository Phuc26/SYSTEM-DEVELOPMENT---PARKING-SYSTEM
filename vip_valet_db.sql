-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2022 at 03:22 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vip_valet_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `daily_revenue`
--

CREATE TABLE `daily_revenue` (
  `daily_revenue_id` int(11) NOT NULL,
  `lot_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `daily_lot_revenue` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lot`
--

CREATE TABLE `lot` (
  `lot_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lot_name` varchar(80) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `postal_code` varchar(7) NOT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `monthly_revenue`
--

CREATE TABLE `monthly_revenue` (
  `montly_rate_id` int(11) NOT NULL,
  `lot_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `montly_revenue` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `rate_id` int(11) NOT NULL,
  `lot_id` int(11) NOT NULL,
  `start_date_time` datetime NOT NULL,
  `end_date_time` datetime NOT NULL,
  `rate_per_hour` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `lot_id` int(11) NOT NULL,
  `amount_paid` decimal(8,2) NOT NULL,
  `start_date_time` datetime NOT NULL,
  `end_date_time` datetime NOT NULL,
  `date_time` datetime NOT NULL,
  `plate_number` int(7) NOT NULL,
  `authorization_code` varchar(12) NOT NULL,
  `processor_name` varchar(15) NOT NULL,
  `card_mask` int(4) NOT NULL,
  `monthly_revenue_flag_bool` tinyint(1) NOT NULL,
  `daily_revenue_flag_bool` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(131) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `role` enum('admin','technican','manager','lot_owner') NOT NULL,
  `seeRevenue` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daily_revenue`
--
ALTER TABLE `daily_revenue`
  ADD PRIMARY KEY (`daily_revenue_id`),
  ADD KEY `lot_daily_revenu_lot_id_FK` (`lot_id`);

--
-- Indexes for table `lot`
--
ALTER TABLE `lot`
  ADD PRIMARY KEY (`lot_id`),
  ADD KEY `user_lot_user_id_FK` (`user_id`);

--
-- Indexes for table `monthly_revenue`
--
ALTER TABLE `monthly_revenue`
  ADD PRIMARY KEY (`montly_rate_id`),
  ADD KEY `lot_monthly_revenue_lot_id_FK` (`lot_id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`rate_id`),
  ADD KEY `lot_rates_lot_id_FK` (`lot_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `lot_transactions_lot_id_FK` (`lot_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daily_revenue`
--
ALTER TABLE `daily_revenue`
  MODIFY `daily_revenue_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lot`
--
ALTER TABLE `lot`
  MODIFY `lot_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `monthly_revenue`
--
ALTER TABLE `monthly_revenue`
  MODIFY `montly_rate_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daily_revenue`
--
ALTER TABLE `daily_revenue`
  ADD CONSTRAINT `lot_daily_revenu_lot_id_FK` FOREIGN KEY (`lot_id`) REFERENCES `lot` (`lot_id`);

--
-- Constraints for table `lot`
--
ALTER TABLE `lot`
  ADD CONSTRAINT `user_lot_user_id_FK` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `monthly_revenue`
--
ALTER TABLE `monthly_revenue`
  ADD CONSTRAINT `lot_monthly_revenue_lot_id_FK` FOREIGN KEY (`lot_id`) REFERENCES `lot` (`lot_id`);

--
-- Constraints for table `rates`
--
ALTER TABLE `rates`
  ADD CONSTRAINT `lot_rates_lot_id_FK` FOREIGN KEY (`lot_id`) REFERENCES `lot` (`lot_id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `lot_transactions_lot_id_FK` FOREIGN KEY (`lot_id`) REFERENCES `lot` (`lot_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
