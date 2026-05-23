CREATE DATABASE sistema_cadastros;

USE sistema_cadastros;

CREATE TABLE produtos(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    preco DECIMAL(10,2),
    quantidade INT,
    categoria VARCHAR(100)
);

CREATE TABLE clientes(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100),
    telefone VARCHAR(20),
    endereco VARCHAR(200)
);

CREATE TABLE livros(
    isbn_id_liv CHAR(15) PRIMARY KEY,
    autor VARCHAR(100),
    titulo VARCHAR(100),
    formato VARCHAR(100),
    editora VARCHAR(100),
    categoria VARCHAR(100),
    preco DECIMAL(10,2)
);

CREATE TABLE funcionarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(14) UNIQUE,
    telefone VARCHAR(20),
    email VARCHAR(100),
    cargo VARCHAR(50),
    salario DECIMAL(10,2),
    data_admissao DATE,
    endereco VARCHAR(200)
);

CREATE TABLE veiculos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(50),
    modelo VARCHAR(50),
    ano INT,
    cor VARCHAR(30),
    placa VARCHAR(10) UNIQUE,
    combustivel VARCHAR(30),
    valor DECIMAL(10,2)
);

CREATE TABLE filmes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100),
    genero VARCHAR(50),
    diretor VARCHAR(100),
    duracao INT,
    classificacao VARCHAR(10),
    ano_lancamento INT
);
