<?php 

class MortalidadController
{
	
	function __construct()
	{
		
	}

	function index(){
		require_once('../../../Views/Granjero/Pollito/mortalidad.php');
	}

	function register(){
		require_once('../../../Views/Granjero/Pollito/mortalidad.php');
	}

	function save(){
		

		

		if(isset($_POST['id']) || isset($_POST['id_pollo']) || isset($_POST['causa']) ) {

		$pollo = $_POST['id_pollo'];
		$linea_genetica=Pollito::buscarPollo($pollo);

		$mortalidadd= new Mortalidadd($_POST['id_pollo'],$_POST['peso'],$_POST['fecha'],$_POST['causa'], $linea_genetica);
		Mortalidadd::save($mortalidadd);

		$mortalidad= new  Mortalidad($_POST['id_pollo'],$_POST['peso'],$_POST['fecha'],$_POST['causa']);
		Mortalidad::save($mortalidad);


		$id_pollo=$_POST['id_pollo'];
		Pollito::delete($id_pollo);

		 echo '<script>
        alert("Regsitrado corrctamente");
         location.href="ir-registro-mortalidad.php";
        </script>';
    }
    
	}

	function show(){
		$listaMortalidad=Mortalidad::all();

		require_once('../../../Views/Granjero/Pollito/show.php');
	}

	function updateshow(){
		$id=$_GET['id'];
		$mortalidad=Mortalidad::searchById($id);
		require_once('../../../Views/Granjero/Pollito/updateshow.php');
	}

	function update(){
		$mortalidad= new mortalidad($_POST['id'],$_POST['id_pollo'],$_POST['peso'],$_POST['fecha'],$_POST['causa']);
		Mortalidad::update($mortalidad);
		 echo '<script>
        alert("Regsitrado corrctamente");
         location.href="ir-tabla.php";
        </script>';
    
		 $this->show();
	}
	function delete(){
		$id=$_GET['id'];
		Mortalidad::delete($id);
		$this->show();
	}

	function search(){
		if (!empty($_POST['id'])) {
			$id=$_POST['id'];
			$mortalidad=Mortalidad::searchById($id);
			$listaMortalidad[]=$mortalidad;
			//var_dump($id);
			//die();
			require_once('../../../Views/Granjero/Pollito/show.php');
		} else {
			$listaMortalidad=Mortalidad::all();

			require_once('../../../Views/Granjero/Pollito/show.php');
		}
		
		
	}

	function error(){
		require_once('../../Views/Granjero/Pollito/error.php');
	}

}

?>