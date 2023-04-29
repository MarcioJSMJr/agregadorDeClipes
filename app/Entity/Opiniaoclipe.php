<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Opiniaoclipe extends Opiniao
{
    public $id_opinion;
    public $criador;
    public $titulo;
    public $link;
    public $descricao;
    public $data;

    public function cadastrar()
    {

        //definir a data
        $this->data = date('Y-m-d H:i:s');

        //inserir no banco de dados
        $obDatabase = new Database('opiniao');
        $this->id_opinion = $obDatabase->inserir([
            'criador' => $this->criador,
            'titulo' => $this->titulo,
            'link' => $this->link,
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
        return (new Database('opiniao'))->update('id_opinion = ' . $this->id_opinion, [
            'criador' => $this->criador,
            'titulo' => $this->titulo,
            'link' => $this->link,
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
        return (new Database('opiniao'))->delete('id_opinion = ' . $this->id_opinion);
    }

    /**
     * Método que vai ficar responsável por obter as opiniões do banco de dados
     * @param string $where
     * @param string $ordem
     * @param string $limite
     * @return array
     */
    public static function getOpiniaos($where = null, $order = null, $limit = null)
    {
        return (new Database('opiniao'))->select($where, $order, $limit)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Método que vai ficar responsável por obter a quantidade de vagas do banco de dados
     * @param string $where
     * @return integer
     */
    public static function getQuantidadeOpiniao($where = null)
    {
        return (new Database('opiniao'))->select($where, null, null, 'COUNT(*) as qtd')
            ->fetchObject()
            ->qtd;
    }

    /**
     * Método que vai ficar responsável por buscar uma opiniao com base no seu id
     * @param integer $id_opiniaoJogos
     * @return 
     */
    public static function getOpiniao($id_opinion)
    {
        return (new Database('opiniao'))->select('id_opinion =' . $id_opinion)
            ->fetchObject(self::class);
    }
}
