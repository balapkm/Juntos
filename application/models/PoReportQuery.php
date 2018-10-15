<?php

class PoReportQuery extends CI_Model 
{

    function __construct()
    {
        parent::__construct();
    }

    public function fetch_po_report_1($data)
    {
        $sql = "SELECT 
                    unit,
                    type,
                    po_number,
                    po_date,
                    sd.supplier_name,
                    origin,
                    order_reference,
                    material_name,
                    po_description,
                    material_hsn_code,
                    qty,
                    material_uom,
                    price,
                    currency,
                    discount,
                    CGST,
                    SGST,
                    IGST,
                    delivery_date
                FROM
                    po_generated_request_details prd,
                    supplier_details sd
                WHERE
                    prd.supplier_id = sd.supplier_id AND ";

        if(!empty($data['division'])){
            $sql .= "unit = '".$data['division']."' AND ";
        }

        if(!empty($data['type'])){
            $sql .= "type = '".$data['type']."' AND ";
        }

        if(!empty($data['date_range'][0]) && !empty($data['date_range'][1])){
            $sql .= "po_date BETWEEN '".$data['date_range'][0]."' AND '".$data['date_range'][1]."' AND ";
        }

        if(!empty($data['material_id'])){
            $sql .= "material_master_id = ".$data['material_id']." AND ";
        }

        if(!empty($data['supplier_id'])){
            $sql .= "prd.supplier_id = ".$data['supplier_id']." AND ";
        }

        if(!empty($data['order_ref'])){
            $sql .= "prd.order_reference = '".$data['order_ref']."' AND ";
        }

        if(isset($data['tax_perc']) && !empty($data["tax_type"])){
            $sql .= $data["tax_type"]." = ".$data["tax_perc"]." AND ";
        }
                    
        $sql .= "outstanding_type = 'M'"; 
        $result  = $this->db->query($sql)->result_array();
        return $result;
    }

    public function fetch_po_report_2($data)
    {
        $sql = "SELECT 
                    sd.supplier_name,
                    supplier_address,
                    contact_no,
                    origin,
                    gst_no,
                    state_code,
                    supplier_tax_status,
                    supplier_status,
                    sd.payment_to,
                    sd.payment_type
                FROM
                    supplier_details sd,
                    material_details md
                WHERE
                    md.supplier_id = sd.supplier_id AND ";
        if(!empty($data['material_id'])){
            $sql .= "material_master_id = ".$data['material_id']."";
        }
        $result  = $this->db->query($sql)->result_array();
        return $result;
    }

    public function fetch_po_report_3($data)
    {
        $sql = "SELECT 
                    material_name,
                    material_hsn_code,
                    md.group,
                    material_uom,
                    price,
                    discount,
                    SGST,
                    CGST,
                    IGST,
                    currency,
                    price_status,
                    discount_price_status
                FROM
                    material_details md
                WHERE ";
        if(!empty($data['supplier_id'])){
            $sql .= "supplier_id = ".$data['supplier_id']."";
        }
        $result  = $this->db->query($sql)->result_array();
        return $result;
    }

    public function fetch_po_report_4($data)
    {
        $sql = "SELECT 
                    unit,
                    type,
                    po_number,
                    po_date,
                    sd.supplier_name,
                    origin,
                    material_name,
                    po_description,
                    qty,
                    material_uom,
                    received,
                    received_date,
                    (prd.qty - prd.received) as balance,
                    delivery_date
                FROM
                    po_generated_request_details prd,
                    supplier_details sd
                WHERE
                    prd.supplier_id = sd.supplier_id AND ";

        if(!empty($data['division'])){
            $sql .= "unit = '".$data['division']."' AND ";
        }

        if(!empty($data['type'])){
            $sql .= "type = '".$data['type']."' AND ";
        }

        if(!empty($data['date_range'][0]) && !empty($data['date_range'][1])){
            $sql .= "po_date BETWEEN '".$data['date_range'][0]."' AND '".$data['date_range'][1]."' AND ";
        }

        if(!empty($data['material_id'])){
            $sql .= "material_master_id = ".$data['material_id']." AND ";
        }

        if(!empty($data['supplier_id'])){
            $sql .= "prd.supplier_id = ".$data['supplier_id']." AND ";
        }

        if(!empty($data['po_number'])){
            $sql .= "prd.unit = '".$data['po_number'][0]."' AND ";
            $sql .= "prd.type = '".$data['po_number'][1]."' AND ";
            $sql .= "prd.po_number = '".$data['po_number'][2]."' AND ";
            $sql .= "YEAR(prd.po_date) = '".$data['po_year']."' AND ";
        }

        $sql .= "prd.outstanding_type = 'M' AND ";
        $sql .= "(prd.qty - prd.received) > 0";

        $result  = $this->db->query($sql)->result_array();
        return $result;
    }

    public function fetch_po_report_5($data)
    {
        $sql = "SELECT 
                    unit,
                    type,
                    po_number,
                    po_date,
                    sd.supplier_name,
                    origin,
                    material_name,
                    po_description,
                    qty,
                    material_uom,
                    received,
                    received_date,
                    (prd.received - prd.qty) as excess
                FROM
                    po_generated_request_details prd,
                    supplier_details sd
                WHERE
                    prd.supplier_id = sd.supplier_id AND ";

        if(!empty($data['division'])){
            $sql .= "unit = '".$data['division']."' AND ";
        }

        if(!empty($data['type'])){
            $sql .= "type = '".$data['type']."' AND ";
        }

        if(!empty($data['date_range'][0]) && !empty($data['date_range'][1])){
            $sql .= "po_date BETWEEN '".$data['date_range'][0]."' AND '".$data['date_range'][1]."' AND ";
        }

        if(!empty($data['material_id'])){
            $sql .= "material_master_id = ".$data['material_id']." AND ";
        }

        if(!empty($data['supplier_id'])){
            $sql .= "prd.supplier_id = ".$data['supplier_id']." AND ";
        }

        if(!empty($data['po_number'])){
            $sql .= "prd.unit = '".$data['po_number'][0]."' AND ";
            $sql .= "prd.type = '".$data['po_number'][1]."' AND ";
            $sql .= "prd.po_number = '".$data['po_number'][2]."' AND ";
            $sql .= "YEAR(prd.po_date) = '".$data['po_year']."' AND ";
        }

        $sql .= "prd.outstanding_type = 'B' AND";
        $sql .= "(prd.received - prd.qty) > 0";

        $result  = $this->db->query($sql)->result_array();
        return $result;
    }

    public function fetch_po_report_6($data)
    {
        $sql = "SELECT
                    po_generated_request_id, 
                    unit,
                    type,
                    po_number,
                    po_date,
                    sd.supplier_name,
                    origin,
                    material_name,
                    po_description,
                    qty,
                    material_uom,
                    received,
                    received_date,
                    dc_number,
                    dc_date,
                    delivery_date
                FROM
                    po_generated_request_details prd,
                    supplier_details sd
                WHERE
                    prd.supplier_id = sd.supplier_id AND ";

        if(!empty($data['division'])){
            $sql .= "unit = '".$data['division']."' AND ";
        }

        if(!empty($data['type'])){
            $sql .= "type = '".$data['type']."' AND ";
        }

        if(!empty($data['date_range'][0]) && !empty($data['date_range'][1])){
            $sql .= "po_date BETWEEN '".$data['date_range'][0]."' AND '".$data['date_range'][1]."' AND ";
        }

        if(!empty($data['material_id'])){
            $sql .= "material_master_id = ".$data['material_id']." AND ";
        }

        if(!empty($data['supplier_id'])){
            $sql .= "prd.supplier_id = ".$data['supplier_id']." AND ";
        }

        if(!empty($data['po_number'])){
            $sql .= "prd.unit = '".$data['po_number'][0]."' AND ";
            $sql .= "prd.type = '".$data['po_number'][1]."' AND ";
            $sql .= "prd.po_number = '".$data['po_number'][2]."' AND ";
            $sql .= "YEAR(prd.po_date) = '".$data['po_year']."' AND ";
        }

        $sql .= "prd.outstanding_type = 'B'";

        $result  = $this->db->query($sql)->result_array();

        $sql = "SELECT 
                    parent_po_generated_request_id
                FROM
                    po_generated_request_details prd
                WHERE
                    prd.outstanding_type = 'T'";
        $trashData  = $this->db->query($sql)->result_array();
        
        $keys = array();
        foreach ($trashData as $k1 => $v1) {
            $key = array_search($v1['parent_po_generated_request_id'], array_column($result,'po_generated_request_id'));
            if($key !== FALSE)
            {
                $qty = $result[$key]['qty'];
                $received = $result[$key]['received'];
                if(($qty - $received) <= 0){
                    $keys[] = $key;
                }
            }
        }

        foreach ($keys as $k3 => $v3) {
            unset($result[$v3]);
        }

        foreach ($result as $k2=> $v2) {
            unset($result[$k2]['po_generated_request_id']);
        }
        return $result;
    }

}

?>