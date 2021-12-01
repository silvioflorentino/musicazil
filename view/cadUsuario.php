<?php
session_start();
$email = isset($_SESSION["emailUsuario"])?$_SESSION["emailUsuario"]:null;
if($email != null){
    include("../view/header.php");
}else{
Echo("<!DOCTYPE html>
<html lang='pt-br'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
    <link rel='stylesheet' href='css/style.css'>
    <title>MusicaSil</title>
</head>

<body>
  ");
}
    
?>  

<form id="formusu" method="POST" action="../controller/inserirUsuario.php">
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    <label for="senha" class="form-label">Senha</label>
    <input type="password" class="form-control" name="senha" id="senha">
  </div>
  
  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>


<?php
if($email != null){
  include("../view/footer.php");
  }
?>
