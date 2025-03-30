    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Atualizando o link do Bootstrap para a versão correta -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Bem-vindo</title>
    </head>
    <body>

    <!-- Botão para abrir o modal de login -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModalLogin">
    Login
</button>

<!-- Modal de login -->
<div class="modal fade" id="myModalLogin" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Faça seu Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                 <form id="formLogin" method="POST">
                    <input type="hidden" name="action" value="login">
                    <input type="email" name="email" placeholder="E-mail" required>
                    <br><br>
                    <input type="password" name="senha" placeholder="Senha" required>
                    <br><br>
                    <button type="submit">Entrar</button>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!-- Botão para abrir o modal de cadastro -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModalCadastro">
    Cadastro
</button>

<!-- Modal de cadastro -->
<div class="modal fade" id="myModalCadastro" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Faça seu Cadastro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formCadastro" method="POST">
                    <input type="text" name="nome" placeholder="Nome" required>
                    <input type="email" name="email" placeholder="E-mail" required>
                    <input type="password" name="senha" placeholder="Senha" required>
                    <button type="submit">Cadastrar</button>
                    </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>


        <!-- Scripts necessários para o funcionamento do Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
    </body>
    </html>
