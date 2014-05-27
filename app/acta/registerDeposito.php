<?php session_start(); ?>
<link rel="stylesheet" href="../../css/main.css">
<link rel="stylesheet" href="../../css/bootstrap.min.css">
<?php
require ('../../config/db/CRUD/Actas.Class.php');
//include funcion de numeros a letras
include "letraNumeros.php";
$actas = new Actas;
// variables que capturamos del formulario
$actaSesion = $actas->consIn = $_POST['actaDepo'];
$_SESSION['nickActa'] = $actaSesion;
//variable que tiene el consecutivo del acta con la funcion codificada
$actas->consEncript = sha1($_POST['actaDepo']);
$actas->fechaDepo = $_POST['fechaDepo'];
$actas->nomUser = $_POST['nombreUsuario'];
//Extraer los puntos de los valores con str_replace;
$actas->documUser = str_replace(".","",$_POST['documentUsuario']);
$actas->valorNumber = str_replace(".","",$_POST['valorOtros']);
$actas->numberEscrit = $_POST['numEscritura'];
$actas->fechaEscrit = $_POST['fechaEscritura'];
$actas->tipoActo = $_POST['typoActo'];
$actas->elaboroAdmin = $_POST['elaboro'];
//funcion de formato a letra mayuscula
$actas->notaEncargada = strtoupper($_POST['notaEncargada']);
$Vb = $actas->valorBoleta = str_replace(".","",$_POST['valorBoleta']);
$vR = $actas->valorRegistro = str_replace(".","",$_POST['valorRegistro']);
# Condicion si viene basio la boleta y registro 
if (empty($Vb) && empty($Vr)) {
 $actas->valorLetra = numerotexto(str_replace(".","",$_POST['valorOtros']));
 $actas->valorTotal = NULl;
}
else{
  isset($actas->valorBoleta, $actas->valorRegistro);
  $actas->valorTotal = $actas->valorBoleta + $actas->valorRegistro;
  $actas->valorLetra = numerotexto($actas->valorTotal);

}
# Enviamos la informacion
$create = $actas->create();
if ($actas->variables) {
  echo '<center style="margin-top:100px">
    <div class="loader rspin">
        <span class="c"></span>
        <span class="d spin"><span class="e"></span></span>
        <span class="r r1"></span>
        <span class="r r2"></span>
        <span class="r r3"></span>
        <span class="r r4"></span>
    </div>
    <div class="span4 offset6 alert alert-info">
    <strong>Espera!</strong>
    <p>un Momento mientras procesamos tu informacion enviada</p>
    </div>
    </center>';
    
    echo'<script>
      var pagina="../modle.php";
       window.open("../pdfGenerate/pdfdeposito.php");
      function redireccionar() {
        location.href=pagina
      }
    setTimeout ("redireccionar()", 4000);
</script>';
}
else{
        echo "Atencion, Houston tenemos problemas con la Insercion de los datos :(";
      }
 ?>