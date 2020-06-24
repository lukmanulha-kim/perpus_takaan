<?php
class perpus_model extends CI_Model {

    public function queryAll($table)
    {
    	$Q = $this->db->get($table);
    	return $Q;
    }

    public function whereQuery($tb_name, $field, $parameter){
		$this->db->where($field, $parameter);
		$q = $this->db->get($tb_name);
		return $q;
	}

    public function insert_multiple($tb_name,$data){
		$this->db->insert_batch($tb_name, $data);
	}

}
?>
