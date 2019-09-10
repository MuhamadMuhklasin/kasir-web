<?php defined("BASEPATH") or exit();  

class Report_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function get_data_report($data = []) {
		// data
			// 1. table,
			// 2. where,
			// 3. type 
		$get_all = function() use ($data) {
			return $this->db->select("*")
			->from($data['table'])
			->get()
			->result();
		};

		$get_condition = function() use ($data) {
			return $this->db->select("*")
			->from($data['table'])
			->where(isset($data['where']) ? $data["where"] : "1")
			->get()
			->result();
		};

		return 
			($data['type'] == "all") ? $get_all() : $get_condition();
	}

}

?>