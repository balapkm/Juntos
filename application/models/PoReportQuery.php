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
}

?>