<?php
$config['leather_details'] = array(
    'leather' => array('Upper','Lining'),
    'query'   => array('Sample','LOT','Return')
);
$config['material_details'] = array(
    'UOM' => array('PAIRS','ODD','NOS','LTRS','SQMTS','MTR','KGS','SETS','ROLLS','CONES','BOXES','PACKET','PCS','YARD','SQFT')
);
$config['po_generate_details'] = array(
	'po_number_details' => array(
							'Upper'     =>  array(
					    						'Import' => array("format" => "SU/IMP/"),
						    					'Indigenous' => array("format" => "SU/"),
						    					'Sample_Import' => array("format" => "SU/SMPL/IMP/"),
						    					'Sample_Indigenous' => array("format" => "SU/SMPL/")
						    				), 
						    'Full Shoe' =>  array(
						    					'Import' => array("format" => "FS/IMP/"),
						    					'Indigenous' => array("format" => "FS/"),
						    					'Sample_Import' => array("format" => "FS/SMPL/IMP/"),
						    					'Sample_Indigenous' => array("format" => "FS/SMPL/")
						    				), 
						    'Sole'      =>  array(
						    					'Import' => array("format" => "SP/IMP/"),
						    					'Indigenous' => array("format" => "SP/"),
						    					'Sample_Import' => array("format" => "SP/SMPL/IMP/"),
						    					'Sample_Indigenous' => array("format" => "SP/SMPL/")
						    				),
						    'UPPER'     =>  array(
					    						'IMPORT' => array("format" => "SU/IMP/"),
						    					'INDIGENOUS' => array("format" => "SU/"),
						    					'SAMPLE_IMPORT' => array("format" => "SU/SMPL/IMP/"),
						    					'SAMPLE_INDIGENOUS' => array("format" => "SU/SMPL/")
						    				), 
						    'FULL SHOE' =>  array(
						    					'IMPORT' => array("format" => "FS/IMP/"),
						    					'INDIGENOUS' => array("format" => "FS/"),
						    					'SAMPLE_IMPORT' => array("format" => "FS/SMPL/IMP/"),
						    					'SAMPLE_INDIGENOUS' => array("format" => "FS/SMPL/")
						    				), 
						    'SOLE'      =>  array(
						    					'IMPORT' => array("format" => "SP/IMP/"),
						    					'INDIGENOUS' => array("format" => "SP/"),
						    					'SAMPLE_IMPORT' => array("format" => "SP/SMPL/IMP/"),
						    					'SAMPLE_INDIGENOUS' => array("format" => "SP/SMPL/")
						    				)
	)
);
?>