<?php defined("BASEPATH") or exit();  

require APPPATH."third_party/mpdf/vendor/autoload.php";

class Pdf extends CI_Controller {

	private $mpdf;

	public function __construct() {
		parent::__construct();
		$this->load->model("core/report_model", "rm");
		
		$this->mpdf = new \Mpdf\Mpdf();
	}

	public function export($type) {
		switch ($type) {
			case 'pelanggan':
				return self::export_pelanggan();
				break;
			case 'menu_resto':
				return self::export_menu();
				break;
			case "pesanan" :
				return self::export_pesanan();
				break;
			case "transaksi" :
				return self::export_transaksi();
				break;
		}
	}

	private function export_transaksi() {
		$data = $this->rm->get_data_report(['table' => "v_transaksi", "type" => "all"]);
		$css = file_get_contents("./assets/plugins/bootstrap/css/bootstrap.min.css");

		$h = "";
		$h .= "<h1 class='text-center'>Data transaksi restoran</h1>";
		$h .= "<hr>";
		$h .= "<table class='table table-bordered' width='100%'>";
		$h .= "<thead>";
		$h .= "<tr>";
		$h .= "<th>Pemesan</th>";
		$h .= "<th>Menu pesanan</th>";
		$h .= "<th>Qty</th>";
		$h .= "<th>Satuan (Rp)</th>";
		$h .= "<th>Total (Rp)</th>";
		$h .= "<th>Bayar (Rp)</th>";
		$h .= "<tr>";
		$h .= "</thead>";
		$h .= "<tbody>";
			foreach($data as $d) :
				$h .= "<tr>";
				$h .= "<td>".$d->namapelanggan."</td>";
				$h .= "<td>".$d->namamenu."</td>";
				$h .= "<td>".$d->jumlah."</td>";
				$h .= "<td>".number_format($d->satuan, 0, "", ".")."</td>";
				$h .= "<td>".number_format($d->total, 0, "", ".")."</td>";
				$h .= "<td>".number_format($d->bayar, 0, "", ".")."</td>";
				$h .= "</tr>";
			endforeach;
		$h .= "</tbody>";
		$h .= "</table>";

		$this->mpdf->WriteHTML($css, 1);
		$this->mpdf->WriteHTML($h, 2);
		$this->mpdf->Output();
		exit();
	}

	private function export_pesanan() {
		$data = $this->rm->get_data_report(['table' => "v_pesanan", "type" => "all"]);
		$css = file_get_contents("./assets/plugins/bootstrap/css/bootstrap.min.css");

		$h = "";
		$h .= "<h1 class='text-center'>Data pesanan restoran</h1>";
		$h .= "<hr>";
		$h .= "<table class='table table-bordered' width='100%'>";
		$h .= "<thead>";
		$h .= "<tr>";
		$h .= "<th>Pemesan</th>";
		$h .= "<th>Menu pesanan</th>";
		$h .= "<th>Qty</th>";
		$h .= "<th>Total (Rp)</th>";
		$h .= "<tr>";
		$h .= "</thead>";
		$h .= "<tbody>";
			foreach($data as $d) :
				$h .= "<tr>";
				$h .= "<td>".$d->namapelanggan."</td>";
				$h .= "<td>".$d->namamenu."</td>";
				$h .= "<td>".$d->jumlah."</td>";
				$h .= "<td>".number_format($d->total, 0, "", ".")."</td>";
				$h .= "</tr>";
			endforeach;
		$h .= "</tbody>";
		$h .= "</table>";

		$this->mpdf->WriteHTML($css, 1);
		$this->mpdf->WriteHTML($h, 2);
		$this->mpdf->Output();
		exit();
	}

	private function export_pelanggan() {
		$data = $this->rm->get_data_report(['table' => "pelanggan", "type" => "all"]);
		$css = file_get_contents("./assets/plugins/bootstrap/css/bootstrap.min.css");

		$h = "";
		$h .= "<h1 class='text-center'>Data pelanggan restoran</h1>";
		$h .= "<hr>";
		$h .= "<table class='table table-bordered'>";
		$h .= "<thead>";
		$h .= "<tr>";
		$h .= "<th>Nama Pelanggan</th>";
		$h .= "<th>Jenis Kelamin</th>";
		$h .= "<th>Handphone</th>";
		$h .= "<th>Alamat</th>";
		$h .= "</tr>";
		$h .= "</thead>";
		$h .= "<tbody>";
			foreach($data as $d) :
				$h .= "<tr>";
				$h .= "<td>".$d->namapelanggan."</td>";
				$h .= ($d->jeniskelamin == "1") ? "<td>Pria</td>" : "<td>Wanita</td>";
				$h .= "<td>".$d->nohp."</td>";
				$h .= "<td>".$d->alamat."</td>";
				$h .= "</tr>";	
			endforeach;
		$h .= "</tbody>";
		$h .= "</table>";

		$this->mpdf->WriteHTML($css, 1);
		$this->mpdf->WriteHTML($h, 2);
		$this->mpdf->Output();
		exit();
	}

	private function export_menu() {
		$data = $this->rm->get_data_report(['table' => "menu", "type" => "all"]);
		$css = file_get_contents("./assets/plugins/bootstrap/css/bootstrap.min.css");

		$h = "";
		$h .= "<h1 class='text-center'>Data menu restoran</h1>";
		$h .= "<hr>";
		$h .= "<table class='table table-bordered'>";
		$h .= "<thead>";
		$h .= "<tr>";
		$h .= "<th>Nama Menu</th>";
		$h .= "<th>Harga (Rp)</th>";
		$h .= "</tr>";
		$h .= "</thead>";
		$h .= "<tbody>";
			foreach($data as $d) :
				$h .= "<tr>";
				$h .= "<td>".$d->namamenu."</td>";
				$h .= "<td>".number_format($d->harga, 0, "", ".")."</td>";
				$h .= "</tr>";	
			endforeach;
		$h .= "</tbody>";
		$h .= "</table>";

		$this->mpdf->WriteHTML($css, 1);
		$this->mpdf->WriteHTML($h, 2);
		$this->mpdf->Output();
		exit();
	}

}

?>