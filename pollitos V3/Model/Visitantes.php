<?php
   class Visitantes{
    private $nombre;
    private $cedula;
    private $fecha_ingreso;
    private $tipo;
    
    
       
    function __construct( $nombre,$cedula,$fecha_ingreso,$tipo)
	{
		$this->setNombre($nombre);
		$this->setCedula($cedula);		
        $this->setFecha_ingreso($fecha_ingreso);
        $this->setTipo($tipo);
		
		
	} 
       
   


    public function getNombre(){
		return $this->nombre;
	} 
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}


    public function getCedula(){
		return $this->cedula;
	} 
	public function setCedula($cedula){
		$this->cedula = $cedula;
	}


    public function getFecha_ingreso(){
		return $this->fecha_ingreso;
	}
	public function setFecha_ingreso($fecha_ingreso){
		$this->fecha_ingreso = $fecha_ingreso;
	}

	public function getTipo(){
		return $this->tipo;
	}
	public function setTipo($tipo){
		$this->tipo = $tipo;
	}


       
   
    
    
       
    public static function save($visitantes){
		$db=Db::getConnect();
		
		$insert=$db->prepare('INSERT INTO visitantes VALUES ( :nombre,:cedula,:fecha_ingreso, :tipo)');
		$insert->bindValue('nombre',$visitantes->getNombre());
		$insert->bindValue('cedula',$visitantes->getCedula());
		$insert->bindValue('fecha_ingreso',$visitantes->getFecha_ingreso());
		$insert->bindValue('tipo',$visitantes->getTipo());
		
		$insert->execute();
	}
 
	public static function all(){
		$db=Db::getConnect();
		$listaVisitantes=[];
 
		$select=$db->query('SELECT * FROM visitantes order by nombre');
 
		foreach($select->fetchAll() as $visitantes){
			$listaVisitantes[]=new visitantes($visitantes['nombre'],$visitantes['cedula'],$visitantes['fecha_ingreso'],$visitantes['tipo']);
		}
		return $listaVisitantes;
	}
 
	public static function searchById($cedula){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM visitantes WHERE cedula=:cedula');
		$select->bindValue('cedula',$cedula);
		$select->execute();
 
		$visitantesDb=$select->fetch();
 
 
		$visitantes = new visitantes ($visitantesDb['id'],$visitantesDb['nombre'],$visitantesDb['cedula'],$visitantesDb['fecha_ingreso']);
		
		return $visitantes;
 
	}
 
	public static function update($visitantes){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE visitantes SET nombre=:nombre,  cedula=:cedula, fecha_ingreso=:fecha_ingreso');
		$update->bindValue('id', $visitantes->getId());
		$update->bindValue('nombre', $visitantes->getNombre());
		$update->bindValue('cedula',$visitantes->getCedula());
		$update->bindValue('fecha_ingreso',$visitantes->getFecha_ingreso());
		
		
		$update->execute();
	}
 
	public static function delete($cedula){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM visitantes WHERE cedula=:cedula');
		$delete->bindValue('cedula',$cedula);
		$delete->execute();		
	}
}
?>