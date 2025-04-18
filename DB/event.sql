-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 26, 2025 at 03:19 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `event`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `eventid` int(10) NOT NULL,
  `Event_Name` varchar(50) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Event_time` varchar(50) NOT NULL,
  `eventdate` varchar(50) NOT NULL,
  `Bookingdate` varchar(50) NOT NULL,
  `others` varchar(50) NOT NULL,
  `uname` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `eventid`, `Event_Name`, `Category`, `Event_time`, `eventdate`, `Bookingdate`, `others`, `uname`) VALUES
(5, 5, 'sports', 'sports', '12', '12/4/2021', '06/03/2021', 'otherssss', 'venket@gmail.com'),
(42, 10, 'Drama', 'Culturals', '11:00 AM', '29/03/2025', '25/03/2025', '', 'nandhiniazt@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `edate` varchar(50) DEFAULT NULL,
  `eventtime` varchar(50) DEFAULT NULL,
  `venue` varchar(50) DEFAULT NULL,
  `staff` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `category`, `edate`, `eventtime`, `venue`, `staff`, `status`) VALUES
(6, 'Sports', 'Cricket', '12/02/2025', '11:00 AM', 'Sports ground 2', 'Anu', 'Active'),
(17, 'Drama', 'Culturals', '29/03/2025', '11:00 AM', 'Seminar Hall 2', 'ravi', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `Uname` varchar(100) NOT NULL,
  `Feedback` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `Uname`, `Feedback`) VALUES
(4, 'ravi', 'good'),
(5, 'Anu', 'what is the time of the sports event?'),
(6, 'Nandhini', 'what is the time of the sports event?');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `uname`, `password`, `department`, `email`, `mobile`, `status`) VALUES
(2, 'jeeva', 'jeeva', 'jeeva', 'cs', 'jeeva@in.com', '987446621', 'Active'),
(3, 'ravi', 'ravi', 'ravi1', 'bsc cs', 'ravi@gmail.com', '9003502338', 'Active'),
(4, 'Anu', 'Anu', 'Anu', 'Sports', 'anu@gmail.com', '8976125499', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tab_user`
--

CREATE TABLE IF NOT EXISTS `tab_user` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(500) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tab_user`
--

INSERT INTO `tab_user` (`id`, `first_name`, `last_name`, `email_id`, `password`, `address`, `city`, `state`, `country`, `mobile`, `phone`, `status`) VALUES
(5, 'arun', 'fdf', 'arun@gmail.com', '123', 'fdfd', 'coimbatore', 'Tamilnadu', 'INDIA', '86434343434', '84673453543', '0'),
(12, 'Nandhini', 'B', 'nandhiniazt@gmail.com', 'Nandhini', 'Thottipalayam', 'Erode', 'TamilNadu', 'India', '9976125009', '9080706540', '0');
