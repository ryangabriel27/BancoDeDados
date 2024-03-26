CREATE DATABASE db_ex3;

-- Tabelas

CREATE TABLE cliente(
    codigo INT NOT NULL,
    nome VARCHAR(20) NOT NULL,
    endereco VARCHAR(20) NOT NULL,
    cep char(8) NOT NULL,
    uf char(2) NOT NULL,
    cnpj char(20) NOT NULL,
    ie char(20) NOT NULL,
    PRIMARY KEY(codigo)
);

CREATE TABLE vendedor(
    codigo INT NOT NULL,
    nome VARCHAR(20) NOT NULL,
    salario DECIMAL(7,2) NOT NULL,
    fsalarial CHAR(1) NOT NULL,
    PRIMARY KEY(codigo)
);

CREATE TABLE cadfun(
    codfun int not null primary key,
    nome varchar(40) not null,
    depto char(2),
    funcao char(20),
    salario NUMERIC(10,2)
);

-- Inserindo dados
INSERT INTO cliente
VALUES 
    (1, 'João Silva', 'Rua das Flores, 123', '12345678', 'SP', '12345678901234', '1234567890'),
    (2, 'Maria Oliveira', 'Av. Brasil, 456', '23456789', 'RJ', '23456789012345', '2345678901'),
    (3, 'José Santos', 'Rua do Comércio, 789', '34567890', 'MG', '34567890123456', '3456789012'),
    (4, 'Ana Souza', 'Rua Principal, 012', '45678901', 'RS', '45678901234567', '4567890123'),
    (5, 'Carlos Ferreira', 'Av. Central, 345', '56789012', 'BA', '56789012345678', '5678901234');

INSERT INTO vendedor
VALUES 
    (1, 'Pedro Oliveira', 3000.00, 'M'),
    (2, 'Fernanda Santos', 3500.00, 'M'),
    (3, 'Lucas Costa', 3200.00, 'M'),
    (4, 'Mariana Silva', 3100.00, 'M'),
    (5, 'Gustavo Pereira', 3300.00, 'M');

INSERT INTO cadfun
VALUES 
    (101, 'Ana Clara', 'VS', 'Vendedor', 3000.00),
    (102, 'Paulo Vieira', 'VS', 'Vendedor', 3200.00),
    (103, 'Camila Oliveira', 'RH', 'Recursos Humanos', 3500.00),
    (104, 'Ricardo Santos', 'TI', 'Técnico', 3300.00),
    (105, 'Márcia Costa', 'FI', 'Contadora', 3400.00);
INSERT INTO cadfun VALUES(106, 'Ryan Gabriel', 'TI', 'Analista', 3600.00);

ALTER TABLE cadfun
ADD COLUMN n_filhos INT; -- Adicionando a coluna n_filhos

UPDATE cadfun
 SET n_filhos = codfun - 100;  -- Colocando um valor aleatorio para aqueles que ja estavam na tabela

INSERT INTO cadfun (codfun, nome, depto, funcao, salario, n_filhos)  -- Inserindo dados na tabelas após adicionar o campo n_filhos
VALUES 
    (111, 'Ana Oliveira', 'VD', 'Gerente', 7000.00, 0),
    (112, 'Carlos Silva', 'VD', 'Analista', 3900.00, 0),
    (113, 'Laura Santos', 'RH', 'Analista', 3500.00, 2),
    (114, 'André Costa', 'TI', 'Programador', 3300.00, 0),
    (115, 'Mariana Ferreira', 'RH', 'Estagiária', 1700.00, 0),
    (116, 'Marina Pereira', 'FI', 'Contador', 3400.00, 1);

-- Selecionando dados

-- 7.
SELECT codfun, nome, salario+250 as salario_proj FROM cadfun;

-- 8.
SELECT * FROM cadfun WHERE funcao = 'Analista';

-- 9.
SELECT * FROM cadfun WHERE salario > 1700.00;

-- 10
SELECT * FROM cadfun WHERE salario < 1700.00;

-- 11
SELECT * FROM cadfun WHERE salario = 1700.00;

-- 12
SELECT * FROM cadfun WHERE funcao = 'Programador' OR funcao = 'Analista' ORDER BY funcao;
-- OU
SELECT * FROM cadfun WHEN funcao IN ('Programador', 'Analista') ORDER BY funcao;

-- 13
SELECT * FROM cadfun WHERE ((funcao = 'Programador') OR (funcao = 'Analista')) AND salario > 1200.00 ORDER BY funcao;
-- OU
SELECT * FROM cadfun WHERE funcao IN ('Programador','Analista') AND (salario > 1200.00) ORDER BY funcao;

-- 14
SELECT * FROM cadfun WHERE NOT ((funcao = 'Programador') OR (funcao = 'Analista')) ORDER BY funcao;
-- OU
SELECT * FROM cadfun WHERE funcao NOT IN ('Programador','Analista') ORDER BY funcao;

-- 15
SELECT * FROM cadfun WHERE (n_filhos >= 2) AND (n_filhos <= 4);

-- 16
SELECT * FROM cadfun WHERE ((n_filhos >= 2) AND (n_filhos <= 4)) AND salario < 2000.00;

-- 17
SELECT * FROM cadfun WHERE (n_filhos < 2) OR (n_filhos > 3);

-- 18
SELECT * FROM cadfun WHERE n_filhos > 0 AND ((n_filhos <= 2) OR (n_filhos > 3));

-- 19
SELECT * FROM cadfun WHERE n_filhos IN (2,3) ORDER BY n_filhos;