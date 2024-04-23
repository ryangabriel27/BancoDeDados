<?php
include 'functions.php';
// Conectar ao banco de dados PostgreSQL
$pdo = pdo_connect_pgsql();
// Obter a página via solicitação GET (parâmetro URL: page), se não existir, defina a página como 1 por padrão
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Número de registros para mostrar em cada página
$records_per_page = 5;

// Verifica se foi submetido um formulário de pesquisa
if (isset($_GET['search']) && isset($_GET['filtro'])) {
    $search = $_GET['search'];
    $filtro = $_GET['filtro'];

    // Monta a consulta SQL baseada no filtro selecionado
    $sql = "SELECT * FROM contatos WHERE $filtro LIKE ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["%$search%"]);
    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    // Consulta padrão caso não haja nenhum filtro selecionado
    $stmt = $pdo->query("SELECT * FROM contatos");
    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Obter o número total de contatos, isso é para determinar se deve haver um botão de próxima e anterior
$num_contacts = $pdo->query('SELECT COUNT(*) FROM contatos')->fetchColumn();
?>


<?= template_header('Visualizar Pedidos') ?>

<div class="content read">
    <form method="GET" action="search.php">
        <input type="text" name="search" id="search" placeholder="Pesquisar" />
        <select name="filtro">
            <option value="nome">Nome</option>
            <option value="pizza">Pizza</option>
            <option value="email">Email</option>
        </select>
        <button type="submit"><span><i class="fa-solid fa-magnifying-glass"></i>Buscar</span></button>
    </form>
    <table>
        <thead>
            <tr>
                <td>#</td>
                <td>Nome</td>
                <td>Email</td>
                <td>Celular</td>
                <td>Pizza</td>
                <td>Data do Pedido</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact) : ?>
                <tr>
                    <td><?= $contact['id_contato'] ?></td>
                    <td><?= $contact['nome'] ?></td>
                    <td><?= $contact['email'] ?></td>
                    <td><?= $contact['cel'] ?></td>
                    <td><?= $contact['pizza'] ?></td>
                    <td><?= $contact['cadastro'] ?></td>
                    <td class="actions">
                        <a href="update.php?id_contato=<?= $contact['id_contato'] ?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                        <a href="delete.php?id_contato=<?= $contact['id_contato'] ?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="pagination">
        <?php if ($page > 1) : ?>
            <a href="read.php?page=<?= $page - 1 ?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
        <?php endif; ?>
        <?php if ($page * $records_per_page < $num_contacts) : ?>
            <a href="read.php?page=<?= $page + 1 ?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
        <?php endif; ?>
    </div>
</div>

<?= template_footer() ?>