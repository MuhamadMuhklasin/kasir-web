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

	public function transaksi($post) {
		$post = $this->db->escape_str($post);

		$data = $this->db->get_where("transaksi", ["idtransaksi" => $post['idtransaksi']]);

		foreach($data->result_array() as $data) {
			$post['kembalian'] = intval($post['bayar']) - intval($data['total']);
			$post['status'] = 1;
		}

		$this->db->where("idtransaksi", $post['idtransaksi']);
		$this->db->update("transaksi", $post);
		return json_encode(['status' => "ok", "msg" => "transaksi selesai"]);
	}
}

?>