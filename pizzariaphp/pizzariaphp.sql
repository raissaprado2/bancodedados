CREATE TABLE  IF NOT EXISTS contatos (
    id_contato INT NOT NULL PRIMARY KEY,
    nome varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    cel varchar(255) NOT NULL,
    pizza varchar(255) NOT NULL,
    cadastro date NOT NULL DEFAULT CURRENT_TIMESTAMP

)

INSERT INTO contatos (id_contato,nome,email, cel, pizza, cadastro) VALUES
(1, 'Raissa' , 'raissa@dev.com' , '(19)00000-0000','queijo',7858)

