<?php
function pdo_connect_pgsql()
{
    $DATABASE_HOST = 'localhost';
    $DATABASE_PORT = '5432';
    $DATABASE_USER = 'postgres';
    $DATABASE_PASS = 'postgres';
    $DATABASE_NAME = 'turmabtarde';
    try {
        $pdo = new PDO('pgsql:host=' . $DATABASE_HOST . ';port=' . $DATABASE_PORT . ';dbname=' . $DATABASE_NAME . ';user=' . $DATABASE_USER . ';password=' . $DATABASE_PASS);
        // Define o modo de erro para Exception para que os erros sejam lançados e possam ser capturados.
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $exception) {
        // Log do erro ou exibição de mensagem mais detalhada.
        $errorDetails = 'Error details: ' . $exception->getMessage() . ' Code: ' . $exception->getCode();
        error_log('Failed to connect to database: ' . $errorDetails);
        exit('Failed to connect to database. Check error log for details. Debug: ' . $errorDetails);
    }
}

function template_header($title)
{
    echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="../css/styleP.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
    <nav class="navtop">
    	<div>
    		<h1>Pedidos - Pizzaria Azzip</h1>
            <a href="index.php"><i class="fas fa-home"></i>Inicio</a>
    		<a href="read.php"><i class="fas fa-shopping-basket"></i>Pedidos</a>
    	</div>
    </nav>
EOT;
}

function header2()
{
    echo <<<EOT
 <nav>
 <header>
     <div class="logo">
         <img src="../img/logoDouradaSemfundo.png" alt="">
     </div>
 </header>
</nav>
<section class="paginas">
 <a href="../produtos/cadastroProduto.php">
     <div class="produtos">
         <span>PRODUTOS</span>
     </div>
 </a>
 <a href="../funcionarios/readFuncionarios.php">
     <div class="produtos">
         <span>FUNCIONARIOS</span>
     </div>
 </a>
 <a href="../clientes/cadastroClientes.php">
     <div class="cadastro">
         <span>CADASTRO</span>
     </div>
 </a>
 <a href="../pedidos/createPedido.php">
 <div class="pedido">
     <span>PEDIDO</span>
 </div>
 </a>
</section>
EOT;
}

function template_footer()
{
    echo <<<EOT
    </body>
</html>
EOT;
}

?>
