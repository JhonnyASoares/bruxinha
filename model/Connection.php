<?php
function connect()
{
    $dsn = 'mysql:host=localhost;dbname=bruxinha';
    $username = 'root';
    $password = '';

    try {
        $pdo = new PDO($dsn, $username, $password);
        // Configurar o PDO para lançar exceções em caso de erro
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo 'Conexão falhou: ' . $e->getMessage();
    }
}
