document.addEventListener("DOMContentLoaded", () => {
    console.log("Script carregado!");

    const formCadastro = document.getElementById("formCadastro");

    if (formCadastro) {
        formCadastro.addEventListener("submit", async (e) => {
            e.preventDefault(); // Impede o comportamento padrão do formulário

            const formData = new FormData(formCadastro);
            formData.append("action", "register");

            try {
                const response = await fetch("../server/controller.php", {
                    method: "POST",
                    body: formData
                });

                const result = await response.json();
                console.log(result);

                document.getElementById("mensagemCadastro").textContent = 
                    result.status === "success" ? "Cadastro realizado com sucesso!" : "Erro ao cadastrar.";
            } catch (error) {
                console.error("Erro ao enviar requisição:", error);
            }
        });
    } else {
        console.error("Elemento #formCadastro não encontrado.");
    }
});

const formLogin = document.getElementById("formLogin");

if (formLogin) {
    formLogin.addEventListener("submit", async (e) => {
        e.preventDefault();
        
        const formData = new FormData(formLogin);
        formData.append("action", "login");

        const response = await fetch("../server/controller.php", {
            method: "POST",
            body: formData
        });

        const result = await response.json();
        if (result.status === "success") {
            window.location.href = "router.php?page=vendas";
        } else {
            document.getElementById("mensagemLogin").textContent = "E-mail ou senha incorretos.";
        }
    });
}