# Cookies Uai

<p align="center">
  <img src="assets/images/brand/cookie.jpg" alt="Logo Cookies Uai" width="700">
</p>

## Sobre o projeto

O Cookies Uai é um projeto acadêmico desenvolvido durante o primeiro ano da faculdade. A proposta era criar um site simples utilizando os conhecimentos adquiridos até aquele momento em desenvolvimento web, PHP e banco de dados.

O projeto representa uma pequena loja virtual de cookies. Nele, visitantes podem consultar os produtos disponíveis, criar uma conta e realizar compras. Também existe uma área administrativa para cadastrar, editar e remover produtos.

Este repositório preserva a ideia e a implementação original do trabalho, com uma estrutura de arquivos reorganizada para facilitar sua compreensão e execução.

## Funcionalidades

- Listagem e visualização de produtos;
- Cadastro e autenticação de usuários;
- Registro de compras;
- Atualização do estoque;
- Cadastro, edição e remoção de produtos por administradores;
- Upload de imagens dos produtos.

## Tecnologias utilizadas

- PHP;
- MySQL/MariaDB;
- HTML e CSS;
- Bootstrap 5;
- Bootstrap Icons;
- jQuery e jQuery Mask.

## Estrutura do projeto

```text
├── actions/       # Processamento de formulários e ações do sistema
├── assets/        # Estilos, imagens e favicon
├── config/        # Configurações da aplicação e do banco de dados
├── database/      # Arquivo SQL do projeto
├── includes/      # Cabeçalho, rodapé e validação de acesso
├── pages/         # Páginas públicas e administrativas
└── index.php      # Página inicial
```

## Como executar

### Requisitos

- XAMPP ou ambiente equivalente com Apache, PHP e MySQL/MariaDB;
- PHP 8 ou superior.

### Instalação

1. Clone o repositório dentro da pasta `htdocs` do XAMPP.
2. Inicie os serviços Apache e MySQL.
3. Acesse o phpMyAdmin e crie um banco de dados chamado `cookiesuai`.
4. Importe o arquivo [`database/cookiesuai.sql`](database/cookiesuai.sql).
5. Abra o projeto pelo endereço correspondente no localhost, por exemplo:

```text
http://localhost/projeto_CookiesUai/
```

## Usuários de demonstração

| Perfil | E-mail | Senha |
| --- | --- | --- |
| Administrador | `adm@teste.com` | `adm` |
| Cliente | `client@teste.com` | `client` |

As contas e senhas acima existem apenas para demonstração local do projeto.
