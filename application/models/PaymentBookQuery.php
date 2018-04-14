<?php

class PaymentBookQuery extends CI_Model 
{

    function __construct()
    {
        parent::__construct();
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

    public function insert_debit_note_details($data){
        $data['created_date'] = date('Y-m-d');
        return $this->db->insert('debit_note_details',$data);
    }

    public function updatePaymentListData($data)
    {
        $id = $data['po_generated_request_id'];
        unset($data['po_generated_request_id']);
        $result = $this->db->update('po_generated_request_details',$data, array('po_generated_request_id' => $id));
        return $result;
    }
    public function getPaymentBookData($data)
    {
        $sql = "SELECT 
                        sd.supplier_name,
                    sd.state_code,
                    prd.*,
                    DATEDIFF('".date('Y-m-d')."',prd.delivery_date) AS delay_day
                FROM
                    po_generated_request_details prd,
                    supplier_details sd
                WHERE
                    prd.supplier_id = sd.supplier_id AND
                    outstanding_type = 'B' AND 
                    prd.bill_amount!=0 AND 
                    prd.bill_number!='' AND 
                    prd.supplier_id = ".$data['supplier_name'] ;                    
        $sql.= " ORDER BY prd.bill_number";
        // print_r($sql);exit;
        $data  = $this->db->query(trim($sql))->result_array();
        return $data;
    }

    public function getDebitNoteListData($data){

        $sql = "SELECT * FROM debit_note_details WHERE supplier_id=".$data['supplier_name'];
        $data  = $this->db->query($sql)->result_array();
        return $data;
    }
    public function deleteDebitNoteData($data){
        $result = $this->db->delete('debit_note_details',array('s_no' => $data['s_no']));
        return $result;
    }

}

?>