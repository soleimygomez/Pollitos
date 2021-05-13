<?php 

class PollitoController
{
	
	function __construct()
	{
		
	}

	function index(){
		require_once('../../../Views/Granjero/Pollito/register.php');
	}

	function register(){
		require_once('../../../Views/Granjero/Pollito/register.php');
	}

	function save(){
		$fecha = date("Y-m-d");

		$pollito= new pollito($_POST['id_pollo'],$_POST['peso'],$_POST['linea_genetica'] ,$_POST['galpon'],$fecha);
		Pollito::save($pollito);
		 echo '<script>
        alert("Regsitrado corrctamente");
         location.href="ir-registro.php";
        </script>';
    
	}

	function show(){
		$listaPollos=Pollito::all();
		$listaCriadero=Galpon::all();
		require_once('../../../Views/Granjero/Pollito/show.php');
	}



	function updateshow(){
		$id_pollo=$_GET['id_pollo'];
		$pollito=Pollito::searchById($id_pollo);
		require_once('../../../Views/Granjero/Pollito/updateshow.php');
	}

	function update(){
		$pollito =  new pollito($_POST['id_pollo'],$_POST['peso'],$_POST['linea_genetica']);
		Pollito::update($pollito);
		 echo '<script>
        alert("Regsitrado corrctamente");
         location.href="ir-tabla.php";
        </script>';
    
		 $this->show();
	}
	function delete(){
		$id_pollo=$_GET['id_pollo'];
		Pollito::delete($id_pollo);
		$this->show();
	}

	function search(){
		if (!empty($_POST['id_pollo'])) {
			$id_pollo=$_POST['id_pollo'];
			$pollito=Pollito::searchById($id_pollo);
			$listaPollos[]=$pollito;
			//var_dump($id);
			//die();
			require_once('../../../Views/Granjero/Pollito/show.php');
		} else {
			$listaPollos=Pollito::all();

			require_once('../../../Views/Granjero/Pollito/show.php');
		}
		
		
	}

	function error(){
		require_once('../../Views/Granjero/Pollito/error.php');
	}

}

?>