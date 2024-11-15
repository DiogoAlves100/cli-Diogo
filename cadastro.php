<?php
require 'configpdo.php'; 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Paciente</title>
    <link rel="stylesheet" href="./styl.css">
</head>
<body>

    <div class="container mt-5">
        <h1>Cadastro de Paciente</h1>
        
        <form action="./inseri.php" method="post">
            <div class="form-group">
                <label for="nome">Nome Completo:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" class="form-control" id="telefone" name="telefone" required pattern="^\d{10,11}$" title="O telefone deve ter 10 ou 11 dígitos, apenas números.">
            </div>
            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <textarea class="form-control" id="endereco" name="endereco"></textarea>
            </div>
            <div class="form-group">
                <label for="sexo">Sexo:</label>
                <select class="form-control" id="sexo" name="sexo" required>
                    <option value="masculino">Masculino</option>
                    <option value="feminino">Feminino</option>
                    <option value="outro">Outro</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tipo_consulta">Tipo de Consulta:</label>
                <select class="form-control" id="tipo_consulta" name="tipo_consulta" required>
                    <option value="">Selecione o tipo de consulta</option>
                    <option value="Clínica">Clínica</option>
                    <option value="Especializada">Especializada</option>
                    <option value="Emergência">Emergência</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar Paciente</button>
        </form>
    </div>

</body>
</html>
