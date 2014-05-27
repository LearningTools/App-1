<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Resultado General</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
<?php 
include'../config/dbEstructura.php';
$fechaIni = $_POST['fechaIni'];
$fechaFinal = $_POST['fechaFi'];
$sql="SELECT * FROM actas WHERE fechaDepo >= '".$fechaIni."' AND fechaDepo <= '".$fechaFinal."' ";
//echo $sql="SELECT * FROM actas WHERE (fechaDepo >= '".$fechaIni."' AND fechaDepo <= ' ".$fechaFinal."')  &(fechaDevo >='".$fechaIni."' AND fechaDevo <='".$fechaFinal."')";
$resul = mysql_query($sql);
$num = mysql_num_rows($resul);
?>
<div class="row">
   <div class="span12 offset2">
	<table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>FechaIngreso</th>
                  <th>#Acta</th>
                  <th>Concepto</th>
                  <th>Beneficiario</th>
                  <th>Valor(Depo o Devo)</th>
                  <th>FechaEgreso</th>
                </tr>
              </thead>
              <tbody>
              	<?php
              	 while ($row = mysql_fetch_array($resul)) {
              	 ?>
              	<tr>
                  <td><?php echo $row['fechaDepo']; ?></td>
                  <td><?php echo $row['consIn']; ?></td>
                  <td>TipoReferencia</td>
                  <td><?php echo $row['nomUser']; ?></td>
                  <td><?php echo number_format($row['valorNumber'], 0, '', '.');   ?></td>
                  <td>IdaActas</td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
	 	</div>
	 </div>
</body>
</html>