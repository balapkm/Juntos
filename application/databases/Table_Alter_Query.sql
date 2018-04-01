ALTER TABLE `po_generated_request_details`
ADD `po_description` varchar(300) COLLATE 'latin1_swedish_ci' NOT NULL AFTER `material_name`;

ALTER TABLE `material_details`
ADD `material_master_id` int(11) NOT NULL AFTER `supplier_id`;

ALTER TABLE `po_generated_request_details`
ADD `material_master_id` int(11) NOT NULL AFTER `material_id`;