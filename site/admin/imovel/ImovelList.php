<?php
    include "../db.class.php";
    include_once "../../header.php";

    $db = new db('imovel');

    if (!empty($_GET['id'])) {
        $db->destroy($_GET['id']);
    }

    if (!empty($_POST)) {
        $dados = $db->search($_POST);
    } else {
        $dados = $db->all();
    }
?>

    <main>
    <div class="container mt-5">
        <div class="row">
            <h3><i class="fas fa-building me-1"></i>Listagem de Imóveis</h3>

            <form action="./ImovelList.php" method="post">
                <div class="row">
                    <div class="col-md-2">
                        <select name="tipo" class="form-select">
                            <option value="id">Id</option>
                            <option value="nome">Nome</option>
                            <option value="cliente">Cliente</option>
                            <option value="cidade">Cidade</option>
                            <option value="bairro">Bairro</option>
                            <option value="rua">Rua</option>
                            <option value="tipo">Tipo</option>
                            <option value="status">Status</option>
                            <option value="cep">CEP</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <input type="text" name="valor" placeholder="Pesquisar..." class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col mt-4">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
                        <a href="./ImovelForm.php" class="btn btn-secondary"><i class="fa-solid fa-plus"></i> Cadastrar</a>
                    </div>
                </div>
            </form>
        </div>

        <div class="row mt-4">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Imovel</th>
                        <th>Cliente</th>
                        <th>Área</th>
                        <th>Cidade</th>
                        <th>Bairro</th>
                        <th>Rua</th>
                        <th>CEP</th>
                        <th>Tipo</th>
                        <th>Status</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        foreach ($dados as $item) {
                            echo "
                            <tr>
                                <th scope='row'>{$item->id}</th>
                                <td>{$item->nome}</td>
                                <td>{$item->cliente}</td>
                                <td>{$item->area}</td>
                                <td>{$item->cidade}</td>
                                <td>{$item->idBairro}</td>
                                <td>{$item->rua}</td>
                                <td>{$item->cep}</td>
                                <td>{$item->tipo}</td>
                                <td>{$item->status}</td>
                                <td><a class='btn btn-warning' title='Editar' href='./ImovelForm.php?id={$item->id}'><i class='fa-solid fa-pen-to-square'></i></a></td>
                                <td>
                                    <a class='btn btn-danger' title='Excluir'
                                        onclick='return confirm(\"Deseja excluir este treino?\")' 
                                        href='./ImovelList.php?id={$item->id}'><i class='fa-solid fa-trash'></i></a>
                                </td>
                            </tr>
                            ";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>  


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
    </main>
</body>
</html>

