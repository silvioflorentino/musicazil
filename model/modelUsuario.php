<?php

function inserirUsuarioBanco($conexao,$senha,$email){
$query = "insert into tb_usuario(Email_Usua, Senha_Usua)values('{$email}','{$senha}')";
$resultado = mysqli_query($conexao,$query);
return $resultado;
}


?>