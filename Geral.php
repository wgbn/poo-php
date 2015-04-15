<?php

/**
* Classe genérica para implementações PHP-OO em linha de comando
**/
class Geral {

    /**
     * Função que executa a aplicação
     */
    public static function main(){
        // faça acontecer
    }

    /**
     * Implementação curta para o PRINT
     * @param string $str texto a ser impresso
     */
    protected static function p($str){
        echo $str;
    }

    /**
     * Implementação curta para PRINTLN
     * @param string $str texto a ser impresso
     */
    protected static function pln($str){
        echo $str . PHP_EOL;
    }

    /**
     * Função que lê uma string do teclado
     * @return string texto lido
     */
    protected static function getString(){
        return trim(fgets(STDIN));
    }

    /**
     * Função que lê um inteiro
     * @return integer inteiro lido
     */
    protected static function getInt(){
        fscanf(STDIN, "%d", $int);
        return is_numeric($int) ? $int : null;
    }

    /**
     * Função que lê um caracter
     * @return string caracter lido
     */
    protected static function getChar(){
        fscanf(STDIN, "%c", $ch);
        return $ch;
    }

}
