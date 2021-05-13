<?php
   class Lote{
    private $id_lote;
    private $fecha_creacion;
    private $ubicacion;
    private $idGranja;
  
       
    function __construct($id_lote,$fecha_creacion,$ubicacion,$idGranja)
	{
		$this->setIdLote($id_lote);
		$this->setFecha_creacion($fecha_creacion);
		$this->setUbicacion($ubicacion);		
        $this->setId_granja($idGranja);
		
	}
    
    public function getIdLote(){
		return $this->id_lote;
	}
 
	public function setIdLote($id_lote){
		$this->id_lote = $id_lote;
	}
       
    public function getFecha_creacion(){
		return $this->fecha_creacion;
	}
 
	public function setFecha_creacion($fecha_creacion){
		$this->fecha_creacion = $fecha_creacion;
	}
       
    public function getUbicacion(){
		return $this->ubicacion;
	}
 
	public function setUbicacion($ubicacion){
		$this->ubicacion = $ubicacion;
	}
       
    public function getId_granja(){
		return $this->idGranja;
	}
 
	public function setId_granja($idGranja){
		$this->idGranja = $idGranja;
	}
    
    
    
    public static function save($lote){
		$db=Db::getConnect();
		//var_dump($pollito);
		//die();
		$insert=$db->prepare('INSERT INTO lote VALUES (:id_lote, :fecha_creacion,:ubicacion,:idGranja)');
        $insert->bindValue('id_lote',$lote->getIdLote());
		$insert->bindValue('fecha_creacion',$lote->getFecha_creacion());
		$insert->bindValue('ubicacion',$lote->getUbicacion());
		$insert->bindValue('idGranja',$lote->getId_granja());
		
		$insert->execute();
	}
 
	public static function all(){
		$db=Db::getConnect();
		$listaLote=[];
 
		$select=$db->query('SELECT * FROM lote order by id_lote');
 
		foreach($select->fetchAll() as $lote){
			$listaLote[]=new Lote($lote['id_lote'],$lote['fecha_creacion'],$lote['ubicacion'],$lote['idGranja']);
		}
		return $listaLote;
	}

	
 
	public static function searchById($id_lote){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM lote WHERE id_lote=:id_lote');
		$select->bindValue('id_lote',$id_lote);
		$select->execute();
 
		$loteDb=$select->fetch();
 
 
		$lote = new Lote($loteDb['id_lote'],$loteDb['fecha_creacion'],$loteDb['ubicacion'],$loteDb['idGranja']);
		//var_dump($lote);
		//die();
		return $lote;
 
	}
 
	public static function update($lote){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE lote SET fecha_creacion=:fecha_creacion, ubicacion=:ubicacion, idGranja=:idGranja
									WHERE id_lote=:id_lote');
		$update->bindValue('id_lote', $lote->getIdLote());
		$update->bindValue('fecha_creacion',$lote->getFecha_creacion());
		$update->bindValue('ubicacion',$lote->getUbicacion());
		$update->bindValue('idGranja',$lote->getId_granja());
		
		$update->execute();
	}
 
	public static function delete($id_lote){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM lote WHERE id_lote=:id_lote');
		$delete->bindValue('id_lote',$id_lote);
		$delete->execute();		
	}
}
?>