<?php defined("BASEPATH") Or exit(); 

class Init extends CI_Controller {

	public function __construct(){
		parent::__construct();
		($this->session->has_userdata("id") && $this->session->userdata("akses") == 4) ? true : redirect();
		
		$this->load->model("admin/init_model", "i");
	}

	public function pages($page) {
		$this->load->a_template("admin/".$page);
	}

	private function load_data_pelanggan() {
		return $this->i->load_data_pelanggan();
	}

	private function get_pelanggan($post) {
		$post = $this->security->xss_clean($post);
		$post = $this->corelib->escape_string($post);

		return $this->i->get_pelanggan($post);
	}

	private function update_pelanggan($post) {
		$post = $this->security->xss_clean($post);
		$post = $this->corelib->escape_string($post);

		return $this->i->update_pelanggan($post);
	}

	private function hapus_pelanggan($post) {
		$post = $this->security->xss_clean($post);
		$post = $this->corelib->escape_string($post);

		return $this->i->hapus_pelanggan($post);
	} 

	private function tambah_pelanggan($post) {
		$post = $this->security->xss_clean($post);
		$post = $this->corelib->escape_string($post);

		return $this->i->tambah_pelanggan($post);
	}

	public function touch($func) {
		switch($func) {
			case "load_data_pelanggan" :
				echo self::load_data_pelanggan();
				break;
			case "get_pelanggan" : 
				echo self::get_pelanggan($_POST);
				break;
			case "update_pelanggan" :
				echo self::update_pelanggan($_POST);
				break;
			case "hapus_pelanggan" :
				echo self::hapus_pelanggan($_POST);
				break;
			case "tambah_pelanggan" :
				echo self::tambah_pelanggan($_POST);
				break;
		}
	}

}

?>	