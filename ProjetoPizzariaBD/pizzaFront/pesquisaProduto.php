<?php
require_once 'conectaBD_prod.php';

// Verifica se a pesquisa foi submetida
if (isset($_GET['query'])) {
    $search = $_GET['query'];

    // Escapar caracteres especiais para evitar injeção de SQL
    $search = pg_escape_string($conn, $search);

    // Consulta SQL para buscar resultados
    $sql = "SELECT * FROM produtos_pizzaria WHERE nome_produto ILIKE '%$search%'";
    $result = pg_query($conn, $sql);

    // Exibe os resultados
    if (pg_num_rows($result) > 0) {
        while ($row = pg_fetch_assoc($result)) {
            header('index.php');
            echo "<div> ID: " . $row["id"] . " - Nome: " . $row["nome"] . " - Valor: R$" . $row["valor_produto"] . " </div>";
            // Adicione outras colunas conforme necessário
        }
    } else {
        echo "Nenhum resultado encontrado.";
    }

    // Libera o resultado
    pg_free_result($result);
}
