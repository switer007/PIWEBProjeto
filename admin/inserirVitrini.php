<?php

session_start();
include ("../banco/conexao.php");

if(isset($_FILES['fotoNoticia'])) {
    $fotoNoticia = $_FILES['fotoNoticia'];


    if ($fotoNoticia["error"])
        die ("Falha ao enviar o arquivo!");

    if ($fotoNoticia["size"] > 2097152)
        die ("Arquivo muito grande! Máx: 2MB");

    $pasta = "../imagens/noticias/";
    $nomeDoArquivo = $fotoNoticia['name'];
    //var_dump($nomeDoArquivo);
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
    //echo $extensao;
    if ($extensao != 'jpg' && $extensao != 'png')
        die ("Tipo de arquivo não aceito");

    $arquivo = $pasta.$novoNomeDoArquivo.".".$extensao;
    $arquivoOK = move_uploaded_file($fotoNoticia['tmp_name'], $arquivo);
    //echo $arquivoOK;
    if ($arquivoOK)
        if (isset($_POST['cadastroNoticia'])) {
            $textoNoticia  = mysqli_real_escape_string($conexao, trim($_POST['textoNoticia']));
            $sql = "INSERT INTO vitrini (textoVitrini, fotoVitrini) VALUES ('$textoNoticia', '$arquivo')";

            mysqli_query($conexao, $sql);

            if (mysqli_affected_rows($conexao) > 0) {
                $_SESSION['mensagem1'] = 'Notícia cadastrada com sucesso';
                header('Location: frmCadastrarVitrini.php');
                exit;
            } else {
                $_SESSION['mensagem1'] = 'Erro ao cadastrar notícia';
                header('Location: frmCadastrarVitrini.php');
                exit;
            }
        }
} else {
    echo  "<p>Falha ao enviar</p>";
}
?>