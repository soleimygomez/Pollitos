<?php
   class Mortalidadd {

    
    private $id_pollo;
    private $peso;
    private $fecha;
    private $causa;
    private $linea_genetica;
  
   
    
    
       
    function __construct($id_pollo,$peso,$fecha,$causa, $linea_genetica)
	{
		$this->setId_pollo($id_pollo);
		$this->setPeso($peso);
		$this->setFecha($fecha);
		$this->setCausa($causa);		
		$this->setLinea_genetica($linea_genetica);
		
	} 



       
    public function getId_pollo(){
		return $this->id_pollo;
	} 
	public function setId_pollo($id_pollo){
		$this->id_pollo = $id_pollo;
	}


	public function getPeso(){
		return $this->peso;
	} 
	public function setPeso($peso){
		$this->peso = $peso;
	}



	public function getFecha(){
		return $this->fecha;
	} 
	public function setFecha($fecha){
		$this->fecha = $fecha;
	}

    

    public function getCausa(){
		return $this->causa;
	} 
	public function setCausa($causa){
		$this->causa = $causa;
	}

	 public function getLinea_genetica(){
		return $this->linea_genetica;
	} 
	public function setLinea_genetica($linea_genetica){
		$this->linea_genetica = $linea_genetica;
	}



   


            
       
    public static function save($mortalidadd){
		$db=Db::getConnect();
		
		$insert=$db->prepare('INSERT INTO mortalidadd VALUES ( :id_pollo,:peso,:fecha,:causa, :linea_genetica)');
        $insert->bindValue('id_pollo',$mortalidadd->getId_pollo());
        $insert->bindValue('peso',$mortalidadd->getPeso());
        $insert->bindValue('fecha',$mortalidadd->getFecha());
		$insert->bindValue('causa',$mortalidadd->getCausa());
		$insert->bindValue('linea_genetica',$mortalidadd->getLinea_genetica());
		
	
		
		$insert->execute();
	}
 
	public static function all(){
		$db=Db::getConnect();
		$listaMortalidad=[];
 
		$select=$db->query('SELECT * FROM mortalidadd order by id_pollo');
 
		foreach($select->fetchAll() as $mortalidad){
			$listaMortalidad[]=new mortalidad($mortalidad['id_pollo'],$mortalidad['peso'],$mortalidad['fecha'],$mortalidad['causa']);
		}
		return $listaMortalidad;
	}
 
	public static function searchById($id_pollo){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM mortalidad WHERE id_pollo=:id_pollo');
		$select->bindValue('id_pollo',$id_pollo);
		$select->execute();
 
		$mortalidadDb=$select->fetch();
 
 
		$mortalidad = new mortalidad($mortalidad['id_pollo'],$mortalidad['peso'],$mortalidad['fecha'],$mortalidad['causa']);
		
		return $mortalidad;
 
	}
 
	public static function update($mortalidad){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE mortalidad SET id_pollo=:id_pollo ,peso=:peso ,fecha=:fecha,  causa=:causa');
		$update->bindValue('id_pollo', $mortalidad->getId_pollo());
		$update->bindValue('peso', $mortalidad->getPeso());
		$update->bindValue('fecha', $mortalidad->getFecha());
		$update->bindValue('causa',$mortalidad->getCausa());
		
		
		$update->execute();
	}
 
	public static function delete($getId_pollo){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM mortalidad WHERE getId_pollo=:getId_pollo');
		$delete->bindValue('getId_pollo',$getId_pollo);
		$delete->execute();		
	}
}
?>