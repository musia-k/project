-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 13, 2021 at 09:59 AM
-- Server version: 8.0.22
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `default_team3`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int NOT NULL,
  `brand` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `picturename` varchar(25) NOT NULL,
  `featurename` varchar(25) NOT NULL,
  `picturepath` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `featurepath` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` int NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `brand`, `type`, `category`, `picturename`, `featurename`, `picturepath`, `featurepath`, `price`, `timestamp`) VALUES
(1, 'Skoda Fabia', '1.4 / Gasoline / Mechanic', 'ECONOM', 'skoda-fabia.jpg', 'Picture1.png', '../uploads/skoda-fabia.jpg', '../uploads/Picture1.png', 18, '2021-02-12 18:55:25'),
(2, 'Hyundai Accent', '1.4 / Gasoline / Auto', 'ECONOM', 'hyundai-accent.jpg', 'Picture2.png', '../uploads/hyundai-accent.jpg', '../uploads/Picture2.png', 22, '2021-02-13 09:54:20'),
(3, 'Suzuki Vitara', '1.4 / Gasoline / Auto', 'SUV', 'grand-vitara.jpg', 'Picture3.png', '../uploads/grand-vitara.jpg', '../uploads/Picture3.png', 18, '2021-02-13 09:55:17'),
(4, 'Citroen C-Elysee', '1.6 / Gasoline / Auto', 'ECONOM', 'citroen-elyssee.jpg', 'Picture4.png', '../uploads/citroen-elyssee.jpg', '../uploads/Picture4.png', 24, '2021-02-13 09:55:53');

-- --------------------------------------------------------

--
-- Table structure for table `webadmin`
--

CREATE TABLE `webadmin` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `webadmin`
--

INSERT INTO `webadmin` (`id`, `username`, `password`, `timestamp`) VALUES
(1, 'rama', 'p', '2021-02-11 10:54:45'),
(2, 'maryna', 'p', '2021-02-12 17:22:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webadmin`
--
ALTER TABLE `webadmin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `webadmin`
--
ALTER TABLE `webadmin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
