<?php

class PoReportQuery extends CI_Model 
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('PaymentBookQuery');
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
                    mm.material_name,
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
                    supplier_details sd,
                    material_master mm
                WHERE
                    prd.supplier_id = sd.supplier_id AND 
                    mm.material_id = prd.material_master_id AND ";

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
                    mm.material_name,
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
                    material_details md,
                    material_master mm
                WHERE mm.material_id = md.material_id";
        if(!empty($data['supplier_id'])){
            $sql .= " AND supplier_id = ".$data['supplier_id']."";
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
                    mm.material_name,
                    po_description,
                    qty,
                    material_uom,
                    received,
                    received_date,
                    (prd.qty - prd.received) as balance,
                    delivery_date
                FROM
                    po_generated_request_details prd,
                    supplier_details sd,
                    material_master mm
                WHERE
                    prd.supplier_id = sd.supplier_id AND 
                    mm.material_id = prd.material_master_id AND ";

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
                    mm.material_name,
                    po_description,
                    qty,
                    material_uom,
                    received,
                    received_date,
                    (prd.received - prd.qty) as excess
                FROM
                    po_generated_request_details prd,
                    supplier_details sd,
                    material_master mm
                WHERE
                    prd.supplier_id = sd.supplier_id AND 
                    mm.material_id = prd.material_master_id AND ";

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

        $sql .= "prd.outstanding_type = 'M' AND";
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
                    mm.material_name,
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
                    supplier_details sd,
                    material_master mm
                WHERE
                    prd.supplier_id = sd.supplier_id AND 
                    mm.material_id = prd.material_master_id AND ";

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

    public function fetch_po_report_7($data)
    {
        $sql = "SELECT
                    s_no, 
                    sd.supplier_name,
                    origin,
                    bill_number,
                    bill_date,
                    bill_amount,
                    payable_month
                FROM
                    po_generated_request_details prd,
                    supplier_details sd
                WHERE
                    prd.supplier_id = sd.supplier_id";

        if(!empty($data['division'])){
            $sql .= " AND unit = '".$data['division']."'";
        }

        if(!empty($data['serial_number'])){
            $sql .= " AND s_no LIKE '%".$data['serial_number']."%'";
        }

        if(!empty($data['date_range'][0]) && !empty($data['date_range'][1])){
            $sql .= " AND payable_month BETWEEN '".$data['date_range'][0]."' AND '".$data['date_range'][1]."'";
        }

        if(!empty($data['supplier_id'])){
            $sql .= " AND prd.supplier_id = ".$data['supplier_id']."";
        }

        $sql .= " AND prd.outstanding_type = 'B' AND prd.bill_amount != 0 AND prd.bill_number != '' GROUP BY prd.payable_month,prd.supplier_id,prd.bill_number,prd.bill_amount,prd.bill_date";

        $result  = $this->db->query($sql)->result_array();

        return $result;
    }

    public function fetch_po_report_8($data)
    {
        $sql = "SELECT
                    sd.supplier_name,
                    sd.origin,
                    dnd.type,
                    dnd.debit_note_no,
                    dnd.debit_note_date,
                    dnd.supplier_creditnote,
                    dnd.supplier_creditnote_date,
                    dnd.query,
                    dnd.payable_month,
                    dnd.amount
                FROM
                    debit_note_details dnd,
                    supplier_details sd
                WHERE
                    sd.supplier_id = dnd.supplier_id ";

        if(!empty($data['supplier_id'])){
            $sql .= " AND sd.supplier_id = '".$data['supplier_id']."'";
        }

        if(!empty($data['origin'])){
            $sql .= " AND sd.origin = '".$data['origin']."'";
        }

        if(!empty($data['deduction_query'])){
            $sql .= " AND dnd.query LIKE '%".$data['deduction_query']."%'";
        }

        if(!empty($data['date_range'][0]) && !empty($data['date_range'][1])){
            $sql .= " AND payable_month BETWEEN '".$data['date_range'][0]."' AND '".$data['date_range'][1]."'";
        }

        $result  = $this->db->query($sql)->result_array();
        return $result;
    }

    public function fetch_po_report_9($data)
    {
        $sql = "SELECT
                    prd.unit, 
                    sd.supplier_name,
                    sd.supplier_id,
                    origin,
                    s_no,
                    bill_number,
                    bill_date,
                    bill_amount,
                    payable_month
                FROM
                    po_generated_request_details prd,
                    supplier_details sd
                WHERE
                    prd.supplier_id = sd.supplier_id";

        if(!empty($data['division'])){
            $sql .= " AND unit = '".$data['division']."'";
        }

        if(!empty($data['origin'])){
            $sql .= " AND sd.origin LIKE '%".$data['origin']."%'";
        }

        if(!empty($data['date_range'][0]) && !empty($data['date_range'][1])){
            $sql .= " AND prd.payable_month BETWEEN '".$data['date_range'][0]."' AND '".$data['date_range'][1]."'";
        }

        if(!empty($data['supplier_id'])){
            $sql .= " AND prd.supplier_id = ".$data['supplier_id']."";
        }

        $sql .= " AND prd.outstanding_type = 'B' AND prd.bill_amount != 0 AND prd.bill_number != '' GROUP BY prd.payable_month,prd.supplier_id,prd.bill_number,prd.bill_date";

        $input       = $data;
        $data        = $this->db->query($sql)->result_array();
        $result      = array();
        foreach ($data as $key => $value) {
            $result[$value['payable_month']."_".$value['supplier_id']]['paymentBookList'][] = $value;
        }

        $data = $this->PaymentBookQuery->getDebitNoteListData($input);
        foreach ($data as $key => $value) {
            if($value['type'] == 'D')
                $data[$key]['dtype'] = 'DEBIT NOTE';
            if($value['type'] == 'C')
                $data[$key]['dtype'] = 'CREDIT NOTE';
            if($value['type'] == 'B')
                $data[$key]['dtype'] = 'BALANCE AMOUNT';
            if($value['type'] == 'T')
                $data[$key]['dtype'] = 'TDS';

            $result[$value['payable_month']."_".$value['supplier_id']]['debit_note_details'][] = $data[$key];
        }

        $data = $this->PaymentBookQuery->getAdvancePaymentDetails($input,"Y");
        foreach ($data as $key => $value) {
            $result[$value['payable_month']."_".$value['supplier_id']]['advance_payment_details'][] = $value;
        }

        $data = $this->PaymentBookQuery->select_all_cheque_number_details($input);
        foreach ($data as $key => $value) 
        {
            $result[$value['payable_month']."_".$value['supplier_id']]['chequeNumberDetails'][] = $value;
        }
        $finalResponse = array();
        $count = 0;
        foreach ($result as $key => $value) {
            $finalResponse[$count]['bill_amount']  = 0;
            $finalResponse[$count]['total_amount'] = 0;
            $finalResponse[$count]['bill_number'] = implode(",",array_column($value['paymentBookList'],'bill_number'));
            $finalResponse[$count]['bill_date']   = implode(",",array_column($value['paymentBookList'],'bill_date'));
            $finalResponse[$count]['s_no']        = implode(",",array_column($value['paymentBookList'],'s_no'));
            foreach ($value['paymentBookList'] as $k1 => $v1) {
                $finalResponse[$count]['unit']          = $v1['unit'];
                $finalResponse[$count]['supplier_name'] = $v1['supplier_name'];
                $finalResponse[$count]['origin']        = $v1['origin'];
                $finalResponse[$count]['payable_month'] = $v1['payable_month'];
                $finalResponse[$count]['bill_amount']  += $v1['bill_amount'];
            }

            $finalResponse[$count]['total_amount'] += $finalResponse[$count]['bill_amount'];

            $finalResponse[$count]['DEBIT_CREDIT_AMOUNT'] = 0;
            $finalResponse[$count]['DEBIT/CREDIT/TDS']    = implode(",",array_column($value['debit_note_details'],'dtype'));
            foreach ($value['debit_note_details'] as $k1 => $v1) {
                if($v1['type'] == 'D' || $v1['type'] == 'T'){
                    $finalResponse[$count]['DEBIT_CREDIT_AMOUNT'] -= $v1['amount'];
                    $finalResponse[$count]['total_amount']        -= $v1['amount'];
                }
                if($v1['type'] == 'C' || $v1['type'] == 'B'){
                    $finalResponse[$count]['DEBIT_CREDIT_AMOUNT'] += $v1['amount'];
                    $finalResponse[$count]['total_amount'] += $v1['amount'];
                }
                $finalResponse[$count]['unit']          = $v1['division'];
                $finalResponse[$count]['supplier_name'] = $v1['supplier_name'];
                $finalResponse[$count]['origin']        = $v1['origin'];
                $finalResponse[$count]['payable_month'] = $v1['payable_month'];
            }


            $finalResponse[$count]['advance_payment_amount'] = 0;
            foreach ($value['advance_payment_details'] as $k1 => $v1) {
                $finalResponse[$count]['advance_payment_amount'] += $v1['pi_amount'];
                $finalResponse[$count]['unit']          = $v1['division '];
                $finalResponse[$count]['supplier_name'] = $v1['supplier_name'];
                $finalResponse[$count]['origin']        = $v1['origin'];
                $finalResponse[$count]['payable_month'] = $v1['payable_month'];
            }

            $finalResponse[$count]['total_amount'] -= $finalResponse[$count]['advance_payment_amount'];
            $finalResponse[$count]['balanceAmt']    = $finalResponse[$count]['total_amount'];

            if(!empty($value['advance_payment_details']) || !empty($value['debit_note_details']) || !empty($value['paymentBookList'])){
                $finalResponse[$count]['cheque_no']     = $value['chequeNumberDetails'][0]['cheque_no'];
                $finalResponse[$count]['cheque_date']   = $value['chequeNumberDetails'][0]['cheque_date'];
                $finalResponse[$count]['cheque_amount'] = $value['chequeNumberDetails'][0]['cheque_amount'];
                $finalResponse[$count]['balanceAmt']    = $finalResponse[$count]['total_amount'] - $finalResponse[$count]['cheque_amount'];
            }
            else
            {
                unset($finalResponse[$count]);
            }

            $count++;
        }

        $sortArray     = array("unit","supplier_name","origin","s_no","bill_number","bill_date","bill_amount","DEBIT/CREDIT/TDS","DEBIT_CREDIT_AMOUNT","advance_payment_amount","total_amount","cheque_no","cheque_date","cheque_amount","balanceAmt","payable_month");

        $result = array();
        foreach ($finalResponse as $key => $value) {
            $result[$key] = array_merge(array_flip($sortArray), $value);
        }


        return $result;
    }

    public function fetch_po_report_10($data)
    {
        $sql = "SELECT
                    apd.division,
                    sd.supplier_name,
                    sd.origin,
                    apd.po_number,
                    apd.po_date,
                    apd.supplier_pi_number,
                    apd.pi_date,
                    apd.pi_amount,
                    apd.query,
                    apd.payable_month,
                    apd.cheque_amount,
                    apd.cheque_date,
                    apd.cheque_no
                FROM
                    advance_payment_details apd,
                    supplier_details sd
                WHERE
                    sd.supplier_id = apd.supplier_id ";

        if(!empty($data['supplier_id'])){
            $sql .= " AND sd.supplier_id = '".$data['supplier_id']."'";
        }

        if(!empty($data['division'])){
            $sql .= " AND apd.division = '".$data['division']."'";
        }

        if(!empty($data['origin'])){
            $sql .= " AND sd.origin = '".$data['origin']."'";
        }

        if(!empty($data['date_range'][0]) && !empty($data['date_range'][1])){
            $sql .= " AND apd.payable_month BETWEEN '".$data['date_range'][0]."' AND '".$data['date_range'][1]."'";
        }


        $result  = $this->db->query($sql)->result_array();
        return $result;
    }
    
    public function fetch_po_report_11($data)
    {
        $sql = "SELECT
                    cnd.unit,
                    cnd.page_no,
                    sd.supplier_name,
                    sd.supplier_id,
                    sd.origin,
                    sd.payment_type,
                    cnd.payable_month,
                    cnd.cheque_amount
                FROM
                    cheque_number_details cnd,
                    supplier_details sd
                WHERE
                    sd.supplier_id  = cnd.supplier_id";

        if(!empty($data['division'])){
            $sql .= " AND cnd.unit = '".$data['division']."'";
        }

        if(!empty($data['date_range'][0]) && !empty($data['date_range'][1])){
            $sql .= " AND cnd.payable_month BETWEEN '".$data['date_range'][0]."' AND '".$data['date_range'][1]."'";
        }

        if(!empty($data['supplier_id'])){
            $sql .= " AND cnd.supplier_id = '".$data['supplier_id']."'";
        }
                    
        $sql     .= " group by cnd.supplier_id,cnd.payable_month order by cnd.payable_month ";
        $result   = $this->db->query($sql)->result_array();
        
        foreach ($result as $key => $value) {
            if($value['cheque_amount'] != 0){
                $result[$key]['total_amount'] = 0;
                $sql = "SELECT bill_amount FROM po_generated_request_details WHERE supplier_id = '".$value['supplier_id']."' AND payable_month='".$value['payable_month']."' GROUP BY bill_number";
                $data  = $this->db->query($sql)->result_array();
            
                foreach ($data as $k1 => $v1) {
                    $result[$key]['total_amount'] += $v1['bill_amount'];
                } 

                $sql  = "SELECT amount,type FROM debit_note_details WHERE supplier_id = '".$value['supplier_id']."' AND payable_month='".$value['payable_month']."'";
                $data  = $this->db->query($sql)->result_array();
                foreach ($data as $k => $v) {
                    if($v['type']=='D' || $v['type']=='T')
                        $result[$key]['total_amount'] -= $v['amount'];
                    else
                        $result[$key]['total_amount'] += $v['amount'];
                }

                $sql  = "SELECT * FROM advance_payment_details ad WHERE ad.payable_month='".$value['payable_month']."' AND ad.supplier_id = '".$value['supplier_id']."'";
                $data  = $this->db->query($sql)->result_array();
            
                foreach ($data as $k1 => $v1) {
                    $result[$key]['total_amount'] -= $v1['pi_amount'];
                }
                unset($result[$key]['supplier_id']);
                unset($result[$key]['cheque_amount']);
                if(empty($result[$key]['total_amount']))
                    unset($result[$key]);
            }else{
                unset($result[$key]);
            }
        }

        return $result;
    }

    public function fetch_po_report_12($data)
    {
        $sql = "SELECT
                    cnd.unit,
                    cnd.page_no,
                    sd.supplier_name,
                    sd.supplier_id,
                    sd.origin,
                    sd.payment_type,
                    cnd.payable_month,
                    cnd.cheque_amount
                FROM
                    cheque_number_details cnd,
                    supplier_details sd
                WHERE
                    sd.supplier_id  = cnd.supplier_id";

        if(!empty($data['division'])){
            $sql .= " AND cnd.unit = '".$data['division']."'";
        }

        if(!empty($data['date_range'][0]) && !empty($data['date_range'][1])){
            $sql .= " AND cnd.payable_month BETWEEN '".$data['date_range'][0]."' AND '".$data['date_range'][1]."'";
        }

        if(!empty($data['supplier_id'])){
            $sql .= " AND cnd.supplier_id = '".$data['supplier_id']."'";
        }
                    
        $sql     .= " group by cnd.supplier_id,cnd.payable_month order by cnd.payable_month ";
        $result   = $this->db->query($sql)->result_array();
        
        foreach ($result as $key => $value) {
            if($value['cheque_amount'] == 0){
                $result[$key]['total_amount'] = 0;
                $sql = "SELECT bill_amount FROM po_generated_request_details WHERE supplier_id = '".$value['supplier_id']."' AND payable_month='".$value['payable_month']."' GROUP BY bill_number";
                $data  = $this->db->query($sql)->result_array();
            
                foreach ($data as $k1 => $v1) {
                    $result[$key]['total_amount'] += $v1['bill_amount'];
                } 

                $sql  = "SELECT amount,type FROM debit_note_details WHERE supplier_id = '".$value['supplier_id']."' AND payable_month='".$value['payable_month']."'";
                $data  = $this->db->query($sql)->result_array();
                foreach ($data as $k => $v) {
                    if($v['type']=='D' || $v['type']=='T')
                        $result[$key]['total_amount'] -= $v['amount'];
                    else
                        $result[$key]['total_amount'] += $v['amount'];
                }

                $sql  = "SELECT * FROM advance_payment_details ad WHERE ad.payable_month='".$value['payable_month']."' AND ad.supplier_id = '".$value['supplier_id']."'";
                $data  = $this->db->query($sql)->result_array();
            
                foreach ($data as $k1 => $v1) {
                    $result[$key]['total_amount'] -= $v1['pi_amount'];
                }
                unset($result[$key]['supplier_id']);
                unset($result[$key]['cheque_amount']);
                if(empty($result[$key]['total_amount']))
                    unset($result[$key]);
            }else{
                unset($result[$key]);
            }
        }

        return $result;
    }
}

?>