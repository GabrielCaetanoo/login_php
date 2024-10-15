<?php
defined('CONTROL') or die('Acesso Negado!');

//LOGOUT EFETUADO
session_destroy();

header('location: index.php?rota=login');