### Projeto de Vendas de Produtos Digitais.

#### Descrição

Este é um sistema de vendas de produtos digitais desenvolvido com HTML, CSS, PHP e JavaScript, utilizando um banco de dados SQL para armazenar informações de usuários, produtos e transações. O sistema permite que os usuários realizem login ou cadastro, acessem uma tela de produtos, utilizem uma barra de pesquisa, adicionem itens ao carrinho e simulem a finalização da compra.

#### Funcionalidades:

- Tela de login e cadastro: Permite que o usuário escolha entre entrar com uma conta existente ou criar uma nova.

- Redirecionamento pós-login: Dependendo da escolha do usuário, ele será direcionado para a próxima tela.

#### - Tela de produtos:

- Exibição dos produtos disponíveis para venda.

- Barra de pesquisa para facilitar a busca por produtos.

- Informações gerais da loja.

- Carrinho de compras:

- Opção de adicionar produtos ao carrinho.

- Opção de compra direta.

- Opção de remover produtos do carrinho.

- Simulação de compra finalizada: Exibe uma mensagem indicando que a compra foi realizada com sucesso.

#### Tecnologias Utilizadas

- Front-end: HTML, CSS, JavaScript

- Back-end: PHP

- Banco de Dados: SQL (MySQL ou PostgreSQL, a definir)

#### Estrutura do Projeto

```

/vendas-produtos-digitais

/templates
- index.html
- login.html
- cadastro.html
- carrinho.html

/static
- styles.css
- app.js

/database
- database.db

/server
- router.php (analise)
- database.php

```

#### Configuração do Ambiente

1. Clone o repositório:

```sh

git clone https://github.com/seuusuario/vendas-produtos-digitais.git

```

2. Configure o banco de dados SQL e importe o arquivo de criação das tabelas.

3. Inicie um servidor local (ex: XAMPP ou WAMP) e execute o index.php.

#### Contribuição

Caso queira contribuir com o projeto, sinta-se à vontade para abrir issues e pull requests.

#### Fluxo de Trabalho com Branches

Cada um dos 6 colaboradores deve criar uma branch separada para sua tarefa antes de fazer alterações. O fluxo de trabalho será o seguinte:

1. Atualize a branch main localmente:

```sh

git checkout main

git pull origin main

```

2. Crie uma nova branch para sua funcionalidade:

```sh

git checkout -b feature-nome-da-tarefa

```

3. Realize as modificações no código e adicione os arquivos alterados:

```sh

git add .

git commit -m "Descrição breve da funcionalidade"

```

4. Envie sua branch para o repositório remoto:

```sh

git push origin feature-nome-da-tarefa

```

5. Abra um Pull Request (PR) no GitHub para mesclar sua branch na main.

6. Aguarde revisão e aprovação antes de mesclar na main.

Cada colaborador deve seguir esse fluxo para evitar conflitos no código e manter a organização do repositório.

