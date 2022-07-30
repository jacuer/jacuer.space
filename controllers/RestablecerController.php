<?php
//require_once("../models/CandidatosModel.php");

//A nivel de caracteristicas estos métodos deben cumplir los mismos criterios replicar exactamente lo mismo de StatusModel
//En el MVC StatusController no tiene que saber ABSOLUTAMENTE NADA de la base de datos

class RestablecerController {
	private $model;

	public function __construct() {
		$this->model = new RestablecerModel();
	}

	public function set() {
		return $this->model->set();
	}

	public function setAlumnos() {
		return $this->model->setAlumnos();
	}
	public function __destruct() {
		unset($this->model);
	}
}