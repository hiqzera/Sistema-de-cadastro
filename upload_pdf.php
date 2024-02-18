<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['pdf']) && $_FILES['pdf']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'pdfs/';
        $uploadFile = $uploadDir . basename($_FILES['pdf']['name']);

        $fileType = pathinfo($uploadFile, PATHINFO_EXTENSION);

        if ($fileType === 'pdf') {
            $pdfCount = count(glob($uploadDir . '*.pdf'));

            $maxPdfFiles = 6;

            if ($pdfCount < $maxPdfFiles) {
                if (move_uploaded_file($_FILES['pdf']['tmp_name'], $uploadFile)) {
                    header("Location: /trabalho_mocela/atividade_3/pagina-prin/index.php?success=1");
                    exit;
                } else {
                    echo "Falha ao fazer o upload do arquivo.";
                }
            } else {
                echo "Número máximo de arquivos PDF atingido. Limite: $maxPdfFiles.";
            }
        } else {
            echo "Apenas arquivos PDF são permitidos.";
        }
    } else {
        echo "Erro ao fazer upload do arquivo.";
    }
}
?>
