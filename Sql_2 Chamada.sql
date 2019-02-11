CREATE TABLE cadastro(
    id int not null,
    matricula VARCHAR(9) NOT NULL,
    nome VARCHAR(50) NOT NULL,
    sobrenome VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(60) NOT NULL,
    tipo INT NOT NULL,
    PRIMARY KEY(id)
    );

CREATE TABLE turma(
    id INT NOT NULL,
    turma VARCHAR(50) NOT NULL,
    PRIMARY KEY(id)
    );

CREATE TABLE disciplina(
    id INT NOT NULL,
    disciplina VARCHAR(50) NOT NULL,
    PRIMARY KEY(id)
    );


CREATE TABLE disciplina_turma(
    id INT NOT NULL,
    disciplina int NOT NULL,
    turma int NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(disciplina) REFERENCES disciplina(id),
    FOREIGN KEY(turma) REFERENCES turma(id)
    );


CREATE TABLE pedidos(
    id INT NOT NULL,
    cadastro int not null,
    disciplina_turma int NOT NULL,
    justificativa VARCHAR(500) NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(cadastro) REFERENCES cadastro(id),
    FOREIGN KEY(disciplina_turma) REFERENCES disciplina_turma(id)
    );