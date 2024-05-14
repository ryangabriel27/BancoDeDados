INSERT INTO agencia (num_agencia, endereco, contato, cidade, id_carro)
VALUES ('001', 'Rua Principal, 123', '(11) 1234-5678', 'São Paulo', 1),('002', 'Avenida Central, 456', '(22) 9876-5432', 'Rio de Janeiro', 2);

INSERT INTO clientes (telefone, nome, cnh, cidade, estado, sobrenome, endereco, id_pagamento)
VALUES ('(11) 9999-8888', 'João', '123456789', 'São Paulo', 'SP', 'Silva', 'Rua das Flores, 789', 1),
       ('(22) 7777-6666', 'Maria', '987654321', 'Rio de Janeiro', 'RJ', 'Santos', 'Avenida das Palmeiras, 456', 2),
	   ('(33) 4444-3333', 'Ana', '555555555', 'Belo Horizonte', 'MG', 'Silveira', 'Rua das Pedras, 321', 3),
       ('(44) 3333-2222', 'Pedro', '666666666', 'Brasília', 'DF', 'Santana', 'Avenida dos Ventos, 654', 4),
       ('(55) 2222-1111', 'Mariana', '777777777', 'Porto Alegre', 'RS', 'Ferreira', 'Travessa das Flores, 987', 5);


INSERT INTO carros (marca, modelo, ano, placa, status, cor)
VALUES ('Toyota', 'Corolla', 2020, 'ABC1234', 'DISPONIVEL', 'Preto'),
       ('Honda', 'Civic', 2019, 'XYZ5678', 'DISPONIVEL', 'Branco');
	   
INSERT INTO carros (marca, modelo, ano, placa, status, cor)
VALUES ('Ford', 'Fiesta', 2018, 'DEF5678', 'DISPONIVEL', 'Azul'),
       ('Chevrolet', 'Onix', 2019, 'GHI7890', 'DISPONIVEL', 'Prata'),
       ('Volkswagen', 'Gol', 2021, 'JKL9012', 'DISPONIVEL', 'Vermelho');
	   
	   
INSERT INTO funcionarios (nome_funcionario, cargo_funcionario, salario_funcionario, num_agencia)
VALUES ('Carlos', 'Gerente', '5000.00', '001'),
       ('Ana', 'Atendente', '3000.00', '002'),
	   ('Fernanda', 'Atendente', '2800.00', '001'),
       ('Ricardo', 'Atendente', '2800.00', '002'),
       ('Marcela', 'Gerente', '5500.00', '001');

INSERT INTO pagamento (valor, forma_pagamento, status_pagamento, data_pagamento, id_registro, comprovante)
VALUES (200.00, 'Cartão de Crédito', 'Pago', '2024-05-05', 1, 'comprovante001'),
       (300.00, 'Dinheiro', 'Pendente', '2024-05-06', 2, 'comprovante002'),
	   (400.00, 'Transferência Bancária', 'Pago', '2024-05-05', 3, 'comprovante003'),
       (320.00, 'Cartão de Débito', 'Pendente', '2024-05-06', 4, 'comprovante004'),
       (280.00, 'Dinheiro', 'Pendente', '2024-05-07', 5, 'comprovante005');
	   
INSERT INTO manutencao (data_manutencao, tipo_manutencao, descricao, km, custo, id_carro)
VALUES ('2024-04-01', 'Preventiva', 'Troca de óleo e filtros', '15000', '100.00', 1),
       ('2024-05-01', 'Corretiva', 'Reparo no motor', '18000', '250.00', 2),
	   ('2024-04-15', 'Preventiva', 'Revisão completa', '20000', '150.00', 3),
       ('2024-05-15', 'Corretiva', 'Substituição de peças', '25000', '300.00', 4),
       ('2024-06-01', 'Preventiva', 'Troca de óleo', '30000', '80.00', 5);
	   
INSERT INTO feedback (comentario, avaliacao)
VALUES ('Ótimo atendimento!', '5 estrelas'),
       ('Carro em ótimo estado', '4 estrelas'),
	   ('Excelente serviço!', '5 estrelas'),
       ('Precisa melhorar o atendimento', '3 estrelas'),
       ('Carro sujo no momento da entrega', '2 estrelas');

INSERT INTO aluga (data_fim, data_inicio, valor_total, id_carro, id_cliente)
VALUES ('2024-05-10', '2024-05-05', 250.00, 1, 6),
       ('2024-05-15', '2024-05-07', 350.00, 2, 7),
	   ('2024-05-20', '2024-05-10', 450.00, 3, 8),
       ('2024-05-25', '2024-05-12', 380.00, 4, 9),
       ('2024-05-30', '2024-05-15', 300.00, 5, 10);
	   

INSERT INTO registra (id_cliente, id_feedback)
VALUES (6, 1),
       (7, 2),
       (8, 3);

