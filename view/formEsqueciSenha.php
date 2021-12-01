<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
 
    <title>Esqueci a Senha</title>
</head>
<body>
<h1 class="text-center"> Esqueceu a senha? </h1>
<h3 class="text-center">Preencha corretamente as informações abaixo</h3>
<div class="container">
<?php
session_start();
$msg = isset($_SESSION["msg"])?$_SESSION["msg"]:"";
?>
<form id="formEsqueceuSenha" action="../controller/trocarSenha.php" method="POST">
<?=$msg?> 
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" name="email" class="form-control" id="inputEmail3">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Pin</label>
    <div class="col-sm-10">
      <input type="number" min="00001" max="99999" name="pin" class="form-control" id="inputPassword3">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Nova Senha</label>
    <div class="col-sm-10">
      <input type="password" name="novasenha" class="form-control" id="inputPassword3">
    </div>
  </div>

  <button type="submit" class="btn btn-primary">Trocar a senha</button>
  <a class="btn btn-primary" href="acessoFun.php">voltar</a> 
</form>
<?php
$_SESSION["msg"] = " ";
?>
</div>
</body>
</html>