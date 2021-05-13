<?php 

class GranjaController
{
	
	function __construct()
	{
		
	}

	function index(){
		require_once('../../../Views/admin/Granja/register.php');
	}

	function register(){
		require_once('../../../Views/admin/Granja/register.php');
	}

	function save(){
		$granja= new granja($_POST['idGranja'],$_POST['nombre'],$_POST['direccion'],$_POST['telefono'],$_POST['cantidadhectareas']);
		Granja::save($granja);
		 echo '<script>
        alert("Regsitrado corrctamente");
         location.href="ir-registro.php";
        </script>';
	}

	function show(){
		$listaGranja=Granja::all();

		require_once('../../../Views/admin/Granja/show.php');
	}

	function updateshow(){
		$idGranja=$_GET['idGranja'];
		$granja=Granja::searchById($idGranja);
		require_once('../../../Views/admin/Granja/updateshow.php');
	}

	function update(){
		$granja =  new granja($_POST['idGranja'],$_POST['nombre'],$_POST['direccion'],$_POST['telefono'], $_POST['cantidadhectareas']);
		Granja::update($granja);
		 echo '<script>
        alert("Regsitrado corrctamente");
         location.href="ir-tabla.php";
        </script>';
    
		 $this->show();
	}
	function delete(){
		$idGranja=$_GET['idGranja'];
		Granja::delete($idGranja);
		$this->show();
	}

	function search(){
		if (!empty($_POST['idGranja'])) {
			$idGranja=$_POST['idGranja'];
			$granja=Granja::searchById($idGranja);
			$listaGranja[]=$granja;
			//var_dump($id);
			//die();
			require_once('../../../Views/admin/Granja/show.php');
		} else {
			$listaGranja=Granja::all();

			require_once('../../../Views/admin/Granja/show.php');
		}
		
		
	}

	function error(){
		require_once('../../Views/admin/Granja/error.php');
	}

}

?>