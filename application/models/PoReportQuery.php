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
                    po_description,
                    query,
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
                    prd.supplier_id = sd.supplier_id AND
                    unit = '".$data['division']."' AND
                    type = '".$data['type']."' AND
                    po_date BETWEEN '".$data['date_range'][0]."' AND '".$data['date_range'][1]."' AND
                    outstanding_type = 'M'";
        $result  = $this->db->query($sql)->result_array();
        return $result;
    }

    public function fetch_po_report_2($data)
    {
        $sql = "SELECT 
                    unit,
                    type,
                    po_number,
                    po_date,
                    sd.supplier_name,
                    origin,
                    order_reference,
                    po_description,
                    query,
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
                    prd.supplier_id = sd.supplier_id AND
                    po_date BETWEEN '".$data['date_range'][0]."' AND '".$data['date_range'][1]."' AND
                    material_master_id = ".$data['material_id']." AND
                    outstanding_type = 'M'";
        $result  = $this->db->query($sql)->result_array();
        return $result;
    }

    public function fetch_po_report_3($data)
    {
        $sql = "SELECT 
                    unit,
                    type,
                    po_number,
                    po_date,
                    sd.supplier_name,
                    origin,
                    order_reference,
                    po_description,
                    query,
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
                    prd.supplier_id = sd.supplier_id AND
                    po_date BETWEEN '".$data['date_range'][0]."' AND '".$data['date_range'][1]."' AND
                    prd.supplier_id = ".$data['supplier_id']." AND
                    outstanding_type = 'M'";
        $result  = $this->db->query($sql)->result_array();
        return $result;
    }
}

?>