-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2019-03-29 15:34:25
-- 服务器版本： 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinemaapp`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminPassword` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`adminID`, `adminName`, `adminPassword`) VALUES
(1, 'admin', '7fef6171469e80d32c0559f88b377245');

-- --------------------------------------------------------

--
-- 表的结构 `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `director` varchar(255) DEFAULT NULL,
  `runtime` varchar(255) DEFAULT NULL,
  `year` varchar(32) DEFAULT NULL,
  `price` varchar(255) NOT NULL,
  `admin_id` int(11) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(4) NOT null DEFAULT 0 comment '0:not deleted;1: is deleted'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `movies`
--

INSERT INTO `movies` (`id`, `title`, `genre`, `director`, `runtime`, `year`, `price`, `admin_id`) VALUES
(1, 'iron man', 'Marvel, Action, Adventure, Sci-Fi', 'Jon Favreau', '126 min', '2008', '$12.00', 1),
(2, 'iron man 2', 'Disney, marvel,Action, Adventure, Sci-Fi', 'Jon Favreau', '124 min', '2010', '$16.99', 1),
(3, 'x men first class', 'Action, Adventure, Sci-Fi', 'Matthew Vaughn', '132 min', '2011', '$8.88', 1),
(4, 'the wolverine', 'Action, Adventure, Sci-Fi', 'James Mangold', '126 min', '2013', '$10.00', 1),
(5, 'begin again', 'Drama, Music', 'John Carney', '104 min', '2013', '$9.99', 1),
(6, 'tammy', 'Comedy', 'Ben Falcone', '97 min', '2014', '$6.99', 1),
(7, 'kick-ass', 'Action, Comedy', 'Matthew Vaughn', '117 min', '2010', '$5.68', 1),
(8, 'transformers revenge of the fallen', 'Action, Adventure, Sci-Fi', 'Michael Bay', '150 min', '2009', '$11.11', 1),
(9, 'kick-ass 2', 'Action, Comedy, Crime', 'Jeff Wadlow', '103 min', '2013', '$23.58', 1),
(10, 'elektra', 'Action, Crime, Fantasy', 'Rob Bowman', '97 min', '2005', '$14.13', 1);

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `nickName` varchar(255) NOT NULL DEFAULT '',
  `userPassword` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`),
  ADD UNIQUE KEY `adminID` (`adminID`),
  ADD KEY `adminID_2` (`adminID`),
  ADD KEY `adminID_3` (`adminID`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1053;

--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- create table for record user who buy movie
create table user_movie_rlt(
  `ID`int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL default 0,
  `movieID` int(11) NOT NULL default 0,
  `buy_time` datetime,
  PRIMARY KEY (`ID`)
)ENGINE=InnoDB;
