<?php

class PoMasterEntryQuery extends CI_Model 
{

    function __construct()
    {
        parent::__construct();
    }

    public function insert_supplier_entry($data,$tableName)
    {
        $result = $this->db->insert($tableName,$data);
        return $result;
    }

    public function update_supplier_entry($data)
    {
        $id = $data['supplier_id'];
        unset($data['supplier_id']);
        $result = $this->db->update('supplier_details',$data, array('supplier_id' => $id));
        return $result;
    }

    public function update_material_entry($data)
    {
        $id = $data['material_id'];
        $unsetArray = array('material_id','supplier_id','state_code','supplier_name');
        foreach ($unsetArray as $key => $value) {
            unset($data[$value]);
        }
       
        $result = $this->db->update('material_details',$data, array('material_id' => $id));
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

    public function select_material_entry($data=array(),$type='getAllData')
    {
        if($type == 'getAllData')
        {
            $this->db->select('md.*,sd.state_code,sd.supplier_id,sd.supplier_name');
        }
        
        if($type == 'getPOMaterialDetails')
        {
            $this->db->select('md.*');
        }
        
        $this->db->from('supplier_details sd');
        $this->db->join('material_details md', 'sd.supplier_id = md.supplier_id');
        $this->db->where('md.status',"Y");

        if($type == 'getPOMaterialDetails')
        {
            $this->db->where('md.supplier_id',$data['supplier_id']);
        }

        $query = $this->db->get();
        $data  = array();
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                 $data[] = $row;
            }
        }
        return $this->objectToArray($data);
    }

    public function delete_supplier_entry($data)
    {
        $result = $this->db->delete('supplier_details',array('supplier_id' => $data['supplier_id']));
        return $result;
    }

    public function delete_material_entry($data)
    {
        $result = $this->db->delete('material_details',array('material_id' => $data['material_id']));
        return $result;
    }
}

?>