<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Autor</title>
    <!-- Adicionando Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        table {
            width: 100%;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>CRUD de Autor</h1>
        <br>
        <!-- Formulário de busca por autor -->
        <form method="GET">
            <div class="form-group">
                <label for="busca">Buscar autor por código:</label>
                <input type="text" class="form-control" id="busca" name="codigo_autor">
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
        <br>
        <a href="cadastro.php" class="btn btn-success">Adicionar autor</a><br><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Código do autor</th>
                    <th scope="col">Nome do autor</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('conn.php');

                // Verifica se a busca foi realizada
                if(isset($_GET['codigo_autor']) && !empty($_GET['codigo_autor'])) {
                    $codigo_autor = $_GET['codigo_autor'];
                    $stmt = $pdo->prepare('SELECT * FROM tbautor WHERE codAutor = :codigo');
                    $stmt->bindParam(':codigo', $codigo_autor);
                    $stmt->execute();
                } else {
                    $stmt = $pdo->query('SELECT * FROM tbautor');
                }

                while ($row = $stmt->fetch()) {
                    echo "<tr>";
                    echo "<td>{$row['codAutor']}</td>";
                    echo "<td>{$row['nomeAutor']}</td>";
                    echo "<td>
                              <a href='editar.php?id={$row['codAutor']}' class='btn btn-primary'>Editar</a> 
                              <a href='excluir.php?id={$row['codAutor']}' class='btn btn-danger'>Excluir</a>
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
