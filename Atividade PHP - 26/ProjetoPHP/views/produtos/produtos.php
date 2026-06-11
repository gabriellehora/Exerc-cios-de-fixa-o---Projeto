<?php
require_once __DIR__ . "/../../config/database.php";
require_once __DIR__ . "/../../models/ProdutoDAO.php";

$produtos = obterProdutos($pdo);

include __DIR__ . "/../cabecalho.php";
include __DIR__ . "/lista.php";
include __DIR__ . "/../rodape.php";