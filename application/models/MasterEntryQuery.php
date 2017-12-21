<?php

class MasterEntryQuery extends CI_Model 
{

    function __construct()
    {
        parent::__construct();
    }

    public function select_master_entry($table_name)
    {
    	$query = $this->db->get_where($table_name, 
    									array(
    										'status'     => 'Y'
    									));
    	$data  = array();
    	foreach ($query->result() as $row)
		{
		     $data[] = $row;
		}
		return $this->objectToArray($data);
    }

    private function objectToArray($data)
    {
    	return json_decode(json_encode($data),1);
    }

    public function insert_master_entry($data)
    {
        $query = $this->db->get_where($data['table_name'], 
                                        array(
                                            $data['column_name'] => $data['field1']
                                        ));
        $result  = array();
        foreach ($query->result() as $row)
        {
             $result[] = $row;
        }

        if(count($result) != 0)
        {
            return false;
        }

        $insert_data = array(
            $data['column_name']=> $data['field1'],
            'status'            => 'Y'
        );

        $result = $this->db->insert($data['table_name'],$insert_data);
        return $result;
    }

    public function update_master_entry($data)
    {

        $query = $this->db->get_where($data['table_name'], 
                                        array(
                                            $data['column_name'] => $data['field1']
                                        ));
        $result  = array();
        foreach ($query->result() as $row)
        {
             $result[] = $row;
        }

        if(count($result) != 0)
        {
            return false;
        }

        $update_data = array(
            $data['column_name']=> $data['field1'],
        );

        $result = $this->db->update($data['table_name'], $update_data, array($data['column_id'] => $data['field2']));
        return $result;
    }

    public function delete_master_entry($data)
    {
        $result = $this->db->delete($data['table_name'],array($data['column_id'] => $data['field1']));
        return $result;
    }
}

?>