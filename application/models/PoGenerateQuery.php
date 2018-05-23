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
                    DATE(po_date) BETWEEN '".date('Y')."-04-01' AND '".(date('Y')+1)."-03-31' AND
                    unit = '".$unit."' AND 
                    outstanding_type = 'M' AND 
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

    public function getUniquePoNumber($year="")
    {
        $sql = "SELECT 
                    unit,type,po_number
                FROM
                    po_generated_request_details
                WHERE 
                    outstanding_type = 'M'";

        if(!empty($year))
        {
            $sql .= " AND YEAR(po_date) = ".$year;
        }

        $sql .= " GROUP BY po_number,unit,type 
                ORDER BY unit,type,po_number";
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
                    
         $sql = "SELECT 
                    sd.supplier_name,
                    sd.supplier_id
                FROM
                    supplier_details sd";

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

         $sql = "SELECT 
                    md.material_name,
                    md.material_id
                FROM
                    material_details md
                GROUP BY
                    md.material_name
                ";

        $data  = $this->db->query($sql)->result_array();
        return $data;
    }

    public function getPoDataAsPerPONumber($data){

        $sql = "SELECT 
                    prd.*,
                    sd.*,
                    mm.material_name as material_master_name 
                FROM
                    po_generated_request_details prd,
                    supplier_details sd,
                    material_master mm
                WHERE
                    prd.supplier_id = sd.supplier_id AND
                    outstanding_type = 'M' AND
                    mm.material_id   = prd.material_master_id AND
                    unit = '".$data['unit']."' AND
                    type = '".$data['type']."' AND
                    po_number = '".$data['po_number']."' AND
                    YEAR(po_date) = '".$data['po_year']."'";

        $data  = $this->db->query($sql)->result_array();
        return $data;
    }

    public function getOtherChargeUsingPoNumber($data){

        $sql = "SELECT 
                    *
                FROM
                    po_other_additional_charges poac
                WHERE
                    unit = '".$data['unit']."' AND
                    type = '".$data['type']."' AND
                    po_number = '".$data['po_number']."' AND
                    YEAR(po_date) = '".$data['po_year']."'";

        $data  = $this->db->query($sql)->result_array();
        return $data;
    }

    public function getImportChargeUsingPoNumber($data)
    {
        $sql = "SELECT 
                    *
                FROM
                    import_other_details iod
                WHERE
                    unit = '".$data['unit']."' AND
                    type = '".$data['type']."' AND
                    po_number = '".$data['po_number']."' AND
                    YEAR(po_date) = '".$data['po_year']."'";

        $data  = $this->db->query($sql)->result_array();
        return $data;
    }

    public function getOverAllDiscountDetails($data)
    {
        $sql = "SELECT 
                    *
                FROM
                    overall_discount_details odd
                WHERE
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

    public function edit_import_other_details($data)
    {
        $id                     = $data['id'];
        $data['payment_terms']  = $data['payment_status'];
        unset($data['id']);
        unset($data['payment_status']);
        $result = $this->db->update('import_other_details',$data, array('import_other_id' => $id));
        return $result;
    }

    public function insert_import_other_details($data)
    {
        $insert = array();
        $insert['unit'] = $data['unit'];
        $insert['type'] = $data['type'];
        $insert['po_number'] = $data['po_number'];
        $insert['po_date'] = $data['po_date'];

        $result = $this->db->insert('import_other_details',$insert);
        return $result;
    }

    public function insert_po_other_additional_charges($data){
        unset($data['state_code']);
        $data['created_date'] = date('Y-m-d');
        $result = $this->db->insert('po_other_additional_charges',$data);
        return $result;
    }

    public function update_po_generated_request_details($data)
    {
        $id = $data['id'];
        unset($data['id']);
        unset($data['material_name']);
        // print_r($data);exit;
        $result = $this->db->update('po_generated_request_details',$data, array('po_generated_request_id' => $id));
        return $result;
    }

    public function delete_po_generated_request_details($data)
    {
        $result = $this->db->delete('po_generated_request_details',array('po_generated_request_id' => $data['po_generated_request_id']));
        return $result;
    }

    public function delete_po_other_additional_charges($data)
    {
        $result = $this->db->delete('po_other_additional_charges',array('po_other_additional_id' => $data['po_other_additional_id']));
        return $result;
    }

    public function getMaterialOutStandingData($data)
    {
        $sql = "SELECT 
                    sd.supplier_name,
                    sd.state_code,
                    prd.*,
                    DATEDIFF('".date('Y-m-d')."',prd.delivery_date) AS delay_day,
                    mm.material_name as material_master_name
                FROM
                    po_generated_request_details prd,
                    supplier_details sd,
                    material_master mm";
        if($data['filter_type_wise'] == 'Material')
        {
            $sql .= ",material_details md";
        }
                    
        $sql .= "
                WHERE
                    prd.supplier_id = sd.supplier_id AND
                    mm.material_id = prd.material_master_id AND
                    outstanding_type = '".$data['outstanding_type']."'";

        if($data['outstanding_type'] == 'M')
        {
            $sql .= " AND (prd.qty - prd.received) > 0";
        }

        if($data['outstanding_type'] == 'B')
        {
            $sql .= " AND (prd.bill_amount) = 0";
            $sql .= " AND (prd.bill_number) = ''";
            $sql .= " AND (prd.bill_date) = '0000-00-00'";
            // $sql .= " AND (prd.invoice_number) = ''";
        }
                    
        if($data['filter_type_wise'] == 'Unit')
        {
            $sql .= " AND prd.unit = '".$data['unit']."'";
        }

        if($data['filter_type_wise'] == 'PO')
        {
            $sql .= " AND prd.unit = '".$data['po_number'][0]."'";
            $sql .= " AND prd.type = '".$data['po_number'][1]."'";
            $sql .= " AND prd.po_number = '".$data['po_number'][2]."'";
            $sql .= " AND YEAR(prd.po_date) = '".$data['po_year']."'";
        }

        if($data['filter_type_wise'] == 'Material')
        {
            // $sql .= " AND material_id IN(".implode(',',$data['material_name']).")";
            $sql .= " AND md.material_id = prd.material_id";
            $sql .= " AND mm.material_name = '".$data['material_name']."'";
        }

        if($data['filter_type_wise'] == 'Supplier')
        {
            // $sql .= " AND material_id IN(".implode(',',$data['material_name']).")";
            $sql .= " AND prd.supplier_id = ".$data['supplier_name'];
        }

        
        $result1  = $this->db->query(trim($sql))->result_array();

        if($data['outstanding_type'] == 'B')
        {
            $sql     .= " GROUP BY prd.unit,prd.type,prd.po_number,prd.po_date";
            $explode  = explode("FROM",$sql);

            $explode[0] .= ",sum(prd.received) as total_received ";
            $sql      = implode("FROM",$explode);
            $result2  = $this->db->query(trim($sql))->result_array();
            
            foreach ($result1 as $key1 => $value1) 
            {
                foreach ($result2 as $key2 => $value2) 
                {
                    if($value1['unit'] == $value2['unit'] && $value1['type'] == $value2['type'] && $value1['po_number'] == $value2['po_number'] && $value1['po_date'] == $value2['po_date'])
                    {
                        $result1[$key1]['total_received'] = $value2['total_received'];
                    }
                }
            }
        }

        return $result1;
    }

    public function getMaterialDetailsAsPerSupplier($supplier_id){

        $sql = "SELECT
                    md.material_id,
                    mm.material_name
                FROM
                    material_details md,
                    material_master  mm
                WHERE
                    mm.material_id = md.material_master_id AND
                    md.supplier_id = ".$supplier_id;

        $data  = $this->db->query($sql)->result_array();
        return $data;
    }

    public function updateReceivedDataWithPrevData($data)
    {
        $sql = "UPDATE 
                    po_generated_request_details 
                SET received = (received - ".$data['received'].") 
                    WHERE 
                po_generated_request_id = ".$data['parent_po_generated_request_id'];

        $data  = $this->db->query($sql);#->result_array();
        return $data;
    }
}

?>