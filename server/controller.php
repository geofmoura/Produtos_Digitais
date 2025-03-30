<?php
header("Content-Type: application/json");
session_start();
require_once "database.php";

// Ativar logs detalhados para debug
ini_set('display_errors', 1);
error_reporting(E_ALL);

try {
    $db = new Database();
    $pdo = $db->getPdo();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true) ?? $_POST;
        
        $action = $data["action"] ?? "";

        if ($action === "login") {
            $email = $data["email"] ?? "";
            $senha = $data["senha"] ?? "";

            // Debug: Registrar tentativa de login
            error_log("Tentativa de login para: $email");

            $stmt = $pdo->prepare("SELECT id, email, senha FROM usuarios WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch();

            if ($user) {
                if (password_verify($senha, $user["senha"])) {
                    $_SESSION["user_id"] = $user["id"];
                    $_SESSION["user_email"] = $user["email"];

                    // Debug: Login bem-sucedido
                    error_log("Login bem-sucedido para: $email");

                    echo json_encode([
                        "status" => "success", 
                        "redirect" => "vendas.php",
                        "user" => ["id" => $user["id"], "email" => $user["email"]]
                    ]);
                } else {
                    // Debug: Senha incorreta
                    error_log("Senha incorreta para: $email");
                    echo json_encode([
                        "status" => "error",
                        "message" => "Senha incorreta"
                    ]);
                }
            } else {
                // Debug: Email não encontrado
                error_log("Email não encontrado: $email");
                echo json_encode([
                    "status" => "error",
                    "message" => "Usuário não encontrado"
                ]);
            }
            exit;
        }
    }

    // Se nenhuma ação válida for detectada
    echo json_encode([
        "status" => "error",
        "message" => "Requisição inválida"
    ]);

} catch (PDOException $e) {
    // Log do erro completo
    error_log("Erro no controller: " . $e->getMessage());
    
    echo json_encode([
        "status" => "error",
        "message" => "Erro no servidor",
        "debug" => $e->getMessage()
    ]);
}
?>