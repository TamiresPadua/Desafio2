<?php
require_once '../model/Pessoa.php';

$nome = isset($_POST["nome"]) ? trim($_POST["nome"]) : '';
$email = isset($_POST["email"]) ? addslashes(trim($_POST["email"])) : '';
$cpf = isset($_POST["cpf"]) ? trim($_POST["cpf"]) : '';
$nascimento = isset($_POST["nascimento"]) ? $_POST["nascimento"] : '';
$agencia = isset($_POST["agencia"]) ? $_POST["agencia"] : '';
$conta_corrente = isset($_POST["conta_corrente"]) ? $_POST["conta_corrente"] : '';
$senha = isset($_POST["senha"]) ? password_hash($_POST["senha"], PASSWORD_BCRYPT) : '';

if (!$nome || !$email || !$cpf || !$nascimento || !$senha) {
    echo "<script>alert('Todos os campos são obrigatórios.');</script>";
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL= cadastro.php'>";
    exit;
}

$pessoa = new Pessoa();

if ($pessoa->existePessoaByEmail($email)) {
    echo "<script>alert('Este e-mail já está em uso.');</script>";
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL= cadastro.php'>";
    exit;
}

$inserido = $pessoa->inserirPessoaConta($nome, $email, $cpf, $nascimento, $agencia, $conta_corrente, $senha);

if ($inserido) {
    echo "<script>alert('Cadastro realizado com sucesso. Faça o login para acessar o sistema.');</script>";
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL= ../login.php'>";
} else {
    echo "<script>alert('Ocorreu um erro ao cadastrar o usuário.');</script>";
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL= cadastro.php'>";
}
?>