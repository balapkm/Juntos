<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
	public $data;

	function __construct()
	{
		parent::__construct();
		$this->load->library('Mysmarty');
		$this->load->model('commonQuery');
		$this->load->helper('url');
	}

	public function index()
	{
		$this->getInitDetails();
		$this->mysmarty->view('dashboard.tpl',$this->data);
	}

	public function getInitDetails()
	{
		$this->data['menu']    = $this->commonQuery->menu_details();
		$this->data['jsPaths'] = $this->jsPaths();
	}

	public function getComponentDetails()
	{
		return $this->commonQuery->component_details();
	}

	public function changePassword()
	{
		$checkOldPassword = $this->commonQuery->checkOldPassword($this->data);
		if(!$checkOldPassword)
		{
			return false;
		}
		else
		{
			return $this->commonQuery->changePassword($this->data);
		}
	}

	public function listFolderFiles($dir)
	{
	    $fileInfo     = scandir($dir);
	    $allFileLists = [];

	    foreach ($fileInfo as $folder) {
	        if ($folder !== '.' && $folder !== '..') {
	            if (is_dir($dir . DIRECTORY_SEPARATOR . $folder) === true) {
	                $allFileLists[$folder] = $this->listFolderFiles($dir . DIRECTORY_SEPARATOR . $folder);
	            } else {
	                $allFileLists[$folder] = $folder;
	            }
	        }
	    }
	    return $allFileLists;
	}

	public function jsPaths()
	{
		$dir_name = "assets/js/angular";
		$dir      = $this->listFolderFiles($dir_name);
		foreach ($dir as $key => $value) 
		{
			if (is_array($dir[$key])) 
			{
				foreach ($value as $k => $v) 
				{
					$final_dir[] = $dir_name."/".$key."/".$v;
				}
			}
			else
			{
				$final_dir[] = $dir_name."/".$value;
			}
		}
		return $final_dir;
	}
}
