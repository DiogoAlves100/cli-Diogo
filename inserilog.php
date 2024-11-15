<?php
session_start();
require 'configpdo.php';  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $username = $_POST['nome'];
    $password = $_POST['senha'];

 
    $sql = "SELECT * FROM admin WHERE nome = :nome";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->execute();

  
    if ($stmt->rowCount() > 0) {

        if (password_verify($password, $admin['senha'])) {
           
            $_SESSION['admin'] = $admin['id'];
            $_SESSION['nome'] = $admin['nome '];

            header('Location: painel.php');
            exit;
        }
    }

   
    header('Location: login.php?error=1');
    exit;
}
