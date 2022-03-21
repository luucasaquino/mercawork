<?php
	class Conexao {
	
	public static function connect(){
	$endereco = "localhost";
	$login = "id18637699_adminonservicehost";
	$senha = "newbdHost@n1";
	$banco = "id18637699_onservicebd";

	$mysqli = new mysqli($endereco , $login, $senha, $banco);
	mysqli_set_charset($mysqli, "utf8");
		return $mysqli;
		}
	}
	
?>