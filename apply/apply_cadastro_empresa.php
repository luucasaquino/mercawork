<?php
    session_start();
    require '../vendor/autoload.php';
    use App\Pages\Cadastro;

    $cadastro = new Cadastro;
    $cadastro->cadastrarEmpresa($_POST['nome_fant'], $_POST['cnpj'], 'null', $_SESSION['id_cadastro']);
    header("location: ../view/login.php");