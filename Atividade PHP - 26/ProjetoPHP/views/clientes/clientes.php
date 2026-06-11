<?php
require_once __DIR__ . "/../../config/database.php";
require_once __DIR__ . "/../../models/ClienteDAO.php";

$clientes = obterClientes($pdo);

include __DIR__ . "/../cabecalho.php";
include __DIR__ . "/lista.php";
include __DIR__ . "/../rodape.php";