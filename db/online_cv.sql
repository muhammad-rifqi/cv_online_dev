-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2025 at 08:26 AM
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
-- Database: `online_cv`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `id_personal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `start_date`, `end_date`, `id_personal`) VALUES
(1, 'Metro TV dan Broadcasting', '2015-04-01', '2017-02-01', 1),
(2, 'PT Gandengtangan.co.id ', '2017-04-01', '2017-09-01', 1),
(3, 'PT IDEmuda ', '2017-09-15', '2018-03-31', 1),
(4, 'PT Funedge', '2018-04-01', '2018-10-31', 1),
(5, 'PT Arkademi ', '2018-11-01', '2021-06-01', 1),
(6, 'Kementrian Komunikasi dan Telekomunikasi, Kominfo', '2021-01-31', '2022-06-30', 1),
(7, 'PT XL - AXIATA CORP', '2022-02-01', '2023-02-28', 1),
(8, 'PT ARNAWA Teknologi Solusi', '2023-04-01', '2024-08-31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `job_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `company_id`, `job_description`) VALUES
(1, 1, 'https://metrotvnews.com'),
(2, 1, 'https://microsite.metrotvnews.com/dpr'),
(3, 1, 'https://career.metrotvnews.com/'),
(4, 2, 'https://gandengtangan.org'),
(5, 3, 'https://smarsoccercity.com '),
(6, 3, 'https://ditjenpdn.kemendag.go.id/ '),
(7, 4, 'https://funedge.co.id'),
(8, 4, 'https://autofrontier.co.id'),
(9, 5, 'https://arkademi.com'),
(10, 5, 'https://play.google.com/store/apps/detail\r\n s? id=com.arkademi.app (arkademi.apk (Android APP))'),
(11, 5, 'https://apps.apple.com/us/app/arkademi/ \r\nid1461484375 (arkademi.ipa(IOS APP))'),
(12, 6, 'https://indonesiabaik.id'),
(13, 6, 'https://gprtv.id'),
(14, 7, ' https://prioritas.xl.co.id/apply?step=1 '),
(15, 8, 'http://atous.id'),
(16, 8, 'http://myvets.atous.id'),
(17, 8, 'http://pembukuan.atous.id');

-- --------------------------------------------------------

--
-- Table structure for table `personal_information`
--

CREATE TABLE `personal_information` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `last_position` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `github` varchar(255) NOT NULL,
  `person_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personal_information`
--

INSERT INTO `personal_information` (`id`, `name`, `email`, `phone_number`, `last_position`, `linkedin`, `website`, `github`, `person_code`) VALUES
(1, 'Muhammad Rifqi', 'muhammad45rifki@gmail.com', '+6281927067602', 'IT Leader PT Arnawa Teknologi Solusi', 'https://www.linkedin.com/in/muhammad-rifqy-004b47107/', 'https://rifhandi.com/', 'https://github.com/muhammad-rifqi?tab=repositories', '123');

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `id` int(11) NOT NULL,
  `personal_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`id`, `personal_id`, `description`, `level`) VALUES
(1, 1, 'PHP', 'good'),
(2, 1, 'CI(Codeigniter)', 'good'),
(3, 1, 'LARAVEL', 'good'),
(4, 1, 'IONIC', 'good'),
(5, 1, 'CORDOVA', 'good'),
(6, 1, 'FLUTTER', 'good'),
(7, 1, 'REACT.JS', 'good'),
(8, 1, 'ANGULAR', 'good'),
(9, 1, 'GCP(google cloud platform)', 'middle'),
(10, 1, 'REACT NATIVE', 'middle'),
(11, 1, 'NEXT.JS ', 'good'),
(12, 1, 'NODE.JS', 'good'),
(13, 1, 'DOCKER', 'middle'),
(14, 1, 'GO(Fiber)', 'middle'),
(15, 1, 'Python(FLASK)', 'middle'),
(16, 1, 'Vue-3', 'basic');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_information`
--
ALTER TABLE `personal_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_information`
--
ALTER TABLE `personal_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
