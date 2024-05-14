SELECT * FROM carros WHERE status = 'DISPONIVEL';

SELECT aluga.id_cliente FROM aluga;

SELECT * FROM funcionarios WHERE num_agencia = '001';

SELECT id_pagamento FROM clientes WHERE id_cliente = 1;

SELECT * FROM carros WHERE status = 'NECESSARIO MANUTENCAO' ;

SELECT clientes.id_cliente ,clientes.nome, count(aluga.id_cliente) as n_carros_alugados FROM clientes INNER JOIN aluga ON clientes.id_cliente = aluga.id_cliente GROUP BY clientes.nome, clientes.id_cliente ORDER BY n_carros_alugados

SELECT aluga.id_carro FROM aluga INNER JOIN clientes ON clientes.id_cliente = aluga.id_cliente INNER JOIN agencia ON clientes.cidade = agencia.cidade;

ALTER TABLE carros
ADD valor_carro DECIMAL(7,2);

ALTER TABLE carros
ADD disponibilidade VARCHAR(255) DEFAULT('DISPONIVEL');

ALTER TABLE carros 
ADD num_agencia VARCHAR(5);

UPDATE carros SET num_agencia = '001' WHERE id_carro IN (1, 2, 3);
UPDATE carros SET num_agencia = '002' WHERE id_carro IN (4, 5, 6);

ALTER TABLE carros ADD FOREIGN KEY(num_agencia) REFERENCES agencia(num_agencia);

ALTER TABLE feedback
ADD id_carro INTEGER

UPDATE feedback SET id_carro = 1 WHERE id_feedback = 1;
UPDATE feedback SET id_carro = 2 WHERE id_feedback = 4;
UPDATE feedback SET id_carro = 3 WHERE id_feedback = 3;
UPDATE feedback SET id_carro = 4 WHERE id_feedback = 2;
UPDATE feedback SET id_carro = 5 WHERE id_feedback = 5;


ALTER TABLE feedback ADD FOREIGN KEY(id_carro) REFERENCES carros(id_carro);

-- UPDATE
UPDATE carros
SET valor_carro = 90000.00
WHERE carros.marca = 'Toyota';

SELECT * FROM carros

UPDATE aluga
SET data_fim = '2024-09-06'
WHERE aluga.id_cliente = 5;

SELECT * FROM aluga

UPDATE carros
SET status = 'LIVRE'
WHERE id_carro = 1

SELECT * FROM carros

-- JOIN

SELECT clientes.nome, carros.modelo, aluga.data_inicio, aluga.data_fim FROM aluga INNER JOIN clientes ON clientes.id_cliente = aluga.id_cliente INNER JOIN carros ON carros.id_carro = aluga.id_carro GROUP BY clientes.nome, carros.modelo, aluga.data_inicio, aluga.data_fim

SELECT clientes.nome, pagamento.valor, pagamento.forma_pagamento FROM pagamento INNER JOIN clientes ON clientes.id_pagamento = pagamento.id_pagamento

SELECT clientes.nome, feedback.comentario, feedback.avaliacao  FROM registra INNER JOIN clientes ON clientes.id_cliente = registra.id_cliente INNER JOIN feedback ON feedback.id_feedback = registra.id_feedback

SELECT * FROM feedback

-- INNER JOIN

SELECT * FROM carros WHERE disponibilidade = 'DISPONIVEL' AND num_agencia = '001'

SELECT * FROM aluga INNER JOIN clientes ON clientes.id_cliente = aluga.id_cliente WHERE clientes.cidade = 'São Paulo'

SELECT funcionarios.* FROM funcionarios INNER JOIN agencia ON funcionarios.num_agencia = agencia.num_agencia INNER JOIN carros ON carros.num_agencia = agencia.num_agencia WHERE carros.marca = 'Toyota';


-- LEFT JOIN

SELECT carros.*, feedback.comentario, feedback.avaliacao FROM carros LEFT JOIN feedback ON feedback.id_carro = carros.id_carro

SELECT * FROM carros

SELECT agencia.*, count(carros.id_carro) as n_carros FROM carros INNER JOIN agencia ON carros.num_agencia = agencia.num_agencia GROUP BY agencia.num_agencia




