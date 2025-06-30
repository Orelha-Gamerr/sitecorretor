<?php
session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
    <script src="config/cript.js"></script>
        <style type="text/css">
        @import url("config/style.css") all;
        </style>
        <title>Leandro Lucietto Corretor</title>
        <link rel="shortcut icon" href="config/imagens/ico/android-chrome-192x192.png" type="image/x-icon">
</head>
<body>

<body class="bg-light">
    <header class="top-header">
        <div class="profile-container">
        <div class="left-box">
            <img src="config/imagens/ico/android-chrome-192x192.png" alt="Leandro Lucietto" class="profile-img" />
            <div class="nome-cargo">
            <h1>Leandro Lucietto</h1>
            <p class="corretor">Corretor</p>
            </div>
        </div>

        <div class="center-box">
            <p class="especialista">Especialista em compra e venda de imóveis.</p>
            <p class="descricao">Alta performance em atender sua necessidade</p>
        </div>

        <div class="right-box">
            <p>20 anos de experiência em vendas<br><strong>CRECI 44902F</strong></p>
        </div>
        </div>

        <nav class="menu">
        <ul>
            <li><a>Página Inicial</a></li>
            <li><a href="catalogo.html">Encontre seu imóvel</a></li>
            <li><a href="contato.html">Contato</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
        </nav>
    </header>

    <?php include_once "./footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous"></script>
</body>
</html>