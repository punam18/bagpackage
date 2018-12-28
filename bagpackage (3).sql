-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2018 at 04:27 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bagpackage`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`cid` int(5) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(300) NOT NULL,
  `persons` varchar(5) NOT NULL,
  `added_on` date NOT NULL,
  `status` enum('0','1') NOT NULL COMMENT '0 inactive,1 active'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `firstname`, `lastname`, `phone`, `email`, `address`, `persons`, `added_on`, `status`) VALUES
(1, 'poonam', 'verma', '8779125354', 'punam@krer.fgf', 'fgfgfg', '6', '2018-08-18', '1'),
(2, 'poonam', 'verma', '8779125354', 'punam@krer.fgf', 'fgfgfg', '6', '2018-08-18', '1');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
`location_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `place_name` varchar(200) NOT NULL,
  `details` varchar(300) NOT NULL,
  `location_added_by` datetime NOT NULL,
  `status` enum('0','1') NOT NULL COMMENT '0 inactive,1 active'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `image`, `place_name`, `details`, `location_added_by`, `status`) VALUES
(1, '{914e9be1-50d2-6046-f1ec-77931aca0c05}.jpg', 'harihar fortetet', 'kuch bhi', '2018-08-06 17:21:33', '0'),
(2, '{8b0cb652-b8f6-daa7-ba14-9c354bd8adc8}.jpg', 'harihar fort', 'klrgkjgbbg rgerkerg ergrgrg ergergwerg', '2018-08-07 17:59:27', '1');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE IF NOT EXISTS `packages` (
`package_id` int(30) NOT NULL,
  `image` text NOT NULL,
  `place_name` varchar(250) NOT NULL,
  `price` varchar(30) NOT NULL,
  `days` varchar(200) NOT NULL,
  `travel_by` varchar(300) NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('0','1') NOT NULL COMMENT '0 inactive,1 active'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`package_id`, `image`, `place_name`, `price`, `days`, `travel_by`, `uploaded_on`, `status`) VALUES
(1, '{17e48f96-bdd5-99ca-fa48-80d8af5f2153}.jpg', 'harihar fortetet', 'asdas', 'asdsa', 'nusd', '2018-08-06 11:20:39', '0'),
(2, '{8b9a3e51-fe12-a954-913d-f5d37d104ea4}.jpg', 'harihar fort', '234234', 'grertet', 'dgdfg', '2018-08-07 18:00:41', '0'),
(3, '{073098c9-707c-8912-59ca-6920528a4c0b}.jpg', 'harihar fort', 'asd', 'asd', 'asd', '2018-08-19 17:43:36', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `user_password` varchar(1000) NOT NULL,
  `status` enum('0','1') NOT NULL COMMENT '0 inactive,1 active'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `user_password`, `status`) VALUES
(1, 'admin@admin.com', '6855f09986fe28ed7e8cdd9d60db878d898703d5', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
 ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
 ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `cid` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
MODIFY `package_id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
