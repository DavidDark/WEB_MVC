<!-- CONTROLADOR LISTA ASPIRANTES -->
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
        $vrfc=$value->rfc;
        $vnombre=utf8_encode($value->nombre);
        $vpaterno=utf8_encode($value->paterno);
        $vmaterno=utf8_encode($value->materno);
        $vempresa=utf8_encode($value->empresa);
        $vtelefono=$value->telefono;
        $vemail=$value->email;
        $vid_curso=$value->id_curso;
        $vnombre_curso=utf8_encode($value->nombre_curso);

      }

$output .= '  
      <div class="table-responsive">  
           <table class="table table-striped">';  
       
           $output .= '  

                <tr>  
                     <td width="30%"><label>RFC:</label></td>  
                     <td width="70%">'.$vrfc.'</td>  
                </tr>

                <tr>  
                     <td width="30%"><label>Nombre:</label></td>  
                     <td width="70%">'.$vnombre.'</td>  
                </tr>

                <tr>  
                     <td width="30%"><label>Apellido Paterno:</label></td>  
                     <td width="70%">'.$vpaterno.'</td>  
                </tr>

                <tr>  
                     <td width="30%"><label>Apellido Materno:</label></td>  
                     <td width="70%">'.$vmaterno.'</td>  
                </tr>

                <tr>  
                     <td width="30%"><label>Empresa:</label></td>  
                     <td width="70%">'.$vempresa.'</td>  
                </tr>

                <tr>  
                     <td width="30%"><label>Teléfono:</label></td>  
                     <td width="70%">'.$vtelefono.'</td>  
                </tr>


                <tr>  
                     <td width="30%"><label>Correo Electrónico:</label></td>  
                     <td width="70%">'.$vemail.'</td>  
                </tr>

                <tr>  
                     <td width="30%"><label>ID Curso:</label></td>  
                     <td width="70%">'.$vid_curso.'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Nombre Curso:</label></td>  
                     <td width="70%">'.$vnombre_curso.'</td>  
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