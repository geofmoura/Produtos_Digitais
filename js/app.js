document.addEventListener("DOMContentLoaded", function() {
    const loginForm = document.getElementById("formLogin");

    if (loginForm) {
        loginForm.addEventListener("submit", async function(event) {
            event.preventDefault();
            
            // Coletar dados do formulário
            const formData = {
                action: "login",
                email: loginForm.email.value,
                senha: loginForm.senha.value
            };

            console.log("Dados sendo enviados:", formData);

            try {
                const response = await fetch("../server/controller.php", {
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(formData)
                });

                console.log("Resposta recebida (crua):", response);

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const result = await response.json();
                console.log("Resposta parseada:", result);

                if (result.status === "success") {
                    console.log("Redirecionando para:", result.redirect);
                    window.location.href = result.redirect;
                } else {
                    console.error("Erro no login:", result.message);
                    alert(result.message || "Erro ao fazer login");
                }
            } catch (error) {
                console.error("Erro completo:", error);
                alert("Falha na comunicação com o servidor. Verifique o console para detalhes.");
            }
        });
    }
});