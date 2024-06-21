<?php
include('conn.php');

// Verifica se o parâmetro 'id' está definido na URL
if(isset($_GET['id'])) {
    $codGenero = $_GET['id'];
    
    // Prepara e executa a instrução SQL para excluir o registro
    $stmt = $pdo->prepare('DELETE FROM tbgenero WHERE codGenero = ?');
    $stmt->execute([$codGenero]);

    // Redireciona o usuário de volta para a página inicial
    header('Location: index.php');
} else {
    // Caso o parâmetro 'id' não esteja definido, exibe uma mensagem de erro ou toma outra ação adequada
    echo "ID do gênero não fornecido.";
}
?>
