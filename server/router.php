<?php
ob_start(); // Inicia o buffer de saída para evitar erros de header
session_start();

$page = $_GET["page"] ?? "index";

$private_pages = ["carrinho", "vendas"];


if (in_array($page, $private_pages) && !isset($_SESSION["user_id"])) {
    // Se a página for privada e o usuário não estiver logado, redireciona para login
    header("Location: index.php");
    exit;
}


$file = __DIR__ . "/../templates/" . $page . ".php";

if (file_exists($file)) {
    include $file; 
} else {
    http_response_code(404);
    echo "Página não encontrada!";
}

ob_end_flush(); // Libera o buffer de saída
?>
