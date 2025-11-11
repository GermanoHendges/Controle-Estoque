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
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Adicionar Usuário
                            <a href="estoque.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="../control/acoes.php" method="POST">
                        <div class="mb-3">
                            <label >Nome</label>
                            <input type="text" name="nome" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label >Categoria</label>
                            <input type="text" name="categoria" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label >Descrição</label>
                            <input type="text" name="descricao" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label >Quantidade</label>
                            <input type="int" name="quantidade" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label >Preço</label>
                            <input type="float" name="preco" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary" name="inserir">Salvar</button>
                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>