<?php
session_start(); 
if (isset($_SESSION['admin'])) {
    header('Location: painel.php'); 
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Administrador</title>
    <link rel="stylesheet" href="./login.css">
   
</head>
<body>
<form action="./cadastro.php">
<div class="container mt-5">
    <h2>Login de Administrador</h2>

    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger">Usuário ou senha inválidos!</div>
    <?php endif; ?>

    <form action="login_action.php" method="POST">
        <div class="form-group">
            <label for="username">Usuário</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</div>
</form>

</body>
</html>
