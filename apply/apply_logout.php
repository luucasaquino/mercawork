<?php
session_start();
require '../vendor/autoload.php';
use App\Pages\Autenticar;
$logout = new Autenticar;
$logout-> efetuarLogout();