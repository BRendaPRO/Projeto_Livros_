<?php
// Configurações de conexão com o banco de dados
$host = 'localhost'; // Endereço do servidor MySQL (normalmente 'localhost' para ambiente local)
$dbname = 'bd2504'; // Nome do banco de dados
$username = 'root'; // Nome de usuário do MySQL
$password = ''; // Senha do MySQL (deixe em branco se não tiver senha)

try {
    // Cria uma nova instância da classe PDO para estabelecer a conexão com o banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Define o modo de erro do PDO para lançar exceções em caso de erros
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Em caso de falha na conexão, exibe uma mensagem de erro
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}
?>
