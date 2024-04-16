-- 1
SELECT clientes_pizzaria.nome_cliente , clientes_pizzaria.email_cliente ,count(pedidos_pizzaria.id_pedido) AS n_pedidos FROM pedidos_pizzaria INNER JOIN clientes_pizzaria ON pedidos_pizzaria.cpf_cliente = clientes_pizzaria.cpf_cliente GROUP BY clientes_pizzaria.nome_cliente, clientes_pizzaria.email_cliente;

-- 2
SELECT nome_produto, count(pedidos_pizzaria.id_pedido) AS n_pedidos, ingredientes , valor_produto AS valor_unit, sum(valor_produto) AS faturamento 
FROM produtos_pizzaria
INNER JOIN pedidos_pizzaria ON produtos_pizzaria.nome_produto = pedidos_pizzaria.pizza 
GROUP BY produtos_pizzaria.nome_produto, produtos_pizzaria.ingredientes, produtos_pizzaria.valor_produto;

-- 3 
SELECT funcionarios_pizzaria.nomefun, funcionarios_pizzaria.cargofun FROM funcionarios_pizzaria;

-- 4
SELECT pedidos_pizzaria.status_pedido, funcionarios_pizzaria.nomefun FROM pedidos_pizzaria INNER JOIN funcionarios_pizzaria ON pedidos_pizzaria.codfun = funcionarios_pizzaria.idfun;

-- 5
SELECT clientes_pizzaria.nome_cliente, pedidos_pizzaria.status_pedido FROM pedidos_pizzaria INNER JOIN clientes_pizzaria ON clientes_pizzaria.cpf_cliente = pedidos_pizzaria.cpf_cliente GROUP BY clientes_pizzaria.nome_cliente, pedidos_pizzaria.status_pedido, pedidos_pizzaria.valor ORDER BY clientes_pizzaria.nome_cliente;

-- 6
SELECT produtos_pizzaria.nome_produto, produtos_pizzaria.ingredientes FROM produtos_pizzaria;

-- 7
SELECT * FROM pedidos_pizzaria WHERE status_pedido = 'CONCLUIDO';

-- 9
SELECT pizza, tamanho_pizza, produtos_pizzaria.valor_produto, status_pedido FROM pedidos_pizzaria INNER JOIN produtos_pizzaria ON pedidos_pizzaria.pizza = produtos_pizzaria.nome_produto AND pedidos_pizzaria.tamanho_pizza = produtos_pizzaria.tamanho ORDER BY tamanho_pizza;

-- 10
SELECT nome_produto, valor_produto FROM produtos_pizzaria;
