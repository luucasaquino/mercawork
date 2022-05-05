<?php

namespace App\Bd;

use App\Bd\connections\Conexao;

class EntidadeUsuario
{

    public static function getConnection()
    {
        $conexao = new Conexao;
        return $mysqli = $conexao->connect();
    }

    public function insert($email, $senha, $telefone, $tipo)
    {
        // INSERIR DADOS NA TABELA USUARIO
        $mysqli = self::getConnection();
        $insert = "INSERT INTO usuario VALUES (null, '$email', '$senha', '$telefone', $tipo)";
        if ($mysqli->query($insert)) {
            return $id = self::selectIdUsuario();
        } else {
            return 'Deu ruim';
        }
    }

    private function selectIdUsuario()
    {
        $mysqli = self::getConnection();
        $select = "SELECT cd_usuario FROM usuario ORDER BY cd_usuario DESC LIMIT 1";
        $exe = $mysqli->query($select);
        $row = $exe->fetch_object();
        return $row->cd_usuario;
    }

    public function select($campos, $condicao = '')
    {
        $mysqli = self::getConnection();

        $select = "SELECT $campos FROM usuario WHERE $condicao";
        $exe = $mysqli->query($select);
        if ($exe->num_rows > 0) {
            $row = $exe->fetch_object();
            return $row;
        } else {
            return 'erro';
        }
        
       
    }

    public function update($email, $telefone, $senha, $cd_usuario)
    {
        $mysqli = self::getConnection();

        $update = "UPDATE usuario SET
        email = '$email',
        telefone = '$telefone',
        senha = '$senha'
      WHERE cd_usuario = $cd_usuario";
        if ($mysqli->query($update)) {
            return 'deu bom';
        } else {
            return 'erro';
        }
    }

    public function delete($cd_usuario)
    {
        $mysqli = self::getConnection();
        $delete = "DELETE FROM usuario WHERE
                    cd_usuario = $cd_usuario";
        if ($mysqli->query($delete)) {
            return 'deu bom';
        } else {
            return 'erro';
        }

    }
}
