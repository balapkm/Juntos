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

    public function getPODetails($id)
    {
        $sql = "SELECT 
                    * 
                FROM 
                    `po_generated_request_details` 
                WHERE
                    po_generated_request_id =".$id;
        $data  = $this->db->query($sql)->result_array();
        return $data;
    }

    public function insert_debit_note_details($data){
        $data['created_date'] = date('Y-m-d');
        return $this->db->insert('debit_note_details',$data);
    }

    public function update_debit_note_details($data){
        $id = $data['id'];
        unset($data['id']);
        $result = $this->db->update('debit_note_details',$data, array('s_no' => $id));
        return $result;
    }

    public function addAdvancePayment($data)
    {
        return $this->db->insert('advance_payment_details',$data);
    }

    public function editAdvancePayment($data)
    {
        $id = $data['advance_payment_id'];
        unset($data['advance_payment_id']);
        $result = $this->db->update('advance_payment_details',$data, array('advance_payment_id' => $id));
        return $result;
    }

    public function updatePaymentListData($data)
    {
        // print_r($data);exit;
        $id = $data['bill_number'];
        $supplier_id = $data['supplier_id'];
        $bill_date = $data['bill_date'];
        unset($data['bill_number']);
        unset($data['avg_cost']);
        unset($data['supplier_id']);
        unset($data['bill_date']);
        $result = $this->db->update('po_generated_request_details',$data, array('bill_number' => $id,'supplier_id' => $supplier_id,"bill_date" => $bill_date));
        return $result;
    }
    public function getPaymentBookData($data,$status='N')
    {
        $sql = "SELECT 
                    sd.supplier_name,
                    sd.state_code,
                    sd.origin,
                    prd.*,
                    mm.material_name as material_name,
                    DATEDIFF('".date('Y-m-d')."',prd.delivery_date) AS delay_day
                FROM
                    po_generated_request_details prd,
                    supplier_details sd,
                    material_master mm
                WHERE
                    prd.supplier_id = sd.supplier_id AND
                    prd.material_master_id = mm.material_id AND
                    outstanding_type = 'B' AND 
                    prd.bill_amount!=0 AND 
                    prd.bill_number!='' AND 
                    prd.unit = '".$data['division']."'";

        if(!empty($data['supplier_name']))
        {
            $sql.=  " AND prd.supplier_id = ".$data['supplier_name'];
        }

        if(!empty($data['date'][0]) && !empty($data['date'][1]))
        {
            $sql.=  " AND prd.payable_month BETWEEN '".$data['date'][0]."' AND '".$data['date'][1]."'";
        }
                                        
        $sql.= " ORDER BY date(prd.payable_month) asc,prd.bill_number asc,sd.supplier_name asc";
        
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

    public function getAdvancePaymentFullDetails()
    {
        $sql   = "SELECT apd.*,sd.supplier_name,sd.origin FROM advance_payment_details apd,supplier_details sd WHERE apd.supplier_id=sd.supplier_id order by advance_payment_id desc";                    
        $data  = $this->db->query(trim($sql))->result_array();
        // print_r($data);exit;
        return $data;
    }

    public function getCreditDebitNoteDetails(){
        $sql   = "SELECT * FROM debit_note_details dnd,supplier_details sd WHERE dnd.supplier_id=sd.supplier_id order by s_no desc";                    
        $data  = $this->db->query(trim($sql))->result_array();
        return $data;
    }

    public function selectCreditDebitNoteDetailsAsPerType($data){
        $sql = "SELECT * 
                    FROM 
                    debit_note_details dnd
                    WHERE 
                    dnd.type = 'B' AND dnd.payable_month = '".date('Y-m-d',strtotime('next month', strtotime($data['payable_month'])))."' AND dnd.supplier_id = '".$data['supplier_id']."'";
        $data  = $this->db->query(trim($sql))->result_array();
        if(count($data) > 0)
        {
            $result = $this->db->delete('debit_note_details',array('s_no' => $data[0]['s_no']));
        }
    }

    public function getDebitNoteListData($data){
        
        $sql = "SELECT 
                        dnd.*,
                        sd.supplier_name,
                        sd.origin
                    FROM 
                    debit_note_details dnd,
                    supplier_details sd
                WHERE sd.supplier_id = dnd.supplier_id";

        if(!empty($data['division']))
        {
            $sql.=  " AND dnd.division = '".$data['division']."'";
        }
        
        if(!empty($data['supplier_name']))
        {
            $sql.=  " AND dnd.supplier_id = ".$data['supplier_name']."";
        }

        if(!empty($data['supplier_id']))
        {
            $sql.=  " AND dnd.supplier_id = ".$data['supplier_id']."";
        }

        if(!empty($data['date'][0]) && !empty($data['date'][1]))
        {
            $sql.=  " AND dnd.payable_month BETWEEN '".$data['date'][0]."' AND '".$data['date'][1]."'";
        }

        if(!empty($data['date_range'][0]) && !empty($data['date_range'][1]))
        {
            $sql.=  " AND dnd.payable_month BETWEEN '".$data['date_range'][0]."' AND '".$data['date_range'][1]."'";
        }
        $data  = $this->db->query($sql)->result_array();
        return $data;
    }

    public function getAdvancePaymentDetails($data,$status)
    {
        /*if(empty($data['type'])) {
            $data['type'] = 'specfic';
        }
        if(!empty($data['payment_statement_supplier_id']))
        {
            $data['supplier_name'] = $data['payment_statement_supplier_id'];
        }*/
        $sql = "SELECT apd.*,sd.* FROM advance_payment_details apd,supplier_details sd WHERE sd.supplier_id = apd.supplier_id";

        if(!empty($data['division']))
        {
            $sql.=  " AND apd.division = '".$data['division']."'";
        }

        if(!empty($data['supplier_name']))
        {
            $sql.=  " AND apd.supplier_id = ".$data['supplier_name']."";
        }

        if(!empty($data['date'][0]) && !empty($data['date'][1]))
        {
            $sql.=  " AND apd.payable_month BETWEEN '".$data['date'][0]."' AND '".$data['date'][1]."'";
        }

        if(!empty($data['date_range'][0]) && !empty($data['date_range'][1]))
        {
            $sql.=  " AND apd.payable_month BETWEEN '".$data['date_range'][0]."' AND '".$data['date_range'][1]."'";
        }

        if(!empty($data['payable_month']))
        {
            $sql.=  " AND apd.payable_month = '".$data['payable_month']."'";
        }
        
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
        $sql = "SELECT * FROM cheque_number_details WHERE supplier_id='".$data['supplier_id']."' AND payable_month = '".$data['payable_month']."' AND unit='".$data['unit']."'";
        $data  = $this->db->query($sql)->result_array();
        return $data;
    }

    public function select_all_cheque_number_details($data)
    {
        $sql = "SELECT cnd.*,sd.* FROM cheque_number_details cnd,supplier_details sd WHERE sd.supplier_id = cnd.supplier_id";
        
        if(!empty($data['division']))
        {
            $sql.=  " AND unit = '".$data['division']."'";
        }

        if(!empty($data['supplier_name']))
        {
            $sql.=  " AND sd.supplier_id = ".$data['supplier_name'];
        }

        if(!empty($data['supplier_id']))
        {
            $sql.=  " AND sd.supplier_id = ".$data['supplier_id'];
        }

        if(!empty($data['date'][0]) && !empty($data['date'][1]))
        {
            $sql.=  " AND payable_month BETWEEN '".$data['date'][0]."' AND '".$data['date'][1]."'";
        }

        if(!empty($data['date_range'][0]) && !empty($data['date_range'][1]))
        {
            $sql.=  " AND payable_month BETWEEN '".$data['date_range'][0]."' AND '".$data['date_range'][1]."'";
        }

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