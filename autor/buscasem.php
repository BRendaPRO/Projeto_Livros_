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
    <script>
        function buscarAutores() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("buscaInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("autoresTable");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1]; // Index 1 corresponde ao nome do autor
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }       
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>CRUD de Autor</h1>
        <br>
        <a href="cadastro.php" class="btn btn-success">Adicionar autor</a><br><br>
        <input type="text" id="buscaInput" onkeyup="buscarAutores()" class="form-control" placeholder="Buscar autores...">
        <table class="table table-bordered" id="autoresTable">
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
                $stmt = $pdo->query('SELECT * FROM tbautor');
                while ($row = $stmt->fetch()) { //vai até o banco e retorna com todos os autores cadastrados
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
