<?php defined("BASEPATH") or exit(); 

class Delete_handle_model extends CI_Model {
	public function __construct() {
		$this->load->database();	
	}

	public function hapus_menu($post) {
		$post = $this->db->escape_str($post);

		return ($this->db->delete("menu", $post)) ? 
		json_encode(["status" => "ok", "msg" => "Data menu berhasil di hapus"]) :
		json_encode(["status" => "error", $this->db->error()]);
	}	

	public function pesanan($post) {
		$post = $this->db->escape_str($post);

		return ($this->db->delete("pesanan", $post)) ?
		json_encode(["status" => "ok", "msg" => "Data pesanan berhasil di hapus"]) :
		json_encode(["status" => "error", $this->db->error()]);
	}

	public function transaksi($post) {
		$post = $this->db->escape_str($post);

		return ($this->db->delete("transaksi", $post)) ?
		json_encode(["status" => "ok", "msg" => "Data transaksi berhasil di hapus"]) :
		json_encode(["status" => "error", $this->db->error()]);
	}
}

?>