<!-- CONTROLADOR REGISTRO-->
<!DOCTYPE html>
<html>
<head>
    <?php
    set_include_path("C:/xampp/htdocs/preregistro_cursos(SP)/views/dependencias/inclusiones");
    include_once "meta_tags.php"; ?>
    <title>Catálogo de Cursos</title>
    <?php
    set_include_path("C:/xampp/htdocs/preregistro_cursos(SP)/views/dependencias/inclusiones");
    include_once "css_y_favicon.php"; ?>
</head>
<body>
</body>
</html>
<?php
set_include_path("C:/xampp/htdocs/preregistro_cursos(SP)/controllers/registro/php");
require_once 'funciones_php.php';
include("C:/xampp/htdocs/preregistro_cursos(SP)/models/registro/class_aspirantes_dal.php");
include("C:/xampp/htdocs/preregistro_cursos(SP)/models/catalogo_cursos/class_aspirantes_cursos_dal.php");
set_include_path("C:/xampp/htdocs/preregistro_cursos(SP)/views/dependencias/inclusiones");
include_once 'js_incluidos.php';
$irfc=(isset($_POST["irfc"])) ? strtoupper($_POST["irfc"]) : null;
$inombre=(isset($_POST["inombre"])) ? strtoupper($_POST["inombre"]) : null;
$ipaterno=(isset($_POST["ipaterno"])) ? strtoupper($_POST["ipaterno"]) : null;
$imaterno=(isset($_POST["imaterno"])) ? strtoupper($_POST["imaterno"]) : null;
$iempresa=(isset($_POST["iempresa"])) ? strtoupper($_POST["iempresa"]) : null;
$itelefono=isset($_POST["itelefono"]) ? strtoupper($_POST["itelefono"]) : null;
$iemail=isset($_POST["iemail"]) ? $_POST["iemail"] : null;
$scurso=isset($_POST["scurso"]) ? $_POST["scurso"] : null;

$errores = array();
//$scurso='0'; /*para provocar error del lado del server*/

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if (!validaRequerido($irfc)) {
      $errores[] = 'El campo rfc se recibio vacio.';
   }

	if (!validaRequerido($inombre)) {
      $errores[] = 'El campo nombre se recibio vacio.';
   }

	if (!validaRequerido($ipaterno)) {
      $errores[] = 'El campo apellido paterno se recibio vacio.';
   }

	if (!validaRequerido($imaterno)) {
      $errores[] = 'El campo apellido materno se recibio vacio.';
   }

	if (!validarNumerico($itelefono)) {
      $errores[] = 'El campo telefono no fue numérico.';
   }

   if (!validaEmail($iemail)) {
      $errores[] = 'El campo email es incorrecto.';
   }

   if (!validaSelecthtml($scurso)) {
      $errores[] = 'El campo de curso fue recibido sin selección válida.';
   }

   if(!$errores){

			$obj_aspirantes=new aspirantes($irfc,$inombre,$ipaterno,$imaterno,$iempresa,$itelefono,$iemail);
			/*
			print "<pre>";
			print_r($obj_registro);
			print "</pre>";
			return;
			*/
			$metodos_aspirantes=new aspirantes_dal;
			$cuantos=$metodos_aspirantes->existeRfc($irfc);

      $metodos_aspirantes_cursos=new aspirantes_cursos_dal;
      $cuantos_cursos=$metodos_aspirantes_cursos->existeRfc($irfc,$scurso);

      $obj_aspirantes_cursos=new aspirantes_cursos($irfc,$scurso);
      if ($cuantos==0){			

			if($metodos_aspirantes->insertar($obj_aspirantes)=="1" and 
        ($metodos_aspirantes_cursos->insertar_aspirante_curso($obj_aspirantes_cursos)=="1")){
			 // print "Registro recibido correctamente. Gracias por completar estos datos que serán tomados en cuenta para contactarte.";

print '<script>';
print 'Swal.fire({
                          title: "Registro a cursos",
                          text: "¡Aspirante y Curso Ingresado Correctamente!",
                          type: "success"
                          }).then(function() {
                            window.location = "registro2.php";
                          });';
print '</script>';
			}else{
			  print "Ocurrió un error al tratar de guardar su registro. Dicha registro no se guardó en nuestra Base de datos, vuelva a intentar";
			}
	
}
else{
			//echo '<ul style="color: #f00;font-size:25px;">';
         	//echo '<li>"Registro ya existe"</li>';
   			//echo '</ul>';
   			//echo '<script>';
   			//echo 'alert("Registro ya existe, no se permiten duplicados");';
   			//echo 'window.history.back();';
   			//echo '</script>';
   //aqui recargar datos y solo gabar curso en la tabla muchos a mucho, pero antes vlaidar que no haya ya seleciconado el curso
        $metodos_aspirantes_cursos=new aspirantes_cursos_dal;
        $cuantos=$metodos_aspirantes_cursos->existeRfc($irfc,$scurso);
        if ($cuantos_cursos>0)
        {
          print '<script>';
                          print 'Swal.fire({
                          title: "Ya esta Registrado en el curso que desea ingresar",
                          text: "¡Aspirante y Curso ya han sido registrados, no puede haber duplicados!",
                          type: "warning"
                          }).then(function() {
                            window.location = "registro2.php";
                          });';
                          print '</script>';
        }
        else{

      if($metodos_aspirantes_cursos->insertar_aspirante_curso($obj_aspirantes_cursos)=="1"){
       // print "Registro recibido correctamente. Gracias por completar estos datos que serán tomados en cuenta para contactarte.";

                          print '<script>';
                          print 'Swal.fire({
                          title: "Registro a cursos",
                          text: "¡Curso fue registrado Correctamente!",
                          type: "success"
                          }).then(function() {
                            window.location = "registro2.php";
                          });';
                          print '</script>';
      }else{
        print "Ocurrió un error al tratar de guardar su registro. Dicha registro no se guardó en nuestra Base de datos, vuelva a intentar";
      }




        }
   				
}
	}
	else{
			echo '<ul style="color: #f00;font-size:25px;">';
      		foreach ($errores as $error):
         	echo '<li>'.$error.'</li>';
      		endforeach;
   			echo '</ul>';
	}
}
else{
	echo 'No se recibieron datos por el metodo post, vuelva a intentar';
}
?>