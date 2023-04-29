<?php

require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Cadastrar Comentario');

use \App\Entity\Comentario;
use \App\Session\Login;

//Obriga o usuario a estar logado
Login::requireLogin();

if (isset($_POST["criador"], $_POST["nome"], $_POST["descricao"])) {

    $opComentario = new Comentario;

    $opComentario->criador = $_POST["criador"];
    $opComentario->nome = $_POST["nome"];
    $opComentario->descricao = $_POST['descricao'];
    $opComentario->cadastrar();

    header('location: index.php?status=success');
    exit;
}


/*echo "<pre>"; print_r($_POST); echo "</pre>"; exit;*/

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario-comentario.php';
include __DIR__ . '/includes/footer.php';
