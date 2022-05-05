<?php

namespace App\Bd;

use App\Bd\connections\Conexao;


class EntidadeEmpresa
{
    public static function getConnection()
    {
        $conexao = new Conexao;
        return $mysqli = $conexao->connect();
    }
    public function insert($nome, $cnpj, $id_endereco, $t)
    {
        // INSERIR DADOS NA TABELA PROFISSIONAL
        $insert = "INSERT INTO empresa VALUES (null, '$nome', '$cnpj', $id_endereco, $t)";
        $mysqli = self::getConnection();
        if ($mysqli->query($insert))
            return true;
        else
            return false;
    }

    public function select($campos, $condicao = '')
    {
        $mysqli = self::getConnection();
        $select = "SELECT $campos FROM empresa $condicao";
        if ($exe = $mysqli->query($select)) {
            $row = $exe->fetch_object();
            return $row;
        } else {
            return 'erro';
        }
    }
    public function update($nome, $cnpj, $cd_empresa)
    {
        $mysqli = self::getConnection();
        $update = "UPDATE empresa SET
                    nome = '$nome',
                    cnpj = '$cnpj'
                  WHERE cd_empresa = $cd_empresa";
        if ($mysqli->query($update)) {
            return 'deu bom';
        } else {
            return 'erro';
        }
    }
    public function delete($id_usuario)
    {
        $mysqli = self::getConnection();
        $delete = "DELETE FROM empresa WHERE
                    id_usuario = $id_usuario";
        if ($mysqli->query($delete)) {
            return 'deu bom';
        } else {
            return 'erro';
        }

    }
}
