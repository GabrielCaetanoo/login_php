<?php
defined('CONTROL') or die('Acesso Negado!');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    //VERIFICAR SE O USUARIO E SENHA ESTÃO COLOCADOS
    $usuario = $_POST['usuario'] ?? null;
    $senha = $_POST['senha'] ?? null;
    $erro = null;

    if(empty($usuario) || empty($senha)){
        $erro = 'Preencha todos os campos!';
    }

    // VERICAÇÃO DE USUARIO E SENHA VALIDADOS 
    if(empty($erro)){

        $usuarios = require_once __DIR__ . '/../inc/usuarios.php';

        foreach($usuarios as $user){
            if($user['usuario'] == $usuario && password_verify($senha, $user['senha'])){
                //INICIAR A SESSÃO
                $_SESSION['usuario'] = $usuario;

                //REDIRECIONAR PARA A PÁGINA INICIAL
                header('Location: index.php?rota=home');
            }
        }
        // LOGIN INVALIDO
        $erro = 'Usuário ou senha inválidos!';
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <form action="index.php?rota=login" method="post">
        <h3>Login</h3>
        <div>
            <label for="usuario">Usuário:</label>
            <input type="email" id="usuario" name="usuario">
        </div>
        <div>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha">
        </div>
        <div>
            <button type="submit">Entrar</button>
        </div>
    </form>

    <?php if(!empty($erro)) :  ?>
        <p style="color: red;"><?= $erro ?></p>
    <?php endif; ?>
    
</body>
</html>