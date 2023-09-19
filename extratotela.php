<?php 
$dir = getcwd();
require_once $dir . 'Extrato.php';
require_once $dir . 'Conta.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extrato da Conta</title>
</head>
<body>  
    <h1>Extrato da Conta</h1>
    <p>Nome do titular da conta: <?php echo $_SESSION['nome']; ?></p>
    <h2>Histórico de Transações</h2>
    <?php if (isset($transacoes) && is_array($transacoes) && count($transacoes) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transacoes as $movimentacao): ?>
                    <tr>
                        <td><?php echo $movimentacao['data']; ?></td>
                        <td><?php echo $movimentacao['descricao']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Não há transações disponíveis.</p>
    <?php endif; ?>
    <a href="logout.php">Sair</a>
</body>
</html>