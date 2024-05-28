INSERT INTO feedback (id_feedback, comentario, avaliacao, id_carro) VALUES
(1, 'Ótimo carro, muito confortável e econômico.', 5, 16),
(2, 'Carro em perfeitas condições, atendeu todas as expectativas.', 5, 17),
(3, 'Tive alguns problemas com o carro durante o aluguel.', 3, 18),
(4, 'Carro muito bom, mas precisa de melhorias na limpeza.', 4, 19),
(5, 'Excelente atendimento na agência, carro em bom estado.', 5, 20),
(6, 'Carro com alguns ruídos, precisa de manutenção.', 3, 21),
(7, 'Gostei do carro, mas esperava mais conforto.', 4, 22),
(8, 'Atendimento da agência deixou a desejar.', 2, 23),
(9, 'Carro estava sujo e com cheiro de cigarro.', 2, 24),
(10, 'Carro com desempenho abaixo do esperado.', 3, 25);

INSERT INTO funcionarios (id_funcionario, nome_funcionario, cargo_funcionario, salario_funcionario, num_agencia) VALUES
(1, 'Marcos Oliveira', 'Gerente', 8000.00, 1),
(2, 'Renata Silva', 'Atendente', 3000.00, 1),
(3, 'Felipe Santos', 'Gerente', 7500.00, 2),
(4, 'Laura Costa', 'Atendente', 2800.00, 2),
(5, 'Lucas Pereira', 'Mecânico', 3500.00, 3),
(6, 'Juliana Almeida', 'Atendente', 2900.00, 3),
(7, 'Gabriel Ferreira', 'Gerente', 7800.00, 1),
(8, 'Mariana Souza', 'Atendente', 3200.00, 1),
(9, 'André Oliveira', 'Mecânico', 3400.00, 2),
(10, 'Carla Lima', 'Atendente', 2700.00, 2);

INSERT INTO manutencao (id_manutencao, data_manutencao, tipo_manutencao, descricao, km, custo, id_carro) VALUES
(1, '2024-04-15', 'Preventiva', 'Troca de óleo e filtros', 15000, 300.00, 18),
(2, '2024-03-10', 'Corretiva', 'Substituição de pastilhas de freio', 20000, 450.00, 21),
(3, '2024-05-05', 'Preventiva', 'Alinhamento e balanceamento', 25000, 200.00, 22),
(4, '2024-02-20', 'Corretiva', 'Troca de correia dentada', 30000, 600.00, 23),
(5, '2024-04-10', 'Preventiva', 'Revisão geral', 35000, 500.00, 24),
(6, '2024-01-15', 'Corretiva', 'Substituição do radiador', 40000, 700.00, 25),
(7, '2024-03-30', 'Preventiva', 'Troca de óleo e filtros', 45000, 300.00, 27),
(8, '2024-02-25', 'Corretiva', 'Troca de suspensão', 50000, 800.00, 28),
(9, '2024-05-20', 'Preventiva', 'Revisão elétrica', 55000, 400.00, 29),
(10, '2024-04-05', 'Corretiva', 'Troca de pneus', 60000, 600.00, 30);

INSERT INTO pagamento (id_pagamento, valor, forma_pagament, status_pagamento, data_pagamento, id_registro, comprovante) VALUES
(1, 3500.00, 1, 'CONCLUÍDO', '2024-05-21', 1, 'comprovante1.jpg'),
(2, 3700.00, 2, 'CONCLUÍDO', '2024-06-01', 2, 'comprovante2.jpg'),
(3, 3800.00, 3, 'CONCLUÍDO', '2024-05-30', 3, 'comprovante3.jpg'),
(4, 3600.00, 4, 'CONCLUÍDO', '2024-05-27', 4, 'comprovante4.jpg'),
(5, 3400.00, 5, 'CONCLUÍDO', '2024-05-25', 5, 'comprovante5.jpg'),
(6, 3900.00, 6, 'CONCLUÍDO', '2024-06-02', 6, 'comprovante6.jpg'),
(7, 3200.00, 7, 'PENDENTE', '2024-05-20', 7, 'comprovante7.jpg'),
(8, 4500.00, 8, 'CONCLUÍDO', '2024-05-23', 8, 'comprovante8.jpg'),
(9, 3000.00, 9, 'PENDENTE', '2024-05-19', 9, 'comprovante9.jpg'),
(10, 2800.00, 10, 'CONCLUÍDO', '2024-05-18', 10, 'comprovante10.jpg');

INSERT INTO registra (id_cliente, id_feedback) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);

INSERT INTO reservas (id_reserva, data_reserva, data_devolucao, id_carro, id_cliente, status_reserva) VALUES
(6, '2024-06-01', '2024-06-05', 18, 1, 'Confirmada'),
(7, '2024-06-02', '2024-06-06', 22, 2, 'Pendente'),
(8, '2024-06-03', '2024-06-07', 24, 3, 'Confirmada'),
(9, '2024-06-04', '2024-06-08', 25, 4, 'Cancelada'),
(10, '2024-06-05', '2024-06-09', 27, 5, 'Confirmada'),
(11, '2024-06-06', '2024-06-10', 28, 6, 'Pendente'),
(12, '2024-06-07', '2024-06-11', 29, 7, 'Confirmada'),
(13, '2024-06-08', '2024-06-12', 30, 8, 'Cancelada'),
(14, '2024-06-09', '2024-06-13', 16, 9, 'Confirmada'),
(15, '2024-06-10', '2024-06-14', 17, 10, 'Pendente');

INSERT INTO clientes (telefone, nome, cnh, id_cliente, cidade, estado, sobrenome, endereco) VALUES
('11999998888', 'Gustavo', '654987321', 21, 'Curitiba', 'PR', 'Lima', 'Rua das Orquídeas'),
('21988887777', 'Mariana', '123789457', 22, 'Fortaleza', 'CE', 'Barbosa', 'Avenida Beira Mar'),
('31977776666', 'Roberto', '321654788', 23, 'Manaus', 'AM', 'Costa', 'Rua dos Jasmins'),
('41966665555', 'Patricia', '789456124', 24, 'Belém', 'PA', 'Rodrigues', 'Travessa das Flores'),
('51955554444', 'Lucas', '951357853', 25, 'Salvador', 'BA', 'Moura', 'Avenida Oceânica'),
('61944443333', 'Aline', '357951469', 26, 'Porto Alegre', 'RS', 'Silveira', 'Rua dos Jacarandás'),
('71933332222', 'Eduardo', '123654788', 27, 'Brasília', 'DF', 'Pinto', 'Quadra 305'),
('81922221111', 'Renata', '789321653', 28, 'Florianópolis', 'SC', 'Farias', 'Rua das Acácias'),
('91911110000', 'Carlos', '456789322', 29, 'Campo Grande', 'MS', 'Ferreira', 'Avenida Mato Grosso'),
('10120001010', 'Vanessa', '987321655', 30, 'Vitória', 'ES', 'Martins', 'Rua das Rosas'),
('11112345678', 'André', '321987655', 31, 'Goiânia', 'GO', 'Oliveira', 'Avenida Anhanguera'),
('12123456789', 'Beatriz', '789654124', 32, 'São Luís', 'MA', 'Duarte', 'Rua Grande'),
('13134567890', 'Fábio', '951123790', 33, 'Maceió', 'AL', 'Ramos', 'Avenida Fernandes Lima'),
('14145678901', 'Gabriela', '357123952', 34, 'João Pessoa', 'PB', 'Moreira', 'Rua das Trincheiras'),
('15156789012', 'Igor', '123789322', 35, 'Cuiabá', 'MT', 'Alves', 'Avenida Getúlio Vargas'),
('16167890123', 'Juliana', '789321988', 36, 'Teresina', 'PI', 'Mendes', 'Rua São Raimundo'),
('17178901234', 'Henrique', '456123788', 37, 'Natal', 'RN', 'Sousa', 'Rua João Pessoa'),
('18189012345', 'Larissa', '987456322', 38, 'Aracaju', 'SE', 'Cavalcante', 'Avenida Ivo do Prado'),
('19190123456', 'Marcelo', '321654988', 39, 'Boa Vista', 'RR', 'Lopes', 'Rua Cecília Brasil'),
('20201234567', 'Sofia', '789123457', 40, 'Palmas', 'TO', 'Gomes', 'Avenida JK'),
('21212345678', 'Tiago', '951456124', 41, 'Macapá', 'AP', 'Pereira', 'Rua Cândido Mendes'),
('22223456789', 'Amanda', '357456788', 42, 'Porto Velho', 'RO', 'Cruz', 'Avenida Carlos Gomes'),
('23234567890', 'Fernando', '123456988', 43, 'Ribeirão Preto', 'SP', 'Nascimento', 'Rua São Paulo'),
('24245678901', 'Débora', '789123655', 44, 'Sorocaba', 'SP', 'Almeida', 'Avenida Dom Aguirre'),
('25256789012', 'Ricardo', '456987322', 45, 'Uberlândia', 'MG', 'Silva', 'Rua Santos Dumont'),
('26267890123', 'Tatiana', '987654322', 46, 'Bauru', 'SP', 'Carvalho', 'Avenida Nações Unidas'),
('27278901234', 'João', '321987656', 47, 'Franca', 'SP', 'Souza', 'Rua do Comércio'),
('28289012345', 'Ana', '789654125', 48, 'Campinas', 'SP', 'Santos', 'Avenida Francisco Glicério'),
('29290123456', 'Miguel', '951123655', 49, 'Jundiaí', 'SP', 'Lima', 'Rua do Retiro'),
('30301234567', 'Bruno', '357951124', 50, 'Piracicaba', 'SP', 'Barbosa', 'Rua Alferes José Caetano'),
('31312345678', 'Mariana', '123789458', 51, 'Osasco', 'SP', 'Rodrigues', 'Avenida dos Autonomistas'),
('32323456789', 'Caio', '789456322', 52, 'Santos', 'SP', 'Costa', 'Avenida Ana Costa'),
('33334567890', 'Livia', '456789988', 53, 'Diadema', 'SP', 'Ferreira', 'Avenida 7 de Setembro'),
('34345678901', 'Mateus', '987654788', 54, 'Carapicuíba', 'SP', 'Martins', 'Rua Rui Barbosa'),
('35356789012', 'Bárbara', '321789458', 55, 'São José dos Campos', 'SP', 'Oliveira', 'Avenida São João');


INSERT INTO agencia (num_agencia, endereco, contato, cidade) VALUES
(14, 'Av. Paulista, 2000', '(11) 5432-1098', 'São Paulo'),
(15, 'Rua dos Girassóis, 100', '(92) 9876-5432', 'Manaus'),
(16, 'Av. Beira Mar, 1500', '(48) 7654-3210', 'Florianópolis'),
(17, 'Rua dos Coqueiros, 1300', '(81) 3210-9876', 'Recife'),
(18, 'Av. Rio Branco, 1600', '(62) 5432-1098', 'Goiânia'),
(19, 'Rua das Rosas, 700', '(31) 9876-5432', 'Belo Horizonte'),
(20, 'Av. Copacabana, 2000', '(21) 1234-5678', 'Rio de Janeiro'),
(21, 'Av. Brasil, 3000', '(21) 5432-1098', 'Rio de Janeiro'),
(22, 'Rua das Orquídeas, 500', '(11) 8765-4321', 'São Paulo'),
(23, 'Av. da Praia, 600', '(81) 9012-3456', 'Recife'),
(24, 'Rua das Margaridas, 700', '(41) 1098-7654', 'Curitiba'),
(25, 'Av. Bonfim, 800', '(71) 4321-0987', 'Salvador'),
(26, 'Rua da Paz, 900', '(51) 6789-0123', 'Porto Alegre');

INSERT INTO carros (marca, modelo, ano, placa, status, id_carro, cor, valor_carro, disponibilidade, num_agencia) VALUES
('Hyundai', 'HB20', 2019, 'ABC0001', 'BOM', 41, 'Prata', 60000.00, 'DISPONIVEL', 1),
('Kia', 'Seltos', 2020, 'DEF0001', 'BOM', 42, 'Branco', 70000.00, 'DISPONIVEL', 2),
('Renault', 'Sandero', 2018, 'GHI0001', 'NECESSARIO MANUTENCAO', 43, 'Vermelho', 55000.00, 'DISPONIVEL', 3),
('Fiat', 'Mobi', 2017, 'JKL0001', 'EM MANUTENCAO', 44, 'Azul', 45000.00, 'DISPONIVEL', 1),
('Volkswagen', 'Gol', 2016, 'MNO0001', 'BOM', 45, 'Preto', 50000.00, 'ALUGADO', 2),
('Chevrolet', 'Onix', 2015, 'PQR0001', 'NECESSARIO MANUTENCAO', 46, 'Cinza', 48000.00, 'DISPONIVEL', 3),
('Ford', 'Ka', 2022, 'STU0001', 'EM MANUTENCAO', 47, 'Preto', 65000.00, 'ALUGADO', 1),
('Toyota', 'Etios', 2019, 'VWX0001', 'BOM', 48, 'Branco', 68000.00, 'DISPONIVEL', 2),
('Honda', 'Fit', 2018, 'YZA0001', 'NECESSARIO MANUTENCAO', 49, 'Vermelho', 60000.00, 'DISPONIVEL', 3),
('Hyundai', 'HB20S', 2017, 'BCD0001', 'EM MANUTENCAO', 50, 'Prata', 62000.00, 'DISPONIVEL', 1),
('Kia', 'Rio', 2016, 'EFG0001', 'BOM', 51, 'Azul', 70000.00, 'ALUGADO', 2),
('Renault', 'Logan', 2020, 'HIJ0001', 'NECESSARIO MANUTENCAO', 52, 'Preto', 58000.00, 'DISPONIVEL', 3),
('Fiat', 'Uno', 2015, 'KLM0001', 'EM MANUTENCAO', 53, 'Branco', 40000.00, 'DISPONIVEL', 1),
('Volkswagen', 'Fox', 2014, 'NOP0001', 'BOM', 54, 'Vermelho', 55000.00, 'ALUGADO', 2),
('Chevrolet', 'Celta', 2021, 'QRS0001', 'NECESSARIO MANUTENCAO', 55, 'Preto', 46000.00, 'DISPONIVEL', 3);

INSERT INTO carros (marca, modelo, ano, placa, status, id_carro, cor, valor_carro, disponibilidade, num_agencia) VALUES
('Ford', 'Fiesta', 2019, 'TUV0001', 'BOM', 56, 'Azul', 62000.00, 'DISPONIVEL', 1),
('Toyota', 'Yaris', 2018, 'WXY0001', 'NECESSARIO MANUTENCAO', 57, 'Branco', 64000.00, 'DISPONIVEL', 2),
('Honda', 'City', 2017, 'JKL0002', 'EM MANUTENCAO', 58, 'Prata', 60000.00, 'ALUGADO', 3),
('Hyundai', 'Creta', 2020, 'MNO0002', 'BOM', 59, 'Vermelho', 75000.00, 'DISPONIVEL', 1),
('Kia', 'Sportage', 2019, 'PQR0002', 'NECESSARIO MANUTENCAO', 60, 'Preto', 80000.00, 'DISPONIVEL', 2),
('Renault', 'Duster', 2018, 'STU0002', 'EM MANUTENCAO', 61, 'Branco', 70000.00, 'ALUGADO', 3),
('Fiat', 'Argo', 2017, 'VWX0002', 'BOM', 62, 'Cinza', 65000.00, 'DISPONIVEL', 1),
('Volkswagen', 'Voyage', 2016, 'YZA0002', 'NECESSARIO MANUTENCAO', 63, 'Azul', 58000.00, 'DISPONIVEL', 2),
('Chevrolet', 'Prisma', 2022, 'BCD0002', 'BOM', 64, 'Preto', 68000.00, 'ALUGADO', 3),
('Ford', 'Ranger', 2019, 'EFG0002', 'EM MANUTENCAO', 65, 'Vermelho', 90000.00, 'DISPONIVEL', 1);

INSERT INTO carros (marca, modelo, ano, placa, status, id_carro, cor, valor_carro, disponibilidade, num_agencia) VALUES
('Toyota', 'Etios', 2018, 'HIJ0002', 'BOM', 66, 'Prata', 60000.00, 'ALUGADO', 4),
('Honda', 'Fit', 2017, 'KLM0002', 'EM MANUTENCAO', 67, 'Preto', 55000.00, 'DISPONIVEL', 5),
('Hyundai', 'HB20', 2019, 'NOP0002', 'BOM', 68, 'Azul', 62000.00, 'DISPONIVEL', 6),
('Kia', 'Picanto', 2020, 'QRS0002', 'NECESSARIO MANUTENCAO', 69, 'Vermelho', 64000.00, 'DISPONIVEL', 7),
('Renault', 'Sandero', 2018, 'TUV0003', 'BOM', 70, 'Branco', 58000.00, 'ALUGADO', 8),
('Fiat', 'Uno', 2017, 'WXY0003', 'EM MANUTENCAO', 71, 'Cinza', 55000.00, 'DISPONIVEL', 9),
('Volkswagen', 'Fox', 2019, 'JKL0003', 'BOM', 72, 'Azul', 62000.00, 'DISPONIVEL', 10),
('Chevrolet', 'Onix', 2020, 'MNO0003', 'NECESSARIO MANUTENCAO', 73, 'Preto', 67000.00, 'ALUGADO', 11),
('Ford', 'Ka', 2018, 'PQR0003', 'BOM', 74, 'Vermelho', 58000.00, 'DISPONIVEL', 12),
('Toyota', 'Hilux', 2017, 'STU0003', 'EM MANUTENCAO', 75, 'Branco', 85000.00, 'DISPONIVEL', 13);

INSERT INTO carros (marca, modelo, ano, placa, status, id_carro, cor, valor_carro, disponibilidade, num_agencia) VALUES
('Honda', 'City', 2018, 'BCD0003', 'BOM', 76, 'Prata', 75000.00, 'ALUGADO', 14),
('Hyundai', 'Creta', 2019, 'EFG0003', 'EM MANUTENCAO', 77, 'Preto', 78000.00, 'DISPONIVEL', 15),
('Kia', 'Seltos', 2020, 'HIJ0003', 'BOM', 78, 'Vermelho', 80000.00, 'ALUGADO', 16),
('Renault', 'Logan', 2017, 'KLM0003', 'NECESSARIO MANUTENCAO', 79, 'Branco', 65000.00, 'DISPONIVEL', 17),
('Fiat', 'Mobi', 2018, 'NOP0003', 'BOM', 80, 'Azul', 58000.00, 'DISPONIVEL', 18),
('Volkswagen', 'Virtus', 2019, 'QRS0003', 'NECESSARIO MANUTENCAO', 81, 'Preto', 72000.00, 'ALUGADO', 19),
('Chevrolet', 'Spin', 2020, 'TUV0004', 'EM MANUTENCAO', 82, 'Branco', 85000.00, 'DISPONIVEL', 20),
('Ford', 'EcoSport', 2017, 'WXY0004', 'BOM', 83, 'Prata', 68000.00, 'DISPONIVEL', 21),
('Toyota', 'SW4', 2019, 'JKL0004', 'NECESSARIO MANUTENCAO', 84, 'Azul', 95000.00, 'ALUGADO', 22),
('Honda', 'WR-V', 2020, 'MNO0004', 'BOM', 85, 'Preto', 82000.00, 'DISPONIVEL', 23);


INSERT INTO aluga (id_carro, cpf_cliente, data_inicio, data_fim) VALUES
(38, '78901234567', '2024-05-28', '2024-06-28'),
(41, '89012345678', '2024-05-28', '2024-06-28'),
(45, '90123456789', '2024-05-28', '2024-06-28'),
(50, '01234567890', '2024-05-28', '2024-06-28'),
(55, '12345678901', '2024-05-28', '2024-06-28'),
(59, '23456789012', '2024-05-28', '2024-06-28'),
(62, '34567890123', '2024-05-28', '2024-06-28'),
(67, '45678901234', '2024-05-28', '2024-06-28'),
(70, '56789012345', '2024-05-28', '2024-06-28'),
(76, '67890123456', '2024-05-28', '2024-06-28'),
(78, '78901234567', '2024-05-28', '2024-06-28'),
(82, '89012345678', '2024-05-28', '2024-06-28'),
(85, '90123456789', '2024-05-28', '2024-06-28'),
(90, '01234567890', '2024-05-28', '2024-06-28');

INSERT INTO aluga (data_fim, data_inicio, id_aluguel, valor_total, id_carro, id_cliente) VALUES
('2024-07-30', '2024-07-20', 11, 3900.00, 39, 11),
('2024-08-05', '2024-07-25', 12, 3700.00, 40, 12),
('2024-08-10', '2024-08-01', 13, 3800.00, 41, 13),
('2024-08-15', '2024-08-05', 14, 3600.00, 42, 14),
('2024-08-20', '2024-08-10', 15, 3400.00, 43, 15),
('2024-08-25', '2024-08-15', 16, 3900.00, 44, 16),
('2024-08-30', '2024-08-20', 17, 3500.00, 45, 17),
('2024-09-05', '2024-08-25', 18, 3700.00, 46, 18),
('2024-09-10', '2024-09-01', 19, 3800.00, 47, 19),
('2024-09-15', '2024-09-05', 20, 3600.00, 48, 20);

INSERT INTO aluga (data_fim, data_inicio, id_aluguel, valor_total, id_carro, id_cliente) VALUES
('2023-12-15', '2023-12-05', 41, 3400.00, 16, 26),
('2023-12-20', '2023-12-10', 42, 3600.00, 18, 28),
('2023-12-25', '2023-12-15', 43, 3500.00, 20, 30),
('2023-12-30', '2023-12-20', 44, 3300.00, 22, 32),
('2024-01-05', '2023-12-25', 45, 3700.00, 24, 34),
('2024-01-10', '2024-01-01', 46, 3800.00, 26, 29),
('2024-01-15', '2024-01-05', 47, 3600.00, 28, 31),
('2024-01-20', '2024-01-10', 48, 3400.00, 30, 27),
('2024-01-25', '2024-01-15', 49, 3900.00, 32, 33),
('2024-02-01', '2024-01-20', 50, 3700.00, 34, 25);

SELECT clientes.nome AS cliente_nome, carros.marca, carros.modelo, carros.placa, aluga.data_inicio, aluga.data_fim 
                      FROM aluga 
                      INNER JOIN clientes ON aluga.id_cliente = clientes.id_cliente 
                      INNER JOIN carros ON aluga.id_carro = carros.id_carro
                      ORDER BY clientes.id_cliente


SELECT * FROM aluga WHERE data_inicio >= '2024-06-01' AND data_fim <= '2024-07-01' ORDER BY data_inicio

SELECT * FROM clientes









