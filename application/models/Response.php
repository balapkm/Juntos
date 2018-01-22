<?php

class Response extends CI_Model 
{

    function __construct()
    {
        parent::__construct();
    }

    public function callSuccessResponse($data)
    {
    	$array = array(
    				"status_code" => 0,
    				"data" => $data
    			 );
    	$this->displayResponse($array);
    }

    public function callErrorResponse($message)
    {
    	$array = array(
    				"status_code" => 1,
    				"data" => $message
    			 );
    	$this->displayResponse($array);
    }

    private function displayResponse($array)
    {
    	print_r(base64_encode(gzencode(json_encode($array))));
    	exit();
    }
}

?>