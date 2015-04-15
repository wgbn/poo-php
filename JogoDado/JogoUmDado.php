<?php
namespace JogoDado;

require_once 'JogoDado.php';

class JogoUmDado extends JogoDado {

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
     * @param object Jogador $_jogador1 Objeto jogador 1
     * @param object Jogador $_jogador2 Objeto jogador 2
     */
    public function __construct(Jogador $_jogador1, Jogador $_jogador2){
        parent::__construct($_jogador1, $_jogador2);
    }
    
    /* Devolve a soma de dois valores aleatórios entre 1 e 6
     * @return integer Soma dos valores
     */
    public function getValorDado(){
        return rand(1,6);
    }
}
