<?php
namespace Mensagem;

require_once 'Geral.php';
require_once 'Mensagem.php';
require_once 'Email.php';
require_once 'Sms.php';

class Servico extends Geral {
    const EMAIL	= 1;
    const SMS	= 0;

    public static function enviaMensagem($tipo, Mensagem $m){
        if ($m->enviaMensagem()){
            if ($tipo == Servico::EMAIL){
                return "EMAIL;".$m->getDataHora().";".$m->getDestinatario().";".$m->getAssunto().";".$m->getConteudo();
            } else {
                return "SMS;".$m->getDestinatario().";".$m->getConteudo().";".$m->getDataHora();
            }
        } else {
            return "Erro na mensagem";
        }
    }

    public static function main(){
        $servico = new Servico();

        $email = new Email("emjorge@novatec.org","Prova Tópicos II","03/10/2005","Aviso");
        $email1 = new Email("emjorge","Prova Tópicos II","03/10/2005","Aviso");

        $sms = new Sms("9129-2234","A Prova de Tópicos II será na sala 36","03/10/2005");
        $sms1 = new Sms("9129-2234","Prova Tópicos II","03/10/2005");

        self::pln( $servico->enviaMensagem( Servico::SMS, $sms ) );
        self::pln( $servico->enviaMensagem( Servico::EMAIL, $email ) );
        self::pln( $servico->enviaMensagem( Servico::EMAIL, $email1 ) );
        self::pln( $servico->enviaMensagem( Servico::SMS, $sms1 ) );
    }
}

Servico::main();
