<?php
   class Galpon{
    private $idCriadero;
    private $numeroAves;
    private $lineaGenetica;
    private $id_granjero;
    
    function __construct($idCriadero,$numeroAves,$lineaGenetica,$id_granjero)
	{
		$this->setIdCriadero($idCriadero);
		$this->setNumeroAves($numeroAves);
		$this->setLineaGenetica($lineaGenetica);
		$this->setId_granjero($id_granjero);
	
	}
    public function getIdCriadero(){
		return $this->idCriadero;
	}
 
	public function setIdCriadero($idCriadero){
		$this->idCriadero = $idCriadero;
	}


    public function getNumeroAves(){
		return $this->numeroAves;
	}
 
	public function setNumeroAves($numeroAves){
		$this->numeroAves = $numeroAves;
	}
    public function getLineaGenetica(){
		return $this->lineaGenetica;
	}
 
	public function setLineaGenetica($lineaGenetica){
		$this->lineaGenetica = $lineaGenetica;
	}
 

	public function getId_granjero(){
		return $this->id_granjero;
	}
 
	public function setId_granjero($id_granjero){
		$this->id_granjero = $id_granjero;
	}
    
    public static function save($galpon){
		$db=Db::getConnect();
		//var_dump($galpon);
 		//die();
		$insert=$db->prepare('INSERT INTO galpon VALUES (:idCriadero, :numeroAves,:lineaGenetica, :id_granjero)');
		$insert->bindValue('idCriadero',$galpon->getIdCriadero());
		$insert->bindValue('numeroAves',$galpon->getNumeroAves());
		$insert->bindValue('lineaGenetica',$galpon->getLineaGenetica());
        $insert->bindValue('id_granjero',$galpon->getId_granjero());
		$insert->execute();
	}
    public static function all(){
		$db=Db::getConnect();
		$listaCriadero=[];
 
		$select=$db->query('SELECT * FROM galpon order by idCriadero');
 
		foreach($select->fetchAll() as $galpon){
			$listaCriadero[]=new Galpon($galpon['idCriadero'],$galpon['numeroAves'],$galpon['lineaGenetica'],$galpon['id_granjero']);
		}
		return $listaCriadero;
	}
 
	public static function searchById($idCriadero){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM galpon WHERE idCriadero=:idCriadero');
		$select->bindValue('idCriadero',$idCriadero);
		$select->execute();
 
		$criaderoDb=$select->fetch();
 
 
		$galpon = new Galpon($criaderoDb['idCriadero'],$criaderoDb['numeroAves'],$criaderoDb['lineaGenetica'],$criaderoDb['id_granjero']);
		//var_dump($lote);
		//die();
		return $galpon;
 
	}

	



 
	public static function update($galpon){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE galpon SET numeroAves=:numeroAves,lineaGenetica=:lineaGenetica,  id_granjero=:id_granjero WHERE idCriadero=:idCriadero');
		$update->bindValue('idCriadero', $galpon->getIdCriadero());
		$update->bindValue('numeroAves',$galpon->getNumeroAves());
		$update->bindValue('lineaGenetica',$galpon->getLineaGenetica());
        $update->bindValue('id_granjero',$galpon->getId_granjero());
		$update->execute();
	}
 
	public static function delete($idCriadero){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM galpon WHERE idCriadero=:idCriadero');
		$delete->bindValue('idCriadero',$idCriadero);
		$delete->execute();		
	}
    
}
?>