-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `article_details`;
CREATE TABLE `article_details` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_name` varchar(50) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`article_id`),
  UNIQUE KEY `article_name` (`article_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `color_details`;
CREATE TABLE `color_details` (
  `color_id` int(11) NOT NULL AUTO_INCREMENT,
  `color_name` varchar(50) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`color_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


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
(1,	1,	'MasterEntry',	'div1',	'../master/master.component',	'master-entry',	'Y'),
(2,	1,	'DataEntry',	'div1',	'',	'data-entry',	'Y'),
(3,	1,	'Report',	'div1',	'',	'report',	'Y');

DROP TABLE IF EXISTS `data_entry`;
CREATE TABLE `data_entry` (
  `data_entry_id` int(11) NOT NULL AUTO_INCREMENT,
  `serial_no` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `selection_id` int(11) NOT NULL,
  `description_id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `leather` varchar(50) NOT NULL,
  `query` varchar(50) NOT NULL,
  `pieces` int(11) NOT NULL,
  `sqfeet` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`data_entry_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `description_details`;
CREATE TABLE `description_details` (
  `description_id` int(11) NOT NULL AUTO_INCREMENT,
  `description_name` varchar(50) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`description_id`),
  UNIQUE KEY `description_name` (`description_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


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
(1,	'Leather Details',	'#',	'',	'active',	'Y');

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
(3,	1,	1,	3);

DROP TABLE IF EXISTS `selection_details`;
CREATE TABLE `selection_details` (
  `selection_id` int(11) NOT NULL AUTO_INCREMENT,
  `selection_name` varchar(50) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`selection_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


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
(3,	'Report',	'report',	'',	'Y');

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
(1,	1,	'adminTest',	'ceb6c970658f31504a901b89dcd3e461',	'Y');

-- 2017-12-22 05:21:26
