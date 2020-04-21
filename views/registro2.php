<!-- VIEW OF REGISDTRO -->
<?php include("../models/lista_aspirantes/class_catalogo_cursos_dal.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <?php include_once "dependencias/inclusiones/meta_tags.php"; ?>
    <title>Registro Cursos</title>
    <?php include_once "dependencias/inclusiones/css_y_favicon.php"; ?></head>
    <link rel="stylesheet" href="css/miestilo2.css">
<body>
<div class="container-fluid">
    <div class="row">
        <?php
        include_once "dependencias/inclusiones/menu_horizontal_superior.php";
        ?>
    </div>
</div>
<div class="container" style="margin-top: 65px !important;">
<div class="header">
	<img src="dependencias/img/mano.png" alt="logo" />
	<h2>Formulario de registro</h2>
</div>

<p>Complete los datos requeridos para poder accesar a nuestros cursos</p>

<div class="bg">
<form action="../controllers/registro/inserta_aspirantes.php" method="post" onsubmit="return valida_cliente();">

<div class="row">
	<div class="col-25">
		<label for="lrfc">R.F.C.</label>
		<label id="estatus" style="color:red;font-size:17px;"></label>
	</div>
	<div class="col-75">	
		<input type="text" id="irfc" name="irfc" maxlength="13" placeholder="Ingrese su rfc" onkeyup="validaRFC();" class="mayusculas">
	</div>	
</div>
	

<div class="row">
	<div class="col-25">	
		<label for="lnombre">Nombre:</label>
	</div>
	<div class="col-75">		
		<input type="text" id="inombre" name="inombre" maxlength="30" placeholder="Ingrese su nombre" class="mayusculas">
	</div>
</div>

	<div class="row">
	<div class="col-25">
		<label for="lpaterno">Paterno:</label>
	</div>
	<div class="col-75">	
		<input type="text" id="ipaterno" name="ipaterno" maxlength="30" placeholder="Ingrese su apellido paterno" class="mayusculas">
		</div>
	</div>

	<div class="row">
		<div class="col-25">
			<label for="lmaterno">Materno:</label>
		</div>
		<div class="col-75">
			<input type="text" id="imaterno" name="imaterno" maxlength="30" placeholder="Ingrese su apellido materno" class="mayusculas">
		</div>
	</div>
	<div class="row">
		<div class="col-25">
			<label for="lempresa">Empresa:</label>
		</div>
		<div class="col-75">
			<input type="text" id="iempresa" name="iempresa" maxlength="50" placeholder="Ingrese su empresa" class="mayusculas">
		</div>
	</div>


	<div class="row">
		<div class="col-25">
			<label for="ltelefono">Telefono:</label>
		</div>
		<div class="col-75">
			<input type="tel" id="itelefono" name="itelefono" pattern="[0-9]{10}" maxlength="10" placeholder="Ingrese su Telefono">
		</div>	
	</div>

	<div class="row">
		<div class="col-25">
			<label for="lemail">Correo:</label>
		</div>
		<div class="col-75">
			<input type="email" id="iemail" name="iemail" maxlength="100" placeholder="Ingrese su Correo Electrónico">
		</div>
	</div>

	<div class="row">


<?php 
$obj_lista_cursos=new catalogo_cursos_dal;
$lista_cursos=$obj_lista_cursos->get_datos_lista_cursos();
/*
echo '<pre>';
print_r($lista_cursos);
echo '</pre>';
*/
if ($lista_cursos==NULL){
        print "<section><h2>No se encontraron resultados de cursos.</h2><h3>No hay cursos registradas</h3></section>";
    }
    else{

?>
    	<div class="col-25">
			<label for="lcurso">Cursos:</label>
		</div>
		<div class="col-75">	
		<select name="scurso" id="scurso">
		<option value="0">Seleccione Curso:</option>
<?php
	foreach ($lista_cursos as $key => $value) {
?>
            <option value="<?=$value->getId_Curso(); ?>"><?=$value->getNombre_Curso(); ?></option>
<?php
                }
?>	
</select>
	</div>
	</div>
<?php
}
?>
		<div class="row2">
			<div class="boton">
				<input type="submit" value="Registrar" class="boton_menu">
			</div>
		</div>

</form>
</div><!-- end bg -->
<?php include_once "dependencias/inclusiones/js_incluidos.php"; ?>
</div><!-- end container -->
</body>
<script src="dependencias/js/funciones2.js"></script>
</html>

<!-- CONTROLADOR? REGISTRO-->
<!-- TODO: Mover esta parte a un archivo nuevo, ponerlo en controlador y conectarlo con include o algo asi-->
<script>
$(document).ready(function() {

	$('#irfc').blur(function() {
  		var rfc = $("#irfc").val();
  		

               $.ajax({  
                url:"../controllers/registro/fetch_aspirante.php",  
                method:"POST",  
                data:{rfc:rfc},  
                dataType:"json",  
                success:function(data){
                //alert(JSON.stringify(data));
                if (data!=0){	
                     $('#inombre').attr('readonly', true);
                     $('#ipaterno').attr('readonly', true);
                     $('#imaterno').attr('readonly', true);
                     $('#iempresa').attr('readonly', true);
                     $('#itelefono').attr('readonly', true);
                     $('#iemail').attr('readonly', true);


                     $('#inombre').val(data.nombrex);  
                     $('#ipaterno').val(data.paternox);  
                     $('#imaterno').val(data.maternox);  
                     $('#iempresa').val(data.empresax);  
                     $('#itelefono').val(data.telefonox);  
                     $('#iemail').val(data.emailx);  
                    }  
                },
                    error : function(request, status, error) {

                            var val = request.responseText;
                            alert("error"+val);
                    }    
           });
 	});

});
</script>