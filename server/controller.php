<!-- Conexão do BDD -->
<?php
header("Content-Type: application/json");
session_start();
require_once "database.php";

var_dump($_POST);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_POST["action"] ?? "";

    if ($action === "register") {
        $nome = $_POST["nome"] ?? "";
        $email = $_POST["email"] ?? "";
        $senha = password_hash($_POST["senha"] ?? "", PASSWORD_DEFAULT);

        $db = new SQLite3("../database/database.db");
        $stmt = $db->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
        $stmt->bindValue(1, $nome, SQLITE3_TEXT);
        $stmt->bindValue(2, $email, SQLITE3_TEXT);
        $stmt->bindValue(3, $senha, SQLITE3_TEXT);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error"]);
        }

        exit;
    }
}
?>
