<?php
ob_start(); // Inicia o buffer de saída para evitar erros de header
session_start();

$page = $_GET["page"] ?? "index";

$private_pages = ["carrinho", "vendas"];


if (isset($_SESSION["user_id"])) {
    header("Location: ../server/router.php?page=vendas");
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
