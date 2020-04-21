<!-- MODELO REGISTRO-->
<!-- MODELO LISTA ASPIRANTES-->

<?php
set_include_path("C:/xampp/htdocs/preregistro_cursos(SP)/models/registro");
include("class_lista_aspirantes_cursos.php");
set_include_path("C:/xampp/htdocs/preregistro_cursos(SP)/models/");
include("class_db.php");
class lista_aspirantes_cursos_dal extends class_db{
	
	function __construct()
	{
		parent::__construct();
	}

	function __destruct()
	{
        parent::__destruct();

	}

    //Obtener listado
    function get_datos_lista_aspirantes_cursos(){
       //$nivel=$this->db_conn->real_escape_string($nivel); evitar sql injection

       $elsql ="select a.rfc,a.nombre,a.apellido_pat,a.apellido_mat,a.empresa,a.telefono,
a.email,c.id_curso,c.nombre_curso
from aspirantes_cursos ac join 
aspirantes a on ac.rfc=a.rfc
join catalogo_cursos c on ac.id_curso=c.id_curso
order by a.rfc";

        //print $elsql;exit;
        $this->set_sql($elsql);
        $lista=NULL;
        $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
        $total_de_aspirantes = mysqli_num_rows($rs);
        $i=0;
        while($renglon = mysqli_fetch_assoc($rs)) {
                   $obj_det = new lista_aspirantes_cursos($renglon["rfc"],utf8_encode($renglon["nombre"]),$renglon["apellido_pat"],$renglon["apellido_mat"],$renglon["empresa"],$renglon["telefono"],$renglon["email"],$renglon["id_curso"],$renglon["nombre_curso"]);
    
  
            $i++;
            $lista[$i]=$obj_det;
            unset($obj_det);
        }
        mysqli_free_result($rs);
        return $lista;
     }


    //Obtener listado
    function get_datos_lista_aspirantes_cursos_rfc_id_curso($rfc,$id_curso){
       $rfc=$this->db_conn->real_escape_string($rfc);
       $id_curso=$this->db_conn->real_escape_string($id_curso);
       $elsql ="select a.rfc,a.nombre,a.apellido_pat,a.apellido_mat,a.empresa,a.telefono,
a.email,c.id_curso,c.nombre_curso
from aspirantes_cursos ac join 
aspirantes a on ac.rfc=a.rfc
join catalogo_cursos c on ac.id_curso=c.id_curso
where ac.id_curso='$id_curso' and a.rfc='$rfc'";

        //print $elsql;exit;
        $this->set_sql($elsql);
        $lista=NULL;
        $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
        $total_de_aspirantes = mysqli_num_rows($rs);
        $i=0;
        while($renglon = mysqli_fetch_assoc($rs)) {
                   $obj_det = new lista_aspirantes_cursos($renglon["rfc"],utf8_encode($renglon["nombre"]),$renglon["apellido_pat"],$renglon["apellido_mat"],$renglon["empresa"],$renglon["telefono"],$renglon["email"],$renglon["id_curso"],$renglon["nombre_curso"]);
    
  
            $i++;
            $lista[$i]=$obj_det;
            unset($obj_det);
        }
        mysqli_free_result($rs);
        return $lista;
     }

}
?>