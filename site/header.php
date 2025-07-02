<?php
$base = "/sitecorretor/site/";
?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
  <link rel="stylesheet" href="<?= $base ?>config/style.css">
  <script src="<?= $base ?>config/script.js"></script>
  <link rel="shortcut icon" href="<?= $base ?>imagens/ico/android-chrome-192x192.png" type="image/x-icon">

  <title>Leandro Lucietto Corretor</title>
</head>
<body>

<!-- Navbar moderna -->
<nav class="navbar navbar-expand-lg navbar-dark bg-warning shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold text-dark"><i></i>Sistema de Imóveis</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon text-dark"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-dark" href="../index.php"><i class="fas fa-home me-1"></i>Início</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="../usuario/UsuarioList.php"><i class="fas fa-user me-1"></i>Usuários</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="../imovel/ImovelList.php"><i class="fas fa-building me-1"></i>Imóveis</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="../bairro/BairroList.php"><i class="fas fa-map-marker-alt me-1"></i>Bairros</a>
        </li>
      </ul>
      <a href="../index.php?logout=true" class="btn btn-outline-dark"><i class="fas fa-sign-out-alt"></i> Sair</a>
    </div>
  </div>
</nav>

<main class="container my-4">
