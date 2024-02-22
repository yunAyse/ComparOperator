-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 22, 2024 at 08:20 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tp_compare`
--

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE `destination` (
  `id` int NOT NULL,
  `location` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `tour_operator_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`id`, `location`, `price`, `tour_operator_id`) VALUES
(1, 'Italy', 1650, 2),
(2, 'Norway', 1100, 2),
(3, 'Canada', 1390, 1),
(4, 'Switzerland', 2390, 3),
(5, 'Canada', 1000, 3),
(8, 'Peru', 2300, 2),
(9, 'Nepal', 3200, 3),
(10, 'Iceland', 1050, 2),
(11, 'Austria', 570, 1),
(12, 'Southern Andes', 2650, 3),
(13, 'Southern Andes', 10500, 1),
(14, 'China', 3300, 3),
(15, 'New Zealand', 1200, 1),
(16, 'Italy', 680, 3);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int NOT NULL,
  `message` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `tour_operator_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `message`, `author`, `tour_operator_id`) VALUES
(1, 'Super voyage, prestation au top !!', 'Michel', 2),
(2, 'Tout est inclus dans le prix, c\'est cool, je recommande', 'Paul', 3),
(3, 'Un peu cher, mais ça vaut le coup', 'Paul', 2),
(4, 'arnaque!!!! a fuire!!!', 'René', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tour_operator`
--

CREATE TABLE `tour_operator` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `grade_count` int NOT NULL DEFAULT '0',
  `grade_total` int NOT NULL DEFAULT '0',
  `is_premium` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tour_operator`
--

INSERT INTO `tour_operator` (`id`, `name`, `link`, `grade_count`, `grade_total`, `is_premium`) VALUES
(1, 'Salaun Holidays', 'https://www.salaun-holidays.com/', 0, 0, 0),
(2, 'Fram', 'https://www.fram.fr/', 2, 6, 1),
(3, 'Heliades', 'https://www.heliades.fr/', 1, 4, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destination_tour_operator` (`tour_operator_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `review_tour_operator` (`tour_operator_id`);

--
-- Indexes for table `tour_operator`
--
ALTER TABLE `tour_operator`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `destination`
--
ALTER TABLE `destination`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tour_operator`
--
ALTER TABLE `tour_operator`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `destination`
--
ALTER TABLE `destination`
  ADD CONSTRAINT `destination_tour_operator` FOREIGN KEY (`tour_operator_id`) REFERENCES `tour_operator` (`id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_tour_operator` FOREIGN KEY (`tour_operator_id`) REFERENCES `tour_operator` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
