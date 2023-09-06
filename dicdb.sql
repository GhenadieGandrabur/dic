-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2023 at 08:58 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dicdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `name`, `email`, `password`) VALUES
(1, 'Kevin Yank', 'thatguy@kevinyank.com', ''),
(2, 'Tom Butler', 'tom@r.je', ''),
(5, 'Ghena', 'info@tahograf.md', '$2y$10$DphoBDqBv1h5/PLxS3pIHO0zK8ROvznwdbvQ4.PdNaLi/CNH75aXe');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Programming Jokes'),
(2, 'One Liners');

-- --------------------------------------------------------

--
-- Table structure for table `joke`
--

CREATE TABLE `joke` (
  `id` int(11) NOT NULL,
  `joketext` text DEFAULT NULL,
  `jokedate` date NOT NULL,
  `authorId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `joke`
--

INSERT INTO `joke` (`id`, `joketext`, `jokedate`, `authorId`) VALUES
(1, 'How many programmers does it take to screw in a lightbulb? None, it\'s a hardware problem.', '2017-04-01', 1),
(2, 'Why did the programmer quit his job? He didn\'t get arrays', '2017-04-01', 1),
(3, 'Why was the empty array stuck outside? It didn\'t have any keys', '2017-04-01', 2),
(20, 'How do functions break up? They stop calling each other', '2017-08-09', 2),
(21, 'How do you tell HTML from HTML5? Try it out in Internet Explorer. Did it work? No? It\'s HTML5', '2017-08-09', 2),
(22, 'You don\'t need any training to be a litter picker, you pick it up as you go', '2017-08-09', 2);

-- --------------------------------------------------------

--
-- Table structure for table `joke_category`
--

CREATE TABLE `joke_category` (
  `jokeId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `joke_category`
--

INSERT INTO `joke_category` (`jokeId`, `categoryId`) VALUES
(17, 1),
(17, 2),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 1),
(22, 2),
(23, 1);

-- --------------------------------------------------------

--
-- Table structure for table `word`
--

CREATE TABLE `word` (
  `id` int(11) NOT NULL,
  `authorId` int(11) NOT NULL,
  `first_language` varchar(255) NOT NULL,
  `second_language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `word`
--

INSERT INTO `word` (`id`, `authorId`, `first_language`, `second_language`) VALUES
(1, 1, 'good', 'хорошо'),
(2, 1, 'day', 'день'),
(3, 1, 'week', 'неделя'),
(4, 5, 'go', 'идти');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `joke`
--
ALTER TABLE `joke`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `joke_category`
--
ALTER TABLE `joke_category`
  ADD PRIMARY KEY (`jokeId`,`categoryId`);

--
-- Indexes for table `word`
--
ALTER TABLE `word`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `joke`
--
ALTER TABLE `joke`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `word`
--
ALTER TABLE `word`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
