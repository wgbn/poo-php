<?php
require_once '../Geral.php';
//require_once 'Programa.php';
require_once 'ProgramaJava.php';
require_once 'ProgramaC.php';

class Arquivo extends Geral {

	private $texto;
	private $nome;
	private $extensao;

	public function __construct($_nome, $_texto, $_extensao){
		$this->nome       = $_nome;
		$this->texto      = $_texto;
		$this->extensao   = $_extensao;
	}

	public function getTexto() {
		return $this->texto;
	}

	public function getNome() {
		return $this->nome;
	}

	public function getExtensao() {
		return $this->extensao;
	}

	public function __toString() {
		return "Nome: $this->nome.$this->extensao Texto: $this->texto";
	}

	public static function main(){
		$arquivoJava = new Arquivo("Carro", "public class Carro{ }", Programa::getTipo(Programa::JAVA));
		$programaJava = new ProgramaJava($arquivoJava);

		$aqruivoC = new Arquivo("Soma", "#include stdio.h int x, y ", Programa::getTipo(Programa::C));
		$programaC = new ProgramaC($aqruivoC);

		self::pln($programaJava);
		self::pln($programaC);
	}

}

Arquivo::main();
