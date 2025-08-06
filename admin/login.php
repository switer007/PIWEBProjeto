<?php

session_start();
include("../banco/conexao.php");

//verifica se as variáveis (login e pwd) existem e não são nulas
if (empty($_POST['login']) || empty($_POST['pwd'])) {
    header('Location: index.php');
    exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['login']);
$senha   = mysqli_real_escape_string($conexao, $_POST['pwd']);

$query = "SELECT * FROM usuarios WHERE loginUsuario = '$usuario'";

$result = mysqli_query($conexao, $query);

//retorna o número de linhas da consulta
$row = mysqli_num_rows($result);

//echo $row;

if ($row ==1) {
    //pega o resultado da consulta e coloca em um array associativo
    $dados_banco = mysqli_fetch_assoc($result);
    //senha_banco recebe a senha que está gravada no banco de dados
    $senha_banco = $dados_banco['senhaUsuario'];

//var_dump($senha_banco);

    if (password_verify($senha, $senha_banco)) {
        $_SESSION['login'] = $usuario;
        header('Location: painel.php');
        exit();
    } else {
        //criação de sessão para usuário não autenticado
        $_SESSION['nao_autenticado'] = true;
        header('Location: index.php');
        exit();
    }
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: index.php');
    exit();
}
?>