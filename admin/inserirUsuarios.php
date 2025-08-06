<?php
session_start();
include ("../banco/conexao.php");

if (isset($_POST['cadastroUsuario'])) {
    $nomeUsuario = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $emailUsuario = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $loginUsuario = mysqli_real_escape_string($conexao, trim($_POST['login']));
    $senhaUsuario = mysqli_real_escape_string($conexao, trim($_POST['pwd']));

    $hash = password_hash($senhaUsuario, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nomeUsuario, emailUsuario, loginUsuario, senhaUsuario) VALUES ('$nomeUsuario', '$emailUsuario', '$loginUsuario', '$hash')";

    mysqli_query($conexao, $sql);

    if (mysqli_affected_rows($conexao) > 0) {
        header('Location: frmCadastrarUsuarios.php');
        exit;
    } else {
        header('Location: index.php');
    }
}
?>