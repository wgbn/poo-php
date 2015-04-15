<?php
// no PHP não há o método main() nas classes
// basta iniciar o programa num arquivo estatico como este

namespace JogoDado;

error_reporting(0); // ocultar erros de avisos somente

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
echo("Jogo Um Dado " . $jogo1->getPlacar() . PHP_EOL);
echo($jogo1->toString() . PHP_EOL);

$count = 0;

while($count++ < 10){
   echo("$count Jogada " . $jogo2->jogada() . PHP_EOL);
}
echo("Jogo Dois Dados " . $jogo2->getPlacar() . PHP_EOL);
echo($jogo2->toString() . PHP_EOL);