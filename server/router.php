<!-- Roteador da Aplicação -->

<?php
session_start();

$page = $_GET["page"] ?? "index";

$private_pages = ["carrinho", "vendas"];

if (in_array($page, $private_pages) && !isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit;
}

$file = __DIR__ . "/../templates/" . $page . ".php";

if (file_exists($file)) {
    readfile($file);
} else {
    http_response_code(404);
    echo "Página não encontrada!";
}
?>