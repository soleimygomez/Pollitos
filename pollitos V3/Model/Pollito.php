<?php
   class Pollito{

    private $id_pollo;
    private $peso;
    private $linea_genetica;
    private $galpon;
    private $fecha;
  
   
    
    
       
    function __construct($id_pollo,$peso,$linea_genetica,$galpon,$fecha)
	{
	    $this->setId_pollo($id_pollo);
		$this->setPeso($peso);
		$this->setLinea_genetica($linea_genetica);
		$this->setGalpon($galpon);		
		$this->setFecha($fecha);
		
		
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


    public function getLinea_genetica(){
		return $this->linea_genetica;
	}
 	public function setLinea_genetica($linea_genetica){
		$this->linea_genetica = $linea_genetica;
	}


	public function getGalpon(){
		return $this->galpon;
	}
 	public function setGalpon($galpon){
		$this->galpon = $galpon;
	}

	public function getFecha(){
		return $this->fecha;
	}
 	public function setFecha($fecha){
		$this->fecha = $fecha;
	}


            
       
    public static function save($pollito){
		$db=Db::getConnect();
		
		$insert=$db->prepare('INSERT INTO pollito VALUES (:id_pollo, :peso,:linea_genetica, :galpon, :fecha)');
        $insert->bindValue('id_pollo',$pollito->getId_pollo());
		$insert->bindValue('peso',$pollito->getPeso());
		$insert->bindValue('linea_genetica',$pollito->getLinea_genetica());
		$insert->bindValue('galpon',$pollito->getGalpon());
		$insert->bindValue('fecha',$pollito->getFecha());

		
		
		$insert->execute();
	}
 
	public static function all(){
		$db=Db::getConnect();
		$listaPollos=[];
 
		$select=$db->query('SELECT * FROM pollito order by id_pollo');
 
		foreach($select->fetchAll() as $pollito){
			$listaPollos[]=new pollito($pollito['id_pollo'],$pollito['peso'],$pollito['linea_genetica'], $pollito['galpon'], $pollito['fecha']);
		}
		return $listaPollos;
	}
 
	public static function searchById($id_pollo){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM pollito WHERE id_pollo=:id_pollo');
		$select->bindValue('id_pollo',$id_pollo);
		$select->execute();
 
		$pollitosDb=$select->fetch();
 
 
		$pollito = new pollito ($pollitosDb['id_pollo'],$pollitosDb['peso'],$pollitosDb['linea_genetica']);
		
		return $pollito;
 
	}





	public function buscarPollo($id_pollo) {
        try {
        	    $db=Db::getConnect();
				$consulta=$db->prepare('SELECT linea_genetica FROM pollito WHERE id_pollo=:id_pollo');
				
				$consulta->execute(array(':id_pollo' =>  $id_pollo));
					
					foreach ($consulta as $pollo) {					
																	              
	                return $pollo['linea_genetica'];
	            }
	            return false;
            		
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }






 
	public static function update($pollito){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE pollito SET peso=:peso,  linea_genetica=:linea_genetica');
		$update->bindValue('id_pollo', $pollito->getId_pollo());
		$update->bindValue('peso', $pollito->getPeso());
		$update->bindValue('linea_genetica',$pollito->getLinea_genetica());
		
		
		$update->execute();
	}
 
	public static function delete($id_pollo){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM pollito WHERE id_pollo=:id_pollo');
		$delete->bindValue('id_pollo',$id_pollo);
		$delete->execute();		
	}
}
?>