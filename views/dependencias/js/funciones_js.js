function informar(){

var usuarios = new Array(3);
var claves = new Array(3);

    usuarios[0] = "CARLOS";
    usuarios[1] = "JUAN";
    usuarios[2] = "PEPE";

    claves[0] = "12345";
    claves[1] = "axcds";
    claves[2] = "atr99";

    var bandera=false;

  for (i=0; i<usuarios.length; i++){
   if ((usuarios[i]==document.getElementById("usuario").value.toUpperCase())
            && (claves[i]==document.getElementById("password").value)){
            mensaje = "Bienvenido al sistema...";
        	bandera=true;
            break;
        }/*end if*/
    }/*end for*/ 

    if (bandera==true){
    	window.location.href = "registro.php";
    }
    else{
    	alert("Datos incorrectos");
    }

/*
	var vuser="juan";
	var vpwd ="abc";

	var user_tecleado_por_usuario=document.getElementById("usuario").value.trim();
	var pwd_tecleado_por_usuario=document.getElementById("password").value.trim();

	if (vuser!=user_tecleado_por_usuario){
		alert("usuario incorrecto");
	}
	else if(vpwd!=pwd_tecleado_por_usuario){
		alert("password incorrecto");
	}
	else{
		alert("Datos correctos");
		window.location.href = "registro.php";
	}*/

}



	function valida_cliente(){
	
		var js_irfc=document.getElementById("irfc").value.trim();
		var js_inombre=document.getElementById("inombre").value.trim();
		var js_ipaterno=document.getElementById("ipaterno").value.trim();
		var js_imaterno=document.getElementById("imaterno").value.trim();
		var js_iempresa=document.getElementById("iempresa").value.trim();
		var js_itelefono=document.getElementById("itelefono").value.trim();
		var js_iemail=document.getElementById("iemail").value.trim();
		var js_scurso=document.getElementById("scurso").value;

		if (js_irfc.length==0){
			alert("Error: Campo RFC no debe estar vacío");
			return false;
		} 
		else if (js_inombre.length==0){
			alert("Error: Campo NOMBRE no debe estar vacío");
			return false;
		}
		else if (js_ipaterno.length==0){
			alert("Error: Campo PATERNO no debe estar vacío");
			return false;
		}
		else if (js_imaterno.length==0){
			alert("Error: Campo MATERNO no debe estar vacío");
			return false;
		}
		else if (js_iempresa.length==0){
			alert("Error: Campo EMPRESA no debe estar vacío");
			return false;
		}
		else if (js_itelefono.length==0){
			alert("Error: Campo TELEFONO no debe estar vacío");
			return false;
		}
		else if (js_iemail.length==0){
			alert("Error: Campo CORREO ELECTRONICO no debe estar vacío");
			return false;
		}
		else if (js_scurso=="0"){
			alert("Error: Seleccione curso de la lista en el campo cursos");
			return false;
		}
		else if (!validaRFC()){
			alert("Error: RFC MAL FORMADO");
			return false;
		}
	}

	function valida_cliente_a_borrar(){
		var js_irfc=document.getElementById("irfc").value.trim();
		if (js_irfc.length==0){
			alert("Error al borrar: Campo RFC no debe estar vacío");
			return false;
		} 
	}

		function valida_cliente_busca_nombres(){
	
		var js_inombre=document.getElementById("inombre").value.trim();
		var js_ipaterno=document.getElementById("ipaterno").value.trim();
		var js_imaterno=document.getElementById("imaterno").value.trim();

		if (js_inombre.length==0 && js_ipaterno.length==0 && js_imaterno.length==0){
			alert("Error: Por lo menos debe llenar algun campo para la búsqueda");
			return false;
		}
	


	}

function validaRFC(){
   //alert("hola");
   
   pattern = /^[a-zA-Z]{4}(\d{6})(([a-zA-Z0-9]){3})?$/;
   rfc = document.getElementById("irfc").value;
  document.getElementById("estatus").innerHTML = pattern.test(rfc);
  return pattern.test(rfc);
}