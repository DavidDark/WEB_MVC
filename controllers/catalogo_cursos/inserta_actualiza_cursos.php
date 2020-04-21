<!--CONTROLADOR CURSOS-->
<?php
if(!empty($_POST))  {
  set_include_path("C:/xampp/htdocs/preregistro_cursos(SP)/controllers/registro/php");
require_once 'funciones_php.php';
set_include_path("C:/xampp/htdocs/preregistro_cursos(SP)/models/lista_aspirantes");
include("class_catalogo_cursos_dal.php");
$metodos_cursos=new catalogo_cursos_dal;

if (isset($_POST["curso_id"])) 
  {
    $curso_id=strtoupper($_POST["curso_id"]);
  }else
    {
    $curso_id=null;
    echo "no se recibio post";
    exit;
    }

if (isset($_POST["f_nombre"])) 
  {
    $nombre_curso=strtoupper($_POST["f_nombre"]);
  }else
    {
    $nombre_curso=null;
    echo "no se recibio post";
    exit;
    }

$errores = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if (!validaRequerido($nombre_curso)) {
      $errores[] = 'El campo nombre de curso se recibió vacio.';
   }

   if(!$errores){
			$obj_curso=new catalogo_cursos($curso_id,$nombre_curso);
			/*
			print "<pre>";
			print_r($obj_curso);
			print "</pre>";
			return;
			*/
if ($curso_id==''){		
		if($metodos_cursos->insertar_curso($obj_curso)=="1"){
      echo 'ok';
			}else{
			  print "Ocurrió un error al tratar de guardar su registro. Dicha registro no se guardó en nuestra Base de datos, vuelva a intentar";
			}
	
}
else{
      if($metodos_cursos->actualiza_curso($obj_curso)=="1"){
       echo 'ok'; 
      }else{
        print "Ocurrió un error al tratar de actualizar su registro. Dicha registro no se guardó en nuestra Base de datos, vuelva a intentar";
      }	
   				
}
	}
	else{
			echo '<ul style="color: #f00;font-size:25px;">';
      		foreach ($errores as $error):
         	echo '<li>'.$error.'</li>';
      		endforeach;
   			echo '</ul>';
	unset($obj_curso);
  }
}
else{
	echo 'No se recibieron datos por el metodo post, vuelva a intentar';
}

} //hay post
?>