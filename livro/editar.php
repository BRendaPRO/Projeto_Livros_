<?php
include('conn.php');

// Verifica se o parâmetro 'id' está definido na URL e se não está vazio
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $codLivro = $_GET['id'];
    
    // Prepara e executa a consulta para obter os detalhes do livro
    $stmt = $pdo->prepare('SELECT * FROM tbLivro WHERE codLivro = ?');
    $stmt->execute([$codLivro]);

    // Obtém os detalhes do livro
    $Livro = $stmt->fetch();

    // Verifica se o livro foi encontrado
    if($Livro) {
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Livro</title>
    <!-- Adicionando Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-4">Editar Livro</h2>
        <form method="POST">
            <input type="hidden" name="codLivro" value="<?php echo $Livro['codLivro']; ?>">
            <div class="form-group">
                <label for="nomeLivro">Nome do livro:</label>
                <input type="text" name="nomeLivro" class="form-control" value="<?php echo $Livro['nomeLivro']; ?>" required>
            </div>
            <div class="form-group">
                <label for="anoLancamento">Ano de lançamento:</label>
                <input type="text" name="anoLancamento" class="form-control" value="<?php echo $Livro['anoLancamento']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
        <?php
            // Processo de edição do livro
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $codLivro = $_POST['codLivro'];
                $nomeLivro = $_POST['nomeLivro'];
                $anoLancamento = $_POST['anoLancamento'];

                $stmt = $pdo->prepare('UPDATE tbLivro SET nomeLivro = ?, anoLancamento = ? WHERE codLivro = ?');
                $stmt->execute([$nomeLivro, $anoLancamento, $codLivro]);

                echo "<div class='alert alert-success mt-3' role='alert'>Livro editado com sucesso!</div>";
            }
        ?>
    </div>
    <!-- Adicionando script do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php
    } else {
        echo "Livro não encontrado.";
    }
} else {
    echo "ID do livro não especificado.";
}
?>
