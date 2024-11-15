<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php'); 
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Painel Administrativo</h2>
    <p>Bem-vindo, <?= $_SESSION['nome']; ?>!</p>

    <a href="logout.php" class="btn btn-danger">Sair</a>
</div>

</body>
</html>
