<?php
    session_start();
    require '../vendor/autoload.php';
    use App\Pages\Cadastro;

    $cadastro = new Cadastro;
    $cadastro->cadastrarProfissional($_POST['nome'], $_POST['cpf'], $_POST['dt_nascimento'], $_SESSION['id_cadastro']);
    header("location: ../view/login.php");