<?php

require_once '../model/Pessoa.php';

$email = isset($_POST["email"]) ? addslashes(trim($_POST["email"])) : FALSE;
$cpf = isset($_POST["cpf"]) ? trim($_POST["cpf"]) : FALSE;

if (!$email || !$cpf) {
    echo "<script>alert('Você deve digitar seu E-mail e Cpf para acessar o sistema.');</script>";
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL= ../index.php'>";
    exit;
}


$pessoa = new Pessoa();
$dados = $pessoa->getPessoaByEmail($email);

//echo "<pre>";
//print_r($dados);
//exit;


if (($dados[0]['email'] === $email) && ($dados[0]['cpf'] == $cpf)) {
	
	session_start();
	
	$_SESSION["id"] = $dados[0]["id"];
	$_SESSION["nome"] = $dados[0]["nome"];
	$_SESSION["email"] = $dados[0]["email"];
	$_SESSION["cpf"] = $dados[0]["cpf"];
	$_SESSION["nascimento"] = $dados[0]["nascimento"];

    header("Location: ../home.php");
    exit;
} elseif (($dados[0]['email'] == $email) && ($dados[0]['cpf'] != $cpf)) {
    echo "<script>alert('Senha incorreta.');</script>";
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL= ../login.php'>";
    exit();
} else {
    echo "<script>alert('Verifique o e-mail e senha.');</script>";
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL= ../login.php'>";
    exit();
}
?>