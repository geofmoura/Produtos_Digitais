<?php
session_start();

// Verifica se o usuário está logado (se a sessão 'nome' existe)
if (!isset($_SESSION['nome'])) {
    // Se não estiver logado, redireciona para a página de login ou define um valor padrão
    header('Location: ../../index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Jogos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #1b2838;
            color: #ffffff;
        }
        .game-header {
            background-color: #171a21;
            padding: 20px;
        }
        .game-carousel {
            background-color: #2a475e;
            border-radius: 5px;
            margin-bottom: 20px;
            overflow: hidden;
        }
        .carousel-item {
            padding: 20px;
        }
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: rgba(0,0,0,0.5);
            border-radius: 50%;
            padding: 20px;
        }
    </style>
</head>
<body>
    <header class="game-header">
        <div class="container">
        <h2 class="mb-0">Boas-vindas, <?php echo isset($_SESSION['nome']) ? htmlspecialchars($_SESSION['nome']) : 'Visitante'; ?>.</h2>
        </div>
    </header>

    <main class="container my-5">
        <!-- Carrossel de Jogos -->
        <section class="game-carousel">
            <div id="gameCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <!-- Jogo 1 -->
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-8">
                                <img src="capa-jogo1.jpg" class="d-block w-100" alt="Jogo 1">
                            </div>
                            <div class="col-md-4 p-4">
                                <h2>Nome do Jogo 1</h2>
                                <p>Descrição do jogo 1. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <div class="d-flex justify-content-between align-items-center mt-4">
                                    <h3>R$ 99,90</h3>
                                    <button class="btn btn-primary">Comprar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Jogo 2 -->
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-8">
                                <img src="capa-jogo2.jpg" class="d-block w-100" alt="Jogo 2">
                            </div>
                            <div class="col-md-4 p-4">
                                <h2>Nome do Jogo 2</h2>
                                <p>Descrição do jogo 2. Nullam auctor, nisl eget ultricies tincidunt.</p>
                                <div class="d-flex justify-content-between align-items-center mt-4">
                                    <h3>R$ 79,90</h3>
                                    <button class="btn btn-primary">Comprar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Jogo 3 -->
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-8">
                                <img src="capa-jogo3.jpg" class="d-block w-100" alt="Jogo 3">
                            </div>
                            <div class="col-md-4 p-4">
                                <h2>Nome do Jogo 3</h2>
                                <p>Descrição do jogo 3. Sed do eiusmod tempor incididunt ut labore.</p>
                                <div class="d-flex justify-content-between align-items-center mt-4">
                                    <h3>R$ 129,90</h3>
                                    <button class="btn btn-primary">Comprar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Controles do Carrossel -->
                <button class="carousel-control-prev" type="button" data-bs-target="#gameCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#gameCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Próximo</span>
                </button>
            </div>
        </section>

        <!-- Seção de Gift Cards -->
        <section class="giftcards mt-5">
            <h2 class="mb-4">Gift Cards</h2>
            <div class="row" id="giftcards-container">
                <!-- Gift Card 1 -->
                <div class="col-md-3 mb-4">
                    <div class="card h-100 bg-dark text-white p-3">
                        <img src="giftcard1.jpg" class="card-img-top" alt="Gift Card R$ 50">
                        <div class="card-body">
                            <h5 class="card-title">Gift Card R$ 50</h5>
                            <button class="btn btn-primary">Comprar</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p>© 2023 Loja de Jogos. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>