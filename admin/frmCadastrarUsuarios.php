<?php
    include("verifica.php");
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
    <section id="cabecalho">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="../imagens/logoweb.png">
            </div>
            <div class="col-md-8">
                
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
                <div class="col-md-9 border-start border-1">
                    <p><a href="frmCadastrarUsuarios.php" class="btn btn-dark">Cadastrar usuários</a> <a href="listarUsuarios.php" class="btn btn-dark">Listar usuários</a> <a href="frmCadastrarVitrini.php" class="btn btn-dark">Cadastrar Vitrini</a> <a href="listarVitrini.php" class="btn btn-dark">Listar Vitrini</a></p>
                    <h2>Cadastro de Usuários</h2>
                    <div class="col">
                        <form action="inserirUsuarios.php" method="post">
                            <label for="nomeCompleto" class="form-label">Nome Completo</label>
                            <input type="text" name="nome" id="nome" class="form-control"><br>
                            <label for="E-mail" class="form-label">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control"><br>
                            <label for="login" class="form-label">Login</label><br>
                            <input type="text" name="login" id="login" class="form-control"><br>
                            <label for="senha" class="form-label">Senha</label>
                            <input type="password" name="pwd" id="pwd" class="form-control"><br><br>
                            <button type="submit" name="cadastroUsuario" class="btn btn-dark">Cadastrar</button>
                        </form>
                    </div>
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