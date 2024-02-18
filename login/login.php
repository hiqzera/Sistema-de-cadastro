<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <h2 class="login" style="margin-right: 8rem;">Login</h2>
        <form action="valida_login.php" method="post">
            <label for="username" class="user">Usuário:</label>
            <input type="text" name="username" id="username" required><br>

            <label for="password">Senha:</label>
            <input type="password" name="password" id="password" required class="pw"><br>

            <input type="submit" value="Entrar" class="btn-enter" href="pagina-prin/index.php">

            <a href="/trabalho_mocela/atividade_3/cadastro.php" class="cadastro">Cadastro</a>
        </form>
    </div>
</body>
</html>
