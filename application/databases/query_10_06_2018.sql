ALTER TABLE `po_generated_request_details`
CHANGE `bill_amount` `bill_amount` double NOT NULL AFTER `bill_number`;

ALTER TABLE `po_generated_request_details`
CHANGE `s_no` `s_no` varchar(30) NOT NULL AFTER `outstanding_type`;
