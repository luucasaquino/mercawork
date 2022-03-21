<?php

namespace App\Bd;

use Conexao;

require 'connections/Conexao.php';

class EntidadeProfissional
{
    public static function getConnection(){
         $conexao = new Conexao;
         return $mysqli = $conexao->connect();
    }
    public function insert($nome, $cpf, $dt_nascimento)
    {
        // INSERIR DADOS NA TABELA PROFISSIONAL
        $insert = "INSERT INTO profissional VALUES (null, '$nome', '$cpf', '$dt_nascimento')";
        $mysqli = self::getConnection();
        if($mysqli->query($insert))
        return true;
        else
        return false;
    }

    public function select()
    {
    }
    public function update()
    {
    }
    public function delete()
    {
    }
}
