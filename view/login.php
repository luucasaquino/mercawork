<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="POST" action="../apply/apply_login.php">
        <h1>Login</h1>
        Email <input type="email" name="email"><br>
        Senha <input type="password" name="senha"><br><br>
        <input type="submit" name="login" value="LOGAR">
        <br><br>
        <a href="cadastro-inicial.php?t=1">Cadastra-se como profissional</a> |
        <a href="cadastro-inicial.php?t=2">Cadastra-se como empresa</a><br>
        
    </form>
</body>
</html>