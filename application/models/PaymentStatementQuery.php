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
                    cnd.cheque_number_id
                FROM
                    cheque_number_details cnd,
                    supplier_details sd
                WHERE
                    sd.supplier_id  = cnd.supplier_id AND
                    cnd.payable_month BETWEEN '".$data['payment_statement_month']."-01' AND '".$data['payment_statement_month']."-31'";
        $data  = $this->db->query($sql)->result_array();
        return $data;
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