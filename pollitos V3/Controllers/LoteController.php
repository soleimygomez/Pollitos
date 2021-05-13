../<?php 
        
class LoteController
{
	
	function __construct()
	{
		
	}

	function index(){
		require_once('../../../Views/admin/Lote/bienvenido.php');
	}

	function register(){
		require_once('../../../Views/admin/Lote/register.php');
	}

	function save(){
		 if(isset($_POST['id_lote']) || isset($_POST['fecha_creacion']) || isset($_POST['ubicacion']) || isset($_POST['idGranja'])) {
	$lote= new Lote($_POST['id_lote'],$_POST['fecha_creacion'],$_POST['ubicacion'],$_POST['idGranja']);

		Lote::save($lote);
		echo '<script>
        alert("Regsitrado corrctamente");
         location.href="ir-registro.php";
        </script>';
	}
	}

	function show(){
		$listaLote=Lote::all();
		
		require_once('../../../Views/admin/Lote/show.php');
	}

	function updateshow(){
		$idLote=$_GET['idLote'];
		$lote=Lote::searchById($idLote);
		require_once('../../../Views/admin/Lote/updateshow.php');
	}

	function update(){
		$lote = new Lote($_POST['id_lote'],$_POST['fecha_creacion'],$_POST['ubicacion'],$_POST['idGranja']);
		Lote::update($lote);
		$this->show();
	}
	function delete(){
		$idLote=$_GET['idLote'];
		Lote::delete($idLote);
		$this->show();
	}

	function search(){
		if (!empty($_POST['idLote'])) {
			$idLote=$_POST['idLote'];
			$lote=Lote::searchById($idLote);
			$listaLote[]=$lote;
			//var_dump($id);
			//die();
			require_once('../../../Views/admin/Lote/show.php');
		} else {
			$listaLote=Lote::all();

			require_once('../../../Views/admin/Lote/show.php');
		}
		
		
	}

	function error(){
		require_once('../../../Views/admin/Lote/error.php');
	}

}

?>