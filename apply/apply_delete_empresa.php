<?php
session_start();
require '../vendor/autoload.php';
use App\Bd\EntidadeEmpresa;
use App\Bd\EntidadeUsuario;

$empresa = new EntidadeEmpresa;
$usuario = new EntidadeUsuario;

 $empresa->delete($_SESSION['login']);
 $usuario->delete($_SESSION['login']);
 header('location: ../view/login.php');