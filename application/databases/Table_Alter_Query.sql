ALTER TABLE `po_generated_request_details`
ADD `avg_cost` varchar(50) COLLATE 'latin1_swedish_ci' NOT NULL AFTER `dc_number`,
ADD `deduction` varchar(100) COLLATE 'latin1_swedish_ci' NOT NULL AFTER `avg_cost`,
ADD `cheque_no` varchar(100) COLLATE 'latin1_swedish_ci' NOT NULL AFTER `deduction`,
ADD `cheque_date` date NOT NULL AFTER `cheque_no`,
ADD `cheque_amount` float NOT NULL AFTER `cheque_date`;

ALTER TABLE `material_details`
DROP INDEX `material_name`;

ALTER TABLE `supplier_details`
DROP INDEX `supplier_code`;