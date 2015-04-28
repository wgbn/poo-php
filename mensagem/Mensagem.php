<?php
namespace Mensagem;

abstract class Mensagem {

    /**
    *  No PHP é possível definir valores constantes em cada classe permanecendo a mesma
    *  e imutável. Constantes diferem de variáveis normais no não uso do símbolo $
    *  para declará-las ou usá-las.
    *
    *  O valor deve ser uma expressão constante, não podendo ser (por exemplo) uma
    *  variável, um membro de uma classe, o resultado de uma operação matemática,
    *  ou uma chamada de função.
    **/
	const ABERTA	= 0;
	const ENVIADA	= 1;
	const ERRO		= 2;

	protected $estado;
	protected $conteudo;
	protected $dataHora;
	protected $destinatario;

    /**
     * PHP 5 permite que os desenvolvedores declarem métodos construtores
	 * para as classes. Classes que tem um método construtor chamam esse
	 * método cada vez que um objeto novo é criado, então é apropriado para
	 * qualquer inicialização que o objeto possa vir a precisar antes de ser usado.
	 *
	 * Porém a sobrecarga no PHP se apresenta de maneira diferente
	 * já que simplemente duplicar o método com parâmetros diferentes irá gerar um
	 * erro fatal do tipo 'Fatal error: Cannot redeclare Mensagem::__construct()'
	 * Sobrecarga é implementado no PHP num único método que contém
	 * parâmetros OPCIONAIS e DEFAULT, assim, caso um parâmentro seja passado ele será
	 * usado, caso contrário será usado o valor default.
	 *
     * @param string $newDestinatario Destinatario da mensagem
     * @param string $newConteudo Conteudo da mensagem
     * @param string $newDataHora DataHora da mensagem
     */
	public function __construct($newDestinatario, $newConteudo, $newDataHora){
		$this->estado		= self::ABERTA;
		$this->conteudo		= $newConteudo;
		$this->dataHora		= $newDataHora;
		$this->destinatario	= $newDestinatario;
	}

	public abstract function verifica();

	public function getEstado(){
		return $this->estado;
	}

	public function getConteudo(){
		return $this->conteudo;
	}

	public function getDataHora(){
		return $this->dataHora;
	}

	public function getDestinatario(){
		return $this->destinatario;
	}

	public function enviaMensagem(){
		if (
			$this->verifica() &&
			$this->estado == self::ABERTA &&
			$this->destinatario != ""
		){
			$this->estado = self::ENVIADA;
			return true;
		} else {
			$this->estado = self::ERRO;
			return false;
		}
	}
}
