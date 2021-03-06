-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 30, 2017 at 05:29 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `juntos`
--

-- --------------------------------------------------------

--
-- Table structure for table `article_details`
--

DROP TABLE IF EXISTS `article_details`;
CREATE TABLE IF NOT EXISTS `article_details` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_name` varchar(50) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`article_id`),
  UNIQUE KEY `article_name` (`article_name`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article_details`
--

INSERT INTO `article_details` (`article_id`, `article_name`, `status`) VALUES
(1, 'D/D', 'Y'),
(2, 'CLASSIC', 'Y'),
(3, 'CLASSIC CRUST', 'Y'),
(4, 'FORUM', 'Y'),
(5, 'FORUM CRUST', 'Y'),
(6, 'FLORA SOFTY', 'Y'),
(7, 'SUEDE', 'Y'),
(8, 'HAIRON', 'Y'),
(9, 'PATENT', 'Y'),
(10, 'VANICE', 'Y'),
(11, 'REMO', 'Y'),
(12, 'FLORIDA', 'Y'),
(13, 'MILANO', 'Y'),
(14, 'MARINA', 'Y'),
(15, 'NAPPA AZTEK', 'Y'),
(16, 'TORINO', 'Y'),
(17, 'S/CR LINING', 'Y'),
(18, 'F/CR LINING', 'Y'),
(19, 'F/VEG LINING', 'Y'),
(20, 'LINING', 'Y'),
(21, 'FLORA', 'Y'),
(22, 'ANIL', 'Y'),
(23, 'BRIGADE', 'Y'),
(24, 'BRIGADE CALF', 'Y'),
(25, 'BRUSHOFF', 'Y'),
(26, 'CARMEN', 'Y'),
(27, 'CARMEN CRUST', 'Y'),
(28, 'CRAZY HORSE', 'Y'),
(29, 'CROCO', 'Y'),
(30, 'CROCO PRINT', 'Y'),
(31, 'CRUST', 'Y'),
(32, 'D/D BURNISH', 'Y'),
(33, 'D/D CRUST', 'Y'),
(34, 'DEER', 'Y'),
(35, 'DRUM DYED', 'Y'),
(36, 'F/CR BURNISH', 'Y'),
(37, 'F/CR', 'Y'),
(38, 'F/CR ANIL', 'Y'),
(39, 'F/CR ANTIC', 'Y'),
(40, 'F/CR ARGENTINA', 'Y'),
(41, 'F/CR NAPOLILUX', 'Y'),
(42, 'F/CR OILY CRAZY HORSE', 'Y'),
(43, 'F/CR PREMIRA NATURAL', 'Y'),
(44, 'F/CR SOCK', 'Y'),
(45, 'FINISH LEATHER', 'Y'),
(46, 'FIRENZE', 'Y'),
(47, 'FLORA BURNISH', 'Y'),
(48, 'FORUM GLAZED', 'Y'),
(49, 'FORUM MILLED', 'Y'),
(50, 'FUR LINING', 'Y'),
(51, 'HEEL GRIP', 'Y'),
(52, 'INFANT', 'Y'),
(53, 'INFANT CRUST', 'Y'),
(54, 'INFANT LINING', 'Y'),
(55, 'INSOLE', 'Y'),
(56, 'MILLED', 'Y'),
(57, 'MILLED BURNISH', 'Y'),
(58, 'MILLED GLAZED', 'Y'),
(59, 'MILLED JAMICA', 'Y'),
(60, 'MILLED LINING', 'Y'),
(61, 'MILLED POLISH', 'Y'),
(62, 'NAPOLILUX', 'Y'),
(63, 'NAPPA', 'Y'),
(64, 'NUBUCK', 'Y'),
(65, 'OILY CRAZY HORSE', 'Y'),
(66, 'PARANA', 'Y'),
(67, 'PREMIRA', 'Y'),
(68, 'PRIMIRA NATURAL', 'Y'),
(69, 'PRINTED', 'Y'),
(70, 'S/CR MILLED LINING', 'Y'),
(71, 'S/CR', 'Y'),
(72, 'SCOTCH GRAIN', 'Y'),
(73, 'SOLE LEATHER', 'Y'),
(74, 'SPLIT', 'Y'),
(75, 'SUEDE NUBUCK', 'Y'),
(76, 'TRAP', 'Y'),
(77, 'YEARLING', 'Y'),
(78, 'D/D MONOCO PRINT', 'Y'),
(79, 'BRAZIL', 'Y'),
(80, 'SKINK', 'Y'),
(81, 'DRUM DYED VENICE', 'Y'),
(82, 'SNAKE PRINT', 'Y'),
(83, 'VENICE', 'Y'),
(84, 'CROCK', 'Y'),
(85, 'RUBBER', 'Y'),
(86, 'VARADEO', 'Y'),
(87, 'PYTHON', 'Y'),
(88, 'SNOW', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `color_details`
--

DROP TABLE IF EXISTS `color_details`;
CREATE TABLE IF NOT EXISTS `color_details` (
  `color_id` int(11) NOT NULL AUTO_INCREMENT,
  `color_name` varchar(50) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`color_id`)
) ENGINE=InnoDB AUTO_INCREMENT=176 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `color_details`
--

INSERT INTO `color_details` (`color_id`, `color_name`, `status`) VALUES
(1, 'TM 30', 'Y'),
(2, 'BLACK', 'Y'),
(3, 'MATTONE', 'Y'),
(4, 'E.BLUE', 'Y'),
(5, 'MORNING GREY', 'Y'),
(6, 'NAVY', 'Y'),
(7, 'MID BROWN', 'Y'),
(8, 'NUT', 'Y'),
(9, 'TAN', 'Y'),
(10, 'MOGANO', 'Y'),
(11, 'WHITE', 'Y'),
(12, 'BROWN', 'Y'),
(13, 'DK BROWN', 'Y'),
(14, 'BORDO', 'Y'),
(15, 'RED', 'Y'),
(16, 'SWEET WATER', 'Y'),
(17, 'PALE ROSE', 'Y'),
(18, 'PURPLE', 'Y'),
(19, 'T.MORO', 'Y'),
(20, 'TDM', 'Y'),
(21, 'OXYGEN', 'Y'),
(22, 'ANTACITE', 'Y'),
(23, 'AQUILA TAN', 'Y'),
(24, 'ARABICA', 'Y'),
(25, 'ARANCIO', 'Y'),
(26, 'ARGENTO', 'Y'),
(27, 'ASH', 'Y'),
(28, 'BARK', 'Y'),
(29, 'BEIGE', 'Y'),
(30, 'BIANCO', 'Y'),
(31, 'BICOTO', 'Y'),
(32, 'BISCUIT', 'Y'),
(33, 'BISONTE', 'Y'),
(34, 'BISTRO', 'Y'),
(35, 'BLAIR', 'Y'),
(36, 'BLOOD', 'Y'),
(37, 'BLUE', 'Y'),
(38, 'BLUE NAVY', 'Y'),
(39, 'BLUETTE', 'Y'),
(40, 'BOSCO', 'Y'),
(41, 'BOTTLE GREEN', 'Y'),
(42, 'BRANDY', 'Y'),
(43, 'BRICK', 'Y'),
(44, 'BRONZO', 'Y'),
(45, 'BURGANDY', 'Y'),
(46, 'CAFFE', 'Y'),
(47, 'CAFFE BROWN', 'Y'),
(48, 'CAMEL', 'Y'),
(49, 'CHESNET', 'Y'),
(50, 'CHOCO BROWN', 'Y'),
(51, 'CHOCOLATE', 'Y'),
(52, 'CIGAR', 'Y'),
(53, 'COBALT', 'Y'),
(54, 'COBALTO', 'Y'),
(55, 'COGNAC', 'Y'),
(56, 'CREAME', 'Y'),
(57, 'DENIM', 'Y'),
(58, 'DESSERT', 'Y'),
(59, 'DK BLUE', 'Y'),
(60, 'DK CAMEL', 'Y'),
(62, 'DK GREEN', 'Y'),
(63, 'DK GREY', 'Y'),
(64, 'DK NAVY', 'Y'),
(65, 'DK PINK', 'Y'),
(66, 'DK TAN', 'Y'),
(67, 'DK TAUPE', 'Y'),
(69, 'ELECTRICO', 'Y'),
(70, 'FANGO', 'Y'),
(71, 'FOREST', 'Y'),
(72, 'FUXIA', 'Y'),
(73, 'GAM BROWN', 'Y'),
(74, 'GIALLO', 'Y'),
(75, 'GOLD', 'Y'),
(76, 'GREEN', 'Y'),
(77, 'GREY', 'Y'),
(78, 'GRIGIO', 'Y'),
(79, 'INDACO', 'Y'),
(80, 'IVORY', 'Y'),
(81, 'JAMAICA', 'Y'),
(82, 'JEANS', 'Y'),
(83, 'KHAKI', 'Y'),
(84, 'LAVENDOR', 'Y'),
(85, 'LILAC', 'Y'),
(86, 'LILLA', 'Y'),
(87, 'LIMONE', 'Y'),
(88, 'LONDON TAN', 'Y'),
(89, 'LT BEIGE', 'Y'),
(90, 'LT BLUE', 'Y'),
(91, 'LT BROWN', 'Y'),
(92, 'LT GREEN', 'Y'),
(93, 'LIGHT GREY', 'Y'),
(94, 'LT PINK', 'Y'),
(95, 'LT PURPLE', 'Y'),
(96, 'LT TAN', 'Y'),
(97, 'M BROWN', 'Y'),
(98, 'M COL', 'Y'),
(99, 'MARRONE', 'Y'),
(100, 'MEDIUM BROWN', 'Y'),
(101, 'MID BLUE', 'Y'),
(102, 'MID GREEN', 'Y'),
(103, 'MID GREY', 'Y'),
(104, 'MINT BLUE', 'Y'),
(105, 'MINT GREEN', 'Y'),
(106, 'MUSHROOM', 'Y'),
(107, 'NATURAL', 'Y'),
(108, 'NATURAL BLACK', 'Y'),
(109, 'NVAY', 'Y'),
(110, 'NERO', 'Y'),
(111, 'OCEANO', 'Y'),
(112, 'OFF WHITE', 'Y'),
(113, 'ORANGE', 'Y'),
(114, 'ORIENTAL', 'Y'),
(115, 'PLATINO', 'Y'),
(116, 'PARROT GREEN', 'Y'),
(117, 'PEARAL GOLD', 'Y'),
(118, 'PELTRO', 'Y'),
(119, 'PINK', 'Y'),
(120, 'PIOMBO', 'Y'),
(121, 'RAME', 'Y'),
(122, 'RELAX', 'Y'),
(123, 'RESSIN', 'Y'),
(124, 'RICH TAN', 'Y'),
(125, 'RIVER', 'Y'),
(126, 'ROCCIA', 'Y'),
(127, 'ROSE', 'Y'),
(128, 'ROSSO', 'Y'),
(129, 'ROUGH', 'Y'),
(130, 'ROVERA', 'Y'),
(131, 'ROYAL', 'Y'),
(132, 'ROYAL BLUE', 'Y'),
(133, 'SABBIA', 'Y'),
(134, 'SAFRON', 'Y'),
(135, 'SAHARA', 'Y'),
(136, 'SAND', 'Y'),
(137, 'SANGO BROWN', 'Y'),
(138, 'SHADOW', 'Y'),
(139, 'SHINE BLACK', 'Y'),
(140, 'SIGARO', 'Y'),
(141, 'SILVER', 'Y'),
(142, 'SKY', 'Y'),
(143, 'SMOG', 'Y'),
(144, 'SNUFF', 'Y'),
(145, 'STONE', 'Y'),
(146, 'TAUPE', 'Y'),
(147, 'TEAK', 'Y'),
(148, 'TOBBACCO', 'Y'),
(149, 'TURQUISE', 'Y'),
(150, 'VIOLA', 'Y'),
(151, 'VIOLET', 'Y'),
(152, 'WHISKY', 'Y'),
(153, 'WINE', 'Y'),
(154, 'WOOD', 'Y'),
(155, 'YELLOW', 'Y'),
(156, 'YELLOW BROWN', 'Y'),
(157, 'CAPPACINNO', 'Y'),
(158, 'ICE BLUE', 'Y'),
(159, 'TAN/WOOD', 'Y'),
(160, '564 BLUE', 'Y'),
(161, 'MOROCCON BLUE', 'Y'),
(162, 'BLACK/SILVER', 'Y'),
(163, 'ELECTRIC BLUE', 'Y'),
(164, 'D.DENIM', 'Y'),
(165, 'ANTHRACITE', 'Y'),
(166, 'SNOW ARGENT', 'Y'),
(167, 'BREEZE VERDA', 'Y'),
(168, 'BREEZE ARGENT', 'Y'),
(169, 'BREEZE TURQUISE', 'Y'),
(170, 'GELSO', 'Y'),
(171, 'CARBON', 'Y'),
(172, 'BLU', 'Y'),
(173, 'MILLED T.MORO', 'Y'),
(174, 'MILLED NAVY', 'Y'),
(175, 'MILLED TAN', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `component_details`
--

DROP TABLE IF EXISTS `component_details`;
CREATE TABLE IF NOT EXISTS `component_details` (
  `component_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_id` int(11) NOT NULL,
  `component_name` varchar(50) NOT NULL,
  `component_outlet` varchar(10) NOT NULL,
  `component_file_path` varchar(50) NOT NULL,
  `component_path` varchar(50) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`component_id`),
  KEY `user_group_id` (`user_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `component_details`
--

INSERT INTO `component_details` (`component_id`, `user_group_id`, `component_name`, `component_outlet`, `component_file_path`, `component_path`, `status`) VALUES
(1, 1, 'MasterEntry', 'div1', '../master/master.component', 'master-entry', 'Y'),
(2, 1, 'DataEntry', 'div1', '', 'data-entry', 'Y'),
(3, 1, 'Report', 'div1', '', 'report', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `data_entry`
--

DROP TABLE IF EXISTS `data_entry`;
CREATE TABLE IF NOT EXISTS `data_entry` (
  `data_entry_id` int(11) NOT NULL AUTO_INCREMENT,
  `serial_no` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `selection_id` int(11) NOT NULL,
  `description_id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `leather` varchar(50) NOT NULL,
  `query` varchar(50) NOT NULL,
  `pieces` varchar(50) NOT NULL,
  `sqfeet` varchar(50) NOT NULL,
  `remarks` text NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`data_entry_id`)
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_entry`
--

INSERT INTO `data_entry` (`data_entry_id`, `serial_no`, `article_id`, `color_id`, `selection_id`, `description_id`, `date`, `leather`, `query`, `pieces`, `sqfeet`, `remarks`, `status`) VALUES
(1, 1, 3, 7, 6, 1, '2017-12-02', 'Upper', 'Return', '1', '3.75', 'DC NO. 2502', 'Y'),
(2, 1, 3, 6, 6, 1, '2017-12-02', 'Upper', 'Return', '1', '4.25', 'DC NO. 2502', 'Y'),
(4, 1, 3, 21, 6, 1, '2017-12-02', 'Upper', 'Return', '1', '6.50', 'DC NO.2502', 'Y'),
(5, 1, 21, 8, 6, 1, '2017-12-02', 'Upper', 'Return', '1', '13', 'DC NO.2502', 'Y'),
(6, 1, 4, 6, 6, 1, '2017-12-02', 'Upper', 'Return', '1', '8.75', 'DC NO.2502', 'Y'),
(7, 1, 16, 8, 6, 2, '2017-12-02', 'Upper', 'Return', '1', '6', 'DC NO.2502', 'Y'),
(8, 1, 11, 13, 6, 2, '2017-12-02', 'Upper', 'Return', '1', '6', 'DC NO.2502', 'Y'),
(9, 1, 1, 1, 6, 2, '2017-12-02', 'Upper', 'Return', '10', '78', 'DC NO.2502', 'Y'),
(10, 1, 17, 9, 6, 1, '2017-12-02', 'Lining', 'Return', '17', '122.50', 'DC NO.2502', 'Y'),
(11, 1, 17, 15, 6, 1, '2017-12-02', 'Lining', 'Return', '17', '137.50', 'DC NO.2502', 'Y'),
(12, 1, 17, 101, 6, 1, '2017-12-02', 'Lining', 'Return', '2', '11.50', 'DC NO.2502', 'Y'),
(13, 1, 17, 2, 6, 1, '2017-12-02', 'Lining', 'Return', '1', '4', 'DC NO.2502', 'Y'),
(14, 1, 17, 163, 6, 1, '2017-12-02', 'Lining', 'Return', '17', '125.50', 'DC NO.2502', 'Y'),
(15, 1, 17, 15, 6, 1, '2017-12-02', 'Lining', 'Return', '2', '18.25', 'DC NO.2502', 'Y'),
(16, 1, 17, 18, 6, 1, '2017-12-02', 'Lining', 'Return', '1', '9.75', 'DC NO.2502', 'Y'),
(17, 1, 17, 19, 6, 2, '2017-12-02', 'Lining', 'Return', '7', '62', 'DC NO.2502', 'Y'),
(18, 1, 18, 9, 6, 2, '2017-12-02', 'Lining', 'Return', '27', '281.75', 'DC NO.2502', 'Y'),
(19, 1, 18, 15, 6, 2, '2017-12-02', 'Lining', 'Return', '2', '16.25', 'DC NO.2502', 'Y'),
(20, 1, 2, 7, 6, 1, '2017-12-02', 'Upper', 'Sample', '1', '3.75', 'DC NO.2503', 'Y'),
(21, 1, 2, 6, 6, 1, '2017-12-02', 'Upper', 'Sample', '1', '4.25', 'DC NO.2503', 'Y'),
(22, 1, 2, 21, 6, 1, '2017-12-02', 'Upper', 'Sample', '1', '6.50', 'DC NO.2503', 'Y'),
(23, 2, 1, 4, 6, 2, '2017-12-04', 'Lining', 'LOT', '3', '33', 'DC NO.2509', 'Y'),
(24, 1, 21, 8, 6, 5, '2017-12-02', 'Upper', 'Sample', '1', '13', 'DC NO.2503', 'Y'),
(25, 1, 4, 6, 6, 1, '2017-12-02', 'Upper', 'Sample', '1', '8.75', 'DC NO.2503', 'Y'),
(26, 1, 16, 8, 6, 2, '2017-12-02', 'Upper', 'Sample', '1', '6', 'DC NO.2503', 'Y'),
(27, 1, 11, 13, 6, 2, '2017-12-02', 'Upper', 'Sample', '1', '6', 'DC NO.2503', 'Y'),
(28, 1, 1, 1, 6, 2, '2017-12-02', 'Upper', 'Sample', '10', '78', 'DC NO.2503', 'Y'),
(29, 1, 8, 2, 6, 6, '2017-12-02', 'Upper', 'Sample', '2', '30', 'DC NO.2504', 'Y'),
(30, 1, 8, 157, 6, 6, '2017-12-02', 'Upper', 'Sample', '1', '8', 'DC NO.2504', 'Y'),
(31, 1, 8, 13, 6, 6, '2017-12-02', 'Upper', 'Sample', '1', '22.25', 'DC NO.2504', 'Y'),
(32, 1, 8, 76, 6, 6, '2017-12-02', 'Upper', 'Sample', '1', '22', 'DC NO.2504', 'Y'),
(33, 1, 8, 158, 6, 6, '2017-12-02', 'Upper', 'Sample', '1', '24.75', 'DC NO.2504', 'Y'),
(34, 1, 8, 159, 6, 6, '2017-12-02', 'Upper', 'Sample', '2', '22.25', 'DC NO.2504', 'Y'),
(35, 1, 78, 1, 6, 2, '2017-12-02', 'Upper', 'Sample', '1', '6.50', 'DC NO.2504', 'Y'),
(36, 1, 79, 1, 6, 2, '2017-12-02', 'Upper', 'Sample', '1', '6.50', 'DC NO.2504', 'Y'),
(37, 1, 56, 2, 6, 1, '2017-12-02', 'Upper', 'Sample', '1', '6', 'DC NO.2504', 'Y'),
(38, 1, 4, 10, 6, 1, '2017-12-02', 'Upper', 'Sample', '1', '7.25', 'DC NO.2504', 'Y'),
(39, 1, 80, 2, 6, 14, '2017-12-02', 'Upper', 'Sample', '2', '15.75', 'DC NO.2505', 'Y'),
(40, 1, 81, 1, 6, 3, '2017-12-02', 'Upper', 'LOT', '9', '35', 'DC NO.2505', 'Y'),
(41, 1, 66, 3, 3, 2, '2017-12-02', 'Upper', 'LOT', '4', '28.75', 'DC NO.2505', 'Y'),
(42, 1, 4, 6, 1, 1, '2017-12-02', 'Upper', 'LOT', '60', '470.75', 'DC NO.2505', 'Y'),
(43, 1, 4, 8, 1, 1, '2017-12-02', 'Upper', 'LOT', '104', '885', 'DC NO.2506', 'Y'),
(44, 1, 35, 1, 3, 2, '2017-12-02', 'Upper', 'LOT', '1156', '8141.50', 'DC NO.2506', 'Y'),
(45, 1, 16, 6, 6, 2, '2017-12-02', 'Upper', 'Sample', '1', '5.25', 'DC NO.2506', 'Y'),
(46, 1, 35, 1, 6, 2, '2017-12-02', 'Upper', 'Sample', '63', '449', 'DC NO.2506', 'Y'),
(47, 1, 66, 37, 6, 2, '2017-12-02', 'Upper', 'Return', '8', '53.75', 'DC NO.2507', 'Y'),
(48, 1, 11, 160, 6, 2, '2017-12-02', 'Upper', 'LOT', '8', '53.75', 'DC NO.2507', 'Y'),
(49, 1, 3, 8, 6, 1, '2017-12-02', 'Upper', 'Sample', '1', '7.25', 'DC NO.2507', 'Y'),
(50, 1, 66, 3, 6, 2, '2017-12-02', 'Upper', 'LOT', '10', '74.25', 'DC NO.2507', 'Y'),
(51, 2, 76, 6, 6, 3, '2017-12-04', 'Upper', 'LOT', '6', '46.25', 'DC NO.2509', 'Y'),
(52, 2, 76, 161, 6, 3, '2017-12-04', 'Upper', 'LOT', '8', '55.50', 'DC NO.2509', 'Y'),
(53, 2, 82, 141, 6, 3, '2017-12-04', 'Upper', 'LOT', '4', '21', 'DC NO.2509', 'Y'),
(54, 2, 82, 162, 6, 3, '2017-12-04', 'Upper', 'LOT', '1', '7', 'DC NO.2509', 'Y'),
(55, 2, 4, 2, 6, 1, '2017-12-04', 'Upper', 'LOT', '11', '85.50', 'DC NO.2509', 'Y'),
(56, 2, 83, 11, 6, 3, '2017-12-04', 'Upper', 'LOT', '7', '36.50', 'DC NO.2510', 'Y'),
(57, 2, 11, 9, 6, 2, '2017-12-04', 'Upper', 'Sample', '1', '6.25', 'DC NO.2510', 'Y'),
(58, 2, 11, 154, 6, 2, '2017-12-04', 'Upper', 'Sample', '1', '6', 'DC NO.2510', 'Y'),
(59, 2, 11, 145, 6, 2, '2017-12-04', 'Upper', 'Sample', '1', '6.25', 'DC NO.2510', 'Y'),
(60, 2, 11, 10, 6, 2, '2017-12-04', 'Upper', 'Sample', '1', '7', 'DC NO.2510', 'Y'),
(61, 2, 3, 119, 6, 1, '2017-12-04', 'Upper', 'Sample', '1', '9.50', 'DC NO.2510', 'Y'),
(62, 2, 3, 145, 6, 1, '2017-12-04', 'Upper', 'Sample', '1', '5.50', 'DC NO.2510', 'Y'),
(63, 2, 3, 149, 6, 1, '2017-12-04', 'Upper', 'Sample', '1', '7.75', 'DC NO.2510', 'Y'),
(64, 2, 3, 6, 6, 1, '2017-12-04', 'Upper', 'Sample', '2', '17', 'DC NO.2510', 'Y'),
(65, 2, 3, 13, 6, 1, '2017-12-04', 'Upper', 'Sample', '1', '11', 'DC NO.2510', 'Y'),
(66, 2, 3, 105, 6, 1, '2017-12-04', 'Upper', 'Sample', '1', '9.75', 'DC NO.2510', 'Y'),
(67, 2, 3, 163, 6, 1, '2017-12-04', 'Upper', 'Sample', '1', '10.75', 'DC NO.2510', 'Y'),
(68, 2, 3, 70, 6, 1, '2017-12-04', 'Upper', 'LOT', '3', '22', 'DC NO.2510', 'Y'),
(69, 2, 72, 1, 6, 2, '2017-12-04', 'Upper', 'Sample', '3', '26.25', 'DC NO.2510', 'Y'),
(70, 2, 83, 11, 6, 3, '2017-12-04', 'Upper', 'Sample', '1', '7', 'DC NO.2511', 'Y'),
(71, 2, 84, 2, 6, 1, '2017-12-04', 'Upper', 'Sample', '2', '17', 'DC NO.2511', 'Y'),
(72, 2, 84, 1, 6, 1, '2017-12-04', 'Upper', 'Sample', '7', '66.25', 'DC NO.2511', 'Y'),
(73, 2, 4, 8, 6, 1, '2017-12-04', 'Upper', 'LOT', '15', '133', 'DC NO.2511', 'Y'),
(74, 2, 66, 8, 6, 2, '2017-12-04', 'Upper', 'LOT', '172', '2443.25', 'DC NO.2511', 'Y'),
(75, 3, 66, 3, 6, 2, '2017-12-06', 'Upper', 'LOT', '22', '144.75', 'DC NO.2512', 'Y'),
(76, 3, 4, 6, 6, 1, '2017-12-06', 'Upper', 'LOT', '7', '43.25', 'DC NO.2512', 'Y'),
(77, 3, 4, 8, 6, 1, '2017-12-06', 'Upper', 'LOT', '25', '218.50', 'DC NO.2512', 'Y'),
(78, 1, 17, 9, 6, 1, '2017-12-02', 'Lining', 'Sample', '17', '122.50', 'DC NO.2503', 'Y'),
(79, 1, 19, 15, 6, 1, '2017-12-02', 'Lining', 'Sample', '17', '137.50', 'DC NO.2503', 'Y'),
(80, 1, 19, 101, 6, 1, '2017-12-02', 'Lining', 'Sample', '2', '11.50', 'DC NO.2503', 'Y'),
(81, 1, 17, 2, 6, 2, '2017-12-02', 'Lining', 'Sample', '1', '4', 'DC NO.2503', 'Y'),
(82, 1, 18, 9, 6, 2, '2017-12-02', 'Lining', 'Sample', '83', '881.75', 'DC NO.2503', 'Y'),
(83, 1, 17, 19, 6, 1, '2017-12-02', 'Lining', 'Sample', '7', '62', 'DC NO.2503', 'Y'),
(84, 1, 17, 163, 6, 1, '2017-12-02', 'Lining', 'Sample', '17', '125.50', 'DC NO.2503', 'Y'),
(85, 1, 17, 15, 6, 1, '2017-12-02', 'Lining', 'Sample', '2', '18.25', 'DC NO.2503', 'Y'),
(86, 1, 18, 15, 6, 2, '2017-12-02', 'Lining', 'Sample', '2', '16.25', 'DC NO.2503', 'Y'),
(87, 1, 19, 18, 6, 1, '2017-12-02', 'Lining', 'Sample', '1', '9.75', 'DC NO.2503', 'Y'),
(88, 1, 19, 15, 2, 1, '2017-12-02', 'Lining', 'LOT', '420', '3470', 'DC NO.2505', 'Y'),
(89, 1, 19, 15, 4, 1, '2017-12-02', 'Lining', 'LOT', '22', '128', 'DC NO.2505', 'Y'),
(90, 1, 19, 15, 5, 1, '2017-12-02', 'Lining', 'LOT', '0', '7.50', 'DC NO.2505', 'Y'),
(91, 1, 18, 9, 2, 2, '2017-12-02', 'Lining', 'LOT', '174', '1940', 'DC NO.2506', 'Y'),
(92, 1, 19, 163, 6, 1, '2017-12-02', 'Lining', 'LOT', '90', '691.75', 'DC NO.2507,08', 'Y'),
(93, 1, 18, 9, 2, 1, '2017-12-02', 'Lining', 'LOT', '200', '1973', 'DC NO.2508', 'Y'),
(101, 2, 18, 163, 6, 2, '2017-12-04', 'Lining', 'LOT', '7', '62', 'DC NO.2509', 'Y'),
(102, 2, 19, 163, 2, 1, '2017-12-04', 'Lining', 'LOT', '315', '2539', 'DC NO.2509', 'Y'),
(103, 2, 17, 9, 2, 8, '2017-12-04', 'Lining', 'LOT', '177', '2505', 'DC NO.2509', 'Y'),
(104, 2, 18, 163, 2, 2, '2017-12-04', 'Lining', 'Sample', '3', '26.25', 'DC NO.2511', 'Y'),
(105, 2, 17, 9, 2, 8, '2017-12-04', 'Lining', 'Sample', '27', '408.25', 'DC NO.2511', 'Y'),
(106, 2, 50, 146, 6, 13, '2017-12-04', 'Lining', 'Sample', '7', '26', 'DC NO.2511', 'Y'),
(107, 2, 50, 149, 6, 13, '2017-12-04', 'Lining', 'Sample', '5', '18', 'DC NO.2511', 'Y'),
(108, 3, 19, 163, 2, 1, '2017-12-06', 'Lining', 'LOT', '326', '2601.25', 'DC NO.2512', 'Y'),
(109, 3, 20, 11, 6, 3, '2017-12-06', 'Lining', 'LOT', '45', '228.25', 'DC NO.2512', 'Y'),
(110, 3, 7, 146, 6, 6, '2017-12-06', 'Upper', 'LOT', '10', '112.25', 'DC NO.2513', 'Y'),
(111, 3, 85, 11, 6, 6, '2017-12-06', 'Upper', 'Sample', '1', '11.25', 'DC NO.2513', 'Y'),
(112, 3, 85, 164, 6, 6, '2017-12-06', 'Upper', 'Sample', '1', '18.25', 'DC NO.2513', 'Y'),
(113, 3, 66, 2, 6, 2, '2017-12-06', 'Upper', 'LOT', '30', '222.50', 'DC NO.2513', 'Y'),
(114, 3, 3, 55, 6, 1, '2017-12-06', 'Upper', 'Sample', '1', '5', 'DC NO.2513', 'Y'),
(115, 3, 35, 1, 6, 1, '2017-12-06', 'Upper', 'LOT', '48', '452.25', 'DC NO.2513', 'Y'),
(116, 3, 84, 101, 6, 1, '2017-12-06', 'Upper', 'LOT', '29', '228', 'DC NO.2514', 'Y'),
(117, 3, 53, 2, 6, 2, '2017-12-06', 'Upper', 'Sample', '8', '50', 'DC NO.2514', 'Y'),
(118, 3, 8, 165, 6, 6, '2017-12-06', 'Upper', 'Sample', '1', '6.50', 'DC NO.2514', 'Y'),
(119, 3, 8, 166, 6, 6, '2017-12-06', 'Upper', 'Sample', '1', '9.25', 'DC NO.2514', 'Y'),
(120, 3, 8, 167, 6, 6, '2017-12-06', 'Upper', 'Sample', '1', '6.75', 'DC NO.2514', 'Y'),
(121, 3, 8, 168, 6, 6, '2017-12-06', 'Upper', 'Sample', '1', '7.25', 'DC NO.2514', 'Y'),
(122, 3, 8, 169, 6, 6, '2017-12-06', 'Upper', 'Sample', '1', '8.25', 'DC NO.2514', 'Y'),
(123, 4, 86, 59, 6, 6, '2017-12-07', 'Upper', 'Sample', '1', '12', 'DC NO.2515', 'Y'),
(124, 4, 86, 170, 6, 6, '2017-12-07', 'Upper', 'Sample', '1', '7.75', 'DC NO.2515', 'Y'),
(125, 4, 86, 55, 6, 6, '2017-12-07', 'Upper', 'Sample', '1', '4.25', 'DC NO.2515', 'Y'),
(126, 4, 86, 2, 6, 6, '2017-12-07', 'Upper', 'Sample', '1', '9.25', 'DC NO.2515', 'Y'),
(127, 4, 86, 171, 6, 6, '2017-12-07', 'Upper', 'Sample', '1', '7.25', 'DC NO.2515', 'Y'),
(128, 4, 66, 172, 3, 2, '2017-12-07', 'Upper', 'LOT', '23', '146', 'DC NO.2515', 'Y'),
(129, 5, 83, 1, 9, 3, '2017-12-08', 'Upper', 'LOT', '140', '627.75', 'DC NO.2516', 'Y'),
(130, 5, 83, 163, 7, 3, '2017-12-08', 'Upper', 'LOT', '77', '440.25', 'DC NO.2516', 'Y'),
(131, 5, 83, 13, 7, 3, '2017-12-08', 'Upper', 'LOT', '65', '395.75', 'DC NO.2516', 'Y'),
(132, 5, 87, 1, 6, 1, '2017-12-08', 'Upper', 'Sample', '7', '58.50', 'DC NO.2516', 'Y'),
(133, 5, 35, 1, 3, 2, '2017-12-08', 'Upper', 'Sample', '22', '175.75', 'DC NO.2516', 'Y'),
(134, 5, 35, 1, 3, 2, '2017-12-08', 'Upper', 'LOT', '458', '3517', 'DC NO.2516', 'Y'),
(135, 5, 82, 162, 6, 3, '2017-12-08', 'Upper', 'LOT', '13', '72.25', 'DC NO.2516', 'Y'),
(136, 5, 82, 141, 6, 3, '2017-12-08', 'Upper', 'LOT', '54', '305.50', 'DC NO.2516', 'Y'),
(137, 5, 66, 172, 3, 2, '2017-12-08', 'Upper', 'LOT', '66', '454', 'DC NO.2517', 'Y'),
(138, 5, 88, 9, 6, 1, '2017-12-08', 'Upper', 'Sample', '1', '7.50', 'DC NO.2517', 'Y'),
(139, 5, 88, 19, 6, 1, '2017-12-08', 'Upper', 'Sample', '1', '8', 'DC NO.2517', 'Y'),
(140, 5, 88, 6, 6, 1, '2017-12-08', 'Upper', 'Sample', '1', '8.75', 'DC NO.2517', 'Y'),
(141, 5, 21, 6, 6, 5, '2017-12-08', 'Upper', 'Sample', '1', '12.25', 'DC NO.2517', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `description_details`
--

DROP TABLE IF EXISTS `description_details`;
CREATE TABLE IF NOT EXISTS `description_details` (
  `description_id` int(11) NOT NULL AUTO_INCREMENT,
  `description_name` varchar(50) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`description_id`),
  UNIQUE KEY `description_name` (`description_name`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `description_details`
--

INSERT INTO `description_details` (`description_id`, `description_name`, `status`) VALUES
(1, 'BUFF CALF', 'Y'),
(2, 'COW CALF', 'Y'),
(3, 'GOAT', 'Y'),
(4, 'SHEEP NAPPA', 'Y'),
(5, 'BUFF LIGHT', 'Y'),
(6, 'COW', 'Y'),
(7, 'COW HIDE', 'Y'),
(8, 'COW LIGHT', 'Y'),
(9, 'COW SIDE', 'Y'),
(10, 'COW SUEDE', 'Y'),
(11, 'GOAT KID', 'Y'),
(12, 'GOAT KID SUEDE', 'Y'),
(13, 'SHEEP', 'Y'),
(14, 'LAMB', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `menu_details`
--

DROP TABLE IF EXISTS `menu_details`;
CREATE TABLE IF NOT EXISTS `menu_details` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(100) NOT NULL,
  `menu_link` varchar(100) NOT NULL DEFAULT '#',
  `menu_icon` varchar(100) NOT NULL,
  `menu_active` varchar(10) NOT NULL,
  `menu_status` varchar(3) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_details`
--

INSERT INTO `menu_details` (`menu_id`, `menu_name`, `menu_link`, `menu_icon`, `menu_active`, `menu_status`) VALUES
(1, 'Leather Details', '#', '', 'active', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `menu_sub_menu_mapping_details`
--

DROP TABLE IF EXISTS `menu_sub_menu_mapping_details`;
CREATE TABLE IF NOT EXISTS `menu_sub_menu_mapping_details` (
  `sub_menu_mapping_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `user_group_id` int(11) NOT NULL,
  `sub_menu_id` int(11) NOT NULL,
  PRIMARY KEY (`sub_menu_mapping_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_sub_menu_mapping_details`
--

INSERT INTO `menu_sub_menu_mapping_details` (`sub_menu_mapping_id`, `menu_id`, `user_group_id`, `sub_menu_id`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 2),
(3, 1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `selection_details`
--

DROP TABLE IF EXISTS `selection_details`;
CREATE TABLE IF NOT EXISTS `selection_details` (
  `selection_id` int(11) NOT NULL AUTO_INCREMENT,
  `selection_name` varchar(50) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`selection_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selection_details`
--

INSERT INTO `selection_details` (`selection_id`, `selection_name`, `status`) VALUES
(1, 'S', 'Y'),
(2, 'Y', 'Y'),
(3, 'M', 'Y'),
(4, 'HALF', 'Y'),
(5, 'BITS', 'Y'),
(6, '-', 'Y'),
(7, 'T', 'Y'),
(8, 'TR', 'Y'),
(9, 'L', 'Y'),
(10, 'B&L', 'Y'),
(11, 'D', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu_details`
--

DROP TABLE IF EXISTS `sub_menu_details`;
CREATE TABLE IF NOT EXISTS `sub_menu_details` (
  `sub_menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_menu_name` varchar(100) NOT NULL,
  `sub_menu_link` varchar(100) NOT NULL DEFAULT '#',
  `sub_menu_icon` varchar(100) NOT NULL,
  `sub_menu_status` varchar(3) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`sub_menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_menu_details`
--

INSERT INTO `sub_menu_details` (`sub_menu_id`, `sub_menu_name`, `sub_menu_link`, `sub_menu_icon`, `sub_menu_status`) VALUES
(1, 'Master Entry', 'master-entry', '', 'Y'),
(2, 'Data Entry', 'data-entry', '', 'Y'),
(3, 'Report', 'report', '', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `user_group_details`
--

DROP TABLE IF EXISTS `user_group_details`;
CREATE TABLE IF NOT EXISTS `user_group_details` (
  `user_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_name` varchar(10) NOT NULL,
  `user_group_status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`user_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_group_details`
--

INSERT INTO `user_group_details` (`user_group_id`, `user_group_name`, `user_group_status`) VALUES
(1, 'admin', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `user_login_details`
--

DROP TABLE IF EXISTS `user_login_details`;
CREATE TABLE IF NOT EXISTS `user_login_details` (
  `user_login_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_id` int(11) NOT NULL,
  `user_login_name` varchar(50) NOT NULL,
  `user_login_password` varchar(200) NOT NULL,
  `user_status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`user_login_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login_details`
--

INSERT INTO `user_login_details` (`user_login_id`, `user_group_id`, `user_login_name`, `user_login_password`, `user_status`) VALUES
(1, 1, 'admin', 'e87abe1716b4b05557cffc69d75047cb', 'Y');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
