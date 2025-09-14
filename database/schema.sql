-- Banco e tabela (MySQL 5.7) — simples e direto
CREATE DATABASE IF NOT EXISTS mvc_estudo CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE mvc_estudo;

DROP TABLE IF EXISTS produtos;
CREATE TABLE produtos (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(120) NOT NULL,
  sku VARCHAR(32) NOT NULL,
  preco DECIMAL(10,2) NOT NULL,
  estoque INT UNSIGNED NOT NULL DEFAULT 0,
  status ENUM('ativo','inativo') NOT NULL DEFAULT 'ativo',
  criado_em TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  atualizado_em TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY uq_produtos_sku (sku)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO produtos (nome, sku, preco, estoque, status) VALUES
('Camiseta Azul', 'CAM-001', 59.90, 10, 'ativo'),
('Caneca Preta', 'CAN-123', 29.50, 25, 'ativo');
