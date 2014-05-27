<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Actualiza tu Usuario | Admin</title>
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
  <script src="../../js/jquery-1.10.1.min.js"></script>
	<script src="../../js/jquery.jeditable.js"></script>
	<script src="../../js/actualizarJquery.js"></script>
</head>
<body>
	<?php
  require('../../config/db/CRUD/Actas.Class.php');
  $actas = new Actas;
  $actas->consIn = $_GET['num'];
  $actas->fechaDepo = $_GET['ano'];
  $actas->finAndYear();

  if ($actas->variables) {
	?>
<div class="row">
  <div class="span12">
	 <table class="table table-bordered">
      <thead>
        <tr>
          <th># Acta</th>
          <th>Fecha</th>
          <th>Nombre</th>
          <th># Documento</th>
          <th>Valor Letra</th>
          <th>Valor Otro</th>
          <th>Valor Boleta</th>
          <th>Valor Registro</th>
          <th>Valor Total</th>
          <th># Escritura</th>
          <th>Fecha Escritura</th>
          <th>TipoActo</th>
          <th>Elaborado</th>
        </tr>
      </thead>
          <tbody>
<?php
$id = $actas->variables['consIn'];
              	 ?>
              	<tr>
                  <td><div  id="consecutivo-<?php echo $id ?>"><?php echo $actas->variables['consIn']; ?></div></td>
                  <td><div  id="fecha-<?php echo $id ?>"><?php echo $actas->variables['fechaDepo']; ?></div></td>
                  <td><div class="text" id="nomUser-<?php echo $id ?>"><?php echo $actas->variables['nomUser']; ?></div></td>
                  <td><div class="text"  id="documUser-<?php echo $id ?>"><?php echo $actas->variables['documUser']; ?></div></td>
                  <td><div class="text"  id="valorLetra-<?php echo $id ?>"><?php echo $actas->variables['valorLetra']; ?></div></td>
                  <td><div class="text"  id="valorNumber-<?php echo $id ?>"><?php echo $actas->variables['valorNumber']; ?></div></td>

                  <td><div class="text"  id="valorBoleta-<?php echo $id ?>"><?php echo $actas->variables['valorBoleta']; ?></div></td>
                  <td><div class="text"  id="valorRegistro-<?php echo $id ?>"><?php echo $actas->variables['valorRegistro']; ?></div></td>
                  <td><div class="text"  id="valorTotal-<?php echo $id ?>"><?php echo $actas->variables['valorTotal']; ?></div></td>
                  <td><div class="text"  id="numberEscrit-<?php echo $id ?>"><?php echo $actas->variables['numberEscrit']; ?></div></td>
                  <td><div class="text"  id="fechaEscrit-<?php echo $id ?>"><?php echo $actas->variables['fechaEscrit']; ?></div></td>
                  <td><div class="text"  id="tipoActo-<?php echo $id ?>"><?php echo $actas->variables['tipoActo']; ?></div></td>
                  <td><div id="elaboro-<?php echo $id ?>"><?php echo $actas->variables['elaboroAdmin']; ?></div></td>
                </tr>
              </tbody>
            </table>
	 	</div>
	 </div>
<?php 
}
  else{
    echo "Lo sentimos el numero de acta ".$ref." No corresponde a ninguna Acta en Nuestro Registro, Intenta de nuevo.";
}
 ?>
  
</body>
</html>