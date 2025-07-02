<?php
    include "../db.class.php";
    include_once "../../header.php";

    $db = new db('imovel');
    $dbBairro = new db('bairro');
    $listaBairro = $dbBairro->all();
    $data = null;
    $errors = [];
    $success = '';

    if(!empty($_POST)){
        $data = (object) $_POST;

        if(empty(trim($_POST['nome']))){
            $errors[] = "<li>O nome é Obrigatório.</li>";
        }
        if(empty(trim($_POST['descricao']))){
            $errors[] = "<li>A descrição é Obrigatória.</li>";
        }

        if (empty($errors)) {
            try {
                if (!empty($_POST['id'])) {
                    $db->update($_POST, $_POST['id']); // id primeiro, dados depois // ATUALIZA
                    $success = "Registro atualizado com sucesso!";
                } else {
                    $db->store($_POST); // INSERE NOVO  
                    $success = "Registro criado com sucesso!";
                }

                echo "<script>
                    setTimeout(
                        ()=> window.location.href = './ImovelList.php', 1000
                    )
                </script>";
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
            <h4 class="mb-0"><i class="fas fa-building me-1"></i>Formulário de Imóveis</h4>
        </div>
        
        <div class="card-body">
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $data->id ?? '' ?>">
                
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label for="nome" class="form-label fw-bold">Nome do Imóvel</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-tag"></i></span>
                            <input type="text" name="nome" id="nome" class="form-control form-control-lg" 
                                   value="<?= $data->nome ?? '' ?>" placeholder="Ex: Edifício Central Park">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="descricao" class="form-label fw-bold">Descrição</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                            <input type="text" name="descricao" id="descricao" class="form-control form-control-lg" 
                                   value="<?= $data->descricao ?? '' ?>" placeholder="Descrição do imóvel">
                        </div>
                    </div>
                </div>
                
                
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label for="usuario_id" class="form-label fw-bold">Bairro</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <select name="idBairro" id="idBairro" class="form-select form-select-lg">
                                <option value="">Selecione um bairro</option>
                                <?php foreach($listaBairro as $bairro) { ?>
                                    <option value="<?= $bairro->id ?>" <?= (isset($data->idBairro) && $data->idBairro == $bairro->id) ? 'selected' : '' ?>>
                                        <?= $bairro->nome ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div> 
                    </div>
                    
                    <div class="col-md-6">
                        <label for="cliente" class="form-label fw-bold">Nome do Cliente</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                            <input type="text" name="cliente" id="cliente" class="form-control form-control-lg" 
                                   value="<?= $data->cliente ?? '' ?>" placeholder="Ex: Maria de Lurdes">
                        </div>
                    </div>    
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label for="nome" class="form-label fw-bold">Valor</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-hand-holding-dollar"></i></span>
                            <input type="text" name="valor" id="valor" class="form-control form-control-lg" 
                                   value="<?= $data->valor ?? '' ?>" placeholder="Valor do imóvel">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="descricao" class="form-label fw-bold">Área</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-layer-group"></i></span>
                            <input type="text" name="area" id="area" class="form-control form-control-lg" 
                                   value="<?= $data->area ?? '' ?>" placeholder="Área do imóvel (m²)">
                        </div>
                    </div>
                </div> 

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label for="nome" class="form-label fw-bold">Cidade</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-tree-city"></i></span>
                            <input type="text" name="cidade" id="cidade" class="form-control form-control-lg" 
                                   value="<?= $data->cidade ?? '' ?>" placeholder="Cidade do imóvel">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="descricao" class="form-label fw-bold">Estado</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-map-location-dot"></i></span>
                            <input type="text" name="estado" id="estado" class="form-control form-control-lg" 
                                   value="<?= $data->estado ?? '' ?>" placeholder="Estado do imóvel">
                        </div>
                    </div>
                </div> 

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label for="nome" class="form-label fw-bold">Rua</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-road"></i></span>
                            <input type="text" name="rua" id="rua" class="form-control form-control-lg" 
                                   value="<?= $data->rua ?? '' ?>" placeholder="Rua do imóvel">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="descricao" class="form-label fw-bold">CEP</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-house"></i></span>
                            <input type="text" name="cep" id="cep" class="form-control form-control-lg" 
                                   value="<?= $data->cep ?? '' ?>" placeholder="CEP do imóvel">
                        </div>
                    </div>
                </div> 

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label for="nome" class="form-label fw-bold">Quartos</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-bed"></i></span>
                            <input type="text" name="quartos" id="quartos" class="form-control form-control-lg" 
                                   value="<?= $data->quartos ?? '' ?>" placeholder="Quantidade de quartos">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="descricao" class="form-label fw-bold">Banheiros</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-bath"></i></span>
                            <input type="text" name="banheiros" id="banheiros" class="form-control form-control-lg" 
                                   value="<?= $data->banheiros ?? '' ?>" placeholder="Quantidade de banheiros">
                        </div>
                    </div>
                </div> 

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label for="nome" class="form-label fw-bold">Vagas de Carros</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-car"></i></span>
                            <input type="text" name="vagas" id="vagas" class="form-control form-control-lg" 
                                   value="<?= $data->vagas ?? '' ?>" placeholder="Quantidade de vagas de carros">
                        </div>
                    </div>
                    
                     <div class="col-md-6">
                        <label for="nome" class="form-label fw-bold">Tipo do Imóvel</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-building-flag"></i></span>
                            <input type="text" name="tipo" id="tipo" class="form-control form-control-lg" 
                                   value="<?= $data->tipo ?? '' ?>" placeholder="Ex: Apartamento, Casa, Comercial">
                        </div>
                    </div>
                </div> 

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label for="usuario_id" class="form-label fw-bold">Status do Imóvel</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-chart-simple"></i></span>
                            <select name="status" id="status" class="form-select form-select-lg">
                                <option selected value="">Selecione um status</option>
                                <option value="A venda">A venda</option>
                                <option value="Em negociação">Em negociação</option>
                                <option value="Vendido">Vendido</option>
                            </select>
                        </div> 
                    </div>
                    
                    <div class="col-md-6">
                        <label for="descricao" class="form-label fw-bold">Imagem de Capa</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-image"></i></span>
                            <input type="text" name="capa" id="capa" class="form-control form-control-lg" 
                                   value="<?= $data->capa ?? '' ?>" placeholder="Imagem">
                        </div>
                    </div>
                </div> 

                <div class="d-flex justify-content-between mt-4">
                    <div>
                        <a href="./ImovelList.php" class="btn btn-outline-secondary btn-lg px-4 me-2">
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

<?php
    include_once "../../footer.php";
?>