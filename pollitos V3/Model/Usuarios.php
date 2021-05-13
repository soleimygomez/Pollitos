<?php
   class usuarios{
    private $usuario;
    private $clave;
    private $tipo;
    
    
    
       
    function __construct($usuario,$clave,$tipo)
	{
		$this->setUsuario($usuario);
		$this->setClave($clave);		
        $this->setTipo($tipo);
		
		
	} 
  
    
    public function getUsuario(){
		return $this->usuario;
	}
 
	public function setUsuario($usuario){
		$this->usuario = $usuario;
	}
    public function getClave(){
		return $this->clave;
	}
 
	public function setClave($clave){
		$this->clave = $clave;
	}
    public function getTipo(){
		return $this->tipo;
	}
 
	public function setTipo($tipo){
		$this->tipo = $tipo;
	}


       
   
    
    
       
    public static function save($usuarios){
		$db=Db::getConnect();
		
		$insert=$db->prepare('INSERT INTO usuarios VALUES ( :usuario,:clave,:tipo)');
		$insert->bindValue('usuario',$usuarios->getUsuario());
		$insert->bindValue('clave',$usuarios->getClave());
		$insert->bindValue('tipo',$usuarios->getTipo());
	
		
		$insert->execute();
	}
 
	public static function all(){
		$db=Db::getConnect();
		$listaUsuario=[];
 		
		$select=$db->query('SELECT * FROM usuarios order by usuario');
 
		foreach($select->fetchAll() as $usuarios){
			$listaUsuario[]=new usuarios($usuarios['usuario'],$usuarios['clave'],$usuarios['tipo']);
		}
		return $listaUsuario;
	}
 
	public static function searchById($usuario){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM usuarios WHERE usuario=:usuario');
		$select->bindValue('usuario',$usuario);
		$select->execute();
 
		$administradorDb=$select->fetch();
 
 
		$usuarios = new usuarios ($administradorDb['usuario'],$administradorDb['clave'],$administradorDb['tipo']);
		
		return $usuarios;
 
	}

	public function verificarUsuario($usuarios) {
        try {
        	    $db=Db::getConnect();
				$consulta=$db->prepare("SELECT usuario FROM usuarios WHERE usuario = :usuario");
				
				$consulta->execute(array(':usuario' =>  $usuarios));
					
					foreach ($consulta as $usuario) {					
																	              
	                return true;
	            }
            		return false;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }



 
	public static function update($usuarios){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE usuarios SET usuario=:usuario,  clave=:clave, tipo=:tipo');
		$update->bindValue('usuario', $usuarios->getUsuario());
		$update->bindValue('clave',$usuarios->getClave());
	    $update->bindValue('tipo',$usuarios->getTipo());
		
		
		$update->execute();
	}
 
	public static function delete($usuario){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM usuarios WHERE usuario=:usuario');
		$delete->bindValue('usuario',$usuario);
		$delete->execute();		
	}
}
?>