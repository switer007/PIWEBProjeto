<?php 
    include ("verifica.php");
    include ("../banco/conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notícias NEWS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- Navegação -->
    <section id="navegacao">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../index.html">News!:-)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Notícias</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Regionais ABC
                    </a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Anhembi</a></li>
                    <li><a class="dropdown-item" href="#">Bofete</a></li>
                    <li><a class="dropdown-item" href="#">Conchas</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">São Paulo</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-disabled="true">Agora!</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Painel Administrativo</a>
                </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Busca" aria-label="Search"/>
                    <button class="btn btn-dark" type="submit">Busca</button>
                </form>
            </div>
        </div>
    </nav>
    </section>
    <!-- cabeçalho -->
    <section id="cabecalho">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <img src="../imagens/logoweb.png" width="700px">
            </div>
            <div class="col-md-8">
            </div>
            <div class="col-md-2">
                <div class=" text-center border border-1 rounded p-2 m-3">
                    
                </div>
            </div>
        </div>
        <hr>
    </div>
    </section>
    <!-- painel -->
    <section id="painel">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3 text-center">
                    <h2>Painel administrativo</h2>
                    <h3>Olá, <?php echo $_SESSION['login']; ?> </h3><a href="logout.php" class="btn btn-outline-secondary">Sair</a><br>
                </div>
                <div class="col-md-9 border-start border-1 text-center">
                    <p><a href="frmCadastrarUsuarios.php" class="btn btn-dark">Cadastrar usuários</a> <a href="listarUsuarios.php" class="btn btn-dark">Listar usuários</a> <a href="frmCadastrarVitrini.php" class="btn btn-dark">Cadastrar Vitrini</a> <a href="listarVitrini.php" class="btn btn-dark">Listar Vitrini</a></p>
                <!-- LISTA -->
                <h2>Vitrini Cadastradas</h2>
                <?php
                    if (isset($_SESSION['mensagem_sucesso'])) {
                        echo "<div class='alert alert-sucess'>".$_SESSION['mensagem_sucesso']."</div>";
                        unset($_SESSION['mensagem_sucesso']);
                    }
                ?>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Texto</th>
                                <th>Foto</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT * FROM vitrini";
                                $noticias = mysqli_query($conexao, $sql);
                                if (mysqli_num_rows($noticias) > 0) {
                                    foreach($noticias as $noticia) {
                                
                            ?>
                            <tr>
                                <td><?= $noticia['idVitrini']?></td>
                                <td><?= substr($noticia['textoVitrini'], 0, 100)."..."?></td>
                                <td><img src="<?= $noticia['fotoVitrini']?>" width="100px"></td>
                                <td>
                                    <a href="verNoticia.php?idVitrini=<?= $noticia['idVitrini']?>" class="btn btn-secondary btn-sm">Ver</a>
                                    <a href="frmEditarNoticia.php?idVitrini=<?= $noticia['idVitrini']?>" class="btn btn-success btn-sm">Editar</a>
                                    <form action="frmApagarNoticia.php" method="post">
                                        <button onclick="return confirm('Tem certeza que deseja excluir?')" type="submit" name="apagarNoticia" value="<?= $noticia['idVitrini']?>" class="btn btn-danger btn-sm">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                            }
                                } else {
                                    echo "<h5>Nenhuma notícia cadastrada</h5>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <hr>
        </div>
    </section>
    <!-- rodapé -->
    <section id="rodape">
        <div class="container text-center">
            <p>Copyright © 2025. Orgulhosamente feito com <i class="bi bi-heart-fill"></i> na Terra do Saci.</p>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>