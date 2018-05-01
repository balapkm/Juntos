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
                    sd.payment_type,
                    cnd.cheque_amount
                FROM
                    cheque_number_details cnd,
                    supplier_details sd
                WHERE
                    sd.supplier_id  = cnd.supplier_id AND
                    cnd.payable_month BETWEEN '".$data['payment_statement_month']."-01' AND '".$data['payment_statement_month']."-31'";
        $data  = $this->db->query($sql)->result_array();
        return $data;
    }
}

?>