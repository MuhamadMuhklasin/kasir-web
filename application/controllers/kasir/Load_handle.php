<?php defined("BASEPATH") or exit(); 

class Load_handle extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("admin/load_handle_model", "l");
	}

	private function load_menu($post) {
		if(count($post) > 0) {
			$post  = $this->security->xss_clean($post);
			$post = $this->corelib->escape_string($post);
			return $this->l->load_menu($post);
		}
		else {
			return $this->l->load_menu(["tipe" => "datatable"]);
		}
	}

	private function load_part_menu($post) {
		$post = $this->security->xss_clean($post);
		$post = $this->corelib->escape_string($post);

		return $this->l->load_part_menu($post);
	}

	private function pesanan($post) {
		$post = $this->security->xss_clean($post);
		$post = $this->corelib->escape_string($post);

		return $this->l->load_pesanan($post);
	}

	private function pelanggan($post) {
		$post = $this->security->xss_clean($post);
		$post = $this->corelib->escape_string($post);

		return $this->l->pelanggan($post);
	}

	private function part_pelanggan($post) {
		$post = $this->security->xss_clean($post);
		$post = $this->corelib->escape_string($post);

		return $this->l->part_pelanggan($post);
	}

	private function transaksi($post) {
		$post = $this->security->xss_clean($post);
		$post = $this->corelib->escape_string($post);
		return $this->l->transaksi($post);

	}

	private function part_pesanan($post) {
		$post = $this->security->xss_clean($post);
		$post = $this->corelib->escape_string($post);

		return $this->l->part_pesanan($post);
	}

	public function touch($func) {
		switch($func) {
			case "load_menu" :
				echo self::load_menu($_POST);
				break;
			case "load_part_menu" :
				echo self::load_part_menu($_POST);
				break;
			case "pesanan" :
				echo self::pesanan($_POST);
				break;
			case "part_pesanan" :
				echo self::part_pesanan($_POST);
				break;
			case "pelanggan" :
				echo self::pelanggan($_POST);
				break;
			case "part_pelanggan" : 
				echo self::part_pelanggan($_POST);
				break;
			case "transaksi" :
				echo self::transaksi($_POST);
				break;
		}
	}
}

?>