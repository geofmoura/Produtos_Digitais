<?php 
    include('./config/database.php');

    if (isset($_POST['form_action'])) {
        $acao = $_POST['form_action'];

        if ($acao === 'login') {
            // === LOGIN ===
            if (isset($_POST['email']) && isset($_POST['senha'])) {
                $email = trim($_POST['email']);
                $senha = trim($_POST['senha']);

                if (strlen($email) == 0) {
                    echo "O campo de email é obrigatório!";
                } else if (strlen($senha) == 0) {
                    echo "O campo de senha é obrigatório!";
                } else {
                    $email = $mysqli->real_escape_string($email);
                    $senha = $mysqli->real_escape_string($senha);

                    $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
                    $sql_query = $mysqli->query($sql_code) or die("Erro na consulta!: " . $mysqli->error);

                    if ($sql_query->num_rows == 1) {
                        $usuario = $sql_query->fetch_assoc();

                        if (!isset($_SESSION)) {
                            session_start();
                        }

                        $_SESSION['id'] = $usuario['id'];
                        $_SESSION['nome'] = $usuario['nome'];

                        header("Location: ./templates/vendas.php");
                        exit;
                    } else {
                        echo "Usuário ou senha incorretos!";
                    }
                }
            }
        } elseif ($acao === 'cadastro') {
            // === CADASTRO ===
            if (isset($_POST['nome'], $_POST['email'], $_POST['senha'])) {
                $nome = trim($_POST['nome']);
                $email = trim($_POST['email']);
                $senha = trim($_POST['senha']);

                if (strlen($nome) == 0 || strlen($email) == 0 || strlen($senha) == 0) {
                    echo "Todos os campos são obrigatórios!";
                } else {
                    $nome = $mysqli->real_escape_string($nome);
                    $email = $mysqli->real_escape_string($email);
                    $senha = $mysqli->real_escape_string($senha);

                    // Verifica se o e-mail já existe
                    $check_query = "SELECT * FROM usuarios WHERE email = '$email'";
                    $check_result = $mysqli->query($check_query);

                    if ($check_result->num_rows > 0) {
                        echo "Já existe um usuário com esse e-mail!";
                    } else {
                        $insert_query = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
                        if ($mysqli->query($insert_query)) {
                            echo "Cadastro realizado com sucesso!";
                        } else {
                            echo "Erro ao cadastrar: " . $mysqli->error;
                        }
                    }
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Bem Vindo</title>
</head>
<body>
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
                     <input type="hidden" name="form_action" value="login">
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
                 <input type="hidden" name="form_action" value="cadastro">
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