CREATE TABLE cadastro(
	matricula VARCHAR(9) NOT NULL,
	nome VARCHAR(50) NOT NULL,
	sobrenome VARCHAR(50) NOT NULL,
	email VARCHAR(100) NOT NULL,
	senha VARCHAR(60) NOT NULL,
	tipo INT NOT NULL,     -- 1: Aluno, 2: Professor
	PRIMARY KEY(matricula)
	);

CREATE TABLE aluno(
    matricula VARCHAR(9) NOT NULL,
    email VARCHAR(50) NOT NULL,
    senha INT NOT NULL,
    PRIMARY KEY(matricula)
    );
    
CREATE TABLE professor(
    materia VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    senha INT NOT NULL,
    PRIMARY KEY(materia)
    );
    
CREATE TABLE direcao(
    matricula VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    senha INT NOT NULL,
    PRIMARY KEY(matricula)
    );
    
CREATE TABLE disciplina(
    id INT NOT NULL,
    disciplina VARCHAR(50) NOT NULL,
    PRIMARY KEY(id)
    );
    
CREATE TABLE certificacao(
    id INT NOT NULL,
    cert VARCHAR(50) NOT NULL,
    PRIMARY KEY(id)
    );
    
CREATE TABLE deferimento(
    id INT NOT NULL,
    resposta VARCHAR(500) NOT NULL,
    PRIMARY KEY(id)
    );
    
CREATE TABLE pedidos(
    id INT NOT NULL,
    avaliacao VARCHAR(500) NOT NULL,
    disciplina VARCHAR(50) NOT NULL,
    certificacao VARCHAR(50) NOT NULL,
    justificativa VARCHAR(500) NOT NULL,
    aluno_id VARCHAR(9) NOT NULL,
    disciplina_id INT NOT NULL,
    cert_id INT NOT NULL,
    PRIMARY KEY(id),	 
    FOREIGN KEY(aluno_id) REFERENCES Aluno(matricula),
    FOREIGN KEY(disciplina_id) REFERENCES Disciplina(id),
    FOREIGN KEY(cert_id) REFERENCES Certificacao(id)
	);
    
    
