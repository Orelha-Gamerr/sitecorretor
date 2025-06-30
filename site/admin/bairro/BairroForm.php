<?php
    include ".../db.class.php";
    include_once ".../header.php";

    $db = new db('bairro');
    $data = null;
    $errors = [];
    $success = '';

    if(!empty($_POST)){
        $data = (object) $_POST;

        if(empty(trim($_POST['nome']))){
            $errors[] = "<li>O nome é Obrigatório.</li>";
        }

        if (empty(($errors))){
            try {
                $db->store($_POST);
                $success = "Registro criado com sucesso!";
                
                echo "<script>
                    setTimeout(
                        ()=> window.location.href = './BairroList.php', 1000
                    )
                </script>";
            } catch(Exception $e){
                $errors[] = "Erro ao salvar: " . $e->getMessage();
            }
        }
    }

    if(!empty($_GET['id'])){
        $data = $db->find($_GET['id']);
    }
?>
?>

<div class="container mt-4">
    <?php if(!empty($success)) {?>
        <div class="alert alert-success alert-dismissible fade show">
            <strong><?= $success?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>

    <?php if(!empty($errors)) {?>
        <div class="alert alert-danger alert-dismissible fade show">
            <strong>Erro ao salvar:</strong>
            <ul class="mb-0">
                <?php foreach($errors as $error) {?>
                    <?= $error?>
                <?php } ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-info text-white py-3">
            <h4 class="mb-0">Formulário de Bairros</h4>
        </div>
        
        <div class="card-body">
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $data->id ?? '' ?>">
                
                <!-- Linha 1 -->
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label for="nome" class="form-label fw-bold">Nome do Bairro</label>
                        <input type="text" name="nome" class="form-control form-control-lg" 
                               value="<?= $data->nome ?? '' ?>" placeholder="Digite o nome do exercício">
                    </div>
                </div>
                
                <!-- Botões -->
                <div class="d-flex justify-content-between mt-4">
                    <a href="./ExercicioList.php" class="btn btn-outline-secondary btn-lg px-4">
                        <i class="fas fa-arrow-left me-2"></i>
                        Voltar
                    </a>
                    <button type="submit" class="btn btn-outline-success btn-lg px-4">
                        <i class="fas <?= !empty($_GET['id']) ? 'fa-sync-alt' : 'fa-save' ?> me-2"></i>
                        <?= !empty($_GET['id']) ? "Atualizar" : "Salvar" ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    include_once "../footer.php";
?>