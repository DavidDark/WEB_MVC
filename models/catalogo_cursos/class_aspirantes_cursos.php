<?php
if(class_exists('class_aspirantes_cursos') != true){

	class aspirantes_cursos{
		//variables de instancia
		protected $rfc;
		protected $id_curso;

		public function __construct($rfc=NULL,$id_curso=NULL)
  		{
		   $this->rfc=$rfc;
		   $this->id_curso=$id_curso;
  		}

	public function getRfc(){return $this->rfc;}
	public function setRfc($rfc){$this->rfc=$rfc;}

	public function getId_Curso(){return $this->id_curso;}
	public function setId_Curso($id_curso){$this->id_curso=$id_curso;}

	}//end class
}//end class exists
?>