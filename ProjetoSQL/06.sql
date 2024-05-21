CREATE TABLE reservas (
    id_reserva SERIAL PRIMARY KEY,
    data_reserva DATE NOT NULL,
    data_devolucao DATE NOT NULL,
    id_carro INT NOT NULL,
    id_cliente INT NOT NULL,
    status_reserva VARCHAR(50) NOT NULL,
    FOREIGN KEY (id_carro) REFERENCES carros(id_carro),
    FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente)
);

INSERT INTO reservas (data_reserva, data_devolucao, id_carro, id_cliente, status_reserva) VALUES
('2024-05-20', '2024-05-25', 17, 1, 'Confirmada'),
('2024-05-22', '2024-05-28', 19, 2, 'Pendente'),
('2024-05-23', '2024-05-29', 20, 3, 'Confirmada'), 
('2024-05-24', '2024-05-30', 21, 4, 'Cancelada'),
('2024-05-25', '2024-06-01', 23, 5, 'Confirmada');




--1 
SELECT * FROM clientes

--4
SELECT * FROM funcionarios

--5
SELECT clientes.* FROM carros INNER JOIN aluga ON carros.id_carro = aluga.id_carro INNER JOIN clientes ON clientes.id_cliente = aluga.id_cliente WHERE carros.placa = 'ABC1234'

--6
SELECT carros.* FROM clientes INNER JOIN aluga ON clientes.id_cliente = aluga.id_cliente INNER JOIN carros ON carros.id_carro = aluga.id_carro WHERE clientes.id_cliente = 1;

--12
SELECT clientes.id_cliente, clientes.nome, clientes.sobrenome, carros.marca, carros.modelo, carros.ano
FROM clientes
LEFT JOIN aluga ON clientes.id_cliente = aluga.id_cliente
LEFT JOIN carros ON carros.id_carro = aluga.id_carro;

--14
SELECT * FROM reservas




