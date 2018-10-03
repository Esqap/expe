-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2018 at 07:58 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expe`
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
  `website` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `u_id`, `country`, `language`, `interest`, `about`, `school`, `college`, `skills`, `mobile`, `website`) VALUES
(4, 42, 'Afghanistan', 'English, Urdu', 'IT', 'Co-Founder At LatestExperience.com.								', 'Eagle House School', 'Eagle House College', 'Web Developer', '+923063287306', 'https://www.latestexperience.com');

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
(1, 218, 'asd asdasd', 'mohsin_1995@yahoo.com', '2018-02-14 19:51:44');

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
(194, 'Couple of days ago i ordered food from BABA iryani bahadrabad.\nIt was one of the best biryani I have ever had. Deliver right on time.', 'affan.shahab@outlook.com', '2017-09-19 14:01:01', 'Other', 'Awesome experience', NULL),
(204, 'Learning #Math is fun only if it is taught in a funny manner.I was preparing for my statistics and probability exam and I observe that how useful it i', 'haniabidkz@gmail.com', '2017-09-26 12:51:01', 'Education', 'Math is Real Fun !', '#Math'),
(207, '#Blogging is much more than you think. Results will not come instantly. Do it with passion. Well this strategy apply to every work you do. I am just specific to Blogging.', 'haniabidkz@gmail.com', '2017-09-26 13:02:03', 'Information Technology', '', '#Blogging'),
(208, 'Keeping Your Programming Code Organized is one of the Way You can Handle Error. Believe me or Not Organization matter Alot', 'haniabidkz@gmail.com', '2017-09-27 12:57:13', 'Information Technology', 'Code in a Organized Manner', NULL),
(209, 'Keeping Your #Programming Code Organized is one of the Way You can Handle Errors. Believe me or Not Organization matter Alot', 'haniabidkz@gmail.com', '2017-09-27 12:59:14', 'Information Technology', 'Code in Organized Manner', '#Programming'),
(210, 'A man learns from his experience. But it was a need of a place where actually the experienced peoples could share their life experiences so that anyone can learn from them. So keeping this aim in mind we developed LatestExperience.com a one stop shop for all the Latest Experiences !', 'haniabidkz@gmail.com', '2017-09-27 13:05:13', 'Education', 'Learn from experiences and Implement them practically', NULL),
(211, 'Before Coding always plan that what you will code. Make a rough algorithm in your native language.This will help you alot during coding process.', 'haniabidkz@gmail.com', '2017-09-27 13:18:56', 'Information Technology', 'Code with a proper plan', NULL),
(212, 'Good 1!', 'mohsin_1995@yahoo.com', '2017-10-07 06:58:30', 'Experience Related To', '', NULL),
(213, 'This is a Post', 'haniabidkz@gmail.com', '2017-10-08 07:29:49', 'Experience Related To', '', NULL),
(214, 'ghhgh', 'haniabidkz@gmail.com', '2017-10-08 07:34:26', 'Experience Related To', '', NULL),
(215, 'im new here #noob', 'zaid296imtiaz@gmail.com', '2017-10-25 13:50:33', 'How to & Style', 'smells good tho', '#noob'),
(216, 'wats up.!', 'moixahmed333@yahoo.com', '2017-10-27 05:43:45', 'Other', '', NULL),
(217, '#PHP is a Simple and Lightweight Language for Developing Web Application But Beware It will be difficult to manage the files when the code increases. ', 'haniabidkz@gmail.com', '2017-11-12 03:55:55', 'Information Technology', 'Organized the Code in PHP Unless Code Messed Up.', '#PHP'),
(218, 'Focus On Programming Concept not in a Programming Language !', 'Haniabidkz@gmail.com', '2017-12-13 10:09:36', 'Computer', '', NULL),
(219, 'Thid', 'haniabidkz@gmail.com', '2018-02-17 08:51:00', 'Category', '', NULL),
(220, 'ssdd', 'haniabidkz@gmail.com', '2018-02-17 08:51:10', 'Category', '', NULL);

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
  `checked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`noti_id`, `email`, `msg`, `exp_id`, `action_by`, `checked`) VALUES
(2, 'Haniabidkz@gmail.com', 'mohsin_1995@yahoo.com commented on your experience.', 218, 'mohsin_1995@yahoo.com', 1);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(60) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `notify` int(11) DEFAULT NULL,
  `image` text,
  `verified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `Name`, `email`, `pass`, `notify`, `image`, `verified`) VALUES
(42, 'Hasnain Abid Khanzada', 'haniabidkz@gmail.com', 'killerkz@)!^megamind@)!^', 0, 'images/Hasnain Abid Khanzada.jpg', 1),
(64, 'Syed Mohsin Ali', 'mohsin_1995@yahoo.com', '123456789', 0, 'images/Syed Mohsin Ali.jpg', 1),
(65, 'Ghazal khan', 'khanzadaghazal@gmail.com', 'pakistan123', 1, 'images/default.jpeg', 1),
(66, 'Maaz', 'maazmehtabuddin95@gmail.com', '123456789', 0, 'images/default.jpeg', 1),
(67, 'Affan Shahab', 'affan.shahab@outlook.com', 'LatestExperience', 1, 'images/default.jpeg', 1),
(68, 'Umair Malik', 'umairmalikavan@gmail.com', 'Um787898', 0, 'images/default.jpeg', 1),
(69, 'vipod dd', 'lekuyec@vipepe.com', 'keeping1234', 0, 'images/default.jpeg', 1),
(70, 'Affan Shaikh', 'affansheikh16@gmail.com', 'desire720', 0, 'images/default.jpeg', 1),
(71, 'Zaid Imtiaz', 'zaid296imtiaz@gmail.com', 'hahaha12345', 1, 'images/default.jpeg', 1),
(72, 'Moiz khan', 'moixahmed333@yahoo.com', 'moizkhan', 0, 'images/default.jpeg', 1),
(73, 'maaz mehtab', 'maaz95@gmail.com', '12121212', 0, 'images/default.jpeg', 0),
(74, 'Segeriou Rami', 'vickyvk019@gmail.com', 'vicky645', 0, 'images/default.jpeg', 1),
(75, 'izharkhokhar', 'izharkhokhar00@gmail.com', 'warjyareo', 0, 'images/default.jpeg', 1),
(76, 'Jeet Kumar ', 'jeetkramnani@gmail.com', 'jeetkramnani123', 0, 'images/default.jpeg', 1),
(77, 'Ravendhar Kumar Lalwani', 'lalwanir4@gmail.com', 'google37', 0, 'images/default.jpeg', 0),
(78, 'abdul', 'abdulmaroofy@gmail.com', '4277736abc', 0, 'images/default.jpeg', 0),
(79, 'Rixo', 'm.rizwan0549@gmail.com', 'Uzumymw5400549', 0, 'images/default.jpeg', 0),
(80, 'Usman Shaikh', 'mythz1996@hotmail.com', 'hayabusa1300', 0, 'images/default.jpeg', 1);

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
(76, 42, 42);

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
  ADD KEY `par_ind7` (`exp_id`);

--
-- Indexes for table `questions_cat`
--
ALTER TABLE `questions_cat`
  ADD PRIMARY KEY (`cat_id`);

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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `noti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `questions_cat`
--
ALTER TABLE `questions_cat`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `user_answers`
--
ALTER TABLE `user_answers`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `user_followers`
--
ALTER TABLE `user_followers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `user_questions`
--
ALTER TABLE `user_questions`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

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
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`exp_id`) REFERENCES `experiences` (`exp_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
