<?php
   class Vehiculos{
    private $placa;
    private $modelo;
    private $propietario;
    private $documento;
    private $fecha;

   
    
    
       
    function __construct($placa,$modelo,$propietario,$documento,$fecha)
	{
		$this->setPlaca($placa);
		$this->setModelo($modelo);
		$this->setPropietario($propietario);		
        $this->setDocumento($documento);
        $this->setFecha($fecha);
		
		
	} 
       
    public function getPlaca(){
		return $this->placa;
	} 
	public function setPlaca($placa){
		$this->placa = $placa;
	}



    
    public function getModelo(){
		return $this->modelo;
	} 
	public function setModelo($modelo){
		$this->modelo = $modelo;
	}



    public function getPropietario(){
		return $this->propietario;
	} 
	public function setPropietario($propietario){
		$this->propietario = $propietario;
	}



    public function getDocumento(){
		return $this->documento;
	} 
	public function setDocumento($documento){
		$this->documento = $documento;
	}

	public function getFecha(){
		return $this->fecha;
	} 
	public function setFecha($fecha){
		$this->fecha = $fecha;
	}


       
   
    
    
       
    public static function save($vehiculos){
		$db=Db::getConnect();
		
		$insert=$db->prepare('INSERT INTO vehiculos VALUES (:placa, :modelo,:propietario,:documento,:fecha)');
        $insert->bindValue('placa',$vehiculos->getPlaca());
		$insert->bindValue('modelo',$vehiculos->getModelo());
		$insert->bindValue('propietario',$vehiculos->getPropietario());
		$insert->bindValue('documento',$vehiculos->getDocumento());
		$insert->bindValue('fecha',$vehiculos->getFecha());
	
		
		$insert->execute();
	}
 
	public static function all(){
		$db=Db::getConnect();
		$listaVehiculos=[];
 
		$select=$db->query('SELECT * FROM vehiculos order by placa');
 
		foreach($select->fetchAll() as $vehiculos){
			$listaVehiculos[]=new vehiculos($vehiculos['placa'],$vehiculos['modelo'],$vehiculos['propietario'],$vehiculos['documento'],$vehiculos['fecha']);
		}
		return $listaVehiculos;
	}
 
	public static function searchById($placa){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM vehiculos WHERE placa=:placa');
		$select->bindValue('placa',$placa);
		$select->execute();
 
		$vehiculosDb=$select->fetch();
 
 
		$vehiculos = new vehiculos ($vehiculosDb['placa'],$vehiculosDb['modelo'],$vehiculosDb['propietario'],$vehiculosDb['documento'],$vehiculosDb['fecha']);
		
		return $vehiculos;
 
	}
 
	public static function update($vehiculos){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE vehiculos SET modelo=:modelo,  propietario=:propietario, documento=:documento, fecha=:fecha');
		$update->bindValue('placa', $vehiculos->getPlaca());
		$update->bindValue('modelo', $vehiculos->getModelo());
		$update->bindValue('propietario',$vehiculos->getPropietario());
		$update->bindValue('documento',$vehiculos->getDocumento());
		$update->bindValue('fecha',$vehiculos->getFecha());
		
		$update->execute();
	}
 
	public static function delete($placa){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM vehiculos WHERE placa=:placa');
		$delete->bindValue('placa',$placa);
		$delete->execute();		
	}
}
?>