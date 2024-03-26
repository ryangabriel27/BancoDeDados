CREATE DATABASE ex3

CREATE TABLE produtos(
    id_produto SERIAL PRIMARY KEY NOT NULL,
    nome_produto VARCHAR(100),
    qntde INT NOT NULL,
    valor DECIMAL(7,2)
);

SELECT * FROM produtos;

INSERT INTO produtos
VALUES (DEFAULT, 'MOUSE', '10', 45.00);