<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login com Bootstrap</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div>
<img src="imagens/logoweb.png" alt="Seu Logo" class="img-fluid" style="max-width: 1800px;">
</div>
    <div class="container justify-content-center align-items-center">
        <div class="col-md-6 col-lg-6">
            <div class="login-form-container logincontainer p-4 border rounded-3 shadow-sm">
                <h2 class="text-center mb-4">Login</h2>
                <form id="login-form" action="painel.php" method="post">
                    <div class="mb-3">
                        <label for="emailInput" class="form-label">Email</label>
                        <input type="email" class="form-control" id="emailInput" placeholder="seuemail@exemplo.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="passwordInput" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="passwordInput" placeholder="Sua senha" required>
                    </div>
                    <button type="button" class="btn btn-dark">Entrar</button>
                    
                    <div id="error-message" class="text-danger text-center mt-3"></div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>
