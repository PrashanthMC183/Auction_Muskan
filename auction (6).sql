-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 08, 2018 at 07:50 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `auction`
--
CREATE DATABASE IF NOT EXISTS `auction` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `auction`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`username`, `password`) VALUES
('suneha', 'muskan');

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE IF NOT EXISTS `bid` (
  `bid_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `sellerid` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `biddate` datetime NOT NULL,
  `bidamt` double NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`bid_id`),
  KEY `uid` (`uid`,`prod_id`),
  KEY `prod_id` (`prod_id`),
  KEY `sellerid` (`sellerid`),
  KEY `uid_2` (`uid`),
  KEY `prod_id_2` (`prod_id`),
  KEY `sellerid_2` (`sellerid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `bid`
--

INSERT INTO `bid` (`bid_id`, `uid`, `sellerid`, `prod_id`, `biddate`, `bidamt`, `status`) VALUES
(6, 3, 10, 10, '2018-03-07 12:26:58', 30000, 'bid'),
(7, 3, 10, 7, '2018-03-07 12:36:43', 4000, 'bid'),
(8, 9, 10, 9, '2018-03-07 12:41:19', 200, 'bid'),
(9, 9, 10, 10, '2018-03-07 12:41:35', 31000, 'bid'),
(10, 9, 10, 7, '2018-03-07 12:41:51', 3700, 'bid'),
(11, 9, 10, 7, '2018-03-08 07:59:33', 4200, 'bid'),
(12, 11, 5, 11, '2018-03-08 08:07:53', 280, 'bid'),
(13, 10, 10, 10, '2018-03-08 10:58:01', 32000, 'bid'),
(14, 9, 5, 8, '2018-03-08 12:42:14', 0, 'bid'),
(15, 9, 10, 9, '2018-03-08 12:46:35', 230, 'bid'),
(16, 9, 10, 9, '2018-03-08 12:53:34', 0, 'bid');

-- --------------------------------------------------------

--
-- Table structure for table `bid_payment`
--

CREATE TABLE IF NOT EXISTS `bid_payment` (
  `payid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `bid_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `paiddate` date NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`payid`),
  KEY `uid` (`uid`,`bid_id`),
  KEY `bid_id` (`bid_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(40) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cname`) VALUES
(3, 'Artemis Gallery'),
(6, 'Apartments'),
(8, 'Electronics'),
(9, 'Interior'),
(10, 'Motors'),
(12, 'Fashion'),
(13, 'Books'),
(14, 'Electronic parts');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `sellerid` int(11) NOT NULL,
  `comment` longtext NOT NULL,
  `datetime` datetime NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`com_id`),
  KEY `uid` (`uid`,`sellerid`),
  KEY `sellerid` (`sellerid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`com_id`, `uid`, `sellerid`, `comment`, `datetime`, `status`) VALUES
(1, 9, 10, 'dfghj', '2018-03-08 13:11:28', 'sent');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `fcontent` longtext NOT NULL,
  `fdate` date NOT NULL,
  `fcategory` varchar(40) NOT NULL,
  PRIMARY KEY (`fid`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `user_id`, `fcontent`, `fdate`, `fcategory`) VALUES
(1, 3, ' some issues in displaying the products...!!\r\n							', '2018-02-21', 'bad'),
(2, 3, ' \r\n							', '2018-02-21', ''),
(3, 5, 'very much useful \r\n							', '2018-02-22', 'good'),
(4, 3, 'working well..!! \r\n							', '2018-02-23', 'good');

-- --------------------------------------------------------

--
-- Table structure for table `hostproduct`
--

CREATE TABLE IF NOT EXISTS `hostproduct` (
  `reqid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `prid` int(11) NOT NULL,
  `hoston` datetime NOT NULL,
  `tilldate` datetime NOT NULL,
  `reqdate` datetime NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`reqid`),
  KEY `uid` (`uid`,`prid`),
  KEY `reqid` (`reqid`),
  KEY `prid` (`prid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `hostproduct`
--

INSERT INTO `hostproduct` (`reqid`, `uid`, `prid`, `hoston`, `tilldate`, `reqdate`, `status`) VALUES
(3, 5, 8, '2018-02-01 11:11:00', '2018-02-15 12:12:00', '2018-02-13 12:33:20', 'Hosted'),
(4, 5, 5, '2018-02-01 11:11:00', '2018-02-15 12:12:00', '2018-02-13 12:35:13', 'Hosted'),
(6, 10, 9, '2018-02-27 09:12:00', '2018-03-07 10:00:00', '2018-03-01 11:04:19', 'Hosted'),
(7, 10, 7, '2018-03-07 02:58:00', '2018-03-14 05:35:00', '2018-03-07 11:32:00', 'Hosted'),
(8, 10, 10, '2018-03-02 11:06:00', '2018-03-17 03:17:00', '2018-03-07 11:43:19', 'Hosted'),
(9, 5, 11, '2018-03-01 01:01:00', '2018-03-16 05:54:00', '2018-03-08 08:05:11', 'Hosted'),
(10, 10, 9, '2018-03-02 06:56:00', '2018-03-23 13:37:00', '2018-03-08 11:06:16', 'Hosted');

-- --------------------------------------------------------

--
-- Table structure for table `mail_us`
--

CREATE TABLE IF NOT EXISTS `mail_us` (
  `mail_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `message` longtext NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`mail_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `mail_us`
--

INSERT INTO `mail_us` (`mail_id`, `name`, `email`, `contact`, `message`, `date`) VALUES
(1, 'muskan', 'muskan@gmail.com', 123456, 'abjjsjkanmzn,m', '2017-12-27'),
(2, 'Aysha', 'aysha.muskan@gmail.com', 8123456789, 'first trial', '2018-01-04'),
(3, 'muskan', 'ayshamuskan576@gmail.com', 12345667, 'aaaaaaaaaavvv', '2018-01-11'),
(4, 'Aysha', 'aysha.muskan@gmail.com', 9087543, 'let''s see', '2018-01-11'),
(5, 'sana', 'sana@yahoo.com', 9988043511, 'Very good site for auction...!!!', '2018-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `newsreq`
--

CREATE TABLE IF NOT EXISTS `newsreq` (
  `nr_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `productname` varchar(30) NOT NULL,
  `desc` longtext NOT NULL,
  `postonbefore` date NOT NULL,
  `req_sent` date NOT NULL,
  `image` varchar(150) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`nr_id`),
  UNIQUE KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE IF NOT EXISTS `package` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `ptitle` varchar(30) NOT NULL,
  `pamt` double NOT NULL,
  `pvalidity` varchar(30) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`pid`, `ptitle`, `pamt`, `pvalidity`) VALUES
(2, 'premium', 300, '3'),
(4, 'gold', 600, '6'),
(5, 'silver', 250, '4');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `cvv` int(33) NOT NULL,
  `card_no` bigint(20) NOT NULL,
  `hname` varchar(20) NOT NULL,
  `exp_month` varchar(20) NOT NULL,
  `exp_year` varchar(20) NOT NULL,
  PRIMARY KEY (`payid`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payid`, `uid`, `cvv`, `card_no`, `hname`, `exp_month`, `exp_year`) VALUES
(1, 5, 123, 1234567890123456, 'abc', '12', '2023');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `user_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `productname` varchar(40) NOT NULL,
  `subc_id` int(11) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `desc` longtext NOT NULL,
  `min_range` double NOT NULL,
  PRIMARY KEY (`pro_id`),
  KEY `user_id` (`user_id`),
  KEY `subc_id` (`subc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`user_id`, `pro_id`, `productname`, `subc_id`, `photo`, `desc`, `min_range`) VALUES
(10, 5, 'Apple Iphone 4G set', 9, '39234-iphone.jpeg', 'Second hand user', 34000),
(5, 7, 'nokia2', 9, '12202-mobile.jpg', 'new set', 3000),
(3, 8, 'Nature painting', 12, '6344-orange2.jpg', 'Painting', 1500),
(10, 9, 'Text book', 21, '85749-p4.png', 'Third year BCA text book ', 150),
(3, 10, 'Angel apartment', 3, '10009-city3.jpg', 'Angel apartment for rent', 25000),
(5, 11, 'Trendy look', 17, '28170-t3.jpg', 'Skirt and blowse', 230);

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE IF NOT EXISTS `query` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `qcontent` longtext NOT NULL,
  `sellerid` int(11) NOT NULL,
  `qdate` datetime NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`qid`),
  KEY `uid` (`uid`,`sellerid`),
  KEY `sellerid` (`sellerid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `replyquery`
--

CREATE TABLE IF NOT EXISTS `replyquery` (
  `rqid` int(11) NOT NULL AUTO_INCREMENT,
  `qid` int(11) NOT NULL,
  `reply` longtext NOT NULL,
  `rdatetime` datetime NOT NULL,
  PRIMARY KEY (`rqid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
  `subcid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `subcategory` varchar(40) NOT NULL,
  PRIMARY KEY (`subcid`),
  KEY `cid` (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcid`, `cid`, `subcategory`) VALUES
(3, 6, 'Rent'),
(5, 8, 'Laptops & Computer'),
(9, 8, 'Mobiles'),
(10, 3, 'Arts & Crafts'),
(12, 3, 'Paintings'),
(13, 9, 'Asian antique furnitures'),
(14, 9, 'Modern Furniture'),
(15, 9, 'Kitchen'),
(16, 12, 'Jewellery'),
(17, 12, 'Dresses'),
(18, 10, 'Cars'),
(19, 10, 'Motorcycle'),
(20, 13, 'Magazines'),
(21, 13, 'Other books'),
(22, 6, 'Leeze'),
(23, 14, 'Computer parts');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE IF NOT EXISTS `subscription` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `subdate` date NOT NULL,
  `enddate` date NOT NULL,
  PRIMARY KEY (`sub_id`),
  UNIQUE KEY `pid` (`pid`,`uid`),
  KEY `pid_2` (`pid`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`sub_id`, `pid`, `uid`, `subdate`, `enddate`) VALUES
(3, 2, 5, '2018-02-10', '2018-05-10'),
(6, 4, 5, '2018-02-13', '2018-08-13'),
(7, 4, 3, '2018-02-27', '2018-08-27'),
(8, 5, 3, '2018-02-27', '2018-06-27'),
(9, 2, 3, '2018-02-27', '2018-05-27'),
(10, 2, 10, '2018-03-07', '2018-06-07'),
(11, 4, 10, '2018-03-07', '2018-09-07'),
(12, 5, 10, '2018-03-07', '2018-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(40) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `user_type` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `photo` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fullname`, `address`, `contact`, `user_type`, `email`, `gender`, `password`, `photo`) VALUES
(2, 'suneha', 'sunehamuskan', 456789, 'buyer', 'sunehamuskan576@gmail.com', 'female', 'sunehamuskan', '59534-_92928419_thinkstockphotos-508347326.jpg'),
(3, 'muskan', 'muskan', 12345, 'buyer', 'muskan@gmail.com', 'female', 'muskan', '53159-25248-f1.jpg'),
(4, 'sana', 'abc', 12345, 'seller', 'sana@gmail.com', 'female', 'sana', '60446-server.jpg'),
(5, 'Huzaif', 'Karkala', 9008812341, 'seller', 'huzaiff@gmail.com', 'male', 'huzaif', ''),
(6, 'sana sheikh', 'marnad', 231431, 'seller', 'aysha@gmail.com', 'female', '123', '11181-nro1z-happiness-1.jpg'),
(7, 'aaa', 'sunehamuskan', 9008812341, 'seller', 'muskan@gmail.com', 'male', '12345', '40669-boringsaexam.jpg'),
(8, 'Nuzaid', 'moodbidri', 9945975397, 'seller', 'nuzaid@gmail.com', 'male', 'nuzaid', '25291-1504884393281.jpg'),
(9, 'Soha khan', 'Delhi', 9845667712, 'buyer', 'soha@gmail.com', '', 'sohakhan', '45533-7.png'),
(10, 'sana sheikh', 'Karkala', 9008812341, 'seller', 'sanak@gmail.com', 'female', '12345', '46956-g9.jpg'),
(11, 'Zishan', 'Udupi', 9087654312, 'buyer', 'zishan@gmail.com', 'male', 'zishan', '63437-3.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bid`
--
ALTER TABLE `bid`
  ADD CONSTRAINT `bid_ibfk_3` FOREIGN KEY (`sellerid`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bid_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bid_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `product` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bid_payment`
--
ALTER TABLE `bid_payment`
  ADD CONSTRAINT `bid_payment_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bid_payment_ibfk_2` FOREIGN KEY (`bid_id`) REFERENCES `bid` (`bid_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`sellerid`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hostproduct`
--
ALTER TABLE `hostproduct`
  ADD CONSTRAINT `hostproduct_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hostproduct_ibfk_2` FOREIGN KEY (`prid`) REFERENCES `product` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`subc_id`) REFERENCES `subcategory` (`subcid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `query`
--
ALTER TABLE `query`
  ADD CONSTRAINT `query_ibfk_2` FOREIGN KEY (`sellerid`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `query_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `category` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `subscription_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `package` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subscription_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
