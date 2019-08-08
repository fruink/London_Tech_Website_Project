-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 16, 2018 at 09:16 AM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ledc`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE `tbl_about` (
  `about_id` tinyint(8) UNSIGNED NOT NULL,
  `about_desc` text NOT NULL,
  `about_img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`about_id`, `about_desc`, `about_img`) VALUES
(1, 'London Ontario is home to hundreds of thriving tech companies that are always looking for new talent and hardworking individuals who could become a great asset to their teams. Some of London\'s industry leaders are 3M Canada, Trojan Technologies, and General Dynamics. London has many community events, fairs, festivals, concerts, resturants, and local shopping suited for everyone. London is yours to explore!', 'map.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hiring`
--

CREATE TABLE `tbl_hiring` (
  `job_id` smallint(5) UNSIGNED NOT NULL,
  `job_title` varchar(200) NOT NULL,
  `job_img` varchar(60) NOT NULL,
  `job_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_hiring`
--

INSERT INTO `tbl_hiring` (`job_id`, `job_title`, `job_img`, `job_desc`) VALUES
(3, 'TD banking', 'TD.png', 'Test Title'),
(4, 'Ad Home', 'adhome.png', 'Description of the job'),
(5, 'Diply', 'Diply-Logo.png', 'Description of the job'),
(6, 'TBK', 'tbk-logo.png', 'Description of the job'),
(7, 'Trogan', 'trogan.png', 'Description of the job'),
(8, 'Star Tech', 'startech.jpg', 'Description of the job');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `news_id` smallint(4) UNSIGNED NOT NULL,
  `news_title` varchar(200) NOT NULL,
  `news_post` text NOT NULL,
  `news_img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`news_id`, `news_title`, `news_post`, `news_img`) VALUES
(1, 'London Filled With Talent', '\"London is full of opportunity. We have an ability to be very proactive with the growth that we have here. What i\'m excited about is all the opportunities that continue to arise. Downtown continues to grow. We\'re seeing fantastic new start-ups, companies have moved their heads offices to London and we\'re just getting started.\"\r\n\r\n- Eric Vardon\r\nPresident & CEO \r\nCreative Technology & Strategy, Arcane', 'newsBackground.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_splash`
--

CREATE TABLE `tbl_splash` (
  `splash_id` tinyint(8) UNSIGNED NOT NULL,
  `splash_video` varchar(250) NOT NULL,
  `splash_img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_splash`
--

INSERT INTO `tbl_splash` (`splash_id`, `splash_video`, `splash_img`) VALUES
(1, 'stock.mp4', 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` mediumint(8) UNSIGNED NOT NULL,
  `user_fname` varchar(250) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_pass` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_ip` varchar(50) NOT NULL,
  `user_level` varchar(15) NOT NULL,
  `user_verified` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_fname`, `user_name`, `user_pass`, `user_email`, `user_date`, `user_ip`, `user_level`, `user_verified`) VALUES
(6, 'Test User', 'testUser', '$2y$10$LUGxqsUn43MU6T2dQUdou.l0g1v4hy51SRCDNvbLbtwXajHBZMjAC', 'qnnkennedy922@gmail.com', '2018-04-16 01:59:11', '', '2', 'yay');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video`
--

CREATE TABLE `tbl_video` (
  `video_id` tinyint(3) UNSIGNED NOT NULL,
  `video_src` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_video`
--

INSERT INTO `tbl_video` (`video_id`, `video_src`) VALUES
(1, 'ledc_vid_1_compressed.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_why`
--

CREATE TABLE `tbl_why` (
  `why_id` tinyint(4) UNSIGNED NOT NULL,
  `why_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_why`
--

INSERT INTO `tbl_why` (`why_id`, `why_desc`) VALUES
(1, 'Average employment income in 2015 for full-year full-time workers. London has many opportunities that will increase your annual gross pay.'),
(2, 'Median value of dwellings. A fast growing and affordable housing market for all residents that live in the city.'),
(3, 'London\'s unemployment rate as of November 2017, has decreased 0.5% compared to last year.'),
(4, 'Percentage of the population in London with a post-secondary certificate, diploma or degree.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_about`
--
ALTER TABLE `tbl_about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `tbl_hiring`
--
ALTER TABLE `tbl_hiring`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `tbl_splash`
--
ALTER TABLE `tbl_splash`
  ADD PRIMARY KEY (`splash_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_video`
--
ALTER TABLE `tbl_video`
  ADD PRIMARY KEY (`video_id`);

--
-- Indexes for table `tbl_why`
--
ALTER TABLE `tbl_why`
  ADD PRIMARY KEY (`why_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `about_id` tinyint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_hiring`
--
ALTER TABLE `tbl_hiring`
  MODIFY `job_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `news_id` smallint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_splash`
--
ALTER TABLE `tbl_splash`
  MODIFY `splash_id` tinyint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_video`
--
ALTER TABLE `tbl_video`
  MODIFY `video_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_why`
--
ALTER TABLE `tbl_why`
  MODIFY `why_id` tinyint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
