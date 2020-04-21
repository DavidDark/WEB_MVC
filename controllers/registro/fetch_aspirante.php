<!--CONTROLADOR REGISTRO-->
<?php
set_include_path("C:/xampp/htdocs/preregistro_cursos(SP)/models/registro");
include("class_aspirantes_dal.php");
if(isset($_POST['rfc'])){
   $rfc=  $_POST['rfc'];
   //echo $rfc;
      $output='';      
      $metodos_aspirantes=new aspirantes_dal;

      $busca_aspirantes=$metodos_aspirantes->existeRfc($rfc);
      if ($busca_aspirantes==0){
        echo 0;
        exit;
      }

      
      $result_aspirantes=$metodos_aspirantes->get_datos_by_rfc($rfc);

      foreach ($result_aspirantes as $key => $value) {
        $arreglo=array(
        "nombrex"=>$value->getNombre(),
        "paternox"=>$value->getPaterno(),
        "maternox"=>$value->getMaterno(),
        "empresax"=>$value->getEmpresa(),
        "telefonox"=>$value->getTelefono(),
        "emailx"=>$value->getEmail()
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