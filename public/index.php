<?php

//INICIAR A SESSÃO
session_start();

//CONSTANTE DE CONTROLE
define('CONTROL', true);

//USUARIO LOGADOS
$usuario_logado = $_SESSION['usuario'] ?? null;

//ROTA URL
if(empty($usuario_logado)){
    $rota = 'login';

}else{
    $rota = $_GET['rota'] ?? 'home';
}

//ANALISE DE ROTA
$rotas = [
    'login' => 'login.php',
    'home' => 'home.php'
];

if(!key_exists($rota, $rotas)){
    die('Acesso negado');
}
 
require_once $rotas[$rota];

?>