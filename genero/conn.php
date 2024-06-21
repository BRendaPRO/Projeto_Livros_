<?php
$host = 'localhost';
$dbname = 'bd2504';
$username = 'root';
$password = '';

try {
    // Criando uma instância PDO para se conectar ao banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Definindo o modo de erro do PDO como exceção
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Em caso de erro na conexão, exibir uma mensagem de erro
    echo "Erro na conexão: " . $e->getMessage();
}
?>
