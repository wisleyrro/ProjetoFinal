<?php

class Database {
    /**
     * Host de conexão com o banco de dados
     * @var string
     */
    const HOST = 'localhost';
    /**
     * Nome do banco de dados
     * @var string
     */
    const NAME = 'wdev_vaga';
    /**
     * Usuario do banco
     * @var string
     */
    const USER ='root';
    /**
     * Senha do banco de dados
     * @var string
     */
    const PASS = '';
    /**
     * Nome da tabela a ser manipulada
     * @var mixed
     */
    private $table;
    /**
    *Instancia de conexão de banco de dados
    * @var PDO
    */
    private $connection;
    /**
     * Define a tabela e instancia a conexão
     * @param string $table
     */
    public function __construct($table = null){
        $this->table = $table;
        $this->setConnection();
    }
      /**
       * Método responsável por criar uma conexão com o banco de dados
       * @return void
       */

    private function setConnection(){
        try {
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die('ERRO: '.$e->getMessage());
        }
    }
    /**
     * Método responsável por inserir dados no banco
     * @param array $values [field => value]
     * @return integer ID inserido
     */
    public function Insert($values) {
        //DADOS DA QUERY
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');
        //monta a query
        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';
        //executa o insert
        $this->execute($query, array_values($values));
        //RETONar o ID
        return $this->connection->lastInsertId();
    }
    /**
     *Método responsável por executar queries dentro do banco de dados
     *@param string $query
     *@param array $params
     *@return PDOStatement
     */
    public function execute($query, $params = []){
        Try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        }catch(PDOException $e){
            die('ERROR: ' . $e->getMessage());
        }

    }
    /**
     * Método responsável por executar uma consulta no banco
     * @param string $where
     * @param string $order
     * @param string $limit
     * @param string $fields
     * @return PDOStatement
     */
    public function select($where = null, $order = null, $limit = null, $fields = '*') {
        //DADOS DA QUERY
        $where = strlen($where) ? 'WHERE ' . $where : '';
        $order = strlen($order) ? 'ORDER BY ' . $order : '';
        $limit = strlen($limit) ? 'LIMIT ' . $limit : '';
        //MONTA A QUERY
        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

        //executar a query
        return $this->execute($query);
    }
    /**
     * Método responsável por executar atualizações no banco de dados
     * @param string $where
     * @param array $values [field => value]
     * @return boolean
     */
    
    public function update($where, $values){
        //DADOS DA QUERY
        $fields = array_keys($values);

        //MONTA A QUERY
        $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;

        //EXECUTAR A QUERY
        $this->execute($query, array_values($values));

        return true;
    } 
    /**
     * Método responsavel por excluir dados do banco
     * @param string $where
     * @return boolean
     */
    public function delete($where){
        //MONTA A QUERY
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;

        //EXECUTA A QUERY
        $this->execute($query);

        //retorna sucesso
        return true;
    }
}
