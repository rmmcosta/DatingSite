-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 09, 2019 at 05:55 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datingsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `datingcategories`
--

DROP TABLE IF EXISTS `datingcategories`;
CREATE TABLE IF NOT EXISTS `datingcategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `datingresponses`
--

DROP TABLE IF EXISTS `datingresponses`;
CREATE TABLE IF NOT EXISTS `datingresponses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topicid` int(11) NOT NULL,
  `response` tinyint(4) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `topicid` (`topicid`),
  KEY `idx_userid` (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `datingtopics`
--

DROP TABLE IF EXISTS `datingtopics`;
CREATE TABLE IF NOT EXISTS `datingtopics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic` varchar(150) NOT NULL,
  `categoryid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_id` (`categoryid`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `datingusers`
--

DROP TABLE IF EXISTS `datingusers`;
CREATE TABLE IF NOT EXISTS `datingusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `isadmin` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `datingusersimage`
--

DROP TABLE IF EXISTS `datingusersimage`;
CREATE TABLE IF NOT EXISTS `datingusersimage` (
  `datinguserid` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  KEY `datinguserid` (`datinguserid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `datingusersinfo`
--

DROP TABLE IF EXISTS `datingusersinfo`;
CREATE TABLE IF NOT EXISTS `datingusersinfo` (
  `datinguserid` int(11) NOT NULL,
  `firstname` varchar(150) DEFAULT NULL,
  `lastname` varchar(150) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  KEY `datinguserid` (`datinguserid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
