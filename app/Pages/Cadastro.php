<?php

namespace App\Pages;

use App\Bd\EntidadeProfissional;
use App\Bd\EntidadeEmpresa;
use App\Bd\EntidadeUsuario;

class Cadastro
{
    private function validarDadosUsuario($email, $senha, $telefone, $nivel)
    {
        if (empty($email) || empty($senha) || empty($telefone) || empty($nivel)) {
            $erro = 'É necessário preencher os dados';
            return false;
        } else {
            if (strlen($senha) < 8) {
                $erro = 'A senha deve conter pelo menos 8 caracteres.';
                return false;
            } else if (strlen($telefone) != 11) {
                $erro = 'Telefone não válido.';
                return false;
            } else if ($nivel != 1 || $nivel != 2) {
                return false;
            } else {
                // SE TUDO ESTÁ OK, RETORNA TRUE
                return true;
            }
        }
    }

    public function cadastrarUsuario($email, $senha, $telefone, $nivel){
        $usuario = new EntidadeUsuario;
        if ($insert = $usuario->insert($email, $senha, $telefone, $nivel))
            return $insert;
        else
            return $erro = 'Erro ao cadastrar.';
        
    }

    // CADASTRO PROFISSIONAL
    public function cadastrarProfissional($nome, $cpf, $dt_nascimento, $id)
    {
        $profissional = new EntidadeProfissional;
        if ($insert = $profissional->insert($nome, $cpf, $dt_nascimento, $id))
            return $mensagem = 'Cadastrado com sucesso!';
        else
            return $erro = 'Erro ao cadastrar.';
    }

    // CADASTRO EMPRESA
    public function cadastrarEmpresa($nome, $cnpj, $id_endereco, $id)
    {
        $empresa = new EntidadeEmpresa;
        if ($insert = $empresa->insert($nome, $cnpj, $id_endereco, $id))
            return $mensagem = 'Cadastrado com sucesso!';
        else
            return $erro = 'Erro ao cadastrar.';
    }

    // MÉTODOS PARA VERIFICAÇÕES

    private function verificarIdade($dt_nascimento)
    {

        // VERIFICANDO SE USUÁRIO TEM +18
        $VerificaIdade = explode('/', $dt_nascimento);
        $Ano = $VerificaIdade[0];
        $Mes = $VerificaIdade[1];
        $Dia = $VerificaIdade[2];

        // UNIX timestamp
        $Nascimento = mktime(0, 0, 0, $Dia, $Mes, $Ano);

        // fetch the current date (minus 18 years)
        $Verifica['Dia'] = date('d');
        $Verifica['Mes'] = date('m');
        $Verifica['Ano'] = date('Y') - 18;

        // Timestamp
        $Hoje = mktime(0, 0, 0, $Verifica['Dia'], $Verifica['Mes'], $Verifica['Ano']);

        if ($Nascimento < $Hoje)
            return true;
        else
            return false;
    }
    private function validaCPF($cpf)
    {

        // Extrai somente os números
        $cpf = preg_replace('/[^0-9]/is', '', $cpf);

        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }

        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    }
}
