<?php

class PaymentStatementQuery extends CI_Model 
{

    function __construct()
    {
        parent::__construct();
    }

    public function getSearchActionAsPerRequest($data)
    {
        $sql = "SELECT
                    sd.origin,
                    sd.supplier_name,
                    sd.payment_to,
                    sd.payment_type,
                    cnd.cheque_amount,
                    cnd.page_no,
                    cnd.cheque_number_id,
                    cnd.payable_month
                FROM
                    cheque_number_details cnd,
                    supplier_details sd
                WHERE
                    sd.supplier_id  = cnd.supplier_id AND
                    cnd.unit = '".$data['division']."' AND
                    cnd.payable_month BETWEEN '".$data['payment_statement_month']."-01' AND '".$data['payment_statement_month']."-31'";
        $result  = $this->db->query($sql)->result_array();

        foreach ($result as $key => $value) {
            $result[$key]['total_amount'] = 0;
            $sql = "SELECT bill_amount FROM po_generated_request_details WHERE payable_month='".$value['payable_month']."' GROUP BY bill_number";
            $data  = $this->db->query($sql)->result_array();
        
            foreach ($data as $k1 => $v1) {
                $result[$key]['total_amount'] += $v1['bill_amount'];
            } 

            $sql  = "SELECT (ad.amount) as ad_amount FROM po_generated_request_details prd,advance_payment_details ad WHERE prd.advance_payment_id=ad.advance_payment_id AND prd.payable_month='".$value['payable_month']."' GROUP BY prd.bill_number";
            $data  = $this->db->query($sql)->result_array();
        
            foreach ($data as $k1 => $v1) {
                $result[$key]['total_amount'] -= $v1['ad_amount'];
            }

            $sql  = "SELECT amount,type FROM debit_note_details WHERE payable_month='".$value['payable_month']."'";
            $data  = $this->db->query($sql)->result_array();
            foreach ($data as $k => $v) {
                if($v['type']=='D' || $v['type']=='T')
                    $result[$key]['total_amount'] -= $v['amount'];
                else
                    $result[$key]['total_amount'] += $v['amount'];
            }
        }
        return $result;
    }

    public function getCoverLetterData($data)
    {
        $sql = "SELECT
                    sd.*,
                    prd.*
                FROM
                    po_generated_request_details prd,
                    supplier_details sd
                WHERE
                    sd.supplier_id  = prd.supplier_id AND
                    prd.supplier_id = '".$data['payment_statement_supplier_id']."' AND
                    prd.payable_month = '".$data['payment_statement_date']."' AND
                    prd.outstanding_type = 'B' AND
                    prd.bill_amount != 0 AND
                    prd.bill_number != '' AND
                    prd.bill_date != '0000-00-00'
                GROUP BY 
                    prd.bill_number";
        $data  = $this->db->query($sql)->result_array();
        return $data;
    }

    public function getExtraBillAmountData($data)
    {
        $sql = "SELECT
                    *
                FROM
                    debit_note_details dnd
                WHERE
                    dnd.supplier_id = '".$data['payment_statement_supplier_id']."' AND
                    dnd.payable_month = '".$data['payment_statement_date']."'";
        $data  = $this->db->query($sql)->result_array();
        return $data;
    }

    public function getChequeBillAmountData($data)
    {
        $sql = "SELECT
                    *
                FROM
                    cheque_number_details cnd
                WHERE
                    cnd.supplier_id = '".$data['payment_statement_supplier_id']."' AND
                    cnd.payable_month = '".$data['payment_statement_date']."'";
        $data  = $this->db->query($sql)->result_array();
        return $data;
    }

    public function updateEditPaymentStatement($data)
    {
        $id     = $data['cheque_number_id'];
        unset($data['cheque_number_id']);
        $result = $this->db->update('cheque_number_details',$data, array('cheque_number_id' => $id));
        return $result;
    }
}

?>