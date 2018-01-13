<?php
/*data entry*/
class DataEntryQuery extends CI_Model 
{

    function __construct()
    {
        parent::__construct();
    }

    private function objectToArray($data)
    {
    	return json_decode(json_encode($data),1);
    }

    public function getAddTableData($data)
    {
        $sql = "
                SELECT
                    data_entry_id,
                    serial_no,
                    article_name,
                    de.article_id,
                    selection_name,
                    de.selection_id,
                    description_name,
                    de.description_id,
                    color_name,
                    de.color_id,
                    pieces,
                    date,
                    leather,
                    query,
                    sqfeet,
                    remarks
                FROM 
                    article_details ad,
                    color_details cd,
                    selection_details sd,
                    description_details dd,
                    data_entry de
                WHERE
                    de.article_id = ad.article_id AND
                    de.color_id   = cd.color_id AND
                    de.selection_id = sd.selection_id AND
                    de.description_id = dd.description_id AND
                    de.status = 'Y' AND
                    year(de.date) = ".date("Y",strtotime($data['date']))." AND
                    de.serial_no = ".$data['serial_no']."";
        $data  = $this->db->query($sql)->result_array();
        return $data;
    }

    public function updateDataEntryForAllSerialNo($data)
    {
        $sql   = 'UPDATE 
                    data_entry
                  SET 
                    date = "'.$data['date'].'" 
                  WHERE 
                    year(date) = "'.trim($data['yearData']).'" AND
                    serial_no  = "'.$data['serial_no'].'"';
        return $this->db->query($sql);
    }

    public function getSerialNumberHighest()
    {
        $sql   = 'select max(serial_no) as max_serial_no from data_entry where year(date) ='.date('Y');
        $data  = $this->db->query($sql)->result_array();
        if(empty($data[0]['max_serial_no']))
        {
            return 1;
        }
        else
        {
            return ($data[0]['max_serial_no']+1);
        }
    }

    public function getSerialNumberUnique()
    {
        $sql   = 'select distinct serial_no from data_entry where status="Y"';
        $data  = $this->db->query($sql)->result_array();
        return $data;
    }

    public function searchDataEntry($data)
    {
        $sql = "
                SELECT
                    data_entry_id,
                    serial_no,
                    article_name,
                    de.article_id,
                    selection_name,
                    de.selection_id,
                    description_name,
                    de.description_id,
                    color_name,
                    de.color_id,
                    pieces,
                    date,
                    leather,
                    query,
                    leather,
                    sqfeet,
                    remarks
                FROM 
                    article_details ad,
                    color_details cd,
                    selection_details sd,
                    description_details dd,
                    data_entry de
                WHERE
                    de.article_id = ad.article_id AND
                    de.color_id   = cd.color_id AND
                    de.selection_id = sd.selection_id AND
                    de.description_id = dd.description_id AND
                    de.status = 'Y' AND
                    year(de.date) = ".$data['yearData']." AND
                    de.serial_no = ".$data['serial_no_1']."";
        $data  = $this->db->query($sql)->result_array();
        return $data;
    }

    public function reportSearchDataEntry($data)
    {
        $sql = "
                SELECT
                    data_entry_id,
                    serial_no,
                    article_name,
                    de.article_id,
                    selection_name,
                    de.selection_id,
                    description_name,
                    de.description_id,
                    color_name,
                    de.color_id,
                    pieces,
                    date,
                    leather,
                    query,
                    leather,
                    sqfeet,
                    remarks
                FROM 
                    article_details ad,
                    color_details cd,
                    selection_details sd,
                    description_details dd,
                    data_entry de
                WHERE
                    de.article_id = ad.article_id AND
                    de.color_id   = cd.color_id AND
                    de.selection_id = sd.selection_id AND
                    de.description_id = dd.description_id AND
                    de.status = 'Y'";
                    
        if(!empty($data['serial_no']))
        {
            $sql .= " AND serial_no = '".$data['serial_no']."'";
        }
        if(!empty($data['leather']))
        {
            $sql .= " AND leather = '".$data['leather']."'";
        }
        if(!empty($data['query']))
        {
            $sql .= " AND query = '".$data['query']."'";
        }
        if(!empty($data['date'][0]))
        {
            $sql .= " AND (date BETWEEN '".$data['date'][0]."' AND '".$data['date'][1]."')";
        }
        $data  = $this->db->query(trim($sql))->result_array();
        return $data;
    }

    public function insertDataEntry($data)
    {
        $insert_data = array(
            'serial_no'    => $data['serial_no'],
            'article_id'   => $data['article'],
            'color_id'     => $data['color'],
            'selection_id' => $data['selection'],
            'description_id'=> $data['description'],
            'date'           => $data['date'],
            'leather'        => $data['leather'],
            'query'          => $data['query'],
            'pieces'         => $data['pieces'],
            'sqfeet'         => $data['sqfeet'],
            'remarks'        => $data['remarks'],
            'status'         => 'Y'
        );

        $result = $this->db->insert('data_entry',$insert_data);
        return $result;
    }

    public function updateDataEntry($data)
    {
        $insert_data = array(
            'serial_no'    => $data['serial_no'],
            'article_id'   => $data['article'],
            'color_id'     => $data['color'],
            'selection_id' => $data['selection'],
            'description_id'=> $data['description'],
            'date'           => $data['date'],
            'leather'        => $data['leather'],
            'query'          => $data['query'],
            'pieces'         => $data['pieces'],
            'sqfeet'         => $data['sqfeet'],
            'remarks'        => $data['remarks'],
            'status'         => 'Y'
        );

        $result = $this->db->update('data_entry',$insert_data,array('data_entry_id'=>$data['id']));
        return $result;
    }

    public function deleteDataEntry($data)
    {
        $result = $this->db->delete('data_entry',array('data_entry_id'=>$data['data_entry_id']));
        return $result;
    }

    public function leatherSummaryReport($data)
    {
        $sql = "SELECT
                    data_entry_id,
                    serial_no,
                    article_name,
                    de.article_id,
                    selection_name,
                    de.selection_id,
                    description_name,
                    de.description_id,
                    color_name,
                    de.color_id,
                    pieces,
                    date,
                    leather,
                    query,
                    leather,
                    sqfeet,
                    remarks,
                    SUM(pieces) as sum_pieces,
                    SUM(sqfeet) as sum_sqfeet
                FROM 
                    article_details ad,
                    color_details cd,
                    selection_details sd,
                    description_details dd,
                    data_entry de
                WHERE
                    de.article_id = ad.article_id AND
                    de.color_id   = cd.color_id AND
                    de.selection_id = sd.selection_id AND
                    de.description_id = dd.description_id AND
                    de.status = 'Y' AND
                    de.description_id in(".$data['description'].") AND
                    de.leather = '".$data['leather']."' AND
                    (date BETWEEN '".$data['date'][0]."' AND '".$data['date'][1]."')
                    GROUP BY selection_name, color_name, article_name,description_name
                    ORDER BY 
                        article_name ASC,
                        color_name ASC,
                        selection_name";
        $data  = $this->db->query(trim($sql))->result_array();
        return $data;
    }
}

?>