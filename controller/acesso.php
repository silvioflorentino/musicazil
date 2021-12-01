<?php
session_start();

if($_SESSION["emailUsuario"]){
    $_SESSION["msg"] ="<div class='alert alert-danger' role='alert'>Vc não tem acesso nesta página.</div>";
    header("Location:../view/logar.php");
}

include_once("../model/modelUsuario.php");
include_once("../model/conexao.php");

$email = $_POST["email"];
$senha = $_POST["senha"];
$acesso = buscarAcesso($conexao,$email,$senha);

if($email === $acesso){
    header("Location:../view/index.php");
}else{
    $_SESSION["msg"] ="<div class='alert alert-danger' role='alert'>Os dados não conferem.. tente novamente.</div>";
    header("Location:../view/logar.php");
}

?>