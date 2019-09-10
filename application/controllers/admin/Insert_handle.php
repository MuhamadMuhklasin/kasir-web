<?php defined("BASEPATH") or exit();

class Insert_handle extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("admin/insert_handle_model", "insert_model");
	}

	private function tambah_menu($post) {
		$post = $this->security->xss_clean($post);
		$post = $this->corelib->escape_string($post);

		$post['harga'] = preg_replace("/\D/", "", $post['harga']);

		return $this->insert_model->tambah_menu($post);
	}

	private function pesanan($post) {
		$post = $this->security->xss_clean($post);
		$post = $this->corelib->escape_string($post);

		return $this->insert_model->pesanan($post);
	}

	private function transaksi($post) {
		$post = $this->security->xss_clean($post);
		$post = $this->corelib->escape_string($post);

		return $this->insert_model->transaksi($post);
	}

	public function touch($func) {
		switch($func) {
			case "tambah_menu" :
				echo self::tambah_menu($_POST);
				break;
			case "pesanan" :
				echo self::pesanan($_POST);
				break;
			case "transaksi" : 
				echo self::transaksi($_POST);
				break;
		}
	}
}

?>