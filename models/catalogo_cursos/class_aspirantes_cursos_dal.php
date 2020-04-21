<?php
include("C:/xampp/htdocs/preregistro_cursos(SP)/models/catalogo_cursos/class_aspirantes_cursos.php");
include("C:/xampp/htdocs/preregistro_cursos(SP)/models/class_db.php");
class aspirantes_cursos_dal extends class_db{
	
	function __construct()
	{
		parent::__construct();
	}

	function __destruct()
	{
        parent::__destruct();

	}

 
            //Insertar
    function insertar_aspirante_curso($obj){
        $fecha=date("Y-m-d H:i:s");
        $sql = "insert into aspirantes_cursos (";
        $sql .= "rfc,";
        $sql .= "id_curso,";
        $sql .= "fecha_registro";
        $sql .= ") ";
        $sql .= "values(";
        $sql .= "'".$obj->getRfc()."',";
        $sql .= "'".$obj->getId_Curso()."',";
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
    function borrar_curso($obj){
        
        $sql = "delete from aspirantes_cursos where rfc='".$obj->getRfc()."' and id_curso='".$obj->getId_Curso()."'";
     
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


    function actualiza_curso($obj,$iid_curso){
/*
        echo '<pre>';
        echo print_r($obj);
        echo '</pre>';exit;
*/
        $sql = "update aspirantes_cursos set ";
        $sql .= "id_curso=".$obj->getId_Curso();
        $sql .= " where rfc = '".$obj->getRfc()."' and id_curso=$iid_curso";

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


        function existeRfc($rfc,$id_curso){
        $rfc=$this->db_conn->real_escape_string($rfc);
        $id_curso=$this->db_conn->real_escape_string($id_curso);

        $sql = "select count(*) from aspirantes_cursos";
        $sql .= " where rfc='$rfc' and id_curso='$id_curso'";

        //print $sql;
        $this->set_sql($sql);
        $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
        //$total_de_registro = mysqli_num_rows($rs);
        $renglon= mysqli_fetch_array($rs);
        $cuantos= $renglon[0];

        return $cuantos;
    }


        function cuantosRfc($rfc){
        $rfc=$this->db_conn->real_escape_string($rfc);
        
        $sql = "select count(*) from aspirantes_cursos";
        $sql .= " where rfc='$rfc'";

        //print $sql;
        $this->set_sql($sql);
        $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
        //$total_de_registro = mysqli_num_rows($rs);
        $renglon= mysqli_fetch_array($rs);
        $cuantos= $renglon[0];

        return $cuantos;
    }

}
?>