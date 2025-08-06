<?php

    define('HOST', 'localhost');
    define('USUARIO', 'root');
    define('SENHA', '');
    define('BANCO', 'piwebprojeto');

    $conexao = mysqli_connect(HOST, USUARIO, SENHA, BANCO) or die ('Não foi possível conectar ao banco de dados');

?>