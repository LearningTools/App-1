$(document).ready(function(){
/* --------------Validacion de campos vacios-------------- */
$("#validar").submit(function () {
	 	//validar el fecha 
        if($("#fecha").val() =="") {
            bootbox.alert("<div class='alert alert-error'><h3>Error!</h3> \n FALTA DIGITAL LA FECHA..</div>", "No lo vuelvo hacer!");
            return false;
        }
         //validar el nombre vendedor 
        if ($("#vendedor").val() =="") {
        	bootbox.alert("<div class='alert alert-error'><h3>Error!</h3> \n FALTA DIGITAL EL NOMBRE DEL VENDEDOR..</div>", "No lo vuelvo hacer!")
        	return false;
        }
         //validar el acto
        if ($("#acto").val() =="") {
        	bootbox.alert("<div class='alert alert-error'><h3>Error!</h3> \n FALTA DIGITAL EL TIPO DE ACTO..</div>", "No lo vuelvo hacer!")
        	return false;
        }
           });
});