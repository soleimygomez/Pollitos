<?php
   class usuarios{
    private $id;
    private $usuario;
    private $clave;
    private $tipo;
   
    
    
       
    function __construct($usuario,$clave,$tipo)
	{
		// $this->setId($id);
		$this->setUsuario($usuario);
		$this->setClave($clave);		
        $this->setTipo($tipo);
		
		
	} 
       
    public function getId(){
		return $this->id;
	}
 
	public function setId($id){
		$this->id = $id;
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
		
		$insert=$db->prepare('INSERT INTO usuarios VALUES (:id, :usuario,:clave,:tipo)');
        $insert->bindValue('id',$usuarios->getId());
		$insert->bindValue('usuario',$usuarios->getUsuario());
		$insert->bindValue('clave',$usuarios->getClave());
		$insert->bindValue('tipo',$usuarios->getTipo());
	
		
		$insert->execute();
	}
 
	public static function all(){
		$db=Db::getConnect();
		$listaUsuario=[];
 
		$select=$db->query('SELECT * FROM usuarios order by id');
 
		foreach($select->fetchAll() as $usuarios){
			$listaUsuario[]=new usuarios($usuarios['id'],$usuarios['usuario'],$usuarios['clave'],$usuarios['tipo']);
		}
		return $listaUsuario;
	}
 
	public static function searchById($id){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM usuarios WHERE id=:id');
		$select->bindValue('id',$id);
		$select->execute();
 
		$administradorDb=$select->fetch();
 
 
		$usuarios = new usuarios ($administradorDb['id'],$administradorDb['usuario'],$administradorDb['clave'],$administradorDb['tipo']);
		
		return $usuarios;
 
	}
 
	public static function update($usuarios){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE usuarios SET usuario=:usuario,  clave=:clave, tipo=:tipo');
		$update->bindValue('id', $usuarios->getId());
		$update->bindValue('usuario', $usuarios->getUsuario());
		$update->bindValue('clave',$usuarios->getClave());
	    $update->bindValue('tipo',$usuarios->getTipo());
		
		
		$update->execute();
	}
 
	public static function delete($id){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM usuarios WHERE id=:id');
		$delete->bindValue('id',$id);
		$delete->execute();		
	}
}
?>