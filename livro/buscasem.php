<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Livros</title>
    <!-- Adicionando Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilo adicional para ocultar linhas da tabela */
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-4">CRUD de Livros</h1>
        <br>
        <a href="cadastro.php" class="btn btn-success">Adicionar livro</a><br><br>
        <input type="text" id="buscaInput" onkeyup="buscarLivros()" class="form-control" placeholder="Buscar livros...">
        <table class="table mt-4" id="livrosTable">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Código do livro</th>
                    <th scope="col">Nome do livro</th>
                    <th scope="col">Ano de lançamento do livro</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('conn.php');
                $stmt = $pdo->query('SELECT * FROM tbLivro');
                while ($row = $stmt->fetch()) {
                    echo "<tr>";
                    echo "<td>{$row['codLivro']}</td>";
                    echo "<td>{$row['nomeLivro']}</td>";
                    echo "<td>{$row['anoLancamento']}</td>";
                    echo "<td>
                              <a href='editar.php?id={$row['codLivro']}' class='btn btn-info'>Editar</a> 
                              <a href='excluir.php?id={$row['codLivro']}' class='btn btn-danger'>Excluir</a>
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
    <script>
        function buscarLivros() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("buscaInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("livrosTable");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1]; // Index 1 corresponde ao nome do livro
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].classList.remove("hidden");
                    } else {
                        tr[i].classList.add("hidden");
                    }
                }       
            }
        }
    </script>
</body>
</html>
