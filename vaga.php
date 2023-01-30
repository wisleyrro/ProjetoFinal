<?php

//namespace App\Entity;
require_once 'Database.php';

class Vaga {

    /**
     * Identificador único da vaga
     * @var integer
     */
    public $id;
    /**
     * Titulo da vaga
     * @var string
     */
    public $titulo;
    /**
     * Descrição da vaga(pode conter html)
     * @var string
     */
    public $descricao;
    /**
     * Define se a vaga ativa
     * @var string (s/n)
     */
    public $ativo;
    /**
     * Data de publicação da vaga
     * @var string
     */
    public $data;

	/** Método responsavel por cadastrar uma nova vaga no banco
	 * @return boolean
	 */
	public function cadastrar() {
        //DEFINIR A QUERY
        $this->data = date('Y-m-d H:i:s');
        //INSERIR A VAGA NO BANCO
        $obDatabase =  new Database('vagas');
        //$obDatabse->INSERT INTO `vagas`(`id`, `titulo`, `descricao`, `ativo`, `data`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')
        $this->id = $obDatabase->Insert([
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'ativo' => $this->ativo,
            'data' => $this->data
        ]);
        return true;
	}
    /**
     * Métodos responsável por obter as vagas do banco
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */
    public static function getVagas($where = null, $order = null, $limit = null){
        return (new Database('vagas'))->select($where, $order, $limit)
                                      ->fetchAll(PDO::FETCH_CLASS,self::class);
    }
    /**
     * Método responsavel por buscar uma vaga em seu id
     * @param integer $id
     * @return Vaga
     */
    public static function getVaga($id) {
        return (new Database('vagas'))->select('id = '.$id)
                                    ->fetchObject(self::class);

    }
    /**
     * Método responsaável por atualizar a vaga no banco
     * @return boolean
     */
    public function atualizar(){
        return (new Database('vagas'))->update('id = '.$this->id,[
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'ativo' => $this->ativo,
            'data' => $this->data
        ]);
    }

    /**
     * Método responsável por excluir a vaga do banco
     * @return boolean
     */
    public function excluir(){
        return (new Database('vagas'))->delete('id = '.$this->id);
    }
}