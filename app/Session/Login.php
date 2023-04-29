<?php

namespace App\Session;

class Login
{

    /**
     * Método responsavel por iniciar a sessão
     */
    private static function init()
    {
        //verifica status da sessão
        if (session_status() !== PHP_SESSION_ACTIVE) {
            //inicia a sessão
            session_start();
        }
    }

    /**
     * método responsavel por retornar os dados do usuario logado
     * @return array
     */
    public static function getUsuarioLogado()
    {
        //inicia a sessão
        self::init();

        //retorna os dados do usuario
        return self::isLogged() ? $_SESSION['usuario'] : null;
    }


    /**
     * Método responsavel por logar o usuari
     * @param Usuario $opOpiniao
     */
    public static function Login($opOpiniao)
    {
        //inicia a sessão
        self::init();

        //sessão de usuario
        $_SESSION['usuario'] = [
            'id_usuario' => $opOpiniao->id_usuario,
            'nome' => $opOpiniao->nome,
            'email' => $opOpiniao->email
        ];

        //redireciona usuario para index
        header('location: index.php');
        exit;
    }

    /**
     * Método responsavel por deslogar o usuario
     */
    public static function logout()
    {
        //inicia a sessão
        self::init();

        //remove a sessão de usuario
        unset($_SESSION['usuario']);

        //redireciona usuario para login
        header('location: login.php');
        exit;
    }


    /**
     * Método responsavel por verificar se o usuario está logado
     * @return boolean
     */
    public static function isLogged()
    {
        //inicia a sessão
        self::init();

        //validação da sessão
        return isset($_SESSION['usuario']['id_usuario']);
    }

    /**
     * Método responsavel por obrigar usuario está logado
     */
    public static function requireLogin()
    {
        if (!self::isLogged()) {
            header('location: login.php');
            exit;
        }
    }

    /**
     * Método responsavel por obrigar usuario está deslogado
     */
    public static function requireLogout()
    {
        if (self::isLogged()) {
            header('location: index.php');
            exit;
        }
    }
}
