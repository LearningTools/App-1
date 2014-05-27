<?php
	session_start();
	if(!$_SESSION['nombreUsuario']){
		header('location: index.php');
	}

 else{
  ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>modle</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/font-awesome.min.css">
<script src="../js/jquery-1.10.1.min.js"></script>
<script src="../js/bootstrap-modal.js"></script>
</head>
<body>
<?php 
require ('/../config/db/CRUD/Login.Class.php');
$logIn = new LogIn;
$logIn->logUser = $_SESSION['nombreUsuario'];
$logIn->userLog();
//var_dump($logIn);
?>
		 <div class="navbar">
		 	<div class="navbar-inner">
		 		<a href="" class="brand">Notaria de Jamundi</a>
		 		<ul class="nav">
		 			<li><a href="logOut.php"><i class="icon-off icon-large"> Cerrar Sesion</i></a></li>
		 			<li class="divider-vertical"></li>
		 			<li><a href="#">Bienvenid@ :<strong class="text-success"> <?php echo $_SESSION['user'] = $logIn->nomUser; ?></strong></a></li>
		 			<li class="divider-vertical"></li>
		 			<li><a href="modle.php"><i class="icon-home icon-large"> Menu</i></a></li>
		 		</ul>
		 	</div>
		 </div><br><br><br><br>
<div class="well" style="max-width: 400px; margin: 0 auto 10px;">
  <a class="btn btn-block btn-large font" href="acta/actaDeposito.php">Hacer Acta Deposito</a>
    <a href="#Modal" role="button" class="btn btn-info btn-block btn-large font" data-toggle="modal">Buscar y Imprimir Acta Deposito</a>
    <a href="acta/actualizarActadeposito.php" class="btn btn-success btn-block btn-large font">Actualizar Deposito Admin</a>
    <a href="crearUsuario.php" class="btn btn-warning btn-block btn-large font">Crear Usuarios Admin</a>
 </div>
  <!-- modal  de consulta y imprimir solo acta deposito por numero y año-->
  <div id="Modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel" class="style">Consulta Tu Acta Deposito</h3>
  </div>
  <div class="modal-body">
    <p>Consulta tu Deposito </p>
    <form action="../app/acta/consultarpdfDeposito.php" method="post" target="_blank">
    <input type="text" placeholder="Nº acta deposito" name="numDepo">
    <p>De que Año?..</p>
    <input type="text" placeholder="Año ej. 1999" id="valorAño" name="numAno">
  </div>
  <div class="modal-footer">
  <button type="submit" class="btn btn-primary">Consultar</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
 </form>
  </div>
</div>
<script>
$(document).ready(function(){
		$('#Modal').modal('hide');
	});
</script>
</body>
</html>
<?php } ?>