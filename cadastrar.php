<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Usuario;
use \App\Session\Login;

//Obriga o usuario a não estar logado
Login::requireLogout();

$alertaCadastro = '';

if (isset($_POST["acao"])) {

    switch ($_POST["acao"]) {
        case 'cadastrar':

            //busca o usuario por e-mail
            $opUsuario = Usuario::getUsuarioPorEmail($_POST['email']);

            if ($opUsuario instanceof Usuario) {
                $alertaCadastro = 'O e-mail digitado já está em uso';
                break;
            }

            //novo usuario
            if (isset($_POST["nome"], $_POST["email"], $_POST["senha"])) {
                $opUsuario = new Usuario;
                $opUsuario->nome = $_POST["nome"];
                $opUsuario->senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);
                $opUsuario->email = $_POST["email"];
                $opUsuario->cadastrar();

                //loga o usuario
                Login::login($opUsuario);
            }

            break;
    }
}

/*echo "<pre>"; print_r($_POST); echo "</pre>"; exit;*/

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario-cadastrar.php';
include __DIR__ . '/includes/footer.php';
