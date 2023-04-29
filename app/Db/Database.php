<?php

namespace App\Db;

use \PDO;
use \PDOException;

class Database
{

    const HOST = 'localhost';

    const NAME = 'agregadorDeClipes';

    const USER = 'root';

    const PASS = '';

    private $table;

    private $connection;

    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    private function setConnection()
    {
        try {
            $this->connection = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::NAME, self::USER, self::PASS);
            //aqui faz com que o PDO mostre na tela um erro fatal caso surga um problema com a conexão
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }

    public function execute($comando, $parametros = [])
    {
        try {
            //aqui vai verificar os valores que ele tem que substituir
            $estado = $this->connection->prepare($comando);
            $estado->execute($parametros);
            return $estado;
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }

    public function inserir($valor)
    {
        //dados da execução
        $campos = array_keys($valor);
        //aqui é montado um array com as posições baseadas nas informações inseridas
        $tamanho = array_pad([], count($campos), '?');

        //para que a inserção de dados seja mais segura podemos utilizar aqueles paramentros do PDO
        $comando = 'INSERT INTO ' . $this->table . ' (' . implode(',', $campos) . ') VALUES (' . implode(',', $tamanho) . ')';

        //executa o comando insert 
        $this->execute($comando, array_values($valor));

        //retorno o ID inserido
        return $this->connection->lastInsertId();
    }

    public function select($where = '', $order = '', $limit = null, $campos = '*')
    {

        //dados do comando
        $where = isset($where) && strlen($where) ? 'WHERE ' . $where : '';
        $order = isset($order) && strlen($order) ? 'ORDER BY ' . $order : '';
        $limit = isset($limit) && strlen($limit) ? 'LIMIT ' . $limit : '';

        //executa o comando
        $comando = 'SELECT ' . $campos . ' FROM ' . $this->table . ' ' . $where . ' ' . $order . ' ' . $limit;

        return $this->execute($comando);
    }

    public function update($where, $valor)
    {
        //dados do comando
        $campos = array_keys($valor);

        //monta o comando
        $comando = 'UPDATE ' . $this->table . ' SET ' . implode('=?,', $campos) . '=? WHERE ' . $where;

        //executar o comando
        $this->execute($comando, array_values($valor));

        //retorna sucesso
        return true;
    }

    public function delete($where)
    {
        //monta o comando 
        $comando = 'DELETE FROM ' . $this->table . ' WHERE ' . $where;

        //executar o comando
        $this->execute($comando);

        //retorna sucesso
        return true;
    }
}
