<?php
   class Granja{
    private $idGranja;
    private $nombre;
    private $direccion;
    private $telefono;
    private $cantidadhectareas;	
    private $idAdministrador ;
    
    function __construct($idGranja,$nombre,$direccion,$telefono, $cantidadhectareas)
	{
		$this->setIdGranja($idGranja);
		$this->setNombre($nombre);
        $this->setDireccion($direccion);
		$this->setTelefono($telefono);	
		$this->setCantidadhectareas($cantidadhectareas);		
		// $this->setIdAdministrador($idAdministrador);
	} 
       
    public function getIdGranja(){
		return $this->idGranja;
	}
 
	public function setIdGranja($idGranja){
		$this->idGranja = $idGranja;
	}
    
    public function getNombre(){
		return $this->nombre;
	}
 
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
    public function getDireccion(){
		return $this->direccion;
	}
	public function setDireccion($direccion){
		$this->direccion = $direccion;
	}
    
    public function getTelefono(){
		return $this->telefono;
	}
 
	public function setTelefono($telefono){
		$this->telefono = $telefono;
	}

	  public function getCantidadhectareas(){
		return $this->cantidadhectareas;
	}
 
	public function setCantidadhectareas($cantidadhectareas){
		$this->cantidadhectareas = $cantidadhectareas;
	}



    public function getIdAdministrador(){
		return $this->idAdministrador;
	}
 
	public function setIdAdministrador($idAdministrador){
		$this->idAdministrador = $idAdministrador;
	}  
    
    public static function save($granja){
		$db=Db::getConnect();
		//var_dump($granja);
		//die();
		$insert=$db->prepare('INSERT INTO granja VALUES (:idGranja, :nombre,:direccion,:telefono, :cantidadhectareas ,:idAdministrador)');
        $insert->bindValue('idGranja',$granja->getIdGranja());
		$insert->bindValue('nombre',$granja->getNombre());
        $insert->bindValue('direccion',$granja->getDireccion());
		$insert->bindValue('telefono',$granja->getTelefono());
		$insert->bindValue('cantidadhectareas',$granja->getCantidadhectareas());
		$insert->bindValue('idAdministrador',$granja->getIdAdministrador());
		$insert->execute();
	}
 
	public static function all(){
		$db=Db::getConnect();
		$listaGranja=[];
 
		$select=$db->query('SELECT * FROM granja order by idGranja');
 
		foreach($select->fetchAll() as $granja){
			$listaGranja[]=new Granja($granja['idGranja'],$granja['nombre'],$granja['direccion'],$granja['telefono'] ,
				$granja['cantidadhectareas'] ,$granja['idAdministrador']);
		}
		return $listaGranja;
	}
 
	public static function searchById($idGranja){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM granja WHERE idGranja=:idGranja');
		$select->bindValue('idGranja',$idGranja);
		$select->execute();
 
		$granjaDb=$select->fetch();
 
 
		$granja = new Granja ($granjaDb['idGranja'],$granjaDb['nombre'],$granjaDb['direccion'],$granjaDb['telefono'],$granjaDb['cantidadhectareas'] ,$granjaDb['idAdministrador']);
		//var_dump($granja);
		//die();
		return $granja;
 
	}
 
	public static function update($granja){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE granja SET nombre=:nombre, direccion=:direccion, telefono=:telefono, cantidadhectareas=:cantidadhectareas ,  idAdministrador=:idAdministrador WHERE idGranja=:idGranja');
		$update->bindValue('idGranja', $granja->getIdGranja());
		$update->bindValue('nombre', $granja->getNombre());
		$update->bindValue('direccion',$granja->getDireccion());
        $update->bindValue('telefono',$granja->getTelefono());
        $update->bindValue('cantidadhectareas',$granja->getCantidadhectareas());
		$update->bindValue('idAdministrador',$granja->getIdAdministrador());
		$update->execute();
	}
 
	public static function delete($idGranja){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM granja WHERE idGranja=:idGranja');
		$delete->bindValue('idGranja',$idGranja);
		$delete->execute();		
	}
}
?>
