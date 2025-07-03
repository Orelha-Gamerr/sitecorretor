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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <style>
        #map {
            display: block;
            position: static; 
            height: 66vh;
            width: 100%;
        }
    </style>
</head>
<body>

<body class="bg-light">
    <header class="top-header mb-0">
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
            <li><a href="./admin/index.php">Admin</a></li>
        </ul>
        </nav>
    </header>

    <div class="container py-0 corpo-site mt-0" style="margin-top: 120px !important;">

        <div id="map"></div>
        <script>
        // Coordenadas do centro do mapa (ex: Chapecó-SC)
        var map = L.map('map').setView([-27.090, -52.615], 13);

        // Camada de mapa do OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 17,
        }).addTo(map);

        // Adicionando um marcador
        L.marker([-27.100, -52.615]).addTo(map)
            .bindPopup('Atendimento em Chapecó e Região!')
            .openPopup();
        </script>
    </div>

        <?php include_once "./footer.php"; ?>

