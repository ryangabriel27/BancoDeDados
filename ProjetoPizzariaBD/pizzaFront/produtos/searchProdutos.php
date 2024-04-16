<?php
include '../functions.php';
// Conectar ao banco de dados PostgreSQL
include 'conectaBD_prod.php';
// Obter a página via solicitação GET (parâmetro URL: page), se não existir, defina a página como 1 por padrão
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Número de registros para mostrar em cada página
$records_per_page = 5;

if (isset($_GET['search']) && isset($_GET['filtro'])) {
    $search = $_GET['search'];
    $filtro = $_GET['filtro'];

    // Monta a consulta SQL baseada no filtro selecionado
    $sql = "SELECT * FROM produtos_pizzaria WHERE $filtro LIKE ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["%$search%"]);
    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    // Consulta padrão caso não haja nenhum filtro selecionado
    $stmt = $pdo->query("SELECT * FROM produtos_pizzaria");
    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
// Obter o número total de produtos_pizzaria, isso é para determinar se deve haver um botão de próxima e anterior
$num_contacts = $pdo->query('SELECT COUNT(*) FROM produtos_pizzaria')->fetchColumn();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="../css/styleP.css">
</head>
<body>

<?= header2() ?>
<div class="content read">
    <form method="GET" action="searchProdutos.php">
        <input type="text" name="search" id="search" placeholder="Pesquisar" />
        <select name="filtro">
            <option value="nome_produto">Nome</option>
            <option value="tamanho">Tamanho</option>
            <option value="borda">Borda</option>
            <option value="ingredientes">Ingredientes</option>
            <option value="categoria_produto">Categoria</option>
        </select>
        <button type="submit" class="create-contact"><span><i class="fa-solid fa-magnifying-glass"></i>Buscar</span></button>
    </form>
    <table>
        <thead>
            <tr>
                <td>#</td>
                <td>Nome</td>
                <td>Valor</td>
                <td>Categoria</td>
                <td>Ingredientes</td>
                <td>Borda</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact) : ?>
                <tr>
                    <td><?= $contact['id_produto'] ?></td>
                    <td><?= $contact['nome_produto'] ?></td>
                    <td><?= $contact['valor_produto'] ?></td>
                    <td><?= $contact['categoria_produto'] ?></td>
                    <td><?= $contact['ingredientes'] ?></td>
                    <td><?= $contact['borda'] ?></td>
                    <td class="actions">
                        <a href="updateProduto.php?id_produto=<?= $contact['id_produto'] ?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                        <a href="deleteProduto.php?id_produto=<?= $contact['id_produto'] ?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="pagination">
        <?php if ($page > 1) : ?>
            <a href="searchProdutos.php?page=<?= $page - 1 ?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
        <?php endif; ?>
        <?php if ($page * $records_per_page < $num_contacts) : ?>
            <a href="searchProdutos.php?page=<?= $page + 1 ?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
        <?php endif; ?>
    </div>
</div>
</body>
</html>