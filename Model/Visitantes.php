<?php
   class Visitantes{
    private $id;
    private $nombre;
    private $cedula;
    private $fecha_ingreso;
   
    
    
       
    function __construct( $id,$nombre,$cedula,$fecha_ingreso)
	{
		$this->setId($id);
		$this->setNombre($nombre);
		$this->setCedula($cedula);		
        $this->setFecha_ingreso($fecha_ingreso);
		
		
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


       
   
    
    
       
    public static function save($visitantes){
		$db=Db::getConnect();
		
		$insert=$db->prepare('INSERT INTO visitantes VALUES (:id, :nombre,:cedula,:fecha_ingreso)');
        $insert->bindValue('id',$visitantes->getId());
		$insert->bindValue('nombre',$visitantes->getNombre());
		$insert->bindValue('cedula',$visitantes->getCedula());
		$insert->bindValue('fecha_ingreso',$visitantes->getFecha_ingreso());
	
		
		$insert->execute();
	}
 
	public static function all(){
		$db=Db::getConnect();
		$listaVisitantes=[];
 
		$select=$db->query('SELECT * FROM visitantes order by id');
 
		foreach($select->fetchAll() as $visitantes){
			$listaVisitantes[]=new visitantes($visitantes['id'],$visitantes['nombre'],$visitantes['cedula'],$visitantes['fecha_ingreso']);
		}
		return $listaVisitantes;
	}
 
	public static function searchById($id){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM visitantes WHERE id=:id');
		$select->bindValue('id',$id);
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
 
	public static function delete($id){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM visitantes WHERE id=:id');
		$delete->bindValue('id',$id);
		$delete->execute();		
	}
}
?>