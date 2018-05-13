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

    public function getPoNumberAsPerSupplier($data)
    {
        $sql = "SELECT 
                    * 
                FROM 
                    `po_generated_request_details` 
                WHERE
                    supplier_id = ".$data['supplier_id']." AND
                    outstanding_type = 'M'
                    GROUP BY unit,type,po_number";
        $data  = $this->db->query($sql)->result_array();
        return $data;
    }

    public function insert_debit_note_details($data){
        $data['created_date'] = date('Y-m-d');
        return $this->db->insert('debit_note_details',$data);
    }

    public function addAdvancePayment($data)
    {
        return $this->db->insert('advance_payment_details',$data);
    }

    public function updatePaymentListData($data)
    {
        $id = $data['bill_number'];
        unset($data['bill_number']);
        unset($data['avg_cost']);
        $result = $this->db->update('po_generated_request_details',$data, array('bill_number' => $id));
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
                    prd.supplier_id IN (".implode(",",$data['supplier_name']).")";                    
        $sql.= " ORDER BY date(prd.payable_month) desc,prd.bill_number asc";
        $data  = $this->db->query(trim($sql))->result_array();
        return $data;
    }

    public function deletePaymentList($data)
    {
        $sql = "UPDATE 
                    po_generated_request_details 
                SET 
                    bill_amount=0,
                    bill_number='',
                    bill_date='',
                    payable_month = '',
                    s_no = '',
                    query = ''
                WHERE 
                    bill_number = '".$data['bill_number']."' AND
                    outstanding_type = 'B'";
        $data  = $this->db->query(trim($sql));
        return $data;
    }

    public function getDebitNoteListData($data){

        $sql = "SELECT * FROM debit_note_details WHERE supplier_id IN (".implode(",",$data['supplier_name']).")";
        $data  = $this->db->query($sql)->result_array();
        return $data;
    }

    public function getAdvancePaymentDetails($data)
    {
        $sql = "SELECT * FROM advance_payment_details WHERE supplier_id IN (".implode(",",$data['supplier_name']).")";
        $data  = $this->db->query($sql)->result_array();
        return $data;
    }

    public function deleteDebitNoteData($data){
        $result = $this->db->delete('debit_note_details',array('s_no' => $data['s_no']));
        return $result;
    }

    public function deleteAdvancePaymentDetails($data)
    {
        $result = $this->db->delete('advance_payment_details',array('advance_payment_id' => $data['advance_payment_id']));
        return $result;
    }

    public function select_cheque_number_details($data)
    {
        $sql = "SELECT * FROM cheque_number_details WHERE supplier_id='".$data['supplier_id']."' AND payable_month = '".$data['payable_month']."'";
        $data  = $this->db->query($sql)->result_array();
        return $data;
    }

    public function select_all_cheque_number_details($data)
    {
        $sql = "SELECT * FROM cheque_number_details WHERE supplier_id IN (".implode(",",$data['supplier_name']).")";
        $data  = $this->db->query($sql)->result_array();
        return $data;
    }

    public function insert_cheque_number_details($data){
        return $this->db->insert('cheque_number_details',$data);
    }

    public function update_cheque_number_details($data)
    {
        $id = $data['cheque_number_id'];
        unset($data['cheque_number_id']);
        $result = $this->db->update('cheque_number_details',$data, array('cheque_number_id' => $id));
        return $result;
    }

}

?>