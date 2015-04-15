<?php
// no PHP não há o método main() nas classes
// basta iniciar o programa num arquivo estatico como este

namespace ImpostoRenda;

/**
* Importa as classes
* Semelhante ao import do Java ou include do C
**/
require_once 'ImpostoCompleto.php';
require_once 'ImpostoSimplificado.php';
require_once 'Pessoa.php';

$p = new Pessoa("Eduardo Jorge", "88777008-45");
$i = new ImpostoCompelto(100000, 2005, 2600, 10000);

$i->processamento(2005);

echo($p->relatorioImostoRenda($i, Pessoa::COMPLETO));

$p1 = new Pessoa("Camila Silva", "900007008-21");

$i1 = new ImpostoSimplificado(50000, 2005);

$i1->processamento(2005);

echo($p1->relatorioImostoRenda($i1, Pessoa::SIMPLIFICADO));
