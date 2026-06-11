<?php
require_once __DIR__ . "/../../config/database.php";
require_once __DIR__ . "/../../models/ContatoDAO.php";

$contatos = obterContatos($pdo);

include __DIR__ . "/../cabecalho.php";
include __DIR__ . "/lista.php";
include __DIR__ . "/../rodape.php";