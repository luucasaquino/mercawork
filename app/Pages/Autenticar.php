<?php

namespace App\Pages;

use App\Bd\EntidadeUsuario;

class Autenticar
{

    public function efetuarLogin($email, $senha)
    {
        // VERIFICAR SE EXISTE OS DaADOS NO BANCO DE DADOS
        $usuario = new EntidadeUsuario;
        $select = $usuario->select("cd_usuario, email, id_nivel_usuario", "email = '$email' and senha = '$senha'");
        if($select != 'erro'){
            $return = array();
            $login = $select->cd_usuario;
            $email = $select->email;
            $nivel = $select->id_nivel_usuario; // OBS: RETORNAR O NOME DO PROFISSIONAL
            array_push($return, $login);
            array_push($return, $email);
            array_push($return, $nivel);
            return $return;
        }else {
            return 'erro';
        }
    }


    public static function efetuarLogout()
    {
        //ENCERRAR SESSÕES E REDIRECIONAR PARA A PÁGINA DE LOGIN
        session_destroy();
        header('Location: ../../view/login.php');
    }
}
