<?php
require_once 'Programa.php';

class ProgramaC extends Programa {

	public function __construct(Arquivo $_arquivo) {
		parent::__construct($_arquivo);
	}

	public function compilado() {
		$obj = $this->compiladoObjeto();
		return new Arquivo($obj->getNome(), $obj->getTexto()." código executável", Programa::getTipo(Programa::EXE));
	}

	public function compiladoObjeto(){
		return new Arquivo($this->arquivo->getNome(), $this->arquivo->getTexto()." código objeto", Programa::getTipo(Programa::O));
	}

	public function __toString() {
		return parent::__toString()."\n  Objeto: ".$this->compiladoObjeto()->__toString();
	}

}
