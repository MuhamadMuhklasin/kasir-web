<?php defined("BASEPATH") or exit();

class Init_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function load_data_pelanggan() {
		$d = array(
			"table" => "pelanggan",
			"columns" => ["idpelanggan","namapelanggan", "jeniskelamin", "nohp"],
			"order" => [null, "namapelanggan", null, null]
		);
		$this->dt->core_data($d);

		$row = [];

		foreach($this->dt->exec_query()['fetch'] as $item) {
			$sub_row = [];
			$sub_row[] = $item->idpelanggan;
			$sub_row[] = strtoupper(html_entity_decode(htmlspecialchars_decode($item->namapelanggan)));
			$sub_row[] = ($item->jeniskelamin == 1) ? "Pria" : "wanita";
			$sub_row[] = $item->nohp;
			$sub_row[] = "<a href='javascript:void(0)' id='".$item->idpelanggan."' data-action='#hapus-pelanggan' class='btn btn-danger btn-sm waves-effect'>Hapus</a>";
			$sub_row[] = "<a href='javascript:void(0)' id='".$item->idpelanggan."' data-action='#edit-pelanggan' class='btn btn-primary btn-sm waves-effect'>Edit</a>";

			$row[] = $sub_row;
		}

		return json_encode(
			array(
				"draw" => isset($_POST['draw']) ? intval($_POST['draw']) : 0 ,
				"recordsTotal" => $this->dt->exec_query()['count_all'],
				"recordsFiltered" => $this->dt->exec_query()['filter_data'],
				"data" => $row
			)
		);

	}

	public function get_pelanggan($post) {

		$post = $this->db->escape_str($post);

		$normal_get = function($data = []) {
			return $this->db->select("*")
			->from("pelanggan")
			->limit($data['per_page'], $data['start'])
			->order_by("namapelanggan", "ASC")
			->get()
			->result_array();
		};

		$condition_get = function($data = []) {
			return $this->db->select("*")
			->from("pelanggan")
			->where($data['where'])
			->limit($data['per_page'], $data['start'])
			->order_by("namapelanggan", "ASC")
			->get()
			->result_array();
		};

		switch($post["type"]) {
			case "get_where" :
				$d = [
					"where" => ["idpelanggan" => $post['id']], 
					"per_page" => $post['per_page'],
					"start" => $post['start']
				];

				return json_encode($condition_get($d));
				break;
		}
	}

	public function update_pelanggan($post) {
		$post = $this->db->escape_str($post);

		$this->db->where("idpelanggan", $post['idpelanggan']);
		if($this->db->update("pelanggan", $post)) 
			return json_encode(["status" => "ok", $this->db->error()]);
		else
			return json_encode(["status" => "error", $this->db->error()]);
	}

	public function hapus_pelanggan($post) {
		$post = $this->db->escape_str($post);

		if($this->db->delete("pelanggan", $post)) 
			return json_encode(["status" => "ok", $this->db->error()]);
		else
			return json_encode(["status" => "error", $this->db->error()]);
	}

	public function tambah_pelanggan($post) {
		$post = $this->db->escape_str($post);

		if($this->db->insert("pelanggan", $post))
			return json_encode(["status" => "ok", $this->db->error()]);
		else
			return json_encode(["status" => "error", $this->db->error()]);
	}
}

?>