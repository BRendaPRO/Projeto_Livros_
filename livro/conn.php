<?php
$host = 'localhost';
$dbname = 'bd2504';
$username = 'root';
$password = '';

try {
    // Criação da conexão PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Define o modo de erro do PDO para lançar exceções
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Exibe uma mensagem de sucesso se a conexão for bem-sucedida
    echo "Conexão bem-sucedida!";
} catch (PDOException $e) {
    // Exibe uma mensagem de erro em caso de falha na conexão
    echo "Erro na conexão: " . $e->getMessage();
}
?>
