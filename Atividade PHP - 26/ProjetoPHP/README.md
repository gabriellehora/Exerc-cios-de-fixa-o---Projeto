# Projeto PHP

## Descrição

Este projeto foi desenvolvido em PHP utilizando o padrão DAO para acesso ao banco de dados MySQL. O sistema permite o gerenciamento de Contatos, Clientes e Produtos através das operações de cadastro, listagem, edição e exclusão.

---

## Estrutura de Pastas

```text
ProjetoPHP/
│
├── config/
│   └── database.php
│
├── models/
│   ├── ContatoDAO.php
│   ├── ClienteDAO.php
│   └── ProdutoDAO.php
│
├── views/
│   ├── cabecalho.php
│   ├── rodape.php
│   │
│   ├── contatos/
│   │   ├── contatos.php
│   │   ├── lista.php
│   │   ├── cadastro_contato.php
│   │   ├── editar_contato.php
│   │   ├── excluir_contato.php
│   │   └── form.php
│   │
│   ├── clientes/
│   │   ├── clientes.php
│   │   ├── lista.php
│   │   ├── cadastro_cliente.php
│   │   ├── editar_cliente.php
│   │   ├── excluir_cliente.php
│   │   └── form.php
│   │
│   └── produtos/
│       ├── produtos.php
│       ├── lista.php
│       ├── cadastro_produtos.php
│       ├── editar_produtos.php
│       ├── excluir_produtos.php
│       └── form.php
│
├── uploads/
│
├── index.php
└── README.md
```

---

## Tecnologias Utilizadas

* PHP 8+
* MySQL
* HTML5
* CSS3
* XAMPP

---

## Configuração do Banco de Dados

1. Inicie o Apache e o MySQL pelo XAMPP.
2. Abra o phpMyAdmin.
3. Crie o banco de dados:

```sql
CREATE DATABASE agenda;
```

4. Crie as tabelas necessárias:

### Tabela contatos

```sql
CREATE TABLE contatos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100),
    telefone VARCHAR(20)
);
```

### Tabela clientes

```sql
CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    cpf VARCHAR(14) UNIQUE,
    email VARCHAR(100),
    telefone VARCHAR(20),
    endereco VARCHAR(255)
);
```

### Tabela produtos

```sql
CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(255),
    preco DECIMAL(10,2),
    estoque INT,
    imagem VARCHAR(255)
);
```

---

## Configuração da Conexão

No arquivo:

```text
config/database.php
```

configure:

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'agenda');
define('DB_PORT', '3406');
```
---

## Como Executar o Projeto

1. Inicie Apache e MySQL no XAMPP.
2. Coloque a pasta do projeto dentro do diretório `htdocs`.
3. Abra o navegador.
4. Acesse:

```text
http://localhost/ProjetoPHP/
```

5. O sistema exibirá a página inicial com acesso aos módulos:

* Contatos
* Clientes
* Produtos

---

## Funcionalidades

### Contatos

* Cadastrar contato
* Listar contatos
* Editar contato
* Excluir contato

### Clientes

* Cadastrar cliente
* Listar clientes
* Editar cliente
* Excluir cliente

### Produtos

* Cadastrar produto
* Listar produtos
* Editar produto
* Excluir produto
* Upload de imagem do produto

---

## Autor
Projeto desenvolvido para fins acadêmicos na disciplina de PHP.
