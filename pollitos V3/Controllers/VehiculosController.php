<?php 

class VehiculosController
{
	
	function __construct()
	{
		
	}

	function index(){
		require_once('../../../Views/Granjero/vehiculos/bienvenido.php');
	}

	function register(){
		require_once('../../../Views/Granjero/vehiculos/register.php');
	}

	function save(){
		if(isset($_POST['placa']) 
			 || isset($_POST['modelo']) 
			 	|| isset($_POST['propietario'])
			 		|| isset($_POST['documento']) 
								|| isset($_POST['documento'])) {

		$vehiculos= new Vehiculos($_POST['placa'],$_POST['modelo'],$_POST['propietario'],$_POST['documento'],$_POST['fecha']);

		Vehiculos::save($vehiculos);
		echo '<script>
        alert("Regsitrado corrctamente");
         location.href="ir-registro.php";
        </script>';
	}
	}

	function show(){
		$listaVehiculos=Vehiculos::all();

		require_once('../../../Views/Granjero/vehiculos/show.php');
	}
 
	function updateshow(){
		$placa=$_GET['placa'];
		$vehiculos=Vehiculos::searchById($placa);
		require_once('../../../Views/Granjero/vehiculos/updateshow.php');
	}

	function update(){
		$vehiculos = new Vehiculos($_POST['placa'],$_POST['modelo'],$_POST['propietario'],$_POST['documento'],$_POST['fecha']);
		Vehiculos::update($vehiculos);
		$this->show();
	}
	function delete(){
		$placa=$_GET['placa'];
		Vehiculos::delete($placa);
		$this->show();
	}

	function search(){
		if (!empty($_POST['placa'])) {
			$placa=$_POST['placa'];
			$vehiculos=Vehiculos::searchById($placa);
			$listaVehiculos[]=$vehiculos;
			//var_dump($id);
			//die();
			require_once('../../../Views/Granjero/vehiculos/show.php');
		} else {
			$listaVehiculos=Vehiculos::all();

			require_once('../../../Views/Granjero/vehiculos/show.php');
		}
		
		
	}

	function error(){
		require_once('../../../Views/Granjero/vehiculos/error.php');
	}

}

?>