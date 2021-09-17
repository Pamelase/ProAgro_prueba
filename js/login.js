
localStorage.setItem("highbit", "root/index.php");
localStorage.setItem("lowbit",  "general/index.php");
localStorage.setItem("medbit",  "seller/index.php");
localStorage.setItem("medbit",  "ZONA/index.php");




function loginEngine () {
	

	var usuario = $("#login").val();
	var contrasena = $("#password").val();


	if (usuario == "") {
		alert("Error Favor de Ingresar un usuario.");
		return;
	}

	if (contrasena == "") {
		alert("Error Favor de Ingresar un pass.");
		return;
	}



	$.ajax({
		url: '../engine/frontLogin.php',
		data: {user : usuario, pass : contrasena},
		type: 'post',
		timeout: 1000,
		success: function (data) {
			var array = JSON.parse(data);
			console.log(array)

			if(array == "001"){
				alert("Error el usuario no existe.");
				return;
			}

			if (array == "002") {
				alert("Error Usuario o password no coinciden.");

				return;
			}

			if (array == "006") {
				alert("Error 1.");

				return;
			}

			if (array == "003") {
				alert("Error 2.");


				return;
			}


			if (array == "004") {
				window.location.replace("http://localhost/ProAgro/views/georreferencia.php");
			}
		},
		error: function (x, t, m) {
			if(t === 'timeout'){
				swal("Ha pedido la conexion con el servidor", "La conexion con el servidor ha excedido el tiempo, recomendamos recargar la pagina.","error");

			}
		}
	}).done( function () {
		//$("#submitLoginForm").prop("disabled", false);
	});

}





function getGroupBits () {
	return $.ajax({
		url: "engine/FrontLogin.php",
		data: {getGroupBits : true},
		type: 'post',
		success: function (data) {
			var bits = JSON.parse(data);
			if(localStorage.groupbits){
				localStorage.groupbits = bits;
			}else{
				localStorage.setItem("groupbits", bits);
			}
		}
	});
}


function getZona () {
	return $.ajax({
		url: "engine/FrontLogin.php",
		data: {getZona : true},
		type: 'post',
		success: function (data) {
			var zona = JSON.parse(data);
			if (localStorage.zona) {
				localStorage.zona = zona;
			}else{
				localStorage.setItem("zona", zona);
			}
		}
	});
}




function modalClosed() {
	$("#submitLoginForm").prop("disabled", false);
}
