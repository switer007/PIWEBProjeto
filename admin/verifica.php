<?php

session_start();

//verifica se o usuário NÃO está logado
if(!isset($_SESSION['login'])) {
    header('Location: index.php');
    exit();
}

?>