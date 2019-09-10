<?php defined("BASEPATH") or exit();

class Load_handle_model extends CI_model {
	public function __construct() {
		$this->load->database();
	}

	public function load_menu($post) {
		 
		$post = $this->db->escape_str($post);

		$dataTable = function(){
			$d = [
				"table" => "menu",
				"columns" => ["idmenu","namamenu", "harga"],
				"order" => ["namamenu", null, null]
			];

			$this->dt->core_data($d);

			$row = [];

			foreach($this->dt->exec_query()['fetch'] as $data) {
				$sub_row = [];
				$sub_row[] = strtoupper(html_entity_decode(htmlspecialchars_decode($data->namamenu)));
				$sub_row[] = number_format($data->harga, 0, "" ,".");
				$sub_row[] = "<a href='javascript:void(0)' data-id='".$data->idmenu."' id='hapusData' class='btn btn-sm bg-pink waves-effect'>Hapus</a>";
				$sub_row[] = "<a href='javascript:void(0)' data-id='".$data->idmenu."' id='editData' class='btn btn-sm btn-primary waves-effect'>Edit</a>";

				$row[] = $sub_row;
			}

			return json_encode(
				array(
					"draw" => isset($_POST['draw']) ? intval($_POST['draw']) : 0,
					"recordsTotal" => $this->dt->exec_query()['count_all'],
					"recordsFiltered" => $this->dt->exec_query()['filter_data'],
					"data" => $row
				)
			);
		};

		$select2 = function() use ($post) {
			$this->db->select("idmenu as id, namamenu as text");
			$this->db->from("menu");

			if(isset($post['search']))
				$this->db->like("namamenu", $post['search']);

			return json_encode(
				array("items" => $this->db->get()->result(), "pagination" => ["more" => true])
			);
		};

		return ($post['tipe'] == "select2") ? $select2() : $dataTable();
	}

	public function load_part_menu($post) {
		$post = $this->db->escape_str($post);

		$q = $this->db->get_where('menu', $post);

		return json_encode($q->result_array());
	}

	public function load_pesanan($post) {

		$dataTable = function() {
			$d = array(
				"table" => "v_pesanan",
				"columns" => ["idpesanan","kodepesanan","namapelanggan","namamenu", "jumlah", "total", "dibuat"],
				"order" => [null, null, "namapelanggan", null, null, null, null]
			);

			$this->dt->core_data($d);

			$row = [];
			foreach($this->dt->exec_query()['fetch'] as $d) {
				$sub = [];
				$sub[] = $d->idpesanan;
				$sub[] = $d->kodepesanan;
				$sub[] = strtoupper(html_entity_decode(htmlspecialchars_decode($d->namapelanggan)));
				$sub[] = $d->namamenu;
				$sub[] = $d->jumlah;
				$sub[] = number_format($d->total, 0, "", ".");
				$sub[] = date("d-m-Y", strtotime($d->dibuat));
				$sub[] = "<a class='btn btn-sm bg-pink waves-effect' data-action='hapusData' id='".$d->idpesanan."'>Hapus</a>";
				$sub[] = "<a class='btn btn-sm btn-primary waves-effect' data-action='hapusData' id='".$d->idpesanan."'>Edit</a>";

				$row[] = $sub;
			}

			return json_encode(
				array(
					"draw" => isset($_POST['draw']) ? intval($_POST['draw']) : 0,
					"recordsTotal" => $this->dt->exec_query()['count_all'],
					"recordsFiltered" => $this->dt->exec_query()['filter_data'],
					"data" => $row
				)
			);
		};

		$select2 = function() use ($post) {
			$this->db->select("idpesanan as id, namapelanggan as text");
			$this->db->from("v_pesanan");

			if(isset($post['search'])){
				$this->db->like("namapelanggan", $post['search']);
				$this->db->or_like("idpesanan", $post['search']);
			}

			$this->db->order_by("namapelanggan", "ASC");

			$row = [];
			foreach($this->db->get()->result() as $d) {
				$set = [];
				$set["text"] = $d->text." [ ".$d->id." ] ";
				$set['id'] = $d->id;
				$row[] = $set;
			}

			return json_encode([
				"items" => $row,
				"pagination" => ["more" => true]
 			]);
		};

		return isset($post['tipe']) ? $select2() : $dataTable();
	}

	public function part_pesanan($post) {
		$post = $this->db->escape_str($post);

		$q = $this->db->get_where("v_pesanan", $post);
		return json_encode($q->result());
	}

	public function pelanggan($post) {

		$post = $this->db->escape_str($post);

		// for load datable
		$data_table = function() {
			$d = [
				"table" => "pelanggan",
				"columns" => ["idpelanggan", "namapelanggan", "jeniskelamin", "nohp", "alamat"],
				"order" => [null, "namapelanggan", null, null, null]
			];

			$this->dt->core_data($d);

			$row = [];
			foreach($this->dt->exec_query()['fetch'] as $d) {
				$sub = [];

				$sub[] = $d->idpelanggan;
				$sub[] = strtoupper(html_entity_decode(htmlspecialchars_decode($d->namapelanggan)));
				$sub[] = ($d->jeniskelamin > 0) ? "Pria" : "Wanita";
				$sub[] = $d->nohp;
				$sub[] = $d->alamat;

				$row[] = $sub;
			}

			return json_encode(
				array(
					"data" => $row,
					"recordsTotal" => $this->dt->exec_query()["count_all"],
					"recordsFiltered" => $this->dt->exec_query()['filter_data'],
					"draw" => isset($_POST['draw']) ? intval($_POST['draw']) : 0
				)
			);
		};

		// for load select2
		$select2 = function() use ($post) {
			$this->db->select("idpelanggan as id, namapelanggan as text");
			$this->db->from("pelanggan");

			if(isset($post['search']))
				$this->db->like("namapelanggan", $post['search']);

			return json_encode(
				array("items" => $this->db->get()->result(), "pagination" => ["more" => true])
			);
		};

		return ($post['tipe'] == "select2") ? $select2() : $data_table();
	}

	public function part_pelanggan($post) {
		$post = $this->db->escape_str($post);

		$q = $this->db->get_where("pelanggan", $post);

		return json_encode($q->result());
	}

	public function transaksi($post) {
		$post = $this->db->escape_str($post);

		$dataTable = function() {
			$d = [
				"table" => "v_transaksi",
				"columns" => ["idtransaksi", "namapelanggan", "nohp", "alamat", "namamenu", "satuan", "jumlah", "total", "bayar"],
				"order" => [null, "namapelanggan", null, null, null, null, null, null, null]
			];

			$this->dt->core_data($d);

			$row = [];
			foreach($this->dt->exec_query()['fetch'] as $d) {
				$sub = [];
				$sub[] = $d->idtransaksi;
				$sub[] = strtoupper(html_entity_decode(htmlspecialchars_decode($d->namamenu)));;
				$sub[] = $d->nohp;
				$sub[] = $d->alamat;
				$sub[] = $d->namamenu;
				$sub[] = number_format($d->satuan, 0, "", ".");
				$sub[] = $d->jumlah;
				$sub[] = number_format($d->total, 0, "", ".");
				$sub[] = number_format($d->bayar, 0, "", ".");
				$sub[] = "<a href=\"javascript:void(0)\" class=\"btn btn-sm bg-pink waves-effect\" data-action=\"hapusData\" id=\"".$d->idtransaksi."\">Hapus<a/>";
				$sub[] = "<a href=\"javascript:void(0)\" class=\"btn btn-sm btn-primary waves-effect\" data-action=\"editData\" id=\"".$d->idtransaksi."\">Edit<a/>";

				$row[] = $sub;
			}

			return json_encode(
				array(
					"draw" => isset($_POST['draw']) ? intval($_POST['draw']) : 0,
					"recordsTotal" => $this->dt->exec_query()['count_all'],
					"recordsFiltered" => $this->dt->exec_query()['filter_data'],
					"data" => $row
				)
			);
		};

		$select2 = function() use ($post) {

		};

		return isset($post['tipe']) ? $select2() : $dataTable();
 	}
}

?>