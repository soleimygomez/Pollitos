<?php 

class VisitantesController
{
	
	function __construct()
	{
		
	}

	function index(){
		require_once('../../../Views/Granjero/visitantes/bienvenido.php');
	}

	function register(){
		require_once('../../../Views/Granjero/visitantes/register.php');
	}

	function save(){
		if(isset($_POST['id'])  || isset($_POST['nombre']) || isset($_POST['cedula'])|| isset($_POST['fecha_ingreso'])) {

		$visitantes= new Visitantes($_POST['nombre'],$_POST['cedula'],$_POST['fecha_ingreso'],$_POST['tipo'] );

		Visitantes::save($visitantes);
		echo '<script>
        alert("Regsitrado corrctamente");
         location.href="ir-registro.php";
        </script>';
	}
	}

	function show(){
		$listaVisitantes=Visitantes::all();

		require_once('../../../Views/Granjero/visitantes/show.php');
	}
 
	function updateshow(){
		$id=$_GET['id'];
		$visitantes=Visitantes::searchById($id);
		require_once('../../../Views/Granjero/visitantes/updateshow.php');
	}

	function update(){
		$visitantes = new Visitantes($_POST['nombre'],$_POST['cedula'],$_POST['fecha_ingreso']);
		Visitantes::update($visitantes);
		$this->show();
	}
	function delete(){
		$cedula=$_GET['cedula'];
		Visitantes::delete($cedula);
		$this->show();
	}

	function search(){
		if (!empty($_POST['cedula'])) {
			$cedula=$_POST['cedula'];
			$visitantes=Visitantes::searchById($cedula);
			$listaVisitantes[]=$visitantes;
			//var_dump($id);
			//die();
			require_once('../../../Views/Granjero/visitantes/show.php');
		} else {
			$listaVisitantes=Visitantes::all();

			require_once('../../../Views/Granjero/visitantes/show.php');
		}
		
		
	}

	function error(){
		require_once('../../../Views/Granjero/visitantes/error.php');
	}

}

?>