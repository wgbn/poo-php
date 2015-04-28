<?php
namespace MemoriaS;

require_once 'MemoriaS.php';

class HD extends MemoriaS {

    private $numeroSerie;

	/**
	 * PHP 5 permite que os desenvolvedores declarem métodos construtores
	 * para as classes. Classes que tem um método construtor chamam esse
	 * método cada vez que um objeto novo é criado, então é apropriado para
	 * qualquer inicialização que o objeto possa vir a precisar antes de ser usado.
	 *
	 * Porém a sobrecarga no PHP se apresenta de maneira diferente
	 * já que simplemente duplicar o método com parâmetros diferentes irá gerar um
	 * erro fatal do tipo 'Fatal error: Cannot redeclare HD::__construct()'
	 * Sobrecarga é implementado no PHP num único método que contém
	 * parâmetros OPCIONAIS e DEFAULT, assim, caso um parâmentro seja passado ele será
	 * usado, caso contrário será usado o valor default.
	 *
	 * Desta forma podemos usar tanto
	 *     new HD(10000)
	 * quanto
	 *     new HD(10000, HD::GB)
	 *
	 * @param string  $newNumeroSerie             Numero de serio do HD
	 * @param integer $newTotal                   Tamanho total
	 * @param integer [$newUnidade    = self::KB] Unidade de medida
	 */
	public function __construct($newNumeroSerie, $newTotal, $newUnidade = self::KB) {
		parent::__construct($newTotal, $newUnidade);
		$this->numeroSerie = $newNumeroSerie;
	}

	/**
	 * Retorna a porcentagem de perda
	 * @return float Perda
	 */
	public function getPerda() {
		return ($this->total / 10240) / 100;
	}

	/**
	 * Retorna o espaço disponível real
	 * @return float Espeço real
	 */
	public function getEspacoDisponivelRealKB() {
		return $this->getEspacoDisponivelKB() - (($this->getEspacoDisponivelKB() * $this->getPerda()) / 100);
	}

	/**
	 * Retona o numero de serie
	 * @return string $numeroSerie
	 */
	public function getNumeroSerie(){
		return $this->numeroSerie;
	}

	/**
	 * Retorna o estado do objeto
	 * @return string Texto com estado do objeto
	 */
	public function toString(){
        $_tmp = "HD Número de Serie " . $this->numeroSerie . "\n";
		$_tmp .= "Percentual Disponível " . $this->getPercentualDisponivel() . "%\n";
		$_tmp .= "Espaço Total $this->total KB\n";
		$_tmp .= "Espaço Disponível Real " . $this->getEspacoDisponivelRealKB() . "KB\n";
		$_tmp .= "Espaço utilizado " . $this->getUtilizadoKB() . "\n";
		$_tmp .= "Perda " . $this->getPerda() . "%";

		return $_tmp;
	}

}
