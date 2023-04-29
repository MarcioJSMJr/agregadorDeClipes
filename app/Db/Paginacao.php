<?php

namespace App\Db;

class Paginacao
{

    /**
     * numero de registros por paginas
     * @var integer
     */
    private $limit;

    /**
     * Quantidade total de resultado no banco de dados
     * @var integer
     */
    private $results;

    /**
     * qunatidade de paginas
     * @var integer
     */
    private $pages;

    /**
     * Pagina atual
     * @var integer
     */
    private $currentPage;

    /**     
     * Construtor de classe
     * @param integer $results
     * @param integer $currentPage
     * @param integer $limit
     */
    public function __construct($results, $currentPage = 1, $limit = 10)
    {
        $this->results = $results;
        $this->limit = $limit;
        $this->currentPage = (is_numeric($currentPage) and $currentPage > 0) ? $currentPage : 1;
        $this->calcular();
    }

    /**
     * metodo que vai calcular a paginação
     */
    private function calcular()
    {
        // calcula o total de paginas
        $this->pages = $this->results > 0 ? ceil($this->results / $this->limit) : 1;

        // verifica se a pagina atual não excede o numero de paginas
        $this->currentPage = $this->currentPage <= $this->pages ? $this->currentPage : $this->pages;
    }

    /**
     * aqui vai retornar a clâusula limit
     * @return string
     */
    public function getLimit()
    {
        $offset = ($this->limit * ($this->currentPage - 1));
        return $offset . ',' . $this->limit;
    }

    /**
     * aqui vai retornar as opções de paginas disponiveis
     * @return void
     */
    public function getPages()
    {
        //nao retorna paginas
        if ($this->pages == 1) return [];

        //paginas
        $paginas = [];
        for ($i = 1; $i <= $this->pages; $i++) {
            $paginas[] = [
                'pagina' => $i,
                'atual' => $i == $this->currentPage
            ];
        }
        return $paginas;
    }
}
