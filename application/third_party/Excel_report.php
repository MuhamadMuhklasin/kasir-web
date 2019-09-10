<?php defined("BASEPATH") or exit(); 

require APPPATH."third_party/phpspreadsheet/vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

class Excel_report{
	private $sheet;
	private $writer;

	public function do_export($data = []) {
		// data
		// 	1. sheet -> fields untuk excel
		// 	2. sheet_value -> value yang akan di gunakan utnuk fields
		// 	3. title -> title untuk file

		$this->sheet = new Spreadsheet();
		
		// set sheet fields
		foreach($data["sheet"] as $key => $val) {
			$this->sheet->getActiveSheet()->setCellValue($key, $val);
		}

		// set sheet value
		foreach($data['sheet_value'] as $key => $val) {
			$this->sheet->setActiveSheetIndex(0)
			->setCellValueExplicit($key, $val, DataType::TYPE_STRING);
		}

		$this->writer = new Xlsx($this->sheet);
		try{
			$this->writer->save("./backup/".$data['title']. " " .date("d-m-y H:i:s").".xlsx");
			return true;
		}
		catch(Exception $e) {
			exit("gagal mengekspor file");
			return false;
		}

	}	
}

?>