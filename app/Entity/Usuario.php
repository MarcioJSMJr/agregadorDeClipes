<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Usuario
{

    public $id_usuario;
    public $nome;
    public $email;
    public $senha;

    /**
     * método responsavel por cadastrar um novo usuario no banco
     *
     * @return boolean
     */
    public function cadastrar()
    {
        $obDatabase = new Database('usuarios');
        $this->id_usuario = $obDatabase->inserir([
            'nome' => $this->nome,
            'email' => $this->email,
            'senha' => $this->senha,
        ]);
        return true;
    }

    /**
     * Método responsavel por retornar uma instancia de usuario com base em seu e-mail
     * @param string $email
     * @return Usuario
     */
    public static function getUsuarioPorEmail($email)
    {
        return (new Database('usuarios'))->select('email = "' . $email . '"')->fetchObject(self::class);
    }
}
