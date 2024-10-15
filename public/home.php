<?php
defined('CONTROL') or die('Acesso Negado!');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App</title>
</head>
<body>
    <h3>Bem-vindo a aplicação</h3>
    <hr>
    <span>Usuario: <strong><?= $_SESSION['usuario'] ?></strong></span>
    <span>
        <a href="index.php?rota=logout">Sair</a>
        <a href="index.php?rota=contato">Contato</a>
        <a href="index.php?rota=sobre">Sobre</a>
    </span>
    
</body>
</html>