<?php defined("BASEPATH") or exit(); 

class MY_loader extends CI_Loader {

	public function a_template($temp , $data = [], $return = FALSE) {
		if($return) {
			$temp .= $this->view("templates/init/header", $data, $return);
			$temp .= $this->view("templates/init/navbar", $data, $return);
			$temp .= $this->view("templates/admin/sidebar", $data, $return);
			$temp .= $this->view($temp, $data, $return);
			$temp .= $this->view("templates/init/footer", $data, $return);
			return $temp;
		}
		else {
			$this->view("templates/init/header", $data);
			$this->view("templates/init/navbar", $data);
			$this->view("templates/admin/sidebar", $data);
			$this->view($temp, $data);
			$this->view("templates/init/footer", $data);
		}

	}

	public function k_template($temp , $data = [], $return = FALSE) {
		if($return) {
			$temp .= $this->view("templates/init/header", $data, $return);
			$temp .= $this->view("templates/init/navbar", $data, $return);
			$temp .= $this->view("templates/kasir/sidebar", $data, $return);
			$temp .= $this->view($temp, $data, $return);
			$temp .= $this->view("templates/init/footer", $data, $return);
			return $temp;
		}
		else {
			$this->view("templates/init/header", $data);
			$this->view("templates/init/navbar", $data);
			$this->view("templates/kasir/sidebar", $data);
			$this->view($temp, $data);
			$this->view("templates/init/footer", $data);
		}

	}

	public function o_template($temp , $data = [], $return = FALSE) {
		if($return) {
			$temp .= $this->view("templates/init/header", $data, $return);
			$temp .= $this->view("templates/init/navbar", $data, $return);
			$temp .= $this->view("templates/owner/sidebar", $data, $return);
			$temp .= $this->view($temp, $data, $return);
			$temp .= $this->view("templates/init/footer", $data, $return);
			return $temp;
		}
		else {
			$this->view("templates/init/header", $data);
			$this->view("templates/init/navbar", $data);
			$this->view("templates/owner/sidebar", $data);
			$this->view($temp, $data);
			$this->view("templates/init/footer", $data);
		}

	}

	public function w_template($temp , $data = [], $return = FALSE) {
		if($return) {
			$temp .= $this->view("templates/init/header", $data, $return);
			$temp .= $this->view("templates/init/navbar", $data, $return);
			$temp .= $this->view("templates/waiter/sidebar", $data, $return);
			$temp .= $this->view($temp, $data, $return);
			$temp .= $this->view("templates/init/footer", $data, $return);
			return $temp;
		}
		else {
			$this->view("templates/init/header", $data);
			$this->view("templates/init/navbar", $data);
			$this->view("templates/waiter/sidebar", $data);
			$this->view($temp, $data);
			$this->view("templates/init/footer", $data);
		}

	}

}

?>