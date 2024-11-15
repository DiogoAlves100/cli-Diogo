<?php

try {
    $pdo = new PDO("mysql:dbname=clinica;host=localhost:3306", "root");
} catch (Exception $e) {
 echo 'Erro a conectar'.$e->getMessage();
}
