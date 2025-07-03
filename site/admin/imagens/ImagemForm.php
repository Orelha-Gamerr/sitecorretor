<?php
    include "../db.class.php";
    include_once "../../header.php";

    $db = new db('imagens');
    $dbImovel = new db('imovel');
    $listaImovel = $dbImovel->all();
    $data = null;
    $errors = [];
    $success = '';

    if(!empty($_POST)){
        $data = (object) $_POST;

        if(empty(trim($_POST['idImovel']))){
            $errors[] = "<li>O imóvel é obrigatório.</li>";
        }
        if (empty($_FILES['imagens']) || count($_FILES['imagens']['name']) == 0 || $_FILES['imagens']['error'][0] !== 0) {
            $errors[] = "<li>Você deve enviar pelo menos uma imagem.</li>";
        }

        if (empty($errors)) {
            try {
                $imovel_id = $_POST['idImovel']; 
                $upload_dir = "../../imagens/imoveis/$imovel_id/";

                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }

                foreach ($_FILES['imagens']['tmp_name'] as $index => $tmp_name) {
                    $nome_arquivo = basename($_FILES['imagens']['name'][$index]);
                    $caminho_destino = $upload_dir . $nome_arquivo;

                    if (move_uploaded_file($tmp_name, $caminho_destino)) {
                        $caminho_relativo = "imagens/imoveis/$imovel_id/" . $nome_arquivo;

                        // Salva no banco de dados
                        $db->store([
                            'idImovel' => $imovel_id,
                            'caminho' => $caminho_relativo
                        ]);
                    }
                }

                $success = "Imagens salvas com sucesso!";
                echo "<script> setTimeout(()=> window.location.href = './ImagemForm.php', 1000) </script>";
            } catch (Exception $e) {
                $errors[] = "Erro ao salvar: " . $e->getMessage();
            }
        }
    }

    if(!empty($_GET['id'])){
        $data = $db->find($_GET['id']);
    }
?>

<div class="container mt-4">

    <?php if(!empty($success)) { ?>
        <div class="alert alert-success alert-dismissible fade show">
            <i class="fas fa-check-circle me-2"></i>
            <strong><?= $success ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>

    <?php if(!empty($errors)) { ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="fas fa-exclamation-triangle me-2"></i>
            <strong>Erro ao salvar:</strong>
            <ul class="mb-0">
                <?php foreach($errors as $error) { ?>
                    <li><?= $error ?></li>
                <?php } ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>

    <div class="card shadow-sm">
        <div class="card-header bg-white text-black py-3">
            <h4 class="mb-0"><i class="fa-solid fa-image"></i> Formulário de Imagens</h4>
        </div>
        
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $data->id ?? '' ?>">
                
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label for="usuario_id" class="form-label fw-bold">Imóvel</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <select name="idImovel" id="idImovel" class="form-select form-select-lg">
                                <option value="">Selecione um imóvel</option>
                                <?php foreach($listaImovel as $imovel) { ?>
                                    <option value="<?= $imovel->id ?>" <?= (isset($data->idBairro) && $data->idImovel == $imovel->id) ? 'selected' : '' ?>>
                                        <?= $imovel->nome ?>
                                        <?= $imovel->rua ?>
                                        <?= $imovel->cep ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div> 
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-20">
                            <label for="imagem" class="form-label fw-bold">Escolher Imagem</label>
                            <input type="file" name="imagens[]" multiple  class="form-control form-control-lg">   
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <div>
                        <a href="./ImagemList.php" class="btn btn-outline-secondary btn-lg px-4 me-2">
                            <i class="fas fa-arrow-left me-2"></i> Voltar
                        </a>
                    </div>
                    <button type="submit" class="btn btn-outline-warning btn-lg px-4">
                        <i class="fas fa-save me-2"></i> Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
    </main>
</body>
</html>