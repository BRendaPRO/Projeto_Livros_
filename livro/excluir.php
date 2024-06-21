<?php
include('conn.php');

// Verifica se o parâmetro 'id' está definido na URL e se não está vazio
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $codLivro = $_GET['id'];
    
    // Prepara e executa a consulta para excluir o livro
    $stmt = $pdo->prepare('DELETE FROM tbLivro WHERE codLivro = ?');
    $stmt->execute([$codLivro]);

    // Redireciona de volta para a página principal
    header('Location: index.php');
} else {
    // Se o parâmetro 'id' não estiver definido ou estiver vazio, exibe uma mensagem de erro ou redireciona para uma página de erro
    echo "ID do livro não especificado.";
    // Ou redireciona para uma página de erro
    // header('Location: erro.php');
}
?>
