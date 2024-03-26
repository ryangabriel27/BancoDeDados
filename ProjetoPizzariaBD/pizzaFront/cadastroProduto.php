<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzaria</title>
    <link rel="stylesheet" href="style.css">
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
    <section class="main-cadastro">
        <div class="container-cadastro">
            <div class="img-cadastro">
                <img src="img/logoSemFundo2.png" alt="">
            </div>
            <form action="cadastro_prod.php" method="POST">
                <label for="cNome">Digite o nome do produto:</label>
                <input type="text" name="cNome" id="cNome" placeholder="Digite seu nome" /><br />
                <label for="cValor">Digite o valor do produto:</label>
                <input type="text" name="cValor" id="cValor" placeholder="Digite seu e-mail" /><br>
                <label for="cCategoria">Digite a categoria do produto:</label>
                <input type="text" name="cCategoria" id="cCategoria" placeholder="Digite seu CPF" /><br>
                <label for="cIngr">Digite os ingredientes do produto:</label>
                <input type="text" name="cIngr" id="cIngr" placeholder="Digite sua idade" /><br>
                <label for="cTamanho">Digite o tamanho do produto:</label>
                <input type="text" name="cTamanho" id="cTamanho" placeholder="Digite seu endereço" /><br>
                <label for="cBorda">Digite a borda do produto:</label>
                <input type="text" name="cBorda" id="cBorda" placeholder="Digite sua senha" /><br>
                <button type="submit" id="enviarDados">Cadastrar</button>
            </form>
        </div>
    </section>
</body>

</html>