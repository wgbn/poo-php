<?php
require_once 'Programa.php';

class ProgramaJava extends Programa {

	public function __construct(Arquivo $_arquivo) {
		parent::__construct($_arquivo);
	}

	public function compilado() {
		return new Arquivo($this->arquivo->getNome(), $this->arquivo->getTexto()." código class", Programa::getTipo(Programa::CLASSE));
	}

}
