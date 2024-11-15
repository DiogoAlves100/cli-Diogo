<?php
require 'configpdo.php';

$sql = "SELECT * FROM pacientes";
$stmt = $pdo->query($sql);
$pacientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pacientes</title>
 <link rel="stylesheet" href="./index.css">
</head>
<body>

<div class="container mt-5">
    <h1>Lista de Pacientes</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Sexo</th>
                <th>Tipo de Consulta</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pacientes as $paciente): ?>
                <tr>
                    <td><?= $paciente['id'] ?></td>
                    <td><?= $paciente['nome'] ?></td>
                    <td><?= $paciente['email'] ?></td>
                    <td><?= $paciente['telefone'] ?></td>
                    <td><?= ucfirst($paciente['sexo']) ?></td>
                    <td><?= ucfirst($paciente['tipo_consulta']) ?></td>
                    <td>
                        <a href="editar.php?id=<?= $paciente['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="deletar.php?id=<?= $paciente['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="cadastro.php" class="btn btn-primary">Cadastrar Novo Paciente</a>
</div>

</body>
</html>
