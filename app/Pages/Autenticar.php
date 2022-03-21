<?php

namespace App\Pages;

class Autenticar
{

    private function validarLogin($email, $senha)
    {
        // VERIFICAR SE EXISTE OS DADOS NO BANCO DE DADOS

        return true;
    }

    public function efetuarLogin($email, $senha)
    {
        if (Autenticar::validarLogin($email, $senha)) {
            // REDIRECIONAR PARA A PÁGINA INICIAL
            header('Location: caminho da pag');
        } else {
            // DADOS INCORRETOS, EXIBIR A MENSAGEM PARA O USUÁRIO
            $mensagem = 'E-mail ou senha incorreto(s);';
        }
    }

    public static function efetuarLogout(){
        //ENCERRAR SESSÕES E REDIRECIONAR PARA A PÁGINA DE LOGIN
        session_destroy();
        header('Location: ../../view/login.php');
    }
}
