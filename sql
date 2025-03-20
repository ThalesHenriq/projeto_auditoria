CREATE DATABASE auditoria_ti;

USE auditoria_ti;

CREATE TABLE equipamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    descricao TEXT,
    tipo VARCHAR(100),
    data_aquisicao DATE,
    status VARCHAR(50)
);

CREATE TABLE auditorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    equipamento_id INT,
    data_auditoria DATETIME,
    descricao TEXT,
    alterado_por VARCHAR(255),
    FOREIGN KEY (equipamento_id) REFERENCES equipamentos(id)
);
