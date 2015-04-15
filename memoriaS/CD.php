<?php
namespace MemoriaS;

require_once 'MemoriaS.php';

class CD extends MemoriaS {

    /**
    *  No PHP é possível definir valores constantes em cada classe permanecendo a mesma
    *  e imutável. Constantes diferem de variáveis normais no não uso do símbolo $
    *  para declará-las ou usá-las.
    *
    *  O valor deve ser uma expressão constante, não podendo ser (por exemplo) uma
    *  variável, um membro de uma classe, o resultado de uma operação matemática,
    *  ou uma chamada de função.
    **/
    const ABERTO  = 1;
	const FECHADO = 0;

	private $estado;

    /**
     * PHP 5 permite que os desenvolvedores declarem métodos construtores
	 * para as classes. Classes que tem um método construtor chamam esse
	 * método cada vez que um objeto novo é criado, então é apropriado para
	 * qualquer inicialização que o objeto possa vir a precisar antes de ser usado.
	 *
	 * Porém a sobrecarga e polimorfismo no PHP se apresentam de maneira diferente
	 * já que simplemente duplicar o método com parâmetros diferentes irá gerar um
	 * erro fatal do tipo 'Fatal error: Cannot redeclare CD::__construct()'
	 * Sobrecarga e plomorfismo são implementados no PHP num único método que contém
	 * parâmetros OPCIONAIS e DEFAULT, assim, caso um parâmentro seja passado ele será
	 * usado, caso contrário será usado o valor default.
	 *
	 * Desta forma podemos usar tanto
	 *     new CD(10000)
	 * quanto
	 *     new CD(10000, CD::GB)
	 *
     * @param integer $newTotal                Tamanho total
     * @param integer [$newUnidade = self::KB] Unidade de medida
     */
	public function __construct($newTotal, $newUnidade = self::KB) {
		parent::__construct($newTotal, $newUnidade);
		$this->estado = self::ABERTO;
	}

	/**
	 * Retorna a perda
	 * @return float Perda
	 */
	public function getPerda() {
		return .98;
	}

	/**
	 * Retorna o espaço disponivel real
	 * @return float Espaço real
	 */
	public function getEspacoDisponivelRealKB() {
		return $this->total * $this->getPerda();
	}

	/**
	 * Grava um novo bloco no espaço disponivel e retorna TRUE se foi
	 * feito ou FALSE se não foi feito
	 * @param  integer newTamanho Tamanho do bloco
	 * @return boolean  TRUE|FALSE
	 */
	public function GravaKB($newTamanho){
		if ($this->estado == self::ABERTO)
			return parent::GravaKB($newTamanho);
		else
			return false;
	}

	/**
	 * Retorna o estado
	 * @return string $estado
	 */
	public function getEstado(){
		if ($this->estado == self::ABERTO)
			return "ABERTO";
		else
			return "FECHADO";
	}

	/**
	 * Retorna o estado do objeto
	 * @return string Texto com estado do objeto
	 */
	public function toString(){
		$_tmp = "CD Estado " . $this->getEstado() . "\n";
		$_tmp .= "Percentual Disponível " . $this->getPercentualDisponivel() . "%\n";
		$_tmp .= "Espaço Total $this->total KB\n";
		$_tmp .= "Espaço Disponível Real " . $this->getEspacoDisponivelRealKB() . "KB\n";
		$_tmp .= "Perda " . (100 - (100 * $this->getPerda())) . "%";

		return $_tmp;
	}
}
