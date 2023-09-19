<?php
session_start();

if($_POST){
    $dir = getcwd();
    require_once $dir . '\model\Conta.php';

    $valorSaque = floatval($_POST["valor"]);

    if ($valorSaque <= 0) {
        echo "O valor do saque deve ser maior que zero.";
    } else {
    $idPessoa = $_SESSION['id'];
    $conta = new Conta();
    $dadosConta = $conta->getContaByPessoa($idPessoa);

    $saldoConta = $dadosConta['saldo']; 

    if ($valorSaque > $saldoConta) {
            echo "Saldo insuficiente para o saque.";
        } else {
            $saldoConta -= $valorSaque;
            
            echo "Saque de R$ " . number_format($valorSaque, 2) . " realizado com sucesso. Saldo restante: R$ " . number_format($saldoConta, 2);
        }
    }
}
?>