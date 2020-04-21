$(document).ready( function() {

	    $("#btn_enviar").click( function() {     // Con esto establecemos la acción por defecto de nuestro botón de enviar.
            

	    	if ($("#i_nombre").val().length==0){
	    		alert("error:llene nombre");
	    		return;

	    	}
	    	else if ($("#i_email").val().length==0){
	    		alert("error:llene el email");
	    		return;
	    	}
	    	else if ($("#i_telefono").val().length==0 || $("#i_telefono").val().length<10){
	    		alert("error:llene el teleofno a 10 caracteres");
	    		return;
	    	}
	    	else if ($("#s_asunto").val()=="0"){
	    		alert("error:llene el select asunto");
	    		return;
	    	}
	    	else if ($("#i_comentario").val().length==0 || $("#i_comentario").val().length<20){
	    		alert("error:llene comentarios minimo 20 caracteres");
	    		return;
	    	}
            else{                      // Primero validará el formulario.
            $.post("insertar.php",$("#formdata").serialize(),function(data){

                alert(data);
            });

        }//valida forma
        
    }); 
});


 function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if(!regex.test(email)) {
    return false;
  }else{
    return true;
  }
}