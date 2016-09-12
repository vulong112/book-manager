-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2016 at 09:15 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `managerbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int(10) NOT NULL,
  `fullname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `phonenumber` int(11) UNSIGNED DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `address` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `fullname`, `email`, `phonenumber`, `birthday`, `address`) VALUES
(101, 'adfdsfs', 'dsfsd@gmail.com', 123, '0000-00-00', 'etst'),
(123, 'adfdsfs', 'dsfsd@gmail.com', 123, '0000-00-00', '0000-00-00'),
(124, 'adfdsfs', 'dsfsd@gmail.com', 123, '0000-00-00', '0000-00-00'),
(127, 'adfdsfs', 'dsfsd@gmail.com', 123, '0000-00-00', '0000-00-00'),
(129, 'bnvbn', 'erwer@gmail.com', 0, '1234-12-12', '1234-12-12'),
(130, 'adfdsfs', 'dsfsd@gmail.com', 123, '0000-00-00', '0000-00-00'),
(132, 'adfdsfs', 'dsfsd@gmail.com', 123, '0000-00-00', '0000-00-00'),
(139, 'adfdsfs', 'dsfsd@gmail.com', 123, '0000-00-00', '0000-00-00'),
(140, 'sdf', 'sdfs@fds.dsf', 1234, '0000-00-00', 'dsf233');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(10) NOT NULL,
  `book_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) DEFAULT NULL,
  `author_id` int(10) DEFAULT NULL,
  `published_year` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_name`, `category_id`, `author_id`, `published_year`) VALUES
(200, 'Detective Conan', NULL, NULL, 1998),
(201, 'Naruto', NULL, NULL, 1997),
(203, 'Sá»‘ Äá»', NULL, NULL, 1994),
(208, 'test', 303, NULL, 1234),
(222, 'testdfsdf', 303, NULL, 12345),
(223, 'zxcc', NULL, NULL, 0),
(227, 'dfgdfg', NULL, NULL, 997),
(230, 'ipuiou', 305, NULL, 1234),
(231, 'bnnb', 303, NULL, 1991);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(302, 'Fiction'),
(303, 'Romance'),
(304, 'History'),
(305, 'Travel'),
(306, 'Philosophy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `fk_book_cate` (`category_id`),
  ADD KEY `fk_book_author` (`author_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=307;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `fk_book_author` FOREIGN KEY (`author_id`) REFERENCES `author` (`author_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_book_cate` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE SET NULL ON UPDATE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
