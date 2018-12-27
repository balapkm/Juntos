-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `advance_payment_details`;
CREATE TABLE `advance_payment_details` (
  `advance_payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL,
  `division` varchar(30) NOT NULL,
  `po_number` varchar(500) NOT NULL,
  `po_date` varchar(500) NOT NULL,
  `po_year` varchar(250) NOT NULL,
  `po_full_number` varchar(5000) NOT NULL,
  `supplier_pi_number` varchar(100) NOT NULL,
  `pi_date` date NOT NULL,
  `pi_amount` double NOT NULL,
  `query` varchar(500) NOT NULL,
  `cheque_no` varchar(200) NOT NULL,
  `cheque_date` date NOT NULL,
  `cheque_amount` double NOT NULL,
  `payable_month` date NOT NULL,
  `used_status` enum('PENDING','CLOSED') NOT NULL DEFAULT 'PENDING',
  PRIMARY KEY (`advance_payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2018-12-25 14:54:25
