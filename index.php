<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Opiniaoclipe;
use \App\Db\Paginacao;

$busca = isset($_GET['busca']) ? htmlspecialchars($_GET['busca'], ENT_QUOTES | ENT_HTML5, 'UTF-8') : '';

$condicoes = [
    strlen($busca) ? 'titulo LIKE "%' . str_replace(' ', '%', $busca) . '%"' : null
];

//clausula where
$where = implode(' AND ', $condicoes);

//quantidade Total de opiniões
$quantidadeOpiniao = Opiniaoclipe::getQuantidadeOpiniao($where);

//paginação
$opPage = new Paginacao($quantidadeOpiniao, $_GET['pagina'] ?? 1, 4);


//obtem as opiniões
$opiniao =  Opiniaoclipe::getOpiniaos($where, null, $opPage->getLimit());

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/listagem.php';
include __DIR__ . '/includes/footer.php';
