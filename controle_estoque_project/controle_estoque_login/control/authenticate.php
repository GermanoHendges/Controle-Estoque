<?php

session_start();
require '../db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../view/login.php');
    exit;
}

$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';

if ($email === '' || $senha === '') {
    header('Location: ../view/login.php?error=' . urlencode('Preencha e-mail e senha.'));
    exit;
}


$stmt = $mysqli->prepare('SELECT id, nome, email, senha FROM usuarios WHERE email = ? LIMIT 1');
if (!$stmt) {
    header('Location: ../view/login.php?error=' . urlencode('Erro interno (prepare).'));
    exit;
}
$stmt->bind_param('s', $email);
$stmt->execute();
$res = $stmt->get_result();
if ($res->num_rows === 0) {
    header('Location: ../view/login.php?error=' . urlencode('E-mail ou senha inválidos.'));
    exit;
}
$row = $res->fetch_assoc();

$hash = $row['senha'];


if (password_verify($senha, $hash)) {
    
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_name'] = $row['nome'];
    header('Location: ../view/estoque.php');
    exit;
}

header('Location: ../view/login.php?error=' . urlencode('E-mail ou senha inválidos.'));
exit;
?>
