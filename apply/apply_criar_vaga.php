<?php
session_start();
require '../vendor/autoload.php';

use App\Bd\EntidadeVaga;
use App\Bd\EntidadeEmpresa;

$vaga = new EntidadeVaga;
$empresa = new EntidadeEmpresa;
$id = $empresa->select("cd_empresa", "WHERE id_usuario = " . $_SESSION['login']);
if (empty($_POST['sal'])) {
    $_POST['sal'] = 0;
}
if ($criar_vaga = $vaga->insert($_POST['cargo'], $_POST['area'], $_POST['qtd'], $_POST['sal'], $_POST['desc'], $_POST['dt_fechamento'], $id->cd_empresa))
    header('location: ../view/empresa/vagas.php');
else
    header('location: ../view/empresa/criar_vaga.php');
