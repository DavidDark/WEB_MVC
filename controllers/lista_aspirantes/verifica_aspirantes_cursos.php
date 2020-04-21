<!--CONTROLADOR LISTA ASPIRANTES-->
<?php
set_include_path("C:/xampp/htdocs/preregistro_cursos(SP)/models/catalogo_cursos");
include("class_aspirantes_cursos_dal.php");
if(isset($_POST['rfc']) and isset($_POST['id_curso'])){
   $rfc=  $_POST['rfc'];
   $id_curso=  $_POST['id_curso'];

      $metodos_aspirantes_cursos=new aspirantes_cursos_dal;
      $result_aspirantes_cursos=$metodos_aspirantes_cursos->existeRfc($rfc,$id_curso);


       echo $result_aspirantes_cursos; 
}
else{
  echo "no llego correctamente el id y rfc, error backend,checa existe rfc,id_curso";
  exit;  
}
?>