$(document).ready( function () {
    $('#usuariosTable').DataTable();
} );

/*=============================================
REVISAR SI EL USUARIO YA ESTÁ REGISTRADO
=============================================*/




$("#nuevoUsuario").change(function(){

	$(".alert").remove();

	var usuario = $(this).val();

	var datos = new FormData();

	datos.append("validarUsuario", usuario);

	 $.ajax({
	    url:"ajax/usuarios.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	if(respuesta){

	    		$("#nuevoUsuario").parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>');

	    		$("#nuevoUsuario").val("");

	    	}

	    }

	})
})


/*=============================================
REVISAR SI EL USUARIO YA ESTÁ REGISTRADO
=============================================*/

$("#nuevoCorreo").change(function(){

	$(".alert").remove();

	var correo = $(this).val();

	var datos = new FormData();
	datos.append("validarCorreo", correo);

	 $.ajax({
	    url:"ajax/usuarios.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	if(respuesta){

	    		$("#nuevoCorreo").parent().after('<div class="alert alert-warning">Este correo ya existe en la base de datos</div>');

	    		$("#nuevoCorreo").val("");

	    	}

	    }

	})
})

  


  /*=============================================
EDITAR USUARIO
=============================================*/
$("#btnEditar").click(function(){


	var idUsuario = $(this).attr("btnEditar");
	
	var datos = new FormData();
	datos.append("btnEditar", idUsuario);

	$.ajax({

		url:"ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
		/*$("#editarNombre").val(respuesta["nombre"]);
			$("#editarUsuario").val(respuesta["usuario"]);
			$("#editarPerfil").html(respuesta["perfil"]);
			$("#editarPerfil").val(respuesta["perfil"]);
			$("#fotoActual").val(respuesta["foto"]);

			$("#passwordActual").val(respuesta["password"]);

			if(respuesta["foto"] != ""){

				$(".previsualizar").attr("src", respuesta["foto"]);

			}*/

		}

	});

})
