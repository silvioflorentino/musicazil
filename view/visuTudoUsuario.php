<?php
include_once("../model/conexao.php");
include_once("../model/modelUsuario.php");
include_once("../view/header.php");
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Código</th>
      <th scope="col">E-mail</th>
    </tr>
  </thead>

  <tbody>
<?php
$usuario = listaTudoUsuario($conexao);
foreach($usuario as $usuarios){
?>
    <tr>
      <th scope="row"><?=$usuarios["Id_Usua"]?></th>
      <td><?=$usuarios["Email_Usua"]?></td>
    </tr>
<?php
}
?>

</tbody>
</table>

<?php
include_once("../view/footer.php");
?>


