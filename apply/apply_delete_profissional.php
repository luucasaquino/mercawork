<?php
session_start();
require '../vendor/autoload.php';
use App\Bd\EntidadeProfissional;
use App\Bd\EntidadeUsuario;

$profissional = new EntidadeProfissional;
$usuario = new EntidadeUsuario;

 $profissional->delete($_SESSION['login']);
 $usuario->delete($_SESSION['login']);
 header('location: ../view/login.php');