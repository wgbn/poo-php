<?php
namespace ImpostoRenda;

require_once 'ImpostoRenda.php';

class ImpostoCompelto extends ImpostoRenda {

    private $gastoEducacao;
	private $gastoSaude;

	/**
	 * PHP 5 permite que os desenvolvedores declarem métodos construtores
	 * para as classes. Classes que tem um método construtor chamam esse
	 * método cada vez que um objeto novo é criado, então é apropriado para
	 * qualquer inicialização que o objeto possa vir a precisar antes de ser usado.
	 *
	 * Porém a sobrecarga e polimorfismo no PHP se apresentam de maneira diferente
	 * já que simplemente duplicar o método com parâmetros diferentes irá gerar um
	 * erro fatal do tipo 'Fatal error: Cannot redeclare ImpostoCompleto::__construct()'
	 * Sobrecarga e plomorfismo são implementados no PHP num único método que contém
	 * parâmetros OPCIONAIS e DEFAULT, assim, caso um parâmentro seja passado ele será
	 * usado, caso contrário será usado o valor default.
	 *
	 * Desta forma podemos usar tanto
	 *     new ImpostoCompleto(10000, 2015)
	 * quanto
	 *     new ImpostoCompleto(10000, 2015, 1600, 2300)
	 *
	 * @param float   $_rendaBruta             Valor da renda
	 * @param integer $_ano                    Ano da renda
	 * @param float   [$_gastoEducacao = null] Gasto com educação
	 * @param float   [$_gastoSaude    = null] Gasto com saúde
	 */
	public function __construct($_rendaBruta, $_ano, $_gastoEducacao = null, $_gastoSaude = null) {
		parent::__construct($_rendaBruta, $_ano);

        // testa se os valores opcionais foram passados
        if (is_null($_gastoEducacao) || is_null($_gastoSaude)){ // valores omitidos
            $this->gastoEducacao	= $_rendaBruta * .1;
            $this->gastoSaude		= $this->gastoEducacao;
        } else { // valores passados
            $this->gastoEducacao	= $_gastoEducacao;
            $this->gastoSaude		= $_gastoSaude;
        }
	}

	/**
	 * devolve o valor de $gastoEducacao
	 * @return float $gastoEducacao
	 */
	public function getGastoEducacao(){
		return $this->gastoEducacao;
	}

	/**
	 * Devolve o valor de $gastoSaude
	 * @return float $gastoSaude
	 */
	public function getGastoSaude(){
		return $this->gastoSaude;
	}

	/**
	 * Calcula e seta o $valorPagar e devolve o valor com dedução
	 * @return float Valor com dedução
	 */
	public function calculo() {
		if ($this->rendaBruta >= 100000)
			$this->valorPagar = $this->rendaBruta * .27;
		else if ($this->rendaBruta < 50000)
			$this->valorPagar = $this->rendaBruta * .12;
		else
			$this->valorPagar = $this->rendaBruta * .23;

		return $this->valorPagar - $this->gastoEducacao - $this->gastoSaude;
	}
}
