<?php
// no PHP não há o método main() nas classes
// basta iniciar o programa num arquivo estatico como este

namespace MemoriaS;

/**
* Importa as classes
* Semelhante ao import do Java ou include do C
**/
require_once 'MemoriaS.php';
require_once 'CD.php';
require_once 'HD.php';

$hd = new HD("46327", 10, MemoriaS::MB);
$cd = new CD(650, MemoriaS::MB);

// imprimir numero de serie do objeto hd
echo("No Serie HD: " . $hd->getNumeroSerie() . "\n");
// imprime o percentual de perda do objeto hd
echo("Percent de perda HD: " . $hd->getPerda() . "\n\n");

// imprime estado do objeto cd
echo("Estado CD: " . $cd->getEstado() . "\n\n");

// os metodos polimorficos
echo("Os métodos polimóficos são:\n- getPerda()\n- getEspacoDisponivelRealKB()\n- toString()\n\n");

// testa outros métodos
echo($hd->toString() . "\n\n");
echo($cd . "\n\n");

$hd2 = new HD("125678", 2, HD::GB);
echo($hd2->toString() . "\n\n");
$hd2->GravaKB(1);
echo($hd2 . "\n");
