<?php
//require_once("../models/UsersModel.php");

//A nivel de caracteristicas estos métodos deben cumplir los mismos criterios replicar exactamente lo mismo de StatusModel
//En el MVC StatusController no tiene que saber ABSOLUTAMENTE NADA de la base de datos

class ReporteController {
	private $model;

	public function __construct() {
		$this->model = new UsersModel();
	}

	public function set( $user_data = array() ) {
		return $this->model->set($user_data);
	}

	public function get( $user = '' ) {
		return $this->model->get($user);
	}

	public function del( $user = '' ) {
		return $this->model->del($user);
	}

	public function __destruct() {
		unset($this->model);
	}
}