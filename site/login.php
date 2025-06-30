<?php
session_start();

// Se clicou em "Sair"
if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
    session_destroy();
    header("Location: index.php");
    exit();
}

// Já está logado? Vai direto pro painel
if (isset($_SESSION['usuario_id'])) {
    header("Location: dashboard.php");
    exit();
}

include "./db.class.php";

$db = new db('usuario');
$data = null;
$errors = [];
$success = '';

if (!empty($_POST)) {
    $data = (object) $_POST;
    $login = trim($_POST['login'] ?? '');
    $senha = trim($_POST['senha'] ?? '');

    if (empty($login)) {
        $errors[] = "<li>O login é obrigatório</li>";
    }

    if (empty($senha)) {
        $errors[] = "<li>A senha é obrigatória</li>";
    }

    if (empty($errors)) {
        $usuarios = $db->search([
            'tipo' => 'login',
            'valor' => $login
        ]);

        if (count($usuarios) > 0) {
            $usuario = $usuarios[0];
            if (password_verify($senha, $usuario->senha)) {
                $_SESSION['usuario_id'] = $usuario->id;
                header("Location: dashboard.php");
                exit();
            } else {
                $errors[] = "<li>Senha incorreta.</li>";
            }
        } else {
            $errors[] = "<li>Login não encontrado.</li>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="pt">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css">
        @import url("config/style.css") all;
        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />   
        <title>Login de Usuário</title>
        
    </head>
    <body>
        <div class="container mt-5">
            <div class="row"></div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow">
                <div class="card-header bg-info text-white text-center">
                    <h4 class="my-2">Acesso de Administrador</h4>
                </div>
                
                <div class="card-body p-4">
                    <!--Sucesso-->
                    <?php if(!empty($success)) {?>
                        <div class="alert alert-success alert-dismissible fade show">
                            <strong><?= $success?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>

                    <!--Erro-->
                    <?php if(!empty($errors)) {?>
                        <div class="alert alert-danger alert-dismissible fade show">
                            <strong>Erro ao acessar:</strong>
                            <ul class="mb-0">
                                <?php foreach($errors as $error) {?>
                                    <?= $error?>
                                <?php } ?>
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>

                    <div class="text-center mb-4">
                        <i class="bi bi-person-lock fs-1 text-primary"></i>
                    </div>

                    <form action="index.php" method="post">
                        <input type="hidden" name="id" value="<?= $data->id ?? '' ?>">

                        <div class="mb-3">
                            <label for="login" class="form-label">Login</label>
                            <input type="text" name="login" id="login" value="<?= $data->login ?? '' ?>" class="form-control" placeholder="Digite seu Login" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="senha" class="form-label">Senha</label>
                            <input type="password" name="senha" id="senha" class="form-control" placeholder="Digite sua senha" required>
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="bi bi-box-arrow-in-right me-2"></i>
                                Entrar
                            </button>
                        </div>
                    </form>
                </div>
                
                <div class="card-footer text-center bg-light">
                    <small class="text-muted">Sistema de Gerenciamento de Imóveis</small>
                </div>
            </div>
        </div>
    </div>
</div>
