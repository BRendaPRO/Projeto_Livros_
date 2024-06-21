<?php
include('conn.php');

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codAutor = $_POST['codAutor'];
    $nomeAutor = $_POST['nomeAutor'];

    $stmt = $pdo->prepare('UPDATE tbautor SET nomeAutor = ? WHERE codAutor = ?');
    $stmt->execute([$nomeAutor, $codAutor]);

    $mensagem = 'Autor editado com sucesso!'; // Mensagem de confirmação

    // Redirecionamento após edição
    header('refresh:3; url=index.php');
}

$codAutor = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM tbautor WHERE codAutor = ?');
$stmt->execute([$codAutor]);
$autor = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Autor</title>
    <!-- Adicionando Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Editar Autor</h2>
        <?php if (!empty($mensagem)) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $mensagem; ?>
            </div>
        <?php } ?>
        <form method="POST">
            <input type="hidden" name="codAutor" value="<?php echo $autor['codAutor']; ?>">
            <div class="form-group">
                <label for="nomeAutor">Nome do autor:</label>
                <input type="text" class="form-control" name="nomeAutor" value="<?php echo $autor['nomeAutor']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </div>
    <!-- Adicionando script do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
