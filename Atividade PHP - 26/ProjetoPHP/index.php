<?php
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/models/ContatoDAO.php';
require_once __DIR__ . '/models/ClienteDAO.php';
require_once __DIR__ . '/models/ProdutoDAO.php';

$pagina = $_GET['pagina'] ?? 'contatos';
$acao   = $_GET['acao'] ?? null;
$id     = $_GET['id'] ?? null;

switch ($pagina) {

    case 'contatos':
        if ($acao === 'editar') {
            require __DIR__ . '/views/contatos/editar_contato.php';
            break;
        }

        if ($acao === 'excluir') {
            require __DIR__ . '/views/contatos/excluir_contato.php';
            break;
        }

        if ($acao === 'cadastrar') {
            require __DIR__ . '/views/contatos/cadastro_contato.php';
            break;
        }

        require __DIR__ . '/views/contatos/contatos.php';
        break;

    case 'clientes':
        if ($acao === 'editar') {
            require __DIR__ . '/views/clientes/editar_cliente.php';
            break;
        }

        if ($acao === 'excluir') {
            require __DIR__ . '/views/clientes/excluir_cliente.php';
            break;
        }

        if ($acao === 'cadastrar') {
            require __DIR__ . '/views/clientes/cadastro_cliente.php';
            break;
        }

        require __DIR__ . '/views/clientes/clientes.php';
        break;

    case 'produtos':
        if ($acao === 'editar') {
            require __DIR__ . '/views/produtos/editar_produtos.php';
            break;
        }
        
        if ($acao === 'excluir') {
            require __DIR__ . '/views/produtos/excluir_produtos.php';
            break;
        }
        
        if ($acao === 'cadastrar') {
            require __DIR__ . '/views/produtos/cadastro_produtos.php';
            break;
        }
        require __DIR__ . '/views/produtos/produtos.php';
        break;

    default:
        require __DIR__ . '/views/contatos/contatos.php';
        break;
}