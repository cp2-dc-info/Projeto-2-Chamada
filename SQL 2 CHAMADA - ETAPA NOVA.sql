CREATE TABLE cadastro(
    id int not null auto_increment,
    matricula VARCHAR(9) unique NOT NULL,
    nome VARCHAR(50) NOT NULL,
    sobrenome VARCHAR(50) NOT NULL,
    email VARCHAR(100) unique NOT NULL,
    senha VARCHAR(60) NOT NULL,
    tipo INT NOT NULL,
    PRIMARY KEY(id)
    );

CREATE TABLE turma(
    id INT NOT NULL AUTO_INCREMENT,
    turma VARCHAR(50)  NOT NULL UNIQUE,
    PRIMARY KEY(id)
    );

CREATE TABLE disciplina(
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL UNIQUE,
    PRIMARY KEY(id)
    );


CREATE TABLE disciplina_turma(
    id INT NOT NULL AUTO_INCREMENT,
    disciplina int NOT NULL,
    turma int NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(disciplina) REFERENCES disciplina(id),
    FOREIGN KEY(turma) REFERENCES turma(id)
    );


CREATE TABLE pedidos(
    id INT NOT NULL AUTO_INCREMENT,
    cadastro int not null,
    disciplina_turma int NOT NULL,
    justificativa VARCHAR(500) NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(cadastro) REFERENCES cadastro(id),
    FOREIGN KEY(disciplina_turma) REFERENCES disciplina_turma(id)
    );

INSERT INTO disciplina(nome) VALUES
('Matemática'),
('Português'),
('Biologia'),
('Geografia'),
('História'),
('Filosofia'),
('Sociologia'),
('Física');

INSERT INTO `cadastro`(`matricula`, `nome`, `sobrenome`, `email`, `senha`, `tipo`) VALUES ('ADM0123','ADM','ADM','admin@cp2.com','admincp20321',3)
