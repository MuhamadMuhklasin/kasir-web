<?php defined("BASEPATH") or exit(); 

class Delete_handle extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("admin/delete_handle_model", "d");
	}

	private function hapus_menu($post) {
		$post = $this->security->xss_clean($post);
		$post = $this->corelib->escape_string($post);

		return $this->d->hapus_menu($post);
	}

	private function pesanan($post) {
		$post = $this->security->xss_clean($post);
		$post = $this->corelib->escape_string($post);

		return $this->d->pesanan($post);
	} 

	private function transaksi($post) {
		$post = $this->security->xss_clean($post);
		$post = $this->corelib->escape_string($post);

		return $this->d->transaksi($post);
	}

	public function touch($func) {
		switch($func) {
			case "hapus_menu" :
				echo self::hapus_menu($_POST);
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