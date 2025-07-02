<?php
    include "../db.class.php";
    include_once "../../header.php";

        $db = new db('bairro');

        if(!empty($_GET['id'])){
            $db->destroy($_GET['id']);
        };
        
        if(!empty($_POST)){
            $dados = $db->search($_POST);
        }else{
            $dados = $db->all();
        }

    ?>

    <div class="container mt-5">
        <div class="row">
            <h3><i class="fas fa-map-marker-alt me-1"></i>Listagem de Bairros</h3>

                <form action="./BairroList.php" method="post">

                    <div class="row">
                        <div class="col-md-2">
                            <select name="tipo" class="form-select">
                                <option value="nome">Nome</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <input type="text" name="valor" placeholder="pesquisar..." class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mt-4">
                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
                            <a href="./BairroForm.php" class="btn btn-secondary"><i class="fa-solid fa-plus"></i> Cadastrar</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row mt-4">
                <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $dbBairro = new $db('bairro');
                        foreach($dados as $item) {
                            echo"
                            <tr>
                                <th scope='row'>$item->id</th>
                                <td>$item->nome</td>
                                <td>
                                    <a class='btn btn-warning' href='./BairroForm.php?id=$item->id'><i class='fa-solid fa-pen-to-square'></i></a>
                                </td>
                                <td>
                                    <a class='btn btn-danger'
                                        title='Excluir'
                                        onclick='return confirm(\"Deseja Excluir?\")'
                                        href='./BairroList.php?id=$item->id'><i class='fa-solid fa-trash'></i>
                                    </a>
                                </td>
                            </tr>
                            ";
                        }
                    ?>
                </tbody>
                </table>
            </div>


   <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
    </main>
</body>
</html>

