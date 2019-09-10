<?php defined("BASEPATH") or exit();  

class Init_model extends CI_Model {

	// 1 = admin,
	// 2 = waiter,
	// 3 = kasir,
	// 4 = owner

	public function __construct() {
		$this->load->database();
	}

	public function auth($post) {
		$post = $this->db->escape_str($post);

		$count = $this->db->get_where("user", $post);
		
		if($count->num_rows()) {
			foreach($count->result_array() as $data) {
				switch($data['akses']) {
					case "1" :
						$this->session->set_userdata("id", $data['iduser']);
						$this->session->set_userdata("akses", $data['akses']);
						$this->session->set_userdata("namauser", $data['namauser']);
						$this->session->set_userdata("namauser", $data['namauser']);
						redirect("admin/p/home");
						break;
					case "2" :
						$this->session->set_userdata("id", $data['iduser']);
						$this->session->set_userdata("akses", $data['akses']);
						$this->session->set_userdata("namauser", $data['namauser']);
						redirect("waiter/p/pesanan");
						break;
					case "3" :
						$this->session->set_userdata("id", $data['iduser']);
						$this->session->set_userdata("akses", $data['akses']);
						$this->session->set_userdata("namauser", $data['namauser']);
						redirect("kasir/p/transaksi");
						break;
					case "4" :
						$this->session->set_userdata("id", $data['iduser']);
						$this->session->set_userdata("akses", $data['akses']);
						$this->session->set_userdata("namauser", $data['namauser']);
						redirect("owner/p/home");
						break;
				}
			}
		}
		else {
			$this->session->set_flashdata("msg", "<div class='msg' style='color:#f43668;'>Username atau password salah !</div>");
			redirect();
		}
	}

	public function c_pass($post) {
		$post = $this->db->escape_str($post);

		$uid = $this->session->userdata("id");

		$cek = $this->db->get_where("user", ['iduser' => $uid]);

		if($cek->num_rows() > 0) {
			$this->db->where("iduser", $uid);
			
			if($this->db->update("user", $post))
				return json_encode(["status" => "ok", "msg" => "Katasandi berhasil di ubah"]);
			else
				return json_encode(["status" => "error", "msg" => $this->db->error()]);
		}
	}

}

?>