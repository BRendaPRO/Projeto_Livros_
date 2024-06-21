<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Gênero</title>
    <!-- Adicionando Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>CRUD de Gênero</h1>
        <br>
        <!-- Formulário de busca por gênero -->
        <form method="GET" class="form-inline mb-2">
            <label for="busca" class="mr-2">Buscar gênero:</label>
            <input type="text" id="busca" name="genero" class="form-control mr-2">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
        <a href="cadastro.php" class="btn btn-success">Adicionar gênero</a><br><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Código do gênero</th>
                    <th scope="col">Gênero</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('conn.php');

                // Verifica se a busca foi realizada
                if(isset($_GET['genero']) && !empty($_GET['genero'])) {
                    $genero = $_GET['genero'];
                    $stmt = $pdo->prepare('SELECT * FROM tbgenero WHERE genero LIKE :genero');
                    $stmt->bindValue(':genero', '%' . $genero . '%', PDO::PARAM_STR);
                    $stmt->execute();
                } else {
                    $stmt = $pdo->query('SELECT * FROM tbgenero');
                }

                while ($row = $stmt->fetch()) {
                    echo "<tr>";
                    echo "<td>{$row['codGenero']}</td>";
                    echo "<td>{$row['genero']}</td>";
                    echo "<td>
                              <a href='editar.php?id={$row['codGenero']}' class='btn btn-primary'>Editar</a> 
                              <a href='excluir.php?id={$row['codGenero']}' class='btn btn-danger'>Excluir</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <br>
        <a href="index.php" class="btn btn-secondary">Voltar</a>
    </div>
    <!-- Adicionando script do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
