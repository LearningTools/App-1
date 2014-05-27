// JavaScript Document
$(document).ready(function() {
	 // ambos procesaran en save.php
	 // servira para editar los de tipo input text.
     $('.text').editable('../app/acta/save.php');
	 // servira para editar el cuadro combinado de paises
	 // $('.select').editable('save.php', {
		//  data   : " {'1':'Argentina','2':'Bolivia','3':'Peru', '4':'Chile'}",
		//  type   : 'select',
		//  submit : 'OK'
	 // });
	 // servira para editar el textarea.
	 $('.textarea').editable('../app/acta/save.php', {
		 type     : 'textarea',
		 submit   : 'OK'
	 });

 });
