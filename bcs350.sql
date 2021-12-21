-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 08, 2020 at 11:56 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bcs350`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountdetails`
--

DROP TABLE IF EXISTS `accountdetails`;
CREATE TABLE IF NOT EXISTS `accountdetails` (
  `accountnumber` int(10) NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `balance` int(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(25) NOT NULL,
  PRIMARY KEY (`accountnumber`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `accountinfo`
--

DROP TABLE IF EXISTS `accountinfo`;
CREATE TABLE IF NOT EXISTS `accountinfo` (
  `rowid` int(2) UNSIGNED NOT NULL AUTO_INCREMENT,
  `balance` float DEFAULT NULL,
  `status` varchar(6) DEFAULT NULL,
  `accountnumber` int(5) DEFAULT NULL,
  PRIMARY KEY (`rowid`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accountinfo`
--

INSERT INTO `accountinfo` (`rowid`, `balance`, `status`, `accountnumber`) VALUES
(1, 52000, 'Active', 121),
(2, 56000, 'Active', 122),
(3, 58000, 'Active', 123),
(4, 61333, 'Active', 124),
(5, 64333, 'Active', 125),
(6, 67333, 'Active', 126),
(7, 70333, 'Active', 127),
(8, 73333, 'Active', 128),
(9, 76333, 'Active', 129),
(10, 79333, 'Active', 130),
(11, 82333, 'Active', 131),
(12, 85333, 'Active', 132),
(13, 88333, 'Active', 133),
(14, 91333, 'Active', 134),
(15, 94333, 'Active', 135),
(16, 97333, 'Active', 136),
(17, 100333, 'Active', 137),
(18, 103333, 'Active', 138),
(19, 106333, 'Active', 139),
(20, 109333, 'Active', 140),
(21, 112333, 'Active', 141),
(22, 115333, 'Active', 142),
(23, 118333, 'Active', 143),
(24, 65600, 'Active', 144),
(25, 65600, 'Active', 145),
(28, 68000, 'Active', 146);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `rowid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `coursecode` varchar(10) NOT NULL,
  `coursename` varchar(50) NOT NULL,
  `days` varchar(8) NOT NULL,
  `time` varchar(16) NOT NULL,
  `credits` int(11) NOT NULL,
  PRIMARY KEY (`rowid`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`rowid`, `coursecode`, `coursename`, `days`, `time`, `credits`) VALUES
(1, 'BCS102', 'Computer Concepts and Applications', 'MWF', '9 - 9:50am', 3),
(2, 'BCS109', 'Introduciton to Programming', 'NW', '8 - 9:15am', 3),
(3, 'BCS120', 'Foundations of Computer Programming I', 'MW', '9:25 - 10:40am', 3),
(4, 'BCS130', 'Website Development', 'TR', '8 - 9:15am', 3),
(5, 'BCS160', 'Computers, Society and Technology', 'MW', '10:50 - 12:15pm', 3),
(6, 'BCS208', 'Networking Foundations I', 'TR', '5:55 - 7:35pm', 3),
(7, 'BCS209', 'Routing & Switching Essentials', 'R', '8:30 - 10:35am', 3),
(8, 'BCS215', 'UNIX Operation Systems', 'RMTE', '9 - 11:40am', 3),
(9, 'BCS230', 'Foundations of Computer Programming II', 'RMTE', '9:25 - 10:40am', 3),
(10, 'BCS260', 'Introduciton to Database Systems', 'TR', '7:20 - 8:35pm', 3);

-- --------------------------------------------------------

--
-- Table structure for table `customernames`
--

DROP TABLE IF EXISTS `customernames`;
CREATE TABLE IF NOT EXISTS `customernames` (
  `rowid` int(2) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(8) DEFAULT NULL,
  `lastname` varchar(13) DEFAULT NULL,
  `email` text NOT NULL,
  `photo` char(20) DEFAULT NULL,
  PRIMARY KEY (`rowid`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customernames`
--

INSERT INTO `customernames` (`rowid`, `firstname`, `lastname`, `email`, `photo`) VALUES
(1, 'Felipe', 'Alvarez Vidal', 'first@farmindale.edu', 'images/1.png'),
(2, 'Ana', 'Collantes', 'checkingone@farmingdale.edu', 'images/2.jpg'),
(3, 'Luc', 'Daniel', 'sadsddsa@yahpp.com', ''),
(4, 'Vincent', 'Ewart', 'aaaaaaa@farmingdale.edu', ''),
(5, 'Luis', 'Fuentes', 'bbbbbbbbb@farmingdale.edu', ''),
(6, 'Megan', 'Genova', 'wwwwwwwww@farmingdale.edu', ''),
(7, 'Jake', 'Gusew', 'qqqqqqqqq@farmingdale.edu', ''),
(8, 'Jenna', 'Hernandez', 'xxxxxxxxx@farmingdale.edu', ''),
(9, 'Brett', 'Hirschberger', 'wwwwwwww@farmingdale.edu', ''),
(10, 'Ronald', 'Hiscock', 'fffffffffffffffffff@farmingdale.edu', ''),
(11, 'Areeb', 'Hussain', 'llllllllllllll@farmingdale.edu', ''),
(12, 'Arslan', 'Khurram', 'oooooo@farmingdale.edu', ''),
(13, 'Steven', 'Lannon', 'uuuuuuu@farmingdale.edu', ''),
(14, 'Juan', 'Marrero', 'tttttttt@farmingdale.edu', ''),
(15, 'Devante', 'McLeod', 'iiiiiiiiiiiiiiii@farmingdale.edu', ''),
(16, 'Aayushma', 'Pal', 'mmmmmmmm@farmingdale.edu', ''),
(17, 'Akshar', 'Patel', 'bbbbbbbbbbbb@farmingdale.edu', ''),
(18, 'Blesson', 'Raju', 'ccccccccccccc@farmingdale.edu', ''),
(19, 'Harry', 'Stergakos', 'zzzzzzzzzzzz@farmingdale.edu', ''),
(20, 'Emily', 'Stock', 'hhhhhhhhhhhh@farmingdale.edu', ''),
(21, 'Diego', 'Taveras', 'ssasasxxxx@farmingdale.edu', ''),
(22, 'Orges', 'Velia', 'pppppppppppiii@farmingdale.edu', ''),
(23, 'Daniel', 'Veliz', 'ggggggghhhh@farmingdale.edu', ''),
(24, 'Diego', 'Taveras', 'vvvvvvvvvvvb@farmingdale.edu', ''),
(25, 'Ana', 'Collantes', 'mmmmmmmmnnnn@farmingdale.edu', ''),
(32, 'John', 'Smith', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

DROP TABLE IF EXISTS `enrollments`;
CREATE TABLE IF NOT EXISTS `enrollments` (
  `rowid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student` int(10) UNSIGNED NOT NULL,
  `class` int(10) UNSIGNED NOT NULL,
  `status` char(12) NOT NULL,
  `grade` char(2) NOT NULL,
  PRIMARY KEY (`rowid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

DROP TABLE IF EXISTS `grades`;
CREATE TABLE IF NOT EXISTS `grades` (
  `firstname` varchar(15) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `email` varchar(80) NOT NULL,
  `midterm` int(11) NOT NULL,
  `final` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`firstname`, `lastname`, `email`, `midterm`, `final`) VALUES
('John', 'Smith', 'john.smith@yahoo.com', 100, 95),
('Mary', 'Smith', 'mary.smith@optonline.net', 90, 90),
('Frank', 'Smith', 'frank.smith@msn.com', 80, 85),
('Alice', 'Smith', 'alice.smith@gmail.com', 70, 80),
('Robert', 'Jones', 'robert.jones@jones.com', 60, 85),
('Sara', 'Watson', 'sara.watson@watson.com', 50, 90),
('Emma', 'Fields', 'emma.fields@msn.com', 95, 95),
('Harry', 'Burns', 'harry@burns.com', 90, 100),
('Lisa', 'Freeman', 'lisa@freeman.com', 85, 95),
('Steve', 'Green', 'steve.green@plumbers.com', 80, 90),
('Jane', 'Doe', 'jane.doe@gmail.com', 75, 85),
('John', 'Doe', 'john.dow@optimum.net', 70, 80),
('Barry', 'Bailey', 'bbailey@yahoo.com', 65, 75),
('Carol', 'Potter', 'carol.potter@mlb.com', 60, 70),
('Doug', 'Davies', 'dougd@aol.com', 55, 65);

-- --------------------------------------------------------

--
-- Table structure for table `phonebook`
--

DROP TABLE IF EXISTS `phonebook`;
CREATE TABLE IF NOT EXISTS `phonebook` (
  `rowid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(15) DEFAULT NULL,
  `lastname` varchar(15) DEFAULT NULL,
  `category` varchar(12) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`rowid`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phonebook`
--

INSERT INTO `phonebook` (`rowid`, `firstname`, `lastname`, `category`, `email`, `phone`, `city`) VALUES
(1, 'John', 'Smith', 'Family', 'john.smith@yahoo.com', '516-123-4567', 'Woodmere'),
(2, 'Mary', 'Smith', 'Business', 'mary.smith@optonline.net', '516-123-4567', 'Woodmere'),
(3, 'Frank', 'Smith', 'Family', 'frank.smith@msn.com', '631-987-6543', 'Smithtown'),
(4, 'Alice', 'Smith', 'Family', 'alice.smith@gmail.com', '631-987-6544', 'Smithtown'),
(5, 'Robert', 'Jones', 'Friend', 'robert.jones@jones.com', '718-897-2244', 'Queens'),
(6, 'Sara', 'Watson', 'Friend', 'sara.watson@watson.com', '212-555-1212', 'Manhattan'),
(7, 'Emma', 'Fields', 'Friend', 'emma.fields@msn.com', '201-456-7890', 'Bayonne'),
(8, 'Harry', 'Burns', 'Business', 'harry@burns.com', '516-333-1130', 'Garden City'),
(9, 'Lisa', 'Freeman', 'Other', 'lisa@freeman.com', '516-333-9898', 'Garden City'),
(10, 'Steve', 'Green', 'Business', 'steve.green@plumbers.com', '516-654-4332', 'Lynbrook'),
(11, 'Jane', 'Doe', 'Business', 'jane.doe@gmail.com', '123-456-7890', 'NYC'),
(12, 'John', 'Doe', 'Business', 'john.dow@optimum.net', '914-555-5555', 'Westchester'),
(13, 'Barry', 'Baileys', 'Friend', 'bbailey@yahoo.com', '718-555-1234', 'Brooklyn'),
(14, 'Carol', 'Potter', 'Other', 'carol.potter@mlb.com', '718-678-3434', 'Staten Island'),
(15, 'Doug', 'Davies', 'Business', 'dougd@aol.com', '631-443-5654', 'Farmingdale'),
(17, 'Charles', 'Kaplan', 'Family', 'kaplancr@farmingdale.edu', '516-555-5678', 'Rockville Centre'),
(18, 'John', 'Smith', 'Family', 'john.smith@yahoo.com', '516-123-4567', 'Woodmere'),
(19, 'John', 'Smith', 'Family', 'john.smith@yahoo.com', '516-123-4567', 'Woodmere'),
(20, 'John', 'Smith', 'Family', 'john.smith@yahoo.com', '516-123-4567', 'Woodmere'),
(21, 'John', 'Smith', 'Family', 'john.smith@yahoo.com', '516-123-4567', 'Woodmere'),
(22, 'John', 'Smith', 'Family', 'john.smith@yahoo.com', '516-123-4567', 'Woodmere'),
(23, 'John', 'Smith', 'Family', 'john.smith@yahoo.com', '516-123-4567', 'Woodmere'),
(24, 'John', 'Smith', 'Family', 'john.smith@yahoo.com', '516-123-4567', 'Woodmere');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `rowid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(15) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `email` varchar(80) NOT NULL,
  PRIMARY KEY (`rowid`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`rowid`, `firstname`, `lastname`, `email`) VALUES
(1, 'Felipe', 'Alvarez Vidal', 'alvafb@farmingdale.edu'),
(2, 'Ana', 'Collantes', 'colla4@farmingdale.edu'),
(3, 'Luc', 'Daniel', 'danilc@farmingdale.edu'),
(4, 'Vincent', 'Ewart', 'ewarvj@farmingdale.edu'),
(5, 'Luis', 'Fuentes', 'fuenla@farmingdale.edu'),
(6, 'Megan', 'Genova', 'genome@farmingdale.edu'),
(7, 'Jake', 'Gusew', 'guseja@farmingdale.edu'),
(8, 'Jenna', 'Hernandez', 'hernja14@farmingdale.edu'),
(9, 'Brett', 'Hirschberger', 'hirsbi@farmingdale.edu'),
(10, 'Ronald', 'Hiscock', 'hiscr@farmingdale.edu'),
(11, 'Areeb', 'Hussain', 'hussa4@farmingdale.edu'),
(12, 'Arslan', 'Khurram', 'khura6@farmingdale.edu'),
(13, 'Steven', 'Lannon', 'lanns@farmingdale.edu'),
(14, 'Juan', 'Marrero', 'marrjf6@farmingdale.edu'),
(15, 'Devante', 'McLeod', 'mclede@farmingdale.edu'),
(16, 'Aayushma', 'Pal', 'palaj11@farmingdale.edu'),
(17, 'Akshar', 'Patel', 'pateaa@farmingdale.edu'),
(18, 'Blesson', 'Raju', 'rajubs@farmingdale.edu'),
(19, 'Harry', 'Stergakos', 'sterhk@farmingdale.edu'),
(20, 'Emily', 'Stock', 'stoce@farmingdale.edu'),
(21, 'Diego', 'Taveras', 'taved@farmingdale.edu'),
(22, 'Orges', 'Velia', 'velio@farmingdale.edu'),
(23, 'Daniel', 'Veliz', 'velida26@farmingdale.edu');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
