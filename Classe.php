<?php

/*
* Classe de exemplo que extende a classe Geral para implementar aplicações CLI
* com PHP de forma mais pratica.
*/
require_once 'Geral.php';

class Classe extends Geral {

    private $nome;
    private $idade;

    /**
     * Seta o nome recebido por parâmentro ou pergunta na linha de comando
     * @param string [$_nome = null] nome
     */
    public function setNome($_nome = null){
        if (is_null($_nome)){
            self::p("Digite novo nome: ");
            $this->nome = self::getString();
        } else
            $this->nome = $_nome;
    }

    /**
     * Seta o idade recebido por parâmentro ou pergunta na linha de comando
     * @param integer [$_idade = null] idade
     */
    public function setIdade($_idade = null){
        if (is_null($_idade)){
            self::p("Digite idade: ");
            $this->idade = self::getInt();
        } else
            $this->idade = $_idade;
    }

    /**
     * Retorna o nome
     * @return string nome
     */
    public function getNome(){
        return $this->nome;
    }

    /**
     * Retorna a idade
     * @return integer idade
     */
    public function getIdade(){
        return $this->idade;
    }

    /**
     * Construtor
     */
    public function __construct(){
        $this->nome = "Fulano de Tal";
        $this->idade = 0;
    }

    /**
     * Método toString a ser exibido quando se da um echo no objeto
     * @return string texto do objeto
     */
    public function __toString(){
        return "Nome: " . $this->getNome() . PHP_EOL . ($this->idade > 0 ? "Idade: " . $this->getIdade() . PHP_EOL : '');
    }

    /**
     * Função de inicialização que simula os das linguagens tradicionais
     */
    public static function main(){
        $c = new Classe;

        self::pln($c);

        $c->setNome("Walter Gandarella");

        self::pln($c);

        $c->setNome();

        self::pln($c);

        $c->setIdade();

        self::pln($c);
    }

}

/*
* Aqui é onde simulamos a execução so método main()
* Sem esta linha o programa não inicia
*/
Classe::main();
