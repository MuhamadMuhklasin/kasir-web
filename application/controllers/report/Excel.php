<?php defined("BASEPATH") or exit(); 


class Excel extends CI_Controller {
	private $excel;

	public function __construct() {
		parent::__construct();
		$this->load->model("core/report_model", "rm");
		require APPPATH."third_party/Excel_report.php";
	
		$this->excel = new Excel_report();
	}

	public function export() {
		switch($_POST['ekspor']) {
			case "pelanggan" :
				echo self::export_pelanggan();
				break;
			case "menu_resto" :
				echo self::export_menu();
				break;
			case "pesanan" :
				echo self::export_pesanan();
				break;
			case "transaksi" :
				echo self::export_transaksi();
				break;
		}
	}

	private function export_transaksi() {
		$data = $this->rm->get_data_report(['type' => "all", "table" => "v_transaksi"]);

		$title = "Data transaksi";

		$sheet = array(
			"A1" => "NAMA PELANGGAN",
			"B1" => "MENU PESANAN",
			"C1" => "JUMLAH BELI",
			"D1" => "HARGA SATUAN (Rp)",
			"E1" => "TOTAL (Rp)",
			"F1" => "BAYAR (Rp)",
		);

		$sheet_value = [];
		$index = 2;
		foreach($data as $d) {
			$sheet_value["A".$index] = $d->namapelanggan;
			$sheet_value["B".$index] = $d->namamenu;
			$sheet_value["C".$index] = $d->jumlah;
			$sheet_value["D".$index] = $d->satuan;
			$sheet_value["E".$index] = $d->total;
			$sheet_value["F".$index] = $d->bayar;
			$index++;
		}

		if($this->excel->do_export(["title" => $title, "sheet" => $sheet , "sheet_value" => $sheet_value]))
			return json_encode(['status' => "ok", "msg" => "Berhasil mengekspor file pesanan"]);
	}

	private function export_pesanan() {
		$data = $this->rm->get_data_report(['type' => "all", "table" => "v_pesanan"]);

		$title = "Data pesanan";

		$sheet = array(
			"A1" => "NAMA PELANGGAN",
			"B1" => "MENU PESANAN",
			"C1" => "JUMLAH BELI",
			"D1" => "HARGA SATUAN",
			"E1" => "TOTAL",
			"F1" => "ALAMAT"
		);

		$sheet_value = [];
		$index = 2;
		foreach($data as $d) {
			$sheet_value["A".$index] = $d->namapelanggan;
			$sheet_value["B".$index] = $d->namamenu;
			$sheet_value["C".$index] = $d->jumlah;
			$sheet_value["D".$index] = $d->satuan;
			$sheet_value["E".$index] = $d->total;
			$sheet_value["F".$index] = $d->alamat;
			$index++;
		}

		if($this->excel->do_export(["title" => $title, "sheet" => $sheet , "sheet_value" => $sheet_value]))
			return json_encode(['status' => "ok", "msg" => "Berhasil mengekspor file pesanan"]);
	}

	private function export_menu() {
		$data = $this->rm->get_data_report(["type" => "all", "table" => "menu"]);

		$title = "Data menu restoran";

		$sheet = array(
			"A1" => "Nama Menu",
			"B1" => "Harga (Rp)"
		);

		$sheet_value = [];
		$index = 2;
		foreach($data as $d) {
			$sheet_value["A".$index] = $d->namamenu;
			$sheet_value["B".$index] = number_format($d->harga, 0, "", ".");
			$index++;
		}
		if($this->excel->do_export(["title" => $title, "sheet" => $sheet, "sheet_value" => $sheet_value]) == true)
			return json_encode(["status" => "ok", "msg" => "Berhasil mengekspor file menu restoran"]);
	}

	private function export_pelanggan() {
		$data = $this->rm->get_data_report(["type" => "all", "table" => "pelanggan"]);
		
		$title = "Data pelanggan kasir ";

		$sheet = array(
			"A1" => "Nama Pelanggan",
			"B1" => "Jenis Kelamin",
			"C1" => "Handphone",
			"D1" => "Alamat"
		);		

		$sheet_value = [];
		$index = 2;
		foreach($data as $d) {
			$sheet_value["A".$index] = $d->namapelanggan;
			$sheet_value["B".$index] = $d->jeniskelamin;
			$sheet_value["C".$index] = $d->nohp;
			$sheet_value["D".$index] = $d->alamat;
			$index++;
		}

		if($this->excel->do_export(["title" => $title, "sheet" => $sheet, "sheet_value" => $sheet_value]) == true)
			return json_encode(["status" => "ok", "msg" => "Berhasil mengekspor file pelanggan"]);
	}
}

?>