<?php

abstract class Programa {

	// constantes
	const JAVA	   = 0;
	const C		   = 1;
	const O		   = 2;
	const EXE      = 3;
	const CLASSE   = 4;

	// atributos
	protected $arquivo;

	public function __construct(Arquivo $_arquivo){
		$this->arquivo = $_arquivo;
	}

	public abstract function compilado();

	public function __toString() {
		return "Programa: ".$this->arquivo->__toString()."\n  Compilado: ".$this->compilado()->__toString();
	}

	public static function getTipo($tipo){
		switch($tipo){
			case Programa::JAVA:
				return "java";
			case Programa::C:
				return "c";
			case Programa::O:
				return "o";
			case Programa::EXE:
				return "exe";
			case Programa::CLASS:
				return "class";
			default:
				return "TIPO INDEFINIDO";
		}
	}

}
