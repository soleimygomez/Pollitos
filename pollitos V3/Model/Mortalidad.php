<?php
   class Mortalidad {

    
    private $id;
    private $id_pollo;
    private $peso;
    private $fecha;
    private $causa;
  
   
    
    
       
    function __construct($id_pollo,$peso,$fecha,$causa)
	{
		$this->setId_pollo($id_pollo);
		$this->setPeso($peso);
		$this->setFecha($fecha);
		$this->setCausa($causa);		
		
		
	} 


	public function getId(){
		return $this->id;
	} 
	public function setId($id){
		$this->id = $id;
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


   


            
       
    public static function save($mortalidad){
		$db=Db::getConnect();
		
		$insert=$db->prepare('INSERT INTO mortalidad VALUES (:id, :id_pollo,:peso,:fecha,:causa)');
		$insert->bindValue('id',$mortalidad->getId());
        $insert->bindValue('id_pollo',$mortalidad->getId_pollo());
        $insert->bindValue('peso',$mortalidad->getPeso());
        $insert->bindValue('fecha',$mortalidad->getFecha());
		$insert->bindValue('causa',$mortalidad->getCausa());
		
	
		
		$insert->execute();
	}
 
	public static function all(){
		$db=Db::getConnect();
		$listaMortalidad=[];
 
		$select=$db->query('SELECT * FROM mortalidad order by id');
 
		foreach($select->fetchAll() as $mortalidad){
			$listaMortalidad[]=new mortalidad($mortalidad['id'],$mortalidad['id_pollo'],$mortalidad['peso'],$mortalidad['fecha'],$mortalidad['causa']);
		}
		return $listaMortalidad;
	}
 
	public static function searchById($id){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM mortalidad WHERE id=:id');
		$select->bindValue('id',$id);
		$select->execute();
 
		$mortalidadDb=$select->fetch();
 
 
		$mortalidad = new mortalidad($mortalidad['id'],$mortalidad['id_pollo'],$mortalidad['peso'],$mortalidad['fecha'],$mortalidad['causa']);
		
		return $mortalidad;
 
	}
 
	public static function update($mortalidad){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE mortalidad SET id_pollo=:id_pollo ,peso=:peso ,fecha=:fecha,  causa=:causa');
		$update->bindValue('id', $mortalidad->getId_pollo());
		$update->bindValue('id_pollo', $mortalidad->getId_pollo());
		$update->bindValue('peso', $mortalidad->getPeso());
		$update->bindValue('fecha', $mortalidad->getFecha());
		$update->bindValue('causa',$mortalidad->getCausa());
		
		
		$update->execute();
	}
 
	public static function delete($id){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM mortalidad WHERE id=:id');
		$delete->bindValue('id',$id);
		$delete->execute();		
	}
}
?>