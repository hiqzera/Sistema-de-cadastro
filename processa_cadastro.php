<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    if ($_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($_FILES['avatar']['name']);

        $imageFileType = pathinfo($uploadFile, PATHINFO_EXTENSION);
        if (in_array($imageFileType, array('jpg', 'jpeg', 'png', 'gif'))) {
            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile)) {
                $servername = "localhost";
                $dbusername = "root";
                $dbpassword = "";
                $database = "cadastro_sistema";

                $conn = new mysqli($servername, $dbusername, $dbpassword, $database);

                if ($conn->connect_error) {
                    die("Conexão com o banco de dados falhou: " . $conn->connect_error);
                }

                $sql = "INSERT INTO usuarios (username, password, role, avatar) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                $stmt->bind_param("ssss", $username, $hashedPassword, $role, $uploadFile);

                if ($stmt->execute()) {
                    $_SESSION['username'] = $username;
                    $_SESSION['avatar'] = $uploadFile; // Defina o avatar aqui
                    $_SESSION['admin'] = $role === 'administrador';
                    header("Location: login/login.php");
                    exit;
                } else {
                    echo "Erro ao inserir registro: " . $stmt->error;
                }
                
                
            } else {
                echo "Falha ao fazer o upload da imagem.";
            }
        } else {
            echo "Apenas imagens no formato JPG, JPEG, PNG e GIF são permitidas.";
        }
    } else {
        echo "Erro ao fazer upload do arquivo: " . $_FILES['avatar']['error'];
    }
}
?>
