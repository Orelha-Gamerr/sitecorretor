<?php
    include "../db.class.php";
    include_once "../../header.php";

    $db = new db('imagens');

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
            <h3><i class="fa-solid fa-image"></i> Listagem de Imagens</h3>

            <form action="./ImagemList.php" method="post">
                <div class="row">
                    <div class="col mt-4">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
                        <a href="./ImagemForm.php" class="btn btn-secondary"><i class="fa-solid fa-plus"></i> Cadastrar</a>
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
                        <th>Caminho</th>
                        <th>Imagem</th>
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
                                <td>{$item->idImovel}</td>
                                <td>{$item->caminho}</td>
                                <td>
                                    <img src='../../{$item->caminho}' class='img-thumbnail' style='max-width: 100px;' alt='Imagem do imóvel'>
                                </td>
                                <td><a class='btn btn-warning' title='Editar' href='./ImagemForm.php?id={$item->id}'><i class='fa-solid fa-pen-to-square'></i></a></td>
                                <td>
                                    <a class='btn btn-danger' title='Excluir'
                                        onclick='return confirm(\"Deseja excluir este treino?\")' 
                                        href='./ImagemList.php?id={$item->id}'><i class='fa-solid fa-trash'></i></a>
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

