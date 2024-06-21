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
        <h1 class="mt-4">CRUD de Gênero</h1>
        <br>
        <a href="cadastro.php" class="btn btn-primary">Adicionar gênero</a><br><br>
        <a href="buscasem.php" class="btn btn-secondary">Buscar sem botão</a><br>
        <a href="buscacom.php" class="btn btn-secondary">Buscar com botão</a><br>
        <table class="table mt-4">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Código do gênero</th>
                    <th scope="col">Gênero</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('conn.php');
                $stmt = $pdo->query('SELECT * FROM tbgenero');
                while ($row = $stmt->fetch()) { //vai até o banco e retorna com todos os alunos cadastrados
                    echo "<tr>";
                    echo "<td>{$row['codGenero']}</td>";
                    echo "<td>{$row['genero']}</td>";
                    echo "<td>
                              <a href='editar.php?id={$row['codGenero']}' class='btn btn-info'>Editar</a> 
                              <a href='excluir.php?id={$row['codGenero']}' class='btn btn-danger'>Excluir</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <br>
        <a href="../index.php" class="btn btn-secondary">Voltar</a>
    </div>
    <!-- Adicionando script do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
