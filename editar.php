<?php
require 'configpdo.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $sql = "SELECT * FROM pacientes WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $paciente = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$paciente) {
        echo "Paciente não encontrado.";
        exit;
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $sexo = $_POST['sexo'];
    $tipo_consulta = $_POST['tipo_consulta'];


    $sql = "UPDATE pacientes SET nome = :nome, data_nascimento = :data_nascimento, email = :email, telefone = :telefone, endereco = :endereco, sexo = :sexo, tipo_consulta = :tipo_consulta WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':data_nascimento', $data_nascimento);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':endereco', $endereco);
    $stmt->bindParam(':sexo', $sexo);
    $stmt->bindParam(':tipo_consulta', $tipo_consulta);
    $stmt->execute();

 
    header("Location: lista.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Paciente</title>
    <link rel="stylesheet" href="./editar.css">
</head>
<body>

<div class="container mt-5">
    <h1>Editar Paciente</h1>

    <form action="" method="post">
        <div class="form-group">
            <label for="nome">Nome Completo:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?= $paciente['nome'] ?>" required>
        </div>
        <div class="form-group">
            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="<?= $paciente['data_nascimento'] ?>" required>
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $paciente['email'] ?>" required>
        </div>
        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" class="form-control" id="telefone" name="telefone" value="<?= $paciente['telefone'] ?>" required pattern="^\d{10,11}$" title="O telefone deve ter 10 ou 11 dígitos, apenas números.">
        </div>
        <div class="form-group">
            <label for="endereco">Endereço:</label>
            <textarea class="form-control" id="endereco" name="endereco"><?= $paciente['endereco'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="sexo">Sexo:</label>
            <select class="form-control" id="sexo" name="sexo" required>
                <option value="masculino" <?= $paciente['sexo'] == 'masculino' ? 'selected' : '' ?>>Masculino</option>
                <option value="feminino" <?= $paciente['sexo'] == 'feminino' ? 'selected' : '' ?>>Feminino</option>
                <option value="outro" <?= $paciente['sexo'] == 'outro' ? 'selected' : '' ?>>Outro</option>
            </select>
        </div>
        <div class="form-group">
            <label for="tipo_consulta">Tipo de Consulta:</label>
            <select class="form-control" id="tipo_consulta" name="tipo_consulta" required>
                <option value="Clínica" <?= $paciente['tipo_consulta'] == 'Clínica' ? 'selected' : '' ?>>Clínica</option>
                <option value="Especializada" <?= $paciente['tipo_consulta'] == 'Especializada' ? 'selected' : '' ?>>Especializada</option>
                <option value="Emergência" <?= $paciente['tipo_consulta'] == 'Emergência' ? 'selected' : '' ?>>Emergência</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Paciente</button>
    </form>
</div>

</body>
</html>
