<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

require_once( APPPATH.'/third_party/smarty/libs/Smarty.class.php' );

class Service extends CI_Controller {

	public function __construct()
    {
    	// $smarty  = new Smarty;
    	// print_r($smarty);exit();
        parent::__construct();
    }

	public function index()
	{
		$controller_name = $this->input->post('controller_name');
		$method_name     = $this->input->post('method_name');
		$method_name     = empty($method_name)?"index":$method_name;
		$file_name       = APPPATH."controllers/".$controller_name.".php";
		if(!file_exists($file_name))
		{
			$this->response->callErrorResponse('Controller Not exists');
		}
		else
		{
			$session_validation_non = array('Login');
			if(!in_array($controller_name,$session_validation_non))
			{
				$session_id = $this->input->post('session_id');
				if(empty($session_id))
				{
					$this->response->callErrorResponse('Invalid User');
				}
				else
				{
					session_id($session_id);
					session_start();
					if(empty($_SESSION))
					{
						$this->response->callErrorResponse('Invalid User');
					}
				}
			}

			require_once APPPATH."controllers/".$controller_name.".php";
			$classObject       = new $controller_name;
			$classObject->data = empty($this->input->post('data'))?array():json_decode($this->input->post('data'),1);
			$data              = $classObject->$method_name();
			$this->response->callSuccessResponse($data);
		}
	}
}
