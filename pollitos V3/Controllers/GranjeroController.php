<?php 

class GranjeroController
{
	
	function __construct()
	{
		
	}
 
	function index(){
		require_once('../../../Views/admin/Granjero/register.php');
	}

	function register(){
		require_once('../../../Views/admin/Granjero/register.php');
	}
 
	function save(){

		$usuarios1 = $_POST['usuario'];
		$usu=usuarios::verificarUsuario($usuarios1);

		$cedula = $_POST['cedula'];
		$granjero1=Granjero::verificarGranjero($cedula);

		if ($usu and $granjero1) {
		     echo '<script>
		       alert("Usuario o cedula repetidos, por favor intente con otros");
		       location.href="ir-registro.php";
		       </script>';
		}else{
			$usuarios = new usuarios($_POST['usuario'],$_POST['clave'],$_POST['tipo']);
			 usuarios::save($usuarios); 

			$granjero= new granjero($_POST['nombre'],$_POST['apellido'],$_POST['direccion'],$_POST['cedula'],$_POST['telefono'],$_POST['tipo'] );
				Granjero::save($granjero);
				
				echo '<script>
		        alert("Regsitrado corrctamente");
		         location.href="ir-registro.php";
		        </script>';

		}

		
	}




	// function save(){
	// 	if(isset($_POST['usuario']) || isset($_POST['clave']) || isset($_POST['tipo'])) {
	// 	$usuarios = new usuarios($_POST['usuario'],$_POST['clave'],$_POST['tipo']);
	// 	usuarios::save($usuarios); 
	// }
	// 	$granjero= new granjero($_POST['nombre'],$_POST['apellido'],$_POST['direccion'],$_POST['cedula'],$_POST['telefono'],$_POST['tipo'] );
	// 	Granjero::save($granjero);
	// 	echo '<script>
 //        alert("Regsitrado corrctamente");
 //         location.href="ir-registro.php";
 //        </script>';
	// }




	function show(){
		$listaGranjero=Granjero::all();

		require_once('../../../Views/admin/Granjero/show.php');
	}

	function updateshow(){
		$id_granjero=$_GET['id_granjero'];
		$granjero=Granjero::searchById($id_granjero);
		require_once('../../../Views/admin/Granjero/updateshow.php');
	}

	function update(){
		if(isset($_POST['cedula'])) {

		$granjero = new granjero($_POST['nombre'],$_POST['apellido'],$_POST['direccion'],$_POST['cedula'],$_POST['telefono'],$_POST['tipo']);
		Granjero::update($granjero);
		$this->show();
	}
	}
	function delete(){
		$id_granjero=$_GET['id_granjero'];
		Granjero::delete($id_granjero);
		$this->show();
	}

	function search(){
		if (!empty($_POST['cedula'])) {
			$cedula=$_POST['cedula'];
			$granjero=Granjero::searchById($cedula);
			$listaGranjero[]=$granjero;
			//var_dump($id);
			//die();
			require_once('../../../Views/admin/Granjero/show.php');
		} else {
			$listaGranjero=Granjero::all();

			require_once('../../../Views/admin/Granjero/show.php');
		}
		
		
	}

	function error(){
		require_once('../../Views/admin/Granjero/error.php');
	}

}

?>