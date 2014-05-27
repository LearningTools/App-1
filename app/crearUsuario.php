<?php 
	session_start();
	if(!$_SESSION['nombreUsuario']){
		header('location: index.php');
	}
 ?>
 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Crear Usuarios | ADMIN</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/font-awesome.min.css">
<link rel="stylesheet" href="../css/main.css">
<script src="../js/jquery-1.10.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
 </head>
 <body>
<?php 
if ($_POST) {
     include "../config/dbEstructura.php";
     $userPost = $_POST['usuario'];
          function generaPass(){
	//Se define una cadena de caractares. Te recomiendo que uses esta.
	$cadena = "abcdefghijklmnopqrstuvwxyz1234567890";
	//Obtenemos la longitud de la cadena de caracteres
	$longitudCadena=strlen($cadena);

	//Se define la variable que va a contener la contraseña
	$pass = "";
	//Se define la longitud de la contraseña, en mi caso 10, pero puedes poner la longitud que quieras
	$longitudPass=6;

	//Creamos la contraseña
	for($i=1 ; $i<=$longitudPass ; $i++){
		//Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
		$pos=rand(0,$longitudCadena-1);

		//Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
		$pass .= substr($cadena,$pos,1);
	}
	return $pass;
}
//sentencia para extraer el ultimo registro
$result = mysql_query("SELECT logUser from logIn order by logUser DESC limit 1");
$resultado = mysql_result ($result, 0); //Extraemos el valor que nos interesa.
$resultado; //Te devolverá el último registro que esta en la tabla 
$aleatoria = generaPass();//cadena que contiene la password generada
$codifipass = sha1($aleatoria);//Codifico la cadena de la password para insertarla
$ultima = substr($resultado,9,10);
$uno = 1;
$nueva =$ultima + $uno;
$sql = "INSERT INTO logIn (nomUser, logUser, logPass, chmod) VALUES( '".$userPost."' ,'notaUser_".$nueva."' ,'".$codifipass."' ,'2')";
$insert = mysql_query($sql);
if ($insert == true) {
	echo "Usuario creado";
	echo'<div class="alert alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h3>Tu Nombre de Usuario es:</h3>notaUser_'.$nueva.'
  <br>
  <h4>Tu Contraseña Es!</h4>'.$aleatoria.'</div>';
}
else{
	echo "Houston Tenemos Problemas !!!";
}
}
 ?>
 		 <div class="navbar">
		 	<div class="navbar-inner">
		 		<a href="" class="brand">Notaria de Jamundi</a>
		 		<ul class="nav">
		 			<li><a href="logOut.php"><i class="icon-off icon-large"> Cerrar Sesion</i></a></li>
		 			<li class="divider-vertical"></li>
		 			<li><a href="#">Bienvenid@ :<strong class="text-success"> <?php echo $_SESSION['nombreUsuario'] ?></strong></a></li>
		 			<li class="divider-vertical"></li>
		 			<li><a href="../modle.php"><i class="icon-home icon-large"> Menu</i></a></li>
		 		</ul>
		 	</div>
     </div><br><br><br><br><br><br><br><br><br><br>
				<div class="container">
     				 	<form class="form-signin" method="post" id="sigIn" action="">
        						<h2 class="form-signin-heading">Crear Usuario</h2>
       	 					<i class="icon-user icon-large"></i><input type="text" class="input-block-level" placeholder="Nombre y Apellidos" id="user" name="usuario">	      
        						<button class="btn btn-large btn-primary" type="submit" id="submit"><i class="icon-check-sign icon-large"> Crear</i></button><br><br>
        						<div class="alert alert-info"><h4>IMPORTANTE!</h4>
        							<p>Por favor Escriba El Nombres y Apellidos Empezando La primera Letra Por Mayuscula,
        								Ejemplo: <strong>Pepito Armando Perez</strong></p>
        						</div>
      					</form>
    				</div> <!-- /container -->		
            <script>
$(document).ready(function(){
$(".alert").alert()
  });
            </script>
 </html>