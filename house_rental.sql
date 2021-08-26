-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 10, 2021 at 08:13 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `house_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `apartments`
--

CREATE TABLE `apartments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `capacity` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apartments`
--

INSERT INTO `apartments` (`id`, `name`, `location`, `capacity`) VALUES
(1, 'Tuti', 'Limuru', '100'),
(2, 'Finlays', 'Nairobi', '100'),
(3, 'jack and jill', 'Limuru', '45'),
(4, 'Jacks', 'Nakuru', '222');

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE `codes` (
  `id` int(11) NOT NULL,
  `code` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `codes`
--

INSERT INTO `codes` (`id`, `code`) VALUES
(20, 'DSBB434'),
(21, 'DSBB43423'),
(22, 'DwSBB43422');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `house_number` varchar(100) DEFAULT NULL,
  `branch_name` varchar(100) DEFAULT NULL,
  `complain` varchar(600) NOT NULL,
  `tid` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `house_number`, `branch_name`, `complain`, `tid`, `time`) VALUES
(8, 'Dennis Kainga', 'ABC', '2', 'time is up', 17, '2021-08-08 08:32:15');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `tid` int(11) DEFAULT NULL,
  `paid` varchar(100) DEFAULT NULL,
  `balance` varchar(100) NOT NULL,
  `code` varchar(200) NOT NULL,
  `date_pay` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `tid`, `paid`, `balance`, `code`, `date_pay`) VALUES
(48, 17, '10000', '-69999', 'DwSBB43422', '2021-08-01 12:59:14');

-- --------------------------------------------------------

--
-- Table structure for table `payments_records`
--

CREATE TABLE `payments_records` (
  `id` int(11) NOT NULL,
  `tid` int(11) DEFAULT NULL,
  `paid` varchar(100) DEFAULT NULL,
  `balance` varchar(100) NOT NULL,
  `code` varchar(200) NOT NULL,
  `date_pay` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments_records`
--

INSERT INTO `payments_records` (`id`, `tid`, `paid`, `balance`, `code`, `date_pay`) VALUES
(1, 17, '20000', '-59999', 'DSBB43423', '2021-08-01 12:58:39'),
(2, 17, '10000', '-69999', 'DwSBB43422', '2021-08-01 12:59:14');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `tid` int(11) DEFAULT NULL,
  `reply` varchar(400) DEFAULT NULL,
  `mess` varchar(500) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `tid`, `reply`, `mess`, `time`) VALUES
(1, 15, 'The plumber will come around this week', '', '2021-08-01 06:37:51'),
(2, 15, 'HI evans Mutuku the plumber wil be available today', 'Hi,I have been a problem with my sink since yesterday is it possible to be fixed', '2021-08-01 06:37:51'),
(3, 17, 'Welcome Mr Dennis', 'Hey thanks for the invite really appreciated', '2021-08-01 06:37:51'),
(4, 17, 'Hi pleaase make sure to turn off the lights', ' ', '2021-08-01 06:37:51'),
(5, 17, 'Okay will send power man over', 'Hey the electric bill is not as accurate as i assumed it would be', '2021-08-01 10:00:14'),
(6, 17, 'Thank you very much', 'This is a good system', '2021-08-01 10:00:30'),
(7, 17, 'kaaa na mamako', 'sink broke', '2021-08-03 16:25:49'),
(8, 17, 'na ulipee rent BUANA!!!!!', ' ', '2021-08-03 16:26:42'),
(9, 17, 'ok \r\n', 'time is up', '2021-08-08 08:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `room_type` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room` varchar(200) DEFAULT NULL,
  `room_capacity` int(11) NOT NULL,
  `room_type` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'vacant',
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room`, `room_capacity`, `room_type`, `status`, `branch_id`) VALUES
(1, 'B4', 5, 'single room', 'vacant', 1),
(2, 'b6', 2, 'Double room', 'vacant', 1),
(3, 'B7', 2, 'Three Bedroom', 'vacant', 1),
(4, 'H12', 5, 'Double room', 'vacant', 2),
(5, 'B4', 3, 'single room', 'vacant', 2),
(6, 'A05', 3, 'Double room', 'vacant', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `marital_status` varchar(20) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `national_id` varchar(200) DEFAULT NULL,
  `fam_size` int(11) DEFAULT NULL,
  `date_in` varchar(100) NOT NULL,
  `form` varchar(299) NOT NULL,
  `room_number` varchar(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`id`, `first_name`, `last_name`, `gender`, `marital_status`, `phone_number`, `email`, `national_id`, `fam_size`, `date_in`, `form`, `room_number`, `branch_id`, `uid`) VALUES
(15, 'collins', 'Mutuku', 'Male', 'single', '07836363', 'collins@gmail.com', '3798882', 2, '2021-07-26 18:51:23', '', 'A12', 2, 12),
(16, 'Thomas', 'Kainga', 'Male', 'married', '07836363', 'tom@gmail.com', '23456', 5, '2021-07-31 20:51:57', '', 'A34', 2, 14),
(17, 'Dennis', 'Kainga', 'Male', 'single', '07836363', 'denniskainga@gmail.com', '2345', 4, '2021-07-31 21:05:47', '', 'ABC', 2, 16);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(200) DEFAULT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `user_image` varchar(200) DEFAULT 'assets/img/user.jpeg',
  `phone_number` varchar(200) DEFAULT NULL,
  `date_created` varchar(20) DEFAULT NULL,
  `user_type` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `first_name`, `last_name`, `email`, `password`, `user_image`, `phone_number`, `date_created`, `user_type`) VALUES
(1, 'admin', 'collins', 'Mutuku', 'collins@gmail.com', '$2y$10$d.2wcNGII2D6n97tGVCE5.I0jNJWbt9/BZOP3rE8H4O.o.lUGU4S2', 'assets/img/user.jpeg', '07836363', '2021-07-11 16:36:18', 0),
(12, 'collo', 'collins', 'Thuku', 'user123@gmail.com', '$2y$10$cJPV8qEho6F7mPoNrCF7CuH.3CqVZKQaZEJyLYljmmIz8w6pzXXRq', 'assets/img/user.jpeg', '07836363', '2021-07-26 18:49:45', 1),
(16, 'emkay', 'Dennis', 'Kainga', 'denniskainga@gmail.com', '$2y$10$2RBPWrC5mXou2zjjrvOWGuFXx2/M.Al8vkHiKdZhXrGncpmB071OG', 'images/79f5ff9cab63adcd/2.jpg', '07836363', '2021-07-31 21:02:34', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartments`
--
ALTER TABLE `apartments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments_records`
--
ALTER TABLE `payments_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
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
-- AUTO_INCREMENT for table `apartments`
--
ALTER TABLE `apartments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `codes`
--
ALTER TABLE `codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `payments_records`
--
ALTER TABLE `payments_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
