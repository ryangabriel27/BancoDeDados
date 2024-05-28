<?php
include '../functions.php';
// Conectar ao banco de dados PostgreSQL
$pdo = pdo_connect_pgsql();

$tabela_resultados = "";

if (isset($_POST['cnh'])) {
    $cnh = $_POST['cnh'];
    try {
        // Consulta para buscar os carros alugados e as datas de aluguel
        $sql = "
        SELECT clientes.nome AS nome_cliente , carros.marca, carros.modelo, carros.placa, aluga.data_inicio, aluga.data_fim
        FROM clientes
        INNER JOIN aluga ON clientes.id_cliente = aluga.id_cliente
        INNER JOIN carros ON carros.id_carro = aluga.id_carro
        WHERE clientes.cnh = :cnh
        ";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':cnh', $cnh);
        $stmt->execute();

        $alugueis = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($alugueis) {
            $tabela_resultados .= "<h2>Carros alugados por {$alugueis[0]['nome_cliente']}:</h2>";
            $tabela_resultados .= "<table border='1'>";
            $tabela_resultados .= "<thead><tr><td>Marca</td><td>Modelo</td><td>Placa</td><td>Data de Início</td><td>Data de Fim</td></tr></thead>";

            foreach ($alugueis as $aluguel) {
                $tabela_resultados .= "<tr>";
                $tabela_resultados .= "<td>{$aluguel['marca']}</td>";
                $tabela_resultados .= "<td>{$aluguel['modelo']}</td>";
                $tabela_resultados .= "<td>{$aluguel['placa']}</td>";
                $tabela_resultados .= "<td>{$aluguel['data_inicio']}</td>";
                $tabela_resultados .= "<td>{$aluguel['data_fim']}</td>";
                $tabela_resultados .= "</tr>";
            }

            $tabela_resultados .= "</table>";
        } else {
            $tabela_resultados .= "Nenhum carro alugado por este cliente.";
        }
    } catch (PDOException $e) {
        $tabela_resultados .= "Erro: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?= template_head2("Pesquisar Cliente") ?>
    <link rel="stylesheet" href="../css/styleCadastro.css">
    <link rel="stylesheet" href="../css/styleRead.css">
</head>

<body>
    <?= template_header2() ?>
    <div class="content read">
        <form method="post" action="searchCliente.php">
            <label for="cnh">CNH do Cliente:</label>
            <input type="text" id="cnh" name="cnh" required>
            <button type="submit">Consultar</button>
        </form>

        <?= $tabela_resultados ?>
    </div>
    <?= template_footer() ?>
</body>

</html>