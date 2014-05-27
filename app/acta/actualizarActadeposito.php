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
	<title>Actualizar |Datos</title>
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/font-awesome.min.css">
</head>
<body>
  <?php 
require ('../../config/db/CRUD/Login.Class.php');
$logIn = new LogIn;
$logIn->logUser = $_SESSION['nombreUsuario'];
$logIn->userLog();
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
     </div>
  <div class="row">
      <div class="well"  style="max-width: 400px; margin: 0 auto 10px;">
          <p><h3>Actualizar Actas!..</h3></p>
          <p><input type="text" name="valor" id="valor" placeholder="Digita el Numero de acta"></p>
          <p><input type="text" name="valorAno" id="valorAno" placeholder="Digita Año"></p>
          <p><button type="submit" class="btn btn-primary" onclick="consultar(valor.value, valorAno.value);">Actualizar</button></p>
          <p><a href="../modle.php" class="btn btn-success">Volver  al Menu</a></p>
      </div>
  </div>
  <di class="row">
    <div class="span6" id="resultado"></div>
  </di>
 <script src="../../js/jquery-1.10.1.min.js"></script>
<script>
  function consultar (valor, valorAno) {
    $("#resultado").html("Cargando..."); 
    $.get("jeditableActualizar.php", {num:valor, ano:valorAno}, procesarEventos);
  }
   function procesarEventos (datos) {
    $("#resultado").html(datos);
  }   
            

</script>
</body>
</html>
<?php } ?>