<?php
namespace JogoDado;

class Jogador {
    private $nome;
    
    public function __construct($_nome){
        $this->nome = $_nome;
    }
    
    public function getNome(){
        return $this->nome;
    }
}