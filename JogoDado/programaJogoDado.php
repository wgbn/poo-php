<?php
// no PHP não há o método main() nas classes
// basta iniciar o programa num arquivo estatico como este

namespace JogoDado;

/**
* Importa as classes
* Semelhante ao import do Java ou include do C
**/
require_once 'JogoUmDado.php';
require_once 'JogoDoisDados.php';
require_once 'Jogador.php';

$jogador1 = new Jogador("Eduardo");
$jogador2 = new Jogador("Camila");

$jogo1 = new JogoUmDado($jogador1, $jogador2);
$jogo2 = new JogoDoisDados($jogador1, $jogador2);

$count = 0;

while($count++ < 10){
   echo("$count Jogada " . $jogo1->jogada() . PHP_EOL);
}
echo("Jogo Um Dado " . $jogo1->getPlacar() . PHP_EOL . PHP_EOL);
echo($jogo1 . PHP_EOL . PHP_EOL); // invoca o método __toString() que por sua vez chama o método toString() do objeto

$count = 0;

while($count++ < 10){
   echo("$count Jogada " . $jogo2->jogada() . PHP_EOL);
}
echo("Jogo Dois Dados " . $jogo2->getPlacar() . PHP_EOL . PHP_EOL);
echo($jogo2 . PHP_EOL);

/**
*  PHP_EOL (string)
*  Disponível desde o PHP 4.3.10 e PHP 5.0.2
*  É o símbolo correto 'End Of Line' (quebra de linha) para a plataforma onde o PHP está sendo executado.
**/
