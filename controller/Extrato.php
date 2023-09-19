<?php
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: login.php'); 
    exit();
}

$dir = __DIR__;

require_once $dir . '\model\Conta.php'; 

$idPessoa = $_SESSION['id'];
$conta = new Conta();
$dadosConta = $conta->getContaByPessoa($idPessoa);

$transacoes = $conta->getTransacoes($_SESSION['id']);

if (isset($transacoes) && is_array($transacoes) && count($transacoes) > 0) {
   
} else {
   
    echo "Não há transações disponíveis.";
}

?>