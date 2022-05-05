<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MercaWork</title>
</head>
<body>
    <form method="POST" action="../apply/apply_cadastro_usuario.php">
        <h1>Credenciais</h1>
        E-mail <input type="email" name="email">
        Senha <input type="password" name="senha">
        Telefone <input type="text" name="telefone">
        <input type="hidden" name="t" value="<?php echo $_GET['t']; ?>">
        <hr>
        <h1>Endereço</h1>
        Logradouro <input type="text" name="logradouro">
        Bairro <input type="text" name="bairro">
        Número <input type="text" name="n">
        Complemento <input type="text" name="complemento">
        País <input type="text" name="pais">
        Estado <input type="text" name="estado">
        Cidade <input type="text" name="cidade">
        <input type="submit" name="cadastrar" value="CADASTRAR">
    </form>
</body>
</html>