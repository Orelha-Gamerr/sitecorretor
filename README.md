# 🏡 Sistema de Controle de Imóveis

Um sistema simples e eficiente para gerenciamento de imóveis desenvolvido especialmente para corretores independentes. Com ele, é possível cadastrar, editar, visualizar e gerenciar imóveis disponíveis para venda.

## 🚀 Funcionalidades

- Cadastro de imóveis com fotos, descrições, localização e status
- Edição e exclusão de imóveis
- Filtro por tipo (casa, apartamento, terreno, etc.), valor, cidade e status
- Upload de imagens dos imóveis
- Painel de administração
- Responsivo e fácil de usar

## 🛠 Tecnologias utilizadas

- **Backend:** PHP (puro) com MySQL
- **Frontend:** HTML, CSS (Bootstrap), JavaScript
- **Banco de dados:** MySQL
- **Outros:** Font Awesome, jQuery (se aplicável)

## 📦 Estrutura do Projeto

```bash
├── index.php                # Página inicial
├── login.php                # Tela de login
├── dashboard.php            # Painel do corretor
├── imoveis/                 # CRUD dos imóveis
│   ├── cadastrar.php
│   ├── editar.php
│   ├── excluir.php
│   └── visualizar.php
├── includes/
│   ├── db.class.php         # Classe de conexão com o banco
│   ├── header.php
│   └── footer.php
└── uploads/                 # Imagens dos imóveis
