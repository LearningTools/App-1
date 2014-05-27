<?php
require('../../config/db/CRUD/Actas.Class.php');
$actas = new Actas;
echo $data = explode("-", $_GET['id']);
echo "hola que hay";
//$actas->consIn = explode("-",$_POST['id']);
/*
$campo = $actas[0];
$id = $actas[1];
$value = $_POST['value'];
//$actas->save();
*/
/*
$data  = explode("-",$_POST['id']);
$campo = $data[0]; // nombre del campo
$id    = $data[1]; // id del registro
$value = $_POST['value']; // valor por el cual reemplazar
// sql para actualizar el registro
//$query = mysql_query("UPDATE actas SET ".$campo." = '".$value."'WHERE consIn = '".$id."'");
*/
 ?>