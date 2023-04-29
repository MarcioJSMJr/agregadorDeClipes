<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Usuario;
use \App\Session\Login;

//Obriga o usuario a não estar logado
Login::requireLogout();

//mensagens de alerta
$alertaLogin = '';


//validação do post
if (isset($_POST["acao"])) {

    switch ($_POST["acao"]) {

        case 'logar':

            //busca o usuario por e-mail
            $opUsuario = Usuario::getUsuarioPorEmail($_POST['email']);

            //valida a instancia e a senha
            if (!$opUsuario instanceof Usuario || !password_verify($_POST['senha'], $opUsuario->senha)) {
                $alertaLogin = 'E-mail ou senha inválidos';
                break;
            }
            
            //loga o usuario
            Login::login($opUsuario);

            break;
    }
}

/*echo "<pre>"; print_r($_POST); echo "</pre>"; exit;*/

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario-login.php';
include __DIR__ . '/includes/footer.php';
