Create database projeto_login;

use projeto_login;

create table usuarios (
	id_usuario int AUTO_INCREMENT PRIMARY KEY,
	nome varchar (30),
	email varchar (40),
	emailResponsavel varchar (40),
	telefone varchar (30),
	matricula varchar (30),
	senha varchar (15),
	confSenha varchar (15)
);