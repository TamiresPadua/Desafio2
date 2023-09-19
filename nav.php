<?php
require_once './model/Conta.php';
$conta = new Conta();
$dadosConta = $conta->getContaByPessoa($_SESSION['id']);
?>
<nav class="col-3">
    <div class="blc_saldo">
        <p>Saldo em conta</p>
        <h2><?=$dadosConta['saldo']?></h2>
    </div>
    <ul>
        <li><a href="home.php">Saldo</a></li>
        <li><a href="extratotela.php">Extrato</a></li>
        <li><a href="">Extrato por período</a></li>
        <li><a href="logout.php">Sair</a></li>
    </ul>
</nav>