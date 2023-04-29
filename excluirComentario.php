<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Comentario;
use \App\Session\Login;

//Obriga o usuario a estar logado
Login::requireLogin();

//validação do ID
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location:index.php?status=error');
    exit;
}

//consulta a opinião
$opComentario = Comentario::getComentario($_GET['id']);

//validação da opinião
if (!$opComentario instanceof Comentario) {
    header('location:index.php?status=error');
    exit;
}

//validação do post
if (isset($_POST['excluir'])) {

    $opComentario->excluir();

    header('location: index.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/confirmar-exclusao-comentario.php';
include __DIR__ . '/includes/footer.php';
