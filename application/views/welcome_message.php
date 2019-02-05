<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Ajax CI PHP</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</head>

<body style="padding: 10px;">

<section>
	<h2 class="text-center">
		CRUD Maestro y Detalle con Ajax<br><small>Create, Read, Update, Delete</small>
		<br>
		<small>CodeIgniter3, Jquery3, PHP7, Bootstrap4 y MySQL5</small>
		<br>
		<small>www.it.srl.company</small>
	</h2>
	<br>
	<div class="row">
		<div class="col-md-4 ">
			<div class="img-thumbnail">
				<h2 class="text-left">Maestro</h2>
				<form class="col-md-12" id="formMaestro">
					<div class="form-group" >
						<label for="name">Nombre</label>
						<input type="text" name="name" id="name" class="form-control" value="">
						<small>Escriba el nombre del maestro, por favor</small>
					</div>
					<div class="form-group" >
						<label for="detail">Descripcion</label>
						<input type="text" name="detail" id="detail" class="form-control">
						<small>Escriba la descripcion, por favor</small>
					</div>
					<button type="button" class="btn btn-primary" id="btnGuardarMaestro">Guardar</button>
					<label id="mensajeAjax"></label>
					<input type="hidden" id="url" value="<?=base_url()?>">
				</form>
				
				<hr>
				<div id="divMaestroLista" style="overflow-x:hidden; overflow-y:scroll; height:200px;">Cargando...</div>

			</div>
		</div>

		<div class="col-md-4">
			<div class="img-thumbnail">
				<h2 class="text-left">Detalle</h2>
			</div>
		</div>

		<div class="col-md-4">
			<div>
				<img class="img-thumbnail" src="<?=base_url()?>application/assets/img/logo.png">
			</div>
		</div>
	</div>

</section>

</body>
<script>
	
	/**/

	function GetMaestros(){
		var urlAjax = $("#url").val()+"maestros-lista";
	  	$("#divMaestroLista").load(urlAjax);
	}

	/**/

	$(function(){ 
	  	
	  	GetMaestros();
	    
	});

	/**/

	$("#btnGuardarMaestro").click(
		function(){
			
			var urlAjax = $("#url").val()+"maestros-guardar";
			var datosAjax = $("#formMaestro").serializeArray();
			
			/**/

			$.ajax({
		        url: urlAjax,
		        type: 'POST',
		        data: datosAjax,
		        
		        beforeSend: function() {
		          $("#mensajeAjax").html("&nbsp;...");
		        },
		        
		        success: function(response) {
		          
		          if(response){
		          	
		          	GetMaestros();
		          	
		          	setTimeout(	function(){ 
		          		
		          		$("#mensajeAjax").html(""); 
		          		$("#formMaestro")[0].reset();
		          	
		          	}, 1000);
		          }

		        },
		        
		     });

			/**/

			

		}
	);

</script>
</html>