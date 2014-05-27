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
  <title>Reporte General</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="../css/font-awesome.min.css">
<script src="../js/jquery-1.10.1.min.js"></script>
<script src="js/bootstrap-datetimepicker.min.js"></script>
<style>
  body{
    font-size: 16px;
  }
</style>
</head>
<body>
   <div class="navbar">
      <div class="navbar-inner">
        <a href="" class="brand">Notaria de Jamundi</a>
        <ul class="nav">
          <li><a href="logOut.php"><i class="icon-off icon-large"> Cerrar Sesion</i></a></li>
          <li class="divider-vertical"></li>
          <li><a href="#">Bienvenid@ :<strong class="text-success"> <?php echo $_SESSION['nombreUsuario'] ?></strong></a></li>
          <li class="divider-vertical"></li>
          <li class="active"><a href="../modle.php"><i class="icon-home icon-large"> Menu</i></a></li>
        </ul>
      </div>
      <div class="row" style="padding: 15px;">
         <form action="searchReporte.php" method="post">
  <div class="well" style="max-width: 400px; margin: 0 auto 10px;">
    <h4>Fecha Inicial..!</h4>
  <div id="datetimepicker4" class="input-append">
    <input data-format="yyyy-MM-dd" type="text" name="fechaIni"></input>
    <span class="add-on">
      <i data-time-icon="icon-time" data-date-icon="icon-calendar icon-large"></i>
    </span>
  </div>
</div>
<div class="well" style="max-width: 400px; margin: 0 auto 10px;">
      <h4>Fecha Final..!</h4>
              <div id="datetimepicker3" class="input-append">
                      <input data-format="yyyy-MM-dd" type="text" name="fechaFi"></input>
                        <span class="add-on">
                            <i data-time-icon="icon-time" data-date-icon="icon-calendar icon-large"></i>
                       </span>
             </div>
</div>
<div class="well" style="max-width: 400px; margin: 0 auto 10px;">
  <button class="btn btn-success btn-block btn-large font">Push</button>
</div>
</form>
      </div>
<script type="text/javascript">
  $(function() {
    $('#datetimepicker4').datetimepicker({
      pickTime: false
    });
    $('#datetimepicker3').datetimepicker({
      pickTime: false
    });
  });
</script>
</body>
</html>