<?php
   class Granjero{
    private $nombre;
    private $apellido;
    private $direccion;
    private $cedula;
    private $telefono;
    private $tipo;
    private $clave;
    
    function __construct($nombre,$apellido,$direccion,$cedula,$telefono,$tipo)
	{
		$this->setNombre($nombre);
		$this->setApellido($apellido);
        $this->setDireccion($direccion);
        $this->setCedula($cedula);
		$this->setTelefono($telefono);	
		$this->setTipo($tipo);	
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

    public function getDireccion(){
		return $this->direccion;
	}
	public function setDireccion($direccion){
		$this->direccion = $direccion;
	}

	public function getCedula(){
		return $this->cedula;
	}
	public function setCedula($cedula){
		$this->cedula = $cedula;
	}
    
    public function getTelefono(){
		return $this->telefono;
	}
 
	public function setTelefono($telefono){
		$this->telefono = $telefono;
	}

	public function getTipo(){
		return $this->tipo;
	}
 
	public function setTipo($tipo){
		$this->tipo = $tipo;
	}

    public function getIdLote(){
		return $this->id_lote;
	}
 
	public function setIdLote($id_lote){
		$this->id_lote = $id_lote;
	}  
    
    public static function save($granjero){
		$db=Db::getConnect();
		//var_dump($granja);
		//die();
		$insert=$db->prepare('INSERT INTO granjero VALUES ( :nombre,:apellido,:direccion,:cedula,:telefono,:tipo)');
		$insert->bindValue('nombre',$granjero->getNombre());
		$insert->bindValue('apellido',$granjero->getApellido());
        $insert->bindValue('direccion',$granjero->getDireccion());
        $insert->bindValue('cedula',$granjero->getCedula());
		$insert->bindValue('telefono',$granjero->getTelefono());
		$insert->bindValue('tipo',$granjero->getTipo());
		$insert->execute();
	}
 
	public static function all(){
		$db=Db::getConnect();
		$listaGranjero=[];
 
		$select=$db->query('SELECT * FROM granjero ');
 
		foreach($select->fetchAll() as $granjero){
			$listaGranjero[]=new Granjero($granjero['nombre'],$granjero['apellido'],$granjero['direccion'],$granjero['cedula'],$granjero['telefono'],$granjero['tipo']);
		}
		return $listaGranjero;
	}
	
 
	public static function searchById($cedula){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM granjero WHERE cedula=:cedula');
		$select->bindValue('cedula',$cedula);
		$select->execute();
 
		$granjeroDb=$select->fetch();
 
 
		$granjero = new Granjero($granjeroDb['nombre'],$granjeroDb['apellido'],$granjeroDb['direccion'],$granjeroDb['cedula'],$granjeroDb['telefono'],$granjeroDb['tipo']);
		//var_dump($granja);
		//die();
		return $granjero;
 
	}

	public function verificarGranjero($cedula) {
        try {
        	    $db=Db::getConnect();
				$consulta=$db->prepare("SELECT cedula FROM granjero WHERE cedula = :cedula");
				
				$consulta->execute(array(':cedula' =>  $cedula));
					
					foreach ($consulta as $cel) {					
																	              
	                return true;
	            }
            		return false;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }









 
	public static function update($granjero){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE granjero SET nombre=:nombre, apellido=:apellido direccion=:direccion,, cedula=:cedula, telefono=:telefono tipo=:tipo WHERE cedula=:cedula');
		$update->bindValue('nombre', $granjero->getNombre());
		$update->bindValue('apellido', $granjero->getApellido());
		$update->bindValue('direccion',$granjero->getDireccion());
		$update->bindValue('cedula', $granjero->getCedula());
        $update->bindValue('telefono',$granjero->getTelefono());
         $update->bindValue('tipo',$granjero->getTipo());
		$update->execute();
	}
 
	public static function delete($cedula){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM granjero WHERE cedula=:cedula');
		$delete->bindValue('cedula',$cedula);
		$delete->execute();		
	}
}
?>
