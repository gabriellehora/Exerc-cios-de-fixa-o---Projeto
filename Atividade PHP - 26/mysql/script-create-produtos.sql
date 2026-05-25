CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    descricao VARCHAR(100),
    preco  DECIMAL(10,2),
    estoque INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);