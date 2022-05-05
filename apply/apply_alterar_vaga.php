<?php
session_start();
require '../vendor/autoload.php';

use App\Bd\EntidadeVaga;
use App\Bd\EntidadeEmpresa;

$vaga = new EntidadeVaga;
$empresa = new EntidadeEmpresa;
if (empty($_POST['sal'])) {
    $_POST['sal'] = 0;
}
if ($criar_vaga = $vaga->update($_POST['cargo'], $_POST['area'], $_POST['qtd'], $_POST['sal'], $_POST['desc'], $_POST['dt_fechamento'], $_POST['id']))
    header('location: ../view/empresa/vagas.php');
