<?php defined("BASEPATH") or exit();  

class Insert_handle_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function tambah_menu($post) {
		$post = $this->db->escape_str($post);

		return ($this->db->insert("menu", $post)) ?
		json_encode(["status" => "ok", "msg" => "Menu berhasil di tambahkan"]) :
		json_encode(["status" => "error" , $this->db->error()]);
	}

	public function pesanan($post) {
		$post = $this->db->escape_str($post);

		$post['user_iduser'] = $this->session->userdata("id");
		$post['kodepesanan'] = $this->corelib->rand_text_generator();

		// parsing data pelanggan jika data pelanggan masih baru
		mysqli_query($this->db->conn_id, "call parse_pelanggan(\"".$post['namapelanggan']."\", @proc)");

		foreach(mysqli_query($this->db->conn_id , "select @proc") as $data)
			if($data['@proc'] != null)
				$post['namapelanggan'] = $data['@proc'];

		for($i = 0; $i < count($post['idmenu']); $i++) {

			$data = array(
				"kodepesanan" => $post['kodepesanan'],
				"menu_idmenu" => $post['idmenu'][$i],
				"pelanggan_idpelanggan" => $post['namapelanggan'],
				"user_iduser" => $post['user_iduser'],
				"jumlah" => $post['jumlah'][$i],
				"dibuat"=> date("Y-m-d")
			);

			$this->db->insert("pesanan", $data);

		}

		return json_encode(['status' => "ok", "msg" => "Pesanan telah di tambahkan"]);
	}

	public function transaksi($post) {
		$post = $this->db->escape_str($post);

		unset($post['input-total-bayar']);

		if($this->db->insert("transaksi", $post))
			return json_encode(['status' => "ok"]);
		else
			return json_encode(['status' => "error", "msg" => $this->db->error()]);
	}
	
}

?>