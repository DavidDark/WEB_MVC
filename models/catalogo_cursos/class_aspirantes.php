<?php
if(class_exists('class_aspirantes') != true)
{
	class aspirantes{
		protected $rfc;
		protected $nombre;
		protected $paterno;
		protected $materno;
		protected $empresa;
		protected $telefono;
		protected $email;
		public $fecha_registro;

public function __construct($rfc=NULL,$nombre=NULL,$paterno=NULL,$materno=NULL,$empresa=NULL,$telefono=NULL,$email=NULL,$fecha_registro=NULL)
  		{
		   $this->rfc=$rfc;
		   $this->nombre=$nombre;
		   $this->paterno=$paterno;
		   $this->materno=$materno;
		   $this->empresa=$empresa;
		   $this->telefono=$telefono;
		   $this->email=$email;
		   $this->fecha_registro=$fecha_registro;
  		}

  		/*getters & setters*/
  		
	public function setRfc($rfc){
		$this->rfc=$rfc;
	}
	
	public function getRfc(){
		return $this->rfc;
	}	

	public function setNombre($nombre){
		$this->nombre=$nombre;
	}
	
	public function getNombre(){
		return $this->nombre;
	}	

	public function setPaterno($paterno){
		$this->paterno=$paterno;
	}
	
	public function getPaterno(){
		return $this->paterno;
	}	

	public function setMaterno($materno){
		$this->materno=$materno;
	}
	
	public function getMaterno(){
		return $this->materno;
	}	

	public function setEmpresa($empresa){
		$this->empresa=$empresa;
	}
	
	public function getEmpresa(){
		return $this->empresa;
	}	

	public function setTelefono($telefono){
		$this->telefono=$telefono;
	}
	
	public function getTelefono(){
		return $this->telefono;
	}	

	public function setEmail($email){
		$this->email=$email;
	}
	
	public function getEmail(){
		return $this->email;
	}	

	}
}
?>