<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "cadastro_sistema";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexão com o banco de dados falhou: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $storedPassword = $row['password'];

            // Verifique a senha usando password_verify
            if (password_verify($password, $storedPassword)) {
                $_SESSION['username'] = $username;
                $_SESSION['avatar'] = $row['avatar'];
                $_SESSION['admin'] = $row['role'] === 'administrador';
                header("Location: /trabalho_mocela/atividade_3/pagina-prin/index.php");
                exit;
            } else {
                echo "Credenciais inválidas. Tente novamente.";
            }
        } else {
            echo "Credenciais inválidas. Tente novamente.";
        }
    } else {
        echo "Erro na consulta: " . $stmt->error;
    }
}

$conn->close();
?>