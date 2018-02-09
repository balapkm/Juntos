<?php

class PoMasterEntryQuery extends CI_Model 
{

    function __construct()
    {
        parent::__construct();
    }

    public function insert_supplier_entry($data)
    {
        $result = $this->db->insert('supplier_details',$data);
        return $result;
    }

    public function update_supplier_entry($data)
    {
        $id = $data['supplier_id'];
        unset($data['supplier_id']);
        $result = $this->db->update('supplier_details',$data, array('supplier_id' => $id));
        return $result;
    }

    private function objectToArray($data)
    {
        return json_decode(json_encode($data),1);
    }

    public function select_supplier_entry()
    {
        $query = $this->db->get_where('supplier_details', 
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

    public function delete_supplier_entry($data)
    {
        $result = $this->db->delete('supplier_details',array('supplier_id' => $data['supplier_id']));
        return $result;
    }
}

?>