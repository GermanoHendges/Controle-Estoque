<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Controlador - Empresa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <?php include('navbar.php'); ?>
    <br>
    <div class="container-mt4">
        <?php include('mensagem.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Lista de Usuários
                            <a href="../view/inserir.php" class="btn btn-primary float-end">Adicionar Produto</a>
                        </h4>
                        
                    </div>
                    <div>
                            <a class="btn float-end" href="../control/logout.php">Sair</a>
                        </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Categoria</th>
                                    <th>Descrição</th>
                                    <th>Quantidade</th>
                                    <th>Preço</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                                <tbody>
                                    <?php
                                        require '../db.php';
                                        $query = "SELECT * FROM produto";
                                        $query_run = mysqli_query($mysqli, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $produto)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $produto['id']; ?></td>
                                                    <td><?= htmlspecialchars($produto['nome']); ?></td>
                                                    <td><?= htmlspecialchars($produto['categoria']); ?></td>
                                                    <td><?= htmlspecialchars($produto['descricao']); ?></td>
                                                    <td><?= htmlspecialchars($produto['quantidade']); ?></td>
                                                    <td><?= htmlspecialchars($produto['preco']); ?></td>
                                                    <td>
                                                        <a href="editar.php?id=<?= $produto['id']; ?>" class="btn btn-success btn-sm">Editar</a>
                                                        <form action="../control/acoes.php" method="POST" class="d-inline">
                                                            <button type="submit" name="deletar" value="<?= $produto['id']; ?>" class="btn btn-danger btn-sm">Deletar</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "<tr><td colspan='7'>Nenhum produto encontrado</td></tr>";
                                        }
                                    ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>