<?php 

class GalponController
{
	
	function __construct()
	{
		
	}

	function index(){
		require_once('../../../Views/admin/Galpon/bienvenido.php');
	}

	function register(){
		require_once('../../../Views/admin/Galpon/register.php');
	}

	function save(){
		if(isset($_POST['idCriadero'])  || isset($_POST['numeroAves']) || isset($_POST['lineaGenetica'])|| isset($_POST['id_granjero'])) {

		$galpon= new Galpon($_POST['idCriadero'],$_POST['numeroAves'],$_POST['lineaGenetica'],$_POST['id_granjero']);

		Galpon::save($galpon);
		echo '<script>
        alert("Regsitrado corrctamente");
         location.href="ir-registro.php";
        </script>';
	}
	}

	function show(){
		$listaCriadero=Galpon::all();

		require_once('../../../Views/admin/Galpon/show.php');
	}
 
	function updateshow(){
		$idCriadero=$_GET['idCriadero'];
		$galpon=Galpon::searchById($idCriadero);
		require_once('../../../Views/admin/Galpon/updateshow.php');
	}

	function update(){
		$galpon = new Galpon($_POST['idCriadero'],$_POST['numeroAves'],$_POST['lineaGenetica'],$_POST['id_granjero']);
		Galpon::update($galpon);
		$this->show();
	}
	function delete(){
		$idCriadero=$_GET['idCriadero'];
		Galpon::delete($idCriadero);
		$this->show();
	}

	function search(){
		if (!empty($_POST['idCriadero'])) {
			$idCriadero=$_POST['idCriadero'];
			$galpon=Galpon::searchById($idCriadero);
			$listaCriadero[]=$galpon;
			//var_dump($id);
			//die();
			require_once('../../../Views/admin/Galpon/show.php');
		} else {
			$listaCriadero=Galpon::all();

			require_once('../../../Views/admin/Galpon/show.php');
		}
		
		
	}

	function error(){
		require_once('../../../Views/admin/Galpon/error.php');
	}

}

?>