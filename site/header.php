<?php
$base = "/sitecorretor/site/";
?>

<!DOCTYPE html>
<html lang="pt">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />   
        <title>Formulario de Usuário</title>
    <title>Leandro Lucietto Corretor</title>

    <!-- Estilo principal -->
    <link rel="stylesheet" href="<?= $base ?>config/style.css">

    <!-- Script principal -->
    <script src="<?= $base ?>config/script.js"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= $base ?>imagens/ico/android-chrome-192x192.png" type="image/x-icon">

    
</head>
<body>
 <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand">Sistema de Imóveis</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Início</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../usuario/UsuarioList.php">Usuario</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../imovel/ImovelList.php">Imóveis</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../bairro/BairroList.php">Bairros</a>
        </li>
      </ul>
    </div>
    <a href="../index.php?logout=true" style="float: right;" class="btn btn-danger"><i class="fa-solid fa-right-from-bracket"></i> Sair</a>
  </div>
    
</nav>
<main>