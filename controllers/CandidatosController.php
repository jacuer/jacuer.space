<?php
//require_once("../models/CandidatosModel.php");

//A nivel de caracteristicas estos métodos deben cumplir los mismos criterios replicar exactamente lo mismo de StatusModel
//En el MVC StatusController no tiene que saber ABSOLUTAMENTE NADA de la base de datos

class CandidatosController {
	private $model;

	public function __construct() {
		$this->model = new CandidatosModel();
	}

	public function set( $ca_data = array() ) {
		return $this->model->set($ca_data);
	}

	public function get( $candidato_id = '' ) {
		return $this->model->get($candidato_id);
	}

	public function del( $candidato_id = '' ) {
		return $this->model->del($candidato_id);
	}

	public function __destruct() {
		unset($this->model);
	}
}