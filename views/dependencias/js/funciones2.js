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
		alert("Error: Ingrese el rfc completo");
		return false;
	}
	else if (js_inombre.length==0){
		alert("Error: Ingrese el nombre completo");
		return false;
	}
	else if (js_ipaterno.length==0){
		alert("Error: Ingrese el apellido paterno, esta vacio");
		return false;
	}
	else if (js_imaterno.length==0){
		alert("Error: Ingrese el apellido materno\n si no cuenta con apellido materno, coloque una X  ");
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

function validaRFC(){
   //alert("hola");
   
   pattern = /^[a-zA-Z]{4}(\d{6})(([a-zA-Z0-9]){3})?$/;
   rfc = document.getElementById("irfc").value;
  document.getElementById("estatus").innerHTML = (pattern.test(rfc)) ? "Formato OK" : "Hay errores de formato";
  return pattern.test(rfc);
}