<?php
class Publicacao extends Projeto{
	
	private $orientador;
	private $curso;
	
	function __construct() {
		parent::__construct();
	}
	
	public function getOrientador() {
		return $this->orientador;
	}
	
	public function setEvento($orientador) {
		$this->orientador = $orientador;
		return $this;
	}
	
	public function getCurso() {
		return $this->curso;
	}
	
	public function setCurso($curso) {
		$this->curso = $curso;
		return $this;
	}
	
}