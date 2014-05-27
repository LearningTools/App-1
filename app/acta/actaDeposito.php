<?php
	session_start();
	if(!$_SESSION['nombreUsuario']){
		header('location: index.php');
	}
 ?>
<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8" />
	<title>Acta de Deposito</title>
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/font-awesome.min.css">
	<link rel="stylesheet" href="../../css/bootstrap-datetimepicker.min.css">
	<style type="text/css">
	.style{
		font-size: 24px;
		letter-spacing: 2pt;
	}
	.center{
		text-align: center;
	}
	input{
		 color: #2c3e50;
	}
	input:focus {
  		color: #3498db;
	}
	</style>
	<!-- Elementos de Javascript -->
	<script src="../../js/jquery-1.10.1.min.js"></script>
	<script src="../../js/bootstrap-datetimepicker.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/bootbox.min.js"></script>
	 <script src="../../js/validate1.js"></script>
	</head>
	<body>
		<?php
		include "../formFecha.php";
		require ('../../config/db/CRUD/Actas.Class.php');
		$actas = new Actas;
		$actas->countYear("fechaDepo");
//sentencia SQL que me cuenta todos los regitro que hay en el año actual y me suma 1
		// $rs = mysql_query("SELECT COUNT(*) + 1 FROM actas WHERE year(fechaDepo)='".$var."'");
		// if ($row = mysql_fetch_row($rs)){
		// 	$id = trim($row[0]);
		// }	
		 ?>
<div class="navbar">
	<div class="navbar-inner">
		<a href="" class="brand">Notaria de Jamundi</a>
		 	<ul class="nav">
		 		<li><a href="../logOut.php"><i class="icon-off icon-large"> Cerrar Sesion</i></a></li>
		 		<li class="divider-vertical"></li>
		 		<li><a href="#">Bienvenid@<strong class="text-success"> <?php echo $_SESSION['user']; ?></strong></a>
		 		</li>
		 		<li class="divider-vertical"></li>
		 		<li><a href="../modle.php"><i class="icon-home icon-large"> Menu</i></a></li>
		 	</ul>
	</div>
</div>
<div class="container">
<!-- Formulario de la pagina -->
	<form action="registerDeposito.php" method="post" id="validar">
		<div class="row">
			<div class="span12">
				<p class="text-center style">REPUBLICA DE COLOMBIA</p>
				<p class="text-center style">SUPERINTENDENCIA DE NOTARIADO Y REGISTRO</p>
				<p class="text-center style">NOTARIA UNICA DE JAMUNDI-VALLE</p>
				<hr>
			</div>
		</div>
		<div class="row">
			<div class="span12">
<!-- variable $id que contiene la informacion de el ultimo registro y sumado + 1 -->
				<p class="text-center style">ACTA DE DEPOSITO Nº <?php echo $id = $actas->variables["count(*) + 1"]; ?></p>
<!-- referencia que lleva el numero siguiente de cada acta en la variable $id -->
				<input type="hidden"  value="<?php echo $id ?>" name="actaDepo">
			</div>
<!-- Variables que contiene la estructura de la fecha llamando a el archivo formFecha.php -->
		<p class="text-center "><?php echo $mes."  ".$dia." del ".$ano; ?></p>
		<input type="hidden" value="<?php echo  date ("Y-m-d"); ?>" name="fechaDepo">
		</div>
<div class="row show-grid">
			<div class="span6" style="background-color: #eee;">
				<p>se recibe del Cliente dd:</p> 
			    <input type="text" class="input-xlarge" placeholder="Nombre del Usuario" name="nombreUsuario" id="nombre">
			<p>Identificado con el numero de Cedula :</p>
			    <input class="input-medium" type="text" placeholder="Numero de cedula" name="documentUsuario" id="document" onkeyup="format(this)" onchange="format(this)">
			<p>La suma Otros :</p>
<!-- Precio de Otros -->
			<span class="label label-info">Al digitar en este campo se activa el campo de ACTO DE PROCESO</span>
				<p>
					<div class="input-prepend input-append">
  						<span class="add-on">$</span>
  						<input class="span2" type="text" name="valorOtros" onkeyup="format(this)" onchange="format(this)" id="check2">
					</div>
				</p>
			<p>
				<span class="label label-info">Mostrar y Ocultar Campos de Boleta Y registro cheque el cuadro :</span>
<!-- caja donde se activa la funcion de mostrar o ocultar los campos -->
				<input type="checkbox" name="check" id="check" value="1" onchange="javascript:showContent()" />
			</p>
<!-- contenedor donde se muestra lo oculto  -->
				<div id="content" style="display: none;">
<!-- Precio de Boleta -->
				<p>Total Boleta:
					<div class="input-prepend input-append">
  						<span class="add-on">$</span>
  						<input class="span2" id="valorNum" type="text" name="valorBoleta" onkeyup="format(this)" onchange="format(this)">
					</div>
				</p>
<!-- Precio de Registro -->
				<p>Total Registro
					<div class="input-prepend input-append">
  						<span class="add-on">$</span>
  						<input class="span2" id="valorNum" type="text" name="valorRegistro" onkeyup="format(this)" onchange="format(this)">
					</div>
				</p>
				</div>
			<p>Numero de Escritura Publica :</p>
		<input type="text" placeholder="# Escritura" name="numEscritura" id="numEscritura">
			<p>Fecha de la Escritura</p>
				<div id="datetimepicker3" class="input-append">
                    <input data-format="yyyy-MM-dd" type="text" name="fechaEscritura"></input>
                        <span class="add-on">
                            <i data-time-icon="icon-time" data-date-icon="icon-calendar icon-large"></i>
                        </span>
            	</div>
			</div>
			<div class="span6" style="background-color: #eee;">
<!-- Mostrar y Ocultar el proceso si hay algo digitado en el valor de otros -->
			<div id="content2" style="display: none;">
				<p>Acto del Proceso:</p> 
				<p>
					<input type="text" placeholder="Descripcion del proceso" name="typoActo" class="input-xlarge">
				</p>
			</div>
		<p>Acta Elaborada Por:</p>
		<p><input type="text" name="elaboro"></p>
		<p>Notaria Encargada</p>
		<p><input type="text" name="notaEncargada" placeholder="Nombres y Apellidos"></p>
		<button class="btn btn-info" type="submit" id="submit"><i class="icon-cloud-upload icon-large"> Subir Datos!</i></button>
			</div>
</div><!-- Cierre :Row -->
			</form>
</div>
<script>
//Funcion del uso del Calendario
$(function() {
    $('#datetimepicker3').datetimepicker({
      	pickTime: false
    });
});

//funcion de Ocultar y mostrar en el checkbox
function showContent() {
    element = document.getElementById("content");
    check = document.getElementById("check");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
}
//funcion dar formato de separador de miles en RealTime
function format(input){
	var num = input.value.replace(/\./g,'');
		if(!isNaN(num)){
			num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
			num = num.split('').reverse().join('').replace(/^[\.]/,'');
			input.value = num;
}
		else{ 
			alert('Solo se permiten numeros');
			input.value = input.value.replace(/[^\d\.]*/g,'');
		}
//Mostrar y ocultar contenido
	element = document.getElementById("content2");
	check = document.getElementById("check2");
	if (check.onchange) {
		element.style.display='block';
	}
	else{
		element.style.display='none';
	} 

}
</script>
	</body>
</html>
