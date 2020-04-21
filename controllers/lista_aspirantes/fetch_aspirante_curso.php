<!--CONTROLADOR LISTA ASPIRANTES-->
<?php
set_include_path("C:/xampp/htdocs/preregistro_cursos(SP)/models");
include("class_lista_aspirantes_cursos_dal.php");
if(isset($_POST['rfc']) and isset($_POST['id_curso'])){
    $rfc=  $_POST['rfc'];
    $id_curso=  $_POST['id_curso'];
   //echo $id;
      $output='';      
      $metodos_lista_aspirantes_cursos=new lista_aspirantes_cursos_dal;
      $result_lista_aspirantes_cursos=$metodos_lista_aspirantes_cursos->get_datos_lista_aspirantes_cursos_rfc_id_curso($rfc,$id_curso);
      foreach ($result_lista_aspirantes_cursos as $key => $value) {
        $arreglo=array(
        "jrfc"=>$value->rfc,
        "jnombre"=>$value->nombre,
        "jpaterno"=>$value->paterno,
        "jmaterno"=>$value->materno,
        "jempresa"=>$value->empresa,
        "jtelefono"=>$value->telefono,
        "jemail"=>$value->email,
        "jid_curso"=>$value->id_curso,
        "jnombre_curso"=>$value->nombre_curso
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