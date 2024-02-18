<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <div class="container">
        <h2 style="margin-bottom: 30rem; position: absolute;">Cadastro de Usuário</h2>
        <form action="processa_cadastro.php" method="post" enctype="multipart/form-data">
            <label for="username" style="padding-bottom: 1rem;">Usuário:</label>
            <input type="text" name="username" id="username" required><br>

            <label for="password">Senha:</label>
            <input type="password" name="password" id="password" required><br>

            <label for="role">Tipo de Usuário:</label>
            <select name="role" id="role" style="font-size: 15px; padding: 0.25rem; display: flex; margin-top: 0.5rem;">
                <option value="administrador">Administrador</option>
                <option value="usuário">Usuário</option>
            </select><br>

            <div class="perfil">
                <label for="avatar">Foto de Perfil:</label>
                <input type="file" name="avatar" id="avatar" accept="uploads/*" style="font-size: 15px; color: #fff; display: flex; margin-top: 0.5rem;"><br>
            </div>


            <input type="submit" value="Cadastrar" style="font-size: 18px; margin-top: 28px; margin-left: 8rem;">
        </form>
    </div>
</body>
</html>

