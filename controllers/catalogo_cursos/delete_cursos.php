<!--CONTROLADOR CURSOS-->
<?php
set_include_path("C:/xampp/htdocs/preregistro_cursos(SP)/models/lista_aspirantes");
include("class_catalogo_cursos_dal.php");
if(isset($_POST['id'])){
   $id=  $_POST['id'];
			$metodos_cursos=new catalogo_cursos_dal;
			$obj_curso=new catalogo_cursos($id,NULL);
			$cuantos=$metodos_cursos->borrar_curso($obj_curso);
      echo $cuantos;
}
else{
  echo "no llego correctamente el id, error backend";
}
?>