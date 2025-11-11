<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: estoque.php');
    exit;
}
$error = isset($_GET['error']) ? $_GET['error'] : '';
?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Login - Controle de Estoque</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <style>
    body { font-family: Arial, sans-serif; background:#f4f4f4; display:flex; align-items:center; justify-content:center; height:100vh; margin:0; }
    .card { background:#fff; padding:24px; border-radius:8px; box-shadow:0 6px 18px rgba(0,0,0,0.06); width:320px; }
    h2 { margin-top:0; margin-bottom:12px; font-size:18px; }
    input[type=email], input[type=password] { width:100%; padding:10px; margin:6px 0 12px 0; box-sizing:border-box; }
    button { width:100%; padding:10px; cursor:pointer; }
    .error { color:#a94442; background:#f2dede; padding:8px; border-radius:4px; margin-bottom:12px; }
    .note { font-size:12px; color:#666; margin-top:10px; text-align:center; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Entrar — Controle de Estoque</h2>
        <?php if ($error): ?>
            <div class="error"><?php echo htmlentities($error); ?></div>
        <?php endif; ?>
        <form action="../control/authenticate.php" method="post" autocomplete="off">
            <label for="email">E-mail</label><br>
            <input id="email" name="email" type="email" required><br>
            <label for="senha">Senha</label><br>
            <input id="senha" name="senha" type="password" required><br>
            <button type="submit">Entrar</button>
        </form>
        <div class="note">Não há opção de cadastro — use as credenciais fornecidas.</div>
    </div>
</body>
</html>
