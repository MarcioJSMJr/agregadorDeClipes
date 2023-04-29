<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Comentario extends Opiniao
{

    public $id_comment;
    public $criador;
    public $nome;
    public $descricao;
    public $data;

    public function cadastrar()
    {

        //definir a data
        $this->data = date('Y-m-d H:i:s');

        //inserir no banco de dados
        $obDatabase = new Database('comentario');
        $this->id_comment = $obDatabase->inserir([
            'criador' => $this->criador,
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'data' => $this->data
        ]);
        return true;
    }

    /**
     * metodo que vai atualizar a opiniao no banco de dados
     * @return boolean
     */
    public function atualizar()
    {
        return (new Database('comentario'))->update('id_comment = ' . $this->id_comment, [
            'criador' => $this->criador,
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'data' => $this->data
        ]);
    }


    /**
     * metodo que vai exluir os dados do banco de dados
     * @return boolean
     */
    public function excluir()
    {
        return (new Database('comentario'))->delete('id_comment = ' . $this->id_comment);
    }

    
    /**
     * Método que vai ficar responsável por obter os comentarios do banco de dados
     * @param string $where
     * @param string $ordem
     * @param string $limite
     * @return array
     */
    public static function getComentarios($where = null, $order = null, $limit = null)
    {
        return (new Database('comentario'))->select($where, $order, $limit)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Método que vai ficar responsável por buscar um comentario com base no seu id
     * @param integer $id_opiniaoJogos
     * @return 
     */
    public static function getComentario($id_comment)
    {
        return (new Database('comentario'))->select('id_comment =' . $id_comment)
            ->fetchObject(self::class);
    }
}
