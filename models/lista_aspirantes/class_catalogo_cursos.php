<!-- CONTROLADOR LITA ASPIRANTES-->
<!-- CONTROLADOR CURSOS-->
<?php
if(class_exists('class_catalogo_cursos') != true){

	class catalogo_cursos{
		//variables de instancia
		protected $id_curso;
		protected $nombre_curso;

		public function __construct($id_curso=NULL,$nombre_curso=NULL)
  		{
		   $this->id_curso=$id_curso;
		   $this->nombre_curso=$nombre_curso;
  		}

	public function getId_Curso(){return $this->id_curso;}
	public function setId_Curso($id_curso){$this->id_curso=$id_curso;}

	public function getNombre_Curso(){return $this->nombre_curso;}
	public function setNombre_Curso($nombre_curso){$this->nombre_curso=$nombre_curso;}

	}//end class
}//end class exists
?>