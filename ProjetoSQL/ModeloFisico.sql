-- Geração de Modelo físico
-- Sql ANSI 2003 - brModelo.



CREATE TABLE agencia (
num_agencia VARCHAR(255) NOT NULL PRIMARY KEY,
endereco VARCHAR(255) NOT NULL,
contato VARCHAR(255) NOT NULL,
cidade VARCHAR(255) NOT NULL,
id_carro INTEGER NOT NULL
);

CREATE TABLE clientes (
telefone VARCHAR(255) NOT NULL,
nome VARCHAR(255) NOT NULL,
cnh VARCHAR(255) NOT NULL,
id_cliente SERIAL NOT NULL PRIMARY KEY,
cidade VARCHAR(255) NOT NULL,
estado VARCHAR(255) NOT NULL,
sobrenome VARCHAR(255) NOT NULL,
endereço VARCHAR(255) NOT NULL,
id_pagamento SERIAL NOT NULL
);

CREATE TABLE carros (
marca VARCHAR(255) NOT NULL,
modelo VARCHAR(255) NOT NULL,
ano INTEGER NOT NULL,
placa VARCHAR(255) NOT NULL,
status VARCHAR(255) NOT NULL,
id_carro SERIAL NOT NULL PRIMARY KEY,
cor VARCHAR(255) NOT NULL
);

CREATE TABLE funcionarios (
id_funcionario SERIAL NOT NULL PRIMARY KEY,
nome_funcionario VARCHAR(255) NOT NULL,
cargo_funcionario VARCHAR(255) NOT NULL,
salario_funcionario VARCHAR(255) NOT NULL,
num_agencia VARCHAR(255) NOT NULL,
FOREIGN KEY(num_agencia) REFERENCES agencia (num_agencia)
);

CREATE TABLE pagamento (
id_pagamento SERIAL PRIMARY KEY NOT NULL,
valor DECIMAL(7,2) NOT NULL,
forma_pagamento VARCHAR(255) NOT NULL,
status_pagamento VARCHAR(255) NOT NULL,
data_pagamento VARCHAR(255) NOT NULL,
id_registro INTEGER NOT NULL,
comprovante VARCHAR(255) NOT NULL
);

CREATE TABLE manutencao (
id_manutencao SERIAL NOT NULL PRIMARY KEY,
data_manutencao VARCHAR(255) NOT NULL,
tipo_manutencao VARCHAR(255) NOT NULL,
descricao VARCHAR(255) NOT NULL,
km VARCHAR(255) NOT NULL,
custo VARCHAR(255) NOT NULL,
id_carro INTEGER NOT NULL,
FOREIGN KEY(id_carro) REFERENCES carros (id_carro)
);

CREATE TABLE feedback (
id_feedback SERIAL NOT NULL PRIMARY KEY,
comentario VARCHAR(255) NOT NULL,
avaliacao VARCHAR(255) NOT NULL
);

CREATE TABLE aluga (
data_fim DATE NOT NULL,
data_inicio DATE NOT NULL,
id_aluguel SERIAL NOT NULL PRIMARY KEY,
valor_total DECIMAL(10,2) NOT NULL,
id_carro INTEGER NOT NULL,
id_cliente INTEGER NOT NULL,
FOREIGN KEY(id_carro) REFERENCES carros (id_carro),
FOREIGN KEY(id_cliente) REFERENCES clientes (id_cliente)
);

CREATE TABLE registra (
id_cliente INTEGER NOT NULL,
id_feedback INTEGER NOT NULL,
FOREIGN KEY(id_cliente) REFERENCES clientes (id_cliente),
FOREIGN KEY(id_feedback) REFERENCES feedback (id_feedback)
);

ALTER TABLE agencia ADD FOREIGN KEY(id_carro) REFERENCES carros (id_carro);
ALTER TABLE clientes ADD FOREIGN KEY(id_pagamento) REFERENCES pagamento (id_pagamento);
