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
</head>

<body>
    <?=header2()?>
    <section class="main-cadastro">
        <div class="container-cadastro">
            <div class="img-cadastro">
                <img src="img/logoSemFundo2.png" alt="">
            </div>
            <form action="cadastro_prod.php" method="POST">
                <label for="cNome">Digite o nome do produto:</label>
                <input type="text" name="cNome" id="cNome" placeholder="Digite seu nome" /><br />
                <label for="cValor">Digite o valor do produto:</label>
                <input type="text" name="cValor" id="cValor" placeholder="Digite o valor" /><br>
                <label for="cCategoria">Digite a categoria do produto:</label>
                <input type="text" name="cCategoria" id="cCategoria" placeholder="Digite a categoria" /><br>
                <label for="cIngr">Digite os ingredientes do produto:</label>
                <input type="text" name="cIngr" id="cIngr" placeholder="Digite os principais ingredientes" /><br>
                <label for="cTamanho">Digite o tamanho do produto:</label>
                <input type="text" name="cTamanho" id="cTamanho" placeholder="Digite o tamanho" /><br>
                <label for="cBorda">Digite a borda do produto:</label>
                <input type="text" name="cBorda" id="cBorda" placeholder="Digite a borda" /><br>
                <button type="submit" id="enviarDados">Cadastrar</button>
            </form>
        </div>
    </section>
</body>

</html>