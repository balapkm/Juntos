<?php

class PoGenerateQuery extends CI_Model 
{

    function __construct()
    {
        parent::__construct();
    }

    public function getPONumberHighest($unit,$type)
    {
        $sql = "SELECT 
                    MAX(po_number) AS po_number 
                FROM 
                    po_generated_request_details 
                WHERE 
                    YEAR(po_date) = ".date('Y')." AND 
                    unit = '".$unit."' AND 
                    type = '".$type."'";

        $data  = $this->db->query($sql)->result_array();
        if(empty($data[0]['po_number']))
        {
            return 1;
        }
        else
        {
            return ($data[0]['po_number']+1);
        }
    }

    public function getUniquePoNumber()
    {
        $sql = "SELECT 
                    unit,type,po_number
                FROM
                    po_generated_request_details
                GROUP BY po_number,unit,type";

        $data  = $this->db->query($sql)->result_array();
        return $data;
    }

    public function getSupplierNameDetails(){
         $sql = "SELECT 
                    sd.supplier_name,
                    prd.supplier_id
                FROM
                    po_generated_request_details prd,
                    supplier_details sd
                WHERE
                    prd.supplier_id = sd.supplier_id
                    group by prd.supplier_id";

        $data  = $this->db->query($sql)->result_array();
        return $data;
    }

    public function getMaterialNameDetails(){
         $sql = "SELECT 
                    md.material_name,
                    prd.material_id
                FROM
                    po_generated_request_details prd,
                    material_details md
                WHERE
                    prd.material_id = md.material_id
                    group by prd.material_id";

        $data  = $this->db->query($sql)->result_array();
        return $data;
    }

    public function getPoDataAsPerPONumber($data){

        $sql = "SELECT 
                    *
                FROM
                    po_generated_request_details prd,
                    supplier_details sd
                WHERE
                    prd.supplier_id = sd.supplier_id AND
                    unit = '".$data['unit']."' AND
                    type = '".$data['type']."' AND
                    po_number = '".$data['po_number']."' AND
                    YEAR(po_date) = '".$data['po_year']."'";

        $data  = $this->db->query($sql)->result_array();
        return $data;
    }

    public function insert_po_generated_request_details($data)
    {
        $result = $this->db->insert_batch('po_generated_request_details',$data);
        return $result;
    }

    public function update_po_generated_request_details($data)
    {
        $id = $data['id'];
        unset($data['id']);
        $result = $this->db->update('po_generated_request_details',$data, array('po_generated_request_id' => $id));
        return $result;
    }

    public function delete_po_generated_request_details($data)
    {
        $result = $this->db->delete('po_generated_request_details',array('po_generated_request_id' => $data['po_generated_request_id']));
        return $result;
    }

    public function getMaterialOutStandingData($data)
    {
        $sql = "SELECT 
                    sd.supplier_name,
                    prd.*
                FROM
                    po_generated_request_details prd,
                    supplier_details sd
                WHERE
                    prd.supplier_id = sd.supplier_id";
                    
        if(!empty($data['unit']))
        {
            $sql .= " AND prd.unit = '".$data['unit']."'";
        }
        if(!empty($data['material_name']))
        {
            $sql .= " AND prd.material_id = ".$data['material_name']."";
        }
        if(!empty($data['supplier_name']))
        {
            $sql .= " AND prd.supplier_id = ".$data['supplier_name']."";
        }
        if(!empty($data['po_number']))
        {
            $sql .= " AND prd.unit = '".$data['po_number'][0]."'";
            $sql .= " AND prd.type = '".$data['po_number'][1]."'";
            $sql .= " AND prd.po_number = '".$data['po_number'][2]."'";
            if(!empty($data['po_year']))
                $sql .= " AND YEAR(prd.po_date) = '".$data['po_year']."'";
        }
        $data  = $this->db->query(trim($sql))->result_array();
        return $data;
    }
}

?>