<?php
//require_once("../models/AlumnosModel.php");

//A nivel de caracteristicas estos métodos deben cumplir los mismos criterios replicar exactamente lo mismo de StatusModel
//En el MVC StatusController no tiene que saber ABSOLUTAMENTE NADA de la base de datos

class VotosController {
	private $model;

	public function __construct() {
		$this->model = new VotosModel();
	}

	public function set( $voto_data = array() ) {
		return $this->model->set($voto_data);
	}

	public function get( $voto = '' ) {
		return $this->model->get($voto);
	}
	public function setSuma( $voto = '' ) {
		return $this->model->setSuma($voto);
	}
	public function getResultados( $voto = '' ) {
		return $this->model->getResultados($voto);
	}

	public function del( $voto = '' ) {
		return $this->model->del($voto);
	}

	public function __destruct() {
		unset($this->model);
	}
}