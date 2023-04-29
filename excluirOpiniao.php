<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Opiniaoclipe;
use \App\Session\Login;

//Obriga o usuario a estar logado
Login::requireLogin();

//validação do ID
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location:index.php?status=error');
    exit;
}

//consulta a opinião
$opOpiniao = Opiniaoclipe::getOpiniao($_GET['id']);

//validação da opinião
if (!$opOpiniao instanceof Opiniaoclipe) {
    header('location:index.php?status=error');
    exit;
}

//validação do post
if (isset($_POST['excluir'])) {

    $opOpiniao->excluir();

    header('location: index.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/confirmar-exclusao-opiniao.php';
include __DIR__ . '/includes/footer.php';