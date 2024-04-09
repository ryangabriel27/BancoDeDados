<?php
include 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzaria</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styleP.css">
</head>

<body>
    <?= header2() ?>
    <section class="main-cadastro">
        <div class="content update">
            <form action="cadastro_prod.php" method="POST">
                <label for="cNome">Nome:</label>
                <label for="cValor">Valor:</label>
                <input type="text" name="cNome" id="cNome" placeholder="Digite o nome do produto" /><br />
                <input type="text" name="cValor" id="cValor" placeholder="Digite o valor do produto" /><br>
                <label for="cCategoria">Categoria:</label>
                <label for="cIngr">Ingredientes:</label>
                <input type="text" name="cCategoria" id="cCategoria" placeholder="Digite a categoria do produto" /><br>
                <input type="text" name="cIngr" id="cIngr" placeholder="Digite os principais ingredientes" /><br>
                <label for="cTamanho">Tamanho:</label>
                <label for="cBorda">Borda:</label>
                <input type="text" name="cTamanho" id="cTamanho" placeholder="Digite o tamanho da pizza" /><br>
                <input type="text" name="cBorda" id="cBorda" placeholder="Digite a borda da pizza" /><br>
                <input type="submit" id="enviarDados"></input>
                <a href="searchProdutos.php" class="search-contact">Ver pedidos</a>
            </form>
        </div>
    </section>
</body>

</html>