CREATE TABLE IF NOT EXISTS contatos(
	id_contato INT NOT NULL PRIMARY KEY,
	nome VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL,
	cel VARCHAR(255) NOT NULL,
	pizza VARCHAR(255) NOT NULL,
	cadastro DATE NOT NULL DEFAULT CURRENT_TIMESTAMP
)


INSERT INTO contatos(id_contato, nome, email, cel, pizza, cadastro)
VALUES (1,'Ryan Gabriel', 'ryan@gmail.com', '123456789', 'Frango', '02-04-2024'),(2,'Maria Santos', 'maria@gmail.com', '987654321', 'Calabresa', '02-04-2024');

