<?php

function inserirUsuarioBanco($conexao,$senha,$email){

  $opcao = ['cost' => 8];

$senhaCrypto=password_hash($senha, PASSWORD_BCRYPT,$opcao);

$query = "insert into tb_usuario(Email_Usua, Senha_Usua)values('{$email}','{$senhaCrypto}')";
$resultado = mysqli_query($conexao,$query);
return $resultado;
}

function listaTudoUsuario($conexao){
    $query = "select * from tb_usuario";
    $resultado = mysqli_query($conexao,$query);
    return $resultado;
}


function listaUsuarioCodigo($conexao,$codigoUsu){
    $query = "select * from tb_usuario where Id_Usua = '{$codigoUsu}'";
    $resultado = mysqli_query($conexao,$query);
    return $resultado;
}

function listaUsuarioEmail($conexao,$emailUsu){
    $query = "select * from tb_usuario where Email_Usua like '%{$emailUsu}%'";
    $resultado = mysqli_query($conexao,$query);
    return $resultado;
}

function buscarAcesso($conexao,$email,$senha){
    $query = "select * from tb_usuario where Email_Usua='{$email}'";
    $resultados = mysqli_query($conexao,$query);

    if(mysqli_num_rows($resultados) > 0 ){
        $linha = mysqli_fetch_assoc($resultados);

        if(password_verify($senha,$linha["Senha_Usua"])){
            $_SESSION["emailUsuario"] = $linha["Email_Usua"];
            $_SESSION["codigoUsuario"] = $linha["Id_Usua"];

            return $linha["Email_Usua"];
        }else{
            return "Senha não confere";
        }
    }else{
     return "Email não cadastrado";       
    }

}

function sairSistema(){
    session_start();
    session_destroy();
    $_SESSION["msg"] ="<div class='alert alert-danger' role='alert'>Sua Sessão Expirou.</div>";
    header("Location:../view/logar.php");
}

function trocarsenhausuario($conexao, $email, $novasenha, $pin)
{
    //verificar se o email e o pin estão corretos
    $query = "Select * from  tb_usuario where Email_Usua='{$email}' and  pinusu='{$pin}'";
    $retorno = mysqli_query($conexao, $query);

    if (mysqli_num_rows($retorno) > 0) {
        $retornoArray = mysqli_fetch_assoc($retorno);
        $codusu = $retornoArray["Id_Usua"];
        //criptografar a senha
        $option = ['cost' => 8];
        $senha = password_hash($novasenha, PASSWORD_BCRYPT, $option);
        //Alterar a senha o banco
        $query = "update tb_usuario set Senha_Usua='{$senha}' where Id_Usua = '{$codusu}'";
        $resultado = mysqli_query($conexao, $query);
        return $resultado;
    } else {
        $resultado = "erro";
        return $resultado;
    }
}
?>