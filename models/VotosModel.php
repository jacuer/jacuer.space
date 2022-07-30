<?php 
//require_once("Model.php");

class VotosModel extends Model {
	
	public function set( $vo_data = array() ) {
		foreach ($vo_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "REPLACE INTO votos SET votacion_id = $votacion_id, voto_candidato = $voto_candidato";
		$this->set_query();
	}

	public function setSuma( $vo_data = array() ) {
		foreach ($vo_data as $key => $value) {
			$$key = $value;
		}
		$resul = $this->get($votacion_id);
		foreach ($resul as $data) {
			$suma = $data['voto_candidato'];
		}
		$suma;

		$voto_candidato = $voto_candidato +$suma;
		//var_dump($_POST);
		$this->query = "REPLACE INTO votos SET votacion_id = $votacion_id, voto_candidato = $voto_candidato";
		$this->set_query();
	}

	public function get( $votacion_id = '' ) {
		$this->query = ($votacion_id != '')
			?"SELECT * FROM votos WHERE votacion_id = $votacion_id"
			:"SELECT * FROM votos";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

	public function getResultados( $voto_candidato = '' ) {
		$this->query = ($voto_candidato != '')
			?"SELECT votacion_id, voto_candidato, candidato_id, aspirante, name FROM votos INNER JOIN candidatos ON votacion_id = candidato_id WHERE voto_candidato = $voto_candidato"
			:"SELECT votacion_id, candidato_id, voto_candidato, aspirante, name, foto FROM votos INNER JOIN candidatos ON votacion_id = candidato_id";
		
		
			$this->get_query();

			$num_rows = count($this->rows); 
	
			$data = array();
			
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

	public function del( $vo = '' ) {
		$this->query = "DELETE FROM votos WHERE votacion_id = $vo";
		$this->set_query();
	}

	public function __destruct() {
		unset($this->model);
	}
}