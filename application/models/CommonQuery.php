<?php

class CommonQuery extends CI_Model 
{

    function __construct()
    {
        parent::__construct();
    }

    public function loginUser($username,$password)
    {
    	$query = $this->db->get_where('user_login_details', 
    									array(
    										'user_login_name'     => $username,
    										'user_login_password' => $password,
                                            'user_status' => 'Y'
    									));
    	$data  = array();
    	foreach ($query->result() as $row)
		{
		     $data[] = $row;
		}
		return $this->objectToArray($data);
    }

    public function checkOldPassword($data)
    {
        $query = $this->db->get_where('user_login_details', 
                                        array(
                                            'user_login_id'     => $_SESSION['user_login_id'],
                                            'user_login_password' => md5($data['field1']),
                                            'user_status' => 'Y'
                                        ));
        $data  = array();
        foreach ($query->result() as $row)
        {
             $data[] = $row;
        }
        $data  = $this->objectToArray($data);
        if(count($data) == 0)
        {
            return false;
        }
        return true;
    }

    public function changePassword($data)
    {
        $update = array(
            "user_login_password" => md5($data['field2'])
        );
        return $this->db->update('user_login_details',$update,array('user_login_id'=>$_SESSION['user_login_id']));
    }

    private function objectToArray($data)
    {
    	return json_decode(json_encode($data),1);
    }

    public function component_details()
    {
    	$user_group_id = $_SESSION['user_group_id'];
    	$query = $this->db->get_where('component_details', 
    									array(
    										'user_group_id' => $user_group_id,
    										'status' => 'Y'
    									));
    	$data  = array();
    	foreach ($query->result() as $row)
		{
		     $data[] = $row;
		}
		return $this->objectToArray($data);
    }

    public function menu_details()
    {
        session_start();
    	$user_group_id = $_SESSION['user_group_id'];
    	$this->db->select('md.menu_name,md.menu_active,md.menu_link,md.menu_icon,smd.sub_menu_name,smd.sub_menu_link,smd.sub_menu_icon');
		$this->db->from('menu_sub_menu_mapping_details msmmd');
		$this->db->join('sub_menu_details smd', 'smd.sub_menu_id = msmmd.sub_menu_id',"left");
		$this->db->join('menu_details md', 'msmmd.menu_id = md.menu_id',"left");
		$this->db->where('msmmd.user_group_id',$user_group_id);
		$this->db->where('md.menu_status',"Y");

		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			$data = $query->result();

			$menu_details = array();
			foreach ($data as $key => $value) {
				$menu_details[$value->menu_name]["menu_name"] = $value->menu_name;
				$menu_details[$value->menu_name]["menu_link"] = $value->menu_link;
				$menu_details[$value->menu_name]["menu_icon"] = $value->menu_icon;
				$menu_details[$value->menu_name]["menu_active"]=$value->menu_active;
				if($value->sub_menu_name != ""){
					$menu_details[$value->menu_name]["sub_menu_details"][] =  array(
																					"sub_menu_name" => $value->sub_menu_name,
																					"sub_menu_link" => $value->sub_menu_link,
																					"sub_menu_icon" => $value->sub_menu_icon,

																				);
				}
			}
			return $menu_details;
		}
    }
}

?>