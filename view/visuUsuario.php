<?php
include_once("../model/conexao.php");
include_once("../model/modelUsuario.php");
include_once("../view/header.php");
?>

<div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Por Código
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
       
        <form method="Post" action="visuUsuario.php">
            <div class="col-12">
                <label for="inputBusca" class="form-label">Digite o código:</label>
                <input type="text" class="form-control" name="codigoUsu" id="inputBusca" placeholder="1257">
            </div>

            <div class="col-12">
                 <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        
        </form>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Por E-mail
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <form  method="Post" action="visuUsuario.php">
            <div class="col-12">
                <label for="inputBusca" class="form-label">Digite o E-mail:</label>
                <input type="text" class="form-control" name="emailUsu" id="inputBusca" placeholder="email@email.com.br">
            </div>

            <div class="col-12">
                 <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        
        </form>
      </div>
    </div>
  </div>
  
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Código</th>
      <th >E-mail</th>
      <th >Alterar</th>
      <th >Excluir</th>
    </tr>
  </thead>

  <tbody>
<?php



$codigoUsu = isset($_POST["codigoUsu"])? $_POST["codigoUsu"]:"";
$emailUsu = isset($_POST["emailUsu"])? $_POST["emailUsu"]:"xfr";

if($codigoUsu){
   $usuario = listaUsuarioCodigo($conexao,$codigoUsu);
}else{
   $usuario = listaUsuarioEmail($conexao,$emailUsu);
}

foreach($usuario as $usuarios){
?>
    <tr>
      <th scope="row"><?=$usuarios["Id_Usua"]?></th>
      <td><?=$usuarios["Email_Usua"]?></td>
      <td>
        <form action="" method="post">
          <input type="hidden" name="idUsuario" value="<?=$usuarios["Id_Usua"]?>">
          <button type="submit" class="btn btn-primary">Alterar</button>
        </form>

      </td>
      <td> 
      <form action="" method="post">
          <input type="hidden" name="idUsuario" value="<?=$usuarios["Id_Usua"]?>">
          <button type="submit" class="btn btn-danger">Deletar</button>
        </form>



      </td>

    </tr>
<?php
}
?>

</tbody>
</table>


<?php
include_once("../view/footer.php");
?>