<?php

if($_POST){
    session_start();
    $dir = getcwd();
    require_once $dir . '\model\Conta.php';

    $valor = $_POST["valor"];

    $idPessoa = $_SESSION['id'];
    $conta = new Conta();
    $dadosConta = $conta->getContaByPessoa($idPessoa);

    $novoSaldo = $dadosConta['saldo'] + $valor;

    $conta->update([
        "saldo" => $novoSaldo, 
        "id" => $dadosConta['id']
    ]);
}