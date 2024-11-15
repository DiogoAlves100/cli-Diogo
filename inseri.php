<?php
require 'configpdo.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $sexo = $_POST['sexo'];
    $tipo_consulta = $_POST['tipo_consulta'];

    // Verificar se o email já existe
    $sql = "SELECT * FROM pacientes WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "<script>alert('Este e-mail já está cadastrado!'); window.history.back();</script>";
        exit;
    }

    // Inserir novo paciente
    $sql = "INSERT INTO pacientes (nome, data_nascimento, email, telefone, endereco, sexo, tipo_consulta) 
            VALUES (:nome, :data_nascimento, :email, :telefone, :endereco, :sexo, :tipo_consulta)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':data_nascimento', $data_nascimento);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':endereco', $endereco);
    $stmt->bindParam(':sexo', $sexo);
    $stmt->bindParam(':tipo_consulta', $tipo_consulta);

    if ($stmt->execute()) {
       
        header("Location: lista.php"); 
        exit;  
    } else {
        echo "<script>alert('Erro ao cadastrar paciente.'); window.history.back();</script>";
    }
}
?>
