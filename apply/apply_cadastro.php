<?php
    require '../vendor/autoload.php';
    use App\Pages\Cadastro;

    $cadastro = new Cadastro;
    echo $cadastro->cadastrarProfissional($_POST['nome'], $_POST['cpf'], $_POST['dt_nascimento']);