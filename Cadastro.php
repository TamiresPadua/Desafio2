<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário e Conta Bancária</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="/css/style.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body>
    <h1>Cadastro de Usuário e Conta Bancária</h1>
    <form action="processar_cadastro.php" method="POST">
        <label for="nome">Nome completo:</label>
        <input type="text" id="nome" name="nome" required><br>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" required><br>

        <label for="nascimento">Data de Nascimento:</label>
        <input type="date" id="nascimento" name="nascimento" required><br>

        <input type="hidden" id="agencia" name="agencia" value="1234">

        <input type="hidden" id="conta_corrente" name="conta_corrente" value="<?php echo rand(100000, 999999); ?>">

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>