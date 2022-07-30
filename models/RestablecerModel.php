<?php 
//require_once("Model.php");

class RestablecerModel extends Model {
	
	public function set() {

		$this->query = "UPDATE votos SET voto_candidato = 0 WHERE votacion_id > 0";
		$this->set_query();
	}

	public function setAlumnos() {

		$this->query = "UPDATE alumnos SET voto_alumno = 0 WHERE pass_token !='0'";
		$this->set_query();
	}


	public function get( $user = '' ) {
		$this->query = ($user != '')
			?"SELECT * FROM users WHERE user = '$user'"
			:"SELECT * FROM users";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

	public function del( $user = '' ) {
		$this->query = "DELETE FROM users WHERE user = '$user'";
		$this->set_query();
	}


	public function __destruct() {
		unset($this->model);
	}
}