<?php 
//require_once("Model.php");

class CandidatosModel extends Model {

	public function set( $ca_data = array() ) {
		foreach ($ca_data as $key => $value) {
			$$key = $value;
		}
		
		$this->query = "REPLACE INTO candidatos SET candidato_id = $candidato_id, name = '$name', aspirante = '$aspirante', foto = '$foto'";
		$this->set_query();
	}

	public function get( $ca = '' ) {
		$this->query = ($ca != '')
			?"SELECT candidato_id, name, aspirante, foto  FROM candidatos WHERE candidato_id = $ca"
			:"SELECT * FROM candidatos";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}
	
 
	public function del( $ca = '' ) {
		$this->query = "DELETE FROM candidatos WHERE candidato_id = $ca";
		$this->set_query();
	}

	public function __destruct() {
		unset($this->model);
	}
}