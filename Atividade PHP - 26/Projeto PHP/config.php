<?php
// config.php — configurações do banco de dados

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'agenda');
define('DB_PORT', '3406');

try {
	$dsn = 'mysql:host='.DB_HOST. ';port=' .DB_PORT. ';dbname='.DB_NAME.';charset=utf8mb4';
	$pdo = new PDO($dsn, DB_USER, DB_PASS, [
    	PDO::ATTR_ERRMODE        	=> PDO::ERRMODE_EXCEPTION,
    	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    	PDO::ATTR_EMULATE_PREPARES   => false,
	]);


} catch (PDOException $e) {
	die('Erro de conexão: ' . $e->getMessage());
}

//PDO::ERRMODE_EXCEPTION:
// Lança uma exceção quando ocorre um erro no banco.
// Isso facilita identificar e tratar erros usando try/catch.

// PDO::ERRMODE_SILENT:
// Não mostra erros automaticamente.
// O PDO apenas guarda o código do erro e o programador
// precisa verificar manualmente usando errorCode() ou errorInfo().