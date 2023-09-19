<?php
require_once 'Crud.php';

class Conta extends Crud{

    protected $id;
    protected $agencia;
    protected $contacorrente;
    protected $saldo;
    protected $pessoa_id;
    private $table = "conta";
    private $primaryKey = "id";

    public function __construct() {
        parent::__construct($this->table, $this->primaryKey);
    }


    function getContaByPessoa($idPessoa = null){
        
        $query = "SELECT * FROM conta";
        if(null != $idPessoa){
            $query .= " WHERE pessoa_id = " . $idPessoa;
        }
        //exit($query);
        $dbh = (new PdoHelper())->getConnection();
        $stmt = $dbh->query($query);
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $dados[0];
    }

    public function getTransacoes($idPessoa) {
        $query = "SELECT * FROM movimentacao WHERE conta_id = " . $idPessoa;

        $dbh = (new PdoHelper())->getConnection();
        try {
            $stmt = $dbh->query($query);
            if ($stmt !== false) {
                $transacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $transacoes;
            } else {
                throw new PDOException("Erro na consulta SQL: " . $dbh->errorInfo()[2]);
            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
    public function inserirPessoaConta($nome, $email, $cpf, $nascimento, $agencia, $conta_corrente, $senha) {
        $query = "INSERT INTO pessoa (nome, email, cpf, nascimento) VALUES (?, ?, ?, ?)";
        $dbh = (new PdoHelper())->getConnection();
        $stmt = $dbh->prepare($query);
        $inseridoPessoa = $stmt->execute([$nome, $email, $cpf, $nascimento]);

        if ($inseridoPessoa) {
            $pessoa_id = $dbh->lastInsertId(); 

            $queryConta = "INSERT INTO conta (agencia, contacorrente, pessoa_id, senha) VALUES (?, ?, ?, ?)";
            $stmtConta = $dbh->prepare($queryConta);

           
            $inseridoConta = $stmtConta->execute([$agencia, $conta_corrente, $pessoa_id, $senha]);

            return $inseridoConta;
        }

        return false;
    }
}