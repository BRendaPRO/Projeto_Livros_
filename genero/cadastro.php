<?php
include('conn.php');

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codGenero = $_POST['codGenero'];
    $genero = $_POST['genero'];
 
    $stmt = $pdo->prepare('INSERT INTO tbgenero(codGenero, genero) VALUES (?, ?)');
    $stmt->execute([$codGenero, $genero]);

    $mensagem = 'Gênero adicionado com sucesso!'; // Mensagem de confirmação

    // Redirecionamento após adição
    header('refresh:3; url=index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Gênero</title>
    <!-- Adicionando Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Adicionar Gênero</h2>
        <?php if (!empty($mensagem)) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $mensagem; ?>
            </div>
        <?php } ?>
        <form method="POST">
            <div class="form-group">
                <label for="codGenero">Código do gênero:</label>
                <input type="text" class="form-control" name="codGenero" required>
            </div>

            <div class="form-group">
                <label for="genero">Gênero:</label>
                <input type="text" class="form-control" name="genero" required>
            </div>

            <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>
    </div>
    <!-- Adicionando script do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
