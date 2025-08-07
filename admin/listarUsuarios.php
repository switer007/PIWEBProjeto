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
    <!-- cabeçalho -->
    
    <!-- painel -->
    <section id="painel">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3 text-center">
                    <h2>Painel administrativo</h2>
                    <h3>Olá, <?php echo $_SESSION['login']; ?> </h3><a href="logout.php" class="btn btn-outline-secondary">Sair</a><br>
                </div>
                <div class="col-md-9 border-start border-1 text-center">
                    <p><a href="frmCadastrarUsuarios.php" class="btn btn-dark">Cadastrar usuários</a> <a href="listarUsuarios.php" class="btn btn btn-dark">Listar usuários</a> <a href="frmCadastrarVitrini.php" class="btn btn btn-dark">Cadastrar Vitrini</a> <a href="listarVitrini.php" class="btn btn btn-dark">Listar vitrini</a></p>
                <!-- LISTA -->
                <h2>Usuários Cadastrados</h2>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Login</th>
                                <th>Senha</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT * FROM usuarios";
                                $usuarios = mysqli_query($conexao, $sql);
                                if (mysqli_num_rows($usuarios) > 0) {
                                    foreach($usuarios as $usuario) {
                                
                            ?>
                            <tr>
                                <td><?= $usuario['idUsuario']?></td>
                                <td><?= $usuario['nomeUsuario']?></td>
                                <td><?= $usuario['emailUsuario']?></td>
                                <td><?= $usuario['loginUsuario']?></td>
                                <td><?= "...".substr($usuario['senhaUsuario'], 10, 8)."..."?></td>
                                <td>
                                    <a href="verUsuario.php?idUsuario=<?= $usuario['idUsuario']?>" class="btn btn-secondary btn-sm">Ver</a>
                                    <a href="frmEditarUsuario.php?idUsuario=<?= $usuario['idUsuario']?>" class="btn btn-success btn-sm">Editar</a>
                                    <form action="frmApagarUsuario.php" method="post">
                                        <button onclick="return confirm('Tem certeza que deseja excluir?')" type="submit" name="apagarUsuario" value="<?= $usuario['idUsuario']?>" class="btn btn-danger btn-sm">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                            }
                                } else {
                                    echo "<h5>Nenhum usuário cadastrado</h5>";
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