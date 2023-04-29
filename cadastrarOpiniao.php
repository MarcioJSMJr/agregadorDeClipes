<?php

require __DIR__ . '/vendor/autoload.php';

define('TITLE','Cadastrar Opinião');

use \App\Entity\Opiniaoclipe;
use \App\Session\Login;

//Obriga o usuario a estar logado
Login::requireLogin();

if (isset($_POST["criador"], $_POST["titulo"], $_POST["link"], $_POST["descricao"])) {

    $opOpiniao = new Opiniaoclipe;

    $opOpiniao->criador = $_POST['criador'];
    $opOpiniao->titulo = $_POST['titulo'];
    $opOpiniao->link = $_POST['link'];
    $opOpiniao->descricao = $_POST['descricao'];
    $opOpiniao->cadastrar();

    header('location: index.php?status=success');
    exit;
}


/*echo "<pre>"; print_r($_POST); echo "</pre>"; exit;*/

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioOpiniao.php';
include __DIR__ . '/includes/footer.php';
