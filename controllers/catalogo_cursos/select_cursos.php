<!--CONTROLADOR CURSOS-->
<?php
set_include_path("C:/xampp/htdocs/preregistro_cursos(SP)/models/lista_aspirantes");
include("class_catalogo_cursos_dal.php");
if(isset($_POST['id'])){
   $id=  $_POST['id'];
   //echo $id;
      $output='';      
      $metodos_cursos=new catalogo_cursos_dal;
      $result_cursos=$metodos_cursos->get_datos_cursos_by_id($id);

      foreach ($result_cursos as $key => $value) {
        $idCurso=$value->getId_Curso();
        $nombreCurso=utf8_encode($value->getNombre_Curso());
      }

$output .= '  
      <div class="table-responsive">  
           <table class="table table-striped">';  
       
           $output .= '  
                <tr>  
                     <td width="30%"><label>ID Curso:</label></td>  
                     <td width="70%">'.$idCurso.'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Nombre Curso:</label></td>  
                     <td width="70%">'.$nombreCurso.'</td>  
                </tr>  
           ';
      
      $output .= '  
           </table>  
      </div>  
      ';

       echo $output; 
}
else{
  echo "no llego correctamente el id, error backend,ver id de egreso en modal";
  exit;  
}
?>