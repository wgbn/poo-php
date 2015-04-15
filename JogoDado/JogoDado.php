<?php
namespace JogoDado;

abstract class JogoDado {
    protected $jogador1;
    protected $jogador2;
    protected $vitorias1 = 0;
    protected $vitorias2 = 0;
    protected $empate    = 0;
    
    public function __construct($_jogador1, $_jogador2){
        $this->jogador1 = $_jogador1;
        $this->jogador2 = $_jogador2;
    }
    
    public abstract function getValorDado();
    
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
    
    public function getPlacar(){
        if ($this->vitorias1 > $this->vitorias2)
			return "Vencedor Jogador1 " . $this->jogador1->getNome() . " com $this->vitorias1 vitorias";
		else
			return "Vencedor Jogador2 " . $this->jogador2->getNome() . " com $this->vitorias2 vitorias";
    }
    
    public function toString(){
        $_tmp = "Jogadas: " . ($this->vitorias1 + $this->vitorias2 + $this->empate) . PHP_EOL;
		$_tmp .= "Jogador1(" . $this->jogador1->getNome() . ") = $this->vitorias1 " . PHP_EOL;
		$_tmp .= "Jogador2(" . $this->jogador2->getNome() . ") = $this->vitorias2 " . PHP_EOL;
		$_tmp .= "Empates = $this->empate";
		
		return $_tmp;
    }
}