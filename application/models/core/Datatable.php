<?php defined("BASEPATH") Or exit(); 

class Datatable extends CI_Model {
	
	private $table;
	private $columns;
	private $order;

	public function __construct() {
		$this->load->database();
	}

	public function core_data($data) {
		$this->table = $data['table'];
		$this->columns = $data['columns'];
		$this->order = $data['order'];
	}

	private function count_all_data() {
		return $this->db
		->select("*")
		->from($this->table)
		->count_all_results();
	}

	public function exec_query() {
		$this->db->select($this->columns);
		$this->db->from($this->table);

		// set order dan pencarian

		if(isset($_POST['search']['value']))
			$this->db->like(array_values(array_filter($this->order))[0], $_POST['search']['value']);
		if(isset($_POST['order']))
			$this->db->order_by($this->order_column[$_POST['order'][0]['column']], $this->order_column[$_POST['order'][0]['dir']]);
		else 
			$this->db->order_by(array_values(array_filter($this->order))[0], "ASC");
		
		// membuat limit table
		if(isset($_POST['length']) > 1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$q = $this->db->get();

		return array(
			"fetch" => $q->result(),
			"filter_data" => $q->num_rows(),
			"count_all" => self::count_all_data()
		);
	}
}

?>