<!--CONTROLADOR LISTA ASPIRANTES-->
<?php
set_include_path("C:/xampp/htdocs/preregistro_cursos(SP)/models/catalogo_cursos");
include("class_aspirantes_cursos_dal.php");
if(isset($_POST['rfc']) and isset($_POST['id_curso'])){
   $rfc=  $_POST['rfc'];
   $id_curso=  $_POST['id_curso'];
			$metodos_registro_cursos=new aspirantes_cursos_dal;
			$obj_registro_cursos=new aspirantes_cursos($rfc,$id_curso);
				
			$cuantosRfc=$metodos_registro_cursos->cuantosRfc($rfc);	
			if ($cuantosRfc>1){	
				$cuantos=$metodos_registro_cursos->borrar_curso($obj_registro_cursos);
			}
			else{
				set_include_path("C:/xampp/htdocs/preregistro_cursos(SP)/models/registro");
				include("class_aspirantes_dal.php");
				$cuantos=$metodos_registro_cursos->borrar_curso($obj_registro_cursos);

				$metodos_aspirantes=new aspirantes_dal;
				$obj_aspirantes=new aspirantes($rfc,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
				$cuantos_rfc=$metodos_aspirantes->borrar($obj_aspirantes);

				if ($cuantos==1 && $cuantos_rfc==1){
					$cuantos=1;
				}
				else{
					$cuantos=-1000;
				}
			} 
      

      echo $cuantos;
}
else{
  echo "no llego correctamente el id, error backend";
}
?>