<?php
namespace JogoDado;

require_once 'JogoDado.php';

class JogoDoisDados extends JogoDado {
    public function __construct($_jogador1, $_jogador2){
        parent::__construct($_jogador1, $_jogador2);
    }
    
    public function getValorDado(){
        return rand(1,6) + rand(1,6);
    }
}