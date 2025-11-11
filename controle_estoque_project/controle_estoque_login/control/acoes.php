<?php
    session_start();
    require '../db.php';

    if (isset($_POST["inserir"])) {
        $nome = trim($_POST['nome']);
        $categoria = trim($_POST['categoria']);
        $descricao = trim($_POST['descricao']);
        $quantidade = trim($_POST['quantidade']);
        $preco = trim($_POST['preco']);

        $stmt = $mysqli->prepare("INSERT INTO produto (nome, categoria, descricao, quantidade, preco) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssdd", $nome, $categoria, $descricao, $quantidade, $preco);
        $stmt->execute();
        
        if ($stmt->affected_rows > 0) {
            $_SESSION['mensagem'] = 'Produto criado com sucesso!';
            header('Location: ../view/estoque.php');
            exit;
        } else{
            $_SESSION['mensagem'] = 'Produto não foi criado';
            header('Location: ../view/estoque.php');
            exit;
        }
        $stmt->close();
        exit;
    }

    if (isset($_POST["atualizar"])) {
        $produto_id = trim($_POST['produto_id']);
        $nome = trim($_POST['nome']);
        $categoria = trim($_POST['categoria']);
        $descricao = trim($_POST['descricao']);
        $quantidade = trim($_POST['quantidade']);
        $preco = trim($_POST['preco']);

        $stmt = $mysqli->prepare("UPDATE produto SET nome=?, categoria=?, descricao=?, quantidade=?, preco=? WHERE id=?");
        $stmt->bind_param("sssddi", $nome, $categoria, $descricao, $quantidade, $preco, $produto_id);
        $stmt->execute();
        
        if ($stmt->affected_rows > 0) {
            $_SESSION['mensagem'] = 'Produto atualizado com sucesso!';
            header('Location: ../view/estoque.php');
            exit;
        } else{
            $_SESSION['mensagem'] = 'Produto não foi atualizado ou não houve alterações.';
            header('Location: ../view/estoque.php');
            exit;
        }
        $stmt->close();
        exit;
    }

    if (isset($_POST["deletar"])) {
        $produto_id = trim($_POST['deletar']);

        $stmt = $mysqli->prepare("DELETE FROM produto WHERE id=?");
        $stmt->bind_param("i", $produto_id);
        $stmt->execute();
        
        if ($stmt->affected_rows > 0) {
            $_SESSION['mensagem'] = 'Produto excluído com sucesso!';
            header('Location: ../view/estoque.php');
            exit;
        } else{
            $_SESSION['mensagem'] = 'Produto não foi excluído.';
            header('Location: ../view/estoque.php');
            exit;
        }
        $stmt->close();
        exit;
    }
    
?>

