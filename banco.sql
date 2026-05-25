CREATE DATABASE agenda_murilo;

USE agenda_murilo;

CREATE TABLE contatos (

    id INT AUTO_INCREMENT PRIMARY KEY,

    nome VARCHAR(100),

    email VARCHAR(100),

    telefone VARCHAR(20)

);

CREATE TABLE clientes (

    id INT AUTO_INCREMENT PRIMARY KEY,

    nome VARCHAR(100),

    cpf VARCHAR(14),

    email VARCHAR(100),

    telefone VARCHAR(20),

    endereco VARCHAR(255)

);

CREATE TABLE produtos (

    id INT AUTO_INCREMENT PRIMARY KEY,

    nome VARCHAR(100),

    descricao TEXT,

    preco DECIMAL(10,2),

    estoque INT,

    imagem VARCHAR(255)

);

INSERT INTO contatos
(nome, email, telefone)

VALUES

(
'Ana Silva',
'ana@email.com',
'(11) 99999-1111'
),

(
'Bruno Costa',
'bruno@email.com',
'(11) 99999-2222'
);

INSERT INTO clientes
(nome, cpf, email)

VALUES

(
'Carlos',
'123.456.789-00',
'carlos@email.com'
);

INSERT INTO produtos
(nome, preco, estoque)

VALUES

(
'Mouse Gamer',
199.90,
10
);