<?php
namespace Mensagem;

require_once 'Mensagem.php';

class Sms extends Mensagem {

    /**
     * PHP 5 permite que os desenvolvedores declarem métodos construtores
	 * para as classes. Classes que tem um método construtor chamam esse
	 * método cada vez que um objeto novo é criado, então é apropriado para
	 * qualquer inicialização que o objeto possa vir a precisar antes de ser usado.
	 *
	 * Porém a sobrecarga no PHP se apresenta de maneira diferente
	 * já que simplemente duplicar o método com parâmetros diferentes irá gerar um
	 * erro fatal do tipo 'Fatal error: Cannot redeclare Sms::__construct()'
	 * Sobrecarga é implementado no PHP num único método que contém
	 * parâmetros OPCIONAIS e DEFAULT, assim, caso um parâmentro seja passado ele será
	 * usado, caso contrário será usado o valor default.
	 *
     * @param string $newDestinatario Destinatario da mensagem
     * @param string $newConteudo Conteudo da mensagem
     * @param string $newDataHora DataHora da mensagem
     */
	public function __construct($newDestinatario, $newConteudo, $newDataHora){
		parent::__construct($newDestinatario, $newConteudo, $newDataHora);
	}

	public function verifica(){
		return (strlen($this->conteudo) <= 20) ? true : false;
	}
}
