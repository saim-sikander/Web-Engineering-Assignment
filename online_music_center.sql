-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2023 at 01:38 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_music_center`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `singer_id` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `production` varchar(200) DEFAULT NULL,
  `launch_date` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `poster` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `singer_id`, `title`, `production`, `launch_date`, `description`, `poster`, `created_at`, `updated_at`) VALUES
(1, 2, 'Alpha', 'alpha', '2021-03-05', 'as jdf jdfs kjfdf', '193114513-poster.jpg', '2021-03-02 10:23:56', '2023-01-02 11:49:49'),
(7, 2, 'beta beats', 'beta', '2021-03-09', 'ajsd gjads vhsdas ', '1242562447-poster.jpg', '2021-03-09 09:16:54', '2023-01-02 11:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `medium`
--

CREATE TABLE `medium` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medium`
--

INSERT INTO `medium` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Sindhi', '2021-03-01 06:27:26', '2021-03-04 07:03:40'),
(2, 'Urdu', '2021-03-01 06:29:18', NULL),
(3, 'Punjabi', '2021-03-01 06:29:37', NULL),
(4, 'Turkish', '2021-03-01 06:31:19', NULL),
(5, 'English', '2021-03-01 09:02:37', NULL),
(6, 'Arabic', '2021-03-01 09:03:39', NULL),
(7, 'Persian', '2021-03-01 09:03:54', '2021-03-04 06:52:49');

-- --------------------------------------------------------

--
-- Table structure for table `singers`
--

CREATE TABLE `singers` (
  `id` int(11) NOT NULL,
  `medium_id` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `singers`
--

INSERT INTO `singers` (`id`, `medium_id`, `name`, `photo`, `description`, `created_at`, `updated_at`) VALUES
(2, 5, 'Michal', '1701554078-shaz.jpg', 'asaddsa fdf dsfsd', '2021-03-01 10:57:40', '2023-01-02 11:48:44'),
(3, 2, 'Shaz', '1278778310-shaz.jpg', 'shizu cartoon', '2021-03-01 10:59:40', '2021-03-04 09:02:29'),
(4, 1, 'Shazmeen', '1265705224-shaz.jpg', 'shizu cartoon', '2021-03-01 11:23:34', '2021-03-04 08:55:05'),
(7, 5, 'Urooj', '1126720877-shaz.jpg', 'shizu cartoon ASJKDK JSDSD', '2021-03-03 08:55:23', '2021-03-04 09:03:13'),
(11, 5, 'Asfa', '1464418546-shaz.jpg', 'jgdsa jassan  jafaf', '2021-03-09 09:13:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `album_id` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `file` varchar(200) DEFAULT NULL,
  `file_type` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `album_id`, `title`, `file`, `file_type`, `created_at`, `updated_at`, `status`) VALUES
(22, 1, 'alpha beats', '362217915-song.mp3', 'mp3', '2023-01-02 12:37:17', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `singer_id` (`singer_id`);

--
-- Indexes for table `medium`
--
ALTER TABLE `medium`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `singers`
--
ALTER TABLE `singers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medium_id` (`medium_id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_id` (`album_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `medium`
--
ALTER TABLE `medium`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `singers`
--
ALTER TABLE `singers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_ibfk_1` FOREIGN KEY (`singer_id`) REFERENCES `singers` (`id`);

--
-- Constraints for table `singers`
--
ALTER TABLE `singers`
  ADD CONSTRAINT `singers_ibfk_1` FOREIGN KEY (`medium_id`) REFERENCES `medium` (`id`);

--
-- Constraints for table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
