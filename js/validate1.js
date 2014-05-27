$(document).ready(function() {
	$("#validar").submit(function () {
	 	//validar el nombre del usuario
        if($("#nombre").val() =="") {
            bootbox.alert("<div class='alert alert-error'><h3>Error!</h3> \n FALTA NOMBRE DEL USUARIO..</div>", "No lo vuelvo hacer!");
            return false;
         //validar el documento del usuario
        }
     	if ($("#document").val() ==""){
     		bootbox.alert("<div class='alert alert-error'><h3>Error!</h3> \n FALTA NUMERO DE CEDULA..</div>", "No lo vuelvo hacer!");
     		return false;
     	} 	
     	//validar el numero de escritura de el usuario
     	if ($("#numEscritura").val() ==""){
     		bootbox.alert("<div class='alert alert-error'><h3>Error!</h3> \n FALTA INGRESAR EL VALOR DE NUMERO DE ESCRITURA..</div>", "No lo vuelvo hacer!");
     		return false;
     	}
     	//validar la fecha de escritura
     	if ($("#f_date1").val() =="") {
     		bootbox.alert("<div class='alert alert-error'><h3>Error!</h3> \n FALTA INGRESAR LA FECHA DE ESCRITURA..</div>", "No lo vuelvo hacer!");
     		return false;
     	}
    });

});