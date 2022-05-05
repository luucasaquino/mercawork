<?php
session_start();
require '../vendor/autoload.php';
use App\Bd\EntidadeVaga;


$vaga = new EntidadeVaga;

 $vaga->delete($_POST['confirmar']);
 header('location: ../view/empresa/vagas.php');