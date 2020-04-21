<!-- MODELO REGISTRO-->
<?php
if(class_exists('class_lista_aspirantes_cursos') != true)
{
	class lista_aspirantes_cursos{
		public $rfc;
		public $nombre;
		public $paterno;
		public $materno;
		public $empresa;
		public $telefono;
		public $email;
		public $id_curso;
		public $nombre_curso;

public function __construct($rfc=NULL,$nombre=NULL,$paterno=NULL,$materno=NULL,$empresa=NULL,$telefono=NULL,$email=NULL,$id_curso=NULL,$nombre_curso=NULL)
  		{
		   $this->rfc=$rfc;
		   $this->nombre=$nombre;
		   $this->paterno=$paterno;
		   $this->materno=$materno;
		   $this->empresa=$empresa;
		   $this->telefono=$telefono;
		   $this->email=$email;
		   $this->id_curso=$id_curso;
		   $this->nombre_curso=$nombre_curso;
  		}

  

	}
}
?>