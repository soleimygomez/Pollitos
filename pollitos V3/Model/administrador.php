<?php
   class administrador{
    private $id;
    private $nombre;
    private $apellido;
    private $identificacion;
    private $telefono;
    
    
       
    function __construct($id,$nombre,$apellido,$identificacion,$telefono)
	{
		$this->setId($id);
		$this->setNombre($nombre);
		$this->setApellido($apellido);		
        $this->setIdentificacion($identificacion);
		$this->setTelefono($telefono);
		
	} 
       
    public function getId(){
		return $this->id;
	}
 
	public function setId($id){
		$this->id = $id;
	}
    
    public function getNombre(){
		return $this->nombre;
	}
 
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
    public function getApellido(){
		return $this->apellido;
	}
 
	public function setApellido($apellido){
		$this->apellido = $apellido;
	}
    public function getIdentificacion(){
		return $this->identificacion;
	}
 
	public function setIdentificacion($identificacion){
		$this->identificacion = $identificacion;
	}

    public function getTelefono(){
		return $this->telefono;
	}
 
	public function setTelefono($telefono){
		$this->telefono = $telefono;
	}
       
   
    
    
       
    public static function save($administrador){
		$db=Db::getConnect();
		
		$insert=$db->prepare('INSERT INTO administrador VALUES (:id, :nombre,:apellido,:identificacion,:telefono)');
        $insert->bindValue('id',$administrador->getId());
		$insert->bindValue('nombre',$administrador->getNombre());
		$insert->bindValue('apellido',$administrador->getApellido());
	$insert->bindValue('identificacion',$administrador->getIdentificacion());
		$insert->bindValue('telefono',$administrador->getTelefono());
		
		$insert->execute();
	}
 
	public static function all(){
		$db=Db::getConnect();
		$listaAdministrador=[];
 
		$select=$db->query('SELECT * FROM administrador order by id');
 
		foreach($select->fetchAll() as $administrador){
			$listaAdministrador[]=new administrador($administrador['id'],$administrador['nombre'],$administrador['apellido'],$administrador['identificacion'],$administrador['telefono']);
		}
		return $listaAdministrador;
	}
 
	public static function searchById($id){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM administrador WHERE id=:id');
		$select->bindValue('id',$id);
		$select->execute();
 
		$administradorDb=$select->fetch();
 
 
		$administrador = new administrador ($administradorDb['id'],$administradorDb['nombre'],$administradorDb['apellido'],$administradorDb['identificacion'],$administradorDb['telefono']);
		
		return $administrador;
 
	}
 
	public static function update($administrador){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE administrador SET nombre=:nombre,  apellido=:apellido, identificacion=:identificacion, telefono=:telefono');
		$update->bindValue('id', $administrador->getId());
		$update->bindValue('nombre', $administrador->getNombre());
		$update->bindValue('apellido',$administrador->getApellido());
	$update->bindValue('identificacion',$administrador->getIdentificacion());
		$update->bindValue('telefono',$administrador->getTelefono());
		
		$update->execute();
	}
 
	public static function delete($id){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM administrador WHERE id=:id');
		$delete->bindValue('id',$id);
		$delete->execute();		
	}
}
?>