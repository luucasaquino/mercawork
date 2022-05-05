<?php

namespace App\Bd;

use App\Bd\connections\Conexao;

class EntidadeVaga
{

    public static function getConnection()
    {
        $conexao = new Conexao;
        return $mysqli = $conexao->connect();
    }

    public function insert($cargo, $area, $qtd, $sal, $desc, $dt_fechamento, $id_empresa)
    {
        // INSERIR DADOS NA TABELA PROFISSIONAL
        date_default_timezone_set('America/Sao_Paulo');
        $dt_abertura = date('Y-m-d');
        $insert = "INSERT INTO vaga VALUES (null, '$cargo', '$area', $qtd, $sal, '$desc', '$dt_abertura', '$dt_fechamento', $id_empresa)";
        $mysqli = self::getConnection();
        if ($mysqli->query($insert))
            return true;
        else
            return false;
    }

    public function select($campos, $condicao = '')
    {
        $mysqli = self::getConnection();
        $select = "SELECT $campos FROM vaga $condicao";
        if ($exe = $mysqli->query($select)) {
            return $exe;
        } else {
            return 'erro';
        }
    }

    public function update($cargo, $area, $qtd, $salario, $descricao, $dt_fechamento, $cd_vaga)
    {
        $mysqli = self::getConnection();
        $update = "UPDATE vaga SET
                    cargo = '$cargo',
                    area = '$area',
                    qtd = '$qtd',
                    salario = '$salario',
                    descricao = '$descricao',
                    dt_fechamento = '$dt_fechamento'
                  WHERE cd_vaga = $cd_vaga";
        if ($mysqli->query($update)) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($cd_vaga)
    {
        $mysqli = self::getConnection();
        $delete = "DELETE FROM vaga WHERE
                    cd_vaga = $cd_vaga";
        if ($mysqli->query($delete)) {
            return true;
        } else {
            return false;
        }
    }
}
