 <?php
session_start();
if ($_POST) {
require ("/../config/db/CRUD/Login.Class.php");
$logIn = new LogIn;
$logIn->finAnd($_POST['nombre'],sha1($_POST['password']));

if ($logIn->variables) {
  header('location: modle.php');
  $_SESSION['nombreUsuario'] = $_POST['nombre'];
}
else{
  echo '<script language="javascript">
           alert("OPPS!!...\n PARECE QUE EL USUARIO Y LA CONTRASEÑA NO SON IGUALES \n INTENTALO OTRA VEZ!!..");
       </script>';
}
    }
 ?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sig in</title>
	<link rel="stylesheet" href="../css/bootstrap-responsive.min.css">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/main.css">
<style type="text/css">
      body {
      background-color: #f5f5f5;
      }
</style>
</head>
<body>
		<div class="container">
      <form class="form-signin" method="post" id="sigIn" action="">
        <h2 class="form-signin-heading">Inicie Sesión</h2>
        <i class="icon-user icon-large"></i><input type="text" class="input-block-level" placeholder="Usuario" id="user" name="nombre">
        <i class="icon-lock icon-large"></i><input type="password" class="input-block-level" placeholder="*******" id="pass" name="password">
        <button class="btn btn-large btn-primary" type="submit" id="submit"><i class="icon-check-sign icon-large"> Iniciar</i></button>
      </form>
    </div> <!-- /container -->
<script src="../js/jquery-1.10.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/bootbox.min.js"></script>
<script>
	$(document).ready(function() {
    //validar formulario de sigIn
    $('#sigIn').submit(function( ) {
      //Validar Usuario que no este vacio
      if ($('#user').val() =="") {
        bootbox.alert("El NOMBRE DEL USUARIO NO PUEDE ESTAR VACIO...", "No lo vuelvo hacer!");
        return false;
      }
      //validar Contraseña
      if ($('#pass').val() == "") {
        bootbox.alert("LA CONTRASEÑA DEL USUARIO NO PUEDE ESTAR VACIA...", "No lo vuelvo hacer!");
        return false;
      }
    })
	});
</script>
</body>
</html>