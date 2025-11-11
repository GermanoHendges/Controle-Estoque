<?php

require 'db.php';


$users = [
    ['nome' => 'Administrador', 'email' => 'admin@exemplo.com', 'senha' => 'admin123'],
    
];

$inserted = 0;
$stmt = $mysqli->prepare('INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)');
if (!$stmt) {
    die('Erro no prepare: ' . $mysqli->error);
}

foreach ($users as $u) {
    $nome = $u['nome'];
    $email = $u['email'];
    // cria hash seguro
    $hashed = password_hash($u['senha'], PASSWORD_DEFAULT);
    // evita duplicados por email
    $check = $mysqli->prepare('SELECT id FROM usuarios WHERE email = ? LIMIT 1');
    $check->bind_param('s', $email);
    $check->execute();
    $res = $check->get_result();
    if ($res->num_rows > 0) {
        echo "Já existe usuário com o e-mail: {$email}<br>";
        continue;
    }
    $stmt->bind_param('sss', $nome, $email, $hashed);
    if ($stmt->execute()) {
        $inserted++;
        echo "Inserido: {$email}<br>";
    } else {
        echo "Erro inserindo {$email}: " . $mysqli->error . "<br>";
    }
}

echo "<br>Total inserido: {$inserted}\n";
?>
