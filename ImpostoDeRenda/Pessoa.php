<?php
namespace ImpostoRenda;

class Pessoa {

    /**
    *  No PHP é possível definir valores constantes em cada classe permanecendo a mesma
    *  e imutável. Constantes diferem de variáveis normais no não uso do símbolo $
    *  para declará-las ou usá-las.
    *
    *  O valor deve ser uma expressão constante, não podendo ser (por exemplo) uma
    *  variável, um membro de uma classe, o resultado de uma operação matemática,
    *  ou uma chamada de função.
    **/
    const COMPLETO	   = 0;
	const SIMPLIFICADO = 1;

	private $nome;
	private $cpf;

	/**
	 * PHP 5 permite que os desenvolvedores declarem métodos construtores
	 * para as classes. Classes que tem um método construtor chamam esse
	 * método cada vez que um objeto novo é criado, então é apropriado para
	 * qualquer inicialização que o objeto possa vir a precisar antes de ser usado.
	 *
	 * Para garantir compatibilidade reversa, se o PHP 5 não conseguir achar
	 * uma __construct() para uma determinada classe, ele procurará pela função
	 * construtora à moda-antiga, que tenha o mesmo nome da classe. Efetivamente,
	 * significa que o único caso que pode gerar problemas de compatibilidade seria
	 * se a classe tiver um método chamado __construct() que fosse usado para
	 * outra finalidade que não inicializar o objeto.
	 *
	 * Nota: Construtores pais não são chamados implicitamente se a classe filha
	 * define um construtor. Para executar o construtor da classe pai, uma chamada
	 * a parent::__construct() dentro do construtor da classe filha é necessária.
	 *
	 * @param string $_nome Nome da pessoa
	 * @param string $_cpf  CPF da pessoa
	 */
	public function __construct($_nome, $_cpf){
		$this->nome = $_nome;
		$this->cpf  = $_cpf;
	}

	/**
	 * Gera um relatório de imposto de renda
	 * @param  object  $i      Objeto do Impoto
	 * @param  integer $tipo   O tipo do imposto (Completo ou Simplificado)
	 * @return string          Texto da delcaração
	 */
	public function relatorioImostoRenda($i, $tipo){
		$temp = '';

		$temp .= "Dados Pessoais \n";
		$temp .= "Nome: $this->nome \n";
		$temp .= "Cpf: $this->cpf \n";
		$temp .= "Dados do Calculo \n";

		if ($tipo == Pessoa::COMPLETO){
			$temp .= "Imposto Completo \n";
			$temp .= "Gastos Com Saúde: " . $i->getGastoSaude() . "\n";
			$temp .= "Gastos Com Educação: " . $i->getGastoEducacao() . "\n";
	   } else {
		   $temp .= "Imposto Simplificado \n";
	   }

	   $temp .= "Renda Bruta: " . $i->getRendaBruta() . "\n";
	   $temp .= "Valor a Pagar: " . $i->calculo() . "\n\n";
	   return $temp;
	}
}
