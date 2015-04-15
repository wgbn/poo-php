<?php
namespace JogoDado;

abstract class JogoDado {

    protected $jogador1;
    protected $jogador2;
    protected $vitorias1 = 0;
    protected $vitorias2 = 0;
    protected $empate    = 0;
    
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
        $this->jogador1 = $_jogador1;
        $this->jogador2 = $_jogador2;
    }
    
    abstract public function getValorDado();
    
    /**
     * Faz uma jogada e retorna o resultado
     * @return string Texto do resultado da jogada
     */
    public function jogada(){
        $dado1 = $this->getValorDado();
        $dado2 = $this->getValorDado();
        
        if ($dado1 > $dado2){
            $this->vitorias1++;
            return "Vencedor Jogador1 " . $this->jogador1->getNome() . " Dado1=$dado1 Dado2=$dado2";
        } else if ($dado1 < $dado2){
            $this->vitorias2++;
            return "Vencedor Jogador2 " . $this->jogador2->getNome() . " Dado1=$dado1 Dado2=$dado2";
        } else {
            $this->empate++;
            return "Empate Dado1=$dado1 Dado2=$dado2";
        }
    }
    
    /**
     * Devolve o placar do jogo
     * @return string Texto com placar
     */
    public function getPlacar(){
        if ($this->vitorias1 > $this->vitorias2)
			return "Vencedor Jogador1 " . $this->jogador1->getNome() . " com $this->vitorias1 vitorias";
		else
			return "Vencedor Jogador2 " . $this->jogador2->getNome() . " com $this->vitorias2 vitorias";
    }
    
    /**
     * Devolve o estado do objeto
     * @return string Texto com o estado do objeto
     */
    public function toString(){
        $_tmp = "Jogadas: " . ($this->vitorias1 + $this->vitorias2 + $this->empate) . PHP_EOL;
		$_tmp .= "Jogador1(" . $this->jogador1->getNome() . ") = $this->vitorias1 " . PHP_EOL;
		$_tmp .= "Jogador2(" . $this->jogador2->getNome() . ") = $this->vitorias2 " . PHP_EOL;
		$_tmp .= "Empates = $this->empate";
		
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
