<?php
include('conn.php');
$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codAutor = $_POST['codAutor'];
    $nomeAutor = $_POST['nomeAutor'];
 
    $stmt = $pdo->prepare('INSERT INTO tbautor(codAutor, nomeAutor) VALUES (?, ?)');
    $stmt->execute([$codAutor, $nomeAutor]);

    $mensagem = 'Autor adicionado com sucesso!'; // Mensagem de confirmação

    // Redirecionamento após adição
    header('refresh:3; url=index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Autor</title>
    <!-- Adicionando Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Adicionar Autor</h2>
        <?php if (!empty($mensagem)) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $mensagem; ?>
            </div>
        <?php } ?>
        <form method="POST">
            <div class="form-group">
                <label for="codAutor">Código do autor:</label>
                <input type="text" class="form-control" name="codAutor" required>
            </div>

            <div class="form-group">
                <label for="nomeAutor">Nome do autor:</label>
                <input type="text" class="form-control" name="nomeAutor" required>
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
