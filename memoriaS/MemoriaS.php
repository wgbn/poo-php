<?php
namespace MemoriaS;

abstract class MemoriaS {

    /**
    *  No PHP é possível definir valores constantes em cada classe permanecendo a mesma
    *  e imutável. Constantes diferem de variáveis normais no não uso do símbolo $
    *  para declará-las ou usá-las.
    *
    *  O valor deve ser uma expressão constante, não podendo ser (por exemplo) uma
    *  variável, um membro de uma classe, o resultado de uma operação matemática,
    *  ou uma chamada de função.
    **/
    const BYTE  = 1;
    const KB    = 2;
	const MB	= 3;
	const GB	= 4;

	protected $total;
	protected $utilizadoKb;
	protected $unidade;

    /**
     * PHP 5 permite que os desenvolvedores declarem métodos construtores
	 * para as classes. Classes que tem um método construtor chamam esse
	 * método cada vez que um objeto novo é criado, então é apropriado para
	 * qualquer inicialização que o objeto possa vir a precisar antes de ser usado.
	 *
	 * Porém a sobrecarga e polimorfismo no PHP se apresentam de maneira diferente
	 * já que simplemente duplicar o método com parâmetros diferentes irá gerar um
	 * erro fatal do tipo 'Fatal error: Cannot redeclare MemoriaS::__construct()'
	 * Sobrecarga e plomorfismo são implementados no PHP num único método que contém
	 * parâmetros OPCIONAIS e DEFAULT, assim, caso um parâmentro seja passado ele será
	 * usado, caso contrário será usado o valor default.
	 *
	 * Desta forma podemos usar tanto
	 *     new MemoriaS(10000)
	 * quanto
	 *     new MemoriaS(10000, MemoriaS::GB)
	 *
     * @param integer $newTotal                Tamanho total
     * @param integer [$newUnidade = self::KB] Unidade de medida
     */
    public function __construct($newTotal, $newUnidade = self::KB){
		$this->utilizadoKb	= 0;
		$this->unidade 		= $newUnidade;
		$this->total		= $this->getConverteKB($newTotal);
	}

	/**
	 * Retorna o espaço disponível em KB
	 * @return integer Espaço disponível
	 */
	protected function getEspacoDisponivelKB(){
		return $this->total - $this->utilizadoKb;
	}

	/**
	 * Retorna o valor em KB
	 * @param  integer _valor valor de entrada
	 * @return integer valor convertido
	 */
	protected function getConverteKB($_valor){
		switch ($this->unidade) {
            case self::BYTE:
                $_valor = $_valor / 1024;
                break;

            case self::MB:
                $_valor = $_valor * 1024;
                break;

            case self::GB:
                $_valor = $_valor * 1048576;
                break;
		}

		return $_valor;
	}

	abstract function getPerda();

	abstract function getEspacoDisponivelRealKB();

	/**
	 * Retrona o valor ustilizado em KB
	 * @return integer $utilizadoKb
	 */
	public function getUtilizadoKB(){
		return $this->utilizadoKb;
	}

	/**
	 * Seta $utilizadoKb e devolve TRUE se há espaço para a nova alocação
	 * ou FALSE se não houver espaço
	 * @param  integer $newTamanho Novo espaço
	 * @return boolean  TRUE|FALSE
	 */
	public function GravaKB($newTamanho){
		if ($this->getEspacoDisponivelRealKB() >= $this->getConverteKB($newTamanho)){
			$this->utilizadoKb += $this->getConverteKB($newTamanho);
			return true;
		} else
			return false;
	}

	/**
	 * Retorna qual a unidade atual
	 * @return string Unidade atual
	 */
	public function getUnidade(){
		$_tmp;

		switch ($this->unidade) {
		case self::BYTE:
			$_tmp = "BYTE";
			break;

		case self::KB:
			$_tmp = "KILOBYTE";
			break;

		case self::MB:
			$_tmp = "MEGABYTE";
			break;

		case self::GB:
			$_tmp = "GIGABYTE";
			break;

		default:
			$_tmp = "";
		}

		return $_tmp;
	}

	/**
	 * Retorna o percentual disponível
	 * @return float Percentual
	 */
	public function getPercentualDisponivel(){
		return ($this->getEspacoDisponivelRealKB() / $this->total) * 100;
	}

	/**
	 * Retorna o estado do objeto
	 * @return string Texto com estado do objeto
	 */
	public function toString(){
		$_tmp = "Percentual Disponível " . $this->getPercentualDisponivel() . "%\n";
		$_tmp .= "Espaço Total $this->total KB\n";
		$_tmp .= "Espaço Disponível Real " . $this->getEspacoDisponivelRealKB() . "KB\n";
		$_tmp .= "Perda " . $this->getPerda() . " %\n";

		return $_tmp;
	}

    /**
     * O método __toString() permite que uma classe decida como se comportar
     * quando for convertida para uma string. Por exemplo, o que echo $obj; irá
     * imprimir. Este método precisa retornar uma string, senão um erro nível
     * E_RECOVERABLE_ERROR é gerado.
     *
     * Vale lembrar que antes do PHP 5.2.0 o método __toString() só era chamado
     * quando diretamente combinado com echo ou print. Desde o PHP 5.2.0, ele é
     * chamado no contexto de string (ex. em printf() com modificador %s) mas
     * não em outros tipos de contextos (e.g. como modificador %d). Desde o
     * PHP 5.2.0, convertendo objetos sem o método __toString() para string
     * causa E_RECOVERABLE_ERROR.
     *
     * @return string Texto com o estado do objeto
     */
    public function __toString(){
        return $this->toString();
    }

}
