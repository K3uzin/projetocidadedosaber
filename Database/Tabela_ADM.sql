CREATE TABLE administradores (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(45) NOT NULL,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(20) NOT NULL,
    access_level INT NOT NULL
);
