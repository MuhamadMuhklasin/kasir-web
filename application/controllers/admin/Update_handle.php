<?php defined("BASEPATH") or exit(); 

class Update_handle extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("admin/update_handle_model", "u");
	}

	private function update_menu($post) {
		$post = $this->security->xss_clean($post);
		$post = $this->corelib->escape_string($post);

		$post['harga'] = preg_replace("/\D/", "", $post['harga']);

		return $this->u->update_menu($post);
	}

	private function transaksi($post) {
		$post = $this->security->xss_clean($post);
		$post = $this->corelib->escape_string($post);

		$post['bayar'] = preg_replace("/\D/", "", $post['bayar']);

		return $this->u->transaksi($post);		
	}

	public function touch($func) {
		switch($func) {
			case "update_menu" :
				echo self::update_menu($_POST);
				break;
			case "transaksi" :
				echo self::transaksi($_POST);
				break;
		}
	}
}
	
?>