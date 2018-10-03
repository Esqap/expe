-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 03, 2018 at 02:23 PM
-- Server version: 10.1.24-MariaDB-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esqapcom_esqap`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `about_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `country` varchar(55) DEFAULT NULL,
  `language` varchar(55) DEFAULT NULL,
  `interest` varchar(55) DEFAULT NULL,
  `about` varchar(55) DEFAULT NULL,
  `school` varchar(55) DEFAULT NULL,
  `college` varchar(55) DEFAULT NULL,
  `skills` varchar(55) DEFAULT NULL,
  `mobile` varchar(55) DEFAULT NULL,
  `website` varchar(55) DEFAULT NULL,
  `occu` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `u_id`, `country`, `language`, `interest`, `about`, `school`, `college`, `skills`, `mobile`, `website`, `occu`) VALUES
(1, 91, 'Afghanistan', '', '', ' \r\n										', '', '', '', '', '', 'Student'),
(4, 42, 'Afghanistan', 'English, Urdu', 'IT', 'Co-Founder At LatestExperience.com.								', 'Eagle House School', 'Eagle House College', 'Web Developer', '+923063287306', 'https://www.latestexperience.com', ''),
(5, 101, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(6, 102, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(7, 103, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(8, 104, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(9, 106, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(10, 107, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(11, 108, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(12, 109, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(13, 110, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(14, 111, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(15, 112, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(16, 113, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(18, 116, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Student'),
(19, 117, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Student'),
(20, 118, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Student'),
(21, 119, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'IT Professional'),
(22, 120, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Student'),
(24, 122, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Teacher'),
(25, 123, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Teacher'),
(26, 124, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Student'),
(27, 125, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(28, 126, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(29, 127, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `exp_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `comment_by` varchar(55) NOT NULL,
  `dated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `exp_id`, `comment`, `comment_by`, `dated`) VALUES
(3, 211, 'Vvsgs', 'Haniabidkz@gmail.com', '2018-02-22 17:25:47'),
(6, 211, 'Share this experience', 'Haniabidkz@gmail.com', '2018-03-07 20:02:58'),
(27, 231, 'looking forward ..', 'moixahmed333@yahoo.com', '2018-05-18 20:06:34'),
(28, 230, 'Done', 'haniabidkz@gmail.com', '2018-06-03 03:07:12'),
(29, 268, 'sdsds', 'haniabidkz123@gmail.com', '2018-07-21 22:40:16'),
(32, 231, 'Yeah prograaming is really fun if it is your passion.', 'Haniabidkz@gmail.com', '2018-09-23 08:10:08');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `exp_id` int(11) NOT NULL,
  `experience` text NOT NULL,
  `posted_by` varchar(100) NOT NULL,
  `posted_date` timestamp NULL DEFAULT NULL,
  `related_to` varchar(100) NOT NULL,
  `conclusion` varchar(100) NOT NULL,
  `hashtag` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`exp_id`, `experience`, `posted_by`, `posted_date`, `related_to`, `conclusion`, `hashtag`) VALUES
(204, 'Learning #Math is fun only if it is taught in a funny manner.I was preparing for my statistics and probability exam and I observe that how useful it i', 'maazmehtabuddin95@gmail.com', '2017-09-26 12:51:01', 'Education', 'Math is Real Fun !', '#Math'),
(207, '#Blogging is much more than you think. Results will not come instantly. Do it with passion. Well this strategy apply to every work you do. I am just specific to Blogging.', 'haniabidkz@gmail.com', '2017-09-26 13:02:03', 'Information Technology', '', '#Blogging'),
(208, 'Keeping Your Programming Code Organized is one of the Way You can Handle Error. Believe me or Not Organization matter Alot', 'haniabidkz@gmail.com', '2017-09-27 12:57:13', 'Information Technology', 'Code in a Organized Manner', NULL),
(209, 'Keeping Your #Programming Code Organized is one of the Way You can Handle Errors. Believe me or Not Organization matter Alot', 'haniabidkz@gmail.com', '2017-09-27 12:59:14', 'Information Technology', 'Code in Organized Manner', '#Programming'),
(210, 'A man learns from his experience. But it was a need of a place where actually the experienced peoples could share their life experiences so that anyone can learn from them. So keeping this aim in mind we developed LatestExperience.com a one stop shop for all the Latest Experiences !', 'maazmehtabuddin95@gmail.com', '2017-09-27 13:05:13', 'Education', 'Learn from experiences and Implement them practically', NULL),
(211, 'Before Coding always plan that what you will code. Make a rough algorithm in your native language.This will help you alot during coding process.', 'mohsin_1995@yahoo.com', '2017-09-27 13:18:56', 'Information Technology', 'Code with a proper plan', NULL),
(217, '#PHP is a Simple and Lightweight Language for Developing Web Application But Beware It will be difficult to manage the files when the code increases. ', 'haniabidkz@gmail.com', '2017-11-12 03:55:55', 'Information Technology', 'Organized the Code in PHP Unless Code Messed Up.', '#PHP'),
(221, 'How to develop a product?', 'moixahmed333@yahoo.com', '2018-03-11 14:22:14', 'Category', '', NULL),
(229, 'Suggest me a new software tool which must be difficult to work on..Curious to learn something new.', 'mohsin_1995@yahoo.com', '2018-04-15 19:28:24', 'Category', '', NULL),
(230, 'Expeess', 'Khanzadaghazal@gmail.com', '2018-04-16 09:53:36', 'Category', '', NULL),
(231, 'Just recently I started to learn a new programming language and does have a great environment to work with.\nGreat experience to see what a programming language can achieve\n#programmingexperience', 'moixahmed333@yahoo.com', '2018-05-18 19:44:10', 'Technology', '', '#programmingexperience'),
(232, 'The sublime text editor is quite easy to use for your day to day coding with intriguing features allowing me to write loads and loads of code easily and shortcut keys help me more.\n', 'moixahmed333@yahoo.com', '2018-05-18 23:55:38', 'Category', '', NULL),
(234, 'Just started to learn python hugely impressed with its simplicity', 'haniabidkz@gmail.com', '2018-05-29 03:54:08', 'Technology', '', NULL),
(239, 'Hello', 'Haniabidkz123@gmail.com', '2018-07-21 08:49:20', 'Category', '', NULL),
(240, 'Just started to learn python hugely impressed with its simplicity', 'Haniabidkz123@gmail.com', '2018-07-21 08:54:20', 'Category', '', NULL),
(241, 'Just started to learn python hugely impressed with its simplicity Just started to learn python hugely impressed with its simplicity Just started to learn python hugely impressed with its simplicity', 'Haniabidkz123@gmail.com', '2018-07-21 08:55:19', 'Category', '', NULL),
(242, 'Just started to learn python hugely impressed with its simplicity Just started to learn python hugely impressed with its simplicity Just started to learn python hugely impressed with its simplicity', 'Haniabidkz123@gmail.com', '2018-07-21 09:35:06', 'Category', '', NULL),
(243, 'Python is an interpreted object oriented highlevel programming language with dynamic semantics Python simple easy to learn', 'Haniabidkz123@gmail.com', '2018-07-21 09:37:18', 'Category', '', NULL),
(244, 'Python is an interpreted object oriented highlevel programming language with dynamic semantics Pythons simple easy to learn ', 'Khanzadaghazal@gmail.com', '2018-07-21 09:42:46', 'Tech', '', NULL),
(249, 'asas\'asas', 'haniabidkz123@gmail.com', '2018-07-21 17:34:34', 'Category', '', NULL),
(250, 'dsds', 'haniabidkz123@gmail.com', '2018-07-21 17:35:07', 'Category', '', NULL),
(251, 'sdds', 'haniabidkz123@gmail.com', '2018-07-21 17:57:43', 'Category', '', NULL),
(252, 'ddfdf', 'haniabidkz123@gmail.com', '2018-07-21 18:03:47', 'Category', '', NULL),
(253, 'fgfgfg', 'haniabidkz123@gmail.com', '2018-07-21 18:04:27', 'Category', '', NULL),
(255, 'sdsds', 'haniabidkz123@gmail.com', '2018-07-21 19:03:44', 'Category', '', NULL),
(256, 'asaas', 'haniabidkz123@gmail.com', '2018-07-21 19:26:49', 'Category', '', NULL),
(257, 'ass', 'haniabidkz123@gmail.com', '2018-07-21 19:29:42', 'Category', '', NULL),
(258, 'dssd', 'haniabidkz123@gmail.com', '2018-07-21 19:33:42', 'Category', '', NULL),
(259, 'ddff', 'haniabidkz123@gmail.com', '2018-07-21 19:40:16', 'Category', '', NULL),
(260, 'sdsd', 'haniabidkz123@gmail.com', '2018-07-21 19:45:51', 'Category', '', NULL),
(261, 'sdsdsd', 'haniabidkz123@gmail.com', '2018-07-21 19:49:57', 'Category', '', NULL),
(262, 'dfdf', 'haniabidkz123@gmail.com', '2018-07-21 20:00:02', 'Category', '', NULL),
(263, 'xcxcxc', 'haniabidkz123@gmail.com', '2018-07-21 20:01:38', 'Category', '', NULL),
(264, 'hghg', 'haniabidkz123@gmail.com', '2018-07-21 22:29:48', 'Category', '', NULL),
(265, 'kjkjk', 'haniabidkz123@gmail.com', '2018-07-21 22:29:48', 'Category', '', NULL),
(266, 'sdsdsd \'sdsd', 'haniabidkz123@gmail.com', '2018-07-21 22:36:48', 'Category', '', NULL),
(267, 'dfdfdf', 'haniabidkz123@gmail.com', '2018-07-21 22:38:26', 'Category', '', NULL),
(268, 'sdsdsdsd', 'haniabidkz123@gmail.com', '2018-07-21 22:39:31', 'Category', '', NULL),
(269, 'sdsdsdd', 'haniabidkz123@gmail.com', '2018-07-21 22:40:22', 'Category', '', NULL),
(270, 'aasas', 'haniabidkz123@gmail.com', '2018-07-21 22:51:37', 'Category', '', NULL),
(271, 'xxcxccx', 'haniabidkz123@gmail.com', '2018-07-21 22:57:05', 'Category', '', NULL),
(272, 'sdsdsd', 'haniabidkz123@gmail.com', '2018-07-21 23:01:46', 'Category', '', NULL),
(273, 'sdsdsds', 'haniabidkz123@gmail.com', '2018-07-21 23:03:23', 'Category', '', NULL),
(274, 'sdd', 'haniabidkz123@gmail.com', '2018-07-22 10:25:22', 'Category', '', NULL),
(275, 'xcxc', 'haniabidkz123@gmail.com', '2018-07-22 10:39:38', 'Category', '', NULL),
(276, 'kjkj', 'haniabidkz123@gmail.com', '2018-07-22 11:04:00', 'Category', '', NULL),
(277, 'sdsdsd', 'haniabidkz123@gmail.com', '2018-07-22 11:06:15', 'Category', '', NULL),
(278, 'sdsdsd', 'haniabidkz123@gmail.com', '2018-07-22 11:07:33', 'Category', '', NULL),
(279, 'sdds', 'haniabidkz123@gmail.com', '2018-07-22 11:08:49', 'Category', '', NULL),
(280, 'ddf', 'haniabidkz123@gmail.com', '2018-07-22 11:10:03', 'Category', '', NULL),
(281, 'dfdfdfdf', 'haniabidkz123@gmail.com', '2018-07-22 11:11:43', 'Category', '', NULL),
(282, 'dfdf', 'haniabidkz123@gmail.com', '2018-07-22 11:13:38', 'Category', '', NULL),
(283, 'dfdfdfd', 'haniabidkz123@gmail.com', '2018-07-22 11:15:12', 'Category', '', NULL),
(284, 'Test\'s', 'haniabidkz123@gmail.com', '2018-07-22 11:15:31', 'Technology', '', NULL),
(285, 'cxcxc', 'haniabidkz123@gmail.com', '2018-07-22 11:24:49', 'Category', '', NULL),
(286, 'cxcxcxc', 'haniabidkz123@gmail.com', '2018-07-22 11:25:07', 'Category', '', NULL),
(287, 'bvvb', 'haniabidkz123@gmail.com', '2018-07-22 11:25:37', 'Category', '', NULL),
(288, 'dfd', 'haniabidkz123@gmail.com', '2018-07-22 11:25:52', 'Category', '', NULL),
(289, 'This is Post', 'haniabidkz123@gmail.com', '2018-07-23 15:45:53', 'Programming', '', NULL),
(290, 'esqap solution', 'khanzadaghazal@gmail.com', '2018-09-13 18:41:08', 'Security', '', NULL),
(291, 'esqap', 'khanzadaghazal@gmail.com', '2018-09-13 18:41:08', 'Security', '', NULL),
(295, 'sddsd', 'haniabidkz@gmail.com', '2018-09-20 17:20:43', 'Programming', '', NULL),
(296, 'sssdsd', 'haniabidkz@gmail.com', '2018-09-20 17:20:54', 'Programming', '', NULL),
(298, 'Let the passion drive your experience.', 'Haniabidkz@gmail.com', '2018-09-23 08:08:13', 'Programming', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` text,
  `email` text,
  `mesg` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `mesg`) VALUES
(1, 'hggh', 'jjhjh', 'ghg'),
(2, 'sdsdsd', NULL, NULL),
(3, 'asas', 'sasasasasaa', NULL),
(4, 'sdsd', 'sdsd', 'sdsdsdd'),
(5, 'aadadad', 'asa', 'addsd'),
(6, 'sdsd', 'ssd', 'sddsd'),
(7, '', '', ''),
(8, '', '', ''),
(9, 'sdsd', 'sd', 'sds'),
(10, 'dsdsd', 'sdd', 'sdds'),
(11, 'sdsd', 'dsd', 'sdsd'),
(12, '', '', ''),
(13, '', '', ''),
(14, '', '', ''),
(15, '', '', ''),
(16, '', '', ''),
(17, '', '', ''),
(18, 'dsdsd', 'sdd', 'sdds'),
(19, '', '', ''),
(20, '', '', ''),
(21, '', '', ''),
(22, '', '', ''),
(23, '', '', ''),
(24, '', '', ''),
(25, 'sdsds', 'sdsdsd', 'sdsdsd'),
(26, 'sdsds', 'sdsdsd', 'sdsdsd'),
(27, '', '', ''),
(28, 'sdsds', 'sdsdsd', 'sdsdsd'),
(29, 'sdsd', 'ssd', 'sdd'),
(30, 'Hasnain', 'Khanzada', 'sdsd'),
(31, '', '', ''),
(32, '', '', ''),
(33, '', '', ''),
(34, 'fdf', 'd', 'dfdf'),
(35, '', '', ''),
(36, '', '', ''),
(37, '', '', ''),
(38, '', '', ''),
(39, '', '', ''),
(40, '', '', ''),
(41, '', '', ''),
(42, '', '', ''),
(43, '', '', ''),
(44, 'sdsd', 'xsd', 'dfdfd'),
(45, 'asa', 'sds', 'sdsdsd'),
(46, 'df', 'dfd', 'dfdf'),
(47, 'a', 'j', 't'),
(48, 'd', 'XC', 'CVDF'),
(49, 'jjh', 'dfd', 'dfdf'),
(50, 'hh', 'gv', 'hh'),
(51, 'h', 'h', 'h'),
(52, 'df', 'df', 'df'),
(53, 'hhh', 'u', 'jj'),
(54, 'sds', 'sds', 'sd'),
(55, 'df', 'vd', 'dd'),
(56, 'Hasnain Abid Khanzada', 'haniabidkz123@gmail.com', 'This is Testing.'),
(57, 'Hasnain', 'han@ga.com', 'as sas'),
(58, 'Hasnain Abid Khanzada', 'Vd', 'Zggd'),
(59, 'Ravendhar Kumar Lalwani', 'ravendhar.lalwani@gmail.com', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `exp_id` int(11) NOT NULL,
  `liked_by` varchar(55) NOT NULL,
  `liked_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`like_id`, `exp_id`, `liked_by`, `liked_date`) VALUES
(8, 211, 'Haniabidkz@gmail.com', '2018-03-07 20:02:47'),
(13, 217, 'Haniabidkz@gmail.com', '2018-03-11 16:48:53'),
(17, 208, 'khanzadaghazal@gmail.com', '2018-05-27 15:29:30'),
(18, 230, 'haniabidkz@gmail.com', '2018-05-29 03:51:04'),
(20, 234, 'haniabidkz@gmail.com', '2018-06-03 02:07:38'),
(21, 229, 'mohsin_1995@yahoo.com', '2018-07-08 14:06:00'),
(22, 234, 'mohsin_1995@yahoo.com', '2018-07-08 14:06:06'),
(25, 217, 'Khanzadaghazal@gmail.com', '2018-07-21 17:40:11'),
(26, 250, 'haniabidkz123@gmail.com', '2018-07-21 17:57:52'),
(27, 250, 'haniabidkz123@gmail.com', '2018-07-21 17:57:52'),
(37, 258, 'haniabidkz123@gmail.com', '2018-07-21 19:47:25'),
(38, 258, 'haniabidkz123@gmail.com', '2018-07-21 19:47:25'),
(52, 268, 'haniabidkz123@gmail.com', '2018-07-21 22:40:36'),
(53, 268, 'haniabidkz123@gmail.com', '2018-07-21 22:40:36'),
(54, 267, 'haniabidkz123@gmail.com', '2018-07-21 22:40:45'),
(55, 269, 'haniabidkz123@gmail.com', '2018-07-21 22:40:58'),
(59, 285, 'haniabidkz123@gmail.com', '2018-07-22 11:25:03'),
(63, 298, 'Haniabidkz@gmail.com', '2018-09-23 08:09:08'),
(64, 296, 'Haniabidkz@gmail.com', '2018-09-23 08:09:11'),
(65, 209, 'Haniabidkz@gmail.com', '2018-09-23 08:09:15'),
(66, 232, 'Haniabidkz@gmail.com', '2018-09-23 08:10:45'),
(67, 221, 'Haniabidkz@gmail.com', '2018-09-23 08:10:51');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `noti_id` int(11) NOT NULL,
  `email` varchar(55) NOT NULL,
  `msg` varchar(100) NOT NULL,
  `exp_id` int(11) NOT NULL,
  `action_by` varchar(55) NOT NULL,
  `checked` int(11) NOT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `like_id` int(11) DEFAULT NULL,
  `noti_type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`noti_id`, `email`, `msg`, `exp_id`, `action_by`, `checked`, `comment_id`, `like_id`, `noti_type`) VALUES
(5, 'haniabidkz@gmail.com', 'Haniabidkz@gmail.com commented on your experience.', 211, 'Haniabidkz@gmail.com', 1, 3, NULL, 'comment'),
(12, 'haniabidkz@gmail.com', 'Haniabidkz@gmail.com liked your experience.', 211, 'Haniabidkz@gmail.com', 1, NULL, 8, 'like'),
(13, 'haniabidkz@gmail.com', 'Haniabidkz@gmail.com commented on your experience.', 211, 'Haniabidkz@gmail.com', 1, 6, NULL, 'comment'),
(20, 'haniabidkz@gmail.com', 'Haniabidkz@gmail.com liked your experience.', 217, 'Haniabidkz@gmail.com', 1, NULL, 13, 'like'),
(33, 'haniabidkz@gmail.com', 'Ghazal khan liked your experience.', 208, 'khanzadaghazal@gmail.com', 1, NULL, 17, 'like'),
(34, 'Khanzadaghazal@gmail.com', 'Hasnain Abid Khanzada liked your experience.', 230, 'haniabidkz@gmail.com', 0, NULL, 18, 'like'),
(35, 'Khanzadaghazal@gmail.com', 'Hasnain Abid Khanzada commented on your experience.', 230, 'haniabidkz@gmail.com', 0, 28, NULL, 'comment'),
(36, 'haniabidkz@gmail.com', 'Syed Mohsin Ali liked your experience.', 234, 'mohsin_1995@yahoo.com', 1, NULL, 22, 'like'),
(37, 'haniabidkz@gmail.com', 'Ghazal khan liked your experience.', 217, 'Khanzadaghazal@gmail.com', 0, NULL, 25, 'like'),
(42, 'haniabidkz@gmail.com', 'Hasnain Abid Khanzada liked your experience.', 296, 'Haniabidkz@gmail.com', 0, NULL, 64, 'like'),
(43, 'haniabidkz@gmail.com', 'Hasnain Abid Khanzada liked your experience.', 209, 'Haniabidkz@gmail.com', 0, NULL, 65, 'like'),
(44, 'moixahmed333@yahoo.com', 'Hasnain Abid Khanzada commented on your experience.', 231, 'Haniabidkz@gmail.com', 0, 32, NULL, 'comment'),
(45, 'moixahmed333@yahoo.com', 'Hasnain Abid Khanzada liked your experience.', 232, 'Haniabidkz@gmail.com', 0, NULL, 66, 'like'),
(46, 'moixahmed333@yahoo.com', 'Hasnain Abid Khanzada liked your experience.', 221, 'Haniabidkz@gmail.com', 0, NULL, 67, 'like');

-- --------------------------------------------------------

--
-- Table structure for table `notify_discuss`
--

CREATE TABLE `notify_discuss` (
  `Notify_Id` int(11) NOT NULL,
  `Notification` text,
  `Type` varchar(100) NOT NULL DEFAULT 'q_answered',
  `Ans_Id` int(11) DEFAULT NULL,
  `Q_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notify_discuss_user`
--

CREATE TABLE `notify_discuss_user` (
  `Notify_User_Id` int(11) NOT NULL,
  `Notify_Id` int(11) DEFAULT NULL,
  `For_User_Id` int(11) DEFAULT NULL,
  `Is_Checked` varchar(100) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions_cat`
--

CREATE TABLE `questions_cat` (
  `cat_id` int(11) NOT NULL,
  `cat` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions_cat`
--

INSERT INTO `questions_cat` (`cat_id`, `cat`) VALUES
(2, 'Programming'),
(5, 'Marketing'),
(3, 'Security'),
(4, 'AI and IOT'),
(1, 'General'),
(6, 'Networking'),
(7, 'Graphics');

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE `referrals` (
  `id` int(11) NOT NULL,
  `referrer_id` int(11) DEFAULT NULL,
  `refereed_id` int(11) DEFAULT NULL,
  `gift_recieved` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referrals`
--

INSERT INTO `referrals` (`id`, `referrer_id`, `refereed_id`, `gift_recieved`) VALUES
(20, 42, 112, 1),
(21, 42, 113, 1),
(23, 119, 120, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(60) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `notify` int(11) DEFAULT NULL,
  `image` text,
  `verified` int(11) NOT NULL,
  `expert_verify` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `Name`, `email`, `pass`, `notify`, `image`, `verified`, `expert_verify`) VALUES
(42, 'Hasnain Abid Khanzada', 'haniabidkz@gmail.com', 'killerkz@)!^megamind@)!^', 1, 'images/Hasnain Abid Khanzada.jpg', 1, 1),
(65, 'Ghazal khan', 'khanzadaghazal@gmail.com', 'pakistan123', 1, 'images/default.jpeg', 1, 0),
(66, 'Maaz', 'maazmehtabuddin95@gmail.com', '123456789', 0, 'images/default.jpeg', 1, 0),
(71, 'Zaid Imtiaz', 'zaid296imtiaz@gmail.com', 'hahaha12345', 1, 'images/default.jpeg', 1, 0),
(72, 'Moiz khan', 'moixahmed333@yahoo.com', 'moizkhan', 1, 'images/default.jpeg', 1, 1),
(77, 'Ravendhar Kumar Lalwani', 'lalwanir4@gmail.com', 'google37', 0, 'images/default.jpeg', 0, 0),
(81, 'waqar', 'wawaqarbsm66@gmail.com', 'waq861336', 0, 'images/default.jpeg', 0, 0),
(82, 'vicky', 'vickyvk016@gmail.com', '12345678', 0, 'images/default.jpeg', 0, 0),
(91, 'Syed Mohsin Ali', 'mohsin_1995@yahoo.com', '12341234', 0, 'images/default.jpeg', 1, 1),
(92, 'ASHISH SHUKLA', 'ashishgkp22@gmail.com', '9795060882', 0, 'images/default.jpeg', 0, 0),
(93, 'ASHISH SHUKLA', 'ashishgkp22@yahoo.com', '9795060882', 0, 'images/default.jpeg', 0, 0),
(94, 'ASHISH SHUKLA', 'asasadsd@gmail.com', '9795060882', 0, 'images/default.jpeg', 0, 0),
(95, 'Hasnain', 'haniabidkz885544@gmail.com', 'khanzada', 0, 'images/default.jpeg', 0, 0),
(96, 'Hasnain Abid Khanzada', 'haniabid267kz@gmail.com', 'khanzada', 0, 'images/default.jpeg', 0, 0),
(97, 'Hasnain Abid Khanzada', 'haniabidkz03000@gmail.com', 'khanzada', 0, 'images/default.jpeg', 0, 0),
(98, 'Hasnain Abid Khanzada', 'zaiabidbidkz@gmail.com', 'khanzada', 0, 'images/default.jpeg', 0, 0),
(99, 'Hasnain Abid Khanzada', 'khanzadahasnainidkz@gmail.com', 'khanzada', 0, 'images/default.jpeg', 0, 0),
(100, 'Hasnain Abid Khanzada', 'khanzadahyfhasnainidkz@gmail.com', 'khanzada', 0, 'images/default.jpeg', 0, 0),
(101, 'Hasnain Abid Khanzada', 'hania123bidkz@gmail.com', 'khanzada', 0, 'images/default.jpeg', 0, 0),
(102, 'Hasnain Abid Khanzada', 'haniaalibidkz@gmail.com', 'khanzada', 0, 'images/default.jpeg', 0, 0),
(103, 'Zain Abid Khanzada', 'zainabidkz@gmail.com', 'killerkz123', 0, 'images/default.jpeg', 0, 0),
(104, 'Ali Khan', 'ali2012megamind@gmail.com', 'khanzada', 0, 'images/default.jpeg', 0, 0),
(105, 'Zain Abid Khanzada', 'zainabidkz0306@gmail.com', 'khanzada', 0, 'images/default.jpeg', 0, 0),
(106, 'admin', 'han232332iabidkz@gmail.com', 'khanzada', 0, 'images/default.jpeg', 0, 0),
(107, 'haniabidkz', 'hanizain7764abidkz@gmail.com', 'khanzada', 0, 'images/default.jpeg', 0, 0),
(108, 'Hasnain Abid Khanzada', 'haniabidkkillerkz23z@gmail.com', 'ghghghghg', 0, 'images/default.jpeg', 0, 0),
(109, 'Hasnain Abid Khanzada', 'haniabid343434kz@gmail.com', 'sdsdsdsdsds', 0, 'images/default.jpeg', 0, 0),
(110, 'hasnain', 'haniabidkz123@gmail.com', 'khanzada', 0, 'images/default.jpeg', 1, 2),
(111, 'Hasnain Abid Khanzada', 'haniabidkz234@gmail.com', 'khanzada', 0, 'images/default.jpeg', 0, 0),
(112, 'Hasnain Abid Khanzada', 'hania34334343bidkz@gmail.com', 'ddfdfdfdf', 0, 'images/default.jpeg', 0, 0),
(113, 'Hasnain Abid Khanzada', 'sd34343sdsd@ssd.com', 'sdsdsdsds', 0, 'images/default.jpeg', 0, 0),
(116, 'vickyvk', 'vickyvk019@gmail.com', 'vicky645', 0, 'images/default.jpeg', 0, 0),
(117, 'M.ShayanGhani', 'm.shayanghani@gmail.com', '12112006', 0, 'images/default.jpeg', 0, 0),
(118, 'M.ShayanGhani', 'mshayanghani@gmail.com', '12112006', 0, 'images/default.jpeg', 0, 0),
(119, 'Ravendhar Kumar Lalwani', 'ravendhar.lalwani@gmail.com', 'Google37', 0, 'images/Ravendhar Kumar Lalwani.jpg', 1, 1),
(120, 'Mohisin', 'aug.mohsin15@gmail.com', '12341234', 0, 'images/default.jpeg', 0, 0),
(122, 'raja sarwar', 'kkango360@gmail.com', '10121981', 0, 'images/default.jpeg', 0, 0),
(123, 'raja sarwar', 'rj_kango@yahoo.com', 'sarwardil', 0, 'images/default.jpeg', 0, 0),
(124, 'Sanaullah', 'sanaullahrahoo89@gmail.com', 'sanaullah.89', 0, 'images/default.jpeg', 1, 0),
(125, 'haniabidkz', 'haniabidkz23434018@gmail.com', 'khanzada', 0, 'images/default.jpeg', 0, 0),
(126, 'Zain Abid Khanzada', 'haniabidkz2018@gmail.com', 'khanzada', 0, 'images/Zain Abid Khanzada.jpg', 1, 0),
(127, 'haniabidkz', 'haniabidkz232323@gmail.com', 'khanzada', 0, 'images/default.jpeg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_answers`
--

CREATE TABLE `user_answers` (
  `answer_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` text,
  `ans_by` varchar(55) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_answers`
--

INSERT INTO `user_answers` (`answer_id`, `question_id`, `answer`, `ans_by`) VALUES
(90, 49, 'The Besy Way to Learn PHP is to first clear the concepts clearly.', '42'),
(91, 50, 'Hyyshs', '42'),
(92, 50, 'Another', '42'),
(93, 50, 'One more', '42'),
(94, 49, 'you need to make your logic building basics clear first.', '64'),
(95, 51, 'If you come from php development, learning node is a great idea. It ll teach you in a soft way the concurrent programming pattern, and also event/stream programming, it will lead you to face problems regarding the underlying OS in a soft way.\n\nAll sort of stuff that PHP greatly solves for you right out of the box and which you never think about.\n\nNode will also give you the impression of a bigger playground to explore.\n\nBut, if you want to be productive when it s about building website, i believe PHP is better. On the other hand, if you are looking for performance, node may be better, but true performance comes with compiled languages like GO, not scripted languages.\n\nFinally, if php was not plumbed by all those damn heavy javaesque framework, it would be a really nice environment with a good trade off between speed and complexity. Node gives you speed, but it comes with a price about the complexity which can be very costly', '42'),
(96, 49, 'Testing', '42'),
(97, 55, 'Focus On Programming Concept, Not On Programming Language.', '42'),
(98, 56, 'A Place to share daily life experience', '42'),
(99, 49, 'This is Test', '42'),
(100, 57, 'React is a Front end Framework By Google', '88'),
(101, 57, 'React is a Front end Framework By Google', '88'),
(102, 57, 'Ok Thanks Ghazal', '42'),
(103, 57, 'What about Mean Stack?', '42'),
(104, 57, 'Mean vs Mern Stack', '42'),
(105, 58, 'Hello 2', '42'),
(106, 58, 'Yes Test', '42'),
(107, 58, 'Yes', '88'),
(108, 58, 'Again', '88'),
(109, 58, 'This is Test', '88'),
(110, 58, 'This is Another', '88'),
(111, 58, 'Testing', '88'),
(112, 58, 'asasasas', '88'),
(113, 58, 'sdsdsd', '88'),
(114, 58, 'Adding Answer', '42'),
(115, 58, 'Answer', '42'),
(116, 58, 'sdsd', '42'),
(117, 58, 'sdsdsds', '42'),
(118, 58, 'asasas', '42'),
(119, 58, 'Khanzada', '42'),
(120, 58, 'kkk', '42'),
(121, 58, 'a', '42'),
(122, 58, 'This is Test', '42'),
(123, 58, 'My Name is Hasnain Abid Khanzada', '42'),
(124, 58, 'This is My Answer', '89'),
(125, 69, 'Wordpress is CMS  Built on PHP. It is not a framework.', '42'),
(127, 74, 'go to rozee.pk and find which organization is hiring web developer with fresh experience.', '119'),
(128, 65, 'Research about each of these companies by going to their website, LinkedIn, QUORA and other social networks. Search for past or present interns from LinkedIn and connect with them. Follow them and get some latest guidance', ''),
(129, 64, 'TRG, Careem, VentureDive, NetSol, Axact, Sofy.AI. Some other software houses are there but these are some of them.', ''),
(130, 63, 'Principles of Software Engineering\nSeparation of Concerns. Separation of concerns is a recognition of the need for human beings to work within a limited context.\nModularity. The principle of modularity is a specialization of the principle of separation of concerns.\nAbstraction.\nAnticipation of Change.\nGenerality.\nIncremental Development.', ''),
(131, 61, 'top 10 Algorithms Every Software Engineer Should Know by Heart\nSort algorithm: Today, most of the developer use the sorting algorithm and students are mostly studied this sorting concept in computer science. ...\nHashing.\nThe list, array, and stack.\nSearching algorithm.\nString matching and parsing.\nPriority Queues.\nData structure and graph algorithm.\nState space search algorithm.', ''),
(132, 67, 'python\nPython has a philosophy that helps to write better for understanding code.\n2. Language evolution planning using PEPs - you know what you get in a next few years. PHP development process looks chaotic: making OOP like a something in Java, then add some \"static typing\" collections, then include some lambdas and namespaces (almost after 15 years of development). What\'s next?\n3. Python has more compact and clean syntax that helps developers,\n4. In Python the same things can be done the same way.\nThere is no matter what iterable things you using (list, tuple, string  or something else) you always can access by index, get a slice, iterate  over it or get the length the same way. No strlen()/count(), substr()  and a lot of other functions.\n5. More predictable and strict.', ''),
(133, 78, 'Big Data Hadoop is the current technology. So if you want to learn Hadoop then it is a very good time to start your career in this booming technology. I got really good hike after switching to Big data Hadoop. So I will highly recommend that start learning Hadoop from now. Donâ€™t waste your time.\n\nToday Big Data is the biggest buzz word in the industry and each and every individual is looking to make a career shift in this emerging and trending technology Apache Hadoop. So you have to make stand out from them.\n\nYou can easily learn Hadoop if you will work hard and give your dedication towards study. For learning Hadoop, you have to go through the sets of free blogs and free videos available on the internet.', '119'),
(135, 89, 'Test', '42'),
(136, 89, 'tetdff', '42'),
(137, 89, 'This is Tet', '42'),
(138, 89, 'This is Test', '42');

-- --------------------------------------------------------

--
-- Table structure for table `user_followers`
--

CREATE TABLE `user_followers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `follower_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_followers`
--

INSERT INTO `user_followers` (`id`, `user_id`, `follower_id`) VALUES
(53, 42, 35),
(59, 35, 42),
(57, 35, 43),
(64, 42, 43),
(65, 42, 43),
(66, 42, 65),
(67, 42, 64),
(68, 42, 68),
(69, 42, 67),
(70, 42, 70),
(71, 71, 64),
(72, 64, 71),
(73, 64, 66),
(74, 64, 42),
(75, 72, 64),
(76, 42, 42),
(77, 85, 42),
(78, 85, 65),
(79, 85, 66),
(80, 85, 71),
(82, 42, 73),
(83, 42, 86),
(84, 86, 42),
(85, 86, 72),
(86, 91, 42),
(87, 42, 71),
(88, 119, 65),
(89, 65, 77),
(90, 0, 42),
(91, 42, 72);

-- --------------------------------------------------------

--
-- Table structure for table `user_questions`
--

CREATE TABLE `user_questions` (
  `q_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `question` text,
  `description` text,
  `asked_by` varchar(55) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_questions`
--

INSERT INTO `user_questions` (`q_id`, `cat_id`, `question`, `description`, `asked_by`) VALUES
(65, 2, ' How can I get an internship in a software house', '', '42'),
(64, 1, ' Which are the top paying software houses in Karachi?', '', '71'),
(63, 2, ' What are principles of good software engineering?', '', '42'),
(61, 2, 'What are the top 10 algorithms every software engineer should know by heart?', '', '42'),
(62, 2, ' What should every programmer know about statistics?', '', '42'),
(60, 2, ' Do programmers have some coding secrets that are only learnt by experience?', '', '42'),
(59, 2, 'What\'s the most important lesson you\'ve learned as a software  engineer?', '', '42'),
(66, 1, ' When you started your own software business how did you find your own particular niche?', '', '42'),
(67, 2, ' Which is better, PHP or Python? Why?', '', '42'),
(68, 2, 'Should I learn PHP today? Is it still worth it?', '', '42'),
(69, 2, 'Is WordPress a PHP framework?', '', '92'),
(70, 2, 'What are some tricks to learn Java quickly?', '', '42'),
(71, 1, ' Where do I learn about Blockchain', '', '42'),
(72, 1, ' How can I start a career in blockchain technology?', '', '65'),
(73, 1, ' What are good software product companies in Karachi?', '', '42'),
(74, 2, 'How did you get your first web developer job?', '', '91'),
(75, 2, ' Are web development jobs stable?', '', '42'),
(76, 2, 'What is the best way to find freelance work as a web developer?', '', '42'),
(77, 2, 'What is the best way to find freelance work as a web developer?', '', '72'),
(78, 2, ' How should I start learning Hadoop?', '', '42'),
(79, 2, ' Is data science a good career option?', '', '42'),
(80, 2, 'How should I learn Python for machine learning and artificial intelligence?', '', '42'),
(81, 2, 'Is Systems Limited the best software house in Lahore?', '', '42'),
(82, 2, ' What is the future of the JavaScript developer (ReactJS)?', '', '77'),
(83, 2, ' Which language is going to dominate the future of web development: JavaScript, PHP, Ruby, Java/Scala, or Python?', '', '42'),
(84, 2, 'How do I host a Java web application?', '', '42'),
(85, 2, 'What type of tech publications do software engineers read?', '', '42'),
(86, 1, ' Can anyone share a list of software houses in Pakistan?', '', '42'),
(87, 2, ' What is the lowest salary you have ever been offered as a software developer?', '', '42'),
(88, 2, 'Salary Comparisons: Which profession earns more software testing or software developer?', '', '42'),
(89, 2, 'Should I use MySQL in Node.js?', '', '42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`),
  ADD KEY `par_ind1` (`u_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `par_ind3` (`exp_id`),
  ADD KEY `par_ind4` (`comment_by`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`exp_id`),
  ADD KEY `par_ind2` (`posted_by`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `par_ind5` (`exp_id`),
  ADD KEY `par_ind6` (`liked_by`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`noti_id`),
  ADD KEY `par_ind7` (`exp_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `like_id` (`like_id`);

--
-- Indexes for table `notify_discuss`
--
ALTER TABLE `notify_discuss`
  ADD PRIMARY KEY (`Notify_Id`);

--
-- Indexes for table `notify_discuss_user`
--
ALTER TABLE `notify_discuss_user`
  ADD PRIMARY KEY (`Notify_User_Id`);

--
-- Indexes for table `questions_cat`
--
ALTER TABLE `questions_cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `referrer_id` (`referrer_id`),
  ADD KEY `refereed_id` (`refereed_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `par_ind10` (`ans_by`),
  ADD KEY `par_ind11` (`question_id`);

--
-- Indexes for table `user_followers`
--
ALTER TABLE `user_followers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `par_ind12` (`user_id`),
  ADD KEY `par_ind13` (`follower_id`);

--
-- Indexes for table `user_questions`
--
ALTER TABLE `user_questions`
  ADD PRIMARY KEY (`q_id`),
  ADD KEY `par_ind8` (`cat_id`),
  ADD KEY `par_ind9` (`asked_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `noti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `notify_discuss`
--
ALTER TABLE `notify_discuss`
  MODIFY `Notify_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notify_discuss_user`
--
ALTER TABLE `notify_discuss_user`
  MODIFY `Notify_User_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions_cat`
--
ALTER TABLE `questions_cat`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `user_answers`
--
ALTER TABLE `user_answers`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `user_followers`
--
ALTER TABLE `user_followers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `user_questions`
--
ALTER TABLE `user_questions`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `about`
--
ALTER TABLE `about`
  ADD CONSTRAINT `about_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`exp_id`) REFERENCES `experiences` (`exp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`comment_by`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `experiences`
--
ALTER TABLE `experiences`
  ADD CONSTRAINT `experiences_ibfk_1` FOREIGN KEY (`posted_by`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`exp_id`) REFERENCES `experiences` (`exp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`liked_by`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`exp_id`) REFERENCES `experiences` (`exp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`comment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notification_ibfk_3` FOREIGN KEY (`like_id`) REFERENCES `likes` (`like_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `referrals`
--
ALTER TABLE `referrals`
  ADD CONSTRAINT `referrals_ibfk_1` FOREIGN KEY (`referrer_id`) REFERENCES `users` (`u_id`),
  ADD CONSTRAINT `referrals_ibfk_2` FOREIGN KEY (`refereed_id`) REFERENCES `users` (`u_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
