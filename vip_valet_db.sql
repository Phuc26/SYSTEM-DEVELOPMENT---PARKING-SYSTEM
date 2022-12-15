-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 05:41 AM
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
  `lot_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `postal_code` varchar(7) NOT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `start_date` datetime NOT NULL DEFAULT current_timestamp(),
  `end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lot`
--

INSERT INTO `lot` (`lot_id`, `user_id`, `lot_name`, `address`, `city`, `province`, `postal_code`, `disabled`, `start_date`, `end_date`) VALUES
(1, 3, 'Los Pollos Hermanos Parking Lot', '712 Red Bark Lane,  Henderson', 'Clark County, Springfield', 'Nevada', '111 666', 0, '2022-12-14 00:00:00', NULL),
(2, 12, 'Saul Goodman Lot', '123 Three Dee', 'Rotatte', 'Henri-Blueassa', 'ICE 612', 0, '2022-12-22 00:00:00', NULL),
(3, 12, 'Taught The Laws Firm Lot', 'Meesseeks', 'Rick', 'Morty', '567 12S', 0, '2022-12-29 00:00:00', NULL),
(4, 3, 'Frozen Elsa Disney Lot', 'Disney Land 4', 'Maine', 'Florida', 'D1S N3Y', 0, '2022-12-29 00:00:00', NULL),
(5, 3, 'Farmer\'s Parking Co.', '521 Jean Talon', 'Montreal', 'Quebec', '1GH 0T4', 1, '2022-12-22 00:00:00', '2022-12-28 00:00:00');

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
  `start_time` time NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `rate_per_hour` decimal(5,2) NOT NULL
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
  `plate_number` varchar(7) NOT NULL,
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
  `role` enum('admin','technician','manager','owner') NOT NULL DEFAULT 'technician',
  `seeRevenue` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password_hash`, `first_name`, `last_name`, `email`, `phone_number`, `role`, `seeRevenue`) VALUES
(3, 'owner', '$2y$10$fhTRGdME2a9/MimyEkI/4.BzBNxvF7ZvqoROkyNjokGLubLf4TOja', 'Gus', 'Fring', 'mistergus@gmail.com', '541-228-9562', 'owner', 0),
(9, 'admin', '$2y$10$fhTRGdME2a9/MimyEkI/4.BzBNxvF7ZvqoROkyNjokGLubLf4TOja', 'Walter', 'Hartwell White', 'dr.heisenberg@gmail.com', '555-666-7777', 'admin', 1),
(10, 'technician', '$2y$10$8I91nuLmuxQwBExFPJCDL.IK6f7FT25ROSUgT0OZkz7ZiICWVGgcO', 'Jesse', 'Pinkman', 'pink.jesman@gmail.com', '111-222-3333', 'technician', 1),
(11, 'manager', '$2y$10$.S2tnC4yw26S0PM4AUryh.t5.B69KhGKcemuTDOCJXsvpakABEImW', 'Hank', 'Schneider', 'hank.snider@gmail.com', '444-555-8888', 'manager', 1),
(12, 'owner2', '$2y$10$c9krpHhvYDQXS/wbCAOI3uSgtdq5h1ui2emQJbV0LRU.BIikLzaHq', 'Gouache', 'Adolf', 'kerrcaracala@gmail.com', '999-888-7777', 'owner', 1),
(13, 'owner3', '$2y$10$JTyMm71yaGJ/ruPr1B3Z0eSFWAqgpcE2lRSubpOczFBuQreCCdYK6', 'Ice', 'Cream', 'vanillachocolate@gmail.com', '567-890-1234', 'owner', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daily_revenue`
--
ALTER TABLE `daily_revenue`
  ADD PRIMARY KEY (`daily_revenue_id`),
  ADD KEY `lot_daily_revenue_lot_id_FK` (`lot_id`) USING BTREE;

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
  MODIFY `lot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
