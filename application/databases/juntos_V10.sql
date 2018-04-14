-- Adminer 4.6.2 MySQL dump

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
(1,	1,	'MasterEntry',	'div1',	'',	'master-entry',	'Y'),
(2,	1,	'DataEntry',	'div1',	'',	'data-entry',	'Y'),
(3,	1,	'Report',	'div1',	'',	'report',	'Y'),
(4,	1,	'PoMasterEntry',	'div1',	'',	'po_master_entry',	'Y'),
(5,	1,	'GeneratePo',	'div1',	'',	'generate_po',	'Y'),
(6,	1,	'MaterialOutstanding',	'div1',	'',	'material_outstanding',	'Y'),
(7,	1,	'PaymentBook',	'div1',	'',	'payment_book',	'Y');

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


DROP TABLE IF EXISTS `debit_note_details`;
CREATE TABLE `debit_note_details` (
  `s_no` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL,
  `type` char(1) NOT NULL,
  `debit_note_no` varchar(30) NOT NULL,
  `debit_note_date` date NOT NULL,
  `supplier_creditnote` varchar(30) NOT NULL,
  `supplier_creditnote_date` varchar(30) NOT NULL,
  `query` varchar(30) NOT NULL,
  `payable_month` varchar(30) NOT NULL,
  `amount` float NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`s_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `description_details`;
CREATE TABLE `description_details` (
  `description_id` int(11) NOT NULL AUTO_INCREMENT,
  `description_name` varchar(50) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`description_id`),
  UNIQUE KEY `description_name` (`description_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


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
  PRIMARY KEY (`import_other_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


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


DROP TABLE IF EXISTS `material_master`;
CREATE TABLE `material_master` (
  `material_id` int(11) NOT NULL AUTO_INCREMENT,
  `material_name` varchar(200) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`material_id`),
  UNIQUE KEY `material_name` (`material_name`)
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
(7,	2,	1,	7);

DROP TABLE IF EXISTS `other_master_details`;
CREATE TABLE `other_master_details` (
  `other_master_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('GROUP') NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`other_master_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


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


DROP TABLE IF EXISTS `po_generated_request_details`;
CREATE TABLE `po_generated_request_details` (
  `po_generated_request_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_po_generated_request_id` int(11) NOT NULL,
  `unit` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `order_reference` varchar(30) NOT NULL,
  `po_number` varchar(30) NOT NULL,
  `po_date` date NOT NULL,
  `delivery_date` date NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `material_master_id` int(11) NOT NULL,
  `material_name` varchar(300) NOT NULL,
  `po_description` varchar(300) NOT NULL,
  `material_hsn_code` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  `material_uom` varchar(30) NOT NULL,
  `currency` varchar(30) NOT NULL,
  `price` float NOT NULL,
  `price_status` varchar(30) NOT NULL,
  `CGST` float NOT NULL,
  `IGST` float NOT NULL,
  `SGST` float NOT NULL,
  `discount` float NOT NULL,
  `discount_price_status` enum('PERCENTAGE','AMOUNT') NOT NULL DEFAULT 'PERCENTAGE',
  `received` int(11) NOT NULL,
  `received_date` date NOT NULL,
  `dc_date` date NOT NULL,
  `bill_date` date NOT NULL,
  `bill_number` varchar(50) NOT NULL,
  `bill_amount` float NOT NULL,
  `payable_month` date NOT NULL,
  `dc_number` varchar(30) NOT NULL,
  `avg_cost` varchar(50) NOT NULL,
  `deduction` varchar(100) NOT NULL,
  `cheque_no` varchar(100) NOT NULL,
  `cheque_date` date NOT NULL,
  `cheque_amount` float NOT NULL,
  `outstanding_type` enum('M','B') NOT NULL DEFAULT 'M',
  `created_date` date NOT NULL,
  `s_no` int(11) NOT NULL,
  `query` varchar(50) NOT NULL,
  PRIMARY KEY (`po_generated_request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


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
(3,	'Report',	'report',	'',	'Y'),
(4,	'Master Entry',	'po_master_entry',	'',	'Y'),
(5,	'Generate Po',	'generate_po',	'',	'Y'),
(6,	'Material and Bill Outstanding',	'material_outstanding',	'',	'Y'),
(7,	'Payment Book',	'payment_book',	'',	'Y');

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
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`supplier_id`),
  UNIQUE KEY `supplier_name` (`supplier_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


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

-- 2018-04-14 15:04:01
