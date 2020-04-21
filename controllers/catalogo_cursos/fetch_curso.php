<!--CONTROLADOR CURSOS-->
<?php
set_include_path("C:/xampp/htdocs/preregistro_cursos(SP)/models/lista_aspirantes");
include("class_catalogo_cursos_dal.php");
if(isset($_POST['curso_id'])){
   $id=  $_POST['curso_id'];
   //echo $id;
      $output='';      
      $metodos_cursos=new catalogo_cursos_dal;
      $result_cursos=$metodos_cursos->get_datos_cursos_by_id($id);
      foreach ($result_cursos as $key => $value) {
        $arreglo=array(
        "IDCurso"=>$value->getId_Curso(),
        "nombre_curso"=>$value->getNombre_Curso()
        );


}
      $arreglo = array_map('utf8_encode',$arreglo);
      echo json_encode($arreglo,JSON_UNESCAPED_UNICODE);
}
else{
  echo "no llego correctamente el id, error backend,ver id de egreso en modal";
  exit;  
}
?>