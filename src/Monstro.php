<?php


require_once('Conexao.php');
class Monstro
{
    private $id;
    private $nome;
    private $hp;
    private $ataque;
    private $defesa;
    private $agilidade; 
    private $sorte;
    private $imagem;
    private $banco;

    public function __construct($nome = null, $imagem = null)
    {
        if($nome != null) $this->nome = $nome;
        if($imagem != null) $this->imagem = $imagem;
        $this->banco = Conexao::getInstancia();
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getHp()
    {
        return $this->hp;
    }

    public function setHp($hp)
    {
        $this->hp = $hp;
    }

    public function getAtaque()
    {
        return $this->ataque;
    }

    public function setAtaque($ataque)
    {
        $this->ataque = $ataque;
    }

    public function getDefesa()
    {
        return $this->defesa;
    }

    public function setDefesa($defesa)
    {
        $this->defesa = $defesa;
    }

    public function getAgilidade()
    {
        return $this->agilidade;
    }

    public function setAgilidade($agi)
    {
        $this->agilidade = $agi;
    }

    public function getSorte()
    {
        return $this->sorte;
    }

    public function setSorte($sorte)
    {
        $this->sorte = $sorte;
    }

    public function getImagem()
    {
        return $this->imagem;
    }

    public function setImagem($img)
    {
        $this->imagem = $img;
    }

    /**
     * Retorna todos os registros de monstrinhos cadastrados em um vetor, sendo que cada posicao 
     * do vetor e um objeto do tipo Monstro. Desta forma criamos o vinculo entre esta classe e o registro 
     * do banco de dados
     *
     * @return array
     */
    public function selecionarTodos()
    {
        $conexao = $this->banco->getConexao();
        $consulta = $conexao->query('SELECT * FROM monstro');
        $resultados = $consulta->fetchAll(PDO::FETCH_CLASS, 'Monstro');
        return $resultados;
    }

    public function remover()
    {
        if($this->id != null){
            $conexao = $this->banco->getConexao();
            $retornoQuery = $conexao->exec('DELETE FROM monstro WHERE id ='. $this->id);
            if($retornoQuery) return true;
        }
        return false;
    }


    public function atualizar()
    {
        if($this->id != null){
            $sql = 'UPDATE monstro set nome = :nome, hp = :hp, ataque = :ataque, defesa = :defesa, 
                        agilidade = :agilidade, sorte = :sorte, imagem = :img 
                    WHERE id = :id';
            $conexao = $this->banco->getConexao();
            $update = $conexao->prepare($sql);
            $update->bindValue(':nome', $this->nome, PDO::PARAM_STR);
            $update->bindValue(':hp', $this->hp, PDO::PARAM_INT);
            $update->bindValue(':ataque', $this->ataque, PDO::PARAM_INT);
            $update->bindValue(':defesa', $this->defesa, PDO::PARAM_INT);
            $update->bindValue(':agilidade', $this->agilidade, PDO::PARAM_INT);
            $update->bindValue(':sorte', $this->sorte, PDO::PARAM_INT);
            $update->bindValue(':img', $this->imagem, PDO::PARAM_STR);
            $update->bindValue(':id', $this->id, PDO::PARAM_INT);
            $retornoQuery = $update->execute();
            if($retornoQuery) return true;
        }
        return false;
    }

    /**
     * Similar a funcao selecionarTodos implementada anteriormente, mas neste caso 
     * busca um registro em especifico
     *
     * @param integer $id id do registro a ser buscado (chave primaria)
     * @return object|boolean retorna um objeto do tipo Monstro com os dados do banco de dados, false se nao conseguir encontrar o registro
     */
    public function selecionar($id)
    {
        $sql = 'SELECT * FROM monstro WHERE id = :id';
        $conexao = $this->banco->getConexao();
        $consulta = $conexao->prepare($sql); //prepara a consulta
        $consulta->bindValue(':id', $id, PDO::PARAM_INT); //seta os parametros da consulta
        $retornoQuery = $consulta->execute(); //processa consulta
        if(!$retornoQuery) return false; //nao encontrou registro
        $registro = $consulta->fetchObject('Monstro'); //retorna registro como objeto/instancia da classe Monstro
        return $registro;
    }

    /**
     * Cria um registro no banco de dados com os dados do objeto isntanciado desta classe.
     * 
     * @return boolean true se cosneguiu efetuar INSERT, false do contrario
     */
    public function salvar()
    {
        $sql = 'INSERT INTO monstro(nome, hp, ataque, defesa, agilidade, sorte, imagem) 
                VALUES(:nome, :hp, :ataque, :defesa, :agilidade, :sorte, :img)';
        $conexao = $this->banco->getConexao();
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(':nome', $this->nome, PDO::PARAM_STR);
        $consulta->bindValue(':hp', $this->hp, PDO::PARAM_INT);
        $consulta->bindValue(':ataque', $this->ataque, PDO::PARAM_INT);
        $consulta->bindValue(':defesa', $this->defesa, PDO::PARAM_INT);
        $consulta->bindValue(':agilidade', $this->agilidade, PDO::PARAM_INT);
        $consulta->bindValue(':sorte', $this->sorte, PDO::PARAM_INT);
        $consulta->bindValue(':img', $this->imagem, PDO::PARAM_STR);
        if($consulta->execute()) return true;
        return false;
    }
    
}