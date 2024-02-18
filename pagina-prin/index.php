<?php
session_start();

$user = [
    'username' => isset($_SESSION['username']) ? $_SESSION['username'] : 'Username não definido',
    'avatar' => isset($_SESSION['avatar']) ? $_SESSION['avatar'] : '', // Altere para o valor padrão do avatar
];

if (!isset($_SESSION['username'])) {
    echo "Sessão não está definida.";
} else {
    echo "Usuário logado: " . (isset($user['username']) ? $user['username'] : 'Username não definido');
}

$avatarPath = "/trabalho_mocela/atividade_3/" . $user['avatar'];
?>

<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <title>Página Principal</title>
</head>

<body>
    <div class="container" style="height: 65vh;">
        <h2 style="padding-top: 1rem;">Bem-vindo, <?= $user['username'] ?></h2>
        <img src="<?= $avatarPath ?>" alt="Avatar" style="width: 7rem; height: 7rem; " class="avatar">
        <br/>
        <a href="/trabalho_mocela/atividade_3/login/logout.php" class="sair">Sair</a>
        <br/><br/>
        <form action="/trabalho_mocela/atividade_3/upload_pdf.php" method="post" enctype="multipart/form-data">
            <label for="pdf" class="upload-label">Upload de PDF:</label>
            <input type="file" name="pdf" id="pdf" accept=".pdf" style="margin-bottom: 10px;">
            <input type="submit" value="Enviar" class="upload-btn">
        </form>


        <h3 class="pdf-list-title">Lista de PDFs:</h3>
        <ul class="pdf-list">
            <?php
                $pdfFiles = glob('pdfs/*.pdf');
                if (!empty($pdfFiles)) {
                    foreach ($pdfFiles as $pdf) {
                        $pdfName = basename($pdf);
                        echo "<li><a href='$pdf' target='_blank'>$pdfName</a> - <a href='/trabalho_mocela/atividade_3/excluir_pdf.php?file=$pdfName' class='excluir-link'>Excluir</a></li>";
                    }
                    echo "<a href='/trabalho_mocela/atividade_3/excluir_pdf.php?file=$pdfName' class='excluir-link' style='margin-left: -1rem; display: flex; padding: 1rem;'>Excluir</a>";
                } else {
                    echo '<li class="no-pdf">Nenhum arquivo PDF disponível.</li>';
                }
                if (isset($_GET['success']) && $_GET['success'] == 1) {
                    echo "<p style='color: green;'>PDF enviado com sucesso! Verifique a sua pasta!</p>";
                }
            ?>
        </ul>


<?php if (!empty($pdfName)): ?>
    <a href='excluir_pdf.php?file=<?= $pdfName ?>' class='excluir-link' style="margin-left: -1rem; display: flex; padding: 1rem;">Excluir</a>
<?php endif; ?>


        <?php if ($_SESSION['admin']): ?>
            <a href="/trabalho_mocela/atividade_3/cadastro.php" class="cadastrar" style="left: 46.25rem; float: left; color: #0074c2;">Cadastrar Novo Usuário</a>
        <?php endif; ?>
    </div>
</body>

</html>
