<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styleIndex.css">
</head>

<body>
    <nav>
        <header>
            <div class="logo">
                <img src="img/logoDouradaSemfundo.png" alt="">
            </div>
        </header>
    </nav>
    <section class="paginas">
        <a href="cadastroProduto.php">
            <div class="produtos">
                <span>PRODUTOS</span>
            </div>
        </a>
        <a href="cadastroClientes.php">
            <div class="cadastro">
                <span>CADASTRO</span>
            </div>
        </a>
        <div class="carrinho">
            <span>CARRINHO</span>
        </div>
    </section>
    <div class="main-index">
        <form action="pesquisaProduto.php" method="post">
            <label for="pesquisaProd">Pesquise um produto:</label>
            <input type="text" id="query">
            <button type="submit">Buscar</button>
        </form>
    </div>
</body>

</html>