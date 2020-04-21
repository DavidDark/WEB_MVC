<!-- MODELO REGISTRO-->
<?php
include("C:/xampp/htdocs/preregistro_cursos(SP)/models/catalogo_cursos/class_aspirantes.php");
include("C:/xampp/htdocs/preregistro_cursos(SP)/models/class_db.php");
class aspirantes_dal extends class_db{
	
	function __construct()
	{
		parent::__construct();
	}

	function __destruct()
	{
        parent::__destruct();

	}


	    //Insertar
  	function insertar($obj){
        $fecha=date("Y-m-d H:i:s");

		$sql = "insert into aspirantes (";
  		$sql .= "rfc,";
        $sql .= "nombre,";
        $sql .= "apellido_pat,";
        $sql .= "apellido_mat,";
        $sql .= "empresa,";
        $sql .= "telefono,";
        $sql .= "email,";
        $sql .= "fecha_registro";
     	$sql .= ") ";
		$sql .= "values(";
    	$sql .= "'".$obj->getRfc()."',";
        $sql .= "'".$obj->getNombre()."',";
        $sql .= "'".$obj->getPaterno()."',";
        $sql .= "'".$obj->getMaterno()."',";
        $sql .= "'".$obj->getEmpresa()."', ";
        $sql .= "'".$obj->getTelefono()."', ";
        $sql .= "'".$obj->getEmail()."', ";
        $sql .= "'".$fecha."'";
        $sql .= ")";
		//print $sql;exit;
	   	$this->set_sql($sql);
        $this->db_conn->set_charset("utf8");
        
    	mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));

        if(mysqli_affected_rows($this->db_conn)==1) {
			$insertado=1;
		}else{
			$insertado=0;
		}
		unset($obj);
 		return $insertado;
  	}


        //borrar
    function borrar($obj){
        
        $sql = "delete from aspirantes where rfc='".$obj->getRfc()."'";
     
        //print $sql;exit;
        $this->set_sql($sql);
        $this->db_conn->set_charset("utf8");
        
        mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));

        if(mysqli_affected_rows($this->db_conn)==1) {
            $insertado=1;
        }else{
            $insertado=0;
        }
        unset($obj);
        return $insertado;
    }


    function existeRfc($rfc){
      $rfc=$this->db_conn->real_escape_string($rfc);

        $sql = "select count(*) from aspirantes";
        $sql .= " where rfc='$rfc'";

        //print $sql;
        $this->set_sql($sql);
        $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
        //$total_de_aspirantes = mysqli_num_rows($rs);
        $renglon= mysqli_fetch_array($rs);
        $cuantos= $renglon[0];

        return $cuantos;
    }
/*
    function get_datos_by_rfc($rfc){
      $rfc=$this->db_conn->real_escape_string($rfc);

        $this->set_sql("select rfc,nombre,apellido_pat,apellido_mat,empresa,telefono,email from aspirantes where rfc='$rfc'");

        $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
        $total_de_aspirantes = mysqli_num_rows($rs);
        $obj_det=null;
        $renglon = mysqli_fetch_assoc($rs);
        if($total_de_aspirantes>0){
            $obj_det = new aspirantes(
            $renglon["rfc"],
            utf8_encode($renglon["nombre"]),
            utf8_encode($renglon["apellido_pat"]),
            utf8_encode($renglon["apellido_mat"]),
            utf8_encode($renglon["empresa"]),
            $renglon["telefono"],
            $renglon["email"]
            );
        }
        return $obj_det;
     }

*/
     //Obtener listado
    function get_datos_by_rfc($rfc){
            $rfc=strtoupper($this->db_conn->real_escape_string($rfc));


        $elsql ="select rfc,nombre,apellido_pat,apellido_mat,empresa,telefono,email from aspirantes where rfc='$rfc'";
        //echo $elsql;
        $this->set_sql($elsql);

        $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
        $total_de_registro = mysqli_num_rows($rs);
        $i=0;
        while($renglon = mysqli_fetch_assoc($rs)) {
            $obj_det = new aspirantes($renglon["rfc"],
            utf8_encode($renglon["nombre"]),
            utf8_encode($renglon["apellido_pat"]),
            utf8_encode($renglon["apellido_mat"]),
            utf8_encode($renglon["empresa"]),
            $renglon["telefono"],
            $renglon["email"]);

            $i++;
            $lista[$i]=$obj_det;
            unset($obj_det);
        }

        return $lista;
     }     


    function actualiza_aspirantes($obj){
/*
        echo '<pre>';
        echo print_r($obj);
        echo '</pre>';exit;
*/
        $sql = "update aspirantes set ";
        $sql .= "nombre="."'".$obj->getNombre()."',";
        $sql .= "apellido_pat="."'".$obj->getPaterno()."',";
        $sql .= "apellido_mat="."'".$obj->getMaterno()."',";
        $sql .= "empresa="."'".$obj->getEmpresa()."',";
        $sql .= "telefono="."'".$obj->getTelefono()."',";
        $sql .= "email="."'".$obj->getEmail()."'";
        $sql .= " where rfc = '".$obj->getRfc()."'";

        //echo $sql;//exit;
        
        $this->set_sql($sql);
        $this->db_conn->set_charset("utf8");
        
        mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));

        if(mysqli_affected_rows($this->db_conn)==1) {
            $actualizado=1;
        }else{
            $actualizado=0;
        }
        unset($obj);
        return $actualizado;
    }


    //Obtener listado
    function get_datos_lista_aspirantes(){
       //$nivel=$this->db_conn->real_escape_string($nivel); evitar sql injection

       $elsql ="select r.rfc,r.nombre,r.paterno,r.materno,r.empresa,r.telefono,r.email,c.id_curso,c.descripcion,r.fecha_registro from aspirantes r join cursos c on r.id_curso=c.id_curso
                ORDER BY fecha_registro,paterno,materno,nombre";

        //print $elsql;exit;
        $this->set_sql($elsql);
        $lista=NULL;
        $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
        $total_de_aspirantes = mysqli_num_rows($rs);
        $i=0;
        while($renglon = mysqli_fetch_assoc($rs)) {
                   $obj_det = new aspirantes($renglon["rfc"],utf8_encode($renglon["nombre"]),$renglon["paterno"],$renglon["materno"],$renglon["empresa"],$renglon["telefono"],$renglon["email"],$renglon["id_curso"],$renglon["descripcion"],$renglon["fecha_registro"]);
    
  
            $i++;
            $lista[$i]=$obj_det;
            unset($obj_det);
        }
        mysqli_free_result($rs);
        return $lista;
     }
}
?>