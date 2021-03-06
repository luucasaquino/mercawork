<?php

namespace App\Bd;

use App\Bd\connections\Conexao;


class EntidadeProfissional
{
    public static function getConnection()
    {
        $conexao = new Conexao;
        return $mysqli = $conexao->connect();
    }
    public function insert($nome, $cpf, $dt_nascimento, $t)
    {
        // INSERIR DADOS NA TABELA PROFISSIONAL
        $insert = "INSERT INTO profissional VALUES (null, '$nome', '$cpf', '$dt_nascimento', $t)";
        $mysqli = self::getConnection();
        if ($mysqli->query($insert))
            return true;
        else
            return false;
    }

    public function select($campos, $condicao = '')
    {
        $mysqli = self::getConnection();
        $select = "SELECT $campos FROM profissional $condicao";
        if ($exe = $mysqli->query($select)) {
            $row = $exe->fetch_object();
            return $row;
        } else {
            return 'erro';
        }
    }
    public function update($nome, $cpf, $dt_nascimento, $cd_profissional)
    {
        $mysqli = self::getConnection();
        $update = "UPDATE profissional SET
                    nome = '$nome',
                    cpf = '$cpf',
                    dt_nascimento = '$dt_nascimento'
                  WHERE cd_profissional = $cd_profissional";
        if ($mysqli->query($update)) {
            return 'deu bom';
        } else {
            return 'erro';
        }
    }
    public function delete($id_usuario)
    {
        $mysqli = self::getConnection();
        $delete = "DELETE FROM profissional WHERE
                    id_usuario = $id_usuario";
        if ($mysqli->query($delete)) {
            return 'deu bom';
        } else {
            return 'erro';
        }

    }
}
