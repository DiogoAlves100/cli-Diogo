<?php
require 'configpdo.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

  
    $sql = "DELETE FROM pacientes WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    
    header("Location: lista.php");
    exit;
}
?>
