-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `advance_payment_details`;
CREATE TABLE `advance_payment_details` (
  `advance_payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL,
  `unit` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `po_number` int(11) NOT NULL,
  `po_date` date NOT NULL,
  `full_po_number` varchar(20) NOT NULL,
  `supplier_date` date NOT NULL,
  `supplier_pi_number` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `query` varchar(100) NOT NULL,
  `payable_month` date NOT NULL,
  `amount` double NOT NULL,
  PRIMARY KEY (`advance_payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `advance_payment_details` (`advance_payment_id`, `supplier_id`, `unit`, `type`, `po_number`, `po_date`, `full_po_number`, `supplier_date`, `supplier_pi_number`, `date`, `query`, `payable_month`, `amount`) VALUES
(1,	1,	'UPPER',	'INDIGENOUS',	1,	'2018-05-02',	'SU/1',	'2018-05-02',	'123',	'2018-05-02',	'test',	'2018-05-03',	123),
(3,	1,	'UPPER',	'INDIGENOUS',	1,	'2018-05-02',	'SP/1',	'2018-05-02',	'123',	'2018-05-02',	'test',	'2018-05-17',	123);

DROP TABLE IF EXISTS `article_details`;
CREATE TABLE `article_details` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_name` varchar(50) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`article_id`),
  UNIQUE KEY `article_name` (`article_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `article_details` (`article_id`, `article_name`, `status`) VALUES
(1,	'D/D',	'Y'),
(2,	'CLASSIC',	'Y'),
(3,	'CLASSIC CRUST',	'Y'),
(4,	'FORUM',	'Y'),
(5,	'FORUM CRUST',	'Y'),
(6,	'FLORA SOFTY',	'Y'),
(7,	'SUEDE',	'Y'),
(8,	'HAIRON',	'Y'),
(9,	'PATENT',	'Y'),
(10,	'VANICE',	'Y'),
(11,	'REMO',	'Y'),
(12,	'FLORIDA',	'Y'),
(13,	'MILANO',	'Y'),
(14,	'MARINA',	'Y'),
(15,	'NAPPA AZTEK',	'Y'),
(16,	'TORINO',	'Y'),
(17,	'S/CR LINING',	'Y'),
(18,	'F/CR LINING',	'Y'),
(19,	'F/VEG LINING',	'Y'),
(20,	'LINING',	'Y'),
(21,	'FLORA',	'Y'),
(22,	'ANIL',	'Y'),
(23,	'BRIGADE',	'Y'),
(24,	'BRIGADE CALF',	'Y'),
(25,	'BRUSHOFF',	'Y'),
(26,	'CARMEN',	'Y'),
(27,	'CARMEN CRUST',	'Y'),
(28,	'CRAZY HORSE',	'Y'),
(29,	'CROCO',	'Y'),
(30,	'CROCO PRINT',	'Y'),
(31,	'CRUST',	'Y'),
(32,	'D/D BURNISH',	'Y'),
(33,	'D/D CRUST',	'Y'),
(34,	'DEER',	'Y'),
(35,	'DRUM DYED',	'Y'),
(36,	'F/CR BURNISH',	'Y'),
(37,	'F/CR',	'Y'),
(38,	'F/CR ANIL',	'Y'),
(39,	'F/CR ANTIC',	'Y'),
(40,	'F/CR ARGENTINA',	'Y'),
(41,	'F/CR NAPOLILUX',	'Y'),
(42,	'F/CR OILY CRAZY HORSE',	'Y'),
(43,	'F/CR PREMIRA NATURAL',	'Y'),
(44,	'F/CR SOCK',	'Y'),
(45,	'FINISH LEATHER',	'Y'),
(46,	'FIRENZE',	'Y'),
(47,	'FLORA BURNISH',	'Y'),
(48,	'FORUM GLAZED',	'Y'),
(49,	'FORUM MILLED',	'Y'),
(50,	'FUR LINING',	'Y'),
(51,	'HEEL GRIP',	'Y'),
(52,	'INFANT',	'Y'),
(53,	'INFANT CRUST',	'Y'),
(54,	'INFANT LINING',	'Y'),
(55,	'INSOLE',	'Y'),
(56,	'MILLED',	'Y'),
(57,	'MILLED BURNISH',	'Y'),
(58,	'MILLED GLAZED',	'Y'),
(59,	'MILLED JAMICA',	'Y'),
(60,	'MILLED LINING',	'Y'),
(61,	'MILLED POLISH',	'Y'),
(62,	'NAPOLILUX',	'Y'),
(63,	'NAPPA',	'Y'),
(64,	'NUBUCK',	'Y'),
(65,	'OILY CRAZY HORSE',	'Y'),
(66,	'PARANA',	'Y'),
(67,	'PREMIRA',	'Y'),
(68,	'PRIMIRA NATURAL',	'Y'),
(69,	'PRINTED',	'Y'),
(70,	'S/CR MILLED LINING',	'Y'),
(71,	'S/CR',	'Y'),
(72,	'SCOTCH GRAIN',	'Y'),
(73,	'SOLE LEATHER',	'Y'),
(74,	'SPLIT',	'Y'),
(75,	'SUEDE NUBUCK',	'Y'),
(76,	'TRAP',	'Y'),
(77,	'YEARLING',	'Y'),
(78,	'D/D MONOCO PRINT',	'Y'),
(79,	'BRAZIL',	'Y'),
(80,	'SKINK',	'Y'),
(81,	'DRUM DYED VENICE',	'Y'),
(82,	'SNAKE PRINT',	'Y'),
(83,	'VENICE',	'Y'),
(84,	'CROCK',	'Y'),
(85,	'RUBBER',	'Y'),
(86,	'VARADEO',	'Y'),
(87,	'PYTHON',	'Y'),
(88,	'SNOW',	'Y');

DROP TABLE IF EXISTS `cheque_number_details`;
CREATE TABLE `cheque_number_details` (
  `cheque_number_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL,
  `payable_month` date NOT NULL,
  `deduction` double NOT NULL,
  `cheque_no` varchar(100) NOT NULL,
  `cheque_date` date NOT NULL,
  `cheque_amount` double NOT NULL,
  `dd_number` varchar(100) NOT NULL,
  `dd_amount` double NOT NULL,
  `dd_date` date NOT NULL,
  PRIMARY KEY (`cheque_number_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `cheque_number_details` (`cheque_number_id`, `supplier_id`, `payable_month`, `deduction`, `cheque_no`, `cheque_date`, `cheque_amount`, `dd_number`, `dd_amount`, `dd_date`) VALUES
(1,	1,	'2018-05-03',	1000,	'32889',	'2018-05-11',	50,	'',	0,	'0000-00-00'),
(3,	1,	'2018-05-17',	0,	'656',	'2018-05-23',	332,	'12',	32,	'2018-05-25');

DROP TABLE IF EXISTS `color_details`;
CREATE TABLE `color_details` (
  `color_id` int(11) NOT NULL AUTO_INCREMENT,
  `color_name` varchar(50) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`color_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `color_details` (`color_id`, `color_name`, `status`) VALUES
(1,	'TM 30',	'Y'),
(2,	'BLACK',	'Y'),
(3,	'MATTONE',	'Y'),
(4,	'E.BLUE',	'Y'),
(5,	'MORNING GREY',	'Y'),
(6,	'NAVY',	'Y'),
(7,	'MID BROWN',	'Y'),
(8,	'NUT',	'Y'),
(9,	'TAN',	'Y'),
(10,	'MOGANO',	'Y'),
(11,	'WHITE',	'Y'),
(12,	'BROWN',	'Y'),
(13,	'DK BROWN',	'Y'),
(14,	'BORDO',	'Y'),
(15,	'RED',	'Y'),
(16,	'SWEET WATER',	'Y'),
(17,	'PALE ROSE',	'Y'),
(18,	'PURPLE',	'Y'),
(19,	'T.MORO',	'Y'),
(20,	'TDM',	'Y'),
(21,	'OXYGEN',	'Y'),
(22,	'ANTACITE',	'Y'),
(23,	'AQUILA TAN',	'Y'),
(24,	'ARABICA',	'Y'),
(25,	'ARANCIO',	'Y'),
(26,	'ARGENTO',	'Y'),
(27,	'ASH',	'Y'),
(28,	'BARK',	'Y'),
(29,	'BEIGE',	'Y'),
(30,	'BIANCO',	'Y'),
(31,	'BICOTO',	'Y'),
(32,	'BISCUIT',	'Y'),
(33,	'BISONTE',	'Y'),
(34,	'BISTRO',	'Y'),
(35,	'BLAIR',	'Y'),
(36,	'BLOOD',	'Y'),
(37,	'BLUE',	'Y'),
(38,	'BLUE NAVY',	'Y'),
(39,	'BLUETTE',	'Y'),
(40,	'BOSCO',	'Y'),
(41,	'BOTTLE GREEN',	'Y'),
(42,	'BRANDY',	'Y'),
(43,	'BRICK',	'Y'),
(44,	'BRONZO',	'Y'),
(45,	'BURGANDY',	'Y'),
(46,	'CAFFE',	'Y'),
(47,	'CAFFE BROWN',	'Y'),
(48,	'CAMEL',	'Y'),
(49,	'CHESNET',	'Y'),
(50,	'CHOCO BROWN',	'Y'),
(51,	'CHOCOLATE',	'Y'),
(52,	'CIGAR',	'Y'),
(53,	'COBALT',	'Y'),
(54,	'COBALTO',	'Y'),
(55,	'COGNAC',	'Y'),
(56,	'CREAME',	'Y'),
(57,	'DENIM',	'Y'),
(58,	'DESSERT',	'Y'),
(59,	'DK BLUE',	'Y'),
(60,	'DK CAMEL',	'Y'),
(62,	'DK GREEN',	'Y'),
(63,	'DK GREY',	'Y'),
(64,	'DK NAVY',	'Y'),
(65,	'DK PINK',	'Y'),
(66,	'DK TAN',	'Y'),
(67,	'DK TAUPE',	'Y'),
(69,	'ELECTRICO',	'Y'),
(70,	'FANGO',	'Y'),
(71,	'FOREST',	'Y'),
(72,	'FUXIA',	'Y'),
(73,	'GAM BROWN',	'Y'),
(74,	'GIALLO',	'Y'),
(75,	'GOLD',	'Y'),
(76,	'GREEN',	'Y'),
(77,	'GREY',	'Y'),
(78,	'GRIGIO',	'Y'),
(79,	'INDACO',	'Y'),
(80,	'IVORY',	'Y'),
(81,	'JAMAICA',	'Y'),
(82,	'JEANS',	'Y'),
(83,	'KHAKI',	'Y'),
(84,	'LAVENDOR',	'Y'),
(85,	'LILAC',	'Y'),
(86,	'LILLA',	'Y'),
(87,	'LIMONE',	'Y'),
(88,	'LONDON TAN',	'Y'),
(89,	'LT BEIGE',	'Y'),
(90,	'LT BLUE',	'Y'),
(91,	'LT BROWN',	'Y'),
(92,	'LT GREEN',	'Y'),
(93,	'LIGHT GREY',	'Y'),
(94,	'LT PINK',	'Y'),
(95,	'LT PURPLE',	'Y'),
(96,	'LT TAN',	'Y'),
(97,	'M BROWN',	'Y'),
(98,	'M COL',	'Y'),
(99,	'MARRONE',	'Y'),
(100,	'MEDIUM BROWN',	'Y'),
(101,	'MID BLUE',	'Y'),
(102,	'MID GREEN',	'Y'),
(103,	'MID GREY',	'Y'),
(104,	'MINT BLUE',	'Y'),
(105,	'MINT GREEN',	'Y'),
(106,	'MUSHROOM',	'Y'),
(107,	'NATURAL',	'Y'),
(108,	'NATURAL BLACK',	'Y'),
(109,	'NVAY',	'Y'),
(110,	'NERO',	'Y'),
(111,	'OCEANO',	'Y'),
(112,	'OFF WHITE',	'Y'),
(113,	'ORANGE',	'Y'),
(114,	'ORIENTAL',	'Y'),
(115,	'PLATINO',	'Y'),
(116,	'PARROT GREEN',	'Y'),
(117,	'PEARAL GOLD',	'Y'),
(118,	'PELTRO',	'Y'),
(119,	'PINK',	'Y'),
(120,	'PIOMBO',	'Y'),
(121,	'RAME',	'Y'),
(122,	'RELAX',	'Y'),
(123,	'RESSIN',	'Y'),
(124,	'RICH TAN',	'Y'),
(125,	'RIVER',	'Y'),
(126,	'ROCCIA',	'Y'),
(127,	'ROSE',	'Y'),
(128,	'ROSSO',	'Y'),
(129,	'ROUGH',	'Y'),
(130,	'ROVERA',	'Y'),
(131,	'ROYAL',	'Y'),
(132,	'ROYAL BLUE',	'Y'),
(133,	'SABBIA',	'Y'),
(134,	'SAFRON',	'Y'),
(135,	'SAHARA',	'Y'),
(136,	'SAND',	'Y'),
(137,	'SANGO BROWN',	'Y'),
(138,	'SHADOW',	'Y'),
(139,	'SHINE BLACK',	'Y'),
(140,	'SIGARO',	'Y'),
(141,	'SILVER',	'Y'),
(142,	'SKY',	'Y'),
(143,	'SMOG',	'Y'),
(144,	'SNUFF',	'Y'),
(145,	'STONE',	'Y'),
(146,	'TAUPE',	'Y'),
(147,	'TEAK',	'Y'),
(148,	'TOBBACCO',	'Y'),
(149,	'TURQUISE',	'Y'),
(150,	'VIOLA',	'Y'),
(151,	'VIOLET',	'Y'),
(152,	'WHISKY',	'Y'),
(153,	'WINE',	'Y'),
(154,	'WOOD',	'Y'),
(155,	'YELLOW',	'Y'),
(156,	'YELLOW BROWN',	'Y'),
(157,	'CAPPACINNO',	'Y'),
(158,	'ICE BLUE',	'Y'),
(159,	'TAN/WOOD',	'Y'),
(160,	'564 BLUE',	'Y'),
(161,	'MOROCCON BLUE',	'Y'),
(162,	'BLACK/SILVER',	'Y'),
(163,	'ELECTRIC BLUE',	'Y'),
(164,	'D.DENIM',	'Y'),
(165,	'ANTHRACITE',	'Y'),
(166,	'SNOW ARGENT',	'Y'),
(167,	'BREEZE VERDA',	'Y'),
(168,	'BREEZE ARGENT',	'Y'),
(169,	'BREEZE TURQUISE',	'Y'),
(170,	'GELSO',	'Y'),
(171,	'CARBON',	'Y'),
(172,	'BLU',	'Y'),
(173,	'MILLED T.MORO',	'Y'),
(174,	'MILLED NAVY',	'Y'),
(175,	'MILLED TAN',	'Y');

DROP TABLE IF EXISTS `component_details`;
CREATE TABLE `component_details` (
  `component_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_id` int(11) NOT NULL,
  `component_name` varchar(50) NOT NULL,
  `component_outlet` varchar(10) NOT NULL,
  `component_file_path` varchar(50) NOT NULL,
  `component_path` varchar(50) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`component_id`),
  KEY `user_group_id` (`user_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `component_details` (`component_id`, `user_group_id`, `component_name`, `component_outlet`, `component_file_path`, `component_path`, `status`) VALUES
(1,	1,	'MasterEntry',	'div1',	'',	'master-entry',	'Y'),
(2,	1,	'DataEntry',	'div1',	'',	'data-entry',	'Y'),
(3,	1,	'Report',	'div1',	'',	'report',	'Y'),
(4,	1,	'PoMasterEntry',	'div1',	'',	'po_master_entry',	'Y'),
(5,	1,	'GeneratePo',	'div1',	'',	'generate_po',	'Y'),
(6,	1,	'MaterialOutstanding',	'div1',	'',	'material_outstanding',	'Y'),
(7,	1,	'PaymentBook',	'div1',	'',	'payment_book',	'Y'),
(8,	1,	'PaymentStatement',	'div1',	'',	'payment_statement',	'Y'),
(9,	1,	'CoveringLetter',	'div1',	'',	'covering_letter',	'Y');

DROP TABLE IF EXISTS `data_entry`;
CREATE TABLE `data_entry` (
  `data_entry_id` int(11) NOT NULL AUTO_INCREMENT,
  `serial_no` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `selection_id` int(11) NOT NULL,
  `description_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `leather` varchar(50) NOT NULL,
  `query` varchar(50) NOT NULL,
  `pieces` float NOT NULL,
  `sqfeet` float NOT NULL,
  `remarks` text NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`data_entry_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `data_entry` (`data_entry_id`, `serial_no`, `article_id`, `color_id`, `selection_id`, `description_id`, `date`, `leather`, `query`, `pieces`, `sqfeet`, `remarks`, `status`) VALUES
(1,	1,	3,	7,	6,	1,	'2017-12-02',	'Upper',	'Return',	1,	3.75,	'DC NO. 2502',	'Y'),
(2,	1,	3,	6,	6,	1,	'2017-12-02',	'Upper',	'Return',	1,	4.25,	'DC NO. 2502',	'Y'),
(4,	1,	3,	21,	6,	1,	'2017-12-02',	'Upper',	'Return',	1,	6.5,	'DC NO.2502',	'Y'),
(5,	1,	21,	8,	6,	1,	'2017-12-02',	'Upper',	'Return',	1,	13,	'DC NO.2502',	'Y'),
(6,	1,	4,	6,	6,	1,	'2017-12-02',	'Upper',	'Return',	1,	8.75,	'DC NO.2502',	'Y'),
(7,	1,	16,	8,	6,	2,	'2017-12-02',	'Upper',	'Return',	1,	6,	'DC NO.2502',	'Y'),
(8,	1,	11,	13,	6,	2,	'2017-12-02',	'Upper',	'Return',	1,	6,	'DC NO.2502',	'Y'),
(9,	1,	1,	1,	6,	2,	'2017-12-02',	'Upper',	'Return',	10,	78,	'DC NO.2502',	'Y'),
(10,	1,	17,	9,	6,	1,	'2017-12-02',	'Lining',	'Return',	17,	122.5,	'DC NO.2502',	'Y'),
(11,	1,	17,	15,	6,	1,	'2017-12-02',	'Lining',	'Return',	17,	137.5,	'DC NO.2502',	'Y'),
(12,	1,	17,	101,	6,	1,	'2017-12-02',	'Lining',	'Return',	2,	11.5,	'DC NO.2502',	'Y'),
(13,	1,	17,	2,	6,	1,	'2017-12-02',	'Lining',	'Return',	1,	4,	'DC NO.2502',	'Y'),
(14,	1,	17,	163,	6,	1,	'2017-12-02',	'Lining',	'Return',	17,	125.5,	'DC NO.2502',	'Y'),
(15,	1,	17,	15,	6,	1,	'2017-12-02',	'Lining',	'Return',	2,	18.25,	'DC NO.2502',	'Y'),
(16,	1,	17,	18,	6,	1,	'2017-12-02',	'Lining',	'Return',	1,	9.75,	'DC NO.2502',	'Y'),
(17,	1,	17,	19,	6,	2,	'2017-12-02',	'Lining',	'Return',	7,	62,	'DC NO.2502',	'Y'),
(18,	1,	18,	9,	6,	2,	'2017-12-02',	'Lining',	'Return',	27,	281.75,	'DC NO.2502',	'Y'),
(19,	1,	18,	15,	6,	2,	'2017-12-02',	'Lining',	'Return',	2,	16.25,	'DC NO.2502',	'Y'),
(20,	1,	2,	7,	6,	1,	'2017-12-02',	'Upper',	'Sample',	1,	3.75,	'DC NO.2503',	'Y'),
(21,	1,	2,	6,	6,	1,	'2017-12-02',	'Upper',	'Sample',	1,	4.25,	'DC NO.2503',	'Y'),
(22,	1,	2,	21,	6,	1,	'2017-12-02',	'Upper',	'Sample',	1,	6.5,	'DC NO.2503',	'Y'),
(23,	2,	1,	4,	6,	2,	'2017-12-04',	'Lining',	'LOT',	3,	33,	'DC NO.2509',	'Y'),
(24,	1,	21,	8,	6,	5,	'2017-12-02',	'Upper',	'Sample',	1,	13,	'DC NO.2503',	'Y'),
(25,	1,	4,	6,	6,	1,	'2017-12-02',	'Upper',	'Sample',	1,	8.75,	'DC NO.2503',	'Y'),
(26,	1,	16,	8,	6,	2,	'2017-12-02',	'Upper',	'Sample',	1,	6,	'DC NO.2503',	'Y'),
(27,	1,	11,	13,	6,	2,	'2017-12-02',	'Upper',	'Sample',	1,	6,	'DC NO.2503',	'Y'),
(28,	1,	1,	1,	6,	2,	'2017-12-02',	'Upper',	'Sample',	10,	78,	'DC NO.2503',	'Y'),
(29,	1,	8,	2,	6,	6,	'2017-12-02',	'Upper',	'Sample',	2,	30,	'DC NO.2504',	'Y'),
(30,	1,	8,	157,	6,	6,	'2017-12-02',	'Upper',	'Sample',	1,	8,	'DC NO.2504',	'Y'),
(31,	1,	8,	13,	6,	6,	'2017-12-02',	'Upper',	'Sample',	1,	22.25,	'DC NO.2504',	'Y'),
(32,	1,	8,	76,	6,	6,	'2017-12-02',	'Upper',	'Sample',	1,	22,	'DC NO.2504',	'Y'),
(33,	1,	8,	158,	6,	6,	'2017-12-02',	'Upper',	'Sample',	1,	24.75,	'DC NO.2504',	'Y'),
(34,	1,	8,	159,	6,	6,	'2017-12-02',	'Upper',	'Sample',	2,	22.25,	'DC NO.2504',	'Y'),
(35,	1,	78,	1,	6,	2,	'2017-12-02',	'Upper',	'Sample',	1,	6.5,	'DC NO.2504',	'Y'),
(36,	1,	79,	1,	6,	2,	'2017-12-02',	'Upper',	'Sample',	1,	6.5,	'DC NO.2504',	'Y'),
(37,	1,	56,	2,	6,	1,	'2017-12-02',	'Upper',	'Sample',	1,	6,	'DC NO.2504',	'Y'),
(38,	1,	4,	10,	6,	1,	'2017-12-02',	'Upper',	'Sample',	1,	7.25,	'DC NO.2504',	'Y'),
(39,	1,	80,	2,	6,	14,	'2017-12-02',	'Upper',	'Sample',	2,	15.75,	'DC NO.2505',	'Y'),
(40,	1,	81,	1,	6,	3,	'2017-12-02',	'Upper',	'LOT',	9,	35,	'DC NO.2505',	'Y'),
(41,	1,	66,	3,	3,	2,	'2017-12-02',	'Upper',	'LOT',	4,	28.75,	'DC NO.2505',	'Y'),
(42,	1,	4,	6,	1,	1,	'2017-12-02',	'Upper',	'LOT',	60,	470.75,	'DC NO.2505',	'Y'),
(43,	1,	4,	8,	1,	1,	'2017-12-02',	'Upper',	'LOT',	104,	885,	'DC NO.2506',	'Y'),
(44,	1,	35,	1,	3,	2,	'2017-12-02',	'Upper',	'LOT',	1156,	8141.5,	'DC NO.2506',	'Y'),
(45,	1,	16,	6,	6,	2,	'2017-12-02',	'Upper',	'Sample',	1,	5.25,	'DC NO.2506',	'Y'),
(46,	1,	35,	1,	6,	2,	'2017-12-02',	'Upper',	'Sample',	63,	449,	'DC NO.2506',	'Y'),
(47,	1,	66,	37,	6,	2,	'2017-12-02',	'Upper',	'Return',	8,	53.75,	'DC NO.2507',	'Y'),
(48,	1,	11,	160,	6,	2,	'2017-12-02',	'Upper',	'LOT',	8,	53.75,	'DC NO.2507',	'Y'),
(49,	1,	3,	8,	6,	1,	'2017-12-02',	'Upper',	'Sample',	1,	7.25,	'DC NO.2507',	'Y'),
(50,	1,	66,	3,	6,	2,	'2017-12-02',	'Upper',	'LOT',	10,	74.25,	'DC NO.2507',	'Y'),
(51,	2,	76,	6,	6,	3,	'2017-12-04',	'Upper',	'LOT',	6,	46.25,	'DC NO.2509',	'Y'),
(52,	2,	76,	161,	6,	3,	'2017-12-04',	'Upper',	'LOT',	8,	55.5,	'DC NO.2509',	'Y'),
(53,	2,	82,	141,	6,	3,	'2017-12-04',	'Upper',	'LOT',	4,	21,	'DC NO.2509',	'Y'),
(54,	2,	82,	162,	6,	3,	'2017-12-04',	'Upper',	'LOT',	1,	7,	'DC NO.2509',	'Y'),
(55,	2,	4,	2,	6,	1,	'2017-12-04',	'Upper',	'LOT',	11,	85.5,	'DC NO.2509',	'Y'),
(56,	2,	83,	11,	6,	3,	'2017-12-04',	'Upper',	'LOT',	7,	36.5,	'DC NO.2510',	'Y'),
(57,	2,	11,	9,	6,	2,	'2017-12-04',	'Upper',	'Sample',	1,	6.25,	'DC NO.2510',	'Y'),
(58,	2,	11,	154,	6,	2,	'2017-12-04',	'Upper',	'Sample',	1,	6,	'DC NO.2510',	'Y'),
(59,	2,	11,	145,	6,	2,	'2017-12-04',	'Upper',	'Sample',	1,	6.25,	'DC NO.2510',	'Y'),
(60,	2,	11,	10,	6,	2,	'2017-12-04',	'Upper',	'Sample',	1,	7,	'DC NO.2510',	'Y'),
(61,	2,	3,	119,	6,	1,	'2017-12-04',	'Upper',	'Sample',	1,	9.5,	'DC NO.2510',	'Y'),
(62,	2,	3,	145,	6,	1,	'2017-12-04',	'Upper',	'Sample',	1,	5.5,	'DC NO.2510',	'Y'),
(63,	2,	3,	149,	6,	1,	'2017-12-04',	'Upper',	'Sample',	1,	7.75,	'DC NO.2510',	'Y'),
(64,	2,	3,	6,	6,	1,	'2017-12-04',	'Upper',	'Sample',	2,	17,	'DC NO.2510',	'Y'),
(65,	2,	3,	13,	6,	1,	'2017-12-04',	'Upper',	'Sample',	1,	11,	'DC NO.2510',	'Y'),
(66,	2,	3,	105,	6,	1,	'2017-12-04',	'Upper',	'Sample',	1,	9.75,	'DC NO.2510',	'Y'),
(67,	2,	3,	163,	6,	1,	'2017-12-04',	'Upper',	'Sample',	1,	10.75,	'DC NO.2510',	'Y'),
(68,	2,	3,	70,	6,	1,	'2017-12-04',	'Upper',	'LOT',	3,	22,	'DC NO.2510',	'Y'),
(69,	2,	72,	1,	6,	2,	'2017-12-04',	'Upper',	'Sample',	3,	26.25,	'DC NO.2510',	'Y'),
(70,	2,	83,	11,	6,	3,	'2017-12-04',	'Upper',	'Sample',	1,	7,	'DC NO.2511',	'Y'),
(71,	2,	84,	2,	6,	1,	'2017-12-04',	'Upper',	'Sample',	2,	17,	'DC NO.2511',	'Y'),
(72,	2,	84,	1,	6,	1,	'2017-12-04',	'Upper',	'Sample',	7,	66.25,	'DC NO.2511',	'Y'),
(73,	2,	4,	8,	6,	1,	'2017-12-04',	'Upper',	'LOT',	15,	133,	'DC NO.2511',	'Y'),
(74,	2,	66,	8,	6,	2,	'2017-12-04',	'Upper',	'LOT',	172,	2443.25,	'DC NO.2511',	'Y'),
(75,	3,	66,	3,	6,	2,	'2017-12-06',	'Upper',	'LOT',	22,	144.75,	'DC NO.2512',	'Y'),
(76,	3,	4,	6,	6,	1,	'2017-12-06',	'Upper',	'LOT',	7,	43.25,	'DC NO.2512',	'Y'),
(77,	3,	4,	8,	6,	1,	'2017-12-06',	'Upper',	'LOT',	25,	218.5,	'DC NO.2512',	'Y'),
(78,	1,	17,	9,	6,	1,	'2017-12-02',	'Lining',	'Sample',	17,	122.5,	'DC NO.2503',	'Y'),
(79,	1,	19,	15,	6,	1,	'2017-12-02',	'Lining',	'Sample',	17,	137.5,	'DC NO.2503',	'Y'),
(80,	1,	19,	101,	6,	1,	'2017-12-02',	'Lining',	'Sample',	2,	11.5,	'DC NO.2503',	'Y'),
(81,	1,	17,	2,	6,	2,	'2017-12-02',	'Lining',	'Sample',	1,	4,	'DC NO.2503',	'Y'),
(82,	1,	18,	9,	6,	2,	'2017-12-02',	'Lining',	'Sample',	83,	881.75,	'DC NO.2503',	'Y'),
(83,	1,	17,	19,	6,	1,	'2017-12-02',	'Lining',	'Sample',	7,	62,	'DC NO.2503',	'Y'),
(84,	1,	17,	163,	6,	1,	'2017-12-02',	'Lining',	'Sample',	17,	125.5,	'DC NO.2503',	'Y'),
(85,	1,	17,	15,	6,	1,	'2017-12-02',	'Lining',	'Sample',	2,	18.25,	'DC NO.2503',	'Y'),
(86,	1,	18,	15,	6,	2,	'2017-12-02',	'Lining',	'Sample',	2,	16.25,	'DC NO.2503',	'Y'),
(87,	1,	19,	18,	6,	1,	'2017-12-02',	'Lining',	'Sample',	1,	9.75,	'DC NO.2503',	'Y'),
(88,	1,	19,	15,	2,	1,	'2017-12-02',	'Lining',	'LOT',	420,	3470,	'DC NO.2505',	'Y'),
(89,	1,	19,	15,	4,	1,	'2017-12-02',	'Lining',	'LOT',	22,	128,	'DC NO.2505',	'Y'),
(90,	1,	19,	15,	5,	1,	'2017-12-02',	'Lining',	'LOT',	0,	7.5,	'DC NO.2505',	'Y'),
(91,	1,	18,	9,	2,	2,	'2017-12-02',	'Lining',	'LOT',	174,	1940,	'DC NO.2506',	'Y'),
(92,	1,	19,	163,	6,	1,	'2017-12-02',	'Lining',	'LOT',	90,	691.75,	'DC NO.2507,08',	'Y'),
(93,	1,	18,	9,	2,	1,	'2017-12-02',	'Lining',	'LOT',	200,	1973,	'DC NO.2508',	'Y'),
(101,	2,	18,	163,	6,	2,	'2017-12-04',	'Lining',	'LOT',	7,	62,	'DC NO.2509',	'Y'),
(102,	2,	19,	163,	2,	1,	'2017-12-04',	'Lining',	'LOT',	315,	2539,	'DC NO.2509',	'Y'),
(103,	2,	17,	9,	2,	8,	'2017-12-04',	'Lining',	'LOT',	177,	2505,	'DC NO.2509',	'Y'),
(104,	2,	18,	163,	2,	2,	'2017-12-04',	'Lining',	'Sample',	3,	26.25,	'DC NO.2511',	'Y'),
(105,	2,	17,	9,	2,	8,	'2017-12-04',	'Lining',	'Sample',	27,	408.25,	'DC NO.2511',	'Y'),
(106,	2,	50,	146,	6,	13,	'2017-12-04',	'Lining',	'Sample',	7,	26,	'DC NO.2511',	'Y'),
(107,	2,	50,	149,	6,	13,	'2017-12-04',	'Lining',	'Sample',	5,	18,	'DC NO.2511',	'Y'),
(108,	3,	19,	163,	2,	1,	'2017-12-06',	'Lining',	'LOT',	326,	2601.25,	'DC NO.2512',	'Y'),
(109,	3,	20,	11,	6,	3,	'2017-12-06',	'Lining',	'LOT',	45,	228.25,	'DC NO.2512',	'Y'),
(110,	3,	7,	146,	6,	6,	'2017-12-06',	'Upper',	'LOT',	10,	112.25,	'DC NO.2513',	'Y'),
(111,	3,	85,	11,	6,	6,	'2017-12-06',	'Upper',	'Sample',	1,	11.25,	'DC NO.2513',	'Y'),
(112,	3,	85,	164,	6,	6,	'2017-12-06',	'Upper',	'Sample',	1,	18.25,	'DC NO.2513',	'Y'),
(113,	3,	66,	2,	6,	2,	'2017-12-06',	'Upper',	'LOT',	30,	222.5,	'DC NO.2513',	'Y'),
(114,	3,	3,	55,	6,	1,	'2017-12-06',	'Upper',	'Sample',	1,	5,	'DC NO.2513',	'Y'),
(115,	3,	35,	1,	6,	1,	'2017-12-06',	'Upper',	'LOT',	48,	452.25,	'DC NO.2513',	'Y'),
(116,	3,	84,	101,	6,	1,	'2017-12-06',	'Upper',	'LOT',	29,	228,	'DC NO.2514',	'Y'),
(117,	3,	53,	2,	6,	2,	'2017-12-06',	'Upper',	'Sample',	8,	50,	'DC NO.2514',	'Y'),
(118,	3,	8,	165,	6,	6,	'2017-12-06',	'Upper',	'Sample',	1,	6.5,	'DC NO.2514',	'Y'),
(119,	3,	8,	166,	6,	6,	'2017-12-06',	'Upper',	'Sample',	1,	9.25,	'DC NO.2514',	'Y'),
(120,	3,	8,	167,	6,	6,	'2017-12-06',	'Upper',	'Sample',	1,	6.75,	'DC NO.2514',	'Y'),
(121,	3,	8,	168,	6,	6,	'2017-12-06',	'Upper',	'Sample',	1,	7.25,	'DC NO.2514',	'Y'),
(122,	3,	8,	169,	6,	6,	'2017-12-06',	'Upper',	'Sample',	1,	8.25,	'DC NO.2514',	'Y'),
(123,	4,	86,	59,	6,	6,	'2018-02-08',	'Upper',	'Sample',	1,	12,	'DC NO.2515',	'Y'),
(124,	4,	86,	170,	6,	6,	'2018-02-08',	'Upper',	'Sample',	1,	7.75,	'DC NO.2515',	'Y'),
(125,	4,	86,	55,	6,	6,	'2018-02-08',	'Upper',	'Sample',	1,	4.25,	'DC NO.2515',	'Y'),
(126,	4,	86,	2,	6,	6,	'2018-02-08',	'Upper',	'Sample',	1,	9.25,	'DC NO.2515',	'Y'),
(127,	4,	86,	171,	6,	6,	'2018-02-08',	'Upper',	'Sample',	1,	7.25,	'DC NO.2515',	'Y'),
(128,	4,	66,	172,	3,	2,	'2018-02-08',	'Upper',	'LOT',	23,	146,	'DC NO.2515',	'Y'),
(129,	5,	83,	1,	9,	3,	'2017-12-08',	'Upper',	'LOT',	140,	627.75,	'DC NO.2516',	'Y'),
(130,	5,	83,	163,	7,	3,	'2017-12-08',	'Upper',	'LOT',	77,	440.25,	'DC NO.2516',	'Y'),
(131,	5,	83,	13,	7,	3,	'2017-12-08',	'Upper',	'LOT',	65,	395.75,	'DC NO.2516',	'Y'),
(132,	5,	87,	1,	6,	1,	'2017-12-08',	'Upper',	'Sample',	7,	58.5,	'DC NO.2516',	'Y'),
(133,	5,	35,	1,	3,	2,	'2017-12-08',	'Upper',	'Sample',	22,	175.75,	'DC NO.2516',	'Y'),
(134,	5,	35,	1,	3,	2,	'2017-12-08',	'Upper',	'LOT',	458,	3517,	'DC NO.2516',	'Y'),
(135,	5,	82,	162,	6,	3,	'2017-12-08',	'Upper',	'LOT',	13,	72.25,	'DC NO.2516',	'Y'),
(136,	5,	82,	141,	6,	3,	'2017-12-08',	'Upper',	'LOT',	54,	305.5,	'DC NO.2516',	'Y'),
(137,	5,	66,	172,	3,	2,	'2017-12-08',	'Upper',	'LOT',	66,	454,	'DC NO.2517',	'Y'),
(138,	5,	88,	9,	6,	1,	'2017-12-08',	'Upper',	'Sample',	1,	7.5,	'DC NO.2517',	'Y'),
(139,	5,	88,	19,	6,	1,	'2017-12-08',	'Upper',	'Sample',	1,	8,	'DC NO.2517',	'Y'),
(140,	5,	88,	6,	6,	1,	'2017-12-08',	'Upper',	'Sample',	1,	8.75,	'DC NO.2517',	'Y'),
(141,	5,	21,	6,	6,	5,	'2017-12-08',	'Upper',	'Sample',	1,	12.25,	'DC NO.2517',	'Y'),
(142,	1,	1,	1,	1,	1,	'2018-01-03',	'Upper',	'Sample',	1,	1,	'test',	'Y'),
(143,	2,	1,	1,	2,	1,	'2018-01-11',	'Upper',	'Sample',	1,	1,	'1',	'Y'),
(144,	3,	1,	1,	1,	1,	'2018-01-18',	'Upper',	'Sample',	1,	1,	'tesd',	'Y'),
(145,	4,	1,	1,	2,	1,	'2018-01-17',	'Upper',	'LOT',	1,	1,	'test',	'Y'),
(146,	5,	1,	1,	1,	2,	'2018-01-17',	'Upper',	'LOT',	1,	1,	'test',	'Y'),
(147,	5,	1,	1,	1,	1,	'2018-01-17',	'Upper',	'Sample',	1,	1,	'1',	'Y'),
(148,	5,	1,	1,	1,	1,	'2018-01-17',	'Upper',	'Sample',	1,	1,	'1',	'Y'),
(149,	5,	1,	1,	1,	1,	'2018-01-17',	'Upper',	'Sample',	1,	1,	'test',	'Y'),
(150,	5,	1,	1,	1,	1,	'2018-01-17',	'Upper',	'Sample',	1,	1,	'test',	'Y'),
(151,	5,	5,	2,	2,	1,	'2018-01-17',	'Upper',	'Sample',	1,	23,	'test',	'Y'),
(152,	5,	2,	2,	3,	1,	'2018-01-17',	'Lining',	'LOT',	12,	12,	'test',	'Y'),
(153,	15,	2,	2,	3,	1,	'2018-01-17',	'Lining',	'LOT',	12,	12,	'test',	'Y'),
(154,	15,	2,	1,	1,	1,	'2018-01-13',	'Upper',	'LOT',	12,	12.4,	'as',	'Y'),
(155,	15,	1,	1,	2,	1,	'2018-01-18',	'Upper',	'Sample',	12,	12,	'test',	'Y'),
(156,	16,	1,	1,	1,	1,	'2018-01-21',	'Upper',	'Sample',	12,	12,	'test',	'Y'),
(157,	16,	1,	1,	1,	1,	'2018-01-21',	'Upper',	'LOT',	12,	12,	'test',	'Y'),
(158,	16,	1,	1,	1,	1,	'2018-01-21',	'Upper',	'Return',	12,	12,	'test',	'Y'),
(159,	17,	1,	1,	1,	1,	'2018-01-22',	'Upper',	'LOT',	121,	12,	'test',	'Y'),
(160,	17,	1,	1,	1,	1,	'2018-01-22',	'Upper',	'LOT',	12,	12,	'test',	'Y'),
(161,	4,	1,	1,	1,	1,	'2018-02-08',	'Upper',	'Sample',	1,	1,	'1',	'Y');

DROP TABLE IF EXISTS `debit_note_details`;
CREATE TABLE `debit_note_details` (
  `s_no` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL,
  `type` char(1) NOT NULL,
  `debit_note_no` varchar(30) NOT NULL,
  `debit_note_date` date NOT NULL,
  `supplier_creditnote` varchar(30) NOT NULL,
  `supplier_creditnote_date` date NOT NULL,
  `query` varchar(500) NOT NULL,
  `payable_month` date NOT NULL,
  `amount` float NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`s_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `debit_note_details` (`s_no`, `supplier_id`, `type`, `debit_note_no`, `debit_note_date`, `supplier_creditnote`, `supplier_creditnote_date`, `query`, `payable_month`, `amount`, `created_date`) VALUES
(6,	1,	'D',	'787878',	'2018-05-05',	'dsf',	'2018-05-05',	'AHSDKJASKJDJK',	'2018-05-03',	56,	'2018-04-30'),
(9,	1,	'B',	'nn',	'2018-05-24',	'm',	'2018-05-14',	'121',	'2018-05-17',	12,	'2018-05-12'),
(10,	1,	'C',	'jj',	'2018-05-23',	'd',	'2018-05-24',	'TEST',	'2018-05-15',	23,	'2018-05-12');

DROP TABLE IF EXISTS `description_details`;
CREATE TABLE `description_details` (
  `description_id` int(11) NOT NULL AUTO_INCREMENT,
  `description_name` varchar(50) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`description_id`),
  UNIQUE KEY `description_name` (`description_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `description_details` (`description_id`, `description_name`, `status`) VALUES
(1,	'BUFF CALF',	'Y'),
(2,	'COW CALF',	'Y'),
(3,	'GOAT',	'Y'),
(4,	'SHEEP NAPPA',	'Y'),
(5,	'BUFF LIGHT',	'Y'),
(6,	'COW',	'Y'),
(7,	'COW HIDE',	'Y'),
(8,	'COW LIGHT',	'Y'),
(9,	'COW SIDE',	'Y'),
(10,	'COW SUEDE',	'Y'),
(11,	'GOAT KID',	'Y'),
(12,	'GOAT KID SUEDE',	'Y'),
(13,	'SHEEP',	'Y'),
(14,	'LAMB',	'Y');

DROP TABLE IF EXISTS `import_other_details`;
CREATE TABLE `import_other_details` (
  `import_other_id` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `po_number` varchar(30) NOT NULL,
  `po_date` date NOT NULL,
  `delivery_date` date NOT NULL,
  `incoterms` varchar(50) NOT NULL,
  `payment_terms` varchar(50) NOT NULL,
  `Shipment` varchar(50) NOT NULL,
  `query` varchar(150) NOT NULL,
  PRIMARY KEY (`import_other_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `import_other_details` (`import_other_id`, `unit`, `type`, `po_number`, `po_date`, `delivery_date`, `incoterms`, `payment_terms`, `Shipment`, `query`) VALUES
(8,	'Upper',	'Import',	'1',	'2018-05-23',	'0000-00-00',	'EX-WORKS',	'ADVANCE_IT',	'BY TNT COURIER `OUR A/C# 20407`',	'1WWW');

DROP TABLE IF EXISTS `material_details`;
CREATE TABLE `material_details` (
  `material_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL,
  `material_master_id` int(11) NOT NULL,
  `material_name` varchar(100) NOT NULL,
  `group` varchar(30) NOT NULL,
  `material_hsn_code` varchar(30) NOT NULL,
  `material_uom` varchar(30) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `price` float NOT NULL,
  `price_status` varchar(30) NOT NULL,
  `CGST` float NOT NULL,
  `SGST` float NOT NULL,
  `IGST` float NOT NULL,
  `discount` float NOT NULL,
  `discount_price_status` enum('PERCENTAGE','AMOUNT') NOT NULL DEFAULT 'PERCENTAGE',
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`material_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `material_details` (`material_id`, `supplier_id`, `material_master_id`, `material_name`, `group`, `material_hsn_code`, `material_uom`, `currency`, `price`, `price_status`, `CGST`, `SGST`, `IGST`, `discount`, `discount_price_status`, `status`) VALUES
(6,	1,	2,	'MATERIAL NAME NEW 1',	'TEST',	'HDD',	'PAIRS1',	'INR',	2000,	'FINAL',	2,	2,	0,	0,	'PERCENTAGE',	'Y'),
(7,	1,	3,	'MATERIAL NAME TESTING',	'TEST',	'HM',	'PAIRS1',	'INR',	3004,	'FINAL',	2,	2,	0,	0,	'PERCENTAGE',	'Y');

DROP TABLE IF EXISTS `material_master`;
CREATE TABLE `material_master` (
  `material_id` int(11) NOT NULL AUTO_INCREMENT,
  `material_name` varchar(200) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`material_id`),
  UNIQUE KEY `material_name` (`material_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `material_master` (`material_id`, `material_name`, `status`) VALUES
(1,	'MATERIAL NAME',	'Y'),
(2,	'MATERIAL NAME NEW 1',	'Y'),
(3,	'MATERIAL NAME TESTING',	'Y'),
(4,	'MATERIAL NAME NEW MY NEW BOOKING',	'Y');

DROP TABLE IF EXISTS `menu_details`;
CREATE TABLE `menu_details` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(100) NOT NULL,
  `menu_link` varchar(100) NOT NULL DEFAULT '#',
  `menu_icon` varchar(100) NOT NULL,
  `menu_active` varchar(10) NOT NULL,
  `menu_status` varchar(3) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `menu_details` (`menu_id`, `menu_name`, `menu_link`, `menu_icon`, `menu_active`, `menu_status`) VALUES
(1,	'Leather Details',	'#',	'',	'active',	'Y'),
(2,	'Purchase Order',	'#',	'',	'',	'Y');

DROP TABLE IF EXISTS `menu_sub_menu_mapping_details`;
CREATE TABLE `menu_sub_menu_mapping_details` (
  `sub_menu_mapping_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `user_group_id` int(11) NOT NULL,
  `sub_menu_id` int(11) NOT NULL,
  PRIMARY KEY (`sub_menu_mapping_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `menu_sub_menu_mapping_details` (`sub_menu_mapping_id`, `menu_id`, `user_group_id`, `sub_menu_id`) VALUES
(1,	1,	1,	1),
(2,	1,	1,	2),
(3,	1,	1,	3),
(4,	2,	1,	4),
(5,	2,	1,	5),
(6,	2,	1,	6),
(7,	2,	1,	7),
(8,	2,	1,	8),
(9,	2,	1,	9);

DROP TABLE IF EXISTS `other_master_details`;
CREATE TABLE `other_master_details` (
  `other_master_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('GROUP') NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`other_master_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `other_master_details` (`other_master_id`, `type`, `name`, `status`) VALUES
(6,	'GROUP',	'TEST',	'Y');

DROP TABLE IF EXISTS `overall_discount_details`;
CREATE TABLE `overall_discount_details` (
  `overall_discount_id` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `po_number` int(11) NOT NULL,
  `po_date` date NOT NULL,
  `discount_type` enum('PERCENTAGE','AMOUNT') NOT NULL DEFAULT 'PERCENTAGE',
  `discount` float NOT NULL,
  PRIMARY KEY (`overall_discount_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `overall_discount_details` (`overall_discount_id`, `unit`, `type`, `po_number`, `po_date`, `discount_type`, `discount`) VALUES
(1,	'Upper',	'Import',	1,	'2018-03-24',	'AMOUNT',	50),
(2,	'FULL SHOE',	'SAMPLE_INDIGENOUS',	1,	'2018-03-21',	'AMOUNT',	1000);

DROP TABLE IF EXISTS `po_generated_request_details`;
CREATE TABLE `po_generated_request_details` (
  `po_generated_request_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_po_generated_request_id` int(11) NOT NULL,
  `unit` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `order_reference` varchar(30) NOT NULL,
  `po_number` int(11) NOT NULL,
  `po_date` date NOT NULL,
  `delivery_date` date NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `material_master_id` int(11) NOT NULL,
  `material_name` varchar(300) NOT NULL,
  `po_description` varchar(300) NOT NULL,
  `material_hsn_code` varchar(30) NOT NULL,
  `qty` double NOT NULL,
  `material_uom` varchar(30) NOT NULL,
  `currency` varchar(30) NOT NULL,
  `price` float NOT NULL,
  `price_status` varchar(30) NOT NULL,
  `CGST` float NOT NULL,
  `IGST` float NOT NULL,
  `SGST` float NOT NULL,
  `discount` float NOT NULL,
  `discount_price_status` enum('PERCENTAGE','AMOUNT') NOT NULL DEFAULT 'PERCENTAGE',
  `received` double NOT NULL,
  `received_date` date NOT NULL,
  `dc_date` date NOT NULL,
  `bill_date` date NOT NULL,
  `bill_number` varchar(50) NOT NULL,
  `bill_amount` float NOT NULL,
  `payable_month` date NOT NULL,
  `dc_number` varchar(30) NOT NULL,
  `outstanding_type` enum('M','B') NOT NULL DEFAULT 'M',
  `s_no` int(11) NOT NULL,
  `query` varchar(50) NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`po_generated_request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `po_generated_request_details` (`po_generated_request_id`, `parent_po_generated_request_id`, `unit`, `type`, `order_reference`, `po_number`, `po_date`, `delivery_date`, `supplier_id`, `material_id`, `material_master_id`, `material_name`, `po_description`, `material_hsn_code`, `qty`, `material_uom`, `currency`, `price`, `price_status`, `CGST`, `IGST`, `SGST`, `discount`, `discount_price_status`, `received`, `received_date`, `dc_date`, `bill_date`, `bill_number`, `bill_amount`, `payable_month`, `dc_number`, `outstanding_type`, `s_no`, `query`, `created_date`) VALUES
(59,	0,	'Upper',	'Indigenous',	'GRML',	1,	'2018-05-02',	'2018-05-04',	1,	6,	2,	'MATERIAL NAME NEW 1',	'',	'HDD',	10,	'PAIRS1',	'INR',	2,	'FINAL',	2,	0,	2,	0,	'PERCENTAGE',	10,	'2018-04-30',	'0000-00-00',	'0000-00-00',	'',	0,	'0000-00-00',	'2',	'M',	0,	'',	'2018-04-30'),
(60,	0,	'Full Shoe',	'Indigenous',	'HT',	1,	'2018-05-05',	'2018-05-02',	1,	6,	2,	'MATERIAL NAME NEW 1',	'TEST',	'HDD',	402,	'PAIRS1',	'INR',	2000,	'FINAL',	2,	0,	2,	0,	'PERCENTAGE',	402,	'2018-04-30',	'0000-00-00',	'0000-00-00',	'',	0,	'0000-00-00',	'123',	'M',	0,	'',	'2018-04-30'),
(61,	0,	'Full Shoe',	'Indigenous',	'HT',	1,	'2018-05-05',	'2018-05-02',	1,	7,	3,	'MATERIAL NAME TESTING',	'',	'HM',	398,	'PAIRS1',	'INR',	3004,	'FINAL',	2,	0,	2,	0,	'PERCENTAGE',	398,	'2018-04-30',	'0000-00-00',	'0000-00-00',	'',	0,	'0000-00-00',	'334',	'M',	0,	'',	'2018-04-30'),
(62,	59,	'UPPER',	'INDIGENOUS',	'GRML',	1,	'2018-05-02',	'2018-05-04',	1,	6,	2,	'MATERIAL NAME NEW 1',	'',	'HDD',	10,	'PAIRS1',	'INR',	2,	'FINAL',	2,	0,	2,	0,	'PERCENTAGE',	10,	'2018-03-30',	'2018-03-30',	'2018-03-30',	'432',	900008,	'2018-05-03',	'2',	'B',	10,	'',	'2018-04-30'),
(63,	60,	'FULL SHOE',	'INDIGENOUS',	'HT',	1,	'2018-05-05',	'2018-05-02',	1,	6,	2,	'MATERIAL NAME NEW 1',	'',	'HDD',	402,	'PAIRS1',	'INR',	2000,	'FINAL',	2,	0,	2,	0,	'PERCENTAGE',	402,	'2018-03-30',	'2018-03-30',	'2018-03-30',	'432',	900008,	'2018-05-03',	'123',	'B',	10,	'',	'2018-04-30'),
(64,	61,	'FULL SHOE',	'INDIGENOUS',	'HT',	1,	'2018-05-05',	'2018-05-02',	1,	7,	3,	'MATERIAL NAME TESTING',	'',	'HM',	398,	'PAIRS1',	'INR',	3004,	'FINAL',	2,	0,	2,	0,	'PERCENTAGE',	398,	'2018-03-30',	'2018-03-30',	'2018-03-30',	'432',	900008,	'2018-05-03',	'334',	'B',	10,	'',	'2018-04-30'),
(65,	0,	'Upper',	'Indigenous',	'FFF',	2,	'2018-05-16',	'2018-05-24',	1,	6,	2,	'MATERIAL NAME NEW 1',	'',	'HDD',	100,	'PAIRS1',	'INR',	2000,	'FINAL',	2,	0,	2,	0,	'PERCENTAGE',	10,	'2018-05-12',	'0000-00-00',	'0000-00-00',	'',	0,	'0000-00-00',	'D',	'M',	0,	'',	'2018-05-12'),
(66,	0,	'Upper',	'Indigenous',	'HHF',	3,	'2018-05-24',	'2018-05-29',	1,	6,	2,	'MATERIAL NAME NEW 1',	'',	'HDD',	0,	'PAIRS1',	'INR',	2000,	'FINAL',	2,	0,	2,	0,	'PERCENTAGE',	0,	'0000-00-00',	'0000-00-00',	'0000-00-00',	'',	0,	'0000-00-00',	'',	'M',	0,	'',	'2018-05-12'),
(67,	0,	'Upper',	'Indigenous',	'HHD',	4,	'2018-05-22',	'2018-05-31',	1,	6,	2,	'MATERIAL NAME NEW 1',	'',	'HDD',	0,	'PAIRS1',	'INR',	2000,	'FINAL',	2,	0,	2,	0,	'PERCENTAGE',	0,	'0000-00-00',	'0000-00-00',	'0000-00-00',	'',	0,	'0000-00-00',	'',	'M',	0,	'',	'2018-05-12'),
(68,	0,	'Upper',	'Indigenous',	'FFF',	5,	'2018-05-30',	'2018-05-31',	1,	6,	2,	'MATERIAL NAME NEW 1',	'',	'HDD',	0,	'PAIRS1',	'INR',	2000,	'FINAL',	2,	0,	2,	0,	'PERCENTAGE',	0,	'0000-00-00',	'0000-00-00',	'0000-00-00',	'',	0,	'0000-00-00',	'',	'M',	0,	'',	'2018-05-12'),
(69,	0,	'Upper',	'Indigenous',	'FFF',	6,	'2018-05-24',	'2018-05-28',	1,	6,	2,	'MATERIAL NAME NEW 1',	'',	'HDD',	0,	'PAIRS1',	'INR',	2000,	'FINAL',	2,	0,	2,	0,	'PERCENTAGE',	0,	'0000-00-00',	'0000-00-00',	'0000-00-00',	'',	0,	'0000-00-00',	'',	'M',	0,	'',	'2018-05-12'),
(70,	0,	'Upper',	'Indigenous',	'D',	7,	'2018-05-23',	'2018-05-30',	1,	6,	2,	'MATERIAL NAME NEW 1',	'',	'HDD',	0,	'PAIRS1',	'INR',	2000,	'FINAL',	2,	0,	2,	0,	'PERCENTAGE',	0,	'0000-00-00',	'0000-00-00',	'0000-00-00',	'',	0,	'0000-00-00',	'',	'M',	0,	'',	'2018-05-12'),
(71,	0,	'Upper',	'Indigenous',	'DD',	8,	'2018-05-29',	'2018-05-31',	1,	7,	3,	'MATERIAL NAME TESTING',	'',	'HM',	0,	'PAIRS1',	'INR',	3004,	'FINAL',	2,	0,	2,	0,	'PERCENTAGE',	0,	'0000-00-00',	'0000-00-00',	'0000-00-00',	'',	0,	'0000-00-00',	'',	'M',	0,	'',	'2018-05-12'),
(72,	0,	'Upper',	'Indigenous',	'DD',	9,	'2018-05-31',	'2018-06-01',	1,	6,	2,	'MATERIAL NAME NEW 1',	'',	'HDD',	0,	'PAIRS1',	'INR',	2000,	'FINAL',	2,	0,	2,	0,	'PERCENTAGE',	0,	'0000-00-00',	'0000-00-00',	'0000-00-00',	'',	0,	'0000-00-00',	'',	'M',	0,	'',	'2018-05-12'),
(73,	0,	'Upper',	'Indigenous',	'DD',	10,	'2018-05-24',	'2018-05-30',	1,	7,	3,	'MATERIAL NAME TESTING',	'',	'HM',	0,	'PAIRS1',	'INR',	3004,	'FINAL',	2,	0,	2,	0,	'PERCENTAGE',	0,	'0000-00-00',	'0000-00-00',	'0000-00-00',	'',	0,	'0000-00-00',	'',	'M',	0,	'',	'2018-05-12'),
(74,	0,	'Upper',	'Indigenous',	'DD',	10,	'2018-05-25',	'2018-05-30',	1,	6,	2,	'MATERIAL NAME NEW 1',	'',	'HDD',	0,	'PAIRS1',	'INR',	2000,	'FINAL',	2,	0,	2,	0,	'PERCENTAGE',	0,	'0000-00-00',	'0000-00-00',	'0000-00-00',	'',	0,	'0000-00-00',	'',	'M',	0,	'',	'2018-05-12'),
(75,	0,	'Upper',	'Indigenous',	'SS',	11,	'2018-05-31',	'2018-05-31',	1,	6,	2,	'MATERIAL NAME NEW 1',	'',	'HDD',	0,	'PAIRS1',	'INR',	2000,	'FINAL',	2,	0,	2,	0,	'PERCENTAGE',	0,	'0000-00-00',	'0000-00-00',	'0000-00-00',	'',	0,	'0000-00-00',	'',	'M',	0,	'',	'2018-05-12'),
(76,	0,	'Upper',	'Import',	'DDD',	1,	'2018-05-23',	'2018-05-31',	1,	6,	2,	'MATERIAL NAME NEW 1',	'',	'HDD',	0,	'PAIRS1',	'INR',	2000,	'FINAL',	2,	0,	2,	0,	'PERCENTAGE',	0,	'0000-00-00',	'0000-00-00',	'0000-00-00',	'',	0,	'0000-00-00',	'',	'M',	0,	'',	'2018-05-12'),
(77,	65,	'UPPER',	'INDIGENOUS',	'FFF',	2,	'2018-05-16',	'2018-05-24',	1,	6,	2,	'MATERIAL NAME NEW 1',	'',	'HDD',	100,	'PAIRS1',	'INR',	2000,	'FINAL',	2,	0,	2,	0,	'PERCENTAGE',	10,	'2018-04-12',	'2018-04-12',	'0000-00-00',	'',	0,	'0000-00-00',	'D',	'B',	0,	'',	'2018-05-12'),
(78,	0,	'Sole',	'Indigenous',	'GG',	1,	'2018-05-24',	'2018-05-31',	1,	6,	2,	'MATERIAL NAME NEW 1',	'',	'HDD',	20,	'PAIRS1',	'INR',	5,	'FINAL',	9,	0,	9,	0,	'PERCENTAGE',	15,	'2018-05-12',	'0000-00-00',	'0000-00-00',	'',	0,	'0000-00-00',	'TEST',	'M',	0,	'',	'2018-05-12'),
(79,	0,	'Sole',	'Indigenous',	'GG',	1,	'2018-05-24',	'2018-05-31',	1,	7,	3,	'MATERIAL NAME TESTING',	'',	'HM',	25,	'PAIRS1',	'INR',	3,	'FINAL',	0,	0,	0,	0,	'PERCENTAGE',	10,	'2018-05-12',	'0000-00-00',	'0000-00-00',	'',	0,	'0000-00-00',	'DC',	'M',	0,	'',	'2018-05-12'),
(80,	78,	'SOLE',	'INDIGENOUS',	'GG',	1,	'2018-05-24',	'2018-05-31',	1,	6,	2,	'MATERIAL NAME NEW 1',	'',	'HDD',	20,	'PAIRS1',	'INR',	5,	'FINAL',	9,	0,	9,	0,	'PERCENTAGE',	15,	'2018-04-12',	'2018-04-12',	'2018-04-12',	'FS/3',	130,	'2018-05-17',	'TEST',	'B',	0,	'TEST',	'2018-05-12'),
(81,	79,	'SOLE',	'INDIGENOUS',	'GG',	1,	'2018-05-24',	'2018-05-31',	1,	7,	3,	'MATERIAL NAME TESTING',	'',	'HM',	25,	'PAIRS1',	'INR',	3,	'FINAL',	0,	0,	0,	0,	'PERCENTAGE',	10,	'2018-04-12',	'2018-04-12',	'2018-04-12',	'FS/3',	130,	'2018-05-17',	'DC',	'B',	0,	'TEST',	'2018-05-12'),
(82,	0,	'Upper',	'Indigenous',	'GG',	12,	'2019-05-14',	'2018-05-21',	1,	6,	2,	'MATERIAL NAME NEW 1',	'',	'HDD',	0,	'PAIRS1',	'INR',	2000,	'FINAL',	2,	0,	2,	0,	'PERCENTAGE',	0,	'0000-00-00',	'0000-00-00',	'0000-00-00',	'',	0,	'0000-00-00',	'',	'M',	0,	'',	'2018-05-12'),
(83,	0,	'Upper',	'Indigenous',	'GG',	12,	'2018-05-24',	'2018-05-17',	1,	6,	2,	'MATERIAL NAME NEW 1',	'',	'HDD',	0,	'PAIRS1',	'INR',	2000,	'FINAL',	2,	0,	2,	0,	'PERCENTAGE',	0,	'0000-00-00',	'0000-00-00',	'0000-00-00',	'',	0,	'0000-00-00',	'',	'M',	0,	'',	'2018-05-12');

DROP TABLE IF EXISTS `po_other_additional_charges`;
CREATE TABLE `po_other_additional_charges` (
  `po_other_additional_id` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `po_number` int(11) NOT NULL,
  `po_date` date NOT NULL,
  `name` varchar(100) NOT NULL,
  `hsn_code` varchar(100) NOT NULL,
  `amount_type` enum('PERCENTAGE','AMOUNT') NOT NULL DEFAULT 'PERCENTAGE',
  `amount` float NOT NULL,
  `CGST` float NOT NULL,
  `SGST` float NOT NULL,
  `IGST` float NOT NULL,
  `created_date` date NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`po_other_additional_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `po_other_additional_charges` (`po_other_additional_id`, `unit`, `type`, `po_number`, `po_date`, `name`, `hsn_code`, `amount_type`, `amount`, `CGST`, `SGST`, `IGST`, `created_date`, `status`) VALUES
(1,	'Upper',	'Import',	1,	'2018-09-22',	'FREIGHT',	'HSN',	'AMOUNT',	3,	3,	3,	0,	'2018-03-12',	'Y'),
(4,	'Full Shoe',	'Sample_Indigenous',	1,	'2018-03-21',	'test',	'TEST',	'PERCENTAGE',	12,	12,	12,	0,	'2018-03-15',	'Y'),
(5,	'Upper',	'Import',	1,	'2018-03-14',	'INSURANCE',	'HDN',	'PERCENTAGE',	2,	0,	0,	0,	'2018-03-18',	'Y'),
(6,	'Upper',	'Import',	1,	'2018-03-14',	'Test',	'HSN',	'AMOUNT',	122,	0,	0,	0,	'2018-03-18',	'Y'),
(8,	'Full Shoe',	'Sample_Indigenous',	1,	'2018-03-21',	'FREIGHT',	'CODE',	'PERCENTAGE',	2,	2,	2,	0,	'2018-03-18',	'Y'),
(9,	'FULL SHOE',	'SAMPLE_INDIGENOUS',	1,	'2018-03-21',	'INSURANCE',	'NUM',	'AMOUNT',	12555,	12,	12,	0,	'2018-03-26',	'Y'),
(10,	'FULL SHOE',	'SAMPLE_INDIGENOUS',	1,	'2018-03-21',	'PACKING CHARGES',	'HT',	'AMOUNT',	12,	3,	3,	0,	'2018-03-26',	'Y'),
(11,	'UPPER',	'INDIGENOUS',	2,	'2018-04-19',	'INSURANCE',	'DDD',	'PERCENTAGE',	12,	9,	9,	0,	'2018-04-15',	'Y'),
(12,	'UPPER',	'INDIGENOUS',	3,	'2018-05-04',	'FREIGHT',	'FF',	'PERCENTAGE',	3,	2,	2,	0,	'2018-04-30',	'Y');

DROP TABLE IF EXISTS `selection_details`;
CREATE TABLE `selection_details` (
  `selection_id` int(11) NOT NULL AUTO_INCREMENT,
  `selection_name` varchar(50) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`selection_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `selection_details` (`selection_id`, `selection_name`, `status`) VALUES
(1,	'S',	'Y'),
(2,	'Y',	'Y'),
(3,	'M',	'Y'),
(4,	'HALF',	'Y'),
(5,	'BITS',	'Y'),
(6,	'-',	'Y'),
(7,	'T',	'Y'),
(8,	'TR',	'Y'),
(9,	'L',	'Y'),
(10,	'B&L',	'Y'),
(11,	'D',	'Y');

DROP TABLE IF EXISTS `sub_menu_details`;
CREATE TABLE `sub_menu_details` (
  `sub_menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_menu_name` varchar(100) NOT NULL,
  `sub_menu_link` varchar(100) NOT NULL DEFAULT '#',
  `sub_menu_icon` varchar(100) NOT NULL,
  `sub_menu_status` varchar(3) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`sub_menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `sub_menu_details` (`sub_menu_id`, `sub_menu_name`, `sub_menu_link`, `sub_menu_icon`, `sub_menu_status`) VALUES
(1,	'Master Entry',	'master-entry',	'',	'Y'),
(2,	'Data Entry',	'data-entry',	'',	'Y'),
(3,	'Report',	'report',	'',	'Y'),
(4,	'Master Entry',	'po_master_entry',	'',	'Y'),
(5,	'Generate Po',	'generate_po',	'',	'Y'),
(6,	'Material and Bill Outstanding',	'material_outstanding',	'',	'Y'),
(7,	'Payment Book',	'payment_book',	'',	'Y'),
(8,	'Payment Statement',	'payment_statement',	'',	'Y'),
(9,	'Covering Letter',	'covering_letter',	'',	'Y');

DROP TABLE IF EXISTS `supplier_details`;
CREATE TABLE `supplier_details` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(100) NOT NULL,
  `supplier_code` varchar(50) NOT NULL,
  `alt_supplier_name` varchar(100) NOT NULL,
  `supplier_address` text NOT NULL,
  `alt_supplier_address` text NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `email_id` varchar(150) NOT NULL,
  `origin` varchar(100) NOT NULL,
  `gst_no` varchar(100) NOT NULL,
  `state_code` varchar(5) NOT NULL,
  `supplier_tax_status` varchar(30) NOT NULL,
  `supplier_status` varchar(30) NOT NULL,
  `bank_details` text NOT NULL,
  `alternative_origin` varchar(100) NOT NULL,
  `payment_to` varchar(100) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`supplier_id`),
  UNIQUE KEY `supplier_name` (`supplier_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `supplier_details` (`supplier_id`, `supplier_name`, `supplier_code`, `alt_supplier_name`, `supplier_address`, `alt_supplier_address`, `contact_no`, `email_id`, `origin`, `gst_no`, `state_code`, `supplier_tax_status`, `supplier_status`, `bank_details`, `alternative_origin`, `payment_to`, `payment_type`, `status`) VALUES
(1,	'TEST SUPPLIER',	'SUP1',	'',	'TES',	'TES',	'7845351015',	'',	'TEST',	'33JDJSKDAK34KS',	'33',	'TAX',	'REGISTERED',	'23,BANK STREET,\nPANAPAKKAM',	'',	'TEST',	'CHEQUE',	'Y'),
(2,	'TEST SUPPLIER - NEW',	'SUP2',	'',	'TEST',	'',	'7843889238',	'',	'TEST',	'DGHD2390239',	'22',	'TAX',	'UNREGISTERED',	'TEST',	'',	'TESWT',	'CHEQUE',	'Y'),
(3,	'TEST SUPPLIER  INDIA',	'SUP3',	'',	'TEST',	'',	'TEST',	'TET@GM.COM',	'RANIPET',	'ASDASDASDS212',	'33',	'TAX',	'REGISTERED',	'',	'',	'',	'',	'Y');

DROP TABLE IF EXISTS `uof_master`;
CREATE TABLE `uof_master` (
  `uof_id` int(11) NOT NULL AUTO_INCREMENT,
  `uof_name` varchar(30) NOT NULL,
  `uof_status` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`uof_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `uof_master` (`uof_id`, `uof_name`, `uof_status`) VALUES
(1,	'PAIRS1',	'Y'),
(2,	'TEST',	'Y');

DROP TABLE IF EXISTS `user_group_details`;
CREATE TABLE `user_group_details` (
  `user_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_name` varchar(10) NOT NULL,
  `user_group_status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`user_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user_group_details` (`user_group_id`, `user_group_name`, `user_group_status`) VALUES
(1,	'admin',	'Y');

DROP TABLE IF EXISTS `user_login_details`;
CREATE TABLE `user_login_details` (
  `user_login_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_id` int(11) NOT NULL,
  `user_login_name` varchar(50) NOT NULL,
  `user_login_password` varchar(200) NOT NULL,
  `user_status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`user_login_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user_login_details` (`user_login_id`, `user_group_id`, `user_login_name`, `user_login_password`, `user_status`) VALUES
(1,	1,	'admin',	'e6e061838856bf47e1de730719fb2609',	'Y');

-- 2018-05-13 11:02:37
