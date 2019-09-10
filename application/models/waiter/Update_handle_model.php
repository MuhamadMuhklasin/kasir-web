<?php defined("BASEPATH") or exit();  

class Update_handle_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function update_menu($post) {
		$post = $this->db->escape_str($post);

		$this->db->where("idmenu", $post['idmenu']);
		return ($this->db->update("menu", $post)) ?
		json_encode(['status' => "ok", "msg" => "Menu berhasil di update"]) :
		json_encode(['status' => "error", $this->db->error()]);
	}
}

?>