<?php
//require_once("../models/AlumnosModel.php");

//A nivel de caracteristicas estos métodos deben cumplir los mismos criterios replicar exactamente lo mismo de StatusModel
//En el MVC StatusController no tiene que saber ABSOLUTAMENTE NADA de la base de datos

class AlumnosController {
	private $model;

	public function __construct() {
		$this->model = new AlumnosModel();
	}

	public function set( $al_data = array() ) {
		return $this->model->set($al_data);
	}

	public function get( $pass_token = '' ) {
		return $this->model->get($pass_token);
	}

	public function del( $pass_token = '' ) {
		return $this->model->del($pass_token);
	}

	public function __destruct() {
		unset($this->model);
	}
}